<?php
namespace IyvZF2Generic\ModuleManager;

abstract class AbstractModule
{
    protected $reflectionClass;
    protected $directory;
    protected $namespace;

    public function __construct()
    {
        $this->reflectionClass = new \ReflectionClass($this);
        $this->directory = dirname($this->reflectionClass->getFileName());
        $this->namespace = $this->reflectionClass->getNamespaceName();
    }

    public function getConfig()
    {
        return ModuleConfigLoader::load($this->directory . '/config');
    }

    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    $this->namespace => $this->directory . '/src/' . $this->namespace,
                ),
            ),
        );
    }
}
