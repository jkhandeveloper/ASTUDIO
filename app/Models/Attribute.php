<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Attribute extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type'];
    protected $hidden = ['id', 'created_at', 'updated_at'];

    public function values(): HasMany
    {
        return $this->hasMany(AttributeValue::class);
    }
    
    public static function getValidationRules()
    {
        return [
            'name' => 'required|string',
            'type' => 'required|string',
        ];
    }
}
