<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $table = 'feedbacks';
    protected $fillable = [
        'user_id',
        'full_name',
        'age',
        'gender',
        'barangay',
        'rating',
        'service_used',
        'suggestions',
    ];

    protected $casts = [
        'service_used' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}