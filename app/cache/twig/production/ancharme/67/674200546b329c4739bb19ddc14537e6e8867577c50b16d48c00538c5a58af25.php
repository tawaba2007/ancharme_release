<?php

/* Block/footer.twig */
class __TwigTemplate_2cb2cc63d544edaed3a8d245780dee2bfac2333c6ffab73ca134b1428a97519f extends Twig_Template
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
        // line 22
        echo "<div class=\"container-fluid inner\">
    <div class=\"footer_logo_area\">
        <p class=\"copyright\">
            <small>copyright (c) ";
        // line 25
        echo twig_escape_filter($this->env, $this->getAttribute(($context["BaseInfo"] ?? null), "shop_name", array()), "html", null, true);
        echo " </small>
        </p>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "Block/footer.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  24 => 25,  19 => 22,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Block/footer.twig", "/home/ancharme/ancharme.jp/public_html/app/template/ancharme/Block/footer.twig");
    }
}
