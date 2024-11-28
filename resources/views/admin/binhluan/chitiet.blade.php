@extends('admin/layouts/app-admin')
@section('main')
<main id="main" class="main">



    <div class="pagetitle">
        <h1>Chi tiết bình luận</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Admin</a></li>
                <li class="breadcrumb-item">Bình luận</li>
                <li class="breadcrumb-item active">Chi tiết</li>
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
        <h5 class="card-title">Chi tiết bình luận ({{$binhluans->id}})</h5>

        <div class="card-body">
            <form action="" method="GET" enctype="multipart/form-data" class="mb-5">
                @csrf

                <div class="row">
                    <div class="col-md-4    ">
                        <div class="form-group mb-3">
                            <label for="nguoi_dang" class="form-label">Người đăng</label>
                            <input type="text" class="form-control" id="nguoi_dang" name="nguoi_dang"
                                placeholder="{{$binhluans->user->name}}" disabled>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-group mb-3">
                            <label for="ngay_dang" class="form-label">ID tin tức</label>
                            <input type="text" class="form-control" id="ngay_dang" name="ngay_dang"
                                placeholder="{{$binhluans->id_tt}}" disabled>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group mb-3">
                            <label for="ngay_dang" class="form-label">Ngày đăng</label>
                            <input type="text" class="form-control" id="ngay_dang" name="ngay_dang"
                                placeholder="{{$binhluans->created_at}}" disabled>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group mb-3">
                            <label for="luot_thich" class="form-label">Lượt thích</label>
                            <input type="text" class="form-control" id="luot_thich" name="luot_thich"
                                placeholder="{{$binhluans->like}}" disabled>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group mb-3">
                            <label for="luot_thich" class="form-label">Lượt phản hồi</label>
                            <input type="text" class="form-control" id="luot_thich" name="luot_thich"
                                placeholder="{{$binhluans->replies->count()}}" disabled>
                        </div>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label for="noidung" class="form-label">Nội dung</label>
                    <textarea class="form-control" id="noidung" name="noidung" rows="4"
                        disabled>{{ $binhluans->noi_dung }}</textarea>
                </div>



                <a href="ad/binhluan/xoa/{{$binhluans->id}}" class="btn bg-danger text-white">Xóa</a>

            </form>

            <h5 class="card-title">Phản hồi</h5>


            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Người đăng</th>
                        <th>Nội dung</th>
                        <th class="col-md-2">Lượt thích</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>

                    @if($binhluans->replies->isNotEmpty())
                        @foreach ($binhluans->replies as $bl)
                            <tr>
                                <td class="col-md-1">{{ $bl->id }}</td>
                                <td class="col-md-2">{{ $bl->user->name }}</td>
                                <td class="col-md-7">{{ $bl->noi_dung }}</td>
                                <td class="col-md-1">{{ $bl->like }}</td>
                                <td>
                                    <div class="d-flex pe-10">
                                        <a href="ad/binhluan/xoa/{{$bl->id}}" class="btn bg-danger text-white">Xóa</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="5" class="text-center">Không có phản hồi nào.</td>
                        </tr>
                    @endif



                </tbody>
            </table>

        </div>






    </div>








    <br><br><br><br><br><br><br><br><br><br>

</main><!-- End #main -->
@endsection