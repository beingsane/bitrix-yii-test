<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_sonet_group_subject_site".
 *
 * @property integer $SUBJECT_ID
 * @property string $SITE_ID
 */
class BSonetGroupSubjectSite extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_sonet_group_subject_site';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['SUBJECT_ID', 'SITE_ID'], 'required'],
            [['SUBJECT_ID'], 'integer'],
            [['SITE_ID'], 'string', 'max' => 2]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'SUBJECT_ID' => Yii::t('app', 'Subject '),
            'SITE_ID' => Yii::t('app', 'Site '),
        ];
    }

    public function getName()
    {
        return $this->SUBJECT_ID;
    }

    public static function getList()
    {
        $models = self::find()->all();
        $list = ArrayHelper::map($models, 'SUBJECT_ID', 'SUBJECT_ID');
        return $list;
    }
}
