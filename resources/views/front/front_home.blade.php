<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('front_styles/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('front_styles/css/bootstrap.min.css')}}" rel="stylesheet">   
    <link href="{{asset('front_styles/css/slick-theme.css')}}" rel="stylesheet">
    <link href="{{asset('front_styles/css/slick.css')}}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a67dcd7468.js" crossorigin="anonymous"></script>
    <title>Home</title>
    <style>
       p{
          
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;  
    }
    </style>
</head>

<body>

<!-- navbar navbar navbar-expand-sm sticky-top mb-5 -->

<nav class="navbar navbar-expand-lg navbar-dark primary-color">

    <a href="index.html" class="navbar-brand logo order-1 mx-auto">
        <img class="col-md-10" src="{{asset('front_styles/img/blilgilm logo-01.png')}}" alt="logo">
    </a>

<!--    <section class="container">-->
<!--        <div class="collapse navbar-collapse order-4 order-md-2">-->
<!--            <ul class="navbar-nav text-uppercase">-->
<!--                <li>-->
<!--                    <img src="img/iconfinder_circle-facebook__317752.png">-->
<!--                </li>-->
<!--                <li>-->
<!--                    <img src="img/iconfinder_circle-facebook__317752.png">-->
<!--                </li>-->
<!--                <li>-->
<!--                    <img src="img/iconfinder_circle-facebook__317752.png">-->
<!--                </li>-->
<!--                <li>-->
<!--                    <img src="img/iconfinder_circle-facebook__317752.png">-->
<!--                </li>-->
<!--            </ul>-->
<!--        </div>-->
<!--    </section>-->
</nav>

<nav class="navbar navbar navbar-expand-lg sticky-top mb-5">
    <section class="container">

        <!--        <a href="index.html" class="navbar-brand logo order-1 mr-auto">-->
        <!--            <img src="img/blilgilm logo-01.png" alt="logo">-->
        <!--        </a>-->
        <button class="navbar-toggler ml-auto text-light order-3" data-toggle="collapse" data-target="#navigation">
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse order-4 order-md-2" id="navigation">
            <ul class="navbar-nav text-uppercase">
                <li class="nav-item">
                    <a href="/" class="nav-link active">home</a>
                </li>
                <li class="nav-item d-flex align-items-center">
                    <div class="d-flex">
                        <div class="dropdown mr-1">
                            <a href="#categories" class="nav-link" class=" dropdown-toggle" id="dropdownMenuOffset"
                               data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                               data-offset="10,20">categories <i class="fas fa-chevron-down"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                                
                                  @foreach($categories as $category)
                                             <a class="dropdown-item ml-0" href="#">{{$category->name}}</a>
                                        @endforeach
<!--                                <a class="dropdown-item ml-0" href="#">SPORTS</a>
                                <a class="dropdown-item ml-0" href="#">SPACE</a>
                                <a class="dropdown-item ml-0" href="#">POLITICS</a>
                                <a class="dropdown-item ml-0" href="#">TECHNOLOGY</a>-->
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="#world" class="nav-link">News</a>
                </li>
                <li class="nav-item">
                    <a href="#blog" class="nav-link"> Articles</a>
                </li>
                <li class="nav-item">
                    <a href="contact.html" class="nav-link"> contact</a>
                </li>
            </ul>
            <form class="form-inline ml-auto">
                <input class="form-control " type="text" placeholder="Search" aria-label="Search">
            </form>
        </div>
    </section>
</nav>
<!-- end of navbar -->

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
                        <div class="carousel-item active">
                            <a href="Details.html">
                                <img src="{{asset('storage/'.$news[0]->images->first()->path)}}" class="d-block w-100 mb-4">
                                <h3>{{$news[0]->main_title}}</h3>
                            </a>
                            <p class='block-with-text'>{!!$news[0]->sub_title!!}</p>
                        </div>
                        <div class="carousel-item">
                            <a href="Details.html">
                                <img src="{{asset('storage/'.$news[1]->images->first()->path)}}" class="d-block w-100 mb-4">
                                <h3>{{$news[1]->main_title}}</h3>
                            </a>
                           <p class='block-with-text'>{!!$news[1]->sub_title!!}</p>
                        </div>
                        <div class="carousel-item">
                            <a href="Details.html">
                                <img src="{{asset('storage/'.$news[2]->images->first()->path)}}" class="d-block w-100 mb-4">
                                <h3>{{$news[2]->main_title}}</h3>
                            </a>
                            <p class='block-with-text'>{!!$news[2]->sub_title!!}</p>
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
                <div class="art1 mb-4">
                    <img src="{{asset('storage/'.$news[3]->images->first()->path)}}" alt="" class="w-100 img-fluid mb-3">
                    <h5>{{$news[3]->main_title}}</h5>
                    <p class='block-with-text'>{!!$news[3]->sub_title!!}</p>
                </div>
                <div class="art2">
                    <img src="{{asset('storage/'.$news[4]->images->first()->path)}}" alt="" class="w-100 img-fluid mb-3">
                    <h5>{{$news[4]->main_title}}</h5>
                    <p class='block-with-text'>{!!$news[4]->sub_title!!}</p>
                </div>
            </div>
        </div>
    </section>
    <!-- end of main section -->

    <!-- en cok oku   -->


    <section class="en-cok-oku">
        <h2 class="title mb-5 text-uppercase font-weight-bold">En çok okunanlar</h2>
        <div class="regular">
            
            @foreach($articles as $article)
            <a href="Details.html">
                <figure>
                    <img src="{{asset('storage/'.$article->images->first()->path)}}"
                         class="w-100 img-fluid mb-3">
                    <figcaption>{{$article->main_title}}</figcaption>
                </figure>
            </a>
            @endforeach
            
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
            <div class="col-sm col-md-6 col-lg-3 img-over">
                <figure><img src="{{asset('storage/'.$categories[1]->news()->orderBy('created_at', 'DESC')->first()->images->first()->path)}}" alt=""
                             class="w-100 img-fluid mb-3"></figure>
                <div class="overlay">
                    <h6 class="text-uppercase">{{$categories[1]->name}}</h6>
                    <p>lorem ipsum dolar sit</p>
                </div>
            </div>
            <div class="col-sm col-md-6 col-lg-3 img-over">
                <figure><img src="{{asset('storage/'.$categories[2]->news()->orderBy('created_at', 'DESC')->first()->images->first()->path)}}" alt=""
                             class="w-100 img-fluid mb-3"></figure>
                <div class="overlay">
                    <h6 class="text-uppercase">{{$categories[2]->name}}</h6>
                    <p>lorem ipsum dolar sit</p>
                </div>
            </div>
            <div class="col-sm col-md-6 col-lg-3 img-over">
                <figure><img src="{{asset('storage/'.$categories[3]->news()->orderBy('created_at', 'DESC')->first()->images->first()->path)}}" alt="" class="w-100 img-fluid mb-3"></figure>
                <div class="overlay">
                    <h6 class="text-uppercase">{{$categories[3]->name}}</h6>
                    <p>lorem ipsum dolar sit</p>
                </div>
            </div>

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

        </div>
    </section>
    <!-- end of categories section -->

    <!-- world section  -->
    <section class="world">
        <h2 class="title mb-5 text-uppercase front-weight-bold">world news</h2>
        <div class="row">
            <div class="col-sm col-md-6">
                <img src="{{asset('storage/'.$articles[0]->images->first()->path)}}" alt="" class="w-100 img-fluid mb-3">
                <h5 class="card-title">{{$articles[0]->main_title}}</h5>
                <p class="card-text">{{$articles[0]->sub_title}}</p>
            </div>
            <div class="col-sm col-md-6">
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
            </div>
        </div>
    </section>
    <!-- end of world section -->
</section>

<!-- footer -->
<footer>
    <section class="container">
        <div class="row mb-4">
            <section class="products col-sm col-md-3 col-lg-4 mb-5">
                <h4 class="text-uppercase mb-4">top products</h4>
                <ul class="pl-0">
                    <li>Managed website</li>
                    <li>Manage Reputation</li>
                    <li>Power Tools</li>
                    <li>Marketing Servicse</li>
                </ul>
            </section>
            <section class="email col-sm col-md-6 col-lg-4 mb-5">
                <h4 class="text-uppercase mb-4">newsletter</h4>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit ipsum dolor</p>
                <form class="form-inline">
                    <div class="form-group mb-0">
                        <input type="email" class="form-control mr-2" id="exampleInputEmail1"
                               aria-describedby="emailHelp" placeholder="Enter email">
                    </div>
                    <button type="button" class="btn btn-primary ml-2">Subscribe</button>
                </form>
            </section>
            <section class="insta offset-lg-1 col-sm col-md-3 col-lg-3">
                <h4 class="text-uppercase mb-4">instagram feed</h4>
<!--                <figure>
                    <img src="{{asset('front_styles/img/markus-spiske-pKx_zEJSIr0-unsplash.jpg')}}" class="mb-1">
                    <img src="{{asset('front_styles/img/markus-spiske-pKx_zEJSIr0-unsplash.jpg')}}" class="mb-1">
                    <img src="{{asset('front_styles/img/markus-spiske-pKx_zEJSIr0-unsplash.jpg')}}" class="mb-1">
                    <img src=" {{asset('front_styles/img/markus-spiske-pKx_zEJSIr0-unsplash.jpg')}}" class="mb-1">
                    <img src=" {{asset('front_styles/img/markus-spiske-pKx_zEJSIr0-unsplash.jpg')}}">
                    <img src=" {{asset('front_styles/img/markus-spiske-pKx_zEJSIr0-unsplash.jpg')}}">
                    <img src=" {{asset('front_styles/img/markus-spiske-pKx_zEJSIr0-unsplash.jpg')}}">
                    <img src=" {{asset('front_styles/img/markus-spiske-pKx_zEJSIr0-unsplash.jpg')}}">
                </figure>-->
            </section>
        </div>
    </section>
    <section class="last text-center">
        <p>Copyright &copy; All Right Reserved 2019
        </p>
    </section>

</footer>
<!-- end of footer -->

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

</body>

</html>