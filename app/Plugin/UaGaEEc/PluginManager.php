<?php
/*
 * UaGaEEc: Google Analytics eコマース/拡張eコマース対応プラグイン
 * Copyright (C) 2016-2017 Freischtide Inc. All Rights Reserved.
 * http://freischtide.tumblr.com/
 *
 * License: see LICENSE.txt
 */

namespace Plugin\UaGaEEc;

use Eccube\Plugin\AbstractPluginManager;

class PluginManager extends AbstractPluginManager
{
    public function install($config, $app)
    {
        $this->migrationSchema($app, __DIR__ . '/Migration', $config['code']);
    }

    public function uninstall($config, $app)
    {
        $this->migrationSchema($app, __DIR__ . '/Migration', $config['code'], 0);
    }

    public function enable($config, $app)
    {
    }

    public function disable($config, $app)
    {
    }

    public function update($config, $app)
    {
        $this->migrationSchema($app, __DIR__ . '/Migration', $config['code']);
    }
}
