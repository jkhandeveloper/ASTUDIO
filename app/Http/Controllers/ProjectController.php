<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Attribute;
use App\Models\AttributeValue;
use Illuminate\Http\Request;

class ProjectController extends ApiController
{
    protected $model = Project::class;

    public function index(Request $request)
    {
        $query = Project::query();

        if ($request->has('filters')) {
            foreach ($request->filters as $field => $filter) {
                // Extract operator and value
                [$operator, $value] = $this->extractOperatorAndValue($filter);

                if ($this->isEavAttribute($field)) {
                    $query->whereHas('attributes', function ($q) use ($field, $value, $operator) {
                        $q->whereHas('attribute', function ($subQ) use ($field) {
                            $subQ->where('name', $field);
                        })->where('value', $operator, $value);
                    });
                } else {
                    $query->where($field, $operator, $value);
                }
            }
        }

        return response()->json($query->get());
    }

    private function isEavAttribute($attributeName)
    {
        return Attribute::where('name', $attributeName)->exists();
    }

    private function extractOperatorAndValue($filter)
{
    if (preg_match('/^(>=|<=|>|<|=)\s*(.+)$/', $filter, $matches)) {
        return [$matches[1], $matches[2]];
    }
    return ['LIKE', "%$filter%"];
}
public function store(StoreProjectRequest $request)
{
    return Project::create($request->validated());
}
}