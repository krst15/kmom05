<?php

namespace smuffe\CFlashMessage

/**
*
* Class that displays different type of messages with 4 different styles
*
*/

class CFlashMessage
{
   public function __construct(){
       if(!isset($_SESSION['flash'])){
           $_SESSION['flash'] = array();
       }
   }

   public function deleteMessages(){
       $_SESSION['flash'] = null;
   }

   public function addMessage($message, $type){
       $msg = array('content' => $message, 'type' => $type);
       $_SESSION['flash'][] = $msg;
   }

   public function addError ($message){
       $this->addMessage('error', $message);
   }

   public function addSuccess($message){
       $this->addMessage('success', message);
   }

   public function addInfo($message){
       $this->message('info', $message);
   }

   public function addWarning($message){
       $this ->message('warning', $message);
   }

   public function getFlashMessages(){

       $messages = $_SESSION['flash'];

       $html = null;

       if($messages) {
           foreach ($messages as $key => $message) {
               $html .= "<div id='flashMessage' class='" . $message['type'] . "'>" . $message['message'] . "</div>";
           }
       } else {
           $html = null;
       }
       return $html;
   }
} 
