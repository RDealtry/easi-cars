<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCasenotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'casenotes', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedinteger('tenant_id');
                $table->unsignedinteger('user_id');
                $table->text('note');
                $table->date('casenote_date');
                // did have method/instigator/place
                $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
                $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
                $table->foreign('tenant_id')->references('id')->on('tenants')->onDelete('cascade')->onUpdate('cascade');
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('casenotes');
    }
}
