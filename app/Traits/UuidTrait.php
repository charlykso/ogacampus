<?php

namespace App\Traits;

use Ramsey\Uuid\Uuid as UuidGenerator;

trait UuidTrait
{

    public function scopeUuid($query, $uuid)
    {
        return $query->where($this->getUuidName(), $uuid);
    }

    //get the name of the column
    public function getUuidName()
    {
        return property_exists($this, 'uuidName') ? $this->uuidName : 'uuid';
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getUuidName()} = UuidGenerator::uuid4()->toString();
        });
    }
}