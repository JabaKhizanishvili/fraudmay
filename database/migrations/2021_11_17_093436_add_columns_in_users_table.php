<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsInUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('manager_phone')->nullable()->after('is_send_email');
            $table->string('manager_email')->nullable()->after('is_send_email');
            $table->string('manager_name')->nullable()->after('is_send_email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('manager_phone');
            $table->dropColumn('manager_name');
            $table->dropColumn('manager_email');
        });
    }
}
