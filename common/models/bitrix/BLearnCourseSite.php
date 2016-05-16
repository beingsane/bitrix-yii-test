<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_learn_course_site".
 *
 * @property string $COURSE_ID
 * @property string $SITE_ID
 */
class BLearnCourseSite extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_learn_course_site';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['COURSE_ID', 'SITE_ID'], 'required'],
            [['COURSE_ID'], 'integer'],
            [['SITE_ID'], 'string', 'max' => 2]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'COURSE_ID' => Yii::t('app', 'Course '),
            'SITE_ID' => Yii::t('app', 'Site '),
        ];
    }

    public function getName()
    {
        return $this->COURSE_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'COURSE_ID', 'COURSE_ID');
        return $list;
    }
}
