<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Liquetsoft\CbrfService\Laravel\CbrfDailyWrapper;

class TestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:test';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    public function __construct(private readonly CbrfDailyWrapper $wrapper)
    {
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        dump($this->wrapper);
    }
}
