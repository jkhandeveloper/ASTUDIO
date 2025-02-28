<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
 
class Timesheet extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'project_id', 'task_name', 'date', 'hours'];

    protected $hidden = [
        'id',
        'user_id',
        'project_id',
        'created_at',
        'updated_at'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
    public static function getValidationRules()
{
    return [
        
        'task_name' => 'required|string',
        'user_id' => 'required',
        'project_id' => 'required',
        'date' => 'required|date',
        'hours' => 'required|integer',
    ];
}
}