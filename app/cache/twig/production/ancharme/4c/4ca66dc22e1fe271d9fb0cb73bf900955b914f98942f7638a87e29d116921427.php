<?php

/* Block/originNavi.twig */
class __TwigTemplate_8b98c150fac5fbd7a8f548d9aba0c5996beef24215a6c5faef14b32066d8b853 extends Twig_Template
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
        echo "<div class=\"origin-navi\">
  <div class=\"title-wrapp\">
<p class=\"contents-title font_a\">ITEM-CATEGORY</p>
  </div>
  <div class=\"origin-navi-wrapp\">
    <nav class=\"origin-navi-navigation\">
     <ul class=\"font_a origin-navi-list\">
\t\t <li class=\"origin-navi-list-item\"><a class=\"origin-navi-list-item-link\" href=\"https://ancharme.jp/listTops\">TOPS　＞</a></li>
\t\t <li class=\"origin-navi-list-item\"><a class=\"origin-navi-list-item-link\" href=\"https://ancharme.jp/listBottoms\">BOTTOMS　＞</a></li>
\t\t <li class=\"origin-navi-list-item\"><a class=\"origin-navi-list-item-link\" href=\"https://ancharme.jp/listOuter\">OUTER　＞</a></li>
\t\t <li class=\"origin-navi-list-item\"><a class=\"origin-navi-list-item-link\" href=\"https://ancharme.jp/listDress\">DRESS　＞</a></li>
\t</ul>
    </nav>
  </div>
</div>";
    }

    public function getTemplateName()
    {
        return "Block/originNavi.twig";
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
        return new Twig_Source("", "Block/originNavi.twig", "/home/ancharme/ancharme.jp/public_html/app/template/ancharme/Block/originNavi.twig");
    }
}
