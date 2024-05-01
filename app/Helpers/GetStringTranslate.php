<?php

namespace App\Helpers;
use \Statickidz\GoogleTranslate;

class GetStringTranslate
{
    /**
     * Generate and return a custom string.
     *
     * @return string
     */
    public static function getStringTranslate($source, $target, $text)
    {
        // try {
            $trans = new GoogleTranslate();
            $result = $trans->translate($source, $target, $text);
            if(!empty($result) || $result !=null){
                $res = $result;
            }else{
                $res = $text;
            }
            return $res;
        // } catch (\Throwable $th) {
        //     return $text;
        // }
    }
}