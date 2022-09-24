<?php
/**
 * Test module for Craft CMS 3.x
 *
 * An example module for Craft CMS 3 that ads custom twig function
 *
 * @link     https://github.com/djolemc
 */

namespace modules\test;

use modules\test\twigextensions\TestModuleTwigExtension;

use Craft;
use craft\events\RegisterUrlRulesEvent;
use craft\web\UrlManager;
use yii\base\Event;

/**
 * Class Testmodule
 *
 * @author    djolemc
 *
 */
class TestModule extends \yii\base\Module
{

    /**
     * @inheritdoc
     */

    public function init()
    {
        parent::init();

        // Add in our Twig extensions
        Craft::$app->view->registerTwigExtension(new TestModuleTwigExtension());

        //Register route in module
        Event::on(UrlManager::class, UrlManager::EVENT_REGISTER_SITE_URL_RULES, function (RegisterUrlRulesEvent $event) {
            $event->rules['test'] = 'test/test/index';
        });

    }


}