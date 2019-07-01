<?php

use Core\Page\Router;

Router::addRoute('/home', '\App\Controller\Home');
Router::addRoute('/login', '\App\Controller\Login');
Router::addRoute('/logout', '\App\Controller\Logout');
Router::addRoute('/main', '\App\Controller\Main');
Router::addRoute('/data-center', '\App\Controller\DataCenter');
Router::addRoute('/weekly-data', '\App\Controller\Weekly');
Router::addRoute('/poetry-data', '\App\Controller\Poetry');
Router::addRoute('/resources', '\App\Controller\Resources');
