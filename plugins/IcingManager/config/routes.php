<?php
use Cake\Core\Configure;
use Cake\Routing\Router;

Router::plugin(
    'IcingManager',
    ['path' => '/icing-manager'],
    function ($routes) {
        $routes->prefix('admin', function ($routes) {
            $routes->connect('/', ['plugin' => 'IcingManager', 'controller' => 'Dashboard', 'action' => 'index']);
            $routes->fallbacks('DashedRoute');
        });
        $routes->fallbacks('DashedRoute');
    }
);

Router::scope('/admin', ['prefix' => 'admin'], function ($routes) {
    $routes->connect('/', ['plugin' => 'IcingManager', 'controller' => 'Dashboard', 'action' => 'index']);
    //Fallback
    $routes->fallbacks('DashedRoute');
});

if (Configure::check('globalAdminMenu')) {
    $globalAdminMenu = Configure::read('globalAdminMenu');
}
$globalAdminMenu['brand'] = [
    'name' => 'IcingCMS',
    'url' => Router::url(['prefix' => 'admin', 'plugin' => 'IcingManager', 'controller' => 'Dashboard', 'action' => 'index']),
    'options' => [
        'class' => 'navbar-brand',
    ],
];
$globalAdminMenu['menus']['IMDashboard'] = [
    'raw' => false,
    'rawCode' => '',
    'name' => 'Dashboard',
    'url' => Router::url(['prefix' => 'admin', 'plugin' => 'IcingManager', 'controller' => 'Dashboard', 'action' => 'index']),
    'options' => [],
    'dropdown' => false,
    'weight' => 100,
    'icon' => 'fa fa-tachometer',
    'childrens' => [],
];
$globalAdminMenu['menus']['IcingManager'] = [
    'raw' => false,
    'rawCode' => '',
    'weight' => 200,
    'icon' => 'fa fa-birthday-cake',
    'name' => 'Icing Manager',
    'url' => Router::url(['prefix' => 'admin', 'plugin' => 'IcingManager', 'controller' => 'Dashboard', 'action' => 'index']),
    'options' => [
        'class' => 'dropdown-toggle',
    ],
    'dropdown' => true,
    'childrens' => [
        [
            'raw' => false,
            'rawCode' => '',
            'name' => 'Settings',
            'url' => Router::url(['prefix' => 'admin', 'plugin' => 'IcingManager', 'controller' => 'Settings', 'action' => 'index']),
            'options' => [],
        ],
        [
            'raw' => false,
            'rawCode' => '',
            'name' => 'Plugins',
            'url' => Router::url(['prefix' => 'admin', 'plugin' => 'IcingManager', 'controller' => 'Plugins', 'action' => 'index']),
            'options' => [],
        ],
        [
            'raw' => false,
            'rawCode' => '',
            'name' => 'Themes',
            'url' => Router::url(['prefix' => 'admin', 'plugin' => 'IcingManager', 'controller' => 'Themes', 'action' => 'index']),
            'options' => [],
        ],
        [
            'raw' => false,
            'rawCode' => '',
            'name' => 'Add New Plugins',
            'url' => Router::url(['prefix' => 'admin', 'plugin' => 'IcingManager', 'controller' => 'Plugins', 'action' => 'Download']),
            'options' => [],
        ],
        [
            'raw' => false,
            'rawCode' => '',
            'name' => 'Add New Themes',
            'url' => Router::url(['prefix' => 'admin', 'plugin' => 'IcingManager', 'controller' => 'Themes', 'action' => 'Download']),
            'options' => [],
        ],
    ],
];
Configure::write('globalAdminMenu', $globalAdminMenu);
