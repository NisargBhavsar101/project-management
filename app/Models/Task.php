<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    protected $table ="tasks";
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'type',
        'employee_id',
        'description',
        'total_time',
        'start_time',
        'end_time',
    ];

     public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

}
