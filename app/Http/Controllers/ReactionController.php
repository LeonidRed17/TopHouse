<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsReaction;
use App\Models\CommentReaction;
use Illuminate\Support\Facades\DB;

class ReactionController extends Controller
{
    public function storeNewsReaction(Request $request)
    {
        $request->validate([
            'news_id' => 'required|integer',
            'reaction_id' => 'required|integer',
        ]);

        NewsReaction::updateOrCreate(
            ['news_id' => $request->news_id, 'reaction_id' => $request->reaction_id],
            ['count' => DB::raw('count + 1')]
        );

        return response()->json(['message' => 'Reaction added'], 201);
    }

    public function deleteNewsReaction(Request $request)
    {
        $request->validate([
            'news_id' => 'required|integer',
            'reaction_id' => 'required|integer',
        ]);

        $reaction = NewsReaction::where('news_id', $request->news_id)
                                ->where('reaction_id', $request->reaction_id)
                                ->first();

        if ($reaction) {
            if ($reaction->count > 1) {
                $reaction->decrement('count');
            } else {
                $reaction->delete();
            }
        }

        return response()->json(['message' => 'Reaction removed']);
    }

    public function storeCommentReaction(Request $request)
    {
        $request->validate([
            'comment_id' => 'required|integer',
            'reaction_id' => 'required|integer',
        ]);

        CommentReaction::updateOrCreate(
            ['comment_id' => $request->comment_id, 'reaction_id' => $request->reaction_id],
            ['count' => DB::raw('count + 1')]
        );

        return response()->json(['message' => 'Reaction added'], 201);
    }

    public function deleteCommentReaction(Request $request)
    {
        $request->validate([
            'comment_id' => 'required|integer',
            'reaction_id' => 'required|integer',
        ]);

        $reaction = CommentReaction::where('comment_id', $request->comment_id)
                                   ->where('reaction_id', $request->reaction_id)
                                   ->first();

        if ($reaction) {
            if ($reaction->count > 1) {
                $reaction->decrement('count');
            } else {
                $reaction->delete();
            }
        }

        return response()->json(['message' => 'Reaction removed']);
    }
}
