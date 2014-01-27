<?php
return array(
    'facebook' => array(
        'appId' => 'YOUR_APP_ID',
        'secret' => 'YOUR_APP_SECRET',
        'fileUpload' => false, // optional
        'allowSignedRequest' => false, // optional, but should be set to false for non-canvas apps
    ),
    'service_manager' => array(
        'aliases' => array(
    	    'FacebookModule\Service\FacebookFactory' => 'facebook'
        ),
        'factories' => array(
        	'facebook' => new \FacebookModule\Service\FacebookFactory('facebook')
        )
    ),
);
