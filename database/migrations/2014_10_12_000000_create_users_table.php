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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('username')->unique();
            $table->string('password');
            $table->string('roles');
            $table->string('jk')->nullable();
            $table->string('foto')->nullable();
            $table->boolean('status_verifikasi')->nullable();
            $table->boolean('admin_start')->nullable();
            $table->integer('jumlah_benar')->nullable();
            $table->integer('jumlah_salah')->nullable();
            $table->integer('nilai_ujian')->nullable();
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
        Schema::dropIfExists('users');
    }
};
