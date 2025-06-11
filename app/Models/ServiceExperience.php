<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceExperience extends Model
{
    use HasFactory;

    protected $table = 'service_experiences';

    protected $fillable = [
        'user_id',
        'rating',
        'courteous_staff',
        'completion_time',
        'easy_to_understand',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}