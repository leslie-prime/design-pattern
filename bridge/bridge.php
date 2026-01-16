
<?php
// bridge.php
header("Content-Type: application/json");

// Allowed faces
$faces = [
    "happy" => "(^_^)",
    "sad"   => "(T_T)",
    "angry" => "(ಠ_ಠ)",
    "cool"  => "(⌐■_■)",
    "love"  => "(♥‿♥)"
];

// Check request method
if ($_SERVER["REQUEST_METHOD"] !== "GET") {
    echo json_encode([
        "status" => "error",
        "message" => "Invalid request method"
    ]);
    exit;
}

// Get mood from request
$mood = $_GET["mood"] ?? null;

// Validate mood
if ($mood && array_key_exists($mood, $faces)) {
    echo json_encode([
        "status" => "success",
        "mood" => $mood,
        "face" => $faces[$mood]
    ]);
} else {
    // Random face fallback
    $randomMood = array_rand($faces);
    echo json_encode([
        "status" => "success",
        "mood" => $randomMood,
        "face" => $faces[$randomMood],
        "note" => "Random face generated"
    ]);
}
