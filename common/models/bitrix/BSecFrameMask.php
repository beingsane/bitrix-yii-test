<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sec_frame_mask".
 *
 * @property integer $ID
 * @property integer $SORT
 * @property string $SITE_ID
 * @property string $FRAME_MASK
 * @property string $LIKE_MASK
 * @property string $PREG_MASK
 */
class BSecFrameMask extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sec_frame_mask';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SORT'], 'integer'],
            [['SITE_ID'], 'string', 'max' => 2],
            [['FRAME_MASK', 'LIKE_MASK', 'PREG_MASK'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'SORT' => Yii::t('app', 'Sort'),
            'SITE_ID' => Yii::t('app', 'Site '),
            'FRAME_MASK' => Yii::t('app', 'Frame  Mask'),
            'LIKE_MASK' => Yii::t('app', 'Like  Mask'),
            'PREG_MASK' => Yii::t('app', 'Preg  Mask'),
        ];
    }

    public function getName()
    {
        return $this->ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'ID', 'ID');
        return $list;
    }
}
