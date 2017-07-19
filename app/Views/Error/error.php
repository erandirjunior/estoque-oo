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
            background-color: #3d3d3d;
        }

        .message {
            background-size: 40px 40px;
            background-image: linear-gradient(135deg, rgba(255, 255, 255, .05) 25%, transparent 25%,
            transparent 50%, rgba(255, 255, 255, .05) 50%, rgba(255, 255, 255, .05) 75%,
            transparent 75%, transparent);
            box-shadow: inset 0 -1px 0 rgba(255, 255, 255, .4);
            width: 100%;
            border: 1px solid;
            height: 60px;
            color: #fff;
            padding: 15px;
            position: fixed;
            _position: absolute;
            margin-top: 30px;
            border-radius: 10px;
            text-shadow: 0 1px 0 rgba(0, 0, 0, .5);
            animation: animate-bg 5s linear infinite;
        }

        .error {
            background-color: #de4343;
            border-color: #c43d3d;
        }

        .message h3 {
            margin: 5px 0 5px 0;
            font-size: 25px;
        }

        .message p {
            margin: 0;
            font-size: 18px;
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

<div class="error message">
    <h3>Ups, an error ocurred</h3>
    <p><?= $this->message->getMessage(); ?></p>
</div>

</body>
</html>