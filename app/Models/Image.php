<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = ['source','gallerie_id'];

    public function gallerie() {

        return $this->belongsTo(Gallerie::class);

    }

}
