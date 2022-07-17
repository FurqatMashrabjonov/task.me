<?php

namespace App\Jobs;

use App\Enums\NotificationStatus;
use App\Enums\NotificationType;
use App\Models\Notification;
use App\Models\NotificationSetting;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class JoinToTableNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $user_id;
    public $table_id;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($user_id, $table_id)
    {
        $this->user_id = $user_id;
        $this->table_id = $table_id;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $notification = Notification::query()->create([
            'user_id' => $this->user_id,
            'type' => NotificationType::JOIN_TO_TYPE,
            'status' => NotificationStatus::NOTVIEWED
        ]);
        NotificationSetting::query()->create([
            'notification_id' => $notification->id,
            'table_id' => $this->table_id
        ]);
        //Keyin notification qowiladi
    }
}
