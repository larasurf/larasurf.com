<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\SlackAttachment;
use Illuminate\Notifications\Messages\SlackMessage;
use Illuminate\Notifications\Notification;

class CustomProjectSubmission extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @param \App\Models\CustomProjectSubmission $custom_project_submission
     */
    public function __construct(public \App\Models\CustomProjectSubmission $custom_project_submission)
    {
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['slack'];
    }

    /**
     * Get the Slack representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\SlackMessage
     */
    public function toSlack($notifiable)
    {
        $message = 'New Custom Project Inquiry! :tada:';

        if (!app()->isProduction()) {
            $message .= ' _(' . config('app.env') . ' environment)_';
        }

        return (new SlackMessage())
            ->content($message)
            ->attachment(function ($attachment) {
                /* @var SlackAttachment $attachment */
                $attachment
                    ->fields([
                        'Name' => $this->custom_project_submission->name,
                        'Email' => $this->custom_project_submission->email,
                        'Budget' => $this->custom_project_submission->budget,
                        'Deadline' => $this->custom_project_submission->deadline,
                        'Description' => $this->custom_project_submission->description,
                    ]);
            });
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return $this->custom_project_submission->toArray();
    }
}
