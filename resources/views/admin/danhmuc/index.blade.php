@extends('admin/layouts/app-admin')
@section('main')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Danh sách danh mục</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
                <li class="breadcrumb-item">Danh mục</li>
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
                        <a href="{{ route('admin.danhmuc.add') }}" class="btn bg-success text-white">Thêm danh mục</a>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>
                                        ID
                                    </th>
                                    <th>Tên danh mục</th>
                                    <th>Hình ảnh</th>
                                    <th>Xem tin tức </th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($danhmucs as $dm)
                                    <tr>
                                        <td>{{ $dm->id }}</td>
                                        <td class="col-4">{{ \Illuminate\Support\Str::limit($dm->tenDm, 30, '...') }}</td>
                                        <td><img src="image/danhmuc/{{$dm->hinhAnh}}" alt="" class="w-50"></td>
                                        <td class="col-3"><a href="ad/tintucs/{{$dm->id}}" class="btn bg-info text-white me-2">Chuyển trang</a></td>
                                        <td>
                                            <div class="d-flex pe-10">
                                                <a href="ad/danhmuc/edit/{{$dm->id}}" class="btn bg-success text-white me-2">Sửa</a>
                                                <a href="ad/danhmuc/delete/{{$dm->id}}" class="btn bg-danger text-white">Xóa</a>
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