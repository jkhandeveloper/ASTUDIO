<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AttributeValue extends Model
{
    use HasFactory;

    protected $fillable = ['attribute_id', 'entity_id', 'value'];

    protected $hidden = [
        'attribute_id',
        'entity_id'
    ];

    public function attribute(): BelongsTo
    {
        return $this->belongsTo(Attribute::class);
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'entity_id');
    }
    public static function getValidationRules()
    {
        return [
            'value' => 'required|string',
        ];
    }
}