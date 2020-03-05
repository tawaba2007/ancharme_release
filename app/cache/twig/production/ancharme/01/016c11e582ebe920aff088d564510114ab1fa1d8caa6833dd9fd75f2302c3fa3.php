<?php

/* __string_template__7cc6729c9b868956db8c8d5173ae8188b25c944171522246e9d36cdd6a0baf25 */
class __TwigTemplate_8e5fbd20f6578ec7db86ae35867c48fa097857e26d5471ea9e7399b199f80028 extends Twig_Template
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
        echo "<div id=\"cart_area\">
    <p class=\"clearfix cart-trigger\">
        <a href=\"#cart\">
            <img src=\"https://ancharme.jp/html/template/ancharme/img/top/icon_09.png\" alt=\"icon\" class=\"cart-icon-image\">
            <span class=\"badge\">";
        // line 26
        echo twig_escape_filter($this->env, $this->getAttribute(($context["Cart"] ?? null), "total_quantity", array()), "html", null, true);
        echo "</span>
            <svg class=\"cb cb-close\">
                <use xlink:href=\"#cb-close\"/>
            </svg>
        </a>
        ";
        // line 34
        echo "    </p>
    <div id=\"cart\" class=\"cart\">
        <div class=\"inner\">
            ";
        // line 37
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? null), "session", array()), "flashbag", array()), "get", array(0 => "eccube.front.cart.error"), "method"));
        foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
            // line 38
            echo "                <div class=\"message\">
                    <p class=\"errormsg bg-danger\">
                        <svg class=\"cb cb-warning\"><use xlink:href=\"#cb-warning\"/></svg>
                        ";
            // line 41
            echo nl2br(twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans($context["error"]), "html", null, true));
            echo "
                    </p>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 45
        echo "            ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["Cart"] ?? null), "CartItems", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["CartItem"]) {
            // line 46
            echo "                ";
            $context["ProductClass"] = $this->getAttribute($context["CartItem"], "Object", array());
            // line 47
            echo "                ";
            $context["Product"] = $this->getAttribute(($context["ProductClass"] ?? null), "Product", array());
            // line 48
            echo "                <div class=\"item_box clearfix\">
                    <div class=\"item_photo\"><img src=\"";
            // line 49
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "image_save_urlpath", array()), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getNoImageProduct($this->getAttribute(($context["Product"] ?? null), "MainListImage", array())), "html", null, true);
            echo "\" alt=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["Product"] ?? null), "name", array()), "html", null, true);
            echo "\"></div>
                    <dl class=\"item_detail\">
                        <dt class=\"item_name\">";
            // line 51
            echo twig_escape_filter($this->env, $this->getAttribute(($context["Product"] ?? null), "name", array()), "html", null, true);
            echo "</dt>
                        <dd class=\"item_pattern small\">";
            // line 53
            if ($this->getAttribute(($context["ProductClass"] ?? null), "ClassCategory1", array())) {
                // line 54
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["ProductClass"] ?? null), "ClassCategory1", array()), "ClassName", array()), "html", null, true);
                echo "：";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["ProductClass"] ?? null), "ClassCategory1", array()), "html", null, true);
                // line 55
                if ($this->getAttribute(($context["ProductClass"] ?? null), "ClassCategory2", array())) {
                    // line 56
                    echo "<br>";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["ProductClass"] ?? null), "ClassCategory2", array()), "ClassName", array()), "html", null, true);
                    echo "：";
                    echo twig_escape_filter($this->env, $this->getAttribute(($context["ProductClass"] ?? null), "ClassCategory2", array()), "html", null, true);
                }
            }
            // line 59
            echo "</dd>
                        <dd class=\"item_price\">";
            // line 60
            echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getPriceFilter($this->getAttribute($context["CartItem"], "price", array())), "html", null, true);
            echo "<span class=\"small\">税込</span>
                        </dd>
                        <dd class=\"item_quantity form-group form-inline\">数量：";
            // line 62
            echo twig_escape_filter($this->env, $this->getAttribute($context["CartItem"], "quantity", array()), "html", null, true);
            echo "</dd>
                    </dl>
                </div>
                <!--/item_box-->
                <p class=\"cart_price sp\">合計
                    <span class=\"price\">";
            // line 67
            echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getPriceFilter($this->getAttribute(($context["Cart"] ?? null), "total_price", array())), "html", null, true);
            echo "</span>
                </p>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['CartItem'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 70
        echo "            ";
        if ((twig_length_filter($this->env, $this->getAttribute(($context["Cart"] ?? null), "CartItems", array())) > 0)) {
            // line 71
            echo "
                <div class=\"btn_area\">
                    <ul>
                        <li>
                            <a href=\"";
            // line 75
            echo $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getUrl("cart");
            echo "\" class=\"btn btn-primary\">カートへ進む</a>
                        </li>
                        <li>
                            <button type=\"button\" class=\"btn btn-default btn-sm cart-trigger\">キャンセル</button>
                        </li>
                    </ul>
                </div>
            ";
        } else {
            // line 83
            echo "                <div class=\"btn_area\">
                    <div class=\"message\">
                        <p class=\"errormsg bg-danger\" style=\"margin-bottom: 20px;\">
                            現在カート内に<br>商品はございません。
                        </p>
                    </div>
                </div>
            ";
        }
        // line 91
        echo "        </div>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "__string_template__7cc6729c9b868956db8c8d5173ae8188b25c944171522246e9d36cdd6a0baf25";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  154 => 91,  144 => 83,  133 => 75,  127 => 71,  124 => 70,  115 => 67,  107 => 62,  102 => 60,  99 => 59,  92 => 56,  90 => 55,  86 => 54,  84 => 53,  80 => 51,  71 => 49,  68 => 48,  65 => 47,  62 => 46,  57 => 45,  47 => 41,  42 => 38,  38 => 37,  33 => 34,  25 => 26,  19 => 22,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "__string_template__7cc6729c9b868956db8c8d5173ae8188b25c944171522246e9d36cdd6a0baf25", "");
    }
}
