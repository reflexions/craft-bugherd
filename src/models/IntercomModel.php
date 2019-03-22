<?php
/**
 * Intercom plugin for Craft CMS 3.x
 *
 * Intergrate Intercom with the Craft CP
 *
 * @link      http://reflexions.co
 * @copyright Copyright (c) 2019 reflexions
 */

namespace reflexions\intercom\models;

use reflexions\intercom\Intercom;

use Craft;
use craft\base\Model;

/**
 * @author    reflexions
 * @package   Intercom
 * @since     1.0.0
 */
class IntercomModel extends Model
{
    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $hasCpSettings = true;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['someAttribute', 'string'],
            ['someAttribute', 'default', 'value' => 'Some Default'],
        ];
    }
}
