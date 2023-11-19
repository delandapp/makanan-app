<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Console\Command;

class ClearDataOtp extends Command
{
    protected $signature = 'clear:dataotp';
    protected $description = 'Clear specific data from the database';
    public function handle()
    {
        $currentDate = Carbon::now()->setTimezone('Asia/Jakarta');
        User::where('expired_otp', '<=', $currentDate)->delete();
        $this->info('Expired data has been cleared successfully.');
    }
}
