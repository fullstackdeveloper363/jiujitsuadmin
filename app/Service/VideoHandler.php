<?php

namespace App\Service;

class VideoHandler {
    public function getVideoInfo( $video_url ) {

        $oembed = 'https://www.youtube.com/oembed';

        if (preg_match( '|^http(s)?://(.*?)vimeo.com|', $video_url )) {
            $oembed = 'https://vimeo.com/api/oembed.json';
        }

        $oembed .= '?format=json&url=' . urlencode( $video_url );

        $json_string = @file_get_contents( $oembed );

        /**
         * @var null|\stdClass
         */
        $obj = json_decode( $json_string );

        if ($obj == null || !$obj) {
            return false;
        }
        return $obj;
    }
}
