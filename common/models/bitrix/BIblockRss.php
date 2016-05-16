<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_iblock_rss".
 *
 * @property integer $ID
 * @property integer $IBLOCK_ID
 * @property string $NODE
 * @property string $NODE_VALUE
 */
class BIblockRss extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_iblock_rss';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['IBLOCK_ID', 'NODE'], 'required'],
            [['IBLOCK_ID'], 'integer'],
            [['NODE'], 'string', 'max' => 50],
            [['NODE_VALUE'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'IBLOCK_ID' => Yii::t('app', 'Iblock '),
            'NODE' => Yii::t('app', 'Node'),
            'NODE_VALUE' => Yii::t('app', 'Node  Value'),
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
