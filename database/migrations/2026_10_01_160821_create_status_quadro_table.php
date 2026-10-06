<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('status_quadro', function (Blueprint $table) {
            $table->id();
            $table->string("nome");
            $table->text("descricao")->nullable();
            $table->foreignId("quadro_id")->constrained("quadros")->cascadeOnDelete();
            $table->timestamp("criado_em")->nullable();
            $table->timestamp("atualizado_em")->nullable();
            $table->softDeletes("apagado_em")->nullable();
        });

        Schema::table('tarefas', function (Blueprint $table) {
            $table->foreign('status_id')->references('id')->on('status_quadro')->cascadeOnDelete();
        });
    }

    public function down(): void
    {
        Schema::table('tarefas', function (Blueprint $table) {
            $table->dropForeign(['status_id']);
        });
        Schema::dropIfExists('status_quadro');
    }
};
