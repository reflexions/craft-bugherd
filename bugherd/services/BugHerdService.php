<?php
namespace Craft;

class BugHerdService extends BaseApplicationComponent {

  public function checkAccess() {

    $plugin = craft()->plugins->getPlugin('bugHerd');
    $settings = $plugin->getSettings();

    $showTab = false;



    if ($settings->getAttribute('frontEnd'))
    {

      if ($settings->getAttribute('publicAccess'))
      {
        if (craft()->userSession->isLoggedIn())
        {
          $showTab = true;
        }
      }
      else
      {
        if (craft()->userSession->checkPermission('accessCp'))
        {
          $showTab = true;
        }
      }

    } else {

      if ( craft()->request->isCpRequest() )
      {
        $showTab = true;
      }
    }

    return $showTab;

  }
}
