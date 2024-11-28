<!-- Footer Start -->
<div class="container-fluid bg-light pt-5 px-sm-3 px-md-5">
    <div class="row">
        <div class="col-lg-3 col-md-6 mb-5">
            <a href="index.html" class="navbar-brand">
                <h1 class="mb-2 mt-n2 display-5 text-uppercase"><span class="text-primary">News</span></h1>
            </a>
            <p>Tin tức chính xác và mang đến sự tin tưởng cho khách hàng.</p>
            <div class="d-flex justify-content-start mt-4">
                <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;"
                    href="#"><i class="fab fa-twitter"></i></a>
                <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;"
                    href="#"><i class="fab fa-facebook-f"></i></a>
                <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;"
                    href="#"><i class="fab fa-linkedin-in"></i></a>
                <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;"
                    href="#"><i class="fab fa-instagram"></i></a>
                <a class="btn btn-outline-secondary text-center mr-2 px-0" style="width: 38px; height: 38px;"
                    href="#"><i class="fab fa-youtube"></i></a>
            </div>
        </div>


        @php
            $tintucnew = DB::table('tin_tucs')
                ->join('danh_mucs', 'tin_tucs.idDm', '=', 'danh_mucs.id')
                ->orderBy('tin_tucs.ngayDang', 'desc')
                ->select('tin_tucs.*', 'tin_tucs.hinhAnh as ttHinhAnh', 'tin_tucs.id as ttid', 'danh_mucs.*')
                ->limit(6)
                ->get();
        @endphp

        <div class="col-lg-3 col-md-6 mb-5">
            <h4 class="font-weight-bold mb-4">Danh mục</h4>
            <div class="d-flex flex-wrap m-n1">
                @php
                    $danhmuc = DB::table('danh_mucs')->get();
                @endphp

                @foreach ($danhmuc as $dm)
                    <a href="{{ route('danhmuc', ['id' => $dm->id]) }}"
                        class="btn btn-sm btn-outline-secondary m-1">{{ $dm->tenDm }}</a>
                @endforeach



            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
            <h4 class="font-weight-bold mb-4">Tags</h4>
            <div class="d-flex flex-wrap m-n1">
                <a href="" class="btn btn-sm btn-outline-secondary m-1">Ăn uống</a>
                <a href="" class="btn btn-sm btn-outline-secondary m-1">Thể thao</a>
                <a href="" class="btn btn-sm btn-outline-secondary m-1">Quản lí</a>
                <a href="" class="btn btn-sm btn-outline-secondary m-1">Tin mới</a>
                <a href="" class="btn btn-sm btn-outline-secondary m-1">Hot</a>
                <a href="" class="btn btn-sm btn-outline-secondary m-1">Tài khoản</a>
                <a href="" class="btn btn-sm btn-outline-secondary m-1">Ăn uống</a>
                <a href="" class="btn btn-sm btn-outline-secondary m-1">Thể thao</a>
                <a href="" class="btn btn-sm btn-outline-secondary m-1">Quản lí</a>
                <a href="" class="btn btn-sm btn-outline-secondary m-1">Tài khoản</a>
                <a href="" class="btn btn-sm btn-outline-secondary m-1">Ăn uống</a>
                <a href="" class="btn btn-sm btn-outline-secondary m-1">Thể thao</a>
                <a href="" class="btn btn-sm btn-outline-secondary m-1">Ẩm thực</a>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 mb-5">
            <h4 class="font-weight-bold mb-4">Truy cập nhanh</h4>
            <div class="d-flex flex-column justify-content-start">
                <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right text-dark mr-2"></i>Trang
                    chủ</a>
                <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right text-dark mr-2"></i>Danh
                    mục</a>
                <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right text-dark mr-2"></i>Tin
                    tức</a>
                <a class="text-secondary mb-2" href="#"><i class="fa fa-angle-right text-dark mr-2"></i>Đăng
                    ký</a>
                <a class="text-secondary" href="#"><i class="fa fa-angle-right text-dark mr-2"></i>Liên hệ</a>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid py-4 px-sm-3 px-md-5">
    <p class="m-0 text-center">
        &copy; <a class="font-weight-bold" href="#">New's Website</a>.
    </p>
</div>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-dark back-to-top"><i class="fa fa-angle-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Contact Javascript File -->
<script src="mail/jqBootstrapValidation.min.js"></script>
<script src="mail/contact.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>
</body>

</html>
