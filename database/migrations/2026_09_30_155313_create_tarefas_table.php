<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('tarefas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->text("descricao")->nullable();
            $table->foreignId('quadro_id')->constrained()->cascadeOnDelete();
            $table->foreignId('usuario_id')->constrained("usuarios")->cascadeOnDelete();
            $table->timestamp('criado_em')->nullable();
            $table->timestamp('atualizado_em')->nullable();
            $table->softDeletes("apagado_em")->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tarefas');
    }
};
