<?php

namespace App\Repositories;

use App\Interfaces\ReportViewRepositoryInterface;
use App\Models\EventReport;
use App\Models\SchoolReport;
use App\Models\ServiceReport;
use App\Models\UserTotalReport;
use App\Models\ItemReport;
use App\Models\Profile;

class ReportViewRepository implements ReportViewRepositoryInterface
{

    public function getAllReport()
    {
        $data['totalUser'] = UserTotalReport::first()->total_user;
        $data['activeUser'] = UserTotalReport::first()->user_active_count;
        $data['pendingUser'] = UserTotalReport::first()->user_pending_count;
        $data['deactivatedUser'] = UserTotalReport::first()->user_deactivated_count;
        $data['eventCount'] = EventReport::first()->total_event;
        $data['eventPending'] = EventReport::first()->event_pending_count;
        $data['eventActive'] = EventReport::first()->event_active_count;
        $data['itemCount'] = ItemReport::first()->total_item;
        $data['itemPending'] = ItemReport::first()->items_pending_count;
        $data['itemActive'] = ItemReport::first()->items_active_count;
        $data['itemExpired'] = ItemReport::first()->items_expired_count;
        $data['itemReview'] = ItemReport::first()->items_review_count;
        $data['schoolCount'] = SchoolReport::first()->total_school;
        $data['serviceCount'] = ServiceReport::first()->total_service;
        $data['servicePending'] = ServiceReport::first()->service_pending_count;
        $data['serviceActive'] = ServiceReport::first()->service_active_count;
        return $data;
    }

    public function getItemReport(){
      return ItemReport::first()->total_item;
    }

    public function getServiceReport(){
       return ServiceReport::first()->total_service;
    }

    public function getSchoolReport(){
       return SchoolReport::first()->total_school;
    }

    public function getUserReport(){
        return UserTotalReport::first()->total_user;
    }

    public function getEventReport(){
        return EventReport::first()->total_event;
    }

    public function getProfileCountByVerificationStatus(){
        return Profile::query()
                    ->select('is_verified as status', 'count(is_verified) as status_count')
                    ->groupBy('status')
                    ->get();
    }

}
