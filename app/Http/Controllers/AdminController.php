<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Borrow;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
   public function authLogin(){

      if(Auth::id()){
        $usertype=Auth()->user()->userType;

         if(  $usertype =='admin'){

            $user = User::all()->count();
            $book = Book::all()->count();
            $borrow_approved = Borrow::where('status','approved')->count();
            $borrow_returned = Borrow::where('status','returned')->count();
            return view('admin.home' , compact('user','book','borrow_approved' ,'borrow_returned'));
         }
            
         else if($usertype =='user'){
            
            $data=Book::all();
 
            $category =  Category::all();
            return view('user.home' ,compact('data' ,'category'));
         }
         else{
            return redirect()->back();
         }
      }

   }

   //  ******************************************************
   public function borrow_request(){
      $data= Borrow::all();
      return view('admin.borrow_request' , compact('data'));
   }
 
   //  ******************************************************

   public function approvedRequest ($id){
   
        $data = Borrow::find($id);
         
        $status=$data->status;
            
        //// to not decremet quantity along until status = approve
        if($status == 'approved'){
          return redirect()->back();
        }
        else{
            /// done change status
         $data->status = 'approved';
         
         $data->save();

         
         /////  to decrement quantity when approve

         $bookId = $data->book_id;

         $book = Book::find($bookId);

         $book_quty = $book->quantity - 1;

         $book->quantity = $book_quty;

         $book ->save();

         return redirect()->back();

        }
        
   }

      //  ******************************************************

   public function rejectedRequest ($id){
   
       $data = Borrow::find($id);
          
       $data->status = 'rejected';
       
       $data->save();

       return redirect()->back();

   }    



//  *********************************************************

public function returnedRequest ($id){
   
   $data = Borrow::find($id);
    
   $status=$data->status;
       
   //// to not incremet quantity along until status = approve
   if($status == 'returned'){
     return redirect()->back();
   }
   else{
       /// done change status
    $data->status = 'returned';
    
    $data->save();

    
    /////  to increment quantity when approve

    $bookId = $data->book_id;

    $book = Book::find($bookId);

    $book_quty = $book->quantity + 1;

    $book->quantity = $book_quty;

    $book ->save();

    return redirect()->back();

   }
   
}



}
