<?php

namespace common\models\bitrix;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "b_short_uri".
 *
 * @property integer $ID
 * @property string $URI
 * @property integer $URI_CRC
 * @property string $SHORT_URI
 * @property integer $SHORT_URI_CRC
 * @property integer $STATUS
 * @property string $MODIFIED
 * @property string $LAST_USED
 * @property integer $NUMBER_USED
 */
class BShortUri extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'b_short_uri';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['URI', 'URI_CRC', 'SHORT_URI', 'SHORT_URI_CRC', 'MODIFIED'], 'required'],
            [['URI_CRC', 'SHORT_URI_CRC', 'STATUS', 'NUMBER_USED'], 'integer'],
            [['MODIFIED', 'LAST_USED'], 'safe'],
            [['URI', 'SHORT_URI'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => Yii::t('app', 'ID'),
            'URI' => Yii::t('app', 'Uri'),
            'URI_CRC' => Yii::t('app', 'Uri  Crc'),
            'SHORT_URI' => Yii::t('app', 'Short  Uri'),
            'SHORT_URI_CRC' => Yii::t('app', 'Short  Uri  Crc'),
            'STATUS' => Yii::t('app', 'Status'),
            'MODIFIED' => Yii::t('app', 'Modified'),
            'LAST_USED' => Yii::t('app', 'Last  Used'),
            'NUMBER_USED' => Yii::t('app', 'Number  Used'),
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
