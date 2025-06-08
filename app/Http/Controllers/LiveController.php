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

    // 指定したライブ情報を取得
    public function show($id)
    {
        $live = Live::findOrFail($id);
        return response()->json([
            'status' => 'success',
            'data' => $live
        ], 200);
    }

    // 指定したライブ情報を更新
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'location' => 'required|string',
            'date' => 'required|date',
            'start_time' => 'required',
            'description' => 'nullable|string',
        ]);
        
        $live = Live::findOrFail($id);
        $live->update($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Live updated',
            'data' => $live
        ]);
    }

    // 指定したライブ情報を削除
    public function destroy($id)
    {
        $live = Live::findOrFail($id);
        $live->delete();
        
        return response()->json([
            'status' => 'success',
            'message' => 'Live deleted'
        ]);
    }
}
