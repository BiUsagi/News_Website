@extends('admin/layouts/app-admin')
@section('main')
<main id="main" class="main">



    <div class="pagetitle">
        <h1>Thêm danh mục</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
                <li class="breadcrumb-item">danh mục</li>
                <li class="breadcrumb-item active">Thêm</li>
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
        <h5 class="card-title">Thêm danh mục</h5>
    </div>
    <div class="card-body">
        <form action="{{route('admin.danhmuc.add_')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group mb-3">
                <label for="title" class="form-label">Tên</label>
                <input type="text" class="form-control" id="title" name="tenDm" placeholder="Nhập tiêu đề danh mục">
            </div>


            <div class="form-group mb-3">
                <label for="image" class="form-label">Hình ảnh</label>
                <input type="file" class="form-control" id="image" name="hinhAnh">
            </div>



            <input type="submit" class="btn btn-primary">
        </form>
        
    </div>

    




<br><br><br><br><br><br><br><br><br><br>

</main><!-- End #main -->
@endsection