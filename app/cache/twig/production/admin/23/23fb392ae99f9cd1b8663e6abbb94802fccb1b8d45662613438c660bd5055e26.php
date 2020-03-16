<?php

/* __string_template__6ff0d62c96b8c2adbc8d70f61041a75b368d344f546a36c7ebc7e05879f9dd2f */
class __TwigTemplate_926d6b09ba6ff852b092d6616a4f86d4414e4fc253ebe2cc4083286ef395f0b8 extends Twig_Template
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
        <p class=\"small\">注文時点でのクーポン利用金額です。変更がある場合は手動にて値引き金額を変更してください。</p>
    </dd>
</dl>
<hr>
";
        }
    }

    public function getTemplateName()
    {
        return "__string_template__6ff0d62c96b8c2adbc8d70f61041a75b368d344f546a36c7ebc7e05879f9dd2f";
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
        return new Twig_Source("", "__string_template__6ff0d62c96b8c2adbc8d70f61041a75b368d344f546a36c7ebc7e05879f9dd2f", "");
    }
}
