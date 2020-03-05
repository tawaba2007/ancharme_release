<?php
/*
  * This file is part of the CssEditor plugin
  *
  * Copyright (C) >=2017 lecast system.
  * @author Tetsuji Shiro 
  *
  * このプラグインは再販売禁止です。
  */

namespace Plugin\CssEditor;

use Eccube\Application;
use Eccube\Plugin\AbstractPluginManager;
use Eccube\Entity\Master\DeviceType;
use Eccube\Common\Constant;
use Symfony\Component\Filesystem\Filesystem;
use Eccube\Util\Cache;

class PluginManager extends AbstractPluginManager
{
	private $target;
	
    public function __construct()
    {
        $this->assets = __DIR__.'/Resource/assets';
        $this->twig_file = 'item_spec_list';
        $this->block = __DIR__.'/Resource/template/Block/'.$this->twig_file.'.twig';
        $this->target = '/CssEditor';
    }
    public function install($config, $app)
    {
    }
    public function uninstall($config, $app)
    {
        $this->migrationSchema($app, __DIR__.'/Resource/doctrine/migration', $config['code'], 0);
    }
    public function enable($config, $app)
    {
		$this->migrationSchema($app, __DIR__.'/Resource/doctrine/migration', $config['code']);
    }
    public function disable($config, $app)
    {
    }
    public function update($config, $app)
    {
    }
}