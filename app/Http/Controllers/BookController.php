<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;

class BookController extends Controller
{
    public function index()
    {
        $data = Book::all();
        return view('admin.book.show_book',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){

        $data=Category::all();

        return view('admin.book.create_book',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $request->validate([
            'title' => 'required|max:255',
            'price' => 'required|max:255',
            'quantity' => 'required|integer',
            
          ]);

          $book_image=$request->book_img;

          if($book_image){
             $book_image_name = time(). '.' .$book_image->getClientOriginalExtension();

                $request->book_img->move('book', $book_image_name);

         }

        Book::create([
            'title'=> $request->title,
            'auther_name' => $request->aut_name,
            'price'=> $request->price,
            'description'=> $request->description,
            'quantity'=> $request->quantity,
            'category_id'=> $request->categoryId,
            'book_img' => $book_image_name

            ]);
    
      return redirect()->route('books.index');
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        $data =  Book::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data =  Book::findOrFail($id);
        $category=Category::all();

        return view('admin.book.edit_book',compact('data','category'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function Updated(Request $request, $id)
    {

        // $request->validate([
        //     'title' => 'required|max:255',
        //     'price' => 'required|max:255',
        //     'quantity' => 'required|integer',
            
        //   ]);



         $data =  Book::findOrFail($id);
         
         $book_image=$request->book_img;

         if($book_image){
            $book_image_name = time(). '.' .$book_image->getClientOriginalExtension();

               $request->book_img->move('book', $book_image_name);

         }
         $data->update([
            'title'=> $request->title,
            'auther_name' => $request->aut_name,
            'price'=> $request->price,
            'description'=> $request->description,
            'quantity'=> $request->quantity,
            'category_id'=> $request->categoryId,
            'book_img' => $book_image_name
            ]);
          
         
            return redirect()->route('books.index');
    
    }
    /**
     * Remove the specified resource from storage.
     */
    // 

  public function delete( string $id)
    {
        Book::destroy($id);
        
        return redirect()->route('books.index');
       
    }
}
