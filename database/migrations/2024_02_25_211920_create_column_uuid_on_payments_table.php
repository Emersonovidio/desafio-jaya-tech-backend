<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColumnUuidOnPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasColumn('payments', 'uuid')) {
            Schema::table('payments', function (Blueprint $table) {
                $table->string('uuid')->nullable()->after('id');
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (Schema::hasColumn('payments', 'uuid')) {
            Schema::table('payments', function (Blueprint $table) {
                $table->dropColumn('uuid');
            });
        }
    }
}
