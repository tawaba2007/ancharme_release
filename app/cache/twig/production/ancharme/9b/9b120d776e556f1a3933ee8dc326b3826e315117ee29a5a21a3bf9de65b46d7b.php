<?php

/* __string_template__3837efce6b480f3270ff2720c3c8819b1e44311f4d9a2d1ffde997669ac3bb4a */
class __TwigTemplate_ad558606d578f7ca5e996c755be34c32f44c4c2fe79c5c72e9a1108366b9798e extends Twig_Template
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
        // line 2
        if ((twig_length_filter($this->env, ($context["coupon_order_list"] ?? null)) > 0)) {
            // line 3
            echo "<dl id=\"coupon_info_box__couponlist\" class=\"dl-horizontal\">
    <dt>ご利用クーポン</dt>
    <dd class=\"form-group form-inline\">
        <table id=\"coupon_info_box__payment_method\" class=\"dl-horizontal\">
";
            // line 7
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["coupon_order_list"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["CouponOrder"]) {
                // line 8
                echo "\t\t<tr>
            <td class=\"col-sm-6\">";
                // line 9
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["CouponOrder"], "Coupon", array()), "couponCode", array()), "html", null, true);
                echo "</td>
            <td class=\"form-group form-inline text-primary col-sm-6\">";
                // line 10
                echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getPriceFilter((0 - $this->getAttribute($context["CouponOrder"], "discountPrice", array()))), "html", null, true);
                echo "</td>
        </tr>
";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['CouponOrder'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 13
            echo "        </table>
    </dd>
</dl>
<hr>
";
        }
    }

    public function getTemplateName()
    {
        return "__string_template__3837efce6b480f3270ff2720c3c8819b1e44311f4d9a2d1ffde997669ac3bb4a";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  47 => 13,  38 => 10,  34 => 9,  31 => 8,  27 => 7,  21 => 3,  19 => 2,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "__string_template__3837efce6b480f3270ff2720c3c8819b1e44311f4d9a2d1ffde997669ac3bb4a", "");
    }
}
