<?php

/* __string_template__3a873a3b0849c63d81ab35c3573ab65284dfe18b8ccab9f90240d3f44f0d7495 */
class __TwigTemplate_7830937c03a200ac4092d0620f3cc7a2f0ac09f86fe879e025fe4fb37ede7914 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 22
        $this->parent = $this->loadTemplate("default_frame.twig", "__string_template__3a873a3b0849c63d81ab35c3573ab65284dfe18b8ccab9f90240d3f44f0d7495", 22);
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
        $context["body_class"] = "product_page";
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
          <h1 class=\"page-title-h1\">TOPS</h1>
         
      </div>
    </div>
    <!-- ▲topicpath▲ -->
";
    }

    public function getTemplateName()
    {
        return "__string_template__3a873a3b0849c63d81ab35c3573ab65284dfe18b8ccab9f90240d3f44f0d7495";
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
        return new Twig_Source("", "__string_template__3a873a3b0849c63d81ab35c3573ab65284dfe18b8ccab9f90240d3f44f0d7495", "");
    }
}
