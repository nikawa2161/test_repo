<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->dropColumn('human_name');
        });
    }

    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->string('human_name')->nullable();
        });
    }
};
