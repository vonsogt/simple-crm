<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewColumnsToEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->text('password')->nullable()->after('phone');
            $table->unsignedBigInteger('created_by_id')->after('password');
            $table->unsignedBigInteger('updated_by_id')->after('created_by_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropColumn('password');
            $table->dropColumn('created_by_id');
            $table->dropColumn('updated_by_id');
        });
    }
}
