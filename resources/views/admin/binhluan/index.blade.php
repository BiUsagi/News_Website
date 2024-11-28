@extends('admin/layouts/app-admin')
@section('main')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Danh sách bình luận</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
                <li class="breadcrumb-item">Bình luận</li>
                <li class="breadcrumb-item active">Danh sách</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <br>
                        <!-- Hiển thị thông báo thành công -->
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <!-- <a href="{{ route('admin.danhmuc.add') }}" class="btn bg-success text-white">Thêm danh mục</a> -->

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Người đăng</th>
                                    <th>Tin tức</th>
                                    <th>Like</th>
                                    <th>Ngày đăng</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($binhluans as $bl)
                                    <tr>
                                        <td>{{ $bl->id }}</td>
                                        <td>{{ $bl->user->name }}</td>
                                        <td>{{ \Illuminate\Support\Str::limit($bl->tinTuc->tieuDe, 50, '...') }}</td>
                                        <td>{{ $bl->like }}</td>
                                        <td>{{ $bl->created_at }}</td>
                                        <td>
                                            <div class="d-flex pe-10">
                                                <a href="ad/binhluan/xem/{{$bl->id}}" class="btn bg-success text-white me-2">Xem</a>
                                                <a href="ad/binhluan/xoa/{{$bl->id}}" class="btn bg-danger text-white">Xóa</a>
                                            </div>
                                        </td> 

                                    </tr>
                                @endforeach ()


                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->
@endsection