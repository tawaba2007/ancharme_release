<?php

/* GmoEpsilon/Twig/shopping/next_cart_button.twig */
class __TwigTemplate_529bae4ffb0ca2a41e2887ed8cbb849f149c42506cf18660a28b50f2d26f5bef extends Twig_Template
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
        echo "
<button type=\"submit\" class=\"btn btn-primary btn-block\">次へ</button>
";
    }

    public function getTemplateName()
    {
        return "GmoEpsilon/Twig/shopping/next_cart_button.twig";
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
        return new Twig_Source("", "GmoEpsilon/Twig/shopping/next_cart_button.twig", "/home/ancharme/ancharme.jp/public_html/app/Plugin/GmoEpsilon/Twig/shopping/next_cart_button.twig");
    }
}
