@extends('admin/layouts/app-admin')

@section('main')
<main id="main" class="main">
    <div class="container-fluid">
        <!-- Dashboard Header -->
        <div class="row mb-4">
            <div class="col-12">
                <h1 class="text-center">Chào mừng bạn đến với trang quản trị</h1>
                <p class="text-center">Hãy kiểm tra các thông tin dưới đây để theo dõi tình hình hoạt động.</p>
            </div>
        </div>

        <!-- Statistics Cards -->
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Tổng số tin tức</div>
                    <div class="card-body">
                        <h5 class="card-title text-white">Tổng: {{$demtt}}</h5>
                        <p class="card-text">Số lượng tin tức đang được quản lý trong hệ thống.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Số người dùng</div>
                    <div class="card-body">
                        <h5 class="card-title text-white">Tổng: {{$demtk}}</h5>
                        <p class="card-text">Người dùng đã đăng ký và sử dụng hệ thống.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-header">Số bình luận</div>
                    <div class="card-body">
                        <h5 class="card-title text-white">Tổng: {{$dembl}}</h5>
                        <p class="card-text">Tổng số bình luận được gửi trên các trang tin tức.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card text-white bg-info mb-3">
                    <div class="card-header">Số danh mục</div>
                    <div class="card-body">
                        <h5 class="card-title text-white">Tổng: {{$demdm}}</h5>
                        <p class="card-text">Số lượng danh mục hiện có trong hệ thống.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main><!-- End #main -->
@endsection
