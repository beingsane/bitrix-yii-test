<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_workflow_log".
 *
 * @property integer $ID
 * @property integer $DOCUMENT_ID
 * @property string $TIMESTAMP_X
 * @property integer $MODIFIED_BY
 * @property string $TITLE
 * @property string $FILENAME
 * @property string $SITE_ID
 * @property string $BODY
 * @property string $BODY_TYPE
 * @property integer $STATUS_ID
 * @property string $COMMENTS
 */
class BWorkflowLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_workflow_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['DOCUMENT_ID', 'MODIFIED_BY', 'STATUS_ID'], 'integer'],
            [['TIMESTAMP_X'], 'safe'],
            [['BODY', 'COMMENTS'], 'string'],
            [['TITLE', 'FILENAME'], 'string', 'max' => 255],
            [['SITE_ID'], 'string', 'max' => 2],
            [['BODY_TYPE'], 'string', 'max' => 4]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'DOCUMENT_ID' => Yii::t('app', 'Document '),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
            'MODIFIED_BY' => Yii::t('app', 'Modified  By'),
            'TITLE' => Yii::t('app', 'Title'),
            'FILENAME' => Yii::t('app', 'Filename'),
            'SITE_ID' => Yii::t('app', 'Site '),
            'BODY' => Yii::t('app', 'Body'),
            'BODY_TYPE' => Yii::t('app', 'Body  Type'),
            'STATUS_ID' => Yii::t('app', 'Status '),
            'COMMENTS' => Yii::t('app', 'Comments'),
        ];
    }

    public function getName()
    {
        return $this->TITLE;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'ID', 'TITLE');
        return $list;
    }
}
