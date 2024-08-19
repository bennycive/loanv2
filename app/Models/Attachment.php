<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    use HasFactory;
    

    protected $fillable = [
        'user_id',
        'attachment_type',
        'card_number',
        'license_category',
        'front_image',
        'back_image',
    ];

    // Relationship with User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    
}
