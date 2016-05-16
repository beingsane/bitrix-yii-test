<?php

return [
    'class' => 'yii\gii\Module',
    'generators' => [
        'model'   => [
            'class' => 'common\modules\gii\generators\model\Generator',
            'templates' => [
                'model' => '@common/modules/gii/generators/model/default',
            ],
        ],
        'crud' => [
            'class' => 'common\modules\gii\generators\crud\Generator',
            'templates' => [
                'crud' => '@common/modules/gii/generators/crud/default',
            ],
        ],
    ]
];
