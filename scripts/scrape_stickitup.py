#!/usr/bin/env python3
"""
StickItUp.xyz Complete Product & Image Scraper
Fetches all 4,469 products from Shopify public API, saves structured catalog (JSON & CSV),
and concurrently downloads high-resolution product images.
"""

import os
import sys
import json
import csv
import time
import argparse
import urllib.request
import urllib.parse
from concurrent.futures import ThreadPoolExecutor, as_completed

BASE_URL = "https://www.stickitup.xyz"
USER_AGENT = "Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36"

def fetch_all_products(output_dir, refresh=False, limit=250):
    json_path = os.path.join(output_dir, "stickitup_catalog.json")
    if os.path.exists(json_path) and not refresh:
        print(f"⚡ Loading existing catalog cache: {json_path}")
        with open(json_path, "r", encoding="utf-8") as f:
            products = json.load(f)
        print(f"✅ Loaded {len(products)} products from cache.\n")
        return products

    print("📡 Fetching complete product catalog from stickitup.xyz...")
    products = []
    page = 1

    while True:
        url = f"{BASE_URL}/products.json?limit={limit}&page={page}"
        req = urllib.request.Request(url, headers={"User-Agent": USER_AGENT})
        try:
            with urllib.request.urlopen(req, timeout=20) as resp:
                data = json.loads(resp.read().decode("utf-8"))
                batch = data.get("products", [])
                if not batch:
                    break
                products.extend(batch)
                print(f"  ➜ Page {page:02d}: Fetched {len(batch)} products (Total: {len(products)})")
                page += 1
                time.sleep(0.15)
        except Exception as e:
            print(f"  ❌ Error on page {page}: {e}")
            break

    print(f"✅ Total products fetched: {len(products)}\n")
    save_catalog(products, output_dir)
    return products

def save_catalog(products, output_dir):
    os.makedirs(output_dir, exist_ok=True)
    json_path = os.path.join(output_dir, "stickitup_catalog.json")
    csv_path = os.path.join(output_dir, "stickitup_catalog.csv")

    # 1. Save Full JSON
    with open(json_path, "w", encoding="utf-8") as f:
        json.dump(products, f, indent=2, ensure_ascii=False)
    print(f"💾 Saved full catalog JSON: {json_path}")

    # 2. Save Clean CSV for spreadsheet viewing / DB import
    rows = []
    for p in products:
        variants = p.get("variants", [])
        price = variants[0].get("price") if variants else ""
        compare_price = variants[0].get("compare_at_price") if variants else ""
        images = [img.get("src", "").split("?")[0] for img in p.get("images", []) if img.get("src")]
        primary_img = images[0] if images else ""

        rows.append({
            "id": p.get("id"),
            "title": p.get("title"),
            "handle": p.get("handle"),
            "product_type": p.get("product_type"),
            "tags": ", ".join(p.get("tags", [])) if isinstance(p.get("tags"), list) else p.get("tags", ""),
            "price": price,
            "compare_at_price": compare_price,
            "image_count": len(images),
            "primary_image_url": primary_img,
            "all_images_urls": " | ".join(images),
            "product_url": f"{BASE_URL}/products/{p.get('handle')}",
        })

    fieldnames = [
        "id", "title", "handle", "product_type", "tags",
        "price", "compare_at_price", "image_count",
        "primary_image_url", "all_images_urls", "product_url"
    ]

    with open(csv_path, "w", encoding="utf-8", newline="") as f:
        writer = csv.DictWriter(f, fieldnames=fieldnames)
        writer.writeheader()
        writer.writerows(rows)
    print(f"📊 Saved catalog CSV: {csv_path}\n")

    return rows

def download_single_image(url, dest_path):
    if os.path.exists(dest_path) and os.path.getsize(dest_path) > 0:
        return True, "exists"

    clean_url = url.split("?")[0]
    req = urllib.request.Request(clean_url, headers={"User-Agent": USER_AGENT})
    try:
        with urllib.request.urlopen(req, timeout=25) as resp:
            content = resp.read()
            with open(dest_path, "wb") as f:
                f.write(content)
        return True, "downloaded"
    except Exception as e:
        return False, str(e)

def download_images(products, output_dir, mode="primary", max_count=None, workers=20, query=None):
    img_dir = os.path.join(output_dir, "images")
    os.makedirs(img_dir, exist_ok=True)

    if query:
        query_lower = query.lower()
        products = [
            p for p in products
            if query_lower in p.get("title", "").lower()
            or query_lower in p.get("handle", "").lower()
            or any(query_lower in t.lower() for t in (p.get("tags") if isinstance(p.get("tags"), list) else [p.get("tags", "")]))
        ]
        print(f"🔍 Filtered to {len(products)} products matching query: '{query}'")

    tasks = []
    for p in products:
        handle = p.get("handle", "sticker")
        images = p.get("images", [])
        if not images:
            continue

        if mode == "primary":
            img_url = images[0].get("src")
            if img_url:
                ext = ".jpg"
                clean_path = urllib.parse.urlparse(img_url.split("?")[0]).path
                if clean_path.endswith((".png", ".webp", ".jpg", ".jpeg")):
                    ext = os.path.splitext(clean_path)[1]
                filename = f"{handle}{ext}"
                dest = os.path.join(img_dir, filename)
                tasks.append((img_url, dest))
        else: # "all" gallery images
            for idx, img_obj in enumerate(images):
                img_url = img_obj.get("src")
                if not img_url:
                    continue
                ext = ".jpg"
                clean_path = urllib.parse.urlparse(img_url.split("?")[0]).path
                if clean_path.endswith((".png", ".webp", ".jpg", ".jpeg")):
                    ext = os.path.splitext(clean_path)[1]
                filename = f"{handle}_{idx+1}{ext}"
                dest = os.path.join(img_dir, filename)
                tasks.append((img_url, dest))

    if max_count:
        tasks = tasks[:max_count]

    total = len(tasks)
    if total == 0:
        print("⚠️ No matching images found to download.")
        return

    print(f"📥 Starting concurrent download of {total} images into: {img_dir}")
    print(f"⚡ Concurrency: {workers} worker threads")

    completed = 0
    failed = 0
    start_time = time.time()

    with ThreadPoolExecutor(max_workers=workers) as executor:
        future_map = {executor.submit(download_single_image, url, path): (url, path) for url, path in tasks}
        for future in as_completed(future_map):
            success, status = future.result()
            completed += 1
            if not success:
                failed += 1
            if completed % 100 == 0 or completed == total:
                elapsed = time.time() - start_time
                rate = completed / elapsed if elapsed > 0 else 0
                pct = (completed / total) * 100
                print(f"  progress: {completed}/{total} ({pct:.1f}%) - {rate:.1f} imgs/sec - Failed: {failed}")

    print(f"\n🎉 Download finished! Successfully captured: {completed - failed}/{total} images.")
    print(f"📁 Image Directory: {img_dir}\n")

def main():
    parser = argparse.ArgumentParser(description="Scrape stickitup.xyz products and images")
    parser.add_argument("--output", default="stickitup_data", help="Output directory")
    parser.add_argument("--mode", choices=["primary", "all", "catalog_only"], default="primary",
                        help="'primary' = main image per product, 'all' = all gallery photos, 'catalog_only' = save CSV/JSON only")
    parser.add_argument("--limit", type=int, default=None, help="Limit number of images to download (e.g. 100, 500)")
    parser.add_argument("--query", type=str, default=None, help="Filter products by title or tag (e.g. anime, meme, tech)")
    parser.add_argument("--workers", type=int, default=20, help="Concurrent download threads")
    parser.add_argument("--refresh", action="store_true", help="Force re-fetching entire catalog from network")
    args = parser.parse_args()

    products = fetch_all_products(args.output, refresh=args.refresh)

    if args.mode != "catalog_only":
        download_images(products, args.output, mode=args.mode, max_count=args.limit, workers=args.workers, query=args.query)

if __name__ == "__main__":
    main()
