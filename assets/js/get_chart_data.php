<?php
include '../../config/db.php';

$response = [
    'open' => 0,
    'resolved' => 0,
    'categories' => []
];

// Count Open and Resolved
$result = mysqli_query($conn, "SELECT status, COUNT(*) as count FROM incidents GROUP BY status");
while ($row = mysqli_fetch_assoc($result)) {
    if ($row['status'] === 'Open') {
        $response['open'] = (int)$row['count'];
    } elseif ($row['status'] === 'Resolved') {
        $response['resolved'] = (int)$row['count'];
    }
}

// Count by Category
$result2 = mysqli_query($conn, "SELECT category, COUNT(*) as count FROM incidents GROUP BY category");
while ($row = mysqli_fetch_assoc($result2)) {
    $response['categories'][] = [
        'name' => $row['category'],
        'count' => (int)$row['count']
    ];
}

header('Content-Type: application/json');
echo json_encode($response);
