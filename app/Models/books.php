<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['book_title', 'book_description', 'book_auther', 'book_image'];
}