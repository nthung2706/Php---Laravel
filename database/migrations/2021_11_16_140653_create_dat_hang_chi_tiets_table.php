<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatHangChiTietsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dathang_chitiet', function (Blueprint $table) {
            $table->id();
            $table->foreignId('DatHang_ID')->constrained('dathang')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('SanPham_ID')->constrained('sanpham')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('SoLuongMua');
            $table->integer('DonGiaBan');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent();
            $table->engine = 'InnoDB';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dathang_chitiet');
    }
}
