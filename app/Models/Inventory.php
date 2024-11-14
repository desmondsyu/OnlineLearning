
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category_id', 'supplier_id', 'quantity', 'price'];

    // Relationships
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    // Accessors
    public function getFormattedPriceAttribute()
    {
        return '$' . number_format($this->price, 2);
    }

    // Scopes
    public function scopeLowStock($query, $threshold = 10)
    {
        return $query->where('quantity', '<', $threshold);
    }

    public function scopeByCategory($query, $categoryId)
    {
        return $query->where('category_id', $categoryId);
    }

    // Custom Query Method
    public static function expensiveItems($minPrice)
    {
        return self::where('price', '>', $minPrice)->get();
    }
}
