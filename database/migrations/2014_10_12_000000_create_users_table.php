<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
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
            $table->string('nama')->nullable();
            $table->string('email')->unique();
            $table->string('no_ktp')->nullable();
            $table->string('password');
            $table->string('tempat_lahir')->nullable();
            $table->string('tgllahir')->nullable();
            $table->string('jk')->nullable();
            $table->string('agama')->nullable();
            $table->string('gd')->nullable();
            $table->string('alamat_ktp')->nullable();
            $table->string('alamat_tinggal')->nullable();
            $table->string('no_tlp')->nullable();
            $table->text('skill')->nullable();
            $table->boolean('bersedia_diluar_kota')->nullable();
            $table->string('gaji')->nullable();
            $table->string('posisi')->nullable();
            $table->string('level')->default('user');
            $table->rememberToken();
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
}
