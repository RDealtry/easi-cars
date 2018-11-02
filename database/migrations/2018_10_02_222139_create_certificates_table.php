<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'certificates', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedinteger('house_id');
                $table->enum('type', ['Electric', 'Fire', 'Gas', 'PAT']);
                $table->string('cert_no')->nullable();
                $table->date('issued');
                $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
                $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
                $table->foreign('house_id')->references('id')->on('houses')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('certificates');
    }
}
