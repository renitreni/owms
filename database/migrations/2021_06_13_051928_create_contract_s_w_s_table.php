<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractSWSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_s_w_s', function (Blueprint $table) {
            $table->id();
            $table->string('employer_name', 200)->nullable();
            $table->text('employer_address')->nullable();
            $table->string('po_box_no', 200)->nullable();
            $table->string('telephone', 200)->nullable();
            $table->string('fax', 200)->nullable();

            $table->string('employee_name', 200)->nullable();
            $table->string('cs_status', 200)->nullable();
            $table->string('passport_no', 200)->nullable();
            $table->string('date_issued', 200)->nullable();
            $table->string('place_issued', 200)->nullable();
            $table->text('employee_address')->nullable();

            $table->string('site_of_employment', 200)->nullable();
            $table->string('employee_position', 200)->nullable();
            $table->string('salary', 200)->nullable();

            $table->string('witness_day', 200)->nullable();
            $table->string('witness_month', 200)->nullable();
            $table->string('witness_year', 200)->nullable();
            $table->string('witness_place', 200)->nullable();

            $table->string('agency_id', 200)->nullable();
            $table->string('approved_by', 200)->nullable();
            $table->date('approved_date')->nullable();
            $table->string('status', 200)->nullable();
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
        Schema::dropIfExists('contract_s_w_s');
    }
}
