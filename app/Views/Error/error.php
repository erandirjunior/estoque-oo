<?php
/**
 * Created by PhpStorm.
 * User: erandir
 * Date: 14/07/17
 * Time: 10:40
 */

/*echo "{$this->message->getMessage()} <br />";
echo "{$this->message->getLine()} <br />";
echo "{$this->message->getFile()} <br />";
echo "{$this->message->getTraceAsString()} <br />";
*/ ?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            background-color: black;
        }

        .message {
            background-size: 40px 40px;
            background-image: linear-gradient(135deg, rgba(255, 255, 255, .05) 25%, transparent 25%,
            transparent 50%, rgba(255, 255, 255, .05) 50%, rgba(255, 255, 255, .05) 75%,
            transparent 75%, transparent);
            box-shadow: inset 0 -1px 0 rgba(255, 255, 255, .4);
            width: 700px;
            margin: auto;
            border: 1px solid;
            color: #fff;
            padding: 15px;
            /*position: fixed;*/
            _position: absolute;
            text-shadow: 0 1px 0 rgba(0, 0, 0, .5);
            animation: animate-bg 5s linear infinite;
        }

        .msg {
            background-size: 40px 40px;
            background-image: linear-gradient(135deg, rgba(255, 255, 255, .05) 25%, transparent 25%,
            transparent 50%, rgba(255, 255, 255, .05) 50%, rgba(255, 255, 255, .05) 75%,
            transparent 75%, transparent);
            box-shadow: inset 0 -1px 0 rgba(255, 255, 255, .4);
            width: 700px;
            margin: auto;
            border: 1px solid;
            color: #000;
            padding: 15px;
            /*position: fixed;*/
            _position: absolute;
            text-shadow: 0 1px 0 rgba(0, 0, 0, .5);
            animation: animate-bg 5s linear infinite;
        }

        .test {
            background-color: #fff250;
            border-color: #d99a36;
        }

        .info {
            background-color: #4ea5cd;
            border-color: #3b8eb5;
        }

        .error {
            background-color: #de4343;
            border-color: #c43d3d;
        }

        .warning {
            background-color: #eaaf51;
            border-color: #d99a36;
        }

        .success {
            background-color: #61b832;
            border-color: #55a12c;
        }

        .message h3 {
            margin: 0 0 5px 0;
        }

        .message p {
            margin: 0;
        }

        @keyframes animate-bg {
            from {
                background-position: 0 0;
            }
            to {
                background-position: -80px 0;
            }
        }
    </style>
</head>
<body>
<?php
/**
 * Created by PhpStorm.
 * User: erandir
 * Date: 14/07/17
 * Time: 10:40
 */

/*echo "{$this->message->getMessage()}<br />";
echo "Line: {$this->message->getLine()}<br />";
echo "{$this->message->getFile()} <br />";
echo "{$this->message->getTraceAsString()} <br />";


echo "{$this->message->getMessage()} <br />";
echo "{$this->message->getLine()} <br />";
echo "{$this->message->getFile()} <br />";
echo "{$this->message->getTraceAsString()} <br />";

echo "{$this->message->getMessage()} <br />";
echo "{$this->message->getLine()} <br />";
echo "{$this->message->getFile()} <br />";
echo "{$this->message->getTraceAsString()} <br />";*/
?>
<!--<div>

    <div id="teste">
        <b>Error:</b>É um fato conhecido de todos que um leitor se distrairá com o conteúdo de texto legível de uma página quando estiver examinando sua diagramação.
    </div>

</div>-->

<!--<div class="info message">
    <h3>FYI, something just happened!</h3>
    <p>This is just an info notification message.</p>
</div>-->

<div class="error message">
    <h3>Ups, an error ocurred</h3>
    <p><?= $this->message->getMessage(); ?></p>
</div>

<div class="test msg">

    <p>Line: <?= $this->message->getLine(); ?></p>
    <p>File: <?= $this->message->getFile(); ?></p>

    <?php foreach ($this->message->getTrace() as $k => $v) {

        if ($k == 1) { ?>
            <p><?= "$k class -> " . $v['class'] . "<br/>"; ?>
            <?= "$k type -> " . $v['type'] . "<br/>"; ?>
            <?= "$k function -> " . $v['function'] . "<br/><br/>"; ?></p>
        <?php } elseif ($k == 2) { ?>
            <p><?= "$k file -> " . $v['file'] . "<br/>"; ?>
            <?= "$k line -> " . $v['line'] . "<br/>"; ?>
            <?= "$k function -> " . $v['function'] . "<br/><br/>"; ?></p>
        <?php } else { ?>

            <p><?= "$k file -> " . $v['file'] . "<br/>"; ?>
            <?= "$k class -> " . $v['class'] . "<br/>"; ?>
            <?= "$k line -> " . $v['line'] . "<br/>"; ?>
            <?= "$k function -> " . $v['function'] . "<br/><br/>"; ?></p>
        <?php }
    }
    ?>

</div>

<!--<div class="success message">
    <h3>Congrats, you did it!</h3>
    <p>This is just a success notification message.</p>
</div>-->
</body>
</html>

