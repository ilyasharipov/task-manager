<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Tags\Tag;

class TagController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = Tag::paginate();

        return view('tag.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tag = new Tag();

        return view('tag.create', compact('tag'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tag = new Tag();
        $this->validate($request, [
            'name' => ['required', 'string', 'max:15'],
        ]);

        $tag->setTranslation('name', 'en', $request->name);
        $tag->setTranslation('name', 'ru', $request->name);

        $tag->fill($request->all());
        $tag->save();

        flash(__('tags.created'))->success();
        return redirect()
            ->route('tags.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
//        dd($tag);
        $tag->delete();

        flash(__('tags.deleted'))->success();
        return redirect()
            ->route('tags.index');
    }
}
