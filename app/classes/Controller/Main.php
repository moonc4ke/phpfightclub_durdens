<?php

namespace App\Controller;

use App\App;
use Core\Page\View;

class Main extends Base
{
    protected $users;

    public function __construct()
    {
        if (!App::$session->isLoggedIn() === true) {
            header('Location: /home');
            exit();
        }

        parent::__construct();

        $this->users = App::$user_repo->loadAll();

        $view = new View();

        $this->page['title'] .= ' - Main';

        $this->page['content'] = $view->render(ROOT_DIR . '/app/views/main.tpl.php');
    }

}