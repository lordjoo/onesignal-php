<?php
/**
 * Created by PhpStorm.
 * User: youssef
 * Date: 4/9/19
 * Time: 5:25 PM
 */

namespace Youssef\OneSignal;


class OneSignal
{

    public $heading,$content,$logo,$image,$url,$appUrl,$webUrl,$buttons,$badge,$segment,$filters;

    protected  $apiKey;
    protected  $appId;
    protected  $fields;
    public function __construct($appId=null, $apiKey=null)
    {
        if ($apiKey)
            $this->apiKey = $apiKey;
        else
            $this->apiKey = config('onesignal.api_key');
        if ($appId)
            $this->appId = $appId;
        else
            $this->appId = config("onesignal.app_id");
    }

    protected function prepare()
    {
        $app_id = $this->appId;
        $heading = $this->heading;
        $content = $this->content;
        $fields = array(
            'app_id' => $app_id,
            'contents' => $content,
            'headings' => $heading
        );
//        if (!empty($extraParams)){
//            $fields["data"]=$extraParams;
//        }
        if (!empty($this->logo)):
            $fields['chrome_web_icon'] = $this->logo;
            $fields['firefox_icon'] = $this->logo;
        endif;
        if ($this->image != null)
            $fields['chrome_web_image'] = $this->image;
        if ($this->badge != null)
            $fields['chrome_web_badge'] = $this->badge;
        $this->fields = $fields;
    }

    protected  function exec(){
        $fields = json_encode($this->fields);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json; charset=utf-8',
            'Authorization: Basic ' . $this->apiKey
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);
        curl_close($ch);

        $return["allresponses"] = $response;
        return json_encode($return);
    }

    public function  sendToAll(){
        $this->prepare();
        $this->fields['included_segments'] = array("All");
        return $this->exec();
    }

    public  function  sendToSpecific($userId)
    {
        $this->prepare();
        if ($userId != null) {
            $this->fields['filters'] = array(
                array(
                    'field' => 'tag',
                    'key' => 'userId',
                    'relation' => '=',
                    'value' => $userId
                )
            );
            return $this->exec();
        }
    }
}