<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            // $table->engine = 'InnoDB';
            // $table->charset = 'utf8mb4';
            // $table->collation = 'utf8mb4_unicode_ci';
            $table->increments('id');
            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies')->onUpdate('cascade')->onDelete('cascade');
            $table->string('first_name', 80);
            $table->string('last_name', 80);
            $table->string('email')->unique();
            $table->string('phone', 50)->nullable();
            $table->string('avatar', 512)->nullable();
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
        Schema::drop('employees');
    }
}
