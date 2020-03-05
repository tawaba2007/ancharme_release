<?php

/* __string_template__00fb754924e67e8fa7d22514ec495414c25e750e3c8be8f8a7baf265410a0f4e */
class __TwigTemplate_3fe01d5b16eb8dba12bb2c7d7cb76f8599a8fc499682cccc58886345444e7e23 extends Twig_Template
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
        echo "<!-- pickUp -->
<div id=\"pickup\" class=\"template blockLayout original\">
    <div class=\"contaner\">
        <div class=\"title_block\">
            <h2 class=\"title\">PICKUP</h2>
        </div>
        <div class=\"itemList_block\">
            <div class=\"itemList_list pickup_slider\">
                ";
        // line 9
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["Products"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["Product"]) {
            // line 10
            echo "                <div class=\"item_block\">
                    <div class=\"item_wrapp\">
                        <a class=\"item_link\" class=\"itemList_contents_link\" href=\"";
            // line 12
            echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getUrl("product_detail", array("id" => $this->getAttribute($context["Product"], "id", array()))), "html", null, true);
            // line 13
            echo "\">
                            <img class=\"item_image\" src=\"";
            // line 14
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(            // line 15
($context["app"] ?? null), "config", array()), "image_save_urlpath", array()), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getNoImageProduct($this->getAttribute(            // line 16
$context["Product"], "main_list_image", array())), "html", null, true);
            echo "\">
                        </a>
                    </div>
                    <div class=\"detail_block\">
                        <h3 class=\"title\">
                            <a class=\"text_link\" href=\"";
            // line 21
            echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getUrl("product_detail", array("id" => $this->getAttribute(            // line 22
$context["Product"], "id", array()))), "html", null, true);
            echo "\">
                                ";
            // line 23
            echo twig_escape_filter($this->env, $this->getAttribute($context["Product"], "name", array()), "html", null, true);
            echo "
                            </a>
                        </h3>
                        <p class=\"price_text\">";
            // line 26
            echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getPriceFilter($this->getAttribute(            // line 27
$context["Product"], "getPrice02IncTaxMin", array())), "html", null, true);
            // line 28
            echo "</p>
                    </div>
                </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['Product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 32
        echo "            </div>
        </div>
    </div>
</div>
<!-- /pickUp -->";
    }

    public function getTemplateName()
    {
        return "__string_template__00fb754924e67e8fa7d22514ec495414c25e750e3c8be8f8a7baf265410a0f4e";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  77 => 32,  68 => 28,  66 => 27,  65 => 26,  59 => 23,  55 => 22,  54 => 21,  46 => 16,  43 => 15,  42 => 14,  39 => 13,  37 => 12,  33 => 10,  29 => 9,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "__string_template__00fb754924e67e8fa7d22514ec495414c25e750e3c8be8f8a7baf265410a0f4e", "");
    }
}
