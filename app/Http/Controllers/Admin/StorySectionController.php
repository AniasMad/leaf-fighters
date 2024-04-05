<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreStorySectionRequest;
use App\Http\Requests\UpdateStorySectionRequest;
use App\Models\StorySection;
use App\Http\Controllers\Controller;
use Auth;

class StorySectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStorySectionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(StorySection $storySection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StorySection $storySection)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStorySectionRequest $request, StorySection $storySection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StorySection $storySection)
    {
        //
    }
}
