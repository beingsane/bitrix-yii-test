<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sale_person_type_site".
 *
 * @property integer $PERSON_TYPE_ID
 * @property string $SITE_ID
 */
class BSalePersonTypeSite extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sale_person_type_site';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PERSON_TYPE_ID', 'SITE_ID'], 'required'],
            [['PERSON_TYPE_ID'], 'integer'],
            [['SITE_ID'], 'string', 'max' => 2]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'PERSON_TYPE_ID' => Yii::t('app', 'Person  Type '),
            'SITE_ID' => Yii::t('app', 'Site '),
        ];
    }

    public function getName()
    {
        return $this->PERSON_TYPE_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'PERSON_TYPE_ID', 'PERSON_TYPE_ID');
        return $list;
    }
}
