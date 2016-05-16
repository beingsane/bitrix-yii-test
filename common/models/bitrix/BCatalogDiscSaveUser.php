<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_catalog_disc_save_user".
 *
 * @property integer $ID
 * @property integer $DISCOUNT_ID
 * @property integer $USER_ID
 * @property string $ACTIVE_FROM
 * @property string $ACTIVE_TO
 * @property double $RANGE_FROM
 */
class BCatalogDiscSaveUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_catalog_disc_save_user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DISCOUNT_ID', 'USER_ID', 'ACTIVE_FROM', 'ACTIVE_TO', 'RANGE_FROM'], 'required'],
            [['DISCOUNT_ID', 'USER_ID'], 'integer'],
            [['ACTIVE_FROM', 'ACTIVE_TO'], 'safe'],
            [['RANGE_FROM'], 'number']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'DISCOUNT_ID' => Yii::t('app', 'Discount '),
            'USER_ID' => Yii::t('app', 'User '),
            'ACTIVE_FROM' => Yii::t('app', 'Active  From'),
            'ACTIVE_TO' => Yii::t('app', 'Active  To'),
            'RANGE_FROM' => Yii::t('app', 'Range  From'),
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
