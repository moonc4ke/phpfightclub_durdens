<?php

namespace App\Objects\Form;

use Core\Page\Objects\Form;

class AddRepoPoetry extends Form
{

    public function __construct()
    {
        parent::__construct([
            'fields' => [
                'url' => [
                    'label' => 'REPOSITORY URL',
                    'type' => 'text',
                    'placeholder' => 'Paste Repo URL Here',
                    'validate' => [
                        'validate_not_empty'
                    ]
                ],
                'directory' => [
                    'type' => 'hidden',
                    'name' => 'poetry/',
                    'validate' => []
                ]
            ],
            'pre_validate' => [],
            'validate' => [
                'validate_github_url'
            ],
            'inputs' => [
                'submit' => [
                    'value' => 'git clone'
                ]
            ],
            'callbacks' => [
                'success' => [],
                'fail' => []
            ]
        ]);
    }

}
