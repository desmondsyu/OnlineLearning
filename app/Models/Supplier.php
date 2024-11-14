
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'contact_info'];

    // Relationships
    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }

    // Accessors
    public function getShortContactInfoAttribute()
    {
        return substr($this->contact_info, 0, 20) . '...';
    }

    // Scopes
    public function scopeActiveSuppliers($query)
    {
        return $query->whereHas('inventories', function ($q) {
            $q->where('quantity', '>', 0);
        });
    }

    // Custom Query Method
    public static function suppliersWithInventory()
    {
        return self::with('inventories')->get();
    }
}
