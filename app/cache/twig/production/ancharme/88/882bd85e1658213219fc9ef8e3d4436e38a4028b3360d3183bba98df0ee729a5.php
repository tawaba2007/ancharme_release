<?php

/* Block/tmp_contents_block.twig */
class __TwigTemplate_da85971d3176e804b8bbc9d43cc77abb00a05272ff16ac4cd9a5346765974a71 extends Twig_Template
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
        echo "<!-- contents_block -->
<div id=\"contents_block\" class=\"template blockLayout\">
    <div class=\"section-container\">
        <div class=\"itemList_block\">
            <ul class=\"list\">
                <li class=\"list-item\">
                    <a class=\"link\" href=\"https://line.me/R/ti/p/%40462brvvy\">
                        <img src=\"";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "front_urlpath", array()), "html", null, true);
        echo "/img/banner/line.png\" class=\"list-image\">
                    </a>
                </li>
                <li class=\"list-item\">
                    <a class=\"link\" href=\"#\">
                        <img src=\"";
        // line 13
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "front_urlpath", array()), "html", null, true);
        echo "/img/banner/top_banner.jpg\" class=\"list-image\">
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- /contents_block -->";
    }

    public function getTemplateName()
    {
        return "Block/tmp_contents_block.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  36 => 13,  28 => 8,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Block/tmp_contents_block.twig", "/home/ancharme/ancharme.jp/public_html/app/template/ancharme/Block/tmp_contents_block.twig");
    }
}
