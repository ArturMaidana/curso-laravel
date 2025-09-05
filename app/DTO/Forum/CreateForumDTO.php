<?php

namespace App\DTO\Forum;

use App\Http\Requests\StoreUpdateForum;

class CreateForumDTO
{
    public function __construct(
        public string $subject,
        public string $status,
        public string $body,
    ){}

    public static function makeFromRequest(StoreUpdateForum $request): self{
        return new self(
            $request->subject,
            'a',
            $request->body
        );
    }
}
