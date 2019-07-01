<?php

namespace App\Controller;

use App\App;
use App\Objects\Form\AddRepoWeekly;
use Core\Page\View;

class Weekly extends Base
{
    /** @var AddRepoWeekly */
    protected $form;

    public function __construct()
    {
        if (!App::$session->isLoggedIn() === true) {
            header('Location: /home');
            exit();
        }

        parent::__construct();

        $this->form = new AddRepoWeekly();
        $this->form->process();

        // Directory of all repositories
        $repos_dir = opendir(ROOT_DIR . '/public/weekly');

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
            'h1' => 'PHP Fight Club Weekly Data',
            'image' => [
                'src' => 'images/marla.gif',
                'alt' => 'marla'
            ]
        ]);

        $view_second = new View([
            'directory' => '/weekly/',
            'delete' => 'actions/weekly/delete.php',
            'update' => 'actions/weekly/update.php',
            'github_link' => 'actions/weekly/githublink.php',
            'repo_dirs' => $repo_dirs
        ]);

        $this->page['title'] .= ' - Weekly';

        $this->page['content'] = $view->render(ROOT_DIR . '/app/views/repos.tpl.php');
        $this->page['content'] .= $this->form->render();
        $this->page['content'] .= $view_second->render(ROOT_DIR . '/app/views/repos.tpl.php');
    }

}