<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedinteger('house_id');
            $table->unsignedinteger('tenant_id');
            $table->integer('room_no');
            $table->date('in_room');
            $table->date('out_room')->nullable();
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
            $table->foreign('house_id')->references('id')->on('houses')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('tenant_id')->references('id')->on('tenants')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('rooms');
    }
}
