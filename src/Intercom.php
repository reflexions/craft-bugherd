<?php
/**
 * Intercom plugin for Craft CMS 3.x
 *
 * Intergrate Intercom with the Craft CP
 *
 * @link      http://reflexions.co
 * @copyright Copyright (c) 2019 reflexions
 */

namespace reflexions\intercom;

use reflexions\intercom\services\IntercomService as IntercomServiceService;
use reflexions\intercom\models\Settings;

use Craft;
use craft\base\Plugin;
use craft\services\Plugins;
use craft\events\PluginEvent;
use craft\web\UrlManager;
use craft\web\View;
use craft\events\RegisterUrlRulesEvent;

use yii\base\Event;

/**
 * Class Intercom
 *
 * @author    reflexions
 * @package   Intercom
 * @since     1.0.0
 *
 * @property  IntercomServiceService $intercomService
 */
class Intercom extends Plugin
{
    // Static Properties
    // =========================================================================

    /**
     * @var Intercom
     */
    public static $plugin;

    // Public Properties
    // =========================================================================

    /**
     * @var string
     */
    public $schemaVersion = '1.0.0';

    /** @var bool $hasCpSettings The plugin has a settings page. */
    public $hasCpSettings = true;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        self::$plugin = $this;

        Event::on(View::class, View::EVENT_END_BODY, function(Event $event) {

            $settings = $this->getSettings();
            $user = Craft::$app->getUser()->getIdentity();


            if($settings->appId && $user) {
                $groups = $user->getGroups();
                if($settings->groupHandle) {
                    $monitor = in_array($settings->groupHandle, $user->groups, true);
                } else {
                    $monitor = true;
                }
                
                if($monitor) {
                    $oldMode = Craft::$app->view->getTemplateMode();
                    Craft::$app->view->setTemplateMode(View::TEMPLATE_MODE_CP);
                    $userHash = hash_hmac("sha256", $user->email, $settings->secretKey);
                    $code = Craft::$app->view->renderTemplate('intercom/code', array(
                        'settings' => $settings,
                        'userHash' => $userHash
                    ));
                    echo $code;
                    Craft::$app->view->setTemplateMode($oldMode);
                }
            }
        });
    }

    // Protected Methods
    // =========================================================================

    /**
     * @return Settings  Plugin settings model.
     */
    protected function createSettingsModel()
    {
        return new Settings();
    }

    /**
     * @return string  The fully rendered settings template.
     */
    protected function settingsHtml()
    {
        return Craft::$app->getView()->renderTemplate('intercom/settings', [
            'settings' => $this->getSettings()
        ]);
    }
}
