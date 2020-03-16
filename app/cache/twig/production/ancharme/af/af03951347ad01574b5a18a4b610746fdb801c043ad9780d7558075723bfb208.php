<?php

/* __string_template__03cc5b093b038c867156088d2dd70ea9e1982af41ef2941f2ac03f165b94ef6a */
class __TwigTemplate_0a16c83a6eda0e0ddd4fe18a8f5476d3027c12a0a0f219ad0be187d09a30fadb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 3
        $this->parent = $this->loadTemplate("default_frame.twig", "__string_template__03cc5b093b038c867156088d2dd70ea9e1982af41ef2941f2ac03f165b94ef6a", 3);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'sub_title' => array($this, 'block_sub_title'),
            'main' => array($this, 'block_main'),
            'modal' => array($this, 'block_modal'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "default_frame.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        echo "クーポン管理";
    }

    // line 6
    public function block_sub_title($context, array $blocks = array())
    {
        echo "クーポン登録";
    }

    // line 11
    public function block_main($context, array $blocks = array())
    {
        // line 12
        echo "<h1 class=\"page-heading\">クーポンの利用登録</h1>
<div class=\"container-fluid\">
    <div id=\"coupon_entry\" class=\"row\">
        <form method=\"post\" action=\"";
        // line 15
        echo $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getPath("plg_simplecoupon_front_coupon");
        echo "\">
            ";
        // line 16
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "_token", array()), 'widget');
        echo "
            <div id=\"coupon_entry__body\" class=\"col-sm-10 col-sm-offset-1\">
               \t<p class=\" col-sm-offset-4\">利用するクーポンコードを入力してください。</p>
                <div id=\"coupon_entry__body_inner\" class=\"no-padding col-sm-offset-4 col-sm-6\">
                    ";
        // line 20
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "coupon_code", array()), 'widget');
        echo "
                    ";
        // line 21
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "coupon_code", array()), 'errors');
        echo "
                </div>
                
                <div id=\"coupon_entry_footer\" class=\"row no-padding\">
                    <div id=\"coupon_entry__button_menu\" class=\"btn_group col-sm-offset-4 col-sm-4\">
                        <p id=\"coupon_entry__insert_button\">
                            <button type=\"submit\" class=\"btn btn-primary btn-block prevention-btn prevention-mask\">
                                登録する
                            </button>
                        </p>
                        <p id=\"coupon_entry__back_button\"><a href=\"";
        // line 31
        echo $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getPath("shopping");
        echo "\" class=\"btn btn-info btn-block\">戻る</a></p>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>

<div id=\"result_list_main__list\" class=\"table_list row\">
    <div id=\"result_list_main__list_body\" class=\"table-responsive with-border  col-sm-offset-2 col-sm-8\" >
        <table class=\"table table-striped center-block \">
            <thead>
                <tr id=\"result_list_main__header\">
                    <th id=\"result_list_main__header_code\" >クーポンコード</th>
                    <th id=\"result_list_main__header_discount\" >値引き金額</th>
                    <th class=\"col-sm-2\">&nbsp;</th>
                </tr>
            </thead>
            <tbody>
";
        // line 50
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["coupon_list"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["CouponOrder"]) {
            // line 51
            echo "\t\t\t\t<tr id=\"result_list_main__item--";
            echo twig_escape_filter($this->env, $this->getAttribute($context["CouponOrder"], "couponOrderId", array()), "html", null, true);
            echo "\">
                    <td id=\"result_list_main__code--";
            // line 52
            echo twig_escape_filter($this->env, $this->getAttribute($context["CouponOrder"], "couponOrderId", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["CouponOrder"], "Coupon", array()), "couponCode", array()), "html", null, true);
            echo "</td>
                    <td id=\"result_list_main__discount--";
            // line 53
            echo twig_escape_filter($this->env, $this->getAttribute($context["CouponOrder"], "couponOrderId", array()), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getPriceFilter($this->getAttribute($context["CouponOrder"], "discountPrice", array())), "html", null, true);
            echo "</td>
                    <td id=\"result_list_main__item_menu_box--";
            // line 54
            echo twig_escape_filter($this->env, $this->getAttribute($context["CouponOrder"], "couponOrderId", array()), "html", null, true);
            echo "\" class=\"icon_edit\">
                    \t<a href=\"";
            // line 55
            echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getPath("plg_simplecoupon_front_coupon_delete", array("id" => $this->getAttribute($context["CouponOrder"], "couponOrderId", array()))), "html", null, true);
            echo "\" ";
            echo $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getCsrfTokenForAnchor();
            echo " data-method=\"delete\" data-message=\"このクーポン情報の利用を取り消してもよろしいですか？\">取り消し</a>
                    </td>
                </tr>
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['CouponOrder'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 59
        echo "\t\t\t</tbody>
        </table>
    </div>
</div>

";
    }

    // line 66
    public function block_modal($context, array $blocks = array())
    {
        // line 67
        echo "
";
    }

    public function getTemplateName()
    {
        return "__string_template__03cc5b093b038c867156088d2dd70ea9e1982af41ef2941f2ac03f165b94ef6a";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  150 => 67,  147 => 66,  138 => 59,  126 => 55,  122 => 54,  116 => 53,  110 => 52,  105 => 51,  101 => 50,  79 => 31,  66 => 21,  62 => 20,  55 => 16,  51 => 15,  46 => 12,  43 => 11,  37 => 6,  31 => 5,  11 => 3,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "__string_template__03cc5b093b038c867156088d2dd70ea9e1982af41ef2941f2ac03f165b94ef6a", "");
    }
}
