<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCountBySchool extends Migration
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
     return "CREATE VIEW view_total_user_by_school_report AS
        SELECT school_id AS school,  COUNT(*) as total_user,
        (SELECT COUNT(*) FROM users WHERE email_verified_at IS NULL) as user_pending_count,
        (SELECT COUNT(*) FROM users WHERE email_verified_at IS NOT NULL) as user_active_count,
        (SELECT COUNT(*) FROM users WHERE deleted_at IS NOT NULL) as user_deactivated_count
        FROM users
        group by school_id
        order by school_id;";
    }


      /**
     * Reverse the migrations.
     *
     * @return void
     */
    private function dropView(): string
    {
        return '
            DROP VIEW IF EXISTS `view_total_user_by_school_report`
             ';
    }
}
