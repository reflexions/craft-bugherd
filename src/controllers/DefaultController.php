<?php
/**
 * Intercom plugin for Craft CMS 3.x
 *
 * Intergrate Intercom with the Craft CP
 *
 * @link      http://reflexions.co
 * @copyright Copyright (c) 2019 reflexions
 */

namespace reflexions\intercom\controllers;

use reflexions\intercom\Intercom;

use Craft;
use craft\web\Controller;

/**
 * @author    reflexions
 * @package   Intercom
 * @since     1.0.0
 */
class DefaultController extends Controller
{

    // Protected Properties
    // =========================================================================

    /**
     * @var    bool|array Allows anonymous access to this controller's actions.
     *         The actions must be in 'kebab-case'
     * @access protected
     */
    protected $allowAnonymous = ['index', 'do-something'];

    // Public Methods
    // =========================================================================

    /**
     * @return mixed
     */
    public function actionIndex()
    {
        $result = 'Welcome to the DefaultController actionIndex() method';

        return $result;
    }

    /**
     * @return mixed
     */
    public function actionDoSomething()
    {
        $result = 'Welcome to the DefaultController actionDoSomething() method';

        return $result;
    }
}
