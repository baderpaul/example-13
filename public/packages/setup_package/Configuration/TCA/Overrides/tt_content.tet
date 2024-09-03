<?php
defined('TYPO3') or die();

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