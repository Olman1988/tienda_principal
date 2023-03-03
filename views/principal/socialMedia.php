<?php

class socialMedia{
   public function evaluarInfo($infoProfile,$tipo){
       
       if(empty($infoProfile)){
           return " ";
       }else {
           switch ($tipo) {
               case "whatsApp":
                   return "<a class='mp-btn' href='https://api.whatsapp.com/send?text=Deseo%20recibir%20mas%20informacion&phone=506$infoProfile'><i class='fa-brands fa-whatsapp'></i></a>";

                   break;
               case "facebook":
                   return "<a class='mp-btn' href='$infoProfile'><i class='fa-brands fa-facebook-f'></i></a>";

                   break;
               case "instagram":
                        return "<a class='mp-btn' href='$infoProfile'><i class='fa-brands fa-instagram'></i></a>";

                   break;
               case "twitter":
                   return "<a class='mp-btn' href='$infoProfile'><i class='fa-brands fa-twitter'></i></a>";

                   break;
               case "pinterest":
                   return "<a class='mp-btn' href='$infoProfile'><i class='fa-brands fa-pinterest-p'></i></a>";

                   break;
               
              case "linkedin":
                  return "<a class='mp-btn' href='$infoProfile'><i class='fa-brands fa-linkedin-in'></i></a>";

                   break;
               case "youtube":
                   return "<a class='mp-btn' href='$infoProfile'><i class='fa-brands fa-youtube'></i></a>";

                   break;
               

               default:
                   break;
           }
       }
       
   }
    
}

