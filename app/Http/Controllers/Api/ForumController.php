<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ForumService;
use App\Http\Requests\StoreUpdateForum;
use App\DTO\Forum\CreateForumDTO;
use App\DTO\Forum\UpdateForumDTO;
use App\Http\Resources\ForumResource;
use Symfony\Component\HttpFoundation\Response;


class ForumController extends Controller
{
    //

    public function __construct(protected ForumService $forumService){
        $this->service = $forumService;
    }

    public function index(){

    }

    public function store( StoreUpdateForum $request){
       $forum = $this->service->new(
        CreateForumDTO::makeFromRequest($request)
    );

       return new ForumResource($forum);
    }

    public function show($id){
        if (!$forum = $this->service->findOne($id)) {
            return response()->json([
                'error'=> 'Not Found'
            ], Response::HTTP_NOT_FOUND);
        }

        return new ForumResource($forum);

    }

     public function update(StoreUpdateForum $request, string $id)
    {
        $forum = $this->service->update(
            UpdateForumDTO::makeFromRequest($request, $id)
        );

        if (!$forum) {
            return response()->json([
                'error' => 'Not Found'
            ], Response::HTTP_NOT_FOUND);
        }

        return new ForumResource($forum);
    }

    public function destroy(string $id){
        if (!$this->service->findOne($id)) {
            return response()->json([
                'error'=> 'Not Found'
            ], Response::HTTP_NOT_FOUND);
        }

        $this->service->delete($id);

        return response()->json([], Response::HTTP_NO_CONTENT);

    }

}

