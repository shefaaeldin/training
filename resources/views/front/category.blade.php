@extends('layouts.front_layout')

@section('head')

    <title>{{$category->name}}</title>
  
@endsection

@section('body')
<section class="container">
    <!--  main section  -->
    <section class="main-sec">
        <div class="row no-gutters">
            <div class="col-sm col-md-8 pl-0 mb-5">
                
                @foreach($news[0] as $new)
                <section class="category-news mb-5">
                    <img src="{{asset('storage/'.$new->images->first()->path)}}" alt="" class="w-100 img-fluid mb-4">
                    <a href="{{ route('news.details', ['id' => $new->id])}}">
                        <h3>{{$new->main_title}}</h3>
                    </a>
                    <p> {!!$new->content!!} </p>
                </section>
                @endforeach
            </div>
            <div class="offset-md-1 col-sm col-md-3 pl-0">
                @foreach($news[1] as $new)
                <div class="art1 mb-4">
                    <img src="{{asset('storage/'.$new->images->first()->path)}}" alt="" class="w-100 img-fluid mb-3">
                    <a href="{{ route('news.details', ['id' => $new->id])}}">
                        <h5>{{$new->main_title}}</h5>
                    </a>
                    <p>{{$new->sub_title}}</p>
                </div>
               @endforeach
            </div>
        </div>

    </section>
    
    <!-- end of main section -->
    
       <!-- categories section -->
    <section class="category">
        <h2 class="title mb-5 text-uppercase font-weight-bold">other categories</h2>
        <div class="row img-art mb-5">
            
            @foreach($categories as $category)
            <div class="col-sm col-md-6 col-lg-3 img-over">
                <a href="{{ route('news.front.category',['id' =>$category->id])}}">
                    <figure><img src="{{asset('storage/'.$category->news()->orderBy('created_at', 'DESC')->first()->images->first()->path)}}" alt=""
                                 class="w-100 img-fluid mb-3">
                    </figure>
                    <div class="overlay">
                        <h6 class="text-uppercase">{{$category->name}}</h6>
                        <p>lorem ipsum dolar sit</p>
                    </div>
                </a>
            </div>
            
            @endforeach
        </div>
    </section>
    <!-- end of categories section -->
</section>>

@endsection

@section('scripts')

<!-- js files -->
<script src="{{asset('front_styles/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('front_styles/js/popper.min.js')}}"></script>
<script src="{{asset('front_styles/js/bootstrap.min.js')}}"></script>
<script src="{{asset('front_styles/js/slick.js')}}"></script>

<script>
    $(".regular").slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        centerPadding: 0,
        centerMode: false,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: true,
        responsive: [
            {
                breakpoint: 980, // tablet breakpoint
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    centerMode: true,
                }
            },
            {
                breakpoint: 480, // mobile breakpoint
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    centerMode: true,
                }
            }
        ],
        prevArrow: "<img class='a-left control-c prev slick-prev' alt='' src='{{asset('front_styles/img/img/back-2.png')}}'>",
        nextArrow: "<img class='a-right control-c next slick-next' alt='' src='{{asset('front_styles/img/img/next-2.png')}}'>"
    });
</script>

@endsection

