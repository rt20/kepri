<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerencanaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perencanaans', function (Blueprint $table) {
            $table->id();
            $table->integer('desa_id');
            $table->date('pelantikan_rpjmdes');
            $table->date('penetapan_rpjmdes');
            $table->integer('no_rpjmdes');
            $table->date('pelantikan_rkpdes');
            $table->date('penetapan_rkpdes');
            $table->integer('no_rkpdes');
           
            $table->date('penetapan_apbdes');
            $table->integer('no_apbdes');

            $table->integer('alokasidd');
            $table->integer('alokasiadd');
            $table->integer('alokasidbhprd');
            $table->integer('bankeu_kab');
            $table->integer('bankeu_prov');
            $table->integer('dll');
            $table->integer('total');

            $table->softDeletes();
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
        Schema::dropIfExists('perencanaans');
    }
}
