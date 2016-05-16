<?php

namespace common\models;

use yii\helpers\Url;

class BitrixFile extends \common\models\bitrix\BFile
{
    public function getName()
    {
        return $this->FILE_NAME . ' ' . $this->ORIGINAL_NAME . ' ' . $this->DESCRIPTION;
    }

    public function getSrc()
    {
        return Url::to('/upload/' . $this->SUBDIR . '/' . $this->FILE_NAME);
    }
}
