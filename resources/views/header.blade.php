<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- scrollbar -->
    <style>
        /* width */
        ::-webkit-scrollbar {
            width: 13px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px grey;
            border-radius: 5px;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 5px;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>
    <!--  -->

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="/your-path-to-fontawesome/css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="css/hstyles.css">
@yield('link')




</head>

<body>

<!------------- header navbar -------------->
<nav class="navbar navbar-expand-md navbar-dark bg-dark">

    <img src="images/logo.png" class="navbar-brand logo" alt="logo">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!--------- collapse (responsive the navbar)-------->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav ml-auto">
            <li class="nav-item ">
                <a class="nav-link text-right header-item" href="#footer">about</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link text-right header-item" href="#footer">contact us</a>
            </li>
            <!-- Authentication Links -->
            @guest
                <li class="nav-item">
                    <a class="nav-link text-right header-item" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link text-right header-item" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="{{route('profile')}}" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
            @endguest
            <li class="nav-item">
                <a class="nav-link text-right header-item" href="#">advertisment</a>
            </li>
            <li class="nav-item active">
                <a class="nav-link text-right header-item" href="#">home</a>
            </li>
        </ul>

        <!-- categories (dropdown menu) -->
        <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle dropdown-category text-right" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">category</a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item text-right" href="#">car</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-right" href="#">bike</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item text-right" href="#">van</a>
            </div>
        </div>

    </div>
    <!-- end of the collapse -->
</nav>
<!-- end of navbar -->

@yield('content')

<!------------ Footer ------------>
<div id="footer" class="footer-div">

    <!-- first line of footer section -->
    <div class="footer-menu-one">
        <!---- social media in footer part ------>
        <ul>
            <li> <a href="#">
                    <ion-icon class="footer-web" name="logo-github" style="width: 20px; height: 20px;"></ion-icon>
                </a> </li>
            <li> <a href="#">
                    <ion-icon class="footer-web" name="logo-linkedin" style="width: 20px; height: 20px;"></ion-icon>
                </a> </li>
            <li> <a href="#">
                    <ion-icon class="footer-web" name="mail-outline" style="width: 20px; height: 20px;"></ion-icon>
                </a> </li>
        </ul>
    </div>
    <!-- second line of footer section -->
    <div class="footer-menu-two">
        <ul>
            <li> <a href="#">Terms of Use </a> </li>
            <li> <a href="#">Privacy</a> </li>
        </ul>
    </div>

    <!-- Copyright -->
    <p class="footer-web">© 2020 Copyright Blazed team</p>
    <!-- Copyright -->

</div>
<!------------ End of Footer ------------>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script defer src="/your-path-to-fontawesome/js/all.js"></script>
<script src="https://unpkg.com/ionicons@5.1.2/dist/ionicons.js"></script>
<script src="js/main.js" charset="utf-8"></script>
</body>

<script>
    $(".pages .pages-item a").not(".disable a").on("click", function() {
        if (!$(this).parent().hasClass("active")) {
            $(".pages .pages-item.active").removeClass("active");
            $(this).parent().addClass("active");
        }
    });
</script>



</html>
