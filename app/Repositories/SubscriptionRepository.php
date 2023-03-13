<?php

namespace App\Repositories;

use App\Models\Subscription;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class SubscriptionRepository implements SubscriptionRepositoryInterface
{
    protected $model;

    /**
     * SubscriptionRepository constructor.
     *
     * @param Subscription $subscription
     */
    public function __construct(Subscription $subscription)
    {
        $this->model = $subscription;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->model->where('id', $id)
            ->update($data);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function find($id)
    {
        if (null == $subscription = $this->model->find($id)) {
            throw new ModelNotFoundException("Subscription not found", 404);
        }

        return $subscription;
    }

    public function checkSubscriptionStatus($clientId)
    {
        $subscription = $this->model->where('customer_id', $clientId)->first();

        return $subscription ? $subscription->status : '';
    }

    public function cancel($customer)
    {
        $customer->status = Subscription::STATUS_CANCELLED;
        $customer->end_date = date('Y-m-d');
        $customer->save();

        return $customer;
    }

    public function subscriptionsReport($date)
    {
        $statusActive = Subscription::STATUS_ACTIVE;
        $statusCancelled = Subscription::STATUS_CANCELLED;

        $data = $this->model
                ->select(DB::raw("COUNT(CASE WHEN status = '{$statusActive}' AND start_date = '{$date}' THEN 1 END) AS new_subscription,
                                COUNT(CASE WHEN status = '{$statusCancelled}' AND end_date = '{$date}' THEN 1 END) AS canceled_subscriptions,
                                COUNT(CASE WHEN status = '{$statusActive}' THEN 1 END) AS total_active_subscriptions"))
                ->where('start_date', '<=', $date)
                ->orWhere(function(Builder $query) {
                    $query->where('end_date', '>', "2023-03-13")
                        ->whereNull('end_date');
                })
                ->first();
        
        return $data;
    }
}