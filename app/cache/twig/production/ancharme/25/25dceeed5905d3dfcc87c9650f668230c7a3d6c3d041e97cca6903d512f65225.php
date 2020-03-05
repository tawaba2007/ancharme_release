<?php

/* __string_template__fe452b8bf3b547c39839a15613412ffc57026925c71af40128d7c1b87b7b70eb */
class __TwigTemplate_fd2ffc540da0dfe263516e225a74f9e43ff1628ab652b460dbfa9c2aa733a7b8 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 22
        $this->parent = $this->loadTemplate("default_frame.twig", "__string_template__fe452b8bf3b547c39839a15613412ffc57026925c71af40128d7c1b87b7b70eb", 22);
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
        $context["body_class"] = "product_page influencer";
        // line 22
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 26
    public function block_javascript($context, array $blocks = array())
    {
        // line 27
        echo "        <script>
            // 並び順を変更
            function fnChangeOrderBy(orderby) {
                eccube.setValue('orderby', orderby);
                eccube.setValue('pageno', 1);
                eccube.submitForm();
            }
    
            // 表示件数を変更
            function fnChangeDispNumber(dispNumber) {
                eccube.setValue('disp_number', dispNumber);
                eccube.setValue('pageno', 1);
                eccube.submitForm();
            }
            // 商品表示BOXの高さを揃える
            \$(window).load(function() {
                \$('.product_item').matchHeight();
            });
        </script>
    ";
    }

    // line 48
    public function block_main($context, array $blocks = array())
    {
        // line 49
        echo "        <!-- ▼topicpath▼ -->
        <div id=\"topicpath\" class=\"row\">
          <div id=\"item-list\" class=\"page-vision\">
    <div class=\"caution\">
    <div class=\"footer_logo_area\">

                <img src=\"";
        // line 55
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "front_urlpath", array()), "html", null, true);
        echo "/img/top/influencer02.jpg\" alt=\"ancharme\">

    
        </div>
        
    
          </div>
    </div>
        </div>
        <!-- ▲topicpath▲ -->
    ";
    }

    public function getTemplateName()
    {
        return "__string_template__fe452b8bf3b547c39839a15613412ffc57026925c71af40128d7c1b87b7b70eb";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  69 => 55,  61 => 49,  58 => 48,  35 => 27,  32 => 26,  28 => 22,  26 => 24,  11 => 22,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "__string_template__fe452b8bf3b547c39839a15613412ffc57026925c71af40128d7c1b87b7b70eb", "");
    }
}
