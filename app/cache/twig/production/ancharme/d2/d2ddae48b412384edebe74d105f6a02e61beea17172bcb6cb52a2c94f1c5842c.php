<?php

/* GmoEpsilon/Twig/mail/epsilon_order.twig */
class __TwigTemplate_7050ee1916eab2885d59bb6649f52db0a23b32857e1bb74bc8b89924df0bfe72 extends Twig_Template
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
        echo twig_escape_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "name01", array()), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "name02", array()), "html", null, true);
        echo " 様

";
        // line 3
        echo twig_escape_filter($this->env, ($context["header"] ?? null), "html", null, true);
        echo "

************************************************
　ご請求金額
************************************************

ご注文番号：";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "id", array()), "html", null, true);
        echo "
お支払い合計：";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getPriceFilter($this->getAttribute(($context["Order"] ?? null), "payment_total", array())), "html", null, true);
        echo "
お支払い方法：";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "payment_method", array()), "html", null, true);
        echo "
メッセージ：";
        // line 12
        echo twig_escape_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "message", array()), "html", null, true);
        echo "

************************************************
　";
        // line 15
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["arrOther"] ?? null), "title", array()), "value", array()), "html", null, true);
        echo "情報
************************************************
";
        // line 18
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["arrOther"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["item"]) {
            // line 19
            if (($context["key"] != "title")) {
                // line 20
                if ( !twig_test_empty($this->getAttribute($context["item"], "name", array()))) {
                    echo $this->getAttribute($context["item"], "name", array());
                    echo "：";
                }
                echo $this->getAttribute($context["item"], "value", array());
                echo "
";
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo "
************************************************
　ご注文商品明細
************************************************

";
        // line 29
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["Order"] ?? null), "OrderDetails", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["OrderDetail"]) {
            // line 30
            echo "商品コード: ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["OrderDetail"], "product_code", array()), "html", null, true);
            echo "
商品名: ";
            // line 31
            echo twig_escape_filter($this->env, $this->getAttribute($context["OrderDetail"], "product_name", array()), "html", null, true);
            echo "  ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["OrderDetail"], "classcategory_name1", array()), "html", null, true);
            echo "  ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["OrderDetail"], "classcategory_name2", array()), "html", null, true);
            echo "
単価： ";
            // line 32
            echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getPriceFilter($this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getCalcIncTax($this->getAttribute($context["OrderDetail"], "price", array()), $this->getAttribute($context["OrderDetail"], "tax_rate", array()), $this->getAttribute($context["OrderDetail"], "tax_rule", array()))), "html", null, true);
            echo "
数量： ";
            // line 33
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($context["OrderDetail"], "quantity", array())), "html", null, true);
            echo "

";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['OrderDetail'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "
-------------------------------------------------
小　計 ";
        // line 38
        echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getPriceFilter($this->getAttribute(($context["Order"] ?? null), "subtotal", array())), "html", null, true);
        if (($this->getAttribute(($context["Order"] ?? null), "tax", array()) > 0)) {
            echo "(うち消費税 ";
            echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getPriceFilter($this->getAttribute(($context["Order"] ?? null), "tax", array())), "html", null, true);
            echo ")";
        }
        // line 39
        echo "
手数料 ";
        // line 40
        echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getPriceFilter($this->getAttribute(($context["Order"] ?? null), "charge", array())), "html", null, true);
        echo "
送　料 ";
        // line 41
        echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getPriceFilter($this->getAttribute(($context["Order"] ?? null), "delivery_fee_total", array())), "html", null, true);
        echo "
";
        // line 42
        if (($this->getAttribute(($context["Order"] ?? null), "discount", array()) > 0)) {
            // line 43
            echo "値引き ";
            echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getPriceFilter((0 - $this->getAttribute(($context["Order"] ?? null), "discount", array()))), "html", null, true);
            echo "
";
        }
        // line 45
        echo "============================================
合　計 ";
        // line 46
        echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getPriceFilter($this->getAttribute(($context["Order"] ?? null), "payment_total", array())), "html", null, true);
        echo "

************************************************
　ご注文者情報
************************************************
お名前　：";
        // line 51
        echo twig_escape_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "name01", array()), "html", null, true);
        echo twig_escape_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "name02", array()), "html", null, true);
        echo "　様
";
        // line 52
        if ($this->getAttribute(($context["Order"] ?? null), "company_name", array())) {
            // line 53
            echo "会社名　：";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "company_name", array()), "html", null, true);
            echo "
";
        }
        // line 55
        if ($this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "form_country_enable", array())) {
            // line 56
            echo "国　　　：";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "Country", array()), "html", null, true);
            echo "
ZIPCODE ：";
            // line 57
            echo twig_escape_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "zip_code", array()), "html", null, true);
            echo "
";
        }
        // line 59
        echo "郵便番号：〒";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "zip01", array()), "html", null, true);
        echo "-";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "zip02", array()), "html", null, true);
        echo "
住所　　：";
        // line 60
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["Order"] ?? null), "Pref", array()), "name", array()), "html", null, true);
        echo twig_escape_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "addr01", array()), "html", null, true);
        echo twig_escape_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "addr02", array()), "html", null, true);
        echo "
電話番号：";
        // line 61
        echo twig_escape_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "tel01", array()), "html", null, true);
        echo "-";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "tel02", array()), "html", null, true);
        echo "-";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "tel03", array()), "html", null, true);
        echo "
FAX番号 ：";
        // line 62
        echo twig_escape_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "fax01", array()), "html", null, true);
        echo "-";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "fax02", array()), "html", null, true);
        echo "-";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "fax03", array()), "html", null, true);
        echo "

メールアドレス：";
        // line 64
        echo twig_escape_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "email", array()), "html", null, true);
        echo "

************************************************
　配送情報
************************************************

";
        // line 70
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["Order"] ?? null), "Shippings", array()));
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
        foreach ($context['_seq'] as $context["_key"] => $context["Shipping"]) {
            // line 71
            echo "◎お届け先";
            if ($this->getAttribute(($context["Order"] ?? null), "multiple", array())) {
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
            }
            // line 72
            echo "
お名前　：";
            // line 73
            echo twig_escape_filter($this->env, $this->getAttribute($context["Shipping"], "name01", array()), "html", null, true);
            echo twig_escape_filter($this->env, $this->getAttribute($context["Shipping"], "name02", array()), "html", null, true);
            echo "　様
";
            // line 74
            if ($this->getAttribute($context["Shipping"], "company_name", array())) {
                // line 75
                echo "会社名　：";
                echo twig_escape_filter($this->env, $this->getAttribute($context["Shipping"], "company_name", array()), "html", null, true);
                echo "
";
            }
            // line 77
            if ($this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "form_country_enable", array())) {
                // line 78
                echo "    　国　　　：";
                echo twig_escape_filter($this->env, $this->getAttribute($context["Shipping"], "Country", array()), "html", null, true);
                echo "
    　ZIPCODE ：";
                // line 79
                echo twig_escape_filter($this->env, $this->getAttribute($context["Shipping"], "zip_code", array()), "html", null, true);
                echo "
";
            }
            // line 81
            echo "郵便番号：〒";
            echo twig_escape_filter($this->env, $this->getAttribute($context["Shipping"], "zip01", array()), "html", null, true);
            echo "-";
            echo twig_escape_filter($this->env, $this->getAttribute($context["Shipping"], "zip02", array()), "html", null, true);
            echo "
住所　　：";
            // line 82
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["Shipping"], "Pref", array()), "name", array()), "html", null, true);
            echo twig_escape_filter($this->env, $this->getAttribute($context["Shipping"], "addr01", array()), "html", null, true);
            echo twig_escape_filter($this->env, $this->getAttribute($context["Shipping"], "addr02", array()), "html", null, true);
            echo "
電話番号：";
            // line 83
            echo twig_escape_filter($this->env, $this->getAttribute($context["Shipping"], "tel01", array()), "html", null, true);
            echo "-";
            echo twig_escape_filter($this->env, $this->getAttribute($context["Shipping"], "tel02", array()), "html", null, true);
            echo "-";
            echo twig_escape_filter($this->env, $this->getAttribute($context["Shipping"], "tel03", array()), "html", null, true);
            echo "
FAX番号 ：";
            // line 84
            echo twig_escape_filter($this->env, $this->getAttribute($context["Shipping"], "fax01", array()), "html", null, true);
            echo "-";
            echo twig_escape_filter($this->env, $this->getAttribute($context["Shipping"], "fax02", array()), "html", null, true);
            echo "-";
            echo twig_escape_filter($this->env, $this->getAttribute($context["Shipping"], "fax03", array()), "html", null, true);
            echo "

お届け日：";
            // line 86
            echo twig_escape_filter($this->env, ((twig_test_empty($this->getAttribute($context["Shipping"], "shipping_delivery_date", array()))) ? ("指定なし") : ($this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getDateFormatFilter($this->getAttribute($context["Shipping"], "shipping_delivery_date", array())))), "html", null, true);
            echo "
お届け時間：";
            // line 87
            echo twig_escape_filter($this->env, (($this->getAttribute($context["Shipping"], "shipping_delivery_time", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["Shipping"], "shipping_delivery_time", array()), "指定なし")) : ("指定なし")), "html", null, true);
            echo "

";
            // line 89
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["Shipping"], "ShipmentItems", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["ShipmentItem"]) {
                // line 90
                echo "商品コード: ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["ShipmentItem"], "product_code", array()), "html", null, true);
                echo "
商品名: ";
                // line 91
                echo twig_escape_filter($this->env, $this->getAttribute($context["ShipmentItem"], "product_name", array()), "html", null, true);
                echo "  ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["ShipmentItem"], "classcategory_name1", array()), "html", null, true);
                echo "  ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["ShipmentItem"], "classcategory_name2", array()), "html", null, true);
                echo "
数量：";
                // line 92
                echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($context["ShipmentItem"], "quantity", array())), "html", null, true);
                echo "

";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ShipmentItem'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['Shipping'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 96
        echo "
";
        // line 97
        echo twig_escape_filter($this->env, ($context["footer"] ?? null), "html", null, true);
        echo "
";
    }

    public function getTemplateName()
    {
        return "GmoEpsilon/Twig/mail/epsilon_order.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  349 => 97,  346 => 96,  325 => 92,  317 => 91,  312 => 90,  308 => 89,  303 => 87,  299 => 86,  290 => 84,  282 => 83,  276 => 82,  269 => 81,  264 => 79,  259 => 78,  257 => 77,  251 => 75,  249 => 74,  244 => 73,  241 => 72,  236 => 71,  219 => 70,  210 => 64,  201 => 62,  193 => 61,  187 => 60,  180 => 59,  175 => 57,  170 => 56,  168 => 55,  162 => 53,  160 => 52,  155 => 51,  147 => 46,  144 => 45,  138 => 43,  136 => 42,  132 => 41,  128 => 40,  125 => 39,  118 => 38,  114 => 36,  105 => 33,  101 => 32,  93 => 31,  88 => 30,  84 => 29,  77 => 24,  64 => 20,  62 => 19,  58 => 18,  53 => 15,  47 => 12,  43 => 11,  39 => 10,  35 => 9,  26 => 3,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "GmoEpsilon/Twig/mail/epsilon_order.twig", "/home/ancharme/ancharme.jp/public_html/app/Plugin/GmoEpsilon/Twig/mail/epsilon_order.twig");
    }
}
