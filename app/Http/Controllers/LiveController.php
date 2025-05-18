<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LiveInfo;

class LiveController extends Controller
{
    // 全ライブ情報を取得
    public function index()
    {
        return response()->json(LiveInfo::all());
    }

    // 新しいライブ情報を登録
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'description' => 'nullable|string',
        ]);

        $live = LiveInfo::create($validated);

        return response()->json($live, 201);
    }
}
