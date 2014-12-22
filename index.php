<?php
  $host = $_SERVER['HTTP_HOST'];
  $http = (empty($_SERVER['HTTPS']) === false  ? 'https' : 'http');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>paste bin - <?php echo $host; ?></title>
        <style type="text/css">
            body {
                width: 600px;
                font-family: monospace;
                //font-size: 12px;
                display: block;
            }

            form {
                display: block;
                margin-left: auto;
                margin-right: auto;
                margin-left: 2em;
            }

            .submit {
                border: 0;
                cursor: pointer;
            }

            .title-container {
                text-align: center;
            }

            .title-left, .title-center, .title-right {
                display: inline-block;
                width: 30%;
            }

            .title-left {
                text-align: left;
            }

            .title-right {
                text-align: right;
            }

            .subtitle {
                font-weight: bold;
                text-transform: uppercase;
                margin-top: 15px;
                margin-bottom: 10px;
            }

            .content {
                white-space: pre;
                margin-left: 20px;
            }

            .code {
                width: 95%;
                height: 220px;
                overflow: auto;
            }
        </style>
<script type="text/javascript" src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script type="text/javascript" src="//cdn.rawgit.com/jackmoore/autosize/master/jquery.autosize.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    $('.code').autosize();
});
</script>

    </head>
    <body>
        <div class="title-container">
            <div class="title-left">paste(1)</div>
            <div class="title-center"><?php echo $host; ?></div>
            <div class="title-right">paste(1)</div>
        </div>

        <div class="subtitle">NAME</div>
        <div class="content"><?php echo $host; ?>: simple pastebin</div>

        <div class="subtitle">EXAMPLES</div>
        <div class="content">To paste the output of a executed command:

    &lt;command&gt; | curl --data-binary @- <?php echo $http.'://'.$host; ?>/post.php

To post the contents of a file:

    cat &lt;filename&gt; | curl --data-binary @- <?php echo $http.'://'.$host; ?>/post.php</div>

        <div class="subtitle">HELPERS</div>
        <div class="content">Tiny alias for your ~/.bashrc

    alias meh="curl --data-binary @- <?php echo $http.'://'.$host; ?>/post.php"</div>

        <div class="subtitle">INPUT</div>
        <form action="post.php" method="post">
            <textarea class="code" name="code"></textarea>
            <br />
            <input type="submit" name="submit" class="submit" value="Submit" />
        </form>
    </body>
</html>
