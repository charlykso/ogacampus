<?php
namespace App\Repositories;

use App\Interfaces\OrderRepositoryInterface;
use App\Models\Order;

class OrderRepository implements OrderRepositoryInterface {

    public function getAll(string $status = null) {
        return is_null($status) ? Order::orderBy('created_at', 'desc')->paginate(20)
                : Order::orderBy('created_at', 'desc')
                    ->where('status', $status)
                    ->paginate(20);
    }

    public function create(array $data){
        return Order::create($data);
    }

    public function update(int $id, array $data){
        $order = Order::findOrFail($id);
        $order->update($data);
        return $order;
    }

    public function getByEvent(int $eventID, string $status = 'completed'){
       return Order::where(['event_id' => $eventID, 'status' => $status])->paginate();
    }

    public function getByReference(string $reference){
        return Order::where('reference', $reference)->first();
    }

    public function getById(int $id)
    {
        return Order::findOrFail($id);
    }

    public function getByUser(int $userID, string $status = 'completed'){
        return Order::where(['user_id', $userID, 'status' => $status])->paginate();
    }
    public function getBySchool(int $schoolID, string $status = 'completed'){
        return Order::with('event')->where('status', $status)
                ->whereHas('event', function($query) use ($schoolID) {
                     $query->where('school_id', $schoolID);
                 })->paginate();
    }
}
