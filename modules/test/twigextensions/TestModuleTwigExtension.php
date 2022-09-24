<?php
/**
 * task module for Craft CMS 3.x
 *
 * My first module
 *
 * @link      https://github.com/djolemc
 * @copyright Copyright (c) 2022 Dragoljub Djordjevic
 */

namespace modules\test\twigextensions;

use modules\taskmodule\TaskModule;

use Craft;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

/**
 * Twig can be extended in many ways; you can add extra tags, filters, tests, operators,
 * global variables, and functions. You can even extend the parser itself with
 * node visitors.
 *
 * http://twig.sensiolabs.org/doc/advanced.html
 *
 * @author    Dragoljub Djordjevic
 * @package   TaskModule
 * @since     1
 */
class TestModuleTwigExtension extends AbstractExtension
{
    // Public Methods
    // =========================================================================

    /**
     * Returns the name of the extension.
     *
     * @return string The extension name
     */
    public function getName()
    {
        return 'TestModule';
    }


    /**
     * Returns an array of Twig functions, used in Twig templates via:
     *
     *      {% set this = someFunction('something') %}
     * @return array<mixed>
     */
    public function getFunctions()
    {
        return [
            new TwigFunction('custom_pluck', [$this, 'pluckInternalFunction']),
        ];
    }


    /**
     * Our function called via Twig; it can do anything you want
     *
     * @param array<mixed> $array
     * @param string $key
     *
     * @return void
     */

    public function pluckInternalFunction(array $array, string $key)
    {
        array_map(function ($item) use ($key) {
            echo is_object($item) ? $item->$key . "<br/>" : $item[$key] . "<br/>";
        }, $array);


    }


}
