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
    Schema::table('hotels', function (Blueprint $table) {
      $table->text('name');
      $table->text('address');
      $table->text('city');
      $table->text('nit');
      $table->integer('rooms_number');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('hotels', function (Blueprint $table) {
      $table->dropColumn('title');
      $table->dropColumn('address');
      $table->dropColumn('city');
      $table->dropColumn('nit');
      $table->dropColumn('rooms_number');
    });
  }
};
