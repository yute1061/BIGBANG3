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
        Schema::table('users', function (Blueprint $table) {
            $table->string('profile_image')->default('user_default.jpg')->after('name')->nullable();
            $table->string('mybike');  
            $table->string('mybike_image')->default('user_default.jpg')->after('name')->nullable();  
            $table->string('career');
            $table->string('objective');
            $table->string('introduction');  
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('profile_image');
            $table->dropColumn('mybike_image');
        });
    }
};
