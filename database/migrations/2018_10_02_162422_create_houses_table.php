<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHousesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'houses', function (Blueprint $table) {
                $table->increments('id');
                $table->string('address')->unique();
                $table->string('postcode')->nullable();
                $table->date('live_date')->nullable();
                $table->integer('no_rooms')->nullable();
                $table->enum('gender', ['Female', 'Male'])->nullable();
                $table->enum('landlord', ['Green Pastures', 'Private', 'Other'])->nullable();
                $table->date('dead_date')->nullable();
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
        Schema::dropIfExists('houses');
    }
}
