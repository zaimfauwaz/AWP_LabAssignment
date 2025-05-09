<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('assessments', function (Blueprint $table) {
            $table->date('assessment_date')->after('score');
        });
    }

    public function down()
    {
        Schema::table('assessments', function (Blueprint $table) {
            $table->dropColumn('assessment_date');
        });
    }
};
