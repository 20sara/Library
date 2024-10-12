<?php

use App\Http\Controllers\Book;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;







// Route::middleware([
//     'auth:sanctum',
//     config('jetstream.auth_session'),
//     'verified',
// ])->group(function () {
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->name('dashboard');
// });

Route::get('/', [UserController::class, 'index'])->name('home');



      // ////  Routes  of categories ************
      
      Route::resource('/category', CategoryController::class);
      Route::post('/category/updated/{id}', [CategoryController::class, 'update'])->name('category.updated');
      Route::get('category/delete/{id}', [CategoryController::class, 'delete'])->name('category.delete');


      // ////  Routes  of Books ************

      Route::resource('books', BookController::class);
      Route::post('/book/updated/{id}', [BookController::class, ' Updated'])->name('books.Updated');
      Route::get('book/delete/{id}', [BookController::class, 'delete'])->name('book.delete');


      //********************Routes of Borrow Books  ***************** */

      Route::get('/brrrowRequest', [AdminController::class, 'borrow_request'])->name('Borrow_Request');

      Route::get('/ApproveRequest/{id}', [AdminController::class, 'approvedRequest'])->name('approved_Request');
      Route::get('/ReturnRequest/{id}', [AdminController::class, 'returnedRequest'])->name('returned_Request');
      Route::get('/RejectRequest/{id}', [AdminController::class, 'rejectedRequest'])->name('rejected_Request');





Route::get('/home', [AdminController::class, 'authLogin'])->name('homed');



//********************Routes of Borrow Books  ***************** */

Route::get('/borrowBook/{id}', [UserController::class, 'borrow_Book'])->name('Borrow_Book');



Route::get('/BookHistory', [UserController::class, 'book_history'])->name('Book_History');

Route::get('/CancelRequest/{id}', [UserController::class, 'cancel_Request'])->name('Cancel_Request');


/////////////////  ********  show books in explore page /////////////

Route::get('/ExploreBooks', [UserController::class, 'explore_Books'])->name('Explore_Books');

Route::get('/SearchBooks', [UserController::class, 'search_Books'])->name('Search_Books');

Route::get('/SearchCategory/{id}', [UserController::class, 'search_Category'])->name('Search_Category');

Route::get('/DetailBook/{id}', [UserController::class, 'show_DetailsBook'])->name('Show_DetailsBook');



// if(Auth::user()->userType =='admin')
// {
//   return $next($request);
// }

// return redirect()->route('home');
