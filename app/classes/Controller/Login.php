<?php

namespace App\Controller;

use App\App;
use Core\Page\View;

class Login extends Base
{

    /** @var \App\Objects\Form\Login */
    protected $form;

    public function __construct()
    {
        if (App::$session->isLoggedIn() === true) {
            header('Location: /home');
            exit();
        }

        parent::__construct();

        $this->form = new \App\Objects\Form\Login();

        switch ($this->form->process()) {
            case \App\Objects\Form\Login::STATUS_SUCCESS:
                header('Location: /main');
                exit();
                break;
            default:
                $this->page['title'] .= ' - Login';

                $view = new View([
                    'title' => 'PHP Fight Club Members Only'
                ]);

                $this->page['content'] = $view->render(ROOT_DIR . '/app/views/content.tpl.php');
                $this->page['content'] .= $this->form->render();
        }
    }

}
