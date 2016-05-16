<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_learn_certification".
 *
 * @property string $ID
 * @property integer $STUDENT_ID
 * @property integer $COURSE_ID
 * @property string $TIMESTAMP_X
 * @property string $DATE_CREATE
 * @property string $ACTIVE
 * @property integer $SORT
 * @property string $FROM_ONLINE
 * @property string $PUBLIC_PROFILE
 * @property integer $SUMMARY
 * @property integer $MAX_SUMMARY
 */
class BLearnCertification extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_learn_certification';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['STUDENT_ID', 'COURSE_ID', 'TIMESTAMP_X'], 'required'],
            [['STUDENT_ID', 'COURSE_ID', 'SORT', 'SUMMARY', 'MAX_SUMMARY'], 'integer'],
            [['TIMESTAMP_X', 'DATE_CREATE'], 'safe'],
            [['ACTIVE', 'FROM_ONLINE', 'PUBLIC_PROFILE'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'STUDENT_ID' => Yii::t('app', 'Student '),
            'COURSE_ID' => Yii::t('app', 'Course '),
            'TIMESTAMP_X' => Yii::t('app', 'Timestamp  X'),
            'DATE_CREATE' => Yii::t('app', 'Date  Create'),
            'ACTIVE' => Yii::t('app', 'Active'),
            'SORT' => Yii::t('app', 'Sort'),
            'FROM_ONLINE' => Yii::t('app', 'From  Online'),
            'PUBLIC_PROFILE' => Yii::t('app', 'Public  Profile'),
            'SUMMARY' => Yii::t('app', 'Summary'),
            'MAX_SUMMARY' => Yii::t('app', 'Max  Summary'),
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
