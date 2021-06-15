<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractHSWSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contract_h_s_w_s', function (Blueprint $table) {
            $table->id();
            $table->string('employer_name', 200)->nullable();
            $table->string('visa_no', 200)->nullable();
            $table->text('address')->nullable();
            $table->string('street', 200)->nullable();
            $table->string('district', 200)->nullable();
            $table->string('city', 200)->nullable();
            $table->string('cs_employer', 200)->nullable();
            $table->string('no_family_members', 200)->nullable();
            $table->string('telephone', 200)->nullable();
            $table->string('mobile', 200)->nullable();
            $table->string('email', 200)->nullable();

            $table->string('worker_name', 200)->nullable();
            $table->string('position', 200)->nullable();
            $table->string('address_ph', 200)->nullable();
            $table->string('cs_worker', 200)->nullable();
            $table->string('contact_no', 200)->nullable();
            $table->string('passport_no', 200)->nullable();
            $table->string('date_issued', 200)->nullable();
            $table->string('place_issued', 200)->nullable();
            $table->string('kin_name', 200)->nullable();
            $table->text('kin_address')->nullable();

            $table->string('employment_site', 200)->nullable();
            $table->string('salary', 200)->nullable();

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
        Schema::dropIfExists('contract_h_s_w_s');
    }
}
