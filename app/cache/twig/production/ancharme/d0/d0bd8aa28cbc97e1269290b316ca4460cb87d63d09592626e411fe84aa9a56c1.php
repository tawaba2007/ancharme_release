<?php

/* __string_template__a3db832110728e9befecf048170757aa1e489ee55784cad51eaa0dd5b1bd1f0e */
class __TwigTemplate_2ff3718f64e4884ba1c6772ae47c9654d4c309a0c227c3d74187a46374d8cc0c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 22
        $this->parent = $this->loadTemplate("default_frame.twig", "__string_template__a3db832110728e9befecf048170757aa1e489ee55784cad51eaa0dd5b1bd1f0e", 22);
        $this->blocks = array(
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
        $context["body_class"] = "product_page pv-page";
        // line 22
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 26
    public function block_main($context, array $blocks = array())
    {
        // line 27
        echo "<!-- ▼topicpath▼ -->
<div id=\"topicpath\" class=\"row\">
</div>
<!-- ▲topicpath▲ -->
";
    }

    public function getTemplateName()
    {
        return "__string_template__a3db832110728e9befecf048170757aa1e489ee55784cad51eaa0dd5b1bd1f0e";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  34 => 27,  31 => 26,  27 => 22,  25 => 24,  11 => 22,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "__string_template__a3db832110728e9befecf048170757aa1e489ee55784cad51eaa0dd5b1bd1f0e", "");
    }
}
