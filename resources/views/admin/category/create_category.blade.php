

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{--   using css style instead of link ref --}}
    @vite(['resources/css/app.css','resources/css/create.css','resources/js/app.js'])

 <title>create category</title>

</head>
<body>

 <h2> Add Category </h2>
   <br>
<form action=" {{ route('category.store') }} " method="POST" >

    @csrf  
    <div>      

    <label for="category">Category Name</label>
                
    <input type="text" name="category"     value="{{ old('name') }}"  class="@error('name') is-invalid @enderror">
       @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror

    </div>
    

     
  <button type="submit">Insert Category</button>



</form>
</body>
</html>