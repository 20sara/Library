<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">

    @vite(['resources/css/homeAdmin.css'])


    <title>Admin DashBoard</title>
</head>

<body>

    

    <input type="checkbox" id="check">
    <label for="check">
        <i class="fas fa-bars" id="btn"></i>
        <i class="fas fa-times" id="cancel"></i>
    </label>
    <div class="sidebar">
        <header>Admin DashBoard</header>

        <a href="{{ route('category.index') }}" class="active">
            <i class="fas fa-qrcode"></i>
            <span>Category</span>
        </a>

        <a href="{{ route('books.index') }}">
            <i class="fas fa-link"></i>
            <span>Books</span>
        </a>

        <a href="{{ route('Borrow_Request') }}">
            <i class="fas fa-stream"></i>
            <span>Borrow Request</span>
        </a>
        <
    </div>

   
    

    <div class="container">
        <div class="box">Total Users
            <h3>{{ $user }}</h3>
        </div>
        <div class="box">Total Books
            <h3>{{ $book }}</h3>
        </div>
        <div class="box">Borrowed Books
            <h3>{{$borrow_approved}}</h3>
        </div>
        <div class="box">Returned Book
            <h3>{{ $borrow_returned }}</h3>
        </div>
    </div>

</body>

<div class="frame">



    <p> Responsive </p>
    <h2>SIDE BAR</h2>
    <p>in Pure CSS</p>

</div>

</body>

</html>
