# Contao 4 cookie consent bundle

Responsive cookie consent plugin for Contao.
The plugin provides different privacy settings for the visitor.
Google Analytics is only loaded when the visitor agrees to enable statistics.
The plugin supports OnePages - no need to reload page after setting privacy settings. 

## System Requirements
- PHP >= 5.6 / >= 7.0
- contao/core-bundle >= 4.8

## Installation
- Install plugin with Contao-Manager
- Login to Contao backend with an admin account (/contao)
- Go to System > Cookies
- Click template import button and accept override notice

### If you want to use Google Analytics
- Edit active Page Layout under Layout > Themes > Page Layouts
- Check JavaScript > Analytics templates > Google Analytics
- Go to System > templates
- Edit analytics_google.html5
- Set value $GoogleAnalyticsId to your Google Analytics tracking id

## Settings
To change template, texts and links of the popup go to Settings > Cookie popup settings in the Contao backend
