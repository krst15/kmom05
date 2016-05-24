<?php

namespace Anax\FlashMessage;


   class CFlashMessage
   {

       function __construct()
       {

           if(!isset($_SESSION['flashmessages'])) {
           $_SESSION['flashmessages'] = array();
       }
       }

   public function clear()
       {
           $_SESSION['flashmessages'] = null;
       }


   public function addMessage($content, $type)

   {
       $message = array('content' => $content, 'type' => $type);
       $_SESSION['flashmessages'][] = $message;
   }


   public function getFlashMessages(){
       $messages = $_SESSION['flashmessages'];
       $html = null;
       if($messages) {
           foreach ($messages as $key => $message) {
               $html .= "<div class='" . $message['type'] . "'><p>" . $message['content'] . "</p></div>";
           }
       } else {
           $html = null;
       }
       return $html;

   }

}
