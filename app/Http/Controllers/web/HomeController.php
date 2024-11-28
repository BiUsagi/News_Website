<?php

namespace App\Http\Controllers\web;

use App\Models\binh_luan;
use App\Models\danh_muc;
use App\Models\tin_tuc;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $danhmuc = DB::table('danh_mucs')->limit(4)->get();
        $alltintuc = DB::table('tin_tucs')->join('danh_mucs', 'tin_tucs.idDm', '=', 'danh_mucs.id')->select('tin_tucs.*', 'tin_tucs.id as ttid', 'tin_tucs.hinhAnh as ttHinhAnh', 'danh_mucs.*')->get();
        $tintuc1 = DB::table('tin_tucs')->join('danh_mucs', 'tin_tucs.idDm', '=', 'danh_mucs.id')->where('idDm', '=', '5')->select('tin_tucs.*', 'tin_tucs.id as ttid', 'tin_tucs.hinhAnh as ttHinhAnh', 'danh_mucs.*')->get();
        $tintuc2 = DB::table('tin_tucs')->join('danh_mucs', 'tin_tucs.idDm', '=', 'danh_mucs.id')->where('idDm', '=', '2')->select('tin_tucs.*', 'tin_tucs.id as ttid', 'tin_tucs.hinhAnh as ttHinhAnh', 'danh_mucs.*')->get();
        $tintuc3 = DB::table('tin_tucs')->join('danh_mucs', 'tin_tucs.idDm', '=', 'danh_mucs.id')->where('idDm', '=', '3')->select('tin_tucs.*', 'tin_tucs.id as ttid', 'tin_tucs.hinhAnh as ttHinhAnh', 'danh_mucs.*')->get();
        $tintucpopular = DB::table('tin_tucs')->join('danh_mucs', 'tin_tucs.idDm', '=', 'danh_mucs.id')->orderBy('tin_tucs.luotXem', 'desc')->select('tin_tucs.*', 'tin_tucs.id as ttid', 'tin_tucs.hinhAnh as ttHinhAnh', 'danh_mucs.*')->get();
        $tintuclaster = DB::table('tin_tucs')->join('danh_mucs', 'tin_tucs.idDm', '=', 'danh_mucs.id')->orderBy('tin_tucs.ngayDang', 'asc')->select('tin_tucs.*', 'tin_tucs.id as ttid', 'tin_tucs.hinhAnh as ttHinhAnh', 'danh_mucs.*')->get();
        return view('index', [
            'danhmuc' => $danhmuc,
            'alltintuc' => $alltintuc,
            'tintuc1' => $tintuc1,
            'tintuc2' => $tintuc2,
            'tintuc3' => $tintuc3,
            'tintucpopular' => $tintucpopular,
            'tintuclaster' => $tintuclaster,
        ]);
    }               

    public function danhmuc(string $id)
    {
        if ($id == 'all') {
            $danhmuc = DB::table('tin_tucs')->join('danh_mucs', 'tin_tucs.idDm', '=', 'danh_mucs.id')->select('tin_tucs.*', 'tin_tucs.id as ttid', 'tin_tucs.hinhAnh as ttHinhAnh', 'danh_mucs.*')->get();
            $tendm = 'Tất cả';
        } else {
            $danhmuc = DB::table('tin_tucs')->join('danh_mucs', 'tin_tucs.idDm', '=', 'danh_mucs.id')->select('tin_tucs.*', 'tin_tucs.id as ttid', 'tin_tucs.hinhAnh as ttHinhAnh', 'danh_mucs.*')->where('tin_tucs.idDm', '=', $id)->get();
            $tendm = danh_muc::findOrFail($id)->tenDm;
        }
        return view('danhmuc', ['danhmuc' => $danhmuc, 'tendm' => $tendm]);
    }

    public function lienhe()
    {

        return view('lienhe');
    }

    public function chitiet(string $id)
    {
        $luotxem = tin_tuc::find($id);
        $luotxem->luotXem++;
        $luotxem->save();

        $chitiet = tin_tuc::with([
            'danhMuc',
            'binhLuans' => function ($query) {
                $query->whereNull('rep')
                    ->with(['replies.user', 'user']); // Tải trước thông tin người dùng và trả lời
            }
        ])->findOrFail($id);
        

        $totalComments = $chitiet->binhLuans->count() + $chitiet->binhLuans->sum(function ($binhLuan) {
            return $binhLuan->replies->count();
        });


        return view('chitiet', [
            'chitiet' => $chitiet,
            'totalComments' => $totalComments
        ]);
    }
    public function store(Request $request, $tinTucId)
    {
        $request->validate([
            'noi_dung' => 'required|string|max:1000',
        ]);

        // Lưu bình luận mới
        $binhLuan = new binh_luan();
        $binhLuan->noi_dung = $request->noi_dung;
        $binhLuan->id_tt = $tinTucId; 
        $binhLuan->id_user = auth()->id();
        $binhLuan->save();

        return redirect()->back()->with('success', 'Bình luận đã được thêm.');
    }


    public function reply(Request $request, $binhLuanId)
    {
        $request->validate([
            'noi_dung' => 'required|string|max:1000',
        ]);

        // Lưu trả lời
        $reply = new binh_luan();
        $reply->noi_dung = $request->noi_dung;
        $reply->rep = $binhLuanId; // ID của bình luận chính
        $reply->id_user = auth()->id();
        $reply->id_tt = null; 

        $reply->save();

        return redirect()->back()->with('success', 'Trả lời đã được thêm.');
    }

    public function likeComment($binhLuanId)
    {
        // Tìm bình luận và tăng số lượng like
        $binhLuan = binh_luan::findOrFail($binhLuanId);
        $binhLuan->like++;
        $binhLuan->save();

        return redirect()->back()->with('success', 'Bạn đã thích bình luận.');
    }

    // app/Http/Controllers/BinhLuanController.php
    public function destroy($id)
    {
        $binhLuan = binh_luan::findOrFail($id);

        // Kiểm tra quyền xóa
        if ($binhLuan->user->id != auth()->user()->id) {
            return redirect()->back()->with('error', 'Bạn không có quyền xóa bình luận này.');
        }

        $binhLuan->delete();

        return redirect()->back()->with('success', 'Bình luận đã được xóa.');
    }

    public function timkiem(Request $request)
    {
        $query = $request->input('search');

        if ($query == "") {
            $danhmuc = tin_tuc::where('tieuDe', 'like', "KÍ TỰ TRỐNG")
                ->with('danhMuc')
                ->get();
        } else {
            $danhmuc = tin_tuc::where('tieuDe', 'like', "%$query%")
                ->with('danhMuc')
                ->get();
        }

        return view('timkiem', ['danhmuc' => $danhmuc, 'timkiem' => $query]);
    }





}
