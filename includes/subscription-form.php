<form method="POST">
    <p class="form-text">Subscribe to get latest articles and updates right ahead of others</p>
    <?php
        if(!empty($subscribe_error)){
            echo <<<EOT
                <div class="alert alert-danger alert-dismissible">
                    <p>$subscribe_error</p>
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
            EOT;
        }
        if(!empty($subscribe_reply)){
            echo <<<EOT
                <div class="alert alert-info alert-dismissible">
                    <p>$subscribe_reply</p>
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                </div>
            EOT;
        }

    ?>
    <input type="hidden"  name="type" value="subscribe"/>
    <div class="form-group">
        <input type="text" class="form-control" id="username" name="username" placeholder="Your Username" />
    </div>
    <div class="form-group">
        <input type="email" class="form-control" id="email" name="email" placeholder="Your Email" />
    </div>
    <button class="btn btn-sm btn-dark">Subscribe</button>
</form>