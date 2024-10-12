<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    @include('user.css')

    @vite(['resources/css/input_search.css'])
</head>

<body>

    @include('user.header')

    <div class="currently-market">
        <div class="container">
            <div class="row">



                <div class="col-lg-10" style="margin-top: 45px;">
                    <div class="filters">
                        <ul>
                            <li data-filter="*" class="active">All Books</li>

                            @foreach ($category as $category)
                                <li data-filter="*">

                                    <a style="font-weight: bold; color: white;"
                                        href={{ route('Search_Category', $category->id) }}> {{ $category->cat_title }}
                                    </a>

                                </li>
                            @endforeach

                        </ul>
                    </div>
                </div>


                <br>
                <br>
                <form action="{{ route('Search_Books') }}" method="get">

                    <div class="wrap">
                        <div class="search">
                            <input type="search" name="search" class="searchTerm"
                                placeholder="Search For Book Name or Book Author ....">

                            {{-- <a href="{{route('Search_Books')}}"> --}}

                            <button type="submit" class="searchButton">
                                <i class="fa fa-search"></i>
                            </button>
                            {{-- </a> --}}

                        </div>
                    </div>
                </form>
                <br>
                <br>
                <br>

                <div class="col-lg-12">
                    <div class="row grid">

                        @foreach ($data as $data)
                            <div class="col-lg-6 currently-market-item all msc">
                                <div class="item">

                                    <div class="left-image">
                                        <img src="book/{{ $data->book_img }}" alt=""
                                            style="border-radius: 20px; min-width: 195px;">
                                    </div>

                                    <div class="right-content">

                                        <span class="bid">
                                            Book Name <h4> {{ $data->title }}</h4>
                                        </span>

                                        <br>

                                        <span class="bid">
                                            Auther Name <h6>{{ $data->auther_name }}</h6>
                                        </span>

                                        <div class="line-dec"></div>
                                        <span class="bid">
                                            Current Available<br><strong>{{ $data->quantity }}</strong><br>
                                        </span>

                                        <span class="ends">
                                            Price<br><strong>{{ $data->price }}</strong><br>
                                        </span>

                                        <div class="text-button">
                                            <a href="{{ route('Show_DetailsBook', $data->id) }}">View Item Details</a>
                                        </div>

                                        <br>
                                        <br>
                                        <br>
                                        <br>

                                        <div>
                                            <a class="btn btn-primary" href="{{ route('Borrow_Book', $data->id) }}">
                                                Apply to Borrow Book</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>



    @include('user.footer')


</body>

</html>
