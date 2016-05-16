<?php
namespace common\helpers;

use Yii;
use yii\helpers\Html;
use yii\helpers\Url;

class UrlHelper
{
    public static function remember()
    {
        Url::remember('', Yii::$app->controller->id);
    }

    public static function previous()
    {
        $url = Url::previous(Yii::$app->controller->id);
        if (!$url) $url = Url::toRoute([Yii::$app->controller->id.'/']);
        return $url;
    }
}
