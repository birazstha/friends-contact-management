<?php

namespace App\Http\Controllers;

use App\Http\Requests\FriendStoreRequest;
use App\Http\Resources\FriendResource;
use App\Models\Friend;
use App\Models\User;
use Illuminate\Http\Request;

class FriendController extends Controller{

    public function index(Request $request)
    {
        // dd($request->all());
       $friend = Friend::orderBy('created_at', 'DESC')->get();
       if($request->search){
        $friend = Friend::where('name','LIKE','%'.$request->search.'%')->get();
        }
        // else{
        //     $friend = "No friend found";
        // }

        
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

    public function home(Friend $friend){
        $friend = Friend::count();
        return response()->json($friend);
    }
}
