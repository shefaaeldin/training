@extends('layouts.front_layout')

@section('head')

    <title>Search results</title>
  
@endsection


@section('body')

@if($news->count() > 0)
 
        <div class="row no-gutters" style = "margin-left: 100px">
            
            <div class="col-sm col-md-8 pl-0 mb-5">
                
                @foreach($news as $new)
                <section class="category-news mb-5">
                    <img src="{{asset('storage/'.$new->images->first()->path)}}" alt="" class="w-50 img-fluid mb-4">
                    <a href="{{ route('news.details', ['id' => $new->id])}}">
                        <h3>{{$new->main_title}}</h3>
                    </a>
                    <p> {!!$new->content!!} </p>
                </section>
                @endforeach
            </div>
        </div>
     <div style = "margin-left: 100px">
     {{ $news->appends(['keyword' => $keyword])->links()}}
     </div>

@else

<div style = "margin-left: 100px">No search results matched the entered query!</div>
@endif



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

