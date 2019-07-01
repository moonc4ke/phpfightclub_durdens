<?php

require_once '../../../bootloader.php';

function filter_post()
{
    $trinam_dir = filter_input(INPUT_POST, 'deletion', FILTER_SANITIZE_SPECIAL_CHARS);

    if (!empty($trinam_dir)) {
        return $trinam_dir;
    }

    return false;
}

function execute_delete($trinam)
{
    if (!empty($trinam)) {
        shell_exec("rm -rf " . ROOT_DIR . "/public/poetry/$trinam");

        return true;
    }

    return false;
}

function return_to_repos()
{
    header("Location: /poetry-data");
    die();
}

if (!empty($_POST['deletion'])) {
    $trinam_dir = filter_post();

    if ($trinam_dir) {
        execute_delete($trinam_dir);
        return_to_repos();
    } else {
        die("Error, delete function not working");
    }
} else {
    return_to_repos();
}