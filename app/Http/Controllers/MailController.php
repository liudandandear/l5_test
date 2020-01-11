<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function send()
    {
        try {
            //纯文本邮件
//            $info = Mail::raw('你好，我是PHP程序！', function ($message) {
//                $to = '1064265199@qq.com';
//                $message->to($to)->subject('纯文本信息邮件测试');
//            });
            $name = '我发的第一份邮件';
            // Mail::send()的返回值为空，所以可以其他方法进行判断
            $info = Mail::send('emails.test', ['name' => $name], function ($message) {
                $to = '1064265199@qq.com';
                $message->to($to)->subject('邮件测试');
            });
            dd($info);
        } catch (\Exception $exception) {
            // 返回的一个错误数组，利用此可以判断是否发送成功
            dd($exception);
        }
    }
}
