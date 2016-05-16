<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_site2group".
 *
 * @property integer $ID
 * @property integer $GROUP_ID
 * @property string $SITE_ID
 */
class BSaleSite2group extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_site2group';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['GROUP_ID', 'SITE_ID'], 'required'],
            [['GROUP_ID'], 'integer'],
            [['SITE_ID'], 'string', 'max' => 2],
            [['GROUP_ID', 'SITE_ID'], 'unique', 'targetAttribute' => ['GROUP_ID', 'SITE_ID'], 'message' => 'The combination of Group  and Site  has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'GROUP_ID' => Yii::t('app', 'Group '),
            'SITE_ID' => Yii::t('app', 'Site '),
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
