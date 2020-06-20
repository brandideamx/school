<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->index();
            $table->integer('student_id')->index();
            $table->integer('cycle_id')->index();
            $table->boolean('status')->default(1);
            $table->string('cancel_notes')->nullable();
            $table->string('additional_comments')->nullable();
            $table->text('details');
            $table->boolean('partial')->default(0);
            $table->boolean('paid')->default(0);
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
        Schema::dropIfExists('orders');
    }
}
