@extends('layouts.front_layout')

@section('head')

    <title>{{$news->main_title}}</title>
  
@endsection


@section('body')



<!-- details section -->
    <section class="container">
        <div class="row mb-5">
            <div class="col-sm col-md-8">
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleControls" data-slide-to="1"></li>
                        <li data-target="#carouselExampleControls" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                       
                        <div class="carousel-item active">
                            <a href="#">
                                <img src="{{asset('storage/'.$news->images->first()->path)}}" class="d-block w-100 mb-4">
                            </a>
                        </div>
                   
                        <div class="carousel-item">
                            <a href="#">
                                <img src="{{$news->images->get(1)? : asset('storage/'.$news->images->first()->path) }}" class="d-block w-100 mb-4">
                            </a>
                        </div>
                        <div class="carousel-item">
                            <a href="#">
                                <img src="{{$news->images->get(2) ? asset('storage/'.$news->images->get(2)->path) : asset('storage/'.$news->images->first()->path) }}" class="d-block w-100 mb-4">
                            </a>
                        </div>
                   
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                       data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                       data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                    </div>
                <h2 class="title mb-5 text-uppercase font-weight-bold">{{   $news->main_title}}</h2>
                {!!$news->content!!}
            </div>
            @if($relatedNews)
            <div class="col-sm col-md-4">
                <h5 class="title font-weight-bold text-uppercase mb-4">Related news</h5>
                
                @foreach($relatedNews as $rel)
                <div class="card mb-2" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md">
                            <img src="{{asset('storage/'.$rel->images->first()->path)}}" class="card-img mb-4" alt="...">
                        </div>
                        <div class="col-md">
                            <div class="card-body pt-0">
                                <h5 class="card-title">{{$rel->main_title}}</h5>
                                <p class="card-text">{{$rel->sub_title}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                @endforeach
               
            </div>
            @endif
        </div>
    </section>
    <!-- end of details  -->

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

