<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBukusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bukus', function (Blueprint $table) {
            $table->increments('buku_id');
            $table->string('judul',120);
            $table->string('slug');
            $table->string('category',70);
            $table->string('pengarang',70);
            $table->string('penerbit',70);
            $table->text('sinopsis',70);
            $table->integer('jumlah');
            $table->string('avatar')->nullable();
            $table->string('eBook')->nullable();
            $table->integer('rating')->unsigned();
            $table->timestamps();
            $table->softDeletes('deleted_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bukus');
    }
}
