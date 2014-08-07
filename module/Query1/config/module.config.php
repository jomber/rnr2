<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Query\Controller\Query' => 'Query\Controller\QueryController',
        ),
    ),
	'router' => array(
			'routes' => array(
					'query' => array(
							'type'    => 'segment',
							'options' => array(
									'route'    => '/query[/][:action][/:id]',
									'constraints' => array(
											'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
											'id'     => '[0-9]+',
									),
									'defaults' => array(
											'controller' => 'Query\Controller\Query',
											'action'     => 'index',
									),
							),
					),
			),
	),		
		
    'view_manager' => array(
        'template_path_stack' => array(
            'query' => __DIR__ . '/../view',
        ),
    ),
);