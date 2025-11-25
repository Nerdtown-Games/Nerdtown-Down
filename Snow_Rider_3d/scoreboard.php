<?php
header('Content-Type: application/json');

$saveDir = '/web/games/auth/saves/';
$usersDir = '/web/games/auth/users/';
$leaderboard = [];

// Check directories exist
if (!is_dir($saveDir) || !is_dir($usersDir)) {
    echo json_encode(['error' => 'Required directories not found']);
    exit;
}

// Get all save files
$saveFiles = glob($saveDir . '*.json');

foreach ($saveFiles as $saveFile) {
    $saveData = json_decode(file_get_contents($saveFile), true);
    
    if (isset($saveData['snow-rider-3d-highscore'])) {
        $username = basename($saveFile, '.json');
        $displayName = $username; // Default fallback
        
        // Get user profile
        $userFile = $usersDir . $username . '.json';
        if (file_exists($userFile)) {
            $userData = json_decode(file_get_contents($userFile), true);
            if (isset($userData['display_name'])) {
                $displayName = $userData['display_name'];
            }
        }

        $leaderboard[] = [
            'username' => $username,
            'name' => $displayName,
            'score' => (int)$saveData['snow-rider-3d-highscore']
        ];
    }
}

// Sort by score (descending)
usort($leaderboard, function($a, $b) {
    return $b['score'] - $a['score'];
});

// Return top 100 scores
echo json_encode(array_slice($leaderboard, 0, 100));
?>
