<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = "book"; // jika tidak protect maka akan auto ke tabel book
    protected $fillable = ["name", "description", "price", "image"]; //yang boleh masuk ke tabel
}
