<?php

/* __string_template__971bd885e9bb89853db781873a5a4703dd2d0708bd0932bc013e78a18e0ac348 */
class __TwigTemplate_9db1cf53ef76e3971156c55e27881cfb8659c5ccf5053a6368a72dfbd16acbcf extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 22
        $this->parent = $this->loadTemplate("default_frame.twig", "__string_template__971bd885e9bb89853db781873a5a4703dd2d0708bd0932bc013e78a18e0ac348", 22);
        $this->blocks = array(
            'javascript' => array($this, 'block_javascript'),
            'main' => array($this, 'block_main'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "default_frame.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 24
        $context["body_class"] = "front_page";
        // line 22
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 26
    public function block_javascript($context, array $blocks = array())
    {
        // line 27
        echo "<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');

fbq('init', '515063142397766', {}, {agent:'execcube-3.0.17-1.0.1'});

fbq('track', 'PageView', {\"agent\":\"execcube-3.0.17-1.0.1\"});
</script>
<!-- End Facebook Pixel Code -->
    <!--\t
    <script>\t\t
    \$(function(){
    \$('.main_visual').on('init', function(event, slick) {
        \$(this).append('<div class=\"slick-counter\"><span class=\"current\"></span> / <span class=\"total\"></span></div>');
        \$('.current').text(slick.currentSlide + 1);
        \$('.total').text(slick.slideCount);
      })
      .slick({
        // option here...
        dots: true,
    arrows: false,
    autoplay: true,
    speed: 300
      })
      .on('beforeChange', function(event, slick, currentSlide, nextSlide) {
        \$('.current').text(nextSlide + 1);
      });
    });
    </script>
    -->
    
    
    <script>
    \$(function(){
    \$('.main_visual').slick({
    dots: true,
    arrows: false,
    autoplay: true,
    speed: 300,
    
    });
    });
    
    \$(function(){
    \$('.pickup_slider').slick({
    dots: false,
    arrows: false,
    autoplay: true,
    speed: 300,
    centerMode: true,
    centerPadding: '10%',
    });
    });
    </script>
    
    ";
    }

    // line 88
    public function block_main($context, array $blocks = array())
    {
        // line 89
        echo "        <div class=\"row\">
           <div class=\"col-sm-12\">
                <div class=\"main_visual\">
                  <div class=\"item\">
                    <a href=\"#\" class=\"item_link\" id=\"news\">
                      <img src=\"";
        // line 94
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "front_urlpath", array()), "html", null, true);
        echo "/img/top/sp_fv0125.jpg\">
                    </a>
                  </div>
                </div>
            </div>
        </div>
    ";
    }

    public function getTemplateName()
    {
        return "__string_template__971bd885e9bb89853db781873a5a4703dd2d0708bd0932bc013e78a18e0ac348";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  108 => 94,  101 => 89,  98 => 88,  35 => 27,  32 => 26,  28 => 22,  26 => 24,  11 => 22,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "__string_template__971bd885e9bb89853db781873a5a4703dd2d0708bd0932bc013e78a18e0ac348", "");
    }
}
