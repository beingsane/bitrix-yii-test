<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_lang_domain".
 *
 * @property string $LID
 * @property string $DOMAIN
 */
class BLangDomain extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_lang_domain';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LID', 'DOMAIN'], 'required'],
            [['LID'], 'string', 'max' => 2],
            [['DOMAIN'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'LID' => Yii::t('app', 'Lid'),
            'DOMAIN' => Yii::t('app', 'Domain'),
        ];
    }

    public function getName()
    {
        return $this->LID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'LID', 'LID');
        return $list;
    }
}
