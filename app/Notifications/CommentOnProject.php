<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CommentOnProject extends Notification
{
    use Queueable;
    public $comment;
    protected $project;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($comment)
    {
        //
        $this->comment = $comment;
        $this->project = $comment->project;
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


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
      return [
          'comment'=>$this->comment,
          'userThatNoty'=>$notifiable,
          'project'=>$this->project,
          'ownerName'=>$this->comment->user->first_name.' '.$this->comment->user->last_name,
          'ownerImg'=>$this->comment->user->profile_pic
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
