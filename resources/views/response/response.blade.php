<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $message }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">

    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .container {
            font-family: "Bebas Neue", sans-serif;
            font-weight: 400;
            font-style: normal;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            min-height: 100vh;
            height: 100%;
            flex-direction: column;
            background-color: #DDDDDD;
        }
    </style>
</head>

<body>

</body>
<div class="container">

    <p style="font-size: 200px; margin:0; padding:0;color:#222">
        {{ $code }}
    </p>
    <p style="font-size: 3em; margin:0; padding:0">
        {{ $message }}
    </p>

</div>

</html>
