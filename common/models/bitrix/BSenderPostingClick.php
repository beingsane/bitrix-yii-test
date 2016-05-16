<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sender_posting_click".
 *
 * @property integer $ID
 * @property integer $POSTING_ID
 * @property integer $RECIPIENT_ID
 * @property string $DATE_INSERT
 * @property string $URL
 */
class BSenderPostingClick extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sender_posting_click';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['POSTING_ID'], 'required'],
            [['POSTING_ID', 'RECIPIENT_ID'], 'integer'],
            [['DATE_INSERT'], 'safe'],
            [['URL'], 'string', 'max' => 2000]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'POSTING_ID' => Yii::t('app', 'Posting '),
            'RECIPIENT_ID' => Yii::t('app', 'Recipient '),
            'DATE_INSERT' => Yii::t('app', 'Date  Insert'),
            'URL' => Yii::t('app', 'Url'),
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
