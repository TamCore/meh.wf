<?php
    if (isset($_POST['code'], $_POST['submit'])) {
        $cryptid = '';
        while ($cryptid == '') {
	    $cryptid = dechex(time() . rand(0, 99));
            if (file_exists('pastes/'.$cryptid.'.txt')) $cryptid = '';
        }
        file_put_contents('pastes/'.$cryptid.'.txt', $_POST['code']);
        file_put_contents('pastes/'.$cryptid.'.meta', 'Creator: ' . $_SERVER['REMOTE_ADDR'] . "\n");
        $url = "http://".$_SERVER['HTTP_HOST']."/".$cryptid.".txt";
        echo $url;
        header("Location: ".$url, true, 301);
    } else {
        require("index.php");
    }
?>
