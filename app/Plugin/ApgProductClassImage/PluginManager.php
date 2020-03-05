<?php

/*
 * This file is part of the ApgProductClassImage
 *
 * Copyright (C) 2018 ARCHIPELAGO Inc.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\ApgProductClassImage;

use Eccube\Application;
use Eccube\Plugin\AbstractPluginManager;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Symfony\Component\Filesystem\Filesystem;

class PluginManager extends AbstractPluginManager
{

    private $defaultJs = array(
        'default.js',
    );
    private $defaultCss = array(
        'default.css',
    );

    /**
     * プラグインインストール時の処理
     *
     * @param $config
     * @param Application $app
     * @throws \Exception
     */
    public function install($config, Application $app)
    {
    }

    /**
     * プラグイン削除時の処理
     *
     * @param $config
     * @param Application $app
     */
    public function uninstall($config, Application $app)
    {
        $d = DIRECTORY_SEPARATOR;
        $this->migrationSchema($app, __DIR__ . $d . 'Resource' . $d . 'doctrine' . $d . 'migration', $config['code'], 0);

        $fileSystem = new Filesystem();
        $dist = $app['config']['plugin_html_realdir'] . $d . 'apg_product_class_image';
        $fileSystem->remove($dist);
    }

    /**
     * プラグイン有効時の処理
     *
     * @param $config
     * @param Application $app
     * @throws \Exception
     */
    public function enable($config, Application $app)
    {
        $d = DIRECTORY_SEPARATOR;
        $this->migrationSchema($app, __DIR__ . $d . 'Resource' . $d . 'doctrine' . $d . 'migration', $config['code']);
        $fileSystem = new Filesystem();
        try {
            $org = __DIR__ . $d . 'Resource' . $d . 'assets' . $d . 'js' . $d;
            $dist = $app['config']['plugin_html_realdir'] . $d . 'apg_product_class_image' . $d . 'js' . $d;
            foreach ($this->defaultJs as $js) {
                $fileSystem->copy($org . $js, $dist . $js, true);
            }

            $org = __DIR__ . $d . 'Resource' . $d . 'assets' . $d . 'css' . $d;
            $dist = $app['config']['plugin_html_realdir'] . $d . 'apg_product_class_image' . $d . 'css' . $d;
            foreach ($this->defaultCss as $css) {
                $fileSystem->copy($org . $css, $dist . $css, true);
            }

        } catch (IOExceptionInterface $exception) {
            echo "An error occurred while creating your directory at " . $exception->getPath();
        }
    }

    /**
     * プラグイン無効時の処理
     *
     * @param $config
     * @param Application $app
     * @throws \Exception
     */
    public function disable($config, Application $app)
    {
        $d = DIRECTORY_SEPARATOR;
        $fileSystem = new Filesystem();
        $dist = $app['config']['plugin_html_realdir'] . $d . 'apg_product_class_image';
        $fileSystem->remove($dist);
    }

    /**
     * プラグイン更新時の処理
     *
     * @param $config
     * @param Application $app
     * @throws \Exception
     */
    public function update($config, Application $app)
    {
    }

}
