<?php
/**
 * Copyright (c) 2016-present, Facebook, Inc.
 * All rights reserved.
 *
 * This source code is licensed under the BSD-style license found in the
 * LICENSE file in the root directory of this source tree. An additional grant
 * of patent rights can be found in the PATENTS file in the code directory.
 */

namespace Plugin\FacebookAdsToolbox;

use Eccube\Plugin\AbstractPluginManager;

class PluginManager extends AbstractPluginManager {

    CONST VERSION = '1.0.1';

    public function install($config, $app) {
      $this->migrationSchema(
        $app,
        __DIR__ . '/Resource/doctrine/migration',
        $config['code']);
    }

    public function uninstall($config, $app) {
      $this->migrationSchema(
        $app,
        __DIR__ . '/Resource/doctrine/migration',
        $config['code'],
        0);
    }

    public function enable($config, $app) {
    }

    public function disable($config, $app) {
    }

    public function update($config, $app) {
    }
}
