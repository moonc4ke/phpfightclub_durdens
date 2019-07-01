<?php

namespace App\Controller;

use App\App;
use App\Objects\Form\AddRepoDataCenter;
use Core\Page\View;

class DataCenter extends Base
{
    /** @var AddRepoDataCenter */
    protected $form;

    public function __construct()
    {
        if (!App::$session->isLoggedIn() === true) {
            header('Location: /home');
            exit();
        }

        parent::__construct();

        $this->form = new AddRepoDataCenter();
        $this->form->process();

        // Directory of all repositories
        $repos_dir = opendir(ROOT_DIR . '/public/repositories');

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
            'h1' => 'PHP Fight Club Data-Center',
            'image' => [
                'src' => 'images/eggs.gif',
                'alt' => 'smashing eggs'
            ]
        ]);

        $view_second = new View([
            'directory' => '/repositories/',
            'delete' => 'actions/repositories/delete.php',
            'update' => 'actions/repositories/update.php',
            'github_link' => 'actions/repositories/githublink.php',
            'repo_dirs' => $repo_dirs
        ]);

        $this->page['title'] .= ' - Data-Center';

        $this->page['content'] = $view->render(ROOT_DIR . '/app/views/repos.tpl.php');
        $this->page['content'] .= $this->form->render();
        $this->page['content'] .= $view_second->render(ROOT_DIR . '/app/views/repos.tpl.php');
    }

}