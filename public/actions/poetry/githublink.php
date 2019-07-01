<?php

require_once '../../../bootloader.php';

function filter_post()
{
    $github = filter_input(INPUT_POST, 'github', FILTER_SANITIZE_SPECIAL_CHARS);

    if (!empty($github)) {
        return $github;
    }

    return false;
}

function execute_github_link($link)
{
    if (!empty($link)) {
        $github_link = shell_exec("env BROWSER='echo' git -C "
            . ROOT_DIR . "/public/poetry/$link open");

        return $github_link;
    }

    return false;
}

function redirect_to_github($link)
{
    header("Location: $link");
    die();
}

if (!empty($_POST['github'])) {
    $github = filter_post();

    if ($github) {
        $github_link = execute_github_link($github);
        redirect_to_github($github_link);
    } else {
        die("Error, github link not working");
    }
}