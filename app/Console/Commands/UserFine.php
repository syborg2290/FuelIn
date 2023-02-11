<?php

namespace App\Console\Commands;
use domain\Facades\UserFacade;
use Illuminate\Console\Command;

class UserFine extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'check:fine';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check user fines expire date and send email';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return UserFacade::checkUserFine();
    }
}
