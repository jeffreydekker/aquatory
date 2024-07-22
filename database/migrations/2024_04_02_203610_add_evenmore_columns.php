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
        Schema::table('registraties', function($table) {
            $table->string('ondersoort');
            $table->string('aantal');
            $table->string('mv');
            $table->string('groep');
            $table->string('jongen');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('registraties', function($table) {
            $table->$table->dropColumn('ondersoort');
            $table->$table->dropColumn('aantal');
            $table->$table->dropColumn('mv');
            $table->$table->dropColumn('groep');
            $table->$table->dropColumn('jongen');
        });
    }
};
