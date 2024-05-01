<?php

namespace App\Service;

class Notification
{
    public static function send_notification($fcmToken, $data, $notification = ['title' => '', 'body' => ''])
    {
        try {
            $send_notification = \Http::acceptJson()->withToken(config('app.FIREBASE_CREDENTIALS'))->post(
                'https://fcm.googleapis.com/fcm/send',
                [
                    'to' => $fcmToken,
                    'notification' => $notification,
                    'data' => $data
                ]
            );
    
            return $send_notification;
        } catch (\Throwable $th) {
            return false;
        }
    }

}