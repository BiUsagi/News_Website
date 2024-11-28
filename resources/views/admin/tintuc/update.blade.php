@extends('admin/layouts/app-admin')

@section('main')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Cập nhật tin tức</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
                    <li class="breadcrumb-item">Tin tức</li>
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
            <h5 class="card-title">Cập nhật Tin Tức</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.tintuc.update', $tinTuc->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label for="title" class="form-label">Tiêu đề</label>
                    <input type="text" class="form-control" id="title" name="tieuDe"
                        value="{{ old('tieuDe', $tinTuc->tieuDe) }}" placeholder="Nhập tiêu đề tin tức">
                </div>

                <div class="form-group mb-3">
                    <label for="summary" class="form-label">Tóm tắt</label>
                    <textarea class="form-control" id="summary" name="tomTat" rows="3" placeholder="Nhập tóm tắt">{{ old('tomTat', $tinTuc->tomTat) }}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="content" class="form-label">Nội dung</label>
                    <textarea class="form-control" id="editor" name="noiDung" rows="5" placeholder="Nhập nội dung">{{ old('noiDung', $tinTuc->noiDung) }}</textarea>
                </div>

                <div class="form-group mb-3">
                    <label for="image" class="form-label">Hình ảnh</label>
                    <input type="file" class="form-control" id="image" name="hinhAnh">
                    @if ($tinTuc->hinhAnh)
                        <img src="image/tintuc/{{ $tinTuc->hinhAnh }}" alt="Ảnh hiện tại" class="img-thumbnail mt-2"
                            style="width: 150px;">
                    @endif
                </div>

                <div class="form-group mb-3">
                    <label for="category" class="form-label">Danh mục</label>
                    <select class="form-control" id="category" name="idDm">
                        @foreach ($danhmuc as $dm)
                            <option value="{{ $dm->id }}" {{ $tinTuc->idDm == $dm->id ? 'selected' : '' }}>
                                {{ $dm->tenDm }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <input type="submit" class="btn btn-primary" value="Cập nhật">
            </form>
        </div>
    </main><!-- End #main -->
@endsection
