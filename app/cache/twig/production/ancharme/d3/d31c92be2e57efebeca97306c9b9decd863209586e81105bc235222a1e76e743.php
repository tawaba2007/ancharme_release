<?php

/* __string_template__1b3f584a08dfe795555bea468c77bdd5754b1caac815e5302fe8c3d358938e5b */
class __TwigTemplate_fcd618606a5cbfd507935a47831fd8065e0a66be75ba00feb52095ec78e2e205 extends Twig_Template
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
<!--売上ランキング-->
";
        // line 12
        if (($context["ItemList"] ?? null)) {
            // line 13
            echo "<style>
#sales_ranking .item_name span {
  color: #fff;
  padding: 0.2em 0.7em;
  margin-right: 1em;
}
</style>

<div id=\"sales_ranking\" class=\"item_gallery\">
    <div class=\"title_block\">
      <h2 class=\"heading01\">RANKING BEST</h2>
    </div>
    <div class=\"ranking_block\">
      ";
            // line 26
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["ItemList"] ?? null));
            $context['loop'] = array(
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            );
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["Item"]) {
                // line 27
                echo "        <div class=\"list_item\">
            <div class=\"pickup_item\">
                <div class=\"label_block\"><span class=\"label_ranking\">";
                // line 29
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
                echo "</span></div>
                <a class=\"item_link\" href=\"";
                // line 30
                echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getUrl("product_detail", array("id" => $this->getAttribute($context["Item"], "id", array()))), "html", null, true);
                echo "\">
                    <div class=\"item_photo\"><img src=\"";
                // line 31
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "image_save_urlpath", array()), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getNoImageProduct($this->getAttribute($context["Item"], "main_list_image", array())), "html", null, true);
                echo "\"></div>
                    <dl>
                      <dt class=\"item_name\">";
                // line 33
                echo twig_escape_filter($this->env, $this->getAttribute($context["Item"], "name", array()), "html", null, true);
                echo "</dt>
                      <dd class=\"item_price\">
                      ";
                // line 35
                if ($this->getAttribute($context["Item"], "hasProductClass", array())) {
                    // line 36
                    if (($this->getAttribute($context["Item"], "getPrice02Min", array()) == $this->getAttribute($context["Item"], "getPrice02Max", array()))) {
                        // line 37
                        echo "                          <p class=\"normal_price\"><span class=\"price01_default\">";
                        echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getPriceFilter($this->getAttribute($context["Item"], "getPrice02Min", array())), "html", null, true);
                        echo "</span></p>
                          ";
                    } elseif (( !(null === $this->getAttribute(                    // line 38
$context["Item"], "getPrice02Min", array())) &&  !(null === $this->getAttribute($context["Item"], "getPrice02Max", array())))) {
                        // line 39
                        echo "                          <p class=\"normal_price\"><span class=\"price01_default\">";
                        echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getPriceFilter($this->getAttribute($context["Item"], "getPrice02Min", array())), "html", null, true);
                        echo "</span> ～ <span class=\"price01_default\">";
                        echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getPriceFilter($this->getAttribute($context["Item"], "getPrice02Max", array())), "html", null, true);
                        echo "</span></p>
                          ";
                    }
                    // line 41
                    echo "                      ";
                } else {
                    // line 42
                    if ( !(null === $this->getAttribute($context["Item"], "getPrice02Max", array()))) {
                        // line 43
                        echo "                          <p class=\"normal_price\"><span class=\"price01_default\">";
                        echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getPriceFilter($this->getAttribute($context["Item"], "getPrice02Min", array())), "html", null, true);
                        echo "</span></p>
                          ";
                    }
                    // line 45
                    echo "                      ";
                }
                // line 46
                echo "</dl>
                </a>
            </div>
          </div>
      ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['Item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 51
            echo "    </div>
</div>
";
        }
    }

    public function getTemplateName()
    {
        return "__string_template__1b3f584a08dfe795555bea468c77bdd5754b1caac815e5302fe8c3d358938e5b";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  132 => 51,  114 => 46,  111 => 45,  105 => 43,  103 => 42,  100 => 41,  92 => 39,  90 => 38,  85 => 37,  83 => 36,  81 => 35,  76 => 33,  69 => 31,  65 => 30,  61 => 29,  57 => 27,  40 => 26,  25 => 13,  23 => 12,  19 => 10,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "__string_template__1b3f584a08dfe795555bea468c77bdd5754b1caac815e5302fe8c3d358938e5b", "");
    }
}
