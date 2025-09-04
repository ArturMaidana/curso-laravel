<?php

namespace App\Http\Controllers\Admin;

use App\Models\Forum;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForumController extends Controller
{
    public function index(Forum $forum)
    {
        $forums = $forum->all();

        return view('admin/forums/index', compact('forums'));
    }

    public function show(string | int $id)
    {
        //Forum::find($find)
        //Forum::where('id, $id)->first();
        //Forum::where('id', '!=', $id)->first();
        if(!$forum = Forum::find($id)){
            return redirect()->back();
        }

        return view('admin/forums/show', compact('forum'));
    }

    public function create()
    {

        return view('admin/forums/create');
    }

    public function store(Request $request, Forum $forum)
    {
        $data = $request->all();
        $data['status'] = 'a';

        $forum->create($data);

        return redirect()->route('forum.index');

    }

    public function edit(Forum $forum,  string|int $id)
    {
        if(!$forum = $forum->where('id', $id)->first()){
            return back();
        }
        return view('admin/forums/edit', compact('forum'));
    }

    public function update(Request $request, Forum $forum, string $id){

        if(!$forum = $forum->find($id)){
            return back();
        }

        // $forum->subject = $request->subject;
        // $forum->body = $request->body;
        // $forum->save();

        $forum->update($request->only([
            'subject', 'body'
        ]));

        return redirect()->route('forum.index');

    }

    public function destroy(string|int $id)
    {
        if(!$forum = Forum::find($id)){
            return back();
        }
        $forum->delete();

        return redirect()->route('forum.index');
    }
}
