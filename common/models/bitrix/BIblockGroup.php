<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_iblock_group".
 *
 * @property integer $IBLOCK_ID
 * @property integer $GROUP_ID
 * @property string $PERMISSION
 */
class BIblockGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_iblock_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IBLOCK_ID', 'GROUP_ID', 'PERMISSION'], 'required'],
            [['IBLOCK_ID', 'GROUP_ID'], 'integer'],
            [['PERMISSION'], 'string', 'max' => 1],
            [['IBLOCK_ID', 'GROUP_ID'], 'unique', 'targetAttribute' => ['IBLOCK_ID', 'GROUP_ID'], 'message' => 'The combination of Iblock  and Group  has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IBLOCK_ID' => Yii::t('app', 'Iblock '),
            'GROUP_ID' => Yii::t('app', 'Group '),
            'PERMISSION' => Yii::t('app', 'Permission'),
        ];
    }

    public function getName()
    {
        return $this->IBLOCK_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'IBLOCK_ID', 'IBLOCK_ID');
        return $list;
    }
}
