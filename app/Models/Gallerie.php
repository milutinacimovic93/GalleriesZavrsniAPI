<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallerie extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'user_id'];

    public function author()
  {
    return $this->belongsTo(User::class, 'user_id');
  }
}
