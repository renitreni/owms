<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('photo_url', 200)->nullable();
            $table->string('agency_code', 200)->nullable();
            $table->string('first_name', 200)->nullable();
            $table->string('last_name', 200)->nullable();
            $table->string('middle_name', 200)->nullable();
            $table->string('email', 200)->nullable();
            $table->string('contact_1', 200)->nullable();
            $table->string('contact_2', 200)->nullable();
            $table->text('address')->nullable();
            $table->date('birth_date')->nullable();
            $table->string('sex', 200)->nullable();
            $table->string('civil_status', 200)->nullable();
            $table->string('passport', 200)->nullable();
            $table->string('education', 200)->nullable();
            $table->string('spouse', 200)->nullable();
            $table->string('mother_name', 200)->nullable();
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
        Schema::dropIfExists('employees');
    }
}
