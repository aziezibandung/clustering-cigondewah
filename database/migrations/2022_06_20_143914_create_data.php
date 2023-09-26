<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('m_data', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama',100);
            $table->string('nik',30);
            $table->string('tanggal_lahir',30);
            $table->string('jenis_kelamin',10);
            $table->string('pekerjaan',100);
            $table->string('penghasilan',100);
            $table->text('alamat',200);
            $table->string('rt_rw',10);
            $table->string('jumlah_anak',50);
            $table->string('pendidikan_terakhir',10);
            $table->timestamps();

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
        Schema::table('m_data', function (Blueprint $table) {
            //
        });
    }
}
