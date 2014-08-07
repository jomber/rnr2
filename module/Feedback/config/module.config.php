<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'Feedback\Controller\Feedback' => 'Feedback\Controller\FeedbackController',
        ),
    ),
	'router' => array(
			'routes' => array(
					'feedback' => array(
							'type'    => 'segment',
							'options' => array(
									'route'    => '/feedback[/][:action][/:id]',
									'constraints' => array(
											'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
											'id'     => '[0-9]+',
									),
									'defaults' => array(
											'controller' => 'Feedback\Controller\Feedback',
											'action'     => 'index',
									),
							),
					),
			),
	),		
		
    'view_manager' => array(
        'template_path_stack' => array(
            'feedback' => __DIR__ . '/../view',
        ),
    ),
);