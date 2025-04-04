<?php
defined('TYPO3') or die();
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

$packageKey = 'EXT:setup_package';

$newFields = [
    'breadcrumb' => [
        'label' => 'LLL:' . $packageKey . '/Resources/Private/Language/locallang_be.xlf:show-breadcrumb',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxLabeledToggle',
            'items' => [
                    [
                        'label' => ' ',
                        'labelChecked' => 'LLL:' . $packageKey . '/Resources/Private/Language/locallang_be.xlf:bc-active',
                        'labelUnchecked' => 'LLL:' . $packageKey . '/Resources/Private/Language/locallang_be.xlf:bc-deactive',
                    ],

            ],
        ]
    ]
];

ExtensionManagementUtility::addTCAcolumns(
    'pages',
    $newFields
);

ExtensionManagementUtility::addToAllTCAtypes(
    'pages',
    'breadcrumb',
    '',
    'after:nav_title'
);
/*
$GLOBALS['TCA']['pages']['types']['1']['columnsOverrides']['media']['config']['overrideChildTca']['columns']['crop'] = [
    'config' => [
        'cropVariants' => [
            'headerdesktop' => [
                'title' => 'Headerformat Desktop',
                'selectedRatio' => '24:7',
                'allowedAspectRatios' => [
                    '24:7' => [
                        'title' => '24:7',
                        'value' => '3.42857',
                    ],
                ],
            ],  
            'headermobile' => [
                'title' => 'Headerformat Mobile < 768px',
                'selectedRatio' => '16:9',
                'allowedAspectRatios' => [
                    '16:19' => [
                        'title' => '16:9',
                        'value' => '1.7777777',
                    ],
                ],
            ],
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
        ],
    ],
];

$GLOBALS['TCA']['pages']['types']['4']['columnsOverrides']['media']['config']['overrideChildTca']['columns']['crop'] = [
    'config' => [
        'cropVariants' => [
            'headerdesktop' => [
                'title' => 'Headerformat Desktop',
                'selectedRatio' => '24:7',
                'allowedAspectRatios' => [
                    '24:7' => [
                        'title' => '24:7',
                        'value' => '3.42857',
                    ],
                ],
            ],  
            'headermobile' => [
                'title' => 'Headerformat Mobile < 768px',
                'selectedRatio' => '16:9',
                'allowedAspectRatios' => [
                    '16:19' => [
                        'title' => '16:9',
                        'value' => '1.7777777',
                    ],
                ],
            ],
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
            'card' => [
                'disabled' => true,
            ],
            'flipcard' => [
                'disabled' => true,
            ],
        ],
    ],
];
*/
