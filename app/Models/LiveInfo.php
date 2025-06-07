<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LiveInfo extends Model
{
    use HasFactory;

    // テーブル名（Laravelの命名規則に従うなら省略可）
    protected $table = 'live_infos';

    // 更新可能なカラムの指定（ホワイトリスト）
    protected $fillable = [
        'title',
        'location',
        'date',
        'start_time',
        'description',
    ];

}
