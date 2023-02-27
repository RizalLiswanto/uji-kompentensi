<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('berita', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->bigInteger('tipe_berita_id');
            $table->string('judul');
            $table->text('isi_berita');
            $table->string('komentar')->nullable();
            $table->integer('status_headline')->default('1');
            $table->enum('status', ['pending', 'posting', 'deleted'])->default('pending');
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
        Schema::dropIfExists('berita');
    }
};
