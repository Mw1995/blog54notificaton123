<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('f_name');
            $table->string('l_name');
            
            $table->string('email')->unique();
            $table->string('password');
            
            $table->date('dt_created');
            $table->date('dt_updated');
            $table->date('expiry_contract_date');
            $table->text('photo');
            $table->timestamps();

            $table->rememberToken();
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
