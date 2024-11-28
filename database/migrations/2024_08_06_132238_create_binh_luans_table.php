<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('binh_luans', function (Blueprint $table) {
            $table->id(); // Tự động tạo cột khóa chính tên là id
            $table->text('noi_dung'); // Nội dung bình luận
            $table->unsignedBigInteger('id_user'); // Khóa ngoại tới bảng users
            $table->unsignedBigInteger('id_tt'); // Khóa ngoại tới bảng tin_tucs
            $table->integer('like')->default(0); // Số lượng like, mặc định là 0
            $table->unsignedBigInteger('rep')->nullable(); // ID bình luận được trả lời, có thể null
            $table->timestamps(); // Tự động tạo cột created_at và updated_at

            // Định nghĩa các khóa ngoại
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_tt')->references('id')->on('tin_tucs')->onDelete('cascade');
            $table->foreign('rep')->references('id')->on('binh_luans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('binh_luans');
    }
};
