@extends('layouts.front_layout')

@section('head')

    <title>Home</title>
    <style>
       p{
          
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;  
    }
    </style>
    
    @endsection


@section('body')



<section class="container">
    <!--  main section  -->
    <section class="main-sec">
        <h2 class="title mb-5 text-uppercase font-weight-bold">bugünün seçtikleri</h2>
        <div class="row no-gutters mb-5">
            <div class="col-sm col-md-8 pl-0">

            
                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleControls" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleControls" data-slide-to="1"></li>
                        <li data-target="#carouselExampleControls" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">

                    @isset($news[0])
                        <div class="carousel-item active">
                            <a href="{{ route('news.details', ['id' => $news[0]->id])}}">
                                <img src="{{asset('storage/'.$news[0]->images->first()->path)}}" class="d-block w-100 mb-4">
                                <h3>{{$news[0]->main_title}}</h3>
                            </a>
                            <p class='block-with-text'>{!!$news[0]->sub_title!!}</p>
                        </div>

                        @endisset

                        @isset($news[1])
                        <div class="carousel-item">
                            <a href="{{ route('news.details', ['id' => $news[1]->id])}}">
                                <img src="{{asset('storage/'.$news[1]->images->first()->path)}}" class="d-block w-100 mb-4">
                                <h3>{{$news[1]->main_title}}</h3>
                            </a>
                           <p class='block-with-text'>{!!$news[1]->sub_title!!}</p>
                        </div>
                        @endisset

                        @isset($news[2])
                        <div class="carousel-item">
                            <a href="{{ route('news.details', ['id' => $news[2]->id])}}">
                                <img src="{{asset('storage/'.$news[2]->images->first()->path)}}" class="d-block w-100 mb-4">
                                <h3>{{$news[2]->main_title}}</h3>
                            </a>
                            <p class='block-with-text'>{!!$news[2]->sub_title!!}</p>
                        </div>
                        @endisset
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

               

                <!--
                <img src="img/roya-ann-miller-_T9A8yrMqHY-unsplash.jpg" alt="" class="w-100 img-fluid mb-4">
                <a href="Details.html">
                    <h3>Lorem ipsum dolor, sit amet consectetur adipisicing elit</h3>
                </a>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus imperdiet, nulla et
                    dictum interdum, nisi lorem egestas vitae scel erisque enim ligula venenatis dolor.
                    Maecenas nisl est, ultrices nec
                    congue eget, auctor vitae massa. Fusce luctus vestibulum augue ut aliquet. Nunc
                    sagittis dictum nisi, sed ullamcorper ipsum dignissim ac. In at libero sed nunc
                    venenatis imperdiet sed ornare turpis. Donec vitae dui eget tellus gravida
                    venenatis. Integer fringilla congue eros non fermentum. Sed dapibus pulvinar nibh
                    tempor porta. -->
            </div>
            <div class="offset-md-1 col-sm col-md-3 pl-0">
            @isset($news[3])
                <div class="art1 mb-4">
                    <img src="{{asset('storage/'.$news[3]->images->first()->path)}}" alt="" class="w-100 img-fluid mb-3">
                    <a href="{{ route('news.details', ['id' => $news[3]->id])}}"><h5>{{$news[3]->main_title}}</h5></a>
                    <p class='block-with-text'>{!!$news[3]->sub_title!!}</p>
                </div>

                @endisset

                @isset($news[4])
                <div class="art2">
                    <img src="{{asset('storage/'.$news[4]->images->first()->path)}}" alt="" class="w-100 img-fluid mb-3">
                    <a href="{{ route('news.details', ['id' => $news[3]->id])}}"><h5>{{$news[4]->main_title}}</h5></a>
                    <p class='block-with-text'>{!!$news[4]->sub_title!!}</p>
                </div>

                @endisset

            </div>
        </div>
    </section>
    <!-- end of main section -->

    <!-- en cok oku   -->


    <section class="en-cok-oku">
        <h2 class="title mb-5 text-uppercase font-weight-bold">En çok okunanlar</h2>
        <div class="regular">
        @isset($articles)
            @foreach($articles as $article)
            <a href="{{ route('news.details', ['id' => $article->id])}}">
                <figure>
                    <img src="{{asset('storage/'.$article->images->first()->path)}}"
                         class="w-100 img-fluid mb-3">
                    <figcaption>{{$article->main_title}}</figcaption>
                </figure>
            </a>
            @endforeach

            @endisset

            
<!--            <a href="Details.html">
                <figure class="figure mb 5">
                    <img src="{{asset('front_styles/img/markus-spiske-pKx_zEJSIr0-unsplash.jpg')}}"
                         class="w-100 img-fluid mb-3">
                    <figcaption>Lorem ipsum dolor, sit amet consectetur adipisicing elit</figcaption>
                </figure>
            </a>
            <a href="Details.html">
                <figure>
                    <img src="{{asset('front_styles/img/roya-ann-miller-nlmq5jC9Slo-unsplash.jpg')}}"
                         class="w-100 img-fluid mb-3">
                    <figcaption>Lorem ipsum dolor, sit amet consectetur adipisicing elit</figcaption>
                </figure>
            </a>
            <a href="Details.html">
                <figure>
                    <img src="{{asset('front_styles/img/franck-v-g29arbbvPjo-unsplash.jpg')}}"
                         class="w-100 img-fluid mb-3">
                    <figcaption>Lorem ipsum dolor, sit amet consectetur adipisicing elit</figcaption>
                </figure>
            </a>
            <a href="Details.html">
                <figure>
                    <img src="{{asset('front_styles/img/gentrit-sylejmani-JjUyjE-oEbM-unsplash.jpg')}}"
                         class="w-100 img-fluid mb-3">
                    <figcaption>Lorem ipsum dolor, sit amet consectetur adipisicing elit</figcaption>
                </figure>
            </a>
            <a href="Details.html">
                <figure>
                    <img src="{{asset('front_styles/img/ev-Thc9xjSu4dM-unsplash.jpg')}}"
                         class="w-100 img-fluid mb-3">
                    <figcaption>Lorem ipsum dolor, sit amet consectetur adipisicing elit</figcaption>
                </figure>
            </a>
            <a href="Details.html">
                <figure>
                    <img src="{{asset('front_styles/img/andrew-palmer-HpM4zwXAa88-unsplash.jpg')}}"
                         class="w-100 img-fluid mb-3">
                    <figcaption>Lorem ipsum dolor, sit amet consectetur adipisicing elit</figcaption>
                </figure>
            </a>
            <a href="Details.html">
                <figure>
                    <img src="{{asset('front_styles/img/andrew-palmer-HpM4zwXAa88-unsplash.jpg')}}"
                         class="w-100 img-fluid mb-3">
                    <figcaption>Lorem ipsum dolor, sit amet consectetur adipisicing elit</figcaption>
                </figure>
            </a>-->

        </div>
    </section>

    <!-- end en cok   -->

    <!-- categories section -->
    <section class="categories">
        <h2 class="title mb-5 text-uppercase front-weight-bold">categories</h2>
        <div class="row img-art mb-5">
        @isset($categories[0])
            <div class="col-sm col-md-6 col-lg-3 img-over">
                <a href="Category.html">
                    <figure><img src="{{asset('storage/'.$categories[0]->news()->orderBy('created_at', 'DESC')->first()->images->first()->path)}}" alt=""
                                 class="w-100 img-fluid mb-3">
                    </figure>
                    <div class="overlay">
                        <h6 class="text-uppercase">{{$categories[0]->name}}</h6>
                        <p>lorem ipsum dolar sit</p>
                    </div>
                </a>
            </div>
            @endisset

            @isset($categories[1])
            <div class="col-sm col-md-6 col-lg-3 img-over">
                <figure><img src="{{asset('storage/'.$categories[1]->news()->orderBy('created_at', 'DESC')->first()->images->first()->path)}}" alt=""
                             class="w-100 img-fluid mb-3"></figure>
                <div class="overlay">
                    <h6 class="text-uppercase">{{$categories[1]->name}}</h6>
                    <p>lorem ipsum dolar sit</p>
                </div>
            </div>
            @endisset

            @isset($categories[2])
            <div class="col-sm col-md-6 col-lg-3 img-over">
                <figure><img src="{{asset('storage/'.$categories[2]->news()->orderBy('created_at', 'DESC')->first()->images->first()->path)}}" alt=""
                             class="w-100 img-fluid mb-3"></figure>
                <div class="overlay">
                    <h6 class="text-uppercase">{{$categories[2]->name}}</h6>
                    <p>lorem ipsum dolar sit</p>
                </div>
            </div>
            @endisset

            @isset($categories[3])
            <div class="col-sm col-md-6 col-lg-3 img-over">
                <figure><img src="{{asset('storage/'.$categories[3]->news()->orderBy('created_at', 'DESC')->first()->images->first()->path)}}" alt="" class="w-100 img-fluid mb-3"></figure>
                <div class="overlay">
                    <h6 class="text-uppercase">{{$categories[3]->name}}</h6>
                    <p>lorem ipsum dolar sit</p>
                </div>
            </div>
            @endisset

            @isset($categories[0])
            <div class="card col-sm col-md-6 col-lg-3 border-bottom mb-3" style="max-width: 540px;">
                <div class="row no-gutters mb-3 ">
                    <div class="col-md-4">
                        <img src="{{asset('storage/'.$categories[0]->news()->orderBy('created_at', 'DESC')->first()->images->first()->path)}}" class="card-img w-100 mt-3"
                             alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body ">
                            <p class="mb-0">{{$categories[0]->news()->orderBy('created_at', 'DESC')->first()->main_title}}</p>
                            <p class="card-text"><small class="text-muted">published 0 mins ago</small></p>
                        </div>
                    </div>
                </div>
            </div>
            @endisset


            @isset($categories[1])
            <div class="card col-sm col-md-6 col-lg-3 border-bottom mb-3" style="max-width: 540px;">
                <div class="row no-gutters mb-3 ">
                    <div class="col-md-4">
                        <img src="{{asset('storage/'.$categories[1]->news()->orderBy('created_at', 'DESC')->first()->images->first()->path)}}" class="card-img w-100 mt-3" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body ">
                            <p class="mb-0">{{$categories[1]->news()->orderBy('created_at', 'DESC')->first()->main_title}}</p>
                            <p class="card-text"><small class="text-muted">published 0 mins ago</small></p>
                        </div>
                    </div>
                </div>
            </div>
            @endisset
    
            @isset($categories[2])
            <div class="card col-sm col-md-6 col-lg-3 border-bottom mb-3" style="max-width: 540px;">
                <div class="row no-gutters mb-3 ">
                    <div class="col-md-4">
                        <img src="{{asset('storage/'.$categories[2]->news()->orderBy('created_at', 'DESC')->first()->images->first()->path)}}" class="card-img w-100 mt-3"
                             alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body ">
                            <p class="mb-0">{{$categories[2]->news()->orderBy('created_at', 'DESC')->first()->main_title}}</p>
                            <p class="card-text"><small class="text-muted">published 0 mins ago</small></p>
                        </div>
                    </div>
                </div>
            </div>
            @endisset

            @isset($categories[3])
            <div class="card col-sm col-md-6 col-lg-3 border-bottom mb-3" style="max-width: 540px;">
                <div class="row no-gutters mb-3 ">
                    <div class="col-md-4">
                        <img src="{{asset('storage/'.$categories[3]->news()->orderBy('created_at', 'DESC')->first()->images->first()->path)}}" class="card-img w-100 mt-3" alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body ">
                            <p class="mb-0">{{$categories[3]->news()->orderBy('created_at', 'DESC')->first()->main_title}}</p>
                            <p class="card-text"><small class="text-muted">published 0 mins ago</small></p>
                        </div>
                    </div>
                </div>
            </div>
            @endisset

            @isset($categories[0])
            <div class="card col-sm col-md-6 col-lg-3 mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="{{asset('storage/'.$categories[0]->news()->orderBy('created_at', 'DESC')->skip(1)->take(1)->first()->images->first()->path)}}" class="card-img w-100 mt-3"
                             alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <p class="mb-0">{{$categories[0]->news()->orderBy('created_at', 'DESC')->skip(1)->take(1)->first()->main_title}}</p>
                            <p class="card-text"><small class="text-muted">published 1 mins ago</small></p>
                        </div>
                    </div>
                </div>
            </div>
            @endisset

           @isset($categories[1])
            <div class="card col-sm col-md-6 col-lg-3 mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="{{asset('storage/'.$categories[1]->news()->orderBy('created_at', 'DESC')->skip(1)->take(1)->first()->images->first()->path)}}" class="card-img w-100 mt-3"
                             alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <p class="mb-0">{{$categories[1]->news()->orderBy('created_at', 'DESC')->skip(1)->take(1)->first()->main_title}}</p>
                            <p class="card-text"><small class="text-muted">published 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
            </div>
            @endisset

            @isset($categories[2])
            <div class="card col-sm col-md-6 col-lg-3 mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="{{asset('storage/'.$categories[2]->news()->orderBy('created_at', 'DESC')->skip(1)->take(1)->first()->images->first()->path)}}" class="card-img w-100 mt-3"
                             alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <p class="mb-0">{{$categories[2]->news()->orderBy('created_at', 'DESC')->skip(1)->take(1)->first()->main_title}}</p>
                            <p class="card-text"><small class="text-muted">published 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
            </div>
            @endisset

            @isset($categories[3])
            <div class="card col-sm col-md-6 col-lg-3 mb-3" style="max-width: 540px;">
                <div class="row no-gutters">
                    <div class="col-md-4">
                        <img src="{{asset('storage/'.$categories[3]->news()->orderBy('created_at', 'DESC')->skip(1)->take(1)->first()->images->first()->path)}}" class="card-img w-100 mt-3"
                             alt="...">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <p class="mb-0">{{$categories[3]->news()->orderBy('created_at', 'DESC')->skip(1)->take(1)->first()->main_title}}</p>
                            <p class="card-text"><small class="text-muted">published 3 mins ago</small></p>
                        </div>
                    </div>
                </div>
            </div>
            @endisset

        </div>
    </section>
    <!-- end of categories section -->

    <!-- world section  -->
    <section class="world">
        <h2 class="title mb-5 text-uppercase front-weight-bold">world news</h2>
        <div class="row">

        @isset($articles[0])
            <div class="col-sm col-md-6">
                <img src="{{asset('storage/'.$articles[0]->images->first()->path)}}" alt="" class="w-100 img-fluid mb-3">
                <h5 class="card-title">{{$articles[0]->main_title}}</h5>
                <p class="card-text">{{$articles[0]->sub_title}}</p>
            </div>
        @endisset

        
            <div class="col-sm col-md-6">
            @isset($articles[1])
                <div class="card mb-5" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="{{asset('storage/'.$articles[1]->images->first()->path)}}" class="card-img mb-3" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body pt-0">
                                <h5 class="card-title">{{$articles[1]->main_title}}</h5>
                                <p class="card-text">{{$articles[1]->sub_title}}</p>
                            </div>
                        </div>
                    </div>
                </div>

                @endisset

                @isset($articles[2])

                <div class="card mb-5" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="{{asset('storage/'.$articles[2]->images->first()->path)}}" class="card-img mb-3" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body pt-0">
                                 <h5 class="card-title">{{$articles[2]->main_title}}</h5>
                                <p class="card-text">{{$articles[2]->sub_title}}</p>
                            </div>
                        </div>
                    </div>
                </div>

                @endisset

                @isset($articles[3])
                <div class="card mb-3" style="max-width: 540px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="{{asset('storage/'.$articles[3]->images->first()->path)}}" class="card-img mb-3" alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body pt-0">
                                 <h5 class="card-title">{{$articles[3]->main_title}}</h5>
                                <p class="card-text">{{$articles[3]->sub_title}}</p>
                            </div>
                        </div>
                    </div>
                </div>

                @endisset
            </div>
        </div>
    </section>
    <!-- end of world section -->
</section>


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

