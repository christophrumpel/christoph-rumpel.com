<?php

namespace App\Console\Commands;

use App\Post\PostCollector;
use Illuminate\Console\Command;

class CachePostsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'posts:cache';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Load post files to models in cache';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        PostCollector::all();

        return 0;
    }
}
