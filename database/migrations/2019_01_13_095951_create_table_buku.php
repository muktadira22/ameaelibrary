<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableBuku extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buku', function (Blueprint $table) {
            $table->char('id_buku', 7)->primary();
            $table->string('judul_buku');
            $table->integer('id_catalog');
            $table->string('pengarang');
            $table->string('tahun_terbit',50);
            $table->string('penerbit');
            $table->enum('status',['available','borrow','lost']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('buku');
    }
}
