<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Stadium\Controller\Stadium' => 'Stadium\Controller\StadiumController',
        ),
    ),

    'router' => array(
        'routes' => array(
            'stadium' => array(
                'type'    => 'segment',
                'options' => array(
                    'route'    => '/stadium[/][:action][/:id]',
                    'constraints' => array(
                        'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        'id'     => '[0-9]+',
                    ),
                    'defaults' => array(
                        'controller' => 'Stadium\Controller\Stadium',
                        'action'     => 'index',
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'template_path_stack' => array(
            'stadium' => __DIR__ . '/../view',
        ),
    ),
);