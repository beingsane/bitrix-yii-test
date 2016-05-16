<?php

namespace common\models;

use yii\helpers\ArrayHelper;

class User extends \dektrium\user\models\User
{
    public function getName()
    {
        return ($this->profile->name ?: $this->username);
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'id', 'username');

        return $list;
    }
}
