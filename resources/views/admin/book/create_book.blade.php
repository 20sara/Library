

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
    @vite(['resources/css/app.css','resources/css/create.css','resources/js/app.js'])


    <style>
      .div_center{
          text-align: center;
          margin: auto;
      }
    
      label{
        display: inline-block;
        width: 200px;
        margin-left: 50px;
      }
    </style>

 <title>create Book</title>

</head>
<body>

 <h2> Add Book </h2>
   <br>
   <div class="div_center">
<form action=" {{ route('books.store') }} " method="POST" enctype="multipart/form-data" >

    @csrf  
  <div>      

    <label for="title">Book Name</label>
                
    <input type="text" name="title" value="{{ old('name') }}"  class="@error('name') is-invalid @enderror">
       @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

  </div>

  <div>      

    <label for="aut_name">Auther Name</label>
                
    <input type="text" name="aut_name"     value="{{ old('name') }}"  class="@error('name') is-invalid @enderror">
       @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

  </div>

  <div>      

    <label for="price">Price</label>
                
    <input type="text" name="price"     value="{{ old('name') }}"  class="@error('name') is-invalid @enderror">
       @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

  </div>

  <div>      

    <label for="quantity">Quantity</label>
                
    <input type="text" name="quantity"     value="{{ old('name') }}"  class="@error('name') is-invalid @enderror">
       @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

  </div>

  <div>      

    <label for="description">Description</label>
                
    <textarea name="description"   style="margin-top: 12px"  value="{{ old('name') }}"  class="@error('name') is-invalid @enderror">
       @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </textarea>    

  </div>

  

  <div>      

    <label for="categoryId">Category</label>
                
    <select required name="categoryId">
      <option > Select a Category</option>
       @foreach ( $data as $data )
       <option value="{{ $data->id }}" > {{ $data->cat_title }} </option>
       @endforeach
      
    </select>

  </div>

  <div>      

    <label for="book_img">Image Book</label>
                
    <input type="file" name="book_img"     value="{{ old('name') }}"  class="@error('name') is-invalid @enderror">
       @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

  </div>
 
  <button type="submit" class="btn btn-primary">Insert Book</button>

</div>

</form>
</body>
</html> 





