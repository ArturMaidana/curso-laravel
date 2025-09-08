<?php

namespace App\DTO\Forum;

use App\Http\Requests\StoreUpdateForum;
use App\Enums\ForumStatus;

class CreateForumDTO
{
    public function __construct(
        public string $subject,
        public ForumStatus $status,
        public string $body,
    ){}

    public static function makeFromRequest(StoreUpdateForum $request): self{
        return new self(
            $request->subject,
            ForumStatus::A,
            $request->body
        );
    }
}
