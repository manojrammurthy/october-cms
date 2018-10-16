# october-cms
Laravel Package installation inside october cms plugins
will explain you with example here 

1) create a plugin in october cms by command 
php artisan create:plugin Developername.Pluginname

2)install laravel one signal packages via composer run it inside plufgin directory
composer require berkayk/onesignal-laravel

3)later run composer update 

4)now there is a bit of changes that needs to be done in case of october cms plugin unlike laravel where you can directly put providers and aliases in config/app.php , here in october cms we have to put it in Plugin.php boot method so that the plugin is independent of the entire project 

you can look into Plugin.php file for configuration 

5)create a config folder and config.php inside the config folder similiar to packages config file which is found in vendor/berkayk/onesignal-laravel/config, only extra thing that needs to be done is you have to return the providers and aliases from config file too 

6)run the publish in php artisan 
php artisan vendor:publish --tag=config

7)place your app_id and rest_api_key in config file 

8)create your controller and start using it 

