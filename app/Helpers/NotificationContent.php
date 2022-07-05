<?php

namespace App\Helpers;

use App\Models\Table;

class NotificationContent
{

    public mixed $contents;

    public function __construct($opts)
    {
        $this->contents = require app_path(sprintf('NotificationContents/%s.php', $opts['lang']));
    }

    public function joinToTable($table){
//        return sprintf($this->contents['join_to_table'], $table->ownerUser->username, $table->name);
        return sprintf($this->contents['join_to_table'], 'FurqatMashrabjonov', 'Simple tabel');

    }

}
