<?php

namespace App\Http\Controllers;

use App\Http\Requests\FriendStoreRequest;
use App\Http\Resources\FriendResource;
use App\Models\Friend;
use Illuminate\Http\Request;

class FriendController extends Controller{

    public function index()
    {
       $friend = Friend::all();
       return FriendResource::collection($friend);

    }

    public function create()
    {
        //
    }

    public function store(FriendStoreRequest $request)
    {
        $friend= Friend::create($request->validated());
        return response()->json($friend);
    }

    public function show(Friend $friend)
    {
        return new FriendResource($friend);
    }


    public function edit(Friend $friend)
    {
        //
    }


    public function update(FriendStoreRequest $request, Friend $friend){
       $friend->update($request->validated());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Friend  $friend
     * @return \Illuminate\Http\Response
     */
    public function destroy(Friend $friend)
    {
        $friend->delete();
        return response()->json();
    }
}
