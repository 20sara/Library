<!DOCTYPE html>
<html lang="en">

<head>
    @include('user.css')

    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>

    @include('user.header')

    <div class="currently-market">
        <div class="container">
            <div class="row">


                @if (session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}

                        <button style="margin-left: 800px; background-color:rgb(212, 122, 122); " type="button"
                            class="close" data-bs-dismiss="alert" aria-hidden="true"> x </button>

                    </div>
                @endif


                <div class="container  mt-5 ">

                    <table class="table table-dark table-striped">

                        <tr>
                            <th scope="col">Book Title</th>
                            <th scope="col">Auther Name</th>
                            <th scope="col">Book Status</th>
                            <th scope="col">Image Book</th>
                            <th scope="col">Cancel Request</th>
                        </tr>

                        @foreach ($data as $data)
                            <tr>
                                <td> {{ $data->book->title }} </td>
                                <td> {{ $data->book->auther_name }} </td>
                                <td> {{ $data->status }} </td>

                                <td>

                                    <img width="10px" height="80px" src=" book/{{ $data->book->book_img }} "
                                        alt="">

                                </td>

                                <td>
                                    @if ($data->status == 'applied')
                                        <a href="{{ route('Cancel_Request', $data->id) }}">
                                            <button type="button" class="btn btn-danger"> Cancel Request </button>
                                        </a>
                                    @else
                                        <p style=" color: white; font-weight: bold"> Not Allowed</p>
                                    @endif

                                </td>
                            </tr>
                        @endforeach

                    </table>

                </div>


            </div>
        </div>
    </div>

    @include('user.footer')


    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.7.1.js"></script>
    <script src="js/popper.min.js"></script>

</body>

</html>
