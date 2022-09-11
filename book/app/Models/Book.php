<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = "book"; // jika tidak protect maka akan auto ke tabel book
    protected $fillable = ["name", "description", "price", "category_id", "image"]; //yang boleh masuk ke tabel

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
