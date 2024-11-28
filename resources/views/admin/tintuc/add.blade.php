@extends('admin/layouts/app-admin')
@section('main')
<main id="main" class="main">



    <div class="pagetitle">
        <h1>Thêm tin tức</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
                <li class="breadcrumb-item">Tin tức</li>
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
        <h5 class="card-title">Thêm Tin Tức</h5>
    </div>
    <div class="card-body">
        <form action="{{route('admin.tintuc.add_')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="form-group mb-3">
                <label for="title" class="form-label">Tiêu đề</label>
                <input type="text" class="form-control" id="title" name="tieuDe" placeholder="Nhập tiêu đề tin tức">
            </div>

            <div class="form-group mb-3">
                <label for="summary" class="form-label">Tóm tắt</label>
                <textarea class="form-control" id="summary" name="tomTat" rows="3"
                    placeholder="Nhập tóm tắt"></textarea>
            </div>

            <div class="form-group mb-3">
                <label for="content" class="form-label">Nội dung</label>
                <textarea class="form-control" id="editor" name="noiDung" rows="5" cols="5"></textarea>
            </div>

            <div class="form-group mb-3">
                <label for="image" class="form-label">Hình ảnh</label>
                <input type="file" class="form-control" id="image" name="hinhAnh">
            </div>


            <div class="form-group mb-3">
                <label for="category" class="form-label">Danh mục</label>
                <select class="form-control" id="category" name="idDm">

                    @foreach ($danhmuc as $dm)
                        <option value="{{$dm->id}}">{{$dm->tenDm}}</option>
                    @endforeach                </select>
            </div>

            <input type="submit" class="btn btn-primary">
        </form>
        
    </div>

    






</main><!-- End #main -->
@endsection