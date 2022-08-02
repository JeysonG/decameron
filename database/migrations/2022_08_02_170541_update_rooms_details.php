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
    Schema::table('rooms_details', function (Blueprint $table) {
      $table->integer('quantity');
      $table->text('type');
      $table->text('category');
    });
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::table('rooms_details', function (Blueprint $table) {
      $table->dropColumn('quantity');
      $table->dropColumn('type');
      $table->dropColumn('category');
    });
  }
};