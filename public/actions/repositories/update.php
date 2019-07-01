<?php

require_once '../../../bootloader.php';

function filter_post()
{
    $update_dir = filter_input(INPUT_POST, 'update', FILTER_SANITIZE_SPECIAL_CHARS);

    if (!empty($update_dir)) {
        return $update_dir;
    }

    return false;
}

function execute_update($update)
{
    if (!empty($update)) {
        shell_exec("git -C " . ROOT_DIR . "/public/repositories/$update fetch "
            . "--all");
        shell_exec("git -C " . ROOT_DIR . "/public/repositories/$update reset "
            . "--hard origin/master");

        return true;
    }

    return false;
}

function return_to_repos()
{
    header("Location: /data-center");
    die();
}

if (!empty($_POST['update'])) {
    $update_dir = filter_post();

    if ($update_dir) {
        execute_update($update_dir);
        return_to_repos();
    } else {
        die("Error, update not working");
    }
}