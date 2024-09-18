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
        Schema::table('participants', function (Blueprint $table) {
            // Menambahkan kolom 'id_lomba'
            $table->unsignedBigInteger('id_lomba')->after('id')->nullable();

            // Mendefinisikan foreign key untuk 'id_lomba'
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
        Schema::table('participants', function (Blueprint $table) {
            // Menghapus foreign key
            $table->dropForeign(['id_lomba']);

            // Menghapus kolom 'id_lomba'
            $table->dropColumn('id_lomba');
        });
    }
};
