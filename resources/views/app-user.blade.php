@include('layouts/header')



<!-- morong -->
@yield('morong')




<div class="container-fluid py-3">
    <div class="container">
        <div class="row">


            <!-- noidung -->
            <div class="col-lg-8">

                @if (session('success'))
                    <!-- Toast Container -->
                    <div class="toast-container">
                        <div id="toast-success" class="toast">
                            <div class="toast-header">
                                <strong class="me-auto">Thông báo</strong>
                                <button type="button" class="btn-close" onclick="hideToast()"></button>
                            </div>
                            <div class="toast-body">
                                {{ session('success') }}
                                <!-- <small>vài giây trước</small> -->
                            </div>
                        </div>
                    </div>
                @endif


                @yield('noidung')
            </div>
            @include('layouts/nav')


        </div>
    </div>
</div>
</div>



@include('layouts/footer')



    