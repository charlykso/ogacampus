<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceView extends Migration
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
            return "CREATE VIEW view_total_service_report AS
                SELECT COUNT(*) as total_service,
                (SELECT COUNT(*) FROM services WHERE status='suspended') as service_pending_count,
                (SELECT COUNT(*) FROM services WHERE status='active') as service_active_count
                FROM services ";
    }


      /**
     * Reverse the migrations.
     *
     * @return void
     */
    private function dropView(): string
    {
        return '
            DROP VIEW IF EXISTS `view_total_service_report`;
             ';
    }
}
