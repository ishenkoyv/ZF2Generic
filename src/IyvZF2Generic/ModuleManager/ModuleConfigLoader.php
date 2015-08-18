<?php

namespace IyvZF2Generic\ModuleManager;

use Zend\Stdlib\Glob;
use Zend\Stdlib\ArrayUtils;

class ModuleConfigLoader
{
    
    protected $directory;
    protected $config;
    
    public static function load($directory)
    {
        $directory = rtrim($directory, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR;
        $pattern   = sprintf('%s*.php', $directory);
        $config    = array();
        
        foreach (Glob::glob($pattern, Glob::GLOB_BRACE) as $file) {
            if (!is_readable($file)) {
                continue;
            }
            
            $cfg    = include $file;
            $config = ArrayUtils::merge($config, $cfg);
        }
        return $config;
    }
}
