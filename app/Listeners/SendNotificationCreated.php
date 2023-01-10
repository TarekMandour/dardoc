<?php

namespace App\Listeners;

use App\Events\NotificationCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendNotificationCreated
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    function send($tokens, $title = "رسالة جديدة", $msg = "رسالة جديدة فى البريد", $type = 'mail', $chat = null)
    {
        $key = 'AAAA-IU6etw:APA91bHUeI5Yu7Qcx5tJpC1IBIxowbiwX5WzIPyDr0pgSq714F-EqnA260Pi2PIJzkrVa6XhVIt8eJnZkV0kvpmwgnHXEaIj6J2ILU0cPvdmPolHcaJbY1mH-Uk7VTzHS-_hznEN8cvT';

        $fields = array
        (
            "registration_ids" => (array)$tokens,  //array of user token whom notification sent to
            "priority" => 10,
            'data' => [
                'title' => $title,
                'body' => strip_tags($msg),
                'id' => $chat,
                'type' => $type,
                'icon' => 'myIcon',
                'sound' => 'mySound',
            ],
            'notification' => [
                'title' => $title,
                'body' => strip_tags($msg),
                'id' => $chat,
                'type' => $type,
                'icon' => 'myIcon',
                'sound' => 'mySound',
            ],
            'vibrate' => 1,
            'sound' => 1
        );

        $headers = array
        (
            'accept: application/json',
            'Content-Type: application/json',
            'Authorization: key=' . $key
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);


        if ($result === FALSE) {
            die('Curl failed: ' . curl_error($ch));
        }

        curl_close($ch);
        return $result;
    }


    /**
     * Handle the event.
     *
     * @param object $event
     * @return void
     */
    public function handle(NotificationCreated $event)
    {
        $notification = $event->notification;
        $receiver = $notification->Client;

        $this->send($receiver->token, $notification->title, $notification->body);

    }
}
