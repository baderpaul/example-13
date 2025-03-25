<?php
defined('TYPO3') or die();

$GLOBALS['TCA']['tx_news_domain_model_news']['columns']['fal_media']['config']['overrideChildTca']['columns']['crop'] = [
    'config' => [
        'cropVariants' => [
            'default' => [
                'disabled' => true,
            ],
            'tablet' => [
                'disabled' => true,
            ],
            'mobilelandscape' => [
                'disabled' => true,
            ],
            'mobile' => [
                'disabled' => true,
            ],
            'newslistview' => [
                'title' => 'Listview',
                'allowedAspectRatios' => [
                    '4:3' => [
                        'title' => '1:1',
                        'value' => 1 / 1
                    ],
                ],
            ],
            'newscardlist' => [
                'title' => 'Cardlistview',
                'allowedAspectRatios' => [
                    '1:1' => [
                        'title' => '1:1',
                        'value' => 1 / 1
                    ],
                ],
            ],
            'newssingleview' => [
                'title' => 'Singleview',
                'allowedAspectRatios' => [
                    '16:9' => [
                        'title' => '16:9',
                        'value' => 16 / 9
                    ],
                ],
            ],
        ],
    ],
];