<?php

/* __string_template__dcd19f7bf0c0e30f3aa3f5bdd5de8308f5aa848f5dc6d25dd771380186dbd42d */
class __TwigTemplate_dcc1c5d39f20683f42e79237c3bbe7adc6c63640ce57f8319153a4f6ee0aa0a6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 22
        $this->parent = $this->loadTemplate("default_frame.twig", "__string_template__dcd19f7bf0c0e30f3aa3f5bdd5de8308f5aa848f5dc6d25dd771380186dbd42d", 22);
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
        $context["body_class"] = "product_page article";
        // line 22
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 26
    public function block_javascript($context, array $blocks = array())
    {
        // line 27
        echo "    <script>
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
        echo "    <!-- ▼topicpath▼ -->
    <div id=\"topicpath\" class=\"row\">
      <div id=\"item-list\" class=\"page-vision\">
          <h1 class=\"page-title-h1\">Coordinate Content</h1>
         
      </div>
    </div>
    <!-- ▲topicpath▲ -->
";
    }

    public function getTemplateName()
    {
        return "__string_template__dcd19f7bf0c0e30f3aa3f5bdd5de8308f5aa848f5dc6d25dd771380186dbd42d";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  61 => 49,  58 => 48,  35 => 27,  32 => 26,  28 => 22,  26 => 24,  11 => 22,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "__string_template__dcd19f7bf0c0e30f3aa3f5bdd5de8308f5aa848f5dc6d25dd771380186dbd42d", "");
    }
}
