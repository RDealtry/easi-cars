<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTenantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'tenants', function (Blueprint $table) {
                $table->increments('id');
                $table->string('preferred_name');//->unique(); // Maybe when "live"?
                $table->string('official_name')->nullable();
                $table->date('dob')->nullable();
                $table->enum('gender', ['female', 'male'])->nullable(); //Female and Male don't work with faker
                $table->date('charity_in_date')->nullable();
                $table->date('charity_out_date')->nullable();
                $table->string('email')->nullable();
                $table->string('phone')->nullable();
                $table->string('photo')->nullable();
                $table->string('ni_no')->nullable();
                $table->string('hb_ref')->nullable();
                $table->enum('referred_from', ['Council hostel', 'Church', 'Prison', 'Other'])->nullable();
                $table->enum('exit_to', ['Council flat', 'Private rented', 'Hostel', 'Evicted', 'Other'])->nullable();
                $table->enum('resettlement', ['Y', 'N'])->nullable();
                $table->date('last_support_plan')->nullable();
                $table->enum('pen_portrait', ['Y', 'N'])->nullable();
                $table->enum('outcome_star', ['Y', 'N'])->nullable();
                $table->string('exit_address')->nullable();
                $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
                $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tenants');
    }
}
