<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrazeInquiry extends Model
{
    use HasFactory;

    protected $table = 'graze_inquiries';

    protected $fillable = [
        'full_name',
        'phone',
        'email',
        'event_date',
        'city',
        'guest_count',
        'budget',
        'event_type',
        'service',
        'dietary',
        'vision',
        'status',
        'admin_notes',
        'ip_address',
    ];

    protected $casts = [
        'guest_count' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public static array $statuses = [
        'new' => 'New Lead',
        'contacted' => 'Contacted',
        'quoted' => 'Quote Sent',
        'confirmed' => 'Confirmed / Booked',
        'completed' => 'Completed',
        'cancelled' => 'Cancelled / Declined',
    ];

    public static array $services = [
        'charcuterie-cups' => 'Charcuterie Cups & Grazing Boxes',
        'grazing-table' => 'Grazing Table (4ft / 6ft / 8ft)',
        'indo-fusion' => 'Indo-Fusion Grazing Table',
        'high-tea' => 'High Tea',
        'gift-boxes' => 'Custom Return Gifts',
        'paint-sip' => 'Paint & Sip',
        'platter-rental' => 'Platter Rental',
        'multiple' => 'Multiple Services',
    ];

    public static array $eventTypes = [
        'birthday' => 'Birthday',
        'wedding' => 'Wedding / Engagement',
        'baby-shower' => 'Baby Shower',
        'bridal-shower' => 'Bridal Shower',
        'corporate' => 'Corporate Event',
        'eid-diwali' => 'Eid / Diwali',
        'other' => 'Other',
    ];

    public static array $budgets = [
        'under-300' => 'Under $300',
        '300-600' => '$300 – $600',
        '600-1000' => '$600 – $1,000',
        '1000-2000' => '$1,000 – $2,000',
        '2000+' => '$2,000+',
    ];

    public static array $dietaries = [
        'standard' => 'Standard',
        'vegetarian' => 'Vegetarian / Vegan',
        'halal' => 'Halal',
        'gluten-free' => 'Gluten-Free',
        'na' => 'No preference / Mix',
    ];

    public function getServiceLabelAttribute(): string
    {
        return self::$services[$this->service] ?? ucwords(str_replace('-', ' ', (string)$this->service));
    }

    public function getEventTypeLabelAttribute(): string
    {
        return self::$eventTypes[$this->event_type] ?? ucwords(str_replace('-', ' ', (string)$this->event_type));
    }

    public function getBudgetLabelAttribute(): string
    {
        return self::$budgets[$this->budget] ?? (string)$this->budget;
    }

    public function getDietaryLabelAttribute(): string
    {
        return self::$dietaries[$this->dietary] ?? (string)($this->dietary ?: 'None');
    }

    public function getStatusLabelAttribute(): string
    {
        return self::$statuses[$this->status] ?? ucfirst((string)$this->status);
    }

    public function getCleanPhoneAttribute(): string
    {
        return (string)preg_replace('/[^0-9]/', '', (string)$this->phone);
    }

    public function getWaLinkAttribute(): string
    {
        $clean = $this->clean_phone;
        if (! $clean) {
            return '';
        }

        // Standardize North American numbers (10 digits -> prepend 1)
        if (strlen($clean) === 10) {
            $waPhone = '1' . $clean;
        } elseif (strlen($clean) === 11 && str_starts_with($clean, '1')) {
            $waPhone = $clean;
        } elseif (strlen($clean) === 10 && !str_starts_with($clean, '1')) {
            $waPhone = '91' . $clean; // Fallback if Indian number
        } else {
            $waPhone = $clean;
        }

        $greeting = "Hi " . ($this->full_name ?: 'there') . "! Thank you for reaching out to Graze & Gift Co. regarding your " . ($this->event_type_label ?: 'upcoming event') . " on " . ($this->event_date ?: 'your requested date') . ". I would love to share our menu & quote details with you!";

        return 'https://wa.me/' . $waPhone . '?text=' . urlencode($greeting);
    }
}
