
<?php
// Simple face generator logic
$faces = [
    "happy" => "(^_^)",
    "sad"   => "(T_T)",
    "angry" => "(ಠ_ಠ)",
    "cool"  => "(⌐■_■)",
    "love"  => "(♥‿♥)"
];

// Choose face from URL or random
$mood = $_GET['mood'] ?? array_rand($faces);
$face = $faces[$mood];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>PHP Face Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f6f8;
            text-align: center;
            padding-top: 80px;
        }
        .face {
            font-size: 60px;
            margin: 20px;
        }
        .buttons a {
            text-decoration: none;
            padding: 10px 15px;
            margin: 5px;
            background: #007bff;
            color: white;
            border-radius: 5px;
            display: inline-block;
        }
        .buttons a:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

    <h1>Simple PHP Face Page</h1>

    <div class="face">
        <?= htmlspecialchars($face) ?>
    </div>

    <p>Mood: <strong><?= htmlspecialchars($mood) ?></strong></p>

    <div class="buttons">
        <a href="?mood=happy">Happy</a>
        <a href="?mood=sad">Sad</a>
        <a href="?mood=angry">Angry</a>
        <a href="?mood=cool">Cool</a>
        <a href="?mood=love">Love</a>
    </div>

</body>
</html>
?>
