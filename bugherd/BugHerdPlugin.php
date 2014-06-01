<?php

namespace Craft;

class BugHerdPlugin extends BasePlugin
{

	function getName()
	{
		return Craft::t('Bugherd');
	}

	function getVersion()
	{
		return '1.0';
	}

	function getDeveloper()
	{
		return 'Familiar';
	}

	function getDeveloperUrl()
	{
		return 'http://besnappy.com';
	}

	protected function defineSettings()
	{
		return array(
			'projectKey' => array(AttributeType::String, 'required' => true),
      'tabText' => array(AttributeType::String, 'required' => true,  'default' => 'Report a Problem'),
      'publicAccess' => array(AttributeType::Bool, 'required' => true,  'default' => false),
      'frontEnd' => array(AttributeType::Bool, 'required' => true,  'default' => true),

		);
	}

	public function getSettingsHtml()
	{
		return craft()->templates->render('bugherd/settings', array(
			'settings' => $this->getSettings()
		));
	}

  public function hasCpSection()
  {
    return false;
  }


  public function init()
  {

    $settings = $this->getSettings();

    $showTab = craft()->bugHerd->checkAccess();

    if ($showTab)
    {

      $user = craft()->userSession->getUser();

      $bugherdCode = "<script type='text/javascript'>

      var BugHerdConfig = {

          metadata: {

            logged_in: \"true\"
          },

          feedback: {
            tab_text: \"".$settings->getAttribute('tabText')."\"
          },

          reporter: {
            email: \"".$user->email."\",
            required: \"true\"
          }
        };

(function (d, t) {
var bh = d.createElement(t), s = d.getElementsByTagName(t)[0];
bh.type = 'text/javascript';
bh.src = '//www.bugherd.com/sidebarv2.js?apikey=".$settings->getAttribute('projectKey')."';
s.parentNode.insertBefore(bh, s);
})(document, 'script');
</script>";

      craft()->templates->includeFootHtml($bugherdCode);

    }
  }


}
