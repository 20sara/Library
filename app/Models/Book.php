<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'auther_name',
        'price',
        'description',
        'quantity',
        'book_img',
        'category_id',

    ];
    
    public function category(){
        
        return $this->belongsTo(Category::class);
        
    }


// Route::resource('/category',CategoryController::class);
// Route::post('/category/updated/{id}',[CategoryController::class,'update'])->name('category.updated');
// Route::get('category/delete/{id}',[CategoryController::class,'delete'])->name('category.delete');


//       // ////  Routes  of categories ************

// Route::resource('books',BookController::class);
// Route::post('/book/updated/{id}',[BookController::class,'updated'])->name('books.updated');
// Route::get('book/delete/{id}',[BookController::class,'delete'])->name('book.delete');

}
