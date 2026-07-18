<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('libros', function (Blueprint $table) {
            $table->foreignId('autor_id')->nullable()->after('anio')->constrained('autores')->nullOnDelete();
            $table->foreignId('categoria_id')->nullable()->after('autor_id')->constrained('categorias')->nullOnDelete();
            $table->foreignId('editorial_id')->nullable()->after('categoria_id')->constrained('editoriales')->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('libros', function (Blueprint $table) {
            $table->dropForeign(['autor_id']);
            $table->dropForeign(['categoria_id']);
            $table->dropForeign(['editorial_id']);
            $table->dropColumn(['autor_id', 'categoria_id', 'editorial_id']);
        });
    }
};
