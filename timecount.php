<?php
session_start();
function timeAgo($datetime)
{
    $now = new DateTime();
    $passedDate = new DateTime($datetime);
    $interval = $now->diff($passedDate);
    if ($interval->y > 0) {
        return $interval->y . " years ago";
    } elseif ($interval->m > 0) {
        return $interval->m . " months ago";
    } elseif ($interval->d > 0) {
        return $interval->d . " days ago";
    } elseif ($interval->h > 0) {
        return $interval->h . " hours ago";
    } elseif ($interval->i > 0) {
        return $interval->i . " minutes ago";
    } else {
        return $interval->s . " seconds ago";
    }
}

?>