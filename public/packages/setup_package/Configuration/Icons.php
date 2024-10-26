<?php
use TYPO3\CMS\Core\Imaging\IconProvider\SvgIconProvider;

$iconList = [];

foreach (
    [
        '1-col-page' => '1-col-page.svg',
        'one-page' => 'one-page.svg',
    ] as $identifier => $path) {
    $iconList[$identifier] = [
        'provider' => SvgIconProvider::class,
        'source' => 'EXT:setup_package/Resources/Public/Icons/' . $path,
    ];
}

return $iconList;
