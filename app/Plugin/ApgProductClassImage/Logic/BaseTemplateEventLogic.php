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

use Eccube\Event\TemplateEvent;
use Silex\Application as BaseApplication;

/**
 * Class BaseTemplateEventLogic
 * @package Plugin\ApgProductClassImage\Logic
 *
 * レンダー発火系処理
 */
abstract class BaseTemplateEventLogic
{
    protected $app;

    public function __construct(BaseApplication $app)
    {
        $this->app = $app;
    }

    abstract function execute(TemplateEvent $event);

}