<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('price', 8, 2);
            $table->boolean('inventorial')->default(0);
            $table->integer('stock')->nullable();
            $table->integer('interest')->default(0);
            $table->date('duedate')->nullable();
            $table->boolean('apply_grant')->default(0);
            $table->string('currency')->default('mxn');
            $table->boolean('recurrence')->default(0);
            $table->date('starts')->nullable();
            $table->date('ends')->nullable();
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
        Schema::dropIfExists('services');
    }
}
