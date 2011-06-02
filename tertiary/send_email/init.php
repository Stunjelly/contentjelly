<?php
/**
 * mail.php
 *
 * A (very) simple mailer class written in PHP.
 *
 * @author Zachary Fox
 * @version 1.0
 */

class send_email{
    var $to = null;
    var $from = null;
    var $subject = null;
    var $body = null;
    var $headers = null;

     function ZFmail($to,$from,$subject,$body){
        $this->to      = $to;
        $this->from    = $from;
        $this->subject = $subject;
        $this->body    = $body;
    }

    function send(){

      $this->addHeader('From: '.$this->from."\r\n");
        $this->addHeader('Reply-To: '.$this->from."\r\n");
        $this->addHeader('Return-Path: '.$this->from."\r\n");
        $this->addHeader('X-mailer: ZFmail 1.0'."\r\n");
        
       //local testing only, uncomment the below for live server.
       //mail($this->to,$this->subject,$this->body,$this->headers);
       
        mail($this->to,$this->subject,$this->body,$this->headers, "-f postmaster@server.com");
    }

    function addHeader($header){
        $this->headers .= $header;
    }

}
?>