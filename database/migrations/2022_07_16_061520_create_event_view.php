<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventView extends Migration
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

        return "CREATE VIEW view_total_event_report AS
            SELECT COUNT(*) as total_event,
            (SELECT COUNT(*) FROM events WHERE status = 'suspended') as event_pending_count,
            (SELECT COUNT(*) FROM events WHERE status='active') as event_active_count
            FROM events ";
    }


      /**
     * Reverse the migrations.
     *
     * @return void
     */
    private function dropView(): string
    {
        return '
            DROP VIEW IF EXISTS `view_total_event_report`;
             ';
    }
}
