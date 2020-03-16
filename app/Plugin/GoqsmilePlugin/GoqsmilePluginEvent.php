<?php

namespace Plugin\GoqsmilePlugin;

use Eccube\Application;
use Eccube\Event\EventArgs;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\HttpKernel\Event\FilterResponseEvent;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpKernel\Event\PostResponseEvent;
use Symfony\Component\HttpFoundation\Request;
use Plugin\GoqsmilePlugin\Entity\Config;

class GoqsmilePluginEvent
{

    /** @var  \Eccube\Application $app */
    private $app;

    /**
     * GoqsmilePluginEvent constructor.
     *
     * @param Application $app
     */
    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    /**
     * get app_id from db
     */
    private function getConfig(){
      $app = $this->app;
      return $entity = $app['orm.em']->getRepository(Config::class)->getEntity(1);
    }

    /**
     * @param FilterControllerEvent $event
     */
    public function onFrontController(FilterControllerEvent $event)
    {
    }

    /**
     * @param FilterResponseEvent $event
     */
    public function onFrontResponse(FilterResponseEvent $event)
    {
      $app = $this->app;
      $is_front = $app['front'];
      $response = $event->getResponse();
      $config = $this->getConfig();
      $request = $event->getRequest();
      $is_show_snippet = true;

      if($is_show_snippet && $is_front){
        $html = $response->getContent();
        $app_id = "";
        if($config)
          $app_id = $config->getAppId();
        $replace = $app->renderView('GoqsmilePlugin\Resource\template\script\snippet.twig', array(
          'app_id' => $app_id
        ));
        $html = $html.$replace;
        $response->setContent($html);
        $event->setResponse($response);
      }
    }

    /**
     * @param FilterResponseEvent $event
     */
    public function onAdminController(FilterControllerEvent $event)
    {
    }
}
