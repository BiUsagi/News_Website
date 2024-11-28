<div class="col-lg-4 pt-3 pt-lg-0">
    <!-- Social Follow Start -->
    <div class="pb-3">
        <div class="bg-light py-2 px-4 mb-3">
            <h3 class="m-0">Theo dõi</h3>
        </div>
        <div class="d-flex mb-3">
            <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none mr-2" style="background: #39569E;">
                <small class="fab fa-facebook-f mr-2"></small><small>12,345 Fans</small>
            </a>
            <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none ml-2" style="background: #52AAF4;">
                <small class="fab fa-twitter mr-2"></small><small>12,345 Followers</small>
            </a>
        </div>
        <div class="d-flex mb-3">
            <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none mr-2" style="background: #0185AE;">
                <small class="fab fa-linkedin-in mr-2"></small><small>12,345 Connects</small>
            </a>
            <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none ml-2" style="background: #C8359D;">
                <small class="fab fa-instagram mr-2"></small><small>12,345 Followers</small>
            </a>
        </div>
        <div class="d-flex mb-3">
            <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none mr-2" style="background: #DC472E;">
                <small class="fab fa-youtube mr-2"></small><small>12,345 Subscribers</small>
            </a>
            <a href="" class="d-block w-50 py-2 px-3 text-white text-decoration-none ml-2" style="background: #1AB7EA;">
                <small class="fab fa-vimeo-v mr-2"></small><small>12,345 Followers</small>
            </a>
        </div>
    </div>
    <!-- Social Follow End -->

    <!-- Newsletter Start -->
    <div class="pb-3">
        <div class="bg-light py-2 px-4 mb-3">
            <h3 class="m-0">Phản hồi</h3>
        </div>
        <div class="bg-light text-center p-4 mb-3">
            <p>Viết phản hồi và thắc mắc của bạn vào đây. Chúng tôi sẽ giải đắp thắc mắc</p>
            <div class="input-group" style="width: 100%;">
                <input type="text" class="form-control form-control-lg" placeholder="Nhập email...">
                <div class="input-group-append">
                    <button class="btn btn-primary">Gửi</button>
                </div>
            </div>
            <small> &nbsp </small>
        </div>
    </div>
    <!-- Newsletter End -->

    <!-- Ads Start -->
    <div class="mb-3 pb-3">
        <a href=""><img class="img-fluid" src="img/news-500x280-4.jpg" alt=""></a>
    </div>
    <!-- Ads End -->

    <!-- Popular News Start -->
    <div class="pb-3">
        <div class="bg-light py-2 px-4 mb-3">
            <h3 class="m-0">Tin mới nhất</h3>
        </div>
        @php
            $tintucnew = DB::table('tin_tucs')->join('danh_mucs', 'tin_tucs.idDm', '=', 'danh_mucs.id')->orderBy('tin_tucs.ngayDang', 'desc')->select('tin_tucs.*', 'tin_tucs.hinhAnh as ttHinhAnh', 'tin_tucs.id as ttid', 'danh_mucs.*')->limit(6)->get();
        @endphp



        @foreach ($tintucnew as $ttn)
            <div class="d-flex mb-3">
                <img src="image/tintuc/{{$ttn->ttHinhAnh}}" style="width: 100px; height: 100px; object-fit: cover;">
                <div class="w-100 d-flex flex-column justify-content-center bg-light px-3" style="height: 100px;">
                    <div class="mb-1" style="font-size: 13px;">
                        <a href="/danhmuc/{{$ttn->idDm}}">{{$ttn->tenDm}}</a>
                        <span class="px-1">/</span>
                        <span>{{$ttn->ngayDang}}</span>
                    </div>
                    <a class="h6 m-0" href="/chitiet/{{$ttn->ttid}}">{{$ttn->tieuDe}}</a>
                </div>
            </div>
        @endforeach



    </div>
    <!-- Popular News End -->


</div>