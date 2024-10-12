<div class="currently-market">
    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="section-heading">
            <div class="line-dec"></div>
            <h2><em>Books</em> Currently In The Library.</h2>
          </div>
        </div>

       
        <div class="col-lg-6">
          <div class="filters">
            <ul>
              <li data-filter="*"  class="active">All Books</li>
              <li data-filter=".msc">Popular</li>
              <li data-filter=".dig">Latest</li>
            </ul>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="row grid">

           @foreach ($data as $data)
             
         

            <div class="col-lg-6 currently-market-item all msc">
              <div class="item">

                <div class="left-image">
                  <img src="book/{{$data->book_img }}" alt="" style="border-radius: 20px; min-width: 195px;">
                </div>

                <div class="right-content">

                  <span class="bid">
                      Book Name  <h4> {{$data->title }}</h4>
                  </span>  

                   <br>

                  <span class="bid">
                    Auther Name  <h6>{{ $data->auther_name }}</h6>
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

                  <div>
                    <a  class="btn btn-primary" href="{{ route('Borrow_Book', $data->id) }}"> Apply to Borrow Book</a>
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

  