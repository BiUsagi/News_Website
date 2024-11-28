<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\binh_luan;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\tin_tuc;
use App\Models\danh_muc;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\TinTucRequest;
use App\Http\Requests\DanhMucRequest;


class AdminController extends Controller
{
    public function index()
    {
        $demtt = tin_tuc::count();
        $demtk = User::count();
        $dembl = binh_luan::count();
        $demdm = danh_muc::count();

        return view('admin/index', [
            'demtt' => $demtt,
            'demtk' => $demtk,
            'dembl' => $dembl,
            'demdm' => $demdm,
        ]);
    }

    public function danhsachtin($id = null)
    {
        if ($id === null) {
            $tinTucs = tin_tuc::all();
            $tenDanhMuc = 'Tất cả tin tức';
        } else {
            $tinTucs = tin_tuc::where('idDm', $id)->get();
            $danhMuc = danh_muc::find($id);
            $tenDanhMuc = $danhMuc ? $danhMuc->tenDm : 'Danh mục không tồn tại';
        }
        return view('admin.tintuc.index', compact('tinTucs', 'tenDanhMuc'));
    }


    public function themtin()
    {
        $danhmuc = danh_muc::all();
        return view('admin/tintuc/add', compact('danhmuc'));
    }

    public function themtin_(TinTucRequest $request)
    {
        // TinTucRequest sẽ tự động thực hiện validation và trả về thông báo lỗi nếu dữ liệu không hợp lệ

        if ($request->hasFile('hinhAnh')) {
            $image = $request->file('hinhAnh');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->move('image/tintuc/', $imageName);

            // Tạo URL từ đường dẫn lưu trữ
            $imageUrl = $imageName;
        } else {
            $imageUrl = null;
        }

        // Tạo một đối tượng mới và lưu vào cơ sở dữ liệu
        $tinTuc = new tin_tuc;
        $tinTuc->tieuDe = $request->input('tieuDe');
        $tinTuc->tomTat = $request->input('tomTat');
        $tinTuc->noiDung = $request->input('noiDung');
        $tinTuc->hinhAnh = $imageUrl; // Lưu URL của ảnh vào cơ sở dữ liệu
        $tinTuc->idDm = $request->input('idDm');
        $tinTuc->ngayDang = now()->toDateString(); // Gán ngày hiện tại
        $tinTuc->luotXem = 0;

        // Lưu bản ghi vào cơ sở dữ liệu
        $tinTuc->save();

        // Chuyển hướng với thông báo thành công
        return redirect()->route('admin.tintuc.add')->with('success', 'Tin tức đã được thêm thành công!');



    }

    public function xoatt($id)
    {
        // Tìm tin tức theo ID
        $tinTuc = tin_tuc::findOrFail($id);

        // Xóa ảnh nếu có
        if ($tinTuc->hinhAnh) {
            // Tách tên file từ URL
            $imagePath = str_replace(asset('storage/'), 'public/', $tinTuc->hinhAnh);

            // Xóa ảnh khỏi thư mục lưu trữ
            Storage::delete($imagePath);
        }

        // Xóa mục tin tức khỏi cơ sở dữ liệu
        $tinTuc->delete();

        // Redirect về trang danh sách tin tức với thông báo thành công
        return redirect()->route('admin.tintuc.ds')->with('success', 'Tin tức đã được xóa thành công!');
    }

    public function suatin($id)
    {
        $tinTuc = tin_tuc::findOrFail($id); // Tìm tin tức theo ID
        $danhmuc = danh_muc::all(); // Lấy tất cả danh mục

        return view('admin/tintuc/update', compact('tinTuc', 'danhmuc'));
    }


    public function suatin_(TinTucRequest $request, $id)
    {
        // Tìm tin tức theo ID
        $tinTuc = tin_tuc::findOrFail($id);

        // Xử lý ảnh nếu có
        if ($request->hasFile('hinhAnh')) {
            // Xóa ảnh cũ nếu có
            // if ($tinTuc->hinhAnh) {
            //     $oldImagePath = str_replace(asset('storage/'), 'public/', $tinTuc->hinhAnh);
            //     Storage::delete($oldImagePath);
            // }

            // Lưu ảnh mới
            $image = $request->file('hinhAnh');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('image/tintuc', $imageName);

            $imageUrl = $imageName;
        } else {
            // Giữ nguyên ảnh cũ nếu không có ảnh mới
            $imageUrl = $tinTuc->hinhAnh;
        }

        // Cập nhật thông tin tin tức
        $tinTuc->tieuDe = $request->input('tieuDe');
        $tinTuc->tomTat = $request->input('tomTat');
        $tinTuc->noiDung = $request->input('noiDung');
        $tinTuc->hinhAnh = $imageUrl;
        $tinTuc->idDm = $request->input('idDm');
        $tinTuc->save();

        // Chuyển hướng với thông báo thành công
        return redirect()->route('admin.tintuc.ds')->with('success', 'Tin tức đã được cập nhật thành công!');
    }











    //danhmuc
    public function danhsachdm($id = null)
    {
        if ($id === null) {
            $danhmucs = danh_muc::all();
        } else {
            $danhmucs = danh_muc::where('id', $id)->get();
        }
        return view('admin.danhmuc.index', compact('danhmucs'));
    }


    public function themdm()
    {
        return view('admin/danhmuc/add');
    }

    public function themdm_(DanhMucRequest $request)
    {
        // Xử lý ảnh nếu có
        if ($request->hasFile('hinhAnh')) {
            $image = $request->file('hinhAnh');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->move('image/danhmuc', $imageName);

            $imageUrl = $imageName;
        } else {
            // Nếu không có ảnh mới, giữ giá trị null
            $imageUrl = null;
        }


        $danhmuc = new danh_muc();
        $danhmuc->tenDm = $request->input('tenDm');
        $danhmuc->hinhAnh = $imageUrl;
        $danhmuc->save();

        // Chuyển hướng với thông báo thành công
        return redirect()->route('admin.danhmuc.add')->with('success', 'Danh mục đã được thêm thành công!');
    }
    public function xoadm($id)
    {

        $danhmuc = danh_muc::findOrFail($id);
        $danhmuc->delete();

        // Redirect về trang danh sách tin tức với thông báo thành công
        return redirect()->route('admin.danhmuc.ds')->with('success', 'Danh mục đã được xóa thành công!');
    }

    public function suadm($id)
    {
        $danhmuc = danh_muc::findOrFail($id);
        return view('admin/danhmuc/update', compact('danhmuc'));
    }


    public function suadm_(DanhMucRequest $request, $id)
    {
        // Tìm danh mục theo ID
        $danhmuc = danh_muc::findOrFail($id);

        // Xử lý ảnh nếu có
        if ($request->hasFile('hinhAnh')) {

            $image = $request->file('hinhAnh');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move('image/danhmuc', $imageName);

            $imageUrl = $imageName;
        } else {
            $imageUrl = $danhmuc->hinhAnh;
        }

        // Cập nhật thông tin danh mục
        $danhmuc->tenDm = $request->input('tenDm');
        $danhmuc->hinhAnh = $imageUrl;
        $danhmuc->save();

        // Chuyển hướng với thông báo thành công
        return redirect()->route('admin.danhmuc.ds')->with('success', 'Danh mục đã được cập nhật thành công!');
    }





    //user
    public function danhsachuser()
    {
        $taikhoan = User::all();
        return view('admin/user/index', compact('taikhoan'));
    }

    public function block($id)
    {
        $tk = User::findOrFail($id);
        $tk->block = ($tk->block == 0) ? 1 : 0; // Toggle between 0 and 1
        $tk->save();

        return redirect()->back();
    }

    public function danhsachbinhluan()
    {
        $binhluans = binh_luan::whereNull('rep') // Chỉ lấy các bình luận chính
            ->with(['replies.user', 'user', 'tinTuc']) // Tải trước thông tin người dùng và các phản hồi cùng thông tin người dùng của các phản hồi
            ->get();
        return view('admin/binhluan/index', compact('binhluans'));
    }


    public function xoabinhluan($id)
    {
        $binhluan = binh_luan::findOrFail($id);
        $binhluan->delete();
        return redirect()->route('admin.binhluan.ds')->with('success', 'Bình luận đã được xóa thành công!');
    }


    public function xembinhluan($id)
    {
        $binhluans = binh_luan::where('id', $id) // Lọc các bình luận theo ID của bài viết
            ->whereNull('rep') // Chỉ lấy các bình luận chính
            ->with(['replies.user', 'user', 'tinTuc']) // Tải trước thông tin người dùng, phản hồi và bài viết
            ->first();
        return view('admin/binhluan/chitiet', compact('binhluans'));
    }
}

