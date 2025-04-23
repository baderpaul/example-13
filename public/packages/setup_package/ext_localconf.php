<?php
defined('TYPO3') or die();

use TYPO3\CMS\Core\Utility\ExtensionManagementUtility;

$packageKey = "setup_package";

/***************
 * overrite default news files
 */
$GLOBALS['TYPO3_CONF_VARS']['SYS']['locallangXMLOverride']['EXT:news/Resources/Private/Language/locallang.xlf'][] = "EXT:$packageKey/Resources/Private/Language/News/locallang.xlf";
$GLOBALS['TYPO3_CONF_VARS']['SYS']['locallangXMLOverride']['de']['EXT:news/Resources/Private/Language/locallang.xlf'][] = "EXT:$packageKey/Resources/Private/Language/News/de.locallang.xlf";

/***************
 * ke_search
 */
$GLOBALS['TYPO3_CONF_VARS']['SYS']['locallangXMLOverride']['EXT:ke_search/Resources/Private/Language/locallang_searchbox.xlf'][] = "EXT:$packageKey/Resources/Private/Language/KeSearch/locallang_searchbox.xml";
$GLOBALS['TYPO3_CONF_VARS']['SYS']['locallangXMLOverride']['EXT:ke_search/Resources/Private/Language/locallang_resultlist.xlf'][] = "EXT:$packageKey/Resources/Private/Language/KeSearch/locallang_resultlist.xml";

/***************
 * overrite default cookie consent files
 */
#$GLOBALS['TYPO3_CONF_VARS']['SYS']['locallangXMLOverride']['EXT:mindshape_cookie_consent/Resources/Private/Language/locallang.xlf'][] = "EXT:$packageKey/Resources/Private/Language/CookieConsent/locallang.xlf";
#$GLOBALS['TYPO3_CONF_VARS']['SYS']['locallangXMLOverride']['de']['EXT:mindshape_cookie_consent/Resources/Private/Language/locallang.xlf'][] = "EXT:$packageKey/Resources/Private/Language/CookieConsent/de.locallang.xlf";

/***************
 * add custom RTE configuration
 */
if (empty($GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['custom'] )) {
$GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['custom'] = "EXT:$packageKey/Configuration/Sets/Example-13/RTE/custom.yaml";
    }
if (empty($GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['simple'] )) {
    $GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['simple'] = "EXT:$packageKey/Configuration/Sets/Example-13/RTE/simple.yaml";
    }
if (empty($GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['iconteaser'] )) {
    $GLOBALS['TYPO3_CONF_VARS']['RTE']['Presets']['iconteaser'] = "EXT:$packageKey/Configuration/Sets/Example-13/RTE/iconteaser.yaml";
     }

/***************
 * Define TypoScript as content rendering template.
 * This is normally set in Fluid Styled Content.
 */

$GLOBALS['TYPO3_CONF_VARS']['FE']['contentRenderingTemplates'][] = "$packageKey/Configuration/TypoScript/";

/***************
 * extend css for TYPO3 BE + CkEditor backend
 */
$GLOBALS['TYPO3_CONF_VARS']['BE']['stylesheets']['setup_package']  = "EXT:$packageKey/Resources/Public/Styles/OverwriteBe.css";

/***************
 * BE setup for form
*/
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTypoScriptSetup(
    trim('
        module.tx_form {
        settings {
            yamlConfigurations {
                100 = EXT:setup_package/Configuration/Sets/Example-13/Forms/FormDefinition/DefaultFormConfiguration.yaml
                }
            }
        }
    ')
);

/***************
 * Cache schema EXT
*/
$GLOBALS['TYPO3_CONF_VARS']['SYS']['caching']['cacheConfigurations']['tx_schema']['backend']
   ??= \TYPO3\CMS\Core\Cache\Backend\FileBackend::class;