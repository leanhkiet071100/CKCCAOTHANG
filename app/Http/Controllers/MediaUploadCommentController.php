<?php

namespace App\Http\Controllers;

use App\Models\media_upload_comment;
use App\Http\Requests\Storemedia_upload_commentRequest;
use App\Http\Requests\Updatemedia_upload_commentRequest;

class MediaUploadCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Storemedia_upload_commentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storemedia_upload_commentRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\media_upload_comment  $media_upload_comment
     * @return \Illuminate\Http\Response
     */
    public function show(media_upload_comment $media_upload_comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\media_upload_comment  $media_upload_comment
     * @return \Illuminate\Http\Response
     */
    public function edit(media_upload_comment $media_upload_comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updatemedia_upload_commentRequest  $request
     * @param  \App\Models\media_upload_comment  $media_upload_comment
     * @return \Illuminate\Http\Response
     */
    public function update(Updatemedia_upload_commentRequest $request, media_upload_comment $media_upload_comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\media_upload_comment  $media_upload_comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(media_upload_comment $media_upload_comment)
    {
        //
    }
}
