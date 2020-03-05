<?php

/*
 * This file is part of the ApgProductClassImage
 *
 * Copyright (C) 2018 ARCHIPELAGO Inc.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Plugin\ApgProductClassImage\Logic;

use Eccube\Event\EventArgs;
use Silex\Application as BaseApplication;

/**
 * Class BaseEventLogic
 * @package Plugin\ApgProductClassImage\Logic
 *
 * イベント発火系処理
 */
abstract class BaseEventLogic
{
    protected $app;

    public function __construct(BaseApplication $app)
    {
        $this->app = $app;
    }

    abstract function execute(EventArgs $event);

}