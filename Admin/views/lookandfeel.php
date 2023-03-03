<?php
class lookandfeel{

public function get_google_fonts($amount = 30) {

    //File to cache the fonts list
    $fontFile = 'google-web-fonts.txt';
    //Replace by your public API Key
    $APIKey = 'AIzaSyCBXXroSxdSAux2GuVd23pZcmBM7Atde6g';
    //Total time the file will be cached in seconds, set to a 30 days (86400 seonds is a day)
    $cachetime = 1;

    if( file_exists($fontFile) && time() - $cachetime < filemtime($fontFile) ) {
        $content = json_decode(file_get_contents($fontFile));
    } else {
        $googlefontsurl = 'https://www.googleapis.com/webfonts/v1/webfonts?sort=alpha&key='.urlencode($APIKey);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_URL, $googlefontsurl);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);

        $fontContent = curl_exec($ch);

        curl_close($ch);

        $fp = fopen($fontFile, 'w');
        fwrite($fp, $fontContent); 
        fclose($fp);
 
        $content = json_decode($fontContent);

    }

    if( $amount == "all" ) {
        return $content->items;
    } else {
        return array_slice($content->items, 0, $amount);
    }

}

}