<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class FollowOnProject extends Notification
{
    use Queueable;
    protected $project;
    protected $userWhoFollow;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
     public function __construct($project,$userWhoFollow)
     {
       $this->project = $project;
       $this->userWhoFollow = $userWhoFollow;
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
          'ownerName'=>$this->userWhoFollow->first_name.' '.$this->userWhoFollow->last_name,
          'ownerImg'=>$this->userWhoFollow->profile_pic
      ];
    }



    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
