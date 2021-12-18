<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanPhamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->id();
            $table->foreignId('NguoiDung_ID')->constrained('nguoidung')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('TheLoai_ID')->constrained('theloai')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('NhaSanXuat_ID')->constrained('nhasanxuat')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('NoiSanXuat_ID')->constrained('noisanxuat')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('BaoHanh_ID')->constrained('baohanh')->onUpdate('cascade')->onDelete('cascade');
            $table->string('TenSanPham');
            $table->integer('GiamGia');
            $table->string('TenSanPham_slug');
            $table->date('NamSanXuat');
            $table->double('GiaBan');
            $table->double('GiaNhap');
            $table->integer('SoLuong');
            $table->text('ThongSoSanPham')->nullable();
            $table->text('ChiTiet')->nullable();
            $table->string('HinhAnh')->nullable();;
            $table->unsignedTinyInteger('HienThi')->default(1);
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
        Schema::dropIfExists('san_pham');
    }
}
