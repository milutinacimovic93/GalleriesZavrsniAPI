<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'gallerie_id',
        'text',
    ];

    public function gallerie() {
        return $this->belongsTo(Gallerie::class);
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

}
