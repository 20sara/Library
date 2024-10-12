<!-- ***** Preloader Start ***** -->
<div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</div>
<!-- ***** Preloader End ***** -->

<!-- ***** Header Area Start ***** -->
<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="{{ route('home') }}" class="logo">
                        <img src="assets/images/logo.png" alt="">
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li><a href="{{ route('home') }}" class="active">Home</a></li>
                        <li><a href="{{ route('Explore_Books') }}">Explore Books</a></li>
                       

                        @if (Route::has('login'))

                            @auth

                                <li><a href="{{ route('Book_History') }}">My History</a></li>

                                {{-- <div class="border-t border-gray-200"></div> --}}

                                <li>
                                    <form method="POST" action="{{ route('logout') }}" x-data>
                                        @csrf

                                        <span class="inline-flex rounded-md">
                                            <p > {{ Auth::user()->name }}  Login</p>  
        
                                                
                                            
                                        </span>
                                        
                                        <button
                                            style="background-color:black; color:white; 
                                               margin-top:5px; width: 100px; height: 5px;"
                                            type="submit" @click.prevent="$root.submit();">
                                            {{ __('Log Out') }}
                                        </button>
                                    </form>

                                </li>
                            @else
                                <li><a href="{{ route('login') }}">Login</a></li>

                                @if (Route::has('register'))
                                    <li><a href="{{ route('register') }}">Register</a></li>
                                @endif
                            @endauth

                        @endif




                    </ul>

                </nav>
            </div>
        </div>
    </div>
</header>
<!-- ***** Header Area End ***** -->
