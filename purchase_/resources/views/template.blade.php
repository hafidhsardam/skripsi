<!DOCTYPE html>
<html lang="en">
<head>
    @section('header')
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <style>
        *{margin:0;padding:0;font-family: 'Poppins', sans-serif;}
        i{margin-right:10px}
        h6{margin:0;color:#777}
        h2{margin:0}
        #accordian{background:#000;width:250px;padding:10px 0 10px 10px;float:left;z-index: 1;height:100vh;overflow-x:hidden;position:fixed}
        .main-navbar{position:relative;padding-top:10px;}
        #accordian li{list-style-type:none}
        #accordian ul li a.accr{color:white;text-decoration:none;font-size:15px;line-height:45px;display:block;padding:0 20px;transition-duration:.6s;transition-timing-function:cubic-bezier(0.68,-.55,.265,1.55);position:relative}
        #accordian>ul>li.active>a.accr{color:#000;background-color:transparent;transition:all .7s}
        #accordian a:not(:only-child):after{content:"\f105";position:absolute;right:20px;top:10%;font-size:14px;font-family:"Font Awesome 5 Free";display:inline-block;padding-right:3px;vertical-align:middle;font-weight:900;transition:.5s}
        #accordian .active>a:not(:only-child):after{transform:rotate(90deg)}
        .selector-active{width:100%;display:inline-block;position:absolute;height:37px;top:0;left:0;transition-duration:.6s;transition-timing-function:cubic-bezier(0.68,-.55,.265,1.55);background-color:#fff;border-top-left-radius:50px;border-bottom-left-radius:50px}
        .selector-active .bottom,.selector-active .top{position:absolute;width:25px;height:25px;background-color:#fff;right:0}
        .selector-active .top{top:-25px}
        .selector-active .bottom{bottom:-25px}
        .selector-active .bottom:before,.selector-active .top:before{content:'';position:absolute;width:50px;height:50px;border-radius:50%;background-color:#000}
        .selector-active .top:before{left:-25px;top:-25px}
        .selector-active .bottom:before{bottom:-25px;left:-25px}
        #form{margin:10px;}
        .btn-success{background-color: #000;}
        .logout{background-color: #fff;color: #000;margin: 20px;}
    </style>
    @show
</head>
<body>
    @section('sidebar')
    <div class="container-fluid row">
        <div id="accordian" class="col-md-2">
            <ul class="show-dropdown main-navbar text-left">
                <div class="selector-active"><div class="top"></div><div class="bottom"></div></div>
                
                <h2 style="color: white; font-weight:550;margin: 20px;">PURCHASE</h2><br><br>                
                <li class="@yield('title_Dashboard')">
                    <a class="accr" href="{{ url('Dashboard') }}"><i class="fa fa-tachometer"></i>Dashboard</a>
                </li>
                <li class="@yield('title_PurReq')">
                    <a class="accr" href="{{ url('PurchaseRequest') }}"><i class="fa fa-shopping-cart"></i>Purchase Request</a>
                </li>
                <li class="@yield('title_RFQ')">
                    <a class="accr" href="{{ url('RequestQuotations') }}"><i class="fa fa-clone"></i>Request for Quotations</a>
                </li>
                <li class="@yield('title_PO')">
                    <a class="accr" href="{{url('PurchaseOrder')}}"><i class="fa fa-calendar"></i>Purchase Orders</a>
                </li>
                <li class="@yield('title_Vendor')">
                    <a class="accr" href="{{url('Vendor')}}"><i class="fa fa-id-badge"></i>Vendors</a>
                </li>
                <li class="@yield('title_Product')">
                    <a class="accr" href="{{url('Produk')}}"><i class="fa fa-copy"></i>Products</a>
                </li>
                @if(Auth::user()->level == 'admin')
                <!-- <li class="@yield('title_Approval')">
                    <a class="accr" href="{{ url('Approval') }}"><i class="fa fa-bookmark"></i>Approval</a>
                </li> -->
                <li class="@yield('title_Users')">
                    <a class="accr" href="{{ url('Users') }}"><i class="fa fa-users"></i>Users</a>
                </li>
                @endif
                <br><br>
                
                <li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class=" btn logout"><i class="fa fa-heart"></i>Logout</button>
                    </form>
                    <p style="color: white;">&copy 2022 Purchase ERP</p>
                </li>
                
            </ul>
        </div>
        <div class="col-md-2"></div>
        <div class="container col-md-8">
            <div class="row">
                <div class="col-md-4"><br>
                    @yield('title_') 
                </div>
                <div class="col-md-8"><br>
                    <div class="row">
                        <div class="col-md-6">
                            <!-- <form action="" method="post"> -->
                            <input type="text" name="search" id="search" class="form-control" placeholder="Search...">
                            <!-- </form> -->
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-1">
                            <a href=""><i class="fa fa-lg fa-solid fa-envelope"></i></a>
                        </div>
                        <div class="col-md-1">
                            <a href=""><i class="fa fa-lg fa-solid fa-bell"></i></a>
                        </div>
                        <div class="col-md-1">
                            <div class="row">
                                <div class="col-md-1">
                                    <a href=""><i class="fa fa-lg fa-solid fa-user"></i></a>
                                </div>
                                <div class="col-md-1">
                                    <p>{{Auth::user()->name}}</p>
                                </div>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>            
            @yield('content')            
            <div class="container-fluid">
                <div class="row cari">                    
                </div>
            </div>
        </div>        
    </div>
    @show
    @section('javascr')
    <script type="text/javascript">
        $('#search').on('keyup',function(){
            $value=$(this).val();
            $.ajax({
                type : 'GET',
                url : "{{URL::to('search')}}",
                data:{'search':$value},
                success:function(data){
                    $('.cari').html(data);
                }
            });
        })
    </script>
    <script>
        var tabsVerticalInner = $('#accordian');
        var selectorVerticalInner = $('#accordian').find('li').length;
        var activeItemVerticalInner = tabsVerticalInner.find('.active');
        var activeWidthVerticalHeight = activeItemVerticalInner.innerHeight();
        var activeWidthVerticalWidth = activeItemVerticalInner.innerWidth();
        var itemPosVerticalTop = activeItemVerticalInner.position();
        var itemPosVerticalLeft = activeItemVerticalInner.position();
        $(".selector-active").css({
            "top":itemPosVerticalTop.top + "px", 
            "left":itemPosVerticalLeft.left + "px",
            "height": activeWidthVerticalHeight + "px",
            "width": activeWidthVerticalWidth + "px"
        });
        $("#accordian").on("click","li",function(e){
            $('#accordian ul li').removeClass("active");
            $(this).addClass('active');
            var activeWidthVerticalHeight = $(this).innerHeight();
            var activeWidthVerticalWidth = $(this).innerWidth();
            var itemPosVerticalTop = $(this).position();
            var itemPosVerticalLeft = $(this).position();
            $(".selector-active").css({
                "top":itemPosVerticalTop.top + "px", 
                "left":itemPosVerticalLeft.left + "px",
                "height": activeWidthVerticalHeight + "px",
                "width": activeWidthVerticalWidth + "px"
            });
        });
    </script>
    @show
</body>
</html>