<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index(){
       
        $data =   Book::all();
        $category =  Category::all();
        return view('user.home' ,compact('data' , 'category'));
    }

    public function borrow_Book($id){

        $data=Book::find($id);

        $book_id = $id;

        $quantity_book= $data->quantity;
        
          if( $quantity_book >= '1')
           {
             if(Auth::id()) {

                $user_id=Auth()->user()->id;

                Borrow::create([
                    'user_id' => $user_id,
                    'book_id' => $book_id,
                    'status' => 'applied'
                ]);

                return redirect()->back()->with('message', "A request is sending to admin to borrow this book");  
              
            }

            else{

                return redirect()->route('login');
            }

          }
          else
          {
             return redirect()->back()->with('message', "Not enough book Available");

          }
       
    }

    ////*********************************************** */

    public function book_history(){

        $user_id=Auth::user()->id;

        $data = Borrow::where('user_id' , '=' , $user_id)->get();

        return view('user.history_book',compact('data'));

    }

    //////////*************************************** */

    public function cancel_Request($id){

        $data= Borrow::find($id);
        $data->delete();
        return redirect()->back()->with('message', "Borrow Book Cancel Successfully");

    }

    //////////******************************************* */

    public function explore_Books(){

        $category = Category::all();

        $data= Book::all();
        return view('user.explore_book' , compact('data' , 'category'));
    
    }

    public function search_Books(Request $request){

        $category = Category::all();

        $search = $request->search;
        
        $data= Book::where( 'title' , 'LIKE' , '%'.$search.'%') ->
          
            orWhere('auther_name' , 'LIKE' , '%'. $search .'%')->get();

        return view('user.explore_book' , compact('data','category'));
    }


    //////////////************************************************** */

    public function search_Category($id){

        $category = Category::all();
        $data= Book::where( 'category_id' ,$id) ->get();

        return view('user.explore_book' , compact('data','category'));
        
    }

    // public function show_Category()
    // {

    //     $data =  Category::all();
    //     return view('user.category',compact('data'));
    // }

    public function show_DetailsBook( $id)
    {
        $data = Book::find($id);
        return view('user.detail_book',compact('data'));
    }



   

}
