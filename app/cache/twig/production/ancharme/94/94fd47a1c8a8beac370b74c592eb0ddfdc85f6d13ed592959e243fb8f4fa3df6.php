<?php

/* Block/fb_eccomerce.twig */
class __TwigTemplate_213dc5ac243d1590292de1667677707c994414d1da51c6b602017506c27521b1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!-- Facebook Pixel Code -->
<script>
  !function(f,b,e,v,n,t,s)
  {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};
  if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version=‘2.0’;
  n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];
  s.parentNode.insertBefore(t,s)}(window, document,‘script’,
  ‘https://connect.facebook.net/en_US/fbevents.js’);
  fbq(‘init’, ‘2371111503017333’);
  fbq(‘track’, ‘PageView’);

  fbq('track', 'Purchase', {value: 0.00, currency: 'JPY'});
</script>
<noscript><img height=“1” width=“1\" style=“display:none”
  src=“https://www.facebook.com/tr?id=2371111503017333&ev=PageView&noscript=1”
/></noscript>
<!-- End Facebook Pixel Code -->";
    }

    public function getTemplateName()
    {
        return "Block/fb_eccomerce.twig";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Block/fb_eccomerce.twig", "/home/ancharme/ancharme.jp/public_html/app/template/ancharme/Block/fb_eccomerce.twig");
    }
}
