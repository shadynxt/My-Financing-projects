<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Idea;
use App\Notifications\ProjectEndSoon;
use App\Http\Controllers\API\NotificationsController;


class DeleteProject extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project:twoDaySoon';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'delete project when his extends time  is out';

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
            $projects = Idea::where(\DB::raw("DATEDIFF(ideas_projects.expected_date,now())"),'<=',2)->get();
            foreach ($projects as $project) {
               $project->user->notify(new ProjectEndSoon($project));
               $token = $project->user->token->token;

               $title = '  عملينا العزيز  باقي يومين علي انتهاء فتره المشروع من فضلك';

               // push notification to mobile device token
               NotificationsController::sendNotification($token,$project->id,'end_soon',$title);
              }

             echo "tmaaaam \n";

    }
}
