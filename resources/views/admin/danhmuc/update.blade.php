@extends('admin/layouts/app-admin')

@section('main')
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Cập nhật danh mục</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
                <li class="breadcrumb-item">Danh mục</li>
                <li class="breadcrumb-item active">Cập nhật</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card-header">
        <h5 class="card-title">Cập nhật danh mục</h5>
    </div>
    <div class="card-body">
        <form action="{{route('admin.danhmuc.update', $danhmuc->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group mb-3">
                <label for="title" class="form-label">Tên danh mục</label>
                <input type="text" class="form-control" id="title" name="tenDm"
                    value="{{ old('tenDm', $danhmuc->tenDm) }}" placeholder="Nhập tiêu đề danh mục">
            </div>

            <div class="form-group mb-3">
                <label for="image" class="form-label">Hình ảnh</label>
                <input type="file" class="form-control" id="image" name="hinhAnh">
                @if ($danhmuc->hinhAnh)
                    <img src="image/danhmuc/{{ $danhmuc->hinhAnh }}" alt="Ảnh hiện tại"
                        class="img-thumbnail mt-2" style="width: 150px;">
                @endif
            </div>


            <input type="submit" class="btn btn-primary" value="Cập nhật">
        </form>
    </div>
</main><!-- End #main -->
@endsection