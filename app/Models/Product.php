<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Product extends Model { protected $fillable = ['category_id','name','slug','sku','description','price','stock','low_stock_threshold','image','emoji','is_active']; protected function casts(): array { return ['price'=>'decimal:2','is_active'=>'boolean','stock'=>'integer','low_stock_threshold'=>'integer']; } public function category(): BelongsTo { return $this->belongsTo(Category::class); } }
