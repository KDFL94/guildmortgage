<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('borrowers', function (Blueprint $table) {
            // id & name 
            $table->id();
            $table->string('name');

            // borrower can have a job or not
            $table->integer('job_id')->unsigned()
                ->nullable();

            $table->integer('bank_account_id')->unsigned()->nullable();

            // created at|updated at|deleted at
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('borrowers');
    }
};
