<?php

/* Block/footerLogo.twig */
class __TwigTemplate_49b9e6cb04dd4288cf9121fe9ff81e4e4cd784315400454f4e957dc732fb38a0 extends Twig_Template
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
        echo "<div class=\"footer_logo_area\">
        <p class=\"logo\">
          <a href=\"";
        // line 3
        echo $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getUrl("homepage");
        echo "\">
            <img src=\"";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "front_urlpath", array()), "html", null, true);
        echo "/img/top/footer_logo.svg\" alt=\"ancharme\">
          </a>
        </p>
    </div>";
    }

    public function getTemplateName()
    {
        return "Block/footerLogo.twig";
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
        return new Twig_Source("", "Block/footerLogo.twig", "/home/ancharme/ancharme.jp/public_html/app/template/ancharme/Block/footerLogo.twig");
    }
}
