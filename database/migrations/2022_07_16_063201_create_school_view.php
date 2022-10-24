<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchoolView extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement($this->dropView());
        \DB::statement($this->createView());
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        \DB::statement($this->dropView());
    }



     /**
     * Reverse the migrations.
     *
     * @return void
     */
    private function createView(): string
    {
        return 'CREATE VIEW view_total_school_report AS
                SELECT
                COUNT(*)
                 AS total_school
                FROM schools
                ';
    }


      /**
     * Reverse the migrations.
     *
     * @return void
     */
    private function dropView(): string
    {
        return '
            DROP VIEW IF EXISTS `view_total_school_report`
             ';
    }
}
