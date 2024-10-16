<?php
defined('TYPO3') or die();

$tempColumns = [
    'animations' => [
            'exclude' => true,
            'label' => 'Animation',
            'config' => [
                'type' => 'select',
                'renderType' => 'selectSingle',
                'items' => [
                    ['keine Animation','none'],
                    ['Fadeanimationen'],
                    ['fade', 'fade'],
                    ['fade-up', 'fade-up'],
                    ['fade-down', 'fade-down'],
                    ['fade-right', 'fade-right'],
                    ['fade-left', 'fade-left'],
                    ['fade-up-right', 'fade-up-right'],
                    ['fade-up-left', 'fade-up-left'],
                    ['fade-down-right', 'fade-down-right'],
                    ['fade-down-left', 'fade-down-left'],
                    [ 'Flipanimationen'],
                    ['flip-up', 'flip-up'],
                    ['flip-down', 'flip-down'],
                    ['flip-left', 'flip-left'],
                    ['flip-right', 'flip-right'],
                    ['Slideanimationen'],
                    ['slide-up', 'slide-up'],
                    ['slide-down', 'slide-down'],
                    ['slide-right', 'slide-right'],
                    ['slide-left', 'slide-left'],
                    ['Zoomanimationen'],
                    ['zoom-in', 'zoom-in'],
                    ['zoom-in-up', 'zoom-in-up'],
                    ['zoom-in-down', 'zoom-in-down'],
                    ['zoom-in-right', 'zoom-in-right'],
                    ['zoom-in-left', 'zoom-in-left'],
                    ['zoom-out', 'zoom-out'],
                    ['zoom-out-up', 'zoom-out-up'],
                    ['zoom-out-down', 'zoom-out-down'],
                    ['zoom-out-right', 'zoom-out-right'],
                    ['zoom-out-left', 'zoom-out-left'],
                ],
            ],
        ],
    'duration' => [
        'exclude' => true,
        'label' => 'Länge in Millisekunden',
        'description' => 'Default 0.0',
        'config' => [
            'type' => 'input',
            'size' => 7,
            'eval' => 'trim,int',
            'range' => [
                'lower' => 0,
                'upper' => 3000,
            ],
            'default' => 0,
            'slider' => [
                'step' => 100,
                'width' => 400,
            ],
        ],
    ],
    'delay' => [
        'exclude' => true,
        'label' => 'Verzögerung in Millisekunden',
        'description' => 'Default 0',
        'config' => [
            'type' => 'input',
            'size' => 7,
            'eval' => 'trim,int',
            'range' => [
                'lower' => 0,
                'upper' => 3000,
            ],
            'default' => 0,
            'slider' => [
                'step' => 50,
                'width' => 200,
            ],
        ],
    ],
    'offset' => [
        'exclude' => true,
        'label' => 'Versatz',
        'description' => 'Versatz in Pixel',
        'config' => [
            'type' => 'input',
            'size' => 5,
            'eval' => 'trim,int',
            'default' => 0,
        ],
    ],
    'anchor_placement' => [
        'exclude' => true,
        'label' => 'Ankerplatzierung',
        'description' => 'Versatz in Pixel',
        'config' => [
            'type' => 'select',
            'renderType' => 'selectSingle',
            //'size' => 1,
            'items' => [
                ['', ''],
                ['top-bottom', 'top-bottom'],
                ['top-center', 'top-center'],
                ['top-top', 'top-top'],
                ['center-bottom', 'center-bottom'],
                ['center-center', 'center-center'],
                ['center-top', 'center-top'],
                ['bottom-bottom', 'bottom-bottom'],
                ['bottom-center', 'bottom-center'],
                ['bottom-top', 'bottom-top'],
            ],
        ],
    ],
    'animations_once' => [
        'exclude' => true,
        'label' => 'Animation einmalig abspielen',
        'description' => 'Animation wird nur einmalig, beim herunterscrollen, abgespielt',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
            'default' => 1,
        ],
    ],
    'animations_mirror' => [
        'exclude' => true,
        'label' => 'Spiegeln',
        'description' => 'Animation wird beim herunterscrollen gespiegelt ausgeblendet',
        'config' => [
            'type' => 'check',
            'renderType' => 'checkboxToggle',
            'default' => 0,
        ],
    ],
];

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('tt_content', $tempColumns);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addFieldsToPalette(
        'tt_content',
        'animation',
        'animations,--linebreak--,duration,delay,--linebreak--,offset,anchor_placement,--linebreak--,animations_once,animations_mirror'
        );

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
    'tt_content',
    '--palette--;Animation;animation',
    '',
    'after:sectionIndex'
);


use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

$packageKey = 'EXT:setup_package';
$locallangFile = '/Resources/Private/Language/locallang.xlf';
$locallangBackendFile = '/Resources/Private/Language/Backend/locallang.xlf';

// Set tt_content sectionIndex to 0
$GLOBALS['TCA']['tt_content']['columns']['sectionIndex']['config']['default'] = 0;

// Containers

GeneralUtility::makeInstance(\B13\Container\Tca\Registry::class)->configureContainer(
    (
    new \B13\Container\Tca\ContainerConfiguration(
        'section',
        'LLL:' . $packageKey . '' . $locallangBackendFile . ':grid-1-col-title',
        'LLL:' . $packageKey . '' . $locallangFile . ':ctype.section.desc',
        [
            [
            ['name' => 'header1col', 'colPos' => 500, 'allowed' => ['CType' => 'header, textmedia']]
            ],
            [
                ['name' => 'LLL:' . $packageKey . '' . $locallangBackendFile . ':grid-1', 'colPos' => 501]
                ]
            ]
        )
    )
    ->setIcon('content-container-columns-1')
);

ExtensionManagementUtility::addPiFlexFormValue(
    '*',
    'FILE:' . $packageKey . '/Configuration/FlexForms/1ColSet.xml',
    'section'
);

$GLOBALS['TCA']['tt_content']['types']['section']['showitem'] = 'sys_language_uid,CType,header2col,header,layout,sectionIndex,pi_flexform';

GeneralUtility::makeInstance(\B13\Container\Tca\Registry::class)->configureContainer(
    (
    new \B13\Container\Tca\ContainerConfiguration(
        'cols_2',
        'LLL:' . $packageKey . '' . $locallangBackendFile . ':grid-2-col-title',
        'LLL:' . $packageKey . '' . $locallangFile . ':ctype.col-2.desc',
        [[
            ['name' => 'header-col-2', 'colPos' => 200, 'colspan' => 2, 'allowed' => ['CType' => 'header']]
        ],
            [
                ['name' => 'LLL:' . $packageKey . '' . $locallangBackendFile . ':grid-1', 'colPos' => 201],
                ['name' => 'LLL:' . $packageKey . '' . $locallangBackendFile . ':grid-2', 'colPos' => 202]
                ]
            ]
        )
    )
    ->setIcon('content-container-columns-2')
);

ExtensionManagementUtility::addPiFlexFormValue(
    '*',
    'FILE:' . $packageKey . '/Configuration/FlexForms/2ColSet.xml',
    'cols_2'
);

$GLOBALS['TCA']['tt_content']['types']['cols_2']['showitem'] = 'sys_language_uid,CType,header-col-2,header,header_layout,header_position,layout,colPos,tx_container_parent,pi_flexform';


GeneralUtility::makeInstance(\B13\Container\Tca\Registry::class)->configureContainer(
    (
    new \B13\Container\Tca\ContainerConfiguration(
        'cols_3',
        'LLL:' . $packageKey . '' . $locallangBackendFile . ':grid-3-col-title',
        'LLL:' . $packageKey . '' . $locallangFile . ':ctype.col-3.desc',
        [
            [
                ['name' => 'header', 'colPos' => 300, 'colspan' => 3, 'allowed' => ['CType' => 'header, textmedia']]
            ],
            [
                ['name' => 'LLL:' . $packageKey . '' . $locallangBackendFile . ':grid-1', 'colPos' => 301],
                ['name' => 'LLL:' . $packageKey . '' . $locallangBackendFile . '', 'colPos' => 302],
                ['name' => 'LLL:' . $packageKey . '' . $locallangBackendFile . '', 'colPos' => 303]
            ]
        ]
        )
    )
    ->setIcon('content-container-columns-3')
);
ExtensionManagementUtility::addPiFlexFormValue(
    '*',
    'FILE:' . $packageKey . '/Configuration/FlexForms/3ColSet.xml',
    'cols_3'
);

$GLOBALS['TCA']['tt_content']['types']['cols_3']['showitem'] = 'sys_language_uid,CType,header,layout,colPos,tx_container_parent,pi_flexform';

GeneralUtility::makeInstance(\B13\Container\Tca\Registry::class)->configureContainer(
    (
    new \B13\Container\Tca\ContainerConfiguration(
        'cols_4',
        'LLL:' . $packageKey . '' . $locallangBackendFile . ':grid-4-col-title',
        'LLL:' . $packageKey . '' . $locallangFile . ':ctype.col-4.desc',
        [
            [
                ['name' => 'header', 'colPos' => 400, 'colspan' => 4, 'allowed' => ['CType' => 'header, textmedia']]
            ],
            [
                ['name' => 'LLL:' . $packageKey . '' . $locallangBackendFile . ':grid-1', 'colPos' => 401],
                ['name' => 'LLL:' . $packageKey . '' . $locallangBackendFile . ':grid-2', 'colPos' => 402],
                ['name' => 'LLL:' . $packageKey . '' . $locallangBackendFile . ':grid-3', 'colPos' => 403],
                ['name' => 'LLL:' . $packageKey . '' . $locallangBackendFile . ':grid-4', 'colPos' => 404]
            ]
        ]
        )
    )
    ->setIcon('content-container-columns-4')
);
ExtensionManagementUtility::addPiFlexFormValue(
    '*',
    'FILE:' . $packageKey . '/Configuration/FlexForms/4ColSet.xml',
    'cols_4'
);
$GLOBALS['TCA']['tt_content']['types']['cols_4']['showitem'] = 'sys_language_uid,CType,header,layout,colPos,tx_container_parent,pi_flexform';