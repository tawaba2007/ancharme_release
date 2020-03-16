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

use Eccube\Common\Constant;
use Eccube\Event\RenderEvent;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;

class AddressAutomaticExtension{
    private $appsys;
    private $vers="1.1";
    private $dmy3='<!--script src="//ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script-->';

    public function __construct($app){
        $git= '<script src="https://zipaddr.github.io';
        $apn= $git.'/zipaddrx.js?v='.$this->vers.    '" charset="UTF-8"></script>';
        $apn.=$git.'/eccube.js?v='.Constant::VERSION.'" charset="UTF-8"></script>';
        $apn.=$git.'/eccube_type.js" charset="UTF-8"></script>';
        $apn.=$git.'/typeauto.js" charset="UTF-8"></script>';
        $this->appsys= $apn;
    }
//Admin
    public function onRenderAdminCustomerNewBefore(FilterResponseEvent $event){
        $this->onRenderAdminOrderNewBefore($event);
    }
    public function onRenderAdminCustomerEditBefore(FilterResponseEvent $event){
        $this->onRenderAdminOrderNewBefore($event);
    }
    public function onRenderAdminOrderEditBefore(FilterResponseEvent $event){
        $this->onRenderAdminOrderNewBefore($event);
    }
    public function onRenderAdminOrderNewBefore(FilterResponseEvent $event){
        $this->html_change($event, '<span><button type="button" id="zip-search"','</span>');
    }
//Front
    public function onRenderContactBefore(FilterResponseEvent $event){
        $this->onRenderShoppingNonmemberBefore($event);
    }
    public function onRenderEntryBefore(FilterResponseEvent $event){
        $this->onRenderShoppingNonmemberBefore($event);
    }
    public function onRenderShoppingShippingEditBefore(FilterResponseEvent $event){
        $this->onRenderShoppingNonmemberBefore($event);
    }
    public function onRenderShoppingNonmemberBefore(FilterResponseEvent $event){
        $this->html_change($event, '<div class="zip-search">','</div>');
    }

    public function html_change($event, $before,$after){
        $response= $event->getResponse();
        $html= $response->getContent();
        $html= $this->moji_change_between($html,$before,$after, $this->appsys);
        $html= $this->moji_change_between($html,'<script src="//ajaxzip3','</script>', $this->dmy3);
        $response->setContent($html);
        $event->setResponse($response);
    }
    public function moji_change_between($data,$before,$after, $new){
        $block= $data;
        if( empty($before) || empty($after) ) {;}
        else {
            $block1= strstr($data, $before);
            if( !empty($block1) ) {
                $block2= strstr($block1, $after);
                if( !empty($block2) ) {
                    $block= str_replace($block2,"", $block1).$after;
                    $block= str_replace($block,$new,$data);
        }   }   }
        return $block;
    }
}
?>
