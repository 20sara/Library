

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--   using css style instead of link ref --}}
    @vite(['resources/css/app.css','resources/css/create.css','resources/js/app.js'])

 <title>edit category</title>

 <style>
    h2{
      color: rgb(161, 151, 151);
       margin-left: 115px;
       padding-top: 20px;
       font-size: 30px ;
    }
 </style>

</head>
<body>

 <h2> Edit Category </h2>
   <br>
<form action="{{ route('category.updated',$data->id) }}" method="post" >

    @csrf  
    
    <div>      

    <label for="category">Category Name</label>
                
    <input type="text" name="category"     value="{{ $data->cat_title }}"  class="@error('name') is-invalid @enderror">
      
    </div>
    
   <button type="submit">Update Category</button>

</form>
</body>
</html>