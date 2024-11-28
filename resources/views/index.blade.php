@extends('app-user')




@section('morong')
    <!-- <div class="container-fluid py-3">
                                <div class="container">
                                    <div class="owl-carousel owl-carousel-2 carousel-item-3 position-relative">
                                        @for ($i = 1; $i <= 3; $i++)
    <div class="d-flex">
                                            <img src="img/news-100x100-1.jpg" style="width: 80px; height: 80px; object-fit: cover;">
                                            <div class="d-flex align-items-center bg-light px-3" style="height: 80px;">
                                                <a class="text-secondary font-weight-semi-bold" href="">Lorem ipsum dolor sit amet consec adipis
                                                    elit</a>
                                            </div>
                                        </div>
    @endfor
                                    </div>
                                </div>
                            </div> -->
    <!-- Top News Slider End -->


    <!-- Main News Slider Start -->
    <div class="container-fluid py-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="owl-carousel owl-carousel-2 carousel-item-1 position-relative mb-3 mb-lg-0">

                        @foreach ($alltintuc as $alltt)
                            <div class="position-relative overflow-hidden" style="height: 435px;">
                                <img class="img-fluid h-100" src="image/tintuc/{{ $alltt->ttHinhAnh }}"
                                    style="object-fit: cover;">
                                <div class="overlay">
                                    <div class="mb-1">
                                        <a class="text-white" href="/danhmuc/{{ $alltt->idDm }}">{{ $alltt->tenDm }}</a>
                                        <span class="px-2 text-white">/</span>
                                        <a class="text-white" href="">{{ $alltt->ngayDang }}</a>
                                    </div>
                                    <a class="h2 m-0 text-white font-weight-bold"
                                        href="/chitiet/{{ $alltt->ttid }}">{{ $alltt->tieuDe }}</a>
                                </div>
                            </div>
                        @endforeach



                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                        <h3 class="m-0">Danh mục</h3>
                        <a class="text-secondary font-weight-medium text-decoration-none" href="/danhmuc/all">View All</a>
                    </div>


                    @foreach ($danhmuc as $dm)
                        <div class="position-relative overflow-hidden mb-3" style="height: 80px;">
                            <img class="img-fluid w-100 h-100" src="{{ asset('image/danhmuc/' . $dm->hinhAnh) }}"
                                style="object-fit: cover;">
                            <a href="/danhmuc/{{ $dm->id }}"
                                class="overlay align-items-center justify-content-center h4 m-0 text-white text-decoration-none">
                                {{ $dm->tenDm }}
                            </a>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>
    <!-- Main News Slider End -->


    <!-- Featured News Slider Start -->
    <div class="container-fluid py-3">
        <div class="container">


            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                <h3 class="m-0">{{ $tintuc1->first()->tenDm }}</h3>
                <a class="text-secondary font-weight-medium text-decoration-none" href="/danhmuc/all">View All</a>
            </div>
            <div class="owl-carousel owl-carousel-2 carousel-item-4 position-relative">

                @foreach ($tintuc1 as $tt1)
                    <div class="position-relative overflow-hidden" style="height: 220px;">
                        <img class="img-fluid w-100 h-100" src="image/tintuc/{{ $tt1->ttHinhAnh }}"
                            style="object-fit: cover;">
                        <div class="overlay">
                            <div class="mb-1" style="font-size: 13px;">
                                <a class="text-white" href="/danhmuc/{{ $tt1->idDm }}">{{ $tt1->tenDm }}</a>
                                <span class="px-1 text-white">/</span>
                                <a class="text-white" href="">{{ $tt1->ngayDang }}</a>
                            </div>
                            <a class="h4 m-0 text-white"
                                href="/chitiet/{{ $tt1->ttid }}">{{ \Illuminate\Support\Str::limit($tt1->tieuDe, 30, '...') }}</a>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>
    </div>
    <!-- Featured News Slider End -->


    <!-- Category News Slider Start -->
    <div class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 py-3">
                    <div class="bg-light py-2 px-4 mb-3">
                        <h3 class="m-0">{{ $tintuc2->first()->tenDm }}</h3>
                    </div>
                    <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">


                        @foreach ($tintuc2 as $tt2)
                            <div class="position-relative">
                                <img class="img-fluid w-100" src="image/tintuc/{{ $tt2->ttHinhAnh }}"
                                    style="object-fit: cover; height: 200px;">
                                <div class="overlay position-relative bg-light">
                                    <div class="mb-2" style="font-size: 13px;">
                                        <a href="/danhmuc/{{ $tt2->idDm }}">{{ $tt2->tenDm }}</a>
                                        <span class="px-1">/</span>
                                        <span>{{ $tt2->ngayDang }}</span>
                                    </div>
                                    <a class="h4 m-0"
                                        href="/chitiet/{{ $tt2->ttid }}">{{ \Illuminate\Support\Str::limit($tt2->tieuDe, 20, '...') }}</a>
                                </div>
                            </div>
                        @endforeach


                    </div>
                </div>
                <div class="col-lg-6 py-3">
                    <div class="bg-light py-2 px-4 mb-3">
                        <h3 class="m-0">{{ $tintuc3->first()->tenDm }}</h3>
                    </div>
                    <div class="owl-carousel owl-carousel-3 carousel-item-2 position-relative">
                        @foreach ($tintuc3 as $tt3)
                            <div class="position-relative">
                                <img class="img-fluid w-100" src="image/tintuc/{{ $tt3->ttHinhAnh }}"
                                    style="object-fit: cover; height: 200px;">
                                <div class="overlay position-relative bg-light">
                                    <div class="mb-2" style="font-size: 13px;">
                                        <a href="/danhmuc/{{ $tt3->idDm }}">{{ $tt3->tenDm }}</a>
                                        <span class="px-1">/</span>
                                        <span>{{ $tt3->ngayDang }}</span>
                                    </div>
                                    <a class="h4 m-0"
                                        href="/chitiet/{{ $tt3->ttid }}">{{ \Illuminate\Support\Str::limit($tt3->tieuDe, 30, '...') }}</a>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Category News Slider End -->


    <!-- Category News Slider Start -->

    </div>
@endsection

@section('noidung')
    <div class="row mb-3">
        <div class="col-12">
            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                <h3 class="m-0">Xem nhiều nhất</h3>
                <a class="text-secondary font-weight-medium text-decoration-none" href="/danhmuc/all">View All</a>
            </div>
        </div>
        <div class="col-lg-6">


            @php
                $count = 0; // Khởi tạo biến đếm
            @endphp
            @foreach ($tintucpopular as $ppl)
                @if ($count >= 0 && $count <= 3)
                    <div class="d-flex mb-3">
                        <img src="image/tintuc/{{ $ppl->ttHinhAnh }}"
                            style="width: 100px; height: 100px; object-fit: cover;">
                        <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                            <div class="mb-1" style="font-size: 13px;">
                                <a href="/danhmuc/{{ $ppl->idDm }}">{{ $ppl->tenDm }}</a>
                                <span class="px-1">/</span>
                                <span>{{ $ppl->ngayDang }}</span>
                            </div>
                            <a class="h6 m-0" href="/chitiet/{{ $ppl->ttid }}">{{ $ppl->tieuDe }}</a>
                        </div>
                    </div>
                @endif
                @php
                    $count++; // Tăng biến đếm
                @endphp
            @endforeach



        </div>
        <div class="col-lg-6">
            @php
                $count = 0; // Khởi tạo biến đếm
            @endphp
            @foreach ($tintucpopular as $ppl)
                @if ($count >= 4 && $count <= 7)
                    <div class="d-flex mb-3">
                        <img src="image/tintuc/{{ $ppl->ttHinhAnh }}" style="width: 100px; height: 100px; object-fit: cover;">
                        <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                            <div class="mb-1" style="font-size: 13px;">
                                <a href="/danhmuc/{{ $ppl->idDm }}">{{ $ppl->tenDm }}</a>
                                <span class="px-1">/</span>
                                <span>{{ $ppl->ngayDang }}</span>
                            </div>
                            <a class="h6 m-0" href="/chitiet/{{ $ppl->ttid }}">{{ $ppl->tieuDe }}</a>
                        </div>
                    </div>
                @endif
                @php
                    $count++; // Tăng biến đếm
                @endphp
            @endforeach
        </div>
    </div>

    <div class="mb-5"></div>

    <div class="row">
        <div class="col-12">
            <div class="d-flex align-items-center justify-content-between bg-light py-2 px-4 mb-3">
                <h3 class="m-0">Cũ nhất</h3>
                <a class="text-secondary font-weight-medium text-decoration-none" href="/danhmuc/all">View All</a>
            </div>
        </div>
        <div class="col-lg-6">
            @php
                $count = 0;
            @endphp
            @foreach ($tintuclaster as $laster)
                @if ($count >= 0 && $count <= 1)
                    <div class="position-relative mb-3">
                        <img class="img-fluid w-100" src="image/tintuc/{{ $laster->ttHinhAnh }}"
                            style="object-fit: cover; height: 220px;">
                        <div class="overlay position-relative bg-light">
                            <div class="mb-2" style="font-size: 14px;">
                                <a href="/danhmuc/{{ $laster->idDm }}">{{ $laster->tenDm }}</a>
                                <span class="px-1">/</span>
                                <span>{{ $laster->ngayDang }}</span>
                            </div>
                            <a class="h4"
                                href="/chitiet/{{ $laster->ttid }}">{{ \Illuminate\Support\Str::limit($laster->tieuDe, 40, '...') }}</a>
                            <p class="m-0">{!! \Illuminate\Support\Str::limit($laster->tomTat, 70, '...') !!}</p>

                        </div>
                    </div>
                @endif
                @php
                    $count++;
                @endphp
            @endforeach

        </div>
        <div class="col-lg-6">
            @php
                $count = 0;
            @endphp
            @foreach ($tintuclaster as $laster)
                @if ($count >= 2 && $count <= 3)
                    <div class="position-relative mb-3">
                        <img class="img-fluid w-100" src="image/tintuc/{{ $laster->ttHinhAnh }}"
                            style="object-fit: cover; height: 220px;">
                        <div class="overlay position-relative bg-light">
                            <div class="mb-2" style="font-size: 14px;">
                                <a href="/danhmuc/{{ $laster->idDm }}">{{ $laster->tenDm }}</a>
                                <span class="px-1">/</span>
                                <span>{{ $laster->ngayDang }}</span>
                            </div>
                            <a class="h4"
                                href="/chitiet/{{ $laster->ttid }}">{{ \Illuminate\Support\Str::limit($laster->tieuDe, 40, '...') }}</a>
                            <p class="m-0">{{ \Illuminate\Support\Str::limit($laster->tomTat, 70, '...') }}</p>

                        </div>
                    </div>
                @endif
                @php
                    $count++;
                @endphp
            @endforeach
        </div>
    </div>
@endsection
