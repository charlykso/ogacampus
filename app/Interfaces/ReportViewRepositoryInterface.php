<?php

namespace App\Interfaces;

interface ReportViewRepositoryInterface
{
    public function getAllReport();
    public function getItemReport();
    public function getServiceReport();
    public function getSchoolReport();
    public function getUserReport();
    public function getEventReport();
    public function getProfileCountByVerificationStatus();
}
