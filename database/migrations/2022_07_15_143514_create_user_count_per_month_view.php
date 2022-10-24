<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCountPerMonthView extends Migration
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

        return 'CREATE VIEW view_user_monthly_report
        AS SELECT  year(created_at) AS year, date_format(created_at,"%M") AS month,count(id)  AS total
            from users
            group by year(created_at),date_format(created_at,"%M")
            order by year(created_at),date_format(created_at,"%M")';
    }


      /**
     * Reverse the migrations.
     *
     * @return void
     */
    private function dropView(): string
    {
        return '
            DROP VIEW IF EXISTS `view_user_monthly_report`;
             ';
    }
}
