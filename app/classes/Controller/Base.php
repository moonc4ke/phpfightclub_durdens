<?php

namespace App\Controller;

use App\App;
use App\View\Navigation;
use Core\Page\Controller;

class Base extends Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->page['stylesheets'] = [
            'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css',
            'css/style.css'
        ];

        $this->page['scripts']['body_end'] = [
            'https://code.jquery.com/jquery-3.3.1.slim.min.js',
            'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js',
            'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js',
            'scripts/sorting.js'
        ];

        if (!App::$session->isLoggedIn() === true) {
            $nav_view = new Navigation([
                [
                    'link' => 'login',
                    'title' => 'Login'
                ]
            ]);
        } else {
            $nav_view = new Navigation([
                [
                    'link' => 'data-center',
                    'title' => 'Data-Center'
                ],
                [
                    'link' => 'weekly-data',
                    'title' => 'Weekly'
                ],
                [
                    'link' => 'poetry-data',
                    'title' => 'Poetry'
                ],
                [
                    'link' => 'resources',
                    'title' => 'Resources'
                ],
                [
                    'link' => 'logout',
                    'title' => 'Logout'
                ]
            ]);
        }

        $this->page['header'] = $nav_view->render();
    }

}
