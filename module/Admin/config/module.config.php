<?php
/**
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2016 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Admin;

use Zend\Router\Http\Literal;
use Zend\Router\Http\Segment;
use Zend\ServiceManager\Factory\InvokableFactory;
use Interop\Container\ContainerInterface;

return [
    'router' => [
        'routes' => [
            'negocio' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/negocio[/:action][/:id]',
                    'defaults' => [
                        'controller' => Controller\NegocioController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
            'ciudad' => [
                'type'    => Segment::class,
                'options' => [
                    'route'    => '/ciudad[/:action][/:id]',
                    'defaults' => [
                        'controller' => Controller\CiudadController::class,
                        'action'     => 'index',
                    ],
                ],
            ],
        ],
    ],
    'controllers' => [
        'factories' => [
            Controller\CiudadController::class => function(ContainerInterface $sm) {
              return new Controller\CiudadController($sm);
            },
            Controller\NegocioController::class => function(ContainerInterface $sm) {
              return new Controller\NegocioController($sm);
            },
        ],
    ],
    'view_manager' => [
        'template_path_stack' => [
            __DIR__ . '/../view',
        ],
    ],
];
