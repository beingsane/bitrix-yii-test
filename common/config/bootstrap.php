<?php
Yii::setAlias('common', dirname(__DIR__));
Yii::setAlias('frontend', dirname(dirname(__DIR__)) . '/frontend');
Yii::setAlias('backend', dirname(dirname(__DIR__)) . '/backend');
Yii::setAlias('console', dirname(dirname(__DIR__)) . '/console');

define('BITRIX_PATH', Yii::getAlias('@common/../..'));
/*
include (BITRIX_PATH . '/bitrix/modules/main/lib/loader.php');
$bitrixClasses = include(Yii::getAlias('@common/config/bitrix_autoload_classes.php'));
$bitrixClassesByModule = [];
foreach ($bitrixClasses as $key => $value) {
    $correctValue = $value;

    $file = $correctValue['file'];
    $bitrixClassesByModule[$correctValue['module']][$key] = $file;
}

\Bitrix\Main\Loader::switchAutoLoad();
foreach ($bitrixClassesByModule as $module => $classes) {
    \Bitrix\Main\Loader::registerAutoLoadClasses($module, $classes);
}
*/
$_SERVER['DOCUMENT_ROOT'] = BITRIX_PATH;

global $APPLICATION, $USER, $DB;
global $DBType; $DBType = 'mysql';

require_once(BITRIX_PATH . '/bitrix/modules/main/bx_root.php');
require_once(BITRIX_PATH . '/bitrix/modules/main/include/prolog_before.php');
require_once(BITRIX_PATH . '/bitrix/modules/main/include/prolog_after.php');
ob_get_clean();

CModule::IncludeModule('catalog');

