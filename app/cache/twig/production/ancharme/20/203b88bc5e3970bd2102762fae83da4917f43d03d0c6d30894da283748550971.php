<?php

/* GtmLite/Resource/template/default/gtmlite.twig */
class __TwigTemplate_6ee4f99d0c939b70d7053e9608759a792768ce8d4f45b11506f8b757c1798594 extends Twig_Template
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
        // line 8
        if ((twig_length_filter($this->env, $this->getAttribute(($context["gtmlite"] ?? null), "tid", array())) > 0)) {
            // line 9
            if (($this->getAttribute(($context["gtmlite"] ?? null), "tag", array()) == $this->getAttribute($this->getAttribute(($context["config"] ?? null), "const", array()), "GTMLITE_USE_GTM_TAG", array()))) {
                // line 10
                echo "<!-- Google Tag Manager (noscript) by GtmLite plugin -->
<noscript><iframe src=\"https://www.googletagmanager.com/ns.html?id=";
                // line 11
                echo twig_escape_filter($this->env, $this->getAttribute(($context["gtmlite"] ?? null), "tid", array()), "html", null, true);
                echo "\"
height=\"0\" width=\"0\" style=\"display:none;visibility:hidden\"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
";
            }
            // line 15
            echo "
";
            // line 16
            if (array_key_exists("event", $context)) {
                // line 17
                echo "<script>
  var dataLayer = window.dataLayer || [];
  dataLayer.push({'event': '";
                // line 19
                echo twig_escape_filter($this->env, ($context["event"] ?? null), "html", null, true);
                echo "'});
</script>
";
            }
        }
    }

    public function getTemplateName()
    {
        return "GtmLite/Resource/template/default/gtmlite.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  42 => 19,  38 => 17,  36 => 16,  33 => 15,  26 => 11,  23 => 10,  21 => 9,  19 => 8,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "GtmLite/Resource/template/default/gtmlite.twig", "/home/ancharme/ancharme.jp/public_html/app/Plugin/GtmLite/Resource/template/default/gtmlite.twig");
    }
}
