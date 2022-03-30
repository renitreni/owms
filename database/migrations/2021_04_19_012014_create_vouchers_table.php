<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVouchersTable extends Migration
{
    /**
     * Run the migrations.
     * php artisan migrate:reset --path="./database/migrations/2021_04_19_012014_create_vouchers_table.php"
     * @return void
     */
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('agency_id', 200)->nullable();
            $table->text('applicant_name')->nullable();
            $table->string('status', 200)->nullable();
            $table->text('req_id_fare')->nullable();
            $table->text('passporting_allowance')->nullable();
            $table->text('info_sheet')->nullable();
            $table->string('ticket')->nullable();
            $table->text('testda_allowance')->nullable();
            $table->text('nbi_renewal_fare')->nullable();
            $table->string('medical_allowance')->nullable();
            $table->string('owwa_allowance')->nullable();
            $table->string('office_allowance')->nullable();
            $table->string('created_by', 200)->nullable();
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
        Schema::dropIfExists('vouchers');
    }
}
