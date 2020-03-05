<?php

/* __string_template__c9efb0faac77a3cb078d54cdf49f9a856cace7c38bfe7f1ac0151a69a3aaf544 */
class __TwigTemplate_10fd2ebc5aa1de0f99a81ccd34ba072e468d3d851b358670e28b8df83aed4e83 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 22
        $this->parent = $this->loadTemplate("default_frame.twig", "__string_template__c9efb0faac77a3cb078d54cdf49f9a856cace7c38bfe7f1ac0151a69a3aaf544", 22);
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
                  <!-- デバイス判定 -->
                  ";
        // line 93
        if (($this->getAttribute($this->getAttribute(($context["app"] ?? null), "mobile_detect", array(), "array"), "isMobile", array()) && ($this->getAttribute($this->getAttribute(($context["app"] ?? null), "mobile_detect", array(), "array"), "isTablet", array()) == false))) {
            // line 94
            echo "                    <!-- sp -->
                    <div class=\"item\">
              <a href=\"https://ancharme.jp/products/detail/86\" class=\"item_link\" id=\"news\">
                      <img src=\"";
            // line 97
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "front_urlpath", array()), "html", null, true);
            echo "/img/top/sp_fv2000.jpg\">
                     </a>
                    </div>
                  ";
        } else {
            // line 101
            echo "      <div class=\"item\">
    
              <a href=\"https://ancharme.jp/products/detail/214\" class=\"newproduct\">
    <div class=\"item_link\">
                      <img src=\"";
            // line 105
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "front_urlpath", array()), "html", null, true);
            echo "/img/top/sp_fv2003.jpg\">
    </div>
                     </a>
                    </div>
                  ";
        }
        // line 110
        echo "
                    <div class=\"item\">
              <a href=\"https://ancharme.jp/products/detail/214\" class=\"newproduct\">
    <div class=\"item_link\">
    
                      <img src=\"";
        // line 115
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "front_urlpath", array()), "html", null, true);
        echo "/img/top/sp_fv2003.jpg\">
    </div>
                     </a>
                    </div>

                    <div class=\"item\">
                        <a href=\"https://ancharme.jp/products/detail/107\" class=\"item_link\">
              <div class=\"item_link\">
              
                                <img src=\"";
        // line 124
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "front_urlpath", array()), "html", null, true);
        echo "/img/top/sp_fv2002.jpg\">
              </div>
                               </a>
                              </div>
                              <!--
                              <div class=\"item\">
                                <a href=\"https://ancharme.jp/listBottoms\" class=\"item_link\">
                      <div class=\"item_link\">
                      
                                        <img src=\"";
        // line 133
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "front_urlpath", array()), "html", null, true);
        echo "/img/top/sp_fv07.jpg\">
                      </div>
                                       </a>
                                      </div>
-->
<!--

                                      <div class=\"item\">
                                        <a href=\"https://ancharme.jp/products/list\" class=\"item_link\">
                              <div class=\"item_link\">
                              
                                                <img src=\"";
        // line 144
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "front_urlpath", array()), "html", null, true);
        echo "/img/top/sp_fv03.jpg\">
                              </div>
                                               </a>
                                              </div>
-->
                </div>
            </div>
        </div>
    ";
    }

    public function getTemplateName()
    {
        return "__string_template__c9efb0faac77a3cb078d54cdf49f9a856cace7c38bfe7f1ac0151a69a3aaf544";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  180 => 144,  166 => 133,  154 => 124,  142 => 115,  135 => 110,  127 => 105,  121 => 101,  114 => 97,  109 => 94,  107 => 93,  101 => 89,  98 => 88,  35 => 27,  32 => 26,  28 => 22,  26 => 24,  11 => 22,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "__string_template__c9efb0faac77a3cb078d54cdf49f9a856cace7c38bfe7f1ac0151a69a3aaf544", "");
    }
}
