<?php

namespace App\Traits;

trait StatusCodeTrait
{

    public function initializeAppendAttributeTrait()
    {
        $this->append('status_code');
    }

    public function getStatusCodeAttribute()
    {
        $statusCode = [
            'active'    => 'success',
            'cancelled' => 'danger',
            'suspended' => 'danger',
            'review'    => 'info',
            'expired'   => 'warning',
            'draft'     => 'primary',
            'inactive'  => 'warning',
            'pending'   => 'warning',
            'completed' => 'success',
        ];
        return array_key_exists($this->status, $statusCode)
                ? $statusCode[$this->status]
                : 'dark';
    }

}
