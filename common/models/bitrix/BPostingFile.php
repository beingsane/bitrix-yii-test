<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_posting_file".
 *
 * @property integer $POSTING_ID
 * @property integer $FILE_ID
 */
class BPostingFile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_posting_file';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['POSTING_ID', 'FILE_ID'], 'required'],
            [['POSTING_ID', 'FILE_ID'], 'integer'],
            [['POSTING_ID', 'FILE_ID'], 'unique', 'targetAttribute' => ['POSTING_ID', 'FILE_ID'], 'message' => 'The combination of Posting  and File  has already been taken.']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'POSTING_ID' => Yii::t('app', 'Posting '),
            'FILE_ID' => Yii::t('app', 'File '),
        ];
    }

    public function getName()
    {
        return $this->POSTING_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'POSTING_ID', 'POSTING_ID');
        return $list;
    }
}
