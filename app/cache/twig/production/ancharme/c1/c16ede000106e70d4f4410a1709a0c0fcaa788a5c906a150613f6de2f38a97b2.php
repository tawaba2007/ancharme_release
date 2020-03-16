<?php

/* __string_template__5a1f2f1f5b45b32acb5c5168bfbf68ec0fa019c3993ca7871d791dac2bd94e1b */
class __TwigTemplate_e721f8d59f2c581baad4d074c59ef91f9f2a1e85538c32b3f74cab4e7aeaa93f extends Twig_Template
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
        echo "<div id=\"original-category\" class=\"original-category-item-list-block\">
  <div class=\"item-list-wrapp\">
    ";
        // line 3
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["Products"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["Product"]) {
            // line 4
            echo "    <div class=\"item-list-contents\">
      <div class=\"item-list-contents-image\">
        <a href=\"";
            // line 6
            echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getUrl("product_detail", array("id" => $this->getAttribute($context["Product"], "id", array()))), "html", null, true);
            echo "\">
          <img src=\"";
            // line 7
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "image_save_urlpath", array()), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getNoImageProduct($this->getAttribute($context["Product"], "main_list_image", array())), "html", null, true);
            echo "\">
        </a>
      </div>
      <h3 class=\"item-list-contents-name\">
        <a href=\"";
            // line 11
            echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getUrl("product_detail", array("id" => $this->getAttribute($context["Product"], "id", array()))), "html", null, true);
            echo "\">
          ";
            // line 12
            echo twig_escape_filter($this->env, $this->getAttribute($context["Product"], "name", array()), "html", null, true);
            echo "
        </a>
      </h3>
      <p class=\"price-text\">";
            // line 15
            echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getPriceFilter($this->getAttribute($context["Product"], "getPrice02Min", array())), "html", null, true);
            echo "</p>
    </div>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['Product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 18
        echo "  </div>
</div>";
    }

    public function getTemplateName()
    {
        return "__string_template__5a1f2f1f5b45b32acb5c5168bfbf68ec0fa019c3993ca7871d791dac2bd94e1b";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  63 => 18,  54 => 15,  48 => 12,  44 => 11,  35 => 7,  31 => 6,  27 => 4,  23 => 3,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "__string_template__5a1f2f1f5b45b32acb5c5168bfbf68ec0fa019c3993ca7871d791dac2bd94e1b", "");
    }
}
