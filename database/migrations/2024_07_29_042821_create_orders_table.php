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
            $table->string('full_name');
            $table->string('email');
            $table->string('address');
            $table->string('city');
            $table->string('postal_code');
            $table->string('phone_number');
            $table->date('plan_end_date')->nullable();
            $table->decimal('total_amount', 10, 2);
            $table->string('transactionid');
            $table->unsignedBigInteger('userid');
            $table->unsignedBigInteger('plantype_id');
            $table->timestamps();
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
