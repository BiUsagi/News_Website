@extends('app-user')

@section('morong')
    <style>
        .form-group {
            position: relative;
        }

        #commentContent {
            padding-right: 80px;
            /* Để tránh chồng lấp với nút gửi */
        }

        .btn-primary {
            position: absolute;
            bottom: 10px;
            /* Khoảng cách từ dưới cùng */
            right: 10px;
            /* Khoảng cách từ bên phải */
            z-index: 10;
            /* Đảm bảo nút gửi nằm trên ô nhập liệu */
        }
    </style>



    <div class="container-fluid">
        <div class="container">
            <nav class="breadcrumb bg-transparent m-0 p-0">
                <a class="breadcrumb-item" href="#">Home</a>
                <a class="breadcrumb-item" href="#">Danh mục</a>
                <a class="breadcrumb-item" href="/danhmuc/{{ $chitiet->idDm }}">{{ $chitiet->danhMuc->tenDm }}</a>
                <span class="breadcrumb-item active">{{ $chitiet->tieuDe }}</span>
            </nav>
        </div>
    </div>
@endsection

@section('noidung')
    <div>


        <!-- Comment List Start -->
        <div>
            <!-- News Detail Start -->
            <div class="position-relative mb-3">
                <!-- <img class="img-fluid w-100" src="{{ $chitiet->ttHinhAnh }}" style="object-fit: cover;"> -->
                <div class="overlay position-relative bg-light">
                    <div class="mb-3">
                        <a href="/danhmuc/{{ $chitiet->idDm }}">{{ $chitiet->tenDm }}</a>
                        <span class="px-1">/</span>
                        <span>{{ $chitiet->ngayDang }}</span>
                    </div>
                    <div>
                        <h3 class="mb-3">{{ $chitiet->tieuDe }}</h3>
                        <p>{!! $chitiet->noiDung !!}</p>
                    </div>
                </div>
            </div>
            <!-- News Detail End -->

            <!-- Comment List Start -->
            <!-- Comment Section -->
            <div class="bg-light mb-3" style="padding: 30px;">
                <h3 class="mb-4">{{ $totalComments }} Comments</h3>

                @foreach ($chitiet->binhLuans as $binhLuan)
                    <div class="media mb-4" data-binhluan-id="{{ $binhLuan->id }}">
                        <img src="image/user/{{ $binhLuan->user->hinhAnh }}" alt="User Image" class="mr-3 rounded-circle"
                            style="width: 60px; height: 60px;">
                        <div class="media-body">
                            <h5 class="mt-0">
                                <a href="#" class="text-dark">{{ $binhLuan->user->name }}</a>
                                <small class="text-muted">Đăng lúc:
                                    {{ $binhLuan->user->created_at->format('d-m-Y H:i') }}</small>
                            </h5>
                            <p>{{ $binhLuan->noi_dung }}</p>
                            @auth
                                <div class="btn-group mt-2" role="group">
                                    <form action="{{ route('binhLuan.like', $binhLuan->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-outline-success btn-sm">
                                            <i class="fas fa-thumbs-up"></i> {{ $binhLuan->like }} like
                                        </button>
                                    </form>
                                    <button type="button" class="btn btn-outline-info btn-sm reply-btn"
                                        data-user="{{ $binhLuan->user->name }}" data-parent-id="{{ $binhLuan->id }}">
                                        <i class="fas fa-reply"></i> Trả lời
                                    </button>
                                    @if ($binhLuan->user->id == auth()->user()->id)
                                        <form action="{{ route('binhLuan.destroy', $binhLuan->id) }}" method="POST"
                                            style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm">
                                                <i class="fas fa-trash"></i> Xóa
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            @else
                            @endauth

                            <!-- Form trả lời bình luận -->
                            @auth
                                <form action="{{ route('binhLuan.reply', $binhLuan->id) }}" method="POST"
                                    class="mt-3 reply-form position-relative d-none" data-parent-id="{{ $binhLuan->id }}">
                                    @csrf
                                    <div class="form-group">
                                        <textarea name="noi_dung" class="form-control" rows="3" placeholder="Viết trả lời của bạn..."></textarea>
                                        <button type="submit"
                                            class="btn btn-primary position-absolute end-0 bottom-0 mb-1 me-1">Gửi</button>
                                    </div>
                                </form>
                            @endauth

                            @foreach ($binhLuan->replies as $reply)
                                <div class="media mt-3 border p-3 rounded" data-binhluan-id="{{ $reply->id }}">
                                    <img src="image/user/{{ $reply->user->hinhAnh }}" alt="User Image"
                                        class="mr-3 rounded-circle" style="width: 50px; height: 50px;">
                                    <div class="media-body">
                                        <h6 class="mt-0">
                                            <a href="#" class="text-dark">{{ $reply->user->name }}</a>
                                            <small class="text-muted">Đăng lúc:
                                                {{ $reply->user->created_at->format('d-m-Y H:i') }}</small>
                                        </h6>
                                        <p>{{ $reply->noi_dung }}</p>
                                        @auth
                                            <div class="btn-group mt-2" role="group">
                                                <form action="{{ route('binhLuan.like', $reply->id) }}" method="POST"
                                                    style="display: inline;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-outline-success btn-sm">
                                                        <i class="fas fa-thumbs-up"></i> {{ $reply->like }} like
                                                    </button>
                                                </form>
                                                <button type="button" class="btn btn-outline-info btn-sm reply-btn"
                                                    data-user="{{ $reply->user->name }}" data-parent-id="{{ $binhLuan->id }}"
                                                    data-reply-id="{{ $reply->id }}">
                                                    <i class="fas fa-reply"></i> Trả lời
                                                </button>
                                                @if ($reply->user->id == auth()->user()->id)
                                                    <form action="{{ route('binhLuan.destroy', $reply->id) }}" method="POST"
                                                        style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-outline-danger btn-sm">
                                                            <i class="fas fa-trash"></i> Xóa
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        @endauth

                                        <!-- Form trả lời bình luận con -->
                                        @auth
                                            <form action="{{ route('binhLuan.reply', $binhLuan->id) }}" method="POST"
                                                class="mt-3 reply-form position-relative d-none"
                                                data-parent-id="{{ $binhLuan->id }}" data-reply-id="{{ $reply->id }}">
                                                @csrf
                                                <div class="form-group">
                                                    <textarea name="noi_dung" class="form-control" rows="3" placeholder="Viết trả lời của bạn..."></textarea>
                                                    <button type="submit"
                                                        class="btn btn-primary position-absolute end-0 bottom-0 mb-1 me-1">Gửi</button>
                                                </div>
                                            </form>
                                        @endauth
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endforeach


                <!-- Form bình luận -->
                <h3 class="mt-5">Thêm bình luận</h3>
                @auth
                    <form action="{{ route('binhLuan.store', $chitiet->id) }}" method="POST">
                        @csrf
                        <div class="form-group position-relative">
                            <textarea id="commentContent" name="noi_dung" class="form-control" rows="3"
                                placeholder="Viết bình luận của bạn..."></textarea>
                            <button type="submit"
                                class="btn btn-primary position-absolute end-0 bottom-0 mb-1 me-1">Gửi</button>
                        </div>
                    </form>
                @else
                    <p>Bạn cần <a href="{{ route('login') }}">đăng nhập</a> để bình luận.</p>
                @endauth

            </div>






            <!-- Comment List End -->
        </div>

        <!-- Comment List End -->


    </div>

    <script>
        document.querySelectorAll('.reply-btn').forEach(button => {
            button.addEventListener('click', function() {
                const userName = this.getAttribute('data-user');
                const parentId = this.getAttribute('data-parent-id');
                const replyId = this.getAttribute('data-reply-id');
                const form = replyId ?
                    document.querySelector(`form.reply-form[data-reply-id="${replyId}"]`) :
                    document.querySelector(`form.reply-form[data-parent-id="${parentId}"]`);
                const textarea = form.querySelector('textarea');
                textarea.value = `@${userName} `;
                textarea.focus();
                textarea.setSelectionRange(textarea.value.length, textarea.value.length);
                form.classList.remove('d-none'); // Hiển thị form trả lời
            });
        });
    </script>



    <!-- Bootstrap JS (phụ thuộc vào Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"></script>
@endsection
