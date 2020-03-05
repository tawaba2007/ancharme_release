<?php

/* Block/tmp_headerNavi.twig */
class __TwigTemplate_1a07e476b63f392ec433cc18454f09ed2a94e2c34a73f8e464fdf7f27c096206 extends Twig_Template
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
        echo "<!-- tmp_headerNavi -->
<div id=\"headerNavi\" class=\"template\">
\t<div class=\"container\">
\t\t<div class=\"list-block\">
\t\t\t<nav class=\"navigaiton\">
\t\t\t\t<ul id=\"navigation-list\" class=\"list\">
\t\t\t\t\t<li class=\"list-item\" data-pagename='front_page'>
\t\t\t\t\t\t<a class=\"link\" href=\"";
        // line 8
        echo $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getUrl("homepage");
        echo "\">
\t\t\t\t\t\t\t<figure><img src=\"";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "front_urlpath", array()), "html", null, true);
        echo "/img/icon/home-white.svg\" class=\"icon\"></figure>
\t\t\t\t\t\t\t<figcaption>TOP</figcaption>
\t\t\t\t\t\t</a>
\t\t\t\t\t</li>
\t\t\t\t\t<li class=\"list-item\" data-pagename='list'>
\t\t\t\t\t\t<a class=\"link\" href=\"https://ancharme.jp/products/list\">
\t\t\t\t\t\t\t<figure><img src=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "front_urlpath", array()), "html", null, true);
        echo "/img/icon/new-white.svg\" class=\"icon\"></figure>
\t\t\t\t\t\t\t<figcaption>新作</figcaption>
\t\t\t\t\t\t</a>
\t\t\t\t\t</li>
\t\t\t\t\t<li class=\"list-item\" data-pagename='pv-page'>
\t\t\t\t\t\t<a class=\"link\" href=\"https://ancharme.jp/pv\">
\t\t\t\t\t\t\t<figure><img src=\"";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "front_urlpath", array()), "html", null, true);
        echo "/img/icon/pv-white.svg\" class=\"icon\"></figure>
\t\t\t\t\t\t\t<figcaption>PV</figcaption>
\t\t\t\t\t\t</a>
\t\t\t\t\t</li>
\t\t\t\t\t<li class=\"list-item\" data-pagename='article'>
\t\t\t\t\t\t<a class=\"link\" href=\"#cordinate\">
\t\t\t\t\t\t\t<figure><img src=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "front_urlpath", array()), "html", null, true);
        echo "/img/icon/information-white.svg\" class=\"icon\"></figure>
\t\t\t\t\t\t\t<figcaption>記事</figcaption>
\t\t\t\t\t\t</a>
\t\t\t\t\t</li>
\t\t\t\t\t<li class=\"list-item\" data-pagename='influencer'>
\t\t\t\t\t\t<a class=\"link\" href=\"https://ancharme.jp/influencer\">
\t\t\t\t\t\t\t<figure><img src=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "front_urlpath", array()), "html", null, true);
        echo "/img/icon/pd-white.svg\" class=\"icon\"></figure>
\t\t\t\t\t\t\t<figcaption>プロデューサー</figcaption>
\t\t\t\t\t\t</a>
\t\t\t\t\t</li>
\t\t\t\t</ul>
\t\t\t</nav>
\t\t</div>
\t</div>
</div>
<!-- /tmp_headerNavi -->";
    }

    public function getTemplateName()
    {
        return "Block/tmp_headerNavi.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  68 => 33,  59 => 27,  50 => 21,  41 => 15,  32 => 9,  28 => 8,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Block/tmp_headerNavi.twig", "/home/ancharme/ancharme.jp/public_html/app/template/ancharme/Block/tmp_headerNavi.twig");
    }
}
