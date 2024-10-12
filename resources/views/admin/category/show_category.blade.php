
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Categories</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">

    <style>
      h2{
        color: rgb(161, 151, 151);
         margin-left: 120px;
         padding-top: 30px;
      }

      .container{
        width: 50%;
      }

    </style>
</head>
<body>

  

    <div>

        <h2> Show Categories </h2>
    </div>
    <div class="container  mt-5 " >

        <table class="table table-dark table-striped">
           
               <tr>
                    <th scope="col">Id</th>
                    <th scope="col">Category</th>
                    <th scope="col" colspan="3" > Action</th>
               </tr>
    
               @foreach ($data as $data)
               <tr>
                <td>{{ $data -> id }}</td>
                <td>{{ $data -> cat_title }}</td>
                 <td> 
                  <a href="{{ route('category.create') }}">
                    <button type="button" class="btn btn-warning">Insert</button>
                  </a>
                 </td>

                 <td> 
                   <a href="{{ route('category.edit',$data->id) }}">
                   <button type="button" class="btn btn-primary">Update</button>
                  </a>

                 </td>

                 <td> 
                     <a href="{{url('category/delete', $data->id) }}">
                        <button type="button" class="btn btn-danger">Delete</button>
                     </a>
                 </td>

              </tr>
               @endforeach 
           
        </table>
    
    </div>
    


    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.7.1.js"></script>
    <script src="js/popper.min.js"></script>


</body>
</html>




