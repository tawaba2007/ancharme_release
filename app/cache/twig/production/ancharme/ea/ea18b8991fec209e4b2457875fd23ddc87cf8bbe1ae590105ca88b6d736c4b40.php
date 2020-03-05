<?php

/* __string_template__086950488f877cecdae1b20b8e3539398918a903699788c3c032603eb941ba1c */
class __TwigTemplate_e2b26357f8cc995eb0a153ca8af004bfe42d0371bc467ba5cbb2b9add139e450 extends Twig_Template
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
        // line 10
        echo "
<!--最近チェックした商品-->
";
        // line 12
        if (($context["checkedItems"] ?? null)) {
            // line 13
            echo "<style>
#checkeditem .heading{
  ";
            // line 17
            echo "  padding: 0 8px;
}
#checkeditem .heading01 {
  background: transparent;
  float:left;
  font-size: 100%;
  text-align: left;
  padding: 0;
  margin: 0;
  line-height: 39px;
}
#checkeditem .heading02 {
  background: transparent;
  font-size: 60%;
  text-align: right;
  padding: 0;
  margin: 0;
}

#checkeditem #checkeditem_list .pickup_item{
  margin-bottom: 20px;
}
</style>

<div id=\"checkeditem\" class=\"item_gallery\">
  ";
            // line 42
            if ((($context["delete"] ?? null) == 0)) {
                // line 43
                echo "    <h2 class=\"heading\">
      <p class=\"heading01\">最近チェックした商品</p>

      <p class=\"heading02\">
        <a href=\"";
                // line 47
                echo $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getUrl("block_checkeditem_delete");
                echo "\" class=\"btn btn-info btn-sm\">履歴を削除</a>
      </p>
    </h2>
  ";
            } else {
                // line 51
                echo "    <h2 class=\"heading\">最近チェックした商品</h2>
  ";
            }
            // line 53
            echo "    <div class=\"row\" id=\"checkeditem_list\">
      ";
            // line 54
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_slice($this->env, ($context["checkedItems"] ?? null), 0, ($context["displayNum"] ?? null)));
            foreach ($context['_seq'] as $context["_key"] => $context["checkedItem"]) {
                // line 55
                echo "        <div class=\"col-sm-3 col-xs-6\">
            <div class=\"pickup_item\">
                <a href=\"";
                // line 57
                echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getUrl("product_detail", array("id" => $this->getAttribute($context["checkedItem"], "id", array()))), "html", null, true);
                echo "\">
                    <div class=\"item_photo\"><img src=\"";
                // line 58
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "image_save_urlpath", array()), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getNoImageProduct($this->getAttribute($context["checkedItem"], "main_list_image", array())), "html", null, true);
                echo "\"></div>
                    <dl>
                      <dt class=\"item_name\">";
                // line 60
                echo twig_escape_filter($this->env, $this->getAttribute($context["checkedItem"], "name", array()), "html", null, true);
                echo "</dt>
                      <dd class=\"item_price\">
                      ";
                // line 62
                if ($this->getAttribute($context["checkedItem"], "hasProductClass", array())) {
                    // line 63
                    if (($this->getAttribute($context["checkedItem"], "getPrice02Min", array()) == $this->getAttribute($context["checkedItem"], "getPrice02Max", array()))) {
                        // line 64
                        echo "                          <p class=\"normal_price\"><span class=\"price01_default\">";
                        echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getPriceFilter($this->getAttribute($context["checkedItem"], "getPrice02IncTaxMin", array())), "html", null, true);
                        echo "</span></p>
                          ";
                    } elseif (( !(null === $this->getAttribute(                    // line 65
$context["checkedItem"], "getPrice02Min", array())) &&  !(null === $this->getAttribute($context["checkedItem"], "getPrice02Max", array())))) {
                        // line 66
                        echo "                          <p class=\"normal_price\"><span class=\"price01_default\">";
                        echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getPriceFilter($this->getAttribute($context["checkedItem"], "getPrice02IncTaxMin", array())), "html", null, true);
                        echo "</span> ～ <span class=\"price01_default\">";
                        echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getPriceFilter($this->getAttribute($context["checkedItem"], "getPrice02IncTaxMax", array())), "html", null, true);
                        echo "</span></p>
                          ";
                    }
                    // line 68
                    echo "                      ";
                } else {
                    // line 69
                    if ( !(null === $this->getAttribute($context["checkedItem"], "getPrice02Max", array()))) {
                        // line 70
                        echo "                          <p class=\"normal_price\"><span class=\"price01_default\">";
                        echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getPriceFilter($this->getAttribute($context["checkedItem"], "getPrice02IncTaxMin", array())), "html", null, true);
                        echo "</span></p>
                          ";
                    }
                    // line 72
                    echo "                      ";
                }
                // line 73
                echo "</dd>
                    </dl>
                </a>
            </div>
          </div>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['checkedItem'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 79
            echo "    </div>

</div>
";
        }
    }

    public function getTemplateName()
    {
        return "__string_template__086950488f877cecdae1b20b8e3539398918a903699788c3c032603eb941ba1c";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  146 => 79,  135 => 73,  132 => 72,  126 => 70,  124 => 69,  121 => 68,  113 => 66,  111 => 65,  106 => 64,  104 => 63,  102 => 62,  97 => 60,  90 => 58,  86 => 57,  82 => 55,  78 => 54,  75 => 53,  71 => 51,  64 => 47,  58 => 43,  56 => 42,  29 => 17,  25 => 13,  23 => 12,  19 => 10,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "__string_template__086950488f877cecdae1b20b8e3539398918a903699788c3c032603eb941ba1c", "");
    }
}
