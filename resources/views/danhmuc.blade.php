@extends('app-user')

@section('morong')
<div class="container-fluid">
    <div class="container">
        <nav class="breadcrumb bg-transparent m-0 p-0">
            <a class="breadcrumb-item" href="#">Home</a>
            <a class="breadcrumb-item" href="/danhmuc/all">Danh mục</a>
            <span class="breadcrumb-item active">{{$tendm}}</span>
        </nav>
    </div>
</div>
@endsection

@section('noidung')
<div class="row">
    <div class="col-12">
        @if($danhmuc->isEmpty())
            <div class="alert alert-info" role="alert">
                Không có dữ liệu để hiển thị.
            </div>
        @else
            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                <h3 class="m-0">{{$tendm}}</h3>
                <a class="text-secondary font-weight-medium text-decoration-none" href="/danhmuc/all">View All</a>
            </div>

            <div class="row">
                @foreach ($danhmuc->slice(0, 2) as $dm)
                    <div class="col-lg-6">
                        <div class="position-relative mb-3">
                            <img class="img-fluid w-100" src="image/tintuc/{{$dm->ttHinhAnh}}" style="object-fit: cover; height: 200px;">
                            <div class="overlay position-relative bg-light">
                                <div class="mb-2" style="font-size: 14px;">
                                    <a href="/danhmuc/{{$dm->idDm}}">{{$dm->tenDm}}</a>
                                    <span class="px-1">/</span>
                                    <span>{{$dm->ngayDang}}</span>
                                </div>
                                <a class="h4" href="/chitiet/{{$dm->ttid}}">{{ Str::limit($dm->tieuDe, 20, '...') }}</a>
                                <p class="m-0">{!! Str::limit($dm->tomTat, 100, '...') !!}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="row">
                @foreach ($danhmuc->slice(2) as $dm)
                    <div class="col-lg-6">
                        <div class="d-flex mb-3">
                            <img src="image/tintuc/{{$dm->ttHinhAnh}}" style="width: 100px; height: 100px; object-fit: cover;">
                            <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                                <div class="mb-1" style="font-size: 13px;">
                                    <a href="/danhmuc/{{$dm->idDm}}">{{$dm->tenDm}}</a>
                                    <span class="px-1">/</span>
                                    <span>{{$dm->ngayDang}}</span>
                                </div>
                                <a class="h6 m-0" href="/chitiet/{{$dm->ttid}}">{{ Str::limit($dm->tieuDe, 50, '...') }}</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection