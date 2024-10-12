
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Show Borrow Request</title>

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

        <h2> Show Borrow Request </h2>
    </div>
    <div class="container  mt-5 " >

        <table class="table table-dark table-striped">
           
               <tr>
                    <th scope="col">User</th>
                    <th scope="col">Email</th>
                    <th scope="col">Name Book </th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Borrow Status</th>
                    <th scope="col">Book Image</th>

                    <th scope="col" colspan="3" > Change Status</th>
               </tr>
    
               @foreach ($data as $data)
               <tr align="center">
                <td>{{ $data -> user->name }}</td>
                <td>{{ $data -> user->email }}</td>
                <td>{{ $data -> book->title }}</td>
                <td>{{ $data -> book->quantity }}</td>

                <td>

                  @if ($data ->status == 'approved')
                    <span style="color: yellow; "> {{ $data ->status }}</span>
                  
                  @endif

                  @if ($data ->status == 'returned')
                    <span style="color: skyblue; "> {{ $data ->status }}</span>
                  
                  @endif

                  @if ($data ->status == 'rejected')
                    <span style="color: rgb(221, 25, 42); "> {{ $data ->status }}</span>
                  
                  @endif


                  @if ($data ->status == 'applied'){
                    <span style="color: white; "> {{ $data ->status }}</span>
                  }
                  @endif
                   
                  
                </td> 

                <td>
                  <img  width="100px" height="150px" 
                    src="book/{{ $data -> book->book_img }}" alt="Image Book">
                </td>

                <td> 
                  <a href="{{ route('approved_Request' ,$data->id) }}">
                    <button type="button" class="btn btn-warning">Approved</button>
                  </a>
                 </td>
  
                 <td> 
                  <a href="{{route('returned_Request', $data->id ) }}">
                     <button type="button" class="btn btn-primary">Returned</button>
                  </a>
              </td>

                  
                 <td> 
                   <a href="{{ route('rejected_Request',$data->id) }}">
                   <button type="button" class="btn btn-danger"> Rejected </button>
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




