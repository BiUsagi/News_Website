@extends('admin/layouts/app-admin')
@section('main')
<main id="main" class="main">

    <div class="pagetitle">
        
        <h1>{{$tenDanhMuc}}</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
                <li class="breadcrumb-item">Tin tức</li>
                <li class="breadcrumb-item active">{{$tenDanhMuc}}</li>
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
                        <a href="{{ route('admin.tintuc.add') }}" class="btn bg-success text-white">Thêm Tin Tức</a>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>
                                        ID
                                    </th>
                                    <th>Tiêu đề</th>
                                    <th>Tóm tắt</th>
                                    <th>Nội dung</th>
                                    <th>Hình ảnh</th>
                                    <th style="width: 120px;">Ngày đăng</th>
                                    <th style="width: 120px;">Lượt xem</th>
                                    <th>Danh mục</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($tinTucs as $tt)
                                    <tr>
                                        <td>{{ $tt->id }}</td>
                                        <td>{{ \Illuminate\Support\Str::limit($tt->tieuDe, 30, '...') }}</td>
                                        <td>{{ \Illuminate\Support\Str::limit($tt->tomTat, 30, '...') }}</td>
                                        <td>{!! \Illuminate\Support\Str::limit(strip_tags($tt->noiDung), 30, '...') !!}</td>
                                        <td><img src="image/tintuc/{{$tt->hinhAnh}}" alt="" class="w-100"></td>
                                        <td>{{ \Carbon\Carbon::parse($tt->ngayDang)->format('d/m/Y') }}</td>
                                        <td>{{ $tt->luotXem }}</td>
                                        <td>{{ $tt->danhMuc->tenDm }}</td>
                                        <td>
                                            <div class="d-flex pe-10">
                                                <a href="ad/tintuc/edit/{{$tt->id}}" class="btn bg-success text-white me-2">Sửa</a>
                                                <a href="ad/tintuc/delete/{{$tt->id}}" class="btn bg-danger text-white">Xóa</a>
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