<?php

namespace App\Controller;

use App\App;
use Core\Page\View;

class Resources extends Base
{

    public function __construct()
    {
        if (!App::$session->isLoggedIn() === true) {
            header('Location: /home');
            exit();
        }

        parent::__construct();

        $view = new View([
            'h1' => 'PHP Fight Club Resources',
            'image' => [
                'src' => 'images/golf.gif',
                'alt' => 'playing golf'
            ],
            'links' => [
                'link_1' => [
                    'title' => 'GitHub',
                    'href' => 'https://trello.com/b/Kv0FMv38/github'
                ],
                'link_2' => [
                    'title' => 'Composer',
                    'href' => 'https://trello.com/b/Ve8jM0tW/composer'
                ],
                'link_3' => [
                    'title' => 'Laravel',
                    'href' => 'https://trello.com/b/boBjYRmA/laravel'
                ],
                'link_4' => [
                    'title' => 'PHP Q$A',
                    'href' => 'https://docs.google.com/document/d/16qk_FEXsHx7V0ZmaMuJGEcWv7zPOk7FMPHUaPreeJrk'
                ],
                'link_5' => [
                    'title' => 'Laravel Q$A',
                    'href' => 'https://docs.google.com/document/d/1YhQQvzy8IgleKNJC94V7vdeCRU-aLhnX2ka6d2CDtzY'
                ]
            ],
            'iframe' => [
                'iframe_1' => 'https://open.spotify.com/embed/user/denncath/playlist/4qBsCiWp4fYXMps2fIMxVn',
                'iframe_2' => 'https://open.spotify.com/embed/user/denncath/playlist/5HY9XDMjEKse4GPcPeHVn6',
                'iframe_3' => 'https://open.spotify.com/embed/user/denncath/playlist/5ENxnVnH7FNaTMja0QdFEW',
                'iframe_4' => 'https://open.spotify.com/embed/user/denncath/playlist/055wcOGslL8b6ryUBxgFc8',
                'iframe_5' => 'https://open.spotify.com/embed/user/denncath/playlist/7tK1WnBeGZySbOkg9Y7I5n',
            ]
        ]);

        $this->page['title'] .= ' - Resources';

        $this->page['content'] = $view->render(ROOT_DIR . '/app/views/resources.tpl.php');
    }

}