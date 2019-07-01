<?php

namespace App\Objects\Form;

use Core\Page\Objects\Form;

class AddRepoWeekly extends Form
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
                    'name' => 'weekly/',
                    'validate' => []
                ],
                'directory_second' => [
                    'type' => 'hidden',
                    'name' => 'repositories/',
                    'validate' => []
                ]
            ],
            'pre_validate' => [],
            'validate' => [
                'validate_github_url_weekly'
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
