<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class FavoriteOnProject extends Notification
{
    use Queueable;
      protected $project;
      protected $userWhoAddFavorite;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($project,$userWhoAddFavorite)
    {
      $this->project = $project;
      $this->userWhoAddFavorite = $userWhoAddFavorite;
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
          'ownerName'=>$this->userWhoAddFavorite->first_name.' '.$this->userWhoAddFavorite->last_name,
          'ownerImg'=>$this->userWhoAddFavorite->profile_pic
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
