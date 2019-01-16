<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMember extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member', function (Blueprint $table) {
            $table->char('id_member', 10)->primary();
            $table->string('nama', 50);
            $table->date('tgl_lahir');
            $table->text('alamat')->nullable();
            $table->enum('jenis_kelamin', ["Laki - Laki","Perempuan"]);
            $table->string('pekerjaan', 30);
            $table->date('tgl_gabung');
            $table->string('photo', 50)->nullable();
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
        Schema::dropIfExists('member');
    }
}
