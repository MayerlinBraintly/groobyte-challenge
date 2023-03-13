<?php

namespace App\Repositories;

use App\Models\Subscription;
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
}