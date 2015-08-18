<?php
namespace IyvZF2Generic;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Doctrine\Common\Annotations\AnnotationRegistry;

class Module
{
    public function getConfig()
    {
        return include __DIR__ . '/config/service.php';
    }

    public function getAutoloaderConfig()
    {
        AnnotationRegistry::registerAutoloadNamespace(__NAMESPACE__, __DIR__ . '/src/');
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
}
