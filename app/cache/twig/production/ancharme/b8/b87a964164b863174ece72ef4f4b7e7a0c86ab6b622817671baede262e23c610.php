<?php

/* GoqsmilePlugin\Resource\template\script\snippet.twig */
class __TwigTemplate_35d5c02c198637853fd71eb135af4e67d91536e2890b8a30e6a175d925cb0e54 extends Twig_Template
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
        echo "<script src=\"//ai.goqsystem.com/api/chatbox?appid=";
        echo twig_escape_filter($this->env, ($context["app_id"] ?? null), "html", null, true);
        echo "\" type=\"text/javascript\"></script>";
    }

    public function getTemplateName()
    {
        return "GoqsmilePlugin\\Resource\\template\\script\\snippet.twig";
    }

    public function isTraitable()
    {
        return false;
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
        return new Twig_Source("", "GoqsmilePlugin\\Resource\\template\\script\\snippet.twig", "/home/ancharme/ancharme.jp/public_html/app/Plugin/GoqsmilePlugin/Resource/template/script/snippet.twig");
    }
}
