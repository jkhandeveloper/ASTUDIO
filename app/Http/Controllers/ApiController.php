<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ApiController extends Controller
{
    protected $model;

    public function index(Request $request)
    {
        return response()->json($this->model::all());
    }

    public function show($id)
    {
        try {
            return response()->json($this->model::findOrFail($id));
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Not found'], 404);
        }
    }

    public function store(Request $request)
    {
        
        $validated = $request->validate($this->model::getValidationRules());
        return response()->json($this->model::create($validated), 201);
    }

    public function update(Request $request, $id)
    {
        try {
            $record = $this->model::findOrFail($id);
            $validated = $request->validate($this->model::getValidationRules());
            $record->update($validated);
            return response()->json($record);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Not found'], 404);
        }
    }

    public function destroy($id)
    {
        try {
            $this->model::findOrFail($id)->delete();
            return response()->json(['message' => 'Deleted successfully']);
        } catch (ModelNotFoundException $e) {
            return response()->json(['error' => 'Not found'], 404);
        }
    }
}