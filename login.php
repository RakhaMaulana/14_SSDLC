<?php
    require_once 'vendor/autoload.php';

    session_start();

    // Set your Google API credentials
    $client = new Google\Client();
    $client->setClientId('548343626612-39kderrd1f4d6ijhras89257gj2m7250.apps.googleusercontent.com');
    $client->setClientSecret('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');
    $client->setRedirectUri('http://localhost/oauth-example/callback.php');
    $client->addScope('email');

    // Create the URL to initiate Google login
    $authUrl = $client->createAuthUrl();

    // Redirect to Google login page
    header('Location: ' . filter_var($authUrl, FILTER_SANITIZE_URL));
    exit;
?>
