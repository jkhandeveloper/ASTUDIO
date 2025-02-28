<?php
namespace App\Http\Controllers;

use App\Models\Attribute;
use Illuminate\Http\Request;

class AttributeController extends ApiController
{
    protected $model = Attribute::class;
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|unique:attributes,name',
            'type' => 'required|in:text,date,number,select',
        ]);

        return Attribute::create($validated);
    }

    // public function update(Request $request, Attribute $attribute)
    // {
    //     $validated = $request->validate([
    //         'name' => 'sometimes|string|unique:attributes,name,' . $attribute->id,
    //         'type' => 'sometimes|in:text,date,number,select',
    //     ]);

    //     $attribute->update($validated);
    //     return response()->json(['message' => 'Attribute updated']);
    // }
}