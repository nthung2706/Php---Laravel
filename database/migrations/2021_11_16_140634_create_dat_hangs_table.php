<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatHangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dathang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('NguoiDung_ID')->constrained('nguoidung')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('TinhTrang_id')->constrained('tinhtrang')->onUpdate('cascade')->onDelete('cascade');
            $table->integer('SDT');
            $table->string('DiaChi');
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
        Schema::dropIfExists('dathang');
    }
}
