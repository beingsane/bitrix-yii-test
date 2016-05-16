<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_lists_socnet_group".
 *
 * @property integer $IBLOCK_ID
 * @property string $SOCNET_ROLE
 * @property string $PERMISSION
 */
class BListsSocnetGroup extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_lists_socnet_group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IBLOCK_ID', 'PERMISSION'], 'required'],
            [['IBLOCK_ID'], 'integer'],
            [['SOCNET_ROLE', 'PERMISSION'], 'string', 'max' => 1],
            [['IBLOCK_ID', 'SOCNET_ROLE'], 'unique', 'targetAttribute' => ['IBLOCK_ID', 'SOCNET_ROLE'], 'message' => 'The combination of Iblock  and Socnet  Role has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IBLOCK_ID' => Yii::t('app', 'Iblock '),
            'SOCNET_ROLE' => Yii::t('app', 'Socnet  Role'),
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
