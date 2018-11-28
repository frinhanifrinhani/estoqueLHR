<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\User;
class CreteUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users',function(Blueprint $table){
            $table->Increments('id');
            $table->string('name');
            $table->string('username',30)->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
        });
        
      factory(User::class)->create([
        'username'=>'admin',
        'email'=>'admin@admin.com',
        'password'=>bcrypt('admin123'),
     ]);
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}