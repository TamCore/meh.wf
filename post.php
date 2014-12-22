<?php
    if (isset($_POST['code'], $_POST['submit'])) {
      $code = $_POST['code'];
    } elseif (isset($_SERVER['CONTENT_LENGTH'])) {
      $code = file_get_contents('php://input');
    } else {
        require("index.php");
        exit;
    }
    $cryptid = '';
    while ($cryptid == '') {
        $cryptid = dechex(time() . rand(0, 99));
        if (file_exists('pastes/'.$cryptid.'.txt')) $cryptid = '';
    }
    file_put_contents('pastes/'.$cryptid.'.txt', $code);
    file_put_contents('pastes/'.$cryptid.'.meta', 'Creator: ' . $_SERVER['REMOTE_ADDR'] . "\n");
    $url = "http://".$_SERVER['HTTP_HOST']."/".$cryptid.".txt";
    echo $url . PHP_EOL;
    header("Location: ".$url, true, 301);
?>
