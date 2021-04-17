<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('sc/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/beranda.css') }}">
    <title>Hello, world!</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

    </style>
</head>

<body>
    <!-- //JUMBOTRON -->
    <article class="jumbotron">

        <!-- //JUMBOTRON - Figure -->
        <figure class="jumbotronFigure" id="jumbotronFigure">
            <img src="{{ asset('/gambar/background/back.jpg') }}" alt="" />
        </figure>
        <!-- JUMBOTRON - Figure// -->

        <!-- //JUMBOTRON - Container -->
        <div class="jumbotronContainer" id="jumbotronContainer">
            <div class="jumbotronContainerBefore" id="jumbotronContainerBefore"></div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                        <!-- //JUMBOTRON - Header -->
                        <header class="jumbotronHeader">

                            <!-- //JUMBOTRON - Category -->
                            <small class="jumbotronCategory" id="jumbotronCategory">
                                WELCOME
                            </small>
                            <!-- JUMBOTRON - Category// -->

                            <!-- //JUMBOTRON - Title -->
                            <h1 class="jumbotronTitle" id="jumbotronTitle">
                                WARUNG S.Kom
                            </h1>
                            <!-- JUMBOTRON - Title// -->

                        </header>
                        <!-- JUMBOTRON - Header// -->

                        <!-- //JUMBOTRON - Body -->
                        <div class="jumbotronBody" id="jumbotronBody">
                            <p>
                                Enjoy that view with some drinks and meals. Click It!!
                            </p>
                        </div>
                        <!-- JUMBOTRON - Body// -->

                        <!-- //JUMBOTRON - Footer -->
                        <footer class="jumbotronFooter" id="jumbotronFooter">
                            <a class="btn btn-primary" href="/menu_makanan" role="button">
                                Mulai Pesanan <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                            </a>
                        </footer>
                        <!-- JUMBOTRON - Footer// -->

                    </div>
                </div>
            </div>
        </div>
        <!-- JUMBOTRON - Container// -->

        </div>
        <!-- JUMBOTRON// -->

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="{{ asset('sc/jquery-3.6.0.min.js') }}"></script>
        <script src="{{ asset('sc/popper.min.js') }}">
        </script>
        <script src="{{ asset('sc/bootstrap.min.js') }}">
        </script>
        <script src="{{ asset('js/beranda.js') }}"></script>
</body>

</html>
