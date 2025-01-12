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
        Schema::table('judges', function (Blueprint $table) {
            $table->unsignedBigInteger('id_lomba')->after('id')->nullable();

            $table->foreign('id_lomba')->references('id')->on('contests')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('judges', function (Blueprint $table) {
            // Menghapus foreign key
            $table->dropForeign(['id_lomba']);

            // Menghapus kolom 'id_lomba'
            $table->dropColumn('id_lomba');
        });
    }
};
