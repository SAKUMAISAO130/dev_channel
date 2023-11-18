<?php

namespace App\Http\Controllers;

use App\Models\CommentLike;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentLikeController extends Controller
{
    public function like (Request $request, $id)
    {
        $ip_info = $this->getClientIpAddress();

        //DBにあるか（２回目のいいねか）
        $result = CommentLike::where([
            'comment_id' => $id,
            'ip_address' => $ip_info,
            ])->get()->count();        

        //DBになければ１回目（登録する
        if (!$result) {
            //登録
            CommentLike::create([
                'comment_id' => $id,
                'ip_address' => isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '',
                'ip_address_x_forwarded' => isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : '',
                'status' => 2, // 2:like 1unlike
            ]);
            return 'いいね成功';
        }else{
            //DBにあれば二回目（登録しない
            return 'いいね失敗';
        }
    }

    public function likeCount (Request $request, $id)
    {
        return CommentLike::where('comment_id', $id)->where('status', 2)->get()->count();        
    }

    public function unlike (Request $request, $id)
    {
        $ip_info = $this->getClientIpAddress();

        //DBにあるか（２回目のいいねか）
        $result = CommentLike::where([
            'comment_id' => $id,
            'ip_address' => $ip_info,
            ])->get()->count();        

        //DBになければ１回目（登録する
        if (!$result) {
            //登録
            CommentLike::create([
                'comment_id' => $id,
                'ip_address' => isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '',
                'ip_address_x_forwarded' => isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : '',
                'status' => 1, // 2:like 1unlike
            ]);
            return 'いいね成功';
        }else{
            //DBにあれば二回目（登録しない
            return 'いいね失敗';
        }
    }

    public function unlikeCount (Request $request, $id)
    {
        return CommentLike::where('comment_id', $id)->where('status', 1)->get()->count();        
    }

    private function getClientIpAddress() {
        if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER)) {
            $xForwardedFor = explode(",", $_SERVER['HTTP_X_FORWARDED_FOR']);
            if (!empty($xForwardedFor)) {
                return trim($xForwardedFor[0]);
            }
        }
        if (isset($_SERVER['REMOTE_ADDR'])) {
            return (string)$_SERVER['REMOTE_ADDR'];
        }
    }


}
