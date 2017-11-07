<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ProjectEndSoon extends Notification
{
    use Queueable;
    protected $project;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($project)
    {
        //
           $this->project = $project;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }






    public function toDatabase($notifiable)
    {
      return [
          // 'ownerFavorite'=>$this->comment,
          'userThatNoty'=>$notifiable,
          'project'=>$this->project,
          'ownerName'=>'"أدعمني"',
          'ownerImg'=>"edamny_logo.png"
      ];
    }




    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
