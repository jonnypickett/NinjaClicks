<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClicksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('clicks')) {
            Schema::create('clicks', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger('provider_id');
                $table->date('date')->nullable()->default(null);
                $table->string('total_clicks', 45)->nullable()->default(null);

                $table->foreign('provider_id', 'provider_fk_idx')
                      ->references('id')->on('provider')
                      ->onUpdate('no action')
                      ->onDelete('no action');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clicks');
    }
}
