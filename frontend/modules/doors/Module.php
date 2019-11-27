<?php

namespace frontend\modules\doors;


class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'frontend\modules\doors\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();
        \Yii::configure($this, [
            'components' => [
                'errorHandler' => [
                    'class' => \yii\web\ErrorHandler::className(),
                    'errorAction' => 'site/error',
                    //                    'errorAction' => 'club/info/error'
                ]
            ],
        ]);

        /** @var ErrorHandler $handler */

        $handler = $this->get('errorHandler');

        \Yii::$app->set('errorHandler', $handler);

        $handler->register();
    }
}
