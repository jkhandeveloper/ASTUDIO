<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */

    use HasApiTokens, HasFactory;

    protected $fillable = ['first_name', 'last_name', 'email', 'password'];

    
    protected $hidden = ['id', 'password', 'remember_token'];

    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class, 'project_user');
    }

    public function timesheets(): HasMany
    {
        return $this->hasMany(Timesheet::class);
    }

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    public static function getValidationRules()
{
    return [
        'first_name' => 'required|string',
        'last_name' => 'required|string',
        'email' => ['required', 'email','exists:users,email'],
    ];
}
}
