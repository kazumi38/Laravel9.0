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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            // $table->biginteger('folder_id')->unsigned();
            $table->string('title',100);
            $table->date('due_date');
            $table->integer('status')->default(1);
            $table->timestamps();

            // Setting Foreign Key
            // $table->foreign('folder_id')->references('id')->on('folders');
            $table->foreignId('folder_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tasks');
    }
};
