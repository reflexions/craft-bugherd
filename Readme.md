# Bugherd Plugin for Craft CMS

A plugin to integrate bugherd into your Craft CMS.  Includes settings to automatically install bugherd in the control panel and/or the frontend of the site.

Works great as integrated support request system for your clients allowing them to submit issues in the front end or backend of the site without having separete bugherd logins.

## Usage

1. Setup your project in Bugherd
2. Edit the project check the Enable public "Send Feedback" tab
3. In the "Install Bugherd" setting copy the project key into the plugin settings.
4. Select your visibilty settings
5. If you want to enable to tab on the front end of your site as well as the backend make sure to include { getFootHtml() }} in your layout templates

## Settings
Includes settings to
* Change the tab text
* Show the tab on the front end or just in the control panel
* Show the tab to all site visitors or just logged in users with control panel access.
