<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            // $table->engine = 'InnoDB';
            // $table->charset = 'utf8mb4';
            // $table->collation = 'utf8mb4_unicode_ci';
            $table->increments('id');
            $table->string('name', 256);
            $table->string('email')->unique();
            $table->string('logo', 512)->nullable();
            $table->string('website', 256)->nullable();
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
        Schema::drop('companies');
    }
}
