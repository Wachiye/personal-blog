<?php
    if(!empty($message_error)){
        echo <<<EOT
            <div class="alert alert-danger alert-dismissible">
                <p>$message_error</p>
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        EOT;
    }
    if(!empty($message_reply)){
        echo <<<EOT
            <div class="alert alert-info alert-dismissible">
                <p>$message_reply</p>
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        EOT;
    }

?>