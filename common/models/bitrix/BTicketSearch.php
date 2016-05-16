<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_ticket_search".
 *
 * @property integer $TICKET_ID
 * @property string $SEARCH_WORD
 */
class BTicketSearch extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_ticket_search';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TICKET_ID', 'SEARCH_WORD'], 'required'],
            [['TICKET_ID'], 'integer'],
            [['SEARCH_WORD'], 'string', 'max' => 70]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'TICKET_ID' => Yii::t('app', 'Ticket '),
            'SEARCH_WORD' => Yii::t('app', 'Search  Word'),
        ];
    }

    public function getName()
    {
        return $this->TICKET_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'TICKET_ID', 'TICKET_ID');
        return $list;
    }
}
