<?php
require dirname(__DIR__) . '/vendor/autoload.php';
use OGBitBlt\Output\BrowserConsole;

$variable1 = "hello";
$variable2 = "world";
$variable3 = "this is a test";
$console = new BrowserConsole();
?>
<html>
    <head>
        <title>this is a test</title>
    </head>
    <body>
        <p>The value of $variable1 is <?php echo $variable1 ?></p>
        <?php $console->Write(sprintf("The value of variable 1 is %s",$variable1)); ?>
    </body>
</html>