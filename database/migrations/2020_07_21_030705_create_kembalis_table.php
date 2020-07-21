<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKembalisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('peminjams', function (Blueprint $table) {
            $table->increments('pinjam_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('buku_id');
            $table->timestamp('pinjam_at')->default(now());
            $table->timestamp('kembali_at')->default(date('y-m-d H:i:s',strtotime('next weeks')));
            $table->softDeletes('deleted_at')->nullable();
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('buku_id')->references('buku_id')->on('bukus')->onDelete('cascade')->onUpdate('cascade');
        });
        Schema::create('kembalis', function (Blueprint $table) {
            $table->unsignedInteger('pinjam_id');
            $table->timestamp('kembali_at');
            $table->boolean('pending')->default(0);
            $table->integer('denda')->unsigned()->nullable();
            $table->softDeletes('deleted_at')->nullable();
            $table->foreign('pinjam_id')->references('pinjam_id')->on('peminjams')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kembalis');
    }
}
