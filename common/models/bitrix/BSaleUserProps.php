<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_user_props".
 *
 * @property integer $ID
 * @property string $NAME
 * @property integer $USER_ID
 * @property integer $PERSON_TYPE_ID
 * @property string $DATE_UPDATE
 * @property string $XML_ID
 * @property string $VERSION_1C
 */
class BSaleUserProps extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_user_props';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['NAME', 'USER_ID', 'PERSON_TYPE_ID', 'DATE_UPDATE'], 'required'],
            [['USER_ID', 'PERSON_TYPE_ID'], 'integer'],
            [['DATE_UPDATE'], 'safe'],
            [['NAME'], 'string', 'max' => 255],
            [['XML_ID'], 'string', 'max' => 50],
            [['VERSION_1C'], 'string', 'max' => 15]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'NAME' => Yii::t('app', 'Name'),
            'USER_ID' => Yii::t('app', 'User '),
            'PERSON_TYPE_ID' => Yii::t('app', 'Person  Type '),
            'DATE_UPDATE' => Yii::t('app', 'Date  Update'),
            'XML_ID' => Yii::t('app', 'Xml '),
            'VERSION_1C' => Yii::t('app', 'Version 1 C'),
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
