<?php

namespace frontend\controllers;

use Yii;
use common\base\CrudController;
use common\models\Product;
use frontend\models\ProductSearch;
use yii\helpers\ArrayHelper;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends CrudController
{
    /**
     * @inheritdoc
     */
    public function init()
	{
		$this->modelClass = Product::className();
		$this->searchModelClass = ProductSearch::className();
	}

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(), [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'roles' => ['?', '@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ]);
    }
}
