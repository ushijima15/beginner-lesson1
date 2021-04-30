<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->nullable()->comment('顧客コード');
            $table->string('name')->nullable()->comment('顧客名');
            $table->string('postal_code')->nullable()->comment('郵便番号');
            $table->string('address')->nullable()->comment('住所');
            $table->string('tel')->nullable()->comment('電話番号');
            $table->string('fax')->comment('FAX');
            $table->string('closing_day')->comment('定休日');
            $table->softDeletes();
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
        Schema::dropIfExists('customers');
    }
}