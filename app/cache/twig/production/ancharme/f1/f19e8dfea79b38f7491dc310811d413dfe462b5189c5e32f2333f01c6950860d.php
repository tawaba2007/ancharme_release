<?php

/* Block/plg_shiro8_new_product_block.twig */
class __TwigTemplate_57ac980d7c5a422160b091a9fe9b905a7d47bd0a8b92a7b8f49fd8c96ef83185 extends Twig_Template
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
        echo "<!-- ▼shiro8_new_product▼ -->
<div id=\"contents_top\">
  <div class=\"title-wrapp\">
<p class=\"contents-title font_a\">NEW-ITEM</p>
  </div>
    <div id=\"item_list\">
        <div class=\"row\" id=\"new-item-list\">
            ";
        // line 29
        if ((twig_length_filter($this->env, ($context["Products"] ?? null)) > 0)) {
            // line 30
            echo "                ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["Products"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["Product"]) {
                // line 31
                echo "                    <div class=\"col-sm-3 col-xs-6 new-item-list-item\">
                        <div class=\"pickup_item\">
                            <a href=\"";
                // line 33
                echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getUrl("product_detail", array("id" => $this->getAttribute($context["Product"], "id", array()))), "html", null, true);
                echo "\">
                                <div class=\"item_photo\">
                                    <img src=\"";
                // line 35
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "image_save_urlpath", array()), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getNoImageProduct($this->getAttribute($context["Product"], "main_list_image", array())), "html", null, true);
                echo "\">
                                </div>
                                ";
                // line 37
                if ($this->getAttribute($context["Product"], "description_list", array())) {
                    // line 38
                    echo "                                    <p class=\"item_comment text-warning\">";
                    echo nl2br($this->getAttribute($context["Product"], "description_list", array()));
                    echo "</p>
                                ";
                }
                // line 40
                echo "                                <dl>
                                    <dt class=\"item_name\">";
                // line 41
                echo twig_escape_filter($this->env, $this->getAttribute($context["Product"], "name", array()), "html", null, true);
                echo "</dt>
                                    
                                    ";
                // line 43
                if ($this->getAttribute($context["Product"], "hasProductClass", array())) {
                    // line 44
                    echo "                                        ";
                    if (($this->getAttribute($context["Product"], "getPrice02Min", array()) == $this->getAttribute($context["Product"], "getPrice02Max", array()))) {
                        // line 45
                        echo "                                            <dd class=\"item_price\">";
                        echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getPriceFilter($this->getAttribute($context["Product"], "getPrice02Min", array())), "html", null, true);
                        echo "</dd>
                                        ";
                    } else {
                        // line 47
                        echo "                                            <dd class=\"item_price\">";
                        echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getPriceFilter($this->getAttribute($context["Product"], "getPrice02Min", array())), "html", null, true);
                        echo " ～ ";
                        echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getPriceFilter($this->getAttribute($context["Product"], "getPrice02Max", array())), "html", null, true);
                        echo "</dd>
                                        ";
                    }
                    // line 49
                    echo "                                    ";
                } else {
                    // line 50
                    echo "                                        <dd class=\"item_price\">";
                    echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getPriceFilter($this->getAttribute($context["Product"], "getPrice02Min", array())), "html", null, true);
                    echo "</dd>
                                    ";
                }
                // line 52
                echo "                                    
                                </dl>
                            </a>
                        </div>
                    </div>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['Product'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 58
            echo "            ";
        }
        // line 59
        echo "        </div>
    </div>
\t<div class=\"more_btn font_a\">
\t\t  <a href=\"https://ancharme.jp/products/list\">MORE</a>
\t\t\t</div>
</div>
<!-- ▲shiro8_new_product▲ -->";
    }

    public function getTemplateName()
    {
        return "Block/plg_shiro8_new_product_block.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  109 => 59,  106 => 58,  95 => 52,  89 => 50,  86 => 49,  78 => 47,  72 => 45,  69 => 44,  67 => 43,  62 => 41,  59 => 40,  53 => 38,  51 => 37,  44 => 35,  39 => 33,  35 => 31,  30 => 30,  28 => 29,  19 => 22,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Block/plg_shiro8_new_product_block.twig", "/home/ancharme/ancharme.jp/public_html/app/template/ancharme/Block/plg_shiro8_new_product_block.twig");
    }
}
