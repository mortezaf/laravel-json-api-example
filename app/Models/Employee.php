<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = ['birth_date', 'first_name', 'last_name', 'gender', 'hire_date'];

    protected $dates = ['birth_date', 'hire_date'];

    public function departments(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Department::class);
    }

    public function managers(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Department::class, 'department_manager');
    }

    public function titles(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Title::class);
    }

    public function title(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Title::class)->orderByDesc('from_date');
    }

    public function salary(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Salary::class)->orderByDesc('from_date');
    }

    public function salaries(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Salary::class);
    }
}