<?php

namespace Plugin\GmoEpsilon;

use Eccube\Plugin\AbstractPluginManager;
use Symfony\Component\Filesystem\Filesystem;

class PluginManager extends AbstractPluginManager
{

    public function __construct()
    {
        // コピー元のディレクトリ
        $this->origin = __DIR__ . '/Resource/assets';
        // コピー先のディレクトリ
        $this->target = __DIR__ . '/../../../html';
    }

    public function install($config, $app)
    {
        $this->migrationSchema($app, __DIR__ . '/Migration', $config['code']);

        // リソースファイルのコピー
        $this->copyAssets();
    }

    public function uninstall($config, $app)
    {
        $this->migrationSchema($app, __DIR__ . '/Migration', $config['code'], 0);

        // リソースファイルの削除
        $this->removeAssets();
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

        // リソースファイルのコピー
        $this->copyAssets();
    }

    /**
     * ファイルをコピー
     */
    private function copyAssets()
    {
        $file = new Filesystem();
        $file->mirror($this->origin, $this->target);
    }

    /**
     * コピーしたファイルを削除
     */
    private function removeAssets()
    {
        $file = new Filesystem();
        $file->remove($this->target . '/epsilon_recv.php');
        $file->remove($this->target . '/epsilon_pay_complete.php');
    }

}
