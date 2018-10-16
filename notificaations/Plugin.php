<?php namespace Manoj\Notificaations;

use Backend;
use System\Classes\PluginBase;
use App;
use Config;
use Illuminate\Foundation\AliasLoader;

/**
 * notificaations Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'notificaations',
            'description' => 'No description provided yet...',
            'author'      => 'Manoj',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */

    public function bootPackages()
{
    // Get the namespace of the current plugin to use in accessing the Config of the plugin
    $pluginNamespace = str_replace('\\', '.', strtolower(__NAMESPACE__));
    
    // Instantiate the AliasLoader for any aliases that will be loaded
    $aliasLoader = AliasLoader::getInstance();
    
    // Get the packages to boot
    $packages = Config::get($pluginNamespace . '::packages');
    
    // Boot each package
    foreach ($packages as $name => $options) {
        // Setup the configuration for the package, pulling from this plugin's config
        if (!empty($options['config']) && !empty($options['config_namespace'])) {
            Config::set($options['config_namespace'], $options['config']);
        }
        
        // Register any Service Providers for the package
        if (!empty($options['providers'])) {
            foreach ($options['providers'] as $provider) {
                App::register($provider);
            }
        }
        
        // Register any Aliases for the package
        if (!empty($options['aliases'])) {
            foreach ($options['aliases'] as $alias => $path) {
                $aliasLoader->alias($alias, $path);
            }
        }
    }
}

    public function boot()
    {
            $this->bootPackages();
    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {
        return []; // Remove this line to activate

        return [
            'Manoj\Notificaations\Components\MyComponent' => 'myComponent',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'Manoj.notificaations.some_permission' => [
                'tab' => 'notificaations',
                'label' => 'Some permission'
            ],
        ];
    }

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return []; // Remove this line to activate

        return [
            'notificaations' => [
                'label'       => 'notificaations',
                'url'         => Backend::url('Manoj/notificaations/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['Manoj.notificaations.*'],
                'order'       => 500,
            ],
        ];
    }

}
