<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_ticket_dictionary_2_site".
 *
 * @property integer $DICTIONARY_ID
 * @property string $SITE_ID
 */
class BTicketDictionary2Site extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_ticket_dictionary_2_site';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DICTIONARY_ID', 'SITE_ID'], 'required'],
            [['DICTIONARY_ID'], 'integer'],
            [['SITE_ID'], 'string', 'max' => 2]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'DICTIONARY_ID' => Yii::t('app', 'Dictionary '),
            'SITE_ID' => Yii::t('app', 'Site '),
        ];
    }

    public function getName()
    {
        return $this->DICTIONARY_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'DICTIONARY_ID', 'DICTIONARY_ID');
        return $list;
    }
}
