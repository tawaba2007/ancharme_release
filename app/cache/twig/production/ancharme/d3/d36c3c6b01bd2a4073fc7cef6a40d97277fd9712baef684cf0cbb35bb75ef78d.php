<?php

/* Block/tmp_coordinate.twig */
class __TwigTemplate_0cbb92592d5a0f7fa11a8a5332e6b5e9fddf050591426f7ced382655af7504e2 extends Twig_Template
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
        echo "<!-- coordinate -->
<div id=\"coordinate\" class=\"template blockLayout original\">
\t<div class=\"section-contaner\">
\t\t<div class=\"title_block\" id=\"cordinate\">
\t\t\t<h2 class=\"title\">COORDINATE</h2>
\t\t</div>
\t\t<div class=\"itemList_block\">
\t\t\t<div class=\"itemList_list\">
                <ul class=\"list pickup_slider\">
                    <li class=\"list-item\">
                        <a class=\"link\" href=\"https://ancharme.jp/articles12_24\">
                            <img src=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "front_urlpath", array()), "html", null, true);
        echo "/img/banner/cordinate01.jpg\" class=\"list-image\">
                        </a>
                    </li>
                    <li class=\"list-item\">
                        <a class=\"link\" href=\"https://ancharme.jp/articles12_17\">
                            <img src=\"";
        // line 17
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "front_urlpath", array()), "html", null, true);
        echo "/img/banner/cordinate02.jpg\" class=\"list-image\">
                        </a>
                    </li>
                    <li class=\"list-item\">
                        <a class=\"link\" href=\"https://ancharme.jp/articles12_10\">
                            <img src=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "front_urlpath", array()), "html", null, true);
        echo "/img/banner/cordinate03.jpg\" class=\"list-image\">
                        </a>
                    </li>
                </ul>
\t\t\t</div>
\t\t</div>
\t</div>
</div>
<!-- coordinate -->";
    }

    public function getTemplateName()
    {
        return "Block/tmp_coordinate.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  48 => 22,  40 => 17,  32 => 12,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Block/tmp_coordinate.twig", "/home/ancharme/ancharme.jp/public_html/app/template/ancharme/Block/tmp_coordinate.twig");
    }
}
