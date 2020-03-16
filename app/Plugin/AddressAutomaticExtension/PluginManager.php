<?php
/*
 * This file is plugin of EC-CUBE3
 *
 * Copyright(c) 2015 Pierre-Soft All Rights Reserved.
 * http://pierre-soft.com/
 *
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */
namespace Plugin\AddressAutomaticExtension;

use Eccube\Plugin\AbstractPluginManager;

class PluginManager extends AbstractPluginManager
{
    /**
     * Image folder path (cop source)
     * @var type
     */
    protected $imgSrc;
    /**
     *Image folder path (copy destination)
     * @var type
     */
    protected $imgDst;

    public function __construct() {}

    public function install($config, $app) {}

    public function uninstall($config, $app) {}

    public function enable($config, $app) {}

    public function disable($config, $app) {}

    public function update($config, $app) {}

}
