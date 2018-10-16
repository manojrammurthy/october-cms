<?php return [
    // This contains the Laravel Packages that you want this plugin to utilize listed under their package identifiers
    'packages' => [
        'berkayk/laravel-onesignal' => [
            // Service providers to be registered by your plugin
            'providers' => [
             // ...
             Berkayk\OneSignal\OneSignalServiceProvider::class
            ],
            // Aliases to be registered by your plugin in the form of $alias => $pathToFacade
           'aliases' => [
    // ...
    'OneSignal' => Berkayk\OneSignal\OneSignalFacade::class
],

            // The namespace to set the configuration under. For this example, this package accesses it's config via config('purifier.' . $key), so the namespace 'purifier' is what we put here
            // 'config_namespace' => 'purifier',

'config_namespace' => 'onesignal',
            
            // The configuration file for the package itself. Start this out by copying the default one that comes with the package and then modifying what you need.
            'config' => [
                                   
                    'app_id' => 'YOUR-APP-ID-HERE',
                    /*
                    |--------------------------------------------------------------------------
                    | Rest API Key
                    |--------------------------------------------------------------------------
                    |
                    |
                    |
                                    */
                    'rest_api_key' => 'YOUR-REST-API-KEY-HERE',
                    'user_auth_key' => 'YOUR-USER-AUTH-KEY'
                     ]
            ],
        ],
];