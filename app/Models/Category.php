
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Relationships
    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }

    // Accessor
    public function getInventoryCountAttribute()
    {
        return $this->inventories()->count();
    }

    // Scopes
    public function scopeWithInventories($query)
    {
        return $query->has('inventories');
    }

    // Custom Query Method
    public static function categoriesWithItems()
    {
        return self::with('inventories')->get();
    }
}
