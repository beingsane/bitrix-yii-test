<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_person_type".
 *
 * @property integer $ID
 * @property string $LID
 * @property string $NAME
 * @property integer $SORT
 * @property string $ACTIVE
 */
class BSalePersonType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_person_type';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['LID', 'NAME'], 'required'],
            [['SORT'], 'integer'],
            [['LID'], 'string', 'max' => 2],
            [['NAME'], 'string', 'max' => 255],
            [['ACTIVE'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'LID' => Yii::t('app', 'Lid'),
            'NAME' => Yii::t('app', 'Name'),
            'SORT' => Yii::t('app', 'Sort'),
            'ACTIVE' => Yii::t('app', 'Active'),
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
