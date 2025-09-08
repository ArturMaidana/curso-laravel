<?php

use App\Enums\ForumStatus;

if(!function_exists('getStatusForum')){
    function getStatusForum(string $status): string{
        return ForumStatus::fromValue($status);
    }
}
