<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title><?php echo $_SERVER['HTTP_HOST']; ?></title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" /> <style type="text/css">
html {
    background-color: #e6e6e6;
}
body {
    font-family: Verdana, Arial, sans-serif;
    background-color: #f6f6f6;
    border: 2px solid #e0e0e0;
    margin: 10px;
    padding: 5px;
}
textarea {
    border: 1px solid #b0b0b0;
    padding: 5px;
    font-size: 90%;
    margin: 20px;
    overflow: hidden;
    outline: none;
    resize: none;
    color: #333;
}
input#submit {
    border: 1px solid #b0b0b0;
    font-size: 95%;
    color: #333;
    position: fixed;
    top: 1.1em;
    right: 2em;
}
h2 {
    margin: 0px 5px 0px 5px;
    border-bottom: 1px solid #b0b0b0;
    color: #b0b0b0;
    font-weight: normal;
    font-size: 150%;
}
</style>
<script type="text/javascript">
var observe;
if (window.attachEvent) {
    observe = function (element, event, handler) {
        element.attachEvent('on'+event, handler);
    };
} else {
    observe = function (element, event, handler) {
        element.addEventListener(event, handler, false);
    };
}
function init () {
    var code = document.getElementById('code');
    function resize () {
        code.style.height = 'auto';
        code.style.height = code.scrollHeight+'px';
    }
    function delayedResize () {
        window.setTimeout(resize, 0);
    }
    observe(code, 'change',  resize);
    observe(code, 'cut',     delayedResize);
    observe(code, 'paste',   delayedResize);
    observe(code, 'drop',    delayedResize);
    observe(code, 'keydown', delayedResize);

    code.focus();
    code.select();
    resize();
}
</script>
</head>
<body onload="init();">
    <h2><?php echo $_SERVER['HTTP_HOST']; ?></h2>
    <form action="post.php" method="post">
        <textarea rows="30" cols="170" id="code" name="code"></textarea>
        <input type="submit" name="submit" id="submit" value="Submit" />
    </form>
</body>
</html>
