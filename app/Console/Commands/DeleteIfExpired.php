<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DeleteIfExpired extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'delete projects that expected_date of them expired';

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
     * @return mixed
     */
    public function handle()
    {
       Idea::where(\DB::raw("DATEDIFF(ideas_projects.expected_date,now())"),'<',1)->delete();
       echo "tmaaaam \n";
    }
}
