<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed id
 * @property mixed salary
 * @property mixed from_date
 * @property mixed to_date
 * @property mixed employee_id
 */
class Salary extends Model
{
    use HasFactory;

    public $timestamps = false;

    public $incrementing = false;

    protected $primaryKey = ['employee_id','from_date'];

    protected $fillable = ['employee_id', 'salary', 'from_date', 'to_date'];

    protected $dates = ['from_date', 'to_date'];

    public function employee(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Employee::class);
    }
}
