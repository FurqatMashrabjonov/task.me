<?php

namespace App\Helpers;

use App\Enums\NotificationType;
use App\Models\Table;
use Illuminate\Support\Facades\Blade;

class NotificationContent
{

    public mixed $contents;

    public function __construct($opts)
    {
        $this->contents = require app_path(sprintf('NotificationContents/%s.php', $opts['lang']));
    }

    public function joinToTable($table): string
    {
        return sprintf($this->contents['join_to_table'], $table->user->username, $table->name);
    }

    public function renderHTML($notification): string
    {
        $html = '';

        if ($notification->type == NotificationType::JOIN_TO_TYPE) {
            $html = view('notification_render_contents.join_to_table', compact('notification'))->render();
        }
        return $html;
    }

}
