<?php

namespace App\Http\Controllers;

use App\Models\CommentDetail;
use Illuminate\Http\Request;
use App\Http\Requests\User\CommentStoreRequest;


class UserViewController extends Controller
{
    public function commentStore(CommentStoreRequest $request)
    {
        $request->validated();

        $data = [
            'user_id' => $request->user_id,
            'project_detail_id' => $request->project_detail_id,
            'body' => $request->body,
        ];

        $newComment = CommentDetail::create($data);

        return response()->json(['success' => true, 'data' => $newComment]);
    }

    // public function commentStore(CommentStoreRequest $request)
    // {
    //     // $request['user_id'] = 1;/
    //     $request->validated();
    //     $data = [
    //         'user_id' => $request->user_id,
    //         'project_detail_id' => $request->project_detail_id,
    //         'body' => $request->body,
    //     ];

    //     // dd($data);

    //     if (CommentDetail::create($data)) {
    //         return 'ok';
    //     }
    //     return 'okpppp';
    // }


    public function commentDelete($id)
    {
        $data = CommentDetail::find($id);

        if (!$data) {
            return response()->json(['error' => 'Data not found.'], 404);
        }

        $data->delete();

        return response()->json(['success' => 'Comment deleted successfully.']);
    }

}
