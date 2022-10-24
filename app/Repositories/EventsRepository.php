<?php

namespace App\Repositories;

use App\Interfaces\EventsRepositoryInterface;
use App\Models\Event;

class EventsRepository implements EventsRepositoryInterface
{
    public function getAll()
    {
        return Event::paginate(15);
    }

    public function getById(int $eventId)
    {
        return Event::findOrFail($eventId);
    }

    public function getByUuid(string $eventUuid)
    {
        return Event::where('uuid', $eventUuid)->first();
    }

    public function getByStatus(string $status)
    {
        return Event::where('status', $status)->paginate(15);
    }

    public function getAllActive($category = null, $price = null)
    {
        $query = Event::query();

        $query->when($category, function ($q) use ($category) {
            return $q->where('category_id', $category);
        });
        // $query->when($price, function ($q) {
        //     return $q->orderBy('created_at', request('ordering_rule', 'desc'));
        // });

        return $query->active()->paginate(15);
        // return Event::active()->paginate(15);
    }

    public function getRandom($number = 2)
    {
        return Event::active()->take($number)->get()->shuffle();
    }

    public function getExpiredEvent()
    {
        $date = date('Y-m-d H:i:s');

        return Event::where('event_date', '<', $date)->paginate(15);
    }

    public function delete(int $eventId)
    {
        Event::destroy($eventId);
    }

    public function createOrUpdate(array $data, int $eventId = null)
    {
        if ($eventId) {
            $event = Event::find($eventId);
            $event->update($data);

            return $event;
        }

        return Event::create($data);
    }

    public function updateEventUuid($eventUuid, array $newDetails)
    {
        return Event::where('uuid', $eventUuid)->update($newDetails);
    }

    public function getUserEvent(int $userId)
    {
        return Event::where('user_id', $userId)->paginate(15);
    }

    public function getSchoolEvent(int $schoolId)
    {
        return Event::where('school_id', $schoolId)->paginate(15);
    }

    public function getPaidEvents()
    {
        return Event::with('orders')->whereHas('orders', function ($query) {
            $query->where('status', 'completed');
        })->paginate(20);
    }
}
