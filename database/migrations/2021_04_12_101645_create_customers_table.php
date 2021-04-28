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
            $table->string('first_name')->nullable()->comment('名');
            $table->string('last_name')->comment('姓');
            $table->string('first_phonetic_name')->nullable()->comment('カナ名');
            $table->string('last_phonetic_name')->nullable()->comment('カナ姓');
            $table->string('company_name')->comment('会社名');
            $table->string('address')->nullable()->comment('住所');
            $table->softDeletes();
            //$table->timestamps();
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