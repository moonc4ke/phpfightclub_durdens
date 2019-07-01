<?php

namespace App\Controller;

use App\App;
use App\Objects\Form\AddRepoPoetry;
use Core\Page\View;

class Poetry extends Base
{
    /** @var AddRepoPoetry */
    protected $form;

    public function __construct()
    {
        if (!App::$session->isLoggedIn() === true) {
            header('Location: /home');
            exit();
        }

        parent::__construct();

        $this->form = new AddRepoPoetry();
        $this->form->process();

        // Directory of all repositories
        $repos_dir = opendir(ROOT_DIR . '/public/poetry');

        // Repository directory names
        $repo_dirs = [];

        // get each entry
        while ($entry = readdir($repos_dir)) {
            // Exclude hidden files or .php/ .html/ .jpg files
            if ($entry[0] != "." && !preg_match('/\.(php|html|jpg)$/', $entry)) {
                $repo_dirs[] = $entry;
            }
        }

        // close directory
        closedir($repos_dir);

        $view = new View([
            'h1' => 'PHP Fight Club Poetry',
            'image' => [
                'src' => 'images/copy.gif',
                'alt' => 'copy of a copy'
            ]
        ]);

        $view_second = new View([
            'directory' => '/poetry/',
            'delete' => 'actions/poetry/delete.php',
            'update' => 'actions/poetry/update.php',
            'github_link' => 'actions/poetry/githublink.php',
            'repo_dirs' => $repo_dirs
        ]);

        $this->page['title'] .= ' - Poetry';

        $this->page['content'] = $view->render(ROOT_DIR . '/app/views/repos.tpl.php');
        $this->page['content'] .= $this->form->render();
        $this->page['content'] .= $view_second->render(ROOT_DIR . '/app/views/repos.tpl.php');
    }

}