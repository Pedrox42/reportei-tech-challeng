<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContentBoxRequest;
use App\Http\Requests\UpdateContentBoxRequest;
use App\Models\ContentBox;
use App\Models\File;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class ContentBoxController extends Controller
{
    public function index()
    {
        $contentBoxes = ContentBox::all();
        return view('content-box.index', compact('contentBoxes'));
    }

    public function create()
    {
        return view('content-box.create');
    }

    public function store(StoreContentBoxRequest $request)
    {
        $data = $request->validated();
        $contentBox = new ContentBox();
        $contentBox->title = $data['title'];
        $contentBox->owner_id = Auth::user()->id;
        $contentBox->save();
        foreach ($data['files'] as $dataFile){
            $file = new File();
            $storedFile = $dataFile->store(Config::get('uploaded-files.directory'));
            $file->name = pathinfo($storedFile)['basename'];
            $file->content_box_id = $contentBox->id;
            $file->save();
            unset($file, $storedFile);
        }
        return redirect(route('content-box.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ContentBox  $contentBox
     * @return \Illuminate\Http\Response
     */
    public function show(ContentBox $contentBox)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ContentBox  $contentBox
     * @return \Illuminate\Http\Response
     */
    public function edit(ContentBox $contentBox)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateContentBoxRequest  $request
     * @param  \App\Models\ContentBox  $contentBox
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateContentBoxRequest $request, ContentBox $contentBox)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContentBox  $contentBox
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContentBox $contentBox)
    {
        //
    }
}
