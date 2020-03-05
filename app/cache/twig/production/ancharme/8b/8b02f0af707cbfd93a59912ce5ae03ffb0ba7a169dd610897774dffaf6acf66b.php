<?php

/* Block/footerNavi.twig */
class __TwigTemplate_d00aba55c6430be10dd5785394e98f53a5326f3af8ab2e4b3a7698ba7a407920 extends Twig_Template
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
        echo "<div class=\"footer-navigation\">
  <div class=\"footer-navigation-wrapp\">
    <nav>
      <ul class=\"footer-navigation-list\">
        <li class=\"footer-navigation-list-item\"><a class=\"footer-navigation-list-item-link\" href=\"https://ancharme.jp/help/privacy\">PRIVARY POLICY</a></li>
        <li class=\"footer-navigation-list-item\"><a class=\"footer-navigation-list-item-link\" href=\"https://ancharme.jp/help/tradelaw\">特定商取引に基づく表記</a></li>
<li class=\"footer-navigation-list-item\"><a class=\"footer-navigation-list-item-link\" href=\"https://ancharme.jp/contact\">CONTACT</a></li>
      </ul>
    </nav>
  </div>
</div>";
    }

    public function getTemplateName()
    {
        return "Block/footerNavi.twig";
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
        return new Twig_Source("", "Block/footerNavi.twig", "/home/ancharme/ancharme.jp/public_html/app/template/ancharme/Block/footerNavi.twig");
    }
}
