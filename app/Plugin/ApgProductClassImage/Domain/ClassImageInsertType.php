<?php

/*
 * This file is part of the ApgVideoInsert
 *
 * Copyright (C) 2018 ARCHIPELAGO Inc.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */


namespace Plugin\ApgProductClassImage\Domain;


class ClassImageInsertType
{
    const NONE = 0;
    const UNDER_SELECT_CLASS = 1;
    const SLIDERS = 2;

    static protected $names = array(
        self::NONE => '自動挿入なし',
        self::UNDER_SELECT_CLASS => '規格選択の下部(defaultテーマ用)',
        self::SLIDERS => 'スライドショー(defaultテーマ用)'
    );

    private $code;

    public function __construct($code)
    {
        $this->code = $code;
    }

    static public function getName($type = null)
    {
        $names = array(
            ClassImageInsertType::NONE => new ClassImageInsertType(ClassImageInsertType::NONE),
            ClassImageInsertType::UNDER_SELECT_CLASS => new ClassImageInsertType(ClassImageInsertType::UNDER_SELECT_CLASS),
            ClassImageInsertType::SLIDERS => new ClassImageInsertType(ClassImageInsertType::SLIDERS),
        );
        return is_null($type) ? $names : $type[$type];
    }

    static public function getDisplayName($type)
    {
        return self::$names[$type];
    }

}