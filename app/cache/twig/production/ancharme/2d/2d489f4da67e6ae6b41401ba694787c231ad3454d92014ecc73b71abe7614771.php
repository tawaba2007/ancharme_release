<?php

/* GtmLite/Resource/template/default/gtmlite.head.twig */
class __TwigTemplate_20a85520203b691a749f3eceb2ce3c2fba83343c0fd2bdfc9c432e7dd2912aad extends Twig_Template
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
                echo "<!-- Google Tag Manager by GtmLite plugin -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','";
                // line 15
                echo twig_escape_filter($this->env, $this->getAttribute(($context["gtmlite"] ?? null), "tid", array()), "html", null, true);
                echo "');</script>
<!-- End Google Tag Manager -->
";
            }
        }
    }

    public function getTemplateName()
    {
        return "GtmLite/Resource/template/default/gtmlite.head.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  30 => 15,  23 => 10,  21 => 9,  19 => 8,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "GtmLite/Resource/template/default/gtmlite.head.twig", "/home/ancharme/ancharme.jp/public_html/app/Plugin/GtmLite/Resource/template/default/gtmlite.head.twig");
    }
}
