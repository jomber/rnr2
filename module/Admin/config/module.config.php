<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Admin\Controller\Admin' => 'Admin\Controller\AdminController',
        ),
    ),
	'router' => array(
			'routes' => array(
					'adm' => array(
							'type'    => 'segment',
							'options' => array(
									'route'    => '/adm[/][:action][/:id]',
									'constraints' => array(
											'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
											'id'     => '[0-9]+',
									),
									'defaults' => array(
											'controller' => 'Admin\Controller\Admin',
											'action'     => 'index',
									),
							),
					),
			),
	),
		
    'view_manager' => array(
        'template_path_stack' => array(
            'adm' => __DIR__ . '/../view',
        ),
    ),
);