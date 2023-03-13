<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Repositories\SubscriptionRepositoryInterface;

class SubscriptionsReport extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscriptions:report {date}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generates a report on the number of new subscriptions for the day';

    private $subscriptionRepository;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(
        SubscriptionRepositoryInterface $subscriptionRepository
    )
    {
        parent::__construct();
        $this->subscriptionRepository = $subscriptionRepository;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $report = $this->subscriptionRepository->subscriptionsReport($this->argument('date'));

        $message = "Total new subscription in {$this->argument('date')} : {$report->new_subscription}". PHP_EOL;
        $message .= "Total canceled subscriptions in {$this->argument('date')} : {$report->canceled_subscriptions}". PHP_EOL;
        $message .= "Total active subscriptions in {$this->argument('date')} : {$report->total_active_subscriptions}";

        $this->info($message);
    }
}
