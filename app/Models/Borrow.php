<?php

namespace App\Models;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Borrow extends Model
{
    use HasFactory;

    protected $fillable=[
        'user_id',
        'book_id',
        'status',
    ];


    public function book(){
        
        return $this->belongsTo(Book::class);
        
    }

    public function user(){
        
        return $this->belongsTo(User::class);
        
    }
}
