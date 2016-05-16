<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_workflow_document".
 *
 * @property integer $ID
 * @property integer $STATUS_ID
 * @property string $DATE_ENTER
 * @property string $DATE_MODIFY
 * @property string $DATE_LOCK
 * @property integer $ENTERED_BY
 * @property integer $MODIFIED_BY
 * @property integer $LOCKED_BY
 * @property string $FILENAME
 * @property string $SITE_ID
 * @property string $TITLE
 * @property string $BODY
 * @property string $BODY_TYPE
 * @property string $PROLOG
 * @property string $EPILOG
 * @property string $COMMENTS
 */
class BWorkflowDocument extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_workflow_document';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['STATUS_ID', 'ENTERED_BY', 'MODIFIED_BY', 'LOCKED_BY'], 'integer'],
            [['DATE_ENTER', 'DATE_MODIFY', 'DATE_LOCK'], 'safe'],
            [['FILENAME'], 'required'],
            [['BODY', 'PROLOG', 'EPILOG', 'COMMENTS'], 'string'],
            [['FILENAME', 'TITLE'], 'string', 'max' => 255],
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
            'STATUS_ID' => Yii::t('app', 'Status '),
            'DATE_ENTER' => Yii::t('app', 'Date  Enter'),
            'DATE_MODIFY' => Yii::t('app', 'Date  Modify'),
            'DATE_LOCK' => Yii::t('app', 'Date  Lock'),
            'ENTERED_BY' => Yii::t('app', 'Entered  By'),
            'MODIFIED_BY' => Yii::t('app', 'Modified  By'),
            'LOCKED_BY' => Yii::t('app', 'Locked  By'),
            'FILENAME' => Yii::t('app', 'Filename'),
            'SITE_ID' => Yii::t('app', 'Site '),
            'TITLE' => Yii::t('app', 'Title'),
            'BODY' => Yii::t('app', 'Body'),
            'BODY_TYPE' => Yii::t('app', 'Body  Type'),
            'PROLOG' => Yii::t('app', 'Prolog'),
            'EPILOG' => Yii::t('app', 'Epilog'),
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
