<?php
    require_once 'vendor/autoload.php';
    session_start();
    $client = new Google\Client();
    $client->setClientId('548343626612-39kderrd1f4d6ijhras89257gj2m7250.apps.googleusercontent.com');
    $client->setClientSecret('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');
    $client->setRedirectUri('http://localhost/oauth-example/callback.php');
    $client->addScope('email');
    if (isset($_GET['code'])) {
        $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
        $client->setAccessToken($token);
        $oauth2 = new Google\Service\Oauth2($client);
        $userInfo = $oauth2->userinfo->get();
        $_SESSION['user_id'] = $userInfo->id;
        $_SESSION['user_name'] = $userInfo->name;
        $_SESSION['user_email'] = $userInfo->email;
        header('Location: event.php');
        exit;
    } else {
        echo "Something went wrong!";
    }
?>