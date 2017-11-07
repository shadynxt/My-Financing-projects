<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Idea;
use App\Notifications\ProjectEndSoon;
use App\Http\Controllers\API\NotificationsController;

class OneDaySoon extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project:oneDaySoon';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'project will expired after one day from now';

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
      $projects = Idea::where(\DB::raw("DATEDIFF(ideas_projects.expected_date,now())"),'<=',1)->get();
      foreach ($projects as $project) {
         $project->user->notify(new ProjectEndSoon($project));
         $token = $project->user->token->token;

         $title = '  عملينا العزيز  باقي يوم واحد علي انتهاء مشروعك';

         // push notification to mobile device token
         NotificationsController::sendNotification($token,$project->id,'end_soon',$title);
        }

       echo "tmaaaam \n";
    }
}
