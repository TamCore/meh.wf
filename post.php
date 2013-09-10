<?php
    if (isset($_POST['code'], $_POST['submit'])) {
        $cryptid = $crypt = substr(md5(microtime()), 0, 10);
        file_put_contents('pastes/'.$crypt.'.txt', $_POST['code']);
        $url = "http://".$_SERVER['HTTP_HOST']."/".$cryptid.".txt";
        echo $url;
        header("Location: ".$url, true, 301);
    } else {
        require("index.php");
    }
?>
