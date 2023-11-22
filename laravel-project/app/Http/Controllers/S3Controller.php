<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class S3Controller extends Controller
{
    // S3へのファイルアップロード
    public function uploadS3(Request $request)
    {
        // バリデーション
        $request->validate(
            [
                'file' => 'required|file',
            ]
        );

        // S3へファイルをアップロード
        $filePath = $request->file('file')->store('/', 's3');

        // アップロードの成功判定
        if ($filePath) {
            // S3上のファイルのURLを取得
            $url = Storage::disk('s3')->url($filePath);

            // ビューにファイルのURLを渡して表示
            return view('s3.show', ['url' => $url]);
        } else {
            return 'アップロード失敗';
        }
    }
}
