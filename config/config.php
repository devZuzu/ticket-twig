<?php
session_start();  


function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function getCurrentUser() {
    return $_SESSION['user'] ?? null;
}

function requireLogin() {
    if (!isLoggedIn()) {
        header('Location: /login');
        exit;
    }
}


function getTickets() {
    $file = __DIR__ . '/../src/tickets.json';
    if (file_exists($file)) {
        return json_decode(file_get_contents($file), true) ?: [];
    }
    return [];
}

function saveTickets($tickets) {
    file_put_contents(__DIR__ . '/../src/tickets.json', json_encode($tickets, JSON_PRETTY_PRINT));
}
?>