<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_seo_adv_link".
 *
 * @property string $LINK_TYPE
 * @property integer $LINK_ID
 * @property integer $BANNER_ID
 */
class BSeoAdvLink extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_seo_adv_link';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LINK_TYPE', 'LINK_ID', 'BANNER_ID'], 'required'],
            [['LINK_ID', 'BANNER_ID'], 'integer'],
            [['LINK_TYPE'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'LINK_TYPE' => Yii::t('app', 'Link  Type'),
            'LINK_ID' => Yii::t('app', 'Link '),
            'BANNER_ID' => Yii::t('app', 'Banner '),
        ];
    }

    public function getName()
    {
        return $this->LINK_TYPE;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'LINK_TYPE', 'LINK_TYPE');
        return $list;
    }
}
