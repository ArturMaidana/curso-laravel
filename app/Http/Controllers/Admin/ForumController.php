<?php

namespace App\Http\Controllers\Admin;

use App\Models\Forum;
use App\Http\Requests\StoreUpdateForum;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\DTO\Forum\CreateForumDTO;
use App\DTO\Forum\UpdateForumDTO;
use App\Services\ForumService;


class ForumController extends Controller

{

    public function __construct(
        protected ForumService $service)
    { }

    public function index(Request $request)
    {
        $forums = $this->service->paginate(
            page: $request->get('page', 1),
            totalPerPage: $request->get('per_page', 15),
            filter: $request->filter,
        );

        return view('admin/forums/index', compact('forums'));
    }

    public function show(string | int $id)
    {
        //Forum::find($find)
        //Forum::where('id, $id)->first();
        //Forum::where('id', '!=', $id)->first();
        if(!$forum = $this->service->findOne($id)){
            return redirect()->back();
        }

        return view('admin/forums/show', compact('forum'));
    }

    public function create()
    {

        return view('admin/forums/create');
    }

    public function store(StoreUpdateForum  $request, Forum $forum)
    {
        $this->service->new(
            CreateForumDTO::makeFromRequest($request)
        );

        return redirect()->route('forum.index');

    }

    public function edit(string $id)
    {
        if(!$forum = $this->service->findOne($id)){
            return back();
        }
        return view('admin/forums/edit', compact('forum'));
    }

    public function update(StoreUpdateForum $request, Forum $forum, string $id){


        $forum = $this->service->update(
            UpdateForumDTO::makeFromRequest($request)
        );

        if(!$forum){
            return back();
        }

        return redirect()->route('forum.index');

    }

    public function destroy(string $id)
    {
        $this->service->delete($id);

        return redirect()->route('forum.index');
    }
}
