<style>
    @import "https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700";
    #sidebar {
    width: 250px;
    position: fixed;
    top: 0;
    left: -250px;
    height: 100vh;
    z-index: 999;
    background-color: black;
    color: #fff;
    transition: all 0.3s;
    overflow-y: scroll;
    box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.2);
}

#sidebar.active {
    left: 0;
}

#dismiss {
    width: 35px;
    height: 35px;
    line-height: 35px;
    text-align: center;
    background: #7386D5;
    position: absolute;
    top: 10px;
    right: 10px;
    cursor: pointer;
    -webkit-transition: all 0.3s;
    -o-transition: all 0.3s;
    transition: all 0.3s;
}
#dismiss:hover {
    background: #fff;
    color: #7386D5;
}

.overlay {
    position: fixed;
    width: 100vw;
    height: 100vh;
    background: rgba(0, 0, 0, 0.7);
    z-index: 998;
    display: none;
}

#sidebar .sidebar-header {
    padding: 20px;
    background: black;
}

#sidebar ul.components {
    padding: 20px 0;
    border-bottom: 1px solid #47748b;
}

#sidebar ul p {
    color: #fff;
    padding: 10px;
}

#sidebar ul li a {
    padding: 10px;
    font-size: 1.1em;
    display: block;
}
#sidebar ul li a:hover {
    color: #7386D5;
    background: #fff;
}

#sidebar ul li.active > a, a[aria-expanded="true"] {
    color: #fff;
    background: #6d7fcc;
}


a[data-toggle="collapse"] {
    position: relative;
}

a[aria-expanded="false"]::before, a[aria-expanded="true"]::before {
    content: '\e259';
    display: block;
    position: absolute;
    right: 20px;
    font-family: 'Glyphicons Halflings';
    font-size: 0.6em;
}
a[aria-expanded="true"]::before {
    content: '\e260';
}


ul ul a {
    font-size: 0.9em !important;
    padding-left: 30px !important;
    background: #6d7fcc;
}

ul.CTAs {
    padding: 20px;
}

ul.CTAs a {
    text-align: center;
    font-size: 0.9em !important;
    display: block;
    border-radius: 5px;
    margin-bottom: 5px;
}
a.download {
    background: #fff;
    color: #7386D5;
}
a.article, a.article:hover {
    background: #6d7fcc !important;
    color: #fff !important;
}

.navbar-text{
    color: white;
}

.abc123{
    background-color: black;
    
}

</style>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="{{ URL('assets/logo01.png') }}">

    <title>Admin | Blog Tourism</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/pricing/">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/carousel/">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <!-- Bootstrap core CSS -->
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <link href="{{ URL('css-js/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ URL('css-js/css/pricing.css') }}" rel="stylesheet">
    <link href="{{ URL('css-js/css/navbar.css') }}" rel="stylesheet">
    <link href="{{ URL('css-js/css/carousel.css') }}" rel="stylesheet">
</head>



<body>
<div class="wrapper">
            
            <nav id="sidebar">
                <div id="dismiss">
                    <i class="glyphicon glyphicon-arrow-left"></i>
                </div>

                <div class="sidebar-header">
                    <h3>PURCHASH</h3>
                </div>

                <ul class="list-unstyled components">
                    
                    <li>
                        <a class="navbar-text" href="#">Purchase Request</a>
                    </li>
                    <li>
                        <a class="navbar-text" href="#">Request For Quotation</a>
                    </li>
                    <li>
                        <a class="navbar-text" href="#">Purchase Order</a>
                    </li>
                    <li class="abc123">
                        <a class="abc1" href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Master Data</a>
                            <ul class="collapse list-unstyled" id="homeSubmenu">
                                <li>
                                    <a class="navbar-text" href="#">Vendor</a>
                                </li>
                                <li>
                                    <a class="navbar-text" href="#">Product</a>
                                </li>
                                <li>
                                    <a class="navbar-text" href="#">User</a>
                                </li>
                                
                            </ul>
                </li>
                </ul>
                <ul class="list-unstyled CTAs">
                <li>
                    <a href="{{ URL('/user-logout') }}" class="download">Logout</a>
                </li>
            </ul>
            </nav>

    <div class="card text-dark bg-light mb-3" style="max-width: 100%;">
        <nav class="navbar navbar-expand-md navbar-dark bg-dark">
            <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>
                    
        <a class="navbar-brand" href="#">Purchash</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExample04">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item <?= (session('menu_admin') == 'home') ? 'active' : ''; ?>">
                    <a class="nav-link" href="{{ URL('/admin') }}">Home</a>
                </li>
                <li class="nav-item <?= (session('menu_admin') == 'profil') ? 'active' : ''; ?>">
                    <a class="nav-link" href="{{ URL('/admin/profile') }}">Profil</a>
                </li>
                <li class="nav-item <?= (session('menu_admin') == 'manage_categorie') ? 'active' : ''; ?>">
                    <a class="nav-link" href="{{ URL('/admin/manage_categorie') }}">Manage Categorie</a>
                </li>
                <li class="nav-item <?= (session('menu_admin') == 'blog') ? 'active' : ''; ?>">
                    <a class="nav-link" href="{{ URL('/admin/blog_all') }}">Blog</a>
                </li>
                <li class="nav-item <?= (session('menu_admin') == 'user') ? 'active' : ''; ?>">
                    <a class="nav-link" href="{{ URL('/admin/user_all') }}">User Account</a>
                </li>
                <li class="nav-item dropdown <?= (session('menu_admin') == 'categories') ? 'active' : ''; ?>">
                    <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown04">
                        <?php $categorie1 = \App\Categorie::all(); ?>
                        @foreach ($categorie1 as $cat1)
                        <a class="dropdown-item" href="{{ URl('/admin/categories/'.$cat1->id) }}">{{ $cat1->name }}</a>
                        @endforeach
                    </div>
                </li>
            </ul>
            <form class="form-inline my-2 my-md-0">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" role="button" href="{{ URL('/user-logout') }}"><i class="fa fa-arrow-left"></i> Logout</a>
                    </li>
                </ul>
            </form>
        </div>
    </nav>

    @yield('content')

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ URL('css-js/js/jquery-3.5.1.min.js') }}"></script>
    <script>
        window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
    </script>
    <script src="{{ URL('css-js/js/bootrsap.min.js') }}"></script>
    <script src="{{ URL('css-js/js/popper.min.js') }}"></script>
    <script src="{{ URL('css-js/js/holder.min.js') }}"></script>
    <script>
        Holder.addTheme('thumb', {
            bg: '#55595c',
            fg: '#eceeef',
            text: 'Thumbnail'
        });
    </script>
    <script type="text/javascript">
        function checkTime(i) {
            if (i < 10) {
                i = "0" + i;
            }
            return i;
        }

        function startTime() {
            var today = new Date();
            var hr = today.getHours();
            var min = today.getMinutes();
            var sec = today.getSeconds();
            ap = (hr < 12) ? "<span>AM</span>" : "<span>PM</span>";
            hr = (hr == 0) ? 12 : hr;
            hr = (hr > 12) ? hr - 12 : hr;
            //Add a zero in front of numbers<10
            hr = checkTime(hr);
            min = checkTime(min);
            sec = checkTime(sec);
            document.getElementById("clock_template").innerHTML = hr + ":" + min + ":" + sec + " " + ap;

            var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            var days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'];
            var curWeekDay = days[today.getDay()];
            var curDay = today.getDate();
            var curMonth = months[today.getMonth()];
            var curYear = today.getFullYear();
            var date = curWeekDay + ", " + curDay + " " + curMonth + " " + curYear + " /";
            document.getElementById("date_template").innerHTML = date;

            var time = setTimeout(function() {
                startTime()
            }, 500);
        }
        startTime();
    </script>
    <div class="overlay"></div>


    <!-- jQuery CDN -->
    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <!-- Bootstrap Js CDN -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#dismiss, .overlay').on('click', function () {
                $('#sidebar').removeClass('active');
                $('.overlay').fadeOut();
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').addClass('active');
                $('.overlay').fadeIn();
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>
</body>

</html>