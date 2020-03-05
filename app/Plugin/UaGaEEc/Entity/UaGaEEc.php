<?php
/*
 * UaGaEEc: Google Analytics eコマース/拡張eコマース対応プラグイン
 * Copyright (C) 2016-2017 Freischtide Inc. All Rights Reserved.
 * http://freischtide.tumblr.com/
 *
 * License: see LICENSE.txt
 */

namespace Plugin\UaGaEEc\Entity;

class UaGaEEc extends \Eccube\Entity\AbstractEntity
{
    /**
     * @return string
     */
    public function __toString()
    {
        return $this->getName();
    }

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $code;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $tid;

    /**
     * @var integer
     */
    private $eec;

    /**
     * @var integer
     */
    private $category;

    /**
     * @var integer
     */
    private $include_variant;

    /**
     * @var integer
     */
    private $track_user_id;

    /**
     * @var string
     */
    private $uid;

    /**
     * @var integer
     */
    private $display_features;

    /**
     * @var integer
     */
    private $user_timings;

    /**
     * @var integer
     */
    private $imp_track;

    /**
     * @var string
     */
    private $crossdomain_linker;

    /**
     * @var integer
     */
    private $use_custom_referrer;

    /**
     * @var string
     */
    private $custom_referrers;

    /**
     * @var array
     */
    private $custom_referrer1 = array('k' => '', 'v' => '');

    /**
     * @var array
     */
    private $custom_referrer2 = array('k' => '', 'v' => '');

    /**
     * @var array
     */
    private $custom_referrer3 = array('k' => '', 'v' => '');

    /**
     * @var array
     */
    private $custom_referrer4 = array('k' => '', 'v' => '');

    /**
     * @var array
     */
    private $custom_referrer5 = array('k' => '', 'v' => '');

    /**
     * @var array
     */
    private $custom_referrer6 = array('k' => '', 'v' => '');

    /**
     * @var array
     */
    private $custom_referrer7 = array('k' => '', 'v' => '');

    /**
     * @var array
     */
    private $custom_referrer8 = array('k' => '', 'v' => '');

    /**
     * @var \DateTime
     */
    private $create_date;

    /**
     * @var \DateTime
     */
    private $update_date;

    /**
     * @var array
     */
    private $promo;

    /**
     * @var string
     */
    private $click;


    /**
     * Constructor
     */
    public function __construct()
    {
    }

    /**
     * Set id
     *
     * @param  integer $id
     * @return Module
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set code
     *
     * @param  string $code
     * @return Module
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set name
     *
     * @param  string $name
     * @return Module
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set tid
     *
     * @param  string $tid
     * @return Module
     */
    public function setTid($tid)
    {
        $this->tid = $tid;

        return $this;
    }

    /**
     * Get tid
     *
     * @return string
     */
    public function getTid()
    {
        return $this->tid;
    }

    /**
     * Set eec
     *
     * @param  integer $eec
     * @return Module
     */
    public function setEec($eec)
    {
        $this->eec = $eec;

        return $this;
    }

    /**
     * Get eec
     *
     * @return string
     */
    public function getEec()
    {
        return $this->eec;
    }

    /**
     * Set category
     *
     * @param  string $category
     * @return Module
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set include_variant
     *
     * @param  integer $include_variant
     * @return Module
     */
    public function setIncludeVariant($include_variant)
    {
        $this->include_variant = $include_variant;

        return $this;
    }

    /**
     * Get include_variant
     *
     * @return integer
     */
    public function getIncludeVariant()
    {
        return $this->include_variant;
    }

    /**
     * Set track_user_id
     *
     * @param  integer $track_user_id
     * @return Module
     */
    public function setTrackUserId($track_user_id)
    {
        $this->track_user_id = $track_user_id;

        return $this;
    }

    /**
     * Get track_user_id
     *
     * @return integer
     */
    public function getTrackUserId()
    {
        return $this->track_user_id;
    }

    /**
     * Set uid
     *
     * @param  string $uid
     * @return Module
     */
    public function setUID($uid)
    {
        $this->uid = $uid;

        return $this;
    }

    /**
     * Get uid
     *
     * @return string
     */
    public function getUID()
    {
        return $this->uid;
    }

    /**
     * Set display_features
     *
     * @param  integer $display_features
     * @return Module
     */
    public function setDisplayFeatures($display_features)
    {
        $this->display_features = $display_features;

        return $this;
    }

    /**
     * Get display_features
     *
     * @return integer
     */
    public function getDisplayFeatures()
    {
        return $this->display_features;
    }

    /**
     * Set user_timings
     *
     * @param  integer $user_timings
     * @return Module
     */
    public function setUserTimings($user_timings)
    {
        $this->user_timings = $user_timings;

        return $this;
    }

    /**
     * Get user_timings
     *
     * @return integer
     */
    public function getUserTimings()
    {
        return $this->user_timings;
    }

    /**
     * Set imp_track
     *
     * @param  integer $imp_track
     * @return Module
     */
    public function setImpTrack($imp_track)
    {
        $this->imp_track = $imp_track;

        return $this;
    }

    /**
     * Get imp_track
     *
     * @return integer
     */
    public function getImpTrack()
    {
        return $this->imp_track;
    }

    /**
     * Set crossdomain_linker
     *
     * @param  string $crossdomain_linker
     * @return Module
     */
    public function setCrossdomainLinker($crossdomain_linker)
    {
        $this->crossdomain_linker = $crossdomain_linker;

        return $this;
    }

    /**
     * Get crossdomain_linker
     *
     * @return string
     */
    public function getCrossdomainLinker()
    {
        return $this->crossdomain_linker;
    }

    /**
     * Set use_custom_referrer
     *
     * @param  integer $use_custom_referrer
     * @return Module
     */
    public function setUseCustomReferrer($use_custom_referrer)
    {
        $this->use_custom_referrer = $use_custom_referrer;

        return $this;
    }

    /**
     * Get use_custom_referrer
     *
     * @return integer
     */
    public function getUseCustomReferrer()
    {
        return $this->use_custom_referrer;
    }

    /**
     * Set custom_referrers
     *
     * @param  string $custom_referrers
     * @return Module
     */
    public function setCustomReferrers($custom_referrer_keys, $custom_referrer_values)
    {
        $custom_referrers = array_map(null, $custom_referrer_keys, $custom_referrer_values); // zip($custom_referrer_keys, $custom_referrer_values)
        $this->custom_referrers = json_encode($custom_referrers);

        return $this;
    }

    /**
     * Get custom_referrers
     *
     * @return string
     */
    public function getCustomReferrers()
    {
        $custom_referrers = json_decode($this->custom_referrers, true);

        for ($i = 0; $i < 8; $i++) {
            if (!empty($custom_referrers[$i])) {
                $setCustomReferrer = 'setCustomReferrer' . ($i + 1);
                $this->$setCustomReferrer($custom_referrers[$i]);
            }
        }

        return $custom_referrers;
    }

    /**
     * Set custom_referrer1
     *
     * @param  array $custom_referrer
     * @return Module
     */
    public function setCustomReferrer1($custom_referrer)
    {
        $this->custom_referrer1['k'] = $custom_referrer[0];
        $this->custom_referrer1['v'] = $custom_referrer[1];

        return $this;
    }

    /**
     * Get custom_referrer1
     *
     * @return array
     */
    public function getCustomReferrer1()
    {
        return $this->custom_referrer1;
    }

    /**
     * Set custom_referrer2
     *
     * @param  array $custom_referrer
     * @return Module
     */
    public function setCustomReferrer2($custom_referrer)
    {
        $this->custom_referrer2['k'] = $custom_referrer[0];
        $this->custom_referrer2['v'] = $custom_referrer[1];

        return $this;
    }

    /**
     * Get custom_referrer2
     *
     * @return array
     */
    public function getCustomReferrer2()
    {
        return $this->custom_referrer2;
    }

    /**
     * Set custom_referrer3
     *
     * @param  array $custom_referrer
     * @return Module
     */
    public function setCustomReferrer3($custom_referrer)
    {
        $this->custom_referrer3['k'] = $custom_referrer[0];
        $this->custom_referrer3['v'] = $custom_referrer[1];

        return $this;
    }

    /**
     * Get custom_referrer3
     *
     * @return array
     */
    public function getCustomReferrer3()
    {
        return $this->custom_referrer3;
    }

    /**
     * Set custom_referrer4
     *
     * @param  array $custom_referrer
     * @return Module
     */
    public function setCustomReferrer4($custom_referrer)
    {
        $this->custom_referrer4['k'] = $custom_referrer[0];
        $this->custom_referrer4['v'] = $custom_referrer[1];

        return $this;
    }

    /**
     * Get custom_referrer4
     *
     * @return array
     */
    public function getCustomReferrer4()
    {
        return $this->custom_referrer4;
    }

    /**
     * Set custom_referrer5
     *
     * @param  array $custom_referrer
     * @return Module
     */
    public function setCustomReferrer5($custom_referrer)
    {
        $this->custom_referrer5['k'] = $custom_referrer[0];
        $this->custom_referrer5['v'] = $custom_referrer[1];

        return $this;
    }

    /**
     * Get custom_referrer5
     *
     * @return array
     */
    public function getCustomReferrer5()
    {
        return $this->custom_referrer5;
    }

    /**
     * Set custom_referrer6
     *
     * @param  array $custom_referrer
     * @return Module
     */
    public function setCustomReferrer6($custom_referrer)
    {
        $this->custom_referrer6['k'] = $custom_referrer[0];
        $this->custom_referrer6['v'] = $custom_referrer[1];

        return $this;
    }

    /**
     * Get custom_referrer6
     *
     * @return array
     */
    public function getCustomReferrer6()
    {
        return $this->custom_referrer6;
    }

    /**
     * Set custom_referrer7
     *
     * @param  array $custom_referrer
     * @return Module
     */
    public function setCustomReferrer7($custom_referrer)
    {
        $this->custom_referrer7['k'] = $custom_referrer[0];
        $this->custom_referrer7['v'] = $custom_referrer[1];

        return $this;
    }

    /**
     * Get custom_referrer7
     *
     * @return array
     */
    public function getCustomReferrer7()
    {
        return $this->custom_referrer7;
    }

    /**
     * Set custom_referrer8
     *
     * @param  array $custom_referrer
     * @return Module
     */
    public function setCustomReferrer8($custom_referrer)
    {
        $this->custom_referrer8['k'] = $custom_referrer[0];
        $this->custom_referrer8['v'] = $custom_referrer[1];

        return $this;
    }

    /**
     * Get custom_referrer8
     *
     * @return array
     */
    public function getCustomReferrer8()
    {
        return $this->custom_referrer8;
    }

    /**
     * Set create_date
     *
     * @param  \DateTime $createDate
     * @return Module
     */
    public function setCreateDate($createDate)
    {
        $this->create_date = $createDate;

        return $this;
    }

    /**
     * Get create_date
     *
     * @return \DateTime
     */
    public function getCreateDate()
    {
        return $this->create_date;
    }

    /**
     * Set update_date
     *
     * @param  \DateTime $updateDate
     * @return Module
     */
    public function setUpdateDate($updateDate)
    {
        $this->update_date = $updateDate;

        return $this;
    }

    /**
     * Get update_date
     *
     * @return \DateTime
     */
    public function getUpdateDate()
    {
        return $this->update_date;
    }

    /**
     * Set promo
     *
     * @param  string $id
     * @param  string $name
     * @param  string $creative
     * @param  string $position
     * @return Module
     */
    public function setPromo($id, $name, $creative, $position)
    {
        $this->promo = array('id' => $id,
                             'name' => $name,
                             'creative' => $creative,
                             'position' => $position);

        return $this;
    }

    /**
     * Get promo
     *
     * @return array
     */
    public function getPromo()
    {
        return $this->promo;
    }

    /**
     * Set click
     *
     * @param  string $click
     * @return Module
     */
    public function setClick($click)
    {
        $this->click = $click;

        return $this;
    }

    /**
     * Get click
     *
     * @return array
     */
    public function getClick()
    {
        return $this->click;
    }
}
