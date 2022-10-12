<?php

namespace App\Console\Commands;

use Log;
use Carbon\Carbon;
use App\Models\Product;
use Illuminate\Console\Command;

class DeleteProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete Product every hours';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $date = Carbon::now()->subDays(30);
        $products = Product::select('id','name')->where('created_at', '<', $date)->delete();
        \Log::info("Record Deleted");
    }
}
