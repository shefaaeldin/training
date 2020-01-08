
<html>
    <head>
           <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{asset('front_styles/css/style.css')}}" rel="stylesheet">
    <link href="{{asset('front_styles/css/bootstrap.min.css')}}" rel="stylesheet">   
    <link href="{{asset('front_styles/css/slick-theme.css')}}" rel="stylesheet">
    <link href="{{asset('front_styles/css/slick.css')}}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a67dcd7468.js" crossorigin="anonymous"></script>
        @yield('head')
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
                                             <a class="dropdown-item ml-0" href="{{ route('news.front.category',['id' =>$category->id])}}">{{$category->name}}</a>
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
                    <a href="{{route('news.front.index')}}" class="nav-link">News</a>
                </li>
                <li class="nav-item">
                    <a href="{{route('articles.front.index')}}" class="nav-link"> Articles</a>
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

            @yield('body')
            
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

            @yield('scripts')

    </body>




</html>
