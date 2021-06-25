<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Gallerie extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'user_id'];

    public function user(){

    return $this->belongsTo(User::class);

    }

    public function images() {

    return $this->hasMany(Image::class);

    }

    public static function search($name="") {

        return self::where("name", "LIKE", "%$name%");

    }

    public function addImages($source, $id) {

        return $this->images()->create([
            'source' => $source,
            'gallery_id' => $id
        ]);

    }



}
