<?php
class Mail{
    private $toName;
    private $toEmail;
    private $subject;
    private $message;

    public function setToName($name){
        $this->toName = $name;
    }

    public function setToEmail($email){
        $this->toEmail = $email;
    }

    public function setSubject($subject){
        $this->subject = $subject;
    }

    public function setMessage($message){
        $this->message = $message;
    }

    protected function headers(){
        $header = "From:siranjofw@gmail.com \r\n";
        $header .= "MIME-Version: 1.0\r\n";
        $header .= "Content-type: text/html\r\n";
        return $header;
    }

    public function send(){
        if( $this->sanitize($this->toEmail)){

            if (! defined('ROOT_PATH')) {
                define('ROOT_PATH', __DIR__ . DIRECTORY_SEPARATOR);
            }
            require_once ROOT_PATH . "../utils/mail-template.php";

            $message = useTemplate($this->toName, $this->message);

            $send = mail ($this->toEmail, $this->subject, $message, $this->headers());
         
            if( $send == true ) {
                return true;
            }else {
                return false;
            }
        } else{
            return false;
        }
    }

    protected function sanitize($field) {
        $field = filter_var($field, FILTER_SANITIZE_EMAIL);
        if (filter_var($field, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

}
?>