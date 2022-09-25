<?php

namespace modules\test\controllers;

use craft;
use craft\web\View;

/**
 * Class TestController
 *
 * @author    djolemc
 *
 */
class TestController extends craft\web\Controller
{

    /**
     * @var    array<mixed> Allows anonymous access to this controller's actions.
     *         The actions must be in 'kebab-case'
     * @access protected
     */
    protected $allowAnonymous = ['index', 'test'];

    /**
     * @return mixed
     */
    public function actionIndex()
    {
        $data = $this->getTestData('https://wizard-world-api.herokuapp.com/Houses');

        return $this->renderTemplate(
            'test.twig',
            array('data' => $data)
        );
    }

    /**
     * @param $url string   Fetch data from given url
     *
     * @return mixed
     */
    private function getTestData(string $url)
    {
        return json_decode(file_get_contents($url));
    }


}