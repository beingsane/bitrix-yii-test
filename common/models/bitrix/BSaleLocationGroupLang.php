<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_location_group_lang".
 *
 * @property integer $ID
 * @property integer $LOCATION_GROUP_ID
 * @property string $LID
 * @property string $NAME
 */
class BSaleLocationGroupLang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_location_group_lang';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LOCATION_GROUP_ID', 'LID', 'NAME'], 'required'],
            [['LOCATION_GROUP_ID'], 'integer'],
            [['LID'], 'string', 'max' => 2],
            [['NAME'], 'string', 'max' => 250],
            [['LOCATION_GROUP_ID', 'LID'], 'unique', 'targetAttribute' => ['LOCATION_GROUP_ID', 'LID'], 'message' => 'The combination of Location  Group  and Lid has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'LOCATION_GROUP_ID' => Yii::t('app', 'Location  Group '),
            'LID' => Yii::t('app', 'Lid'),
            'NAME' => Yii::t('app', 'Name'),
        ];
    }

    public function getName()
    {
        return $this->NAME;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'ID', 'NAME');
        return $list;
    }
}
