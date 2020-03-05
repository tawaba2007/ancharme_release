<?php

/* Block/sns.twig */
class __TwigTemplate_9d37a91d3547351c3af669ae661dee69ab15152e6ea91a799db94e859b4836d1 extends Twig_Template
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
        echo "<div class=\"sns\">
  <div class=\"sns-button-wrapper\">
    <a href=\"https://www.instagram.com/ancharme_official/\" class=\"sns-link\"><img src=\"";
        // line 3
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "front_urlpath", array()), "html", null, true);
        echo "/img/top/footer_insta.png\" class=\"sns-button-img\"></a>
    <a href=\"https://line.me/R/ti/p/%40462brvvy\" class=\"sns-link\"><img src=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "front_urlpath", array()), "html", null, true);
        echo "/img/top/footer_line.png\" class=\"sns-button-img\"></a>
  </div>
</div>";
    }

    public function getTemplateName()
    {
        return "Block/sns.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  27 => 4,  23 => 3,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Block/sns.twig", "/home/ancharme/ancharme.jp/public_html/app/template/ancharme/Block/sns.twig");
    }
}
