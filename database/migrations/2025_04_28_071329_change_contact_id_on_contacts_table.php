<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropForeign(['contact_id']); // Hapus FK lama
            $table->string('contact_id')->change(); // Ubah tipe kolom jadi string
            $table->foreign('contact_id')->references('email')->on('users')->cascadeOnDelete(); // FK ke users.email
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropForeign(['contact_id']); // Hapus FK baru
            $table->unsignedBigInteger('contact_id')->change(); // Balik ke unsignedBigInteger
            $table->foreign('contact_id')->references('id')->on('users')->cascadeOnDelete(); // FK balik ke users.id
        });
    }
};
