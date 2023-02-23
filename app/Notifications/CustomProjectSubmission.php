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
        $message = 'New Custom Project Lead! :tada:';

        if (!app()->isProduction()) {
            $message .= ' _(' . config('app.env') . ' environment)_';
        }

        $budget = match ($this->custom_project_submission->budget) {
            'less-than-5000' => 'Less Than $5,000',
            '5000-10000' => '$5,000 to $10,000',
            '10000-25000' => '$10,000 to $25,000',
            '25000-50000' => '$25,000 to $50,000',
            '50000-100000' => '$50,000 to $100,000',
            'more-than-100000' => 'More than $100,000',
            default => $this->custom_project_submission->budget,
        };

        return (new SlackMessage())
            ->content($message)
            ->attachment(function ($attachment) use ($budget) {
                /* @var SlackAttachment $attachment */
                $attachment
                    ->fields([
                        'Name' => $this->custom_project_submission->name,
                        'Email' => $this->custom_project_submission->email,
                        'Budget' => $budget,
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
