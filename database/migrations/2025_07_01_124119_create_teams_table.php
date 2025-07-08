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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('photo'); // Foto, boleh kosong
            $table->string('keterangan'); 
            $table->enum('division', [ // Kolom kunci untuk mengelompokkan
                'Ketua Satgas',
                'Sekretaris Satgas',
                'Anggota Divisi Intervensi',
                'Anggota Divisi Prevensi',
                'Anggota Divisi Advokasi',
                'Anggota The Guardian',
                'Anggota Duta',
                'Anggota Volunteer',
            ]);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
