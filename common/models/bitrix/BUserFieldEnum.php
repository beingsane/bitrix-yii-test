<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_user_field_enum".
 *
 * @property integer $ID
 * @property integer $USER_FIELD_ID
 * @property string $VALUE
 * @property string $DEF
 * @property integer $SORT
 * @property string $XML_ID
 */
class BUserFieldEnum extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_user_field_enum';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['USER_FIELD_ID', 'SORT'], 'integer'],
            [['VALUE', 'XML_ID'], 'required'],
            [['VALUE', 'XML_ID'], 'string', 'max' => 255],
            [['DEF'], 'string', 'max' => 1],
            [['USER_FIELD_ID', 'XML_ID'], 'unique', 'targetAttribute' => ['USER_FIELD_ID', 'XML_ID'], 'message' => 'The combination of User  Field  and Xml  has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'USER_FIELD_ID' => Yii::t('app', 'User  Field '),
            'VALUE' => Yii::t('app', 'Value'),
            'DEF' => Yii::t('app', 'Def'),
            'SORT' => Yii::t('app', 'Sort'),
            'XML_ID' => Yii::t('app', 'Xml '),
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
