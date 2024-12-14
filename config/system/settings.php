<?php
return [
    'BE' => [
        'debug' => true,
        'installToolPassword' => '$argon2i$v=19$m=65536,t=16,p=1$dXBGVXl1TGZnR0NLU2RCWQ$tAmSwKMPTZaBq2bs7XL6lt5uEK+RVVLkkRn0oyM9UA0',
        'passwordHashing' => [
            'className' => 'TYPO3\\CMS\\Core\\Crypto\\PasswordHashing\\Argon2iPasswordHash',
            'options' => [],
        ],
    ],
    'DB' => [
        'Connections' => [
            'Default' => [
                'charset' => 'utf8mb4',
                'defaultTableOptions' => [
                    'charset' => 'utf8mb4',
                    'collation' => 'utf8mb4_unicode_ci',
                ],
                'driver' => 'mysqli',
                'host' => '127.0.0.1',
                'password' => '',
                'port' => 3306,
                'user' => '',
            ],
        ],
    ],
    'EXTENSIONS' => [
        'ai_suite' => [
            'aiSuiteApiKey' => '',
            'aiSuiteServer' => 'https://api.autodudes.de/',
            'anthropicApiKey' => '',
            'deeplApiKey' => '',
            'deeplApiMode' => '',
            'googleTranslateApiKey' => '',
            'mediaStorageFolder' => '',
            'midjourneyApiKey' => '',
            'midjourneyId' => '',
            'openAiApiKey' => '',
            'openTranslatedRecordInEditMode' => '1',
        ],
        'backend' => [
            'backendFavicon' => '',
            'backendLogo' => '',
            'loginBackgroundImage' => '',
            'loginFootnote' => '',
            'loginHighlightColor' => '',
            'loginLogo' => '',
            'loginLogoAlt' => '',
        ],
        'extensionmanager' => [
            'automaticInstallation' => '1',
            'offlineMode' => '0',
        ],
        'ke_search' => [
            'additionalWordCharacters' => '',
            'allowEmptySearch' => '1',
            'enableExplicitAnd' => '0',
            'enablePartSearch' => '1',
            'finishNotification' => '0',
            'loglevel' => 'ERROR',
            'multiplyValueToTitle' => '1',
            'notificationRecipient' => '',
            'notificationSender' => 'no_reply@domain.com',
            'notificationSubject' => '[KE_SEARCH INDEXER NOTIFICATION]',
            'pathCatdoc' => '/usr/bin/',
            'pathPdfinfo' => '/usr/bin/',
            'pathPdftotext' => '/usr/bin/',
            'searchWordLength' => '4',
        ],
        'news' => [
            'advancedMediaPreview' => '1',
            'archiveDate' => 'date',
            'categoryBeGroupTceFormsRestriction' => '0',
            'categoryRestriction' => '',
            'contentElementRelation' => '1',
            'dateTimeNotRequired' => '0',
            'hidePageTreeForAdministrationModule' => '0',
            'manualSorting' => '0',
            'pageTreePluginPreview' => '1',
            'prependAtCopy' => '1',
            'resourceFolderImporter' => '/news_import',
            'rteForTeaser' => '0',
            'showAdministrationModule' => '1',
            'slugBehaviour' => 'unique',
            'storageUidImporter' => '1',
            'tagPid' => '1',
        ],
        'paste_reference' => [
            'disableCopyFromPageButton' => '0',
            'enableExtendedShortcutPreviewRenderer' => '1',
            'overlayShortcutTranslation' => '0',
        ],
        'schema' => [
            'allowOnlyOneBreadcrumbList' => '0',
            'automaticBreadcrumbExcludeAdditionalDoktypes' => '',
            'automaticBreadcrumbSchemaGeneration' => '0',
            'automaticWebPageSchemaGeneration' => '1',
            'embedMarkupInBodySection' => '0',
            'embedMarkupOnNoindexPages' => '1',
        ],
    ],
    'FE' => [
        'cacheHash' => [
            'enforceValidation' => true,
        ],
        'debug' => true,
        'disableNoCacheParameter' => true,
        'passwordHashing' => [
            'className' => 'TYPO3\\CMS\\Core\\Crypto\\PasswordHashing\\Argon2iPasswordHash',
            'options' => [],
        ],
    ],
    'GFX' => [
        'processor' => 'GraphicsMagick',
        'processor_effects' => false,
        'processor_enabled' => true,
        'processor_path' => '/usr/bin/',
    ],
    'LOG' => [
        'TYPO3' => [
            'CMS' => [
                'deprecations' => [
                    'writerConfiguration' => [
                        'notice' => [
                            'TYPO3\CMS\Core\Log\Writer\FileWriter' => [
                                'disabled' => false,
                            ],
                        ],
                    ],
                ],
            ],
        ],
    ],
    'MAIL' => [
        'transport' => 'sendmail',
        'transport_sendmail_command' => '/usr/local/bin/mailpit sendmail -t --smtp-addr 127.0.0.1:1025',
        'transport_smtp_encrypt' => '',
        'transport_smtp_password' => '',
        'transport_smtp_server' => '',
        'transport_smtp_username' => '',
    ],
    'SYS' => [
        'UTF8filesystem' => true,
        'caching' => [
            'cacheConfigurations' => [
                'hash' => [
                    'backend' => 'TYPO3\\CMS\\Core\\Cache\\Backend\\Typo3DatabaseBackend',
                ],
                'pages' => [
                    'backend' => 'TYPO3\\CMS\\Core\\Cache\\Backend\\Typo3DatabaseBackend',
                    'options' => [
                        'compression' => true,
                    ],
                ],
                'rootline' => [
                    'backend' => 'TYPO3\\CMS\\Core\\Cache\\Backend\\Typo3DatabaseBackend',
                    'options' => [
                        'compression' => true,
                    ],
                ],
            ],
        ],
        'devIPmask' => '*',
        'displayErrors' => 1,
        'encryptionKey' => '5df3a138b6a85f68d3007500d9289e787ca7ecc60761ef231be451657a0092108adbf71225e580be9428d2a312a829d3',
        'exceptionalErrors' => 12290,
        'features' => [
            'frontend.cache.autoTagging' => true,
        ],
        'sitename' => 'New TYPO3 site',
    ],
];
