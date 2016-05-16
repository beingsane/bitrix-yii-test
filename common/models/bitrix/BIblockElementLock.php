<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_iblock_element_lock".
 *
 * @property integer $IBLOCK_ELEMENT_ID
 * @property string $DATE_LOCK
 * @property string $LOCKED_BY
 */
class BIblockElementLock extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_iblock_element_lock';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IBLOCK_ELEMENT_ID'], 'required'],
            [['IBLOCK_ELEMENT_ID'], 'integer'],
            [['DATE_LOCK'], 'safe'],
            [['LOCKED_BY'], 'string', 'max' => 32]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IBLOCK_ELEMENT_ID' => Yii::t('app', 'Iblock  Element '),
            'DATE_LOCK' => Yii::t('app', 'Date  Lock'),
            'LOCKED_BY' => Yii::t('app', 'Locked  By'),
        ];
    }

    public function getName()
    {
        return $this->IBLOCK_ELEMENT_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'IBLOCK_ELEMENT_ID', 'IBLOCK_ELEMENT_ID');
        return $list;
    }
}
