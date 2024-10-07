<?php

use TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider;
//use TYPO3\CMS\Core\Imaging\IconSize;

$iconList = [];

foreach (
    [
        '1-col-page' => '1-col-page.svg',
    ] as $identifier => $path) {
    $iconList[$identifier] = [
        //'icon' => Icon::SIZE_MEDIUM,
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:setup_package/Resources/Public/Icons/' . $path,
    ];
}

return $iconList;
