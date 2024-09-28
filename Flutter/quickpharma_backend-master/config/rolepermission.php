<?php

$config = [
    'orders' => array('create', 'read', 'update','delete'),
    'users' => array('create', 'read', 'update','delete'),
    'clients' => array('create', 'read', 'update','delete'),
    'drivers' => array('create', 'read', 'update','delete'),
    'order_type' => array('create', 'read', 'update','delete'),
    'route_name' => array('create', 'read', 'update','delete'),
    'map' => array('create', 'read', 'update','delete'),
    'route_timeline' => array('create', 'read', 'update','delete'),
    'routes' => array('create', 'read', 'update','delete'),
    'hubs' => array('create', 'read', 'update','delete'),
];
return $config;
