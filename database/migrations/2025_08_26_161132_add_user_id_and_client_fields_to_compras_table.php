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
        Schema::table('compras', function (Blueprint $table) {
            $table->foreignId('user_id')->nullable()->after('proveedor_id')->constrained('users');
            $table->string('referencia')->nullable()->after('estado');
            $table->string('nombre_cliente')->nullable()->after('referencia');
            $table->string('email_cliente')->nullable()->after('nombre_cliente');
            $table->text('direccion_cliente')->nullable()->after('email_cliente');
            $table->string('telefono_cliente')->nullable()->after('direccion_cliente');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('compras', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn(['user_id', 'referencia', 'nombre_cliente', 'email_cliente', 'direccion_cliente', 'telefono_cliente']);
        });
    }
};
