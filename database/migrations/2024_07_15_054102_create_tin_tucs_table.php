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
        Schema::create('tin_tucs', function (Blueprint $table) {
            $table->id();
            $table->string('tieuDe');
            $table->text('tomTat');
            $table->text('noiDung');
            $table->string('hinhAnh');
            $table->date('ngayDang');
            $table->integer('luotXem');
            $table->unsignedBigInteger('idDm');
            $table->timestamps();

            $table->foreign('idDm')
                ->references('id')
                ->on('danh_mucs')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tin_tucs');
    }
};
