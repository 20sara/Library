<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>edit Book</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <style>
        h2 {
            color: rgb(161, 151, 151);
            margin-left: 11px;
            padding: 30px;
            font-size: 30px;
            font-weight: bold;
        }

        label {
            display: inline-block;
            width: 200px;
        }

        input,select{
            width: 220px;
            height: 35px;
       }
       textarea{
        width: 250px;
        height: 100px;
       }

        .div_center {
            text-align: center;
            margin: auto;
        }

        .div_pad{
            padding: 15px;
        }
        body{
          background-color: rgb(161, 215, 236);
        }
        
    </style>
   
  
</head>

<body>

    <div class="div_center">
        <h2> Update Book </h2>

        <form action=" {{ url('/book/updated', $data->id) }} " method="post" enctype="multipart/form-data">
           
            @csrf
            {{-- @method(PATCH) --}}
            <div class="div_pad">
                <label for="title">Book Name</label>

                <input type="text" name="title" value="{{ $data->title }}"
                    class="@error('name') is-invalid @enderror">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="div_pad">

                <label for="aut_name">Auther Name</label>

                <input type="text" name="aut_name" value="{{ $data->auther_name }}">

            </div>

            <div class="div_pad">

                <label for="price">Price</label>

                <input type="text" name="price" value="{{ $data->price }}"
                    class="@error('name') is-invalid @enderror">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>

            <div class="div_pad">

                <label for="quantity">Quantity</label>

                <input type="text" name="quantity" value="{{ $data->quantity }}"
                    class="@error('name') is-invalid @enderror">
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror

            </div>

            <div class="div_pad">

              <label for="categoryId">Category</label>

              <select name="categoryId">

                  <option value="{{ $data->category_id }}"> {{ $data->category->cat_title }} </option>

                  @foreach ($category as $category)
                      <option value="{{ $category->id }}"> {{ $category->cat_title }} </option>
                  @endforeach

              </select>

          </div>

            <div class="div_pad">

                <label for="description">Description</label>

                <textarea name="description"> {{ $data->description }} </textarea>

            </div>

            <div class="div_pad">

                <label for="book_img" > Image Book Current</label>
                   <br>
                <img width="90px"  margin ="auto"  src="/book/{{ $data->book_img }} " alt="">

            </div>

            <div class="div_pad">
                <label for="book_img"> Change Image Book</label>
                <br>
                <br>
                <input type="file" name="book_img" ">
   
            </div >

            <div class="div_pad">

              <button type="submit" class="btn btn-primary">Update Book</button>

            </div>
    </div>      
    
  </form>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.7.1.js"></script>
    <script src="js/popper.min.js"></script>


 </body>
</html>
