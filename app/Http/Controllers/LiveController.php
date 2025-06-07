<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LiveInfo;

class LiveController extends Controller
{
    // 全ライブ情報を取得
    public function index()
    {
        $lives = LiveInfo::all();
        return response()->json([
            'message' => 'Success',
            'data' => $lives
        ]);
    }

    // 新しいライブ情報を登録
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'location' => 'required|string',
            'date' => 'required|date',
            'start_time' => 'required',
            'description' => 'nullable|string',
        ]);

        $live = LiveInfo::create($validated);

        return response()->json($live, 201);
    }
}
