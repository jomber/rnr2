<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Review\Controller\Review' => 'Review\Controller\ReviewController',
        ),
    ),
	'router' => array(
			'routes' => array(
					'review' => array(
							'type'    => 'segment',
							'options' => array(
									'route'    => '/review[/][:action][/:id]',
									'constraints' => array(
											'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
											'id'     => '[0-9]+',
									),
									'defaults' => array(
											'controller' => 'Review\Controller\Review',
											'action'     => 'index',
									),
							),
					),
			),
	),		
		
    'view_manager' => array(
        'template_path_stack' => array(
            'review' => __DIR__ . '/../view',
        ),
    ),
);