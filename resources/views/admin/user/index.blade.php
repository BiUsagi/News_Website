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
                     

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th>
                                        ID
                                    </th>
                                    <th>Tên</th>
                                    <th>Hình ảnh</th>
                                    <th>Email</th>
                                    <th>Thời gian</th>
                                    <th>Quyền</th>
                                    <th>Chặn</th>
                                    <!-- <th>Hành động</th> -->
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($taikhoan as $tk)
                                    @php
                                        $block = '';
                                        if ($tk->block == 0)
                                            $block = 'Mở';
                                        if ($tk->block == 1)
                                            $block = 'Chặn';

                                        $quyen = '';
                                        if ($tk->quyen == 0)
                                            $quyen = 'User';
                                        if ($tk->quyen == 1)
                                            $quyen = 'Admin';


                                        $isBlock = $tk->block == 1;

                                    @endphp
                                    <tr>
                                        <td>{{ $tk->id }}</td>
                                        <td>{{ $tk->name }}</td>
                                        <td><img src="image/user/{{$tk->hinhAnh}}" alt="User Image" class="mr-3 rounded-circle"
                                                style="width: 50px; height: 50px;"></td>
                                        <td>{{ $tk->email }}</td>
                                        <td>{{ intval(\Carbon\Carbon::parse($tk->created_at)->diffInDays(\Carbon\Carbon::now())) }}
                                            ngày</td>


                                        <td>{{ $quyen }}</td>


                                        @if ($tk->quyen == 1)
                                            <td>
                                                <form action="{{ route('admin.user.block', $tk->id) }}" method="POST">
                                                    @csrf
                                                    <label class="switch">
                                                        <input type="checkbox" name="role" disabled
                                                            style="opacity: 0.5; cursor: not-allowed;">
                                                        <span class="slider" style="background-color: red;"></span>
                                                    </label>
                                                </form>
                                            </td>


                                        @else
                                            <td>
                                                <form action="{{ route('admin.user.block', $tk->id) }}" method="POST">
                                                    @csrf
                                                    <label class="switch">
                                                        <input type="checkbox" name="role" {{ $isBlock ? 'checked' : '' }}
                                                            onclick="this.form.submit()">
                                                        <span class="slider"></span>
                                                    </label>
                                                    <!-- <p class="text-au">{{ $isBlock ? 'Admin' : 'User' }}</p> -->
                                                </form>
                                            </td>
                                        @endif






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



<style>
    /* Style the switch */
    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    /* Hide default HTML checkbox */
    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    /* Slider */
    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        transition: .4s;
        border-radius: 34px;
    }

    /* Before slider */
    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 26px;
        border-radius: 50%;
        left: 4px;
        bottom: 4px;
        background-color: white;
        transition: .4s;
    }

    /* Checked slider */
    input:checked+.slider {
        background-color: #2196F3;
    }

    /* Move slider when checked */
    input:checked+.slider:before {
        transform: translateX(26px);
    }

    .text-au {
        font-size: small;
        text-align: justify;
        padding-left: 10px;
        margin-top: 3px;
        color: gray;
        font-weight: bolder;
    }
</style>
@endsection