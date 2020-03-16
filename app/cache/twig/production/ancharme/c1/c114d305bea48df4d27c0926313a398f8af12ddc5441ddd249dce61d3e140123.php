<?php

/* __string_template__eb576a8585a134e411182d75fdf23b71b559293c302d532e127ff02612d28dda */
class __TwigTemplate_31d019132402937f0de713dbb530f9389289cedd89dad64b819a76109918bc99 extends Twig_Template
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
        echo "<div id=\"coupon_list\"  class=\"form-group\">
\t<p>クーポンをご利用の場合は、お持ちのクーポンコードを入力してください。</p>
\t<div><a id=\"shopping_confirm_box__button_edit_coupon\"  href=\"";
        // line 3
        echo $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getPath("plg_simplecoupon_front_coupon");
        echo "\" class=\"btn btn-default btn-sm\">クーポンを利用する</a></div>
\t
";
        // line 5
        if ((twig_length_filter($this->env, ($context["coupon_order_list"] ?? null)) > 0)) {
            // line 6
            echo " <div id=\"coupon_list__coupon_box2\" class=\"panel\">
    <div id=\"coupon_list__coupon_box\" class=\"total_box\">
    \t<dl id=\"coupon_list__list\" class=\"payment_list list-group\">
        ";
            // line 9
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["coupon_order_list"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["CouponOrder"]) {
                // line 10
                echo "    \t<dt>";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["CouponOrder"], "Coupon", array()), "couponCode", array()), "html", null, true);
                echo "</dt>
    \t<dd class=\"text-primary\"> ";
                // line 11
                echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getPriceFilter((0 - $this->getAttribute($context["CouponOrder"], "discountPrice", array()))), "html", null, true);
                echo "</dd>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['CouponOrder'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 13
            echo "    \t</dl>
    </div>
 </div>
 ";
        }
        // line 17
        echo " \t<hr>
</div>";
    }

    public function getTemplateName()
    {
        return "__string_template__eb576a8585a134e411182d75fdf23b71b559293c302d532e127ff02612d28dda";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 17,  52 => 13,  44 => 11,  39 => 10,  35 => 9,  30 => 6,  28 => 5,  23 => 3,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "__string_template__eb576a8585a134e411182d75fdf23b71b559293c302d532e127ff02612d28dda", "");
    }
}
