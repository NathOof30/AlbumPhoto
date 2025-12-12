<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'photo_id',
        'user_id',
        'note',
    ];

    // Relation : une note appartient à une photo
    public function photo()
    {
        return $this->belongsTo(Photo::class, 'photo_id');
    }

    // Relation : une note appartient à un user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}