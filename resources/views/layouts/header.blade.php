@php
    use Carbon\Carbon;

    $currentDate = Carbon::now();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <base href="http://127.0.0.1:8000/">
    <meta charset="utf-8">
    <title>News</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap JS (phụ thuộc vào Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
    <script src="thongbao/script.js"></script>
    <link rel="stylesheet" href="thongbao/style.css">


    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/style.css') }}    " rel="stylesheet">

    <style>
        .carousel-item-3 .position-relative {
            height: 350px;
            /* Adjust this value based on your design requirements */
        }

        .carousel-item-3 img {
            height: 200px;
            /* Adjust the height for the image */
        }

        .carousel-item-3 .overlay {
            height: 150px;
            /* Adjust the height for the overlay */
        }

        .carousel-item-3 .overlay .h4 {
            font-size: 16px;
            /* Adjust the font size for the title */
        }
    </style>
</head>

<body>

    <!-- Topbar Start -->
    <div class="container-fluid">
        <div class="row align-items-center py-2 px-lg-5">
            <div class="col-lg-8">
                <a href="" class="navbar-brand d-none d-lg-block">
                    <h1 class="m-0 display-5 text-uppercase"><span class="text-primary">News</span></h1>
                </a>
            </div>
            <div class="col-md-4 text-right d-none d-md-block">

                @php
                    if (Auth::check()) {
                        $user = Auth::user();
                        $link = '';
                        if (auth()->user()->quyen == 1) {
                            $link = '/ad';
                        }
                        echo "<div style='text-align: right;'>";
                        echo "<div style='display: flex; align-items: center; justify-content: flex-end;'>";
                        echo "<img src='image/user/{$user->hinhAnh}' alt='User Image' class='mr-3 rounded-circle' style='width: 40px; height: 40px;'>";
                        echo "<p style='margin: 0;'><a href='{$link}'>{$user->name}</a> | ";
                        echo "<a href='#' onclick=\"event.preventDefault(); document.getElementById('logout-form').submit();\">Đăng xuất</a></p>";
                        echo '<form id="logout-form" action="/logout" method="POST" style="display: none;">
                                                                                                                                        <input type="hidden" name="_token" value="' . csrf_token() . '">
                                                                                                                                    </form>';
                        echo "</div>";
                        echo "</div>";
                    } else {
                        echo '<div style="text-align: right;"><a href="/login">Đăng nhập</a> | <a href="/register">Đăng Ký</a></div>';
                    }
                @endphp






            </div>
        </div>
    </div>
    <!-- Topbar End -->




    <!-- Navbar Start -->
    <div class="container-fluid p-0 mb-3">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-2 py-lg-0 px-lg-5">
            <a href="" class="navbar-brand d-block d-lg-none">
                <h1 class="m-0 display-5 text-uppercase"><span class="text-primary">News</span></h1>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between px-0 px-lg-3" id="navbarCollapse">
                <div class="navbar-nav mr-auto py-0">
                    <a href="/" class="nav-item nav-link active">Trang chủ</a>
                    <div class="nav-item dropdown">
                        <a href="/danhmuc" class="nav-link dropdown-toggle" data-toggle="dropdown">Danh mục</a>
                        <div class="dropdown-menu rounded-0 m-0">

                            @php
                                $danhmuc = DB::table('danh_mucs')->get();
                            @endphp
                            <a href="/danhmuc/all" class="dropdown-item">Tất cả</a>
                            @foreach ($danhmuc as $dm)
                                <a href="/danhmuc/{{$dm->id}}" class="dropdown-item">{{$dm->tenDm}}</a>
                            @endforeach


                        </div>
                    </div>
                    <a href="/lienhe" class="nav-item nav-link">Liên hệ</a>
                </div>
                <form action="{{ route('timkiem') }}" method="GET">
                    <div class="input-group ml-auto" style="width: 100%; max-width: 300px;">
                        <input type="text" class="form-control" name="search" placeholder="Tìm kiếm...">
                        <div class="input-group-append">
                            <button class="input-group-text text-secondary" type="submit"><i
                                    class="fa fa-search"></i></button>
                        </div>
                    </div>
                </form>

            </div>
        </nav>
    </div>