<?php
namespace App\Http\Controllers;

use App\Models\AttributeValue;
use Illuminate\Http\Request;

class AttributeValueController extends ApiController
{
    protected $model = AttributeValue::class;
    public function store(Request $request)
    {
        $validated = $request->validate([
            'attribute_id' => 'required|integer',
            'entity_id' => 'required|integer',
            'value' => 'required|string',
        ]);

        return AttributeValue::create($validated);
    }
}