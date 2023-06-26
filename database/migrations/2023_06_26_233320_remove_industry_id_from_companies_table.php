<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('companies', function (Blueprint $table) {
            // 外部キー制約を削除
            $table->dropForeign(['industry_id']);
            $table->dropColumn('industry_id');
        });
    }

    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {
            $table->bigInteger('industry_id')->unsigned()->nullable();
            $table->foreign('industry_id')->references('id')->on('companies');
        });
    }
};
