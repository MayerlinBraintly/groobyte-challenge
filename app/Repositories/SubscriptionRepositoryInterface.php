<?php

namespace App\Repositories;

interface SubscriptionRepositoryInterface extends RepositoryInterface
{
    public function checkSubscriptionStatus($id);

    public function cancel($data);

    public function subscriptionsReport($date);
}