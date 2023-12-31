<?php

namespace App\Http\Controllers;

use App\Models\ActionLog;
use Illuminate\Http\Request;
use Illuminate\Notifications\Action;
use Illuminate\Support\Facades\DB;

class TrendPostController extends Controller
{
    //direct trend post page
    public function index(){
        $post = ActionLog::select('action_logs.*', 'posts.*', DB::raw('COUNT(action_logs.post_id) as view'))
                            ->leftJoin('posts', 'posts.id', 'action_logs.post_id')
                            ->groupBy('action_logs.post_id')
                            ->get();
                    
        return view('admin.trend post.index', compact('post'));
    }
}
