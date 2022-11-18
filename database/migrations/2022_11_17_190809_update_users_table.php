<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        schema::table('users',function(Blueprint $table){
            $table->text('contact_details');
            $table->string('job_title');
            $table->enum('type',['hr_manager','employee']);
            $table->boolean('status')->default(1);
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        schema::table('users',function(Blueprint $table){
            $table->dropColumn('contact_details');
            $table->dropColumn('job_title');
            $table->dropColumn('type');
            $table->dropColumn('status');
            $table->dropColumn('deleted_at');
        });
    }
};
