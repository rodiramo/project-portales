<?php
/** @var \App\Models\Game $game */
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Game Reserved</title>
</head>
<body>
    <h1>The game was successfully reserved</h1>
    <p>Dear Guest,</p><br>
    <p>The booking of <b>{{ $game->title }}</b> was successfull.</p>
    <p>Keep this email as proof of reserve.</p>

    <x-game-data :game="$game"></x-game-data>

    <p>Greetings,<br>
    The people at Pixel Plaza.</p>
</body>
</html>
