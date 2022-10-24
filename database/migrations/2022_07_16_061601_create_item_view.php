<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemView extends Migration
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
            return "CREATE VIEW view_total_item_report AS
                SELECT COUNT(*) as total_item,
                (SELECT COUNT(*) FROM items WHERE status='draft') as items_pending_count,
                (SELECT COUNT(*) FROM items WHERE status='active') as items_active_count,
                (SELECT COUNT(*) FROM items WHERE status='expired') as items_expired_count,
                (SELECT COUNT(*) FROM items WHERE status='review') as items_review_count
                FROM items ";
    }

      /**
     * Reverse the migrations.
     *
     * @return void
     */
    private function dropView(): string
    {
        return '
            DROP VIEW IF EXISTS `view_total_item_report`;
             ';
    }
}
