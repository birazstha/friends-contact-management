<?php

namespace App\Http\Controllers;

use App\Http\Requests\FriendStoreRequest;
use App\Http\Resources\FriendResource;
use App\Models\Friend;
use App\Models\User;
use Faker\Provider\Image;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class FriendController extends Controller{

    public function index(Request $request){
       $friend = Friend::orderBy('created_at', 'DESC')->get();
       if($request->search){
        $friend = Friend::where('name','LIKE','%'.$request->search.'%')->get();
        }
       return FriendResource::collection($friend);

    }

    public function store(Request $request)
    {


        // $file=$request->file('profile_name');

        // $fileName = time().'.'.$file->getClientOriginalName();
        // $file->move(public_path('uploads'),$fileName);
       

        $file = base64_encode(file_get_contents($request->file('profile_name')->path()));
        $request->request->add(['profile_picture'=>$file]);


        $friend= Friend::create($request->all());
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
