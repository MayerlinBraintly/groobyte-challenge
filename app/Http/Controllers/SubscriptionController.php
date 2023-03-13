<?php

namespace App\Http\Controllers;

use App\Http\Requests\Subscription as SubscriptionRequest;
use App\Models\Subscription;

use App\Repositories\CustomerRepositoryInterface;
use App\Repositories\SubscriptionRepositoryInterface;

class SubscriptionController extends Controller
{
    /** @var SubscriptionRepositoryInterface */
    private $subscriptionRepository;
    private $customerRepository;

    public function __construct(
        SubscriptionRepositoryInterface $subscriptionRepository,
        CustomerRepositoryInterface $customerRepositrory
    )
    {
        $this->subscriptionRepository = $subscriptionRepository;
        $this->customerRepository = $customerRepositrory;
    }

    public function create(SubscriptionRequest $request)
    {
        try {
            $data = $request->all();
            $client = $data['customer_id'];
    
            $this->customerRepository->find($client);

            $subscriptionStatus = $this->subscriptionRepository->checkSubscriptionStatus($client);

            if (!$subscriptionStatus || $subscriptionStatus == Subscription::STATUS_CANCELLED) {
                $subscription = $this->subscriptionRepository->create($data);
                return response()->json(['data' => $subscription, 'status' => 201]);
            }

            return response()->json(['error' => 'The customer already has an active subscription', 'status' => 400]);
    
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'status' => $th->getCode()]);
        }
        
    }

    public function cancel($id)
    {
        try {
            $customer = $this->subscriptionRepository->find($id);

            $response = $this->subscriptionRepository->cancel($customer);

            return response()->json(['data' => $response, 'status' => 201]);
    
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage(), 'status' => $th->getCode()]);
        }
        
    }
}