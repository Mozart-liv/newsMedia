<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ActionLog;
use Illuminate\Http\Request;
use Illuminate\Notifications\Action;

class ActionLogController extends Controller
{
    //
    public function index(Request $request){
        $data = [
            'user_id' => $request->userId,
            'post_id' => $request->postId
        ];
        ActionLog::create($data);

        $post = ActionLog::where('post_id', $request->postId)->get();

        return response()->json([
            'post' => $post
        ]);
    }
}
