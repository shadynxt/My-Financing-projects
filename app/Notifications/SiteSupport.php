<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class SiteSupport extends Notification
{
    use Queueable;
    public $support;
    public $project;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($support)
    {
        $this->support =$support;
        $this->project =$support->project;
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
    public function toArray($notifiable)
    {
        return [
            'support'       => $this->support,
            'project'        => $this->project,
            'userThatNotify' => $notifiable,
            'ownerName'      =>$this->support->full_name,
        ];
    }
}
