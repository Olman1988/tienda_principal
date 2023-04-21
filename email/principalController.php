<?php

class principalController{
    public function sendEmailForQuote($ARR){
        $Result = Array();
        $FILE = "../email/cotizacionNotification.html";
        $Template = '';
        if($file = fopen($FILE,"r")){
            while (!feof($file)){
                $Template .= fgets($file);
            }
            fclose($file);
        }
        $Template;
            $Template = preg_replace("/%\bPRINCIPALTITLE\b%/", $ARR['title'], $Template);
             $Template = preg_replace("/%\bINTRO\b%/", $ARR['intro'], $Template);
            $Template = preg_replace("/%\bMAININFO\b%/", $ARR['info'], $Template);
            $Template = preg_replace("/%\bURLIMG\b%/", $ARR['url'], $Template);
            $Template = preg_replace("/%\bTABLEDATA\b%/", $ARR['table'], $Template);
            $Template = preg_replace("/%\bPRICEDATA\b%/", $ARR['priceData'], $Template);
            return $Template;
    }
    
}

