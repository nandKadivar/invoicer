<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->date('invoice_date');
            $table->date('due_date')->nullable();
            $table->string('invoice_number');
            $table->string('reference_number')->nullable();
            $table->string('status');
            $table->string('paid_status');
            $table->string('tax_per_item')->nullable();
            $table->string('discount_per_item')->nullable();
            $table->text('notes')->nullable();
            $table->string('discount_type')->nullable();
            $table->decimal('discount', 15, 2)->nullable();
            $table->decimal('discount_val', 15, 2)->nullable();
            $table->decimal('sub_total', 15, 2);
            $table->decimal('total', 15, 2);
            $table->decimal('tax', 15, 2);
            $table->decimal('due_amount', 15, 2);
            $table->boolean('sent')->default(false);
            $table->boolean('viewed')->default(false);
            $table->string('unique_hash')->nullable();
            // $table->integer('user_id')->unsigned()->nullable();
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->integer('company_id')->unsigned()->nullable();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->unsignedInteger('creator_id')->nullable();
            $table->foreign('creator_id')->references('id')->on('users')->onDelete('cascade');
            $table->decimal('exchange_rate', 19, 6)->nullable();
            $table->decimal('base_discount_val', 15, 2)->nullable();
            $table->decimal('base_sub_total', 15, 2)->nullable();
            $table->decimal('base_total', 15, 2)->nullable();
            $table->decimal('base_tax', 15, 2)->nullable();
            $table->decimal('base_due_amount', 15, 2)->nullable();
            $table->unsignedInteger('currency_id')->nullable();
            $table->foreign('currency_id')->references('id')->on('currencies');
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
        Schema::dropIfExists('invoices');
    }
}
