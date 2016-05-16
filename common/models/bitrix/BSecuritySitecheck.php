<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_security_sitecheck".
 *
 * @property integer $ID
 * @property string $TEST_DATE
 * @property string $RESULTS
 */
class BSecuritySitecheck extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_security_sitecheck';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TEST_DATE'], 'safe'],
            [['RESULTS'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'TEST_DATE' => Yii::t('app', 'Test  Date'),
            'RESULTS' => Yii::t('app', 'Results'),
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
