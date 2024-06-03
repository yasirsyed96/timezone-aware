<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Record extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'task_name', 'task_description', 'task_time',
    ];

    protected $dates = [
        'task_time',
    ];

    public function getTaskTimeAttribute($value)
    {
        $timezone = auth()->user()->timezone ?? config('app.timezone');
        return Carbon::parse($value)->timezone($timezone);
    }

    // Define the relationship with User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
