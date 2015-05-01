<?php
return array(

	'controllers' =>array(
		'invokables' => array(
		 'Todos\Controller\Todos' => 'Todos\Controller\TodosController',
		 ),
		),
		'view_manager' => array(
			'template_path_stack' => array(
				'todos' => __DIR__ . '/../view',
			),
		),
		'router' => array(
     	   'routes' => array(
        	   'todos' => array(
            	   'type' => 'segment',
                	'options' => array(
                    	'route' => '/todos[/:action][/:id]',
                    	'constraints' => array(
                        	'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
                        	'id' => '[0-9]+',
                    	),
                    	'defaults' => array(
                        'controller' => 'Todos\Controller\Todos',
                        'action' => 'index',
                    ),
                ),
            ),
        ),
    ),
);

// <?php
// return array(
//      'invokables' => array(
//             'Todos\Controller\Todos' => 'Todos\Controller\TodosController',
//         ),
    
//     'router' => array(
//         'routes' => array(
//             'todos' => array(
//                 'type' => 'segment',
//                 'options' => array(
//                     'route' => '/todos[/:action][/:id]',
//                     'constraints' => array(
//                         'action' => '[a-zA-Z][a-zA-Z0-9_-]*',
//                         'id' => '[0-9]+',
//                     ),
//                     'defaults' => array(
//                         'controller' => 'Todos\Controller\Todos',
//                         'action' => 'index',
//                     ),
//                 ),
//             ),
//         ),
//     ),
//     'view_manager' => array(
//         'template_path_stack' => array(
//             'todos' => __DIR__ . '/../view',
//         ),
//     ),
// );