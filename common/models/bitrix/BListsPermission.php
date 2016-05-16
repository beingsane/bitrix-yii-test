<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_lists_permission".
 *
 * @property string $IBLOCK_TYPE_ID
 * @property integer $GROUP_ID
 */
class BListsPermission extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_lists_permission';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IBLOCK_TYPE_ID', 'GROUP_ID'], 'required'],
            [['GROUP_ID'], 'integer'],
            [['IBLOCK_TYPE_ID'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IBLOCK_TYPE_ID' => Yii::t('app', 'Iblock  Type '),
            'GROUP_ID' => Yii::t('app', 'Group '),
        ];
    }

    public function getName()
    {
        return $this->IBLOCK_TYPE_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'IBLOCK_TYPE_ID', 'IBLOCK_TYPE_ID');
        return $list;
    }
}
