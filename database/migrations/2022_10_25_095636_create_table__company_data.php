<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCompanyData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('company_data', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('companyName');
            $table->string('companyAddress');
            $table->string('companyLandmark');
            $table->string('companyCity');
            $table->string('companystate');
            $table->string('pincode');
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
        Schema::dropIfExists('table__company_data');
    }
}
