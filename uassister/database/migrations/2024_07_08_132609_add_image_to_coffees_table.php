<?php


use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageToCoffeesTable extends Migration
{
    public function up()
    {
        Schema::table('coffees', function (Blueprint $table) {
            $table->string('image')->nullable();
        });
    }

    public function down()
    {
        Schema::table('coffees', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
}
