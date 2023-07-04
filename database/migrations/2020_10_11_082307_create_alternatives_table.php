<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlternativesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alternatives', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('nik',20);
            $table->string('tempat_lahir', 50);
            $table->date('tgl_lahir');
            $table->string('jns_kelamin', 2);
            $table->string('telp', 15);
            $table->text('alamat');
            $table->string('rt', 5);
            $table->string('rw', 5);
            $table->string('periode', 4);
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
        Schema::dropIfExists('alternatives');
    }
}
