<?php

/* Mail/order.twig */
class __TwigTemplate_c7b73be7d9fe97aec595f8a09de634d986d8f34ed6c44869f0bbca9976af7ef0 extends Twig_Template
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
        echo twig_escape_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "name01", array()), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "name02", array()), "html", null, true);
        echo " 様

";
        // line 24
        echo twig_escape_filter($this->env, ($context["header"] ?? null), "html", null, true);
        echo "

************************************************
　ご請求金額
************************************************

ご注文番号：";
        // line 30
        echo twig_escape_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "id", array()), "html", null, true);
        echo "
お支払い合計：";
        // line 31
        echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getPriceFilter($this->getAttribute(($context["Order"] ?? null), "payment_total", array())), "html", null, true);
        echo "
お支払い方法：";
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "payment_method", array()), "html", null, true);
        echo "
メッセージ：";
        // line 33
        echo twig_escape_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "message", array()), "html", null, true);
        echo "

銀行振込を選択された場合、8日以内に以下の口座振込をお願いします。

ジャパンネット銀行　ビジネス営業部支店（005）
普通預金　2370295
口座名義
（漢字）株式会社ＧＩＶＩＮ 
（全角フリガナ）カブシキガイシャギビン
（半角ﾌﾘｶﾞﾅ）ｶﾌﾞｼｷｶﾞｲｼｬｷﾞﾋﾞﾝ

************************************************
　ご注文商品明細
************************************************

";
        // line 48
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["Order"] ?? null), "OrderDetails", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["OrderDetail"]) {
            // line 49
            echo "商品コード: ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["OrderDetail"], "product_code", array()), "html", null, true);
            echo "
商品名: ";
            // line 50
            echo twig_escape_filter($this->env, $this->getAttribute($context["OrderDetail"], "product_name", array()), "html", null, true);
            echo "  ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["OrderDetail"], "classcategory_name1", array()), "html", null, true);
            echo "  ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["OrderDetail"], "classcategory_name2", array()), "html", null, true);
            echo "
単価： ";
            // line 51
            echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getPriceFilter($this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getCalcIncTax($this->getAttribute($context["OrderDetail"], "price", array()), $this->getAttribute($context["OrderDetail"], "tax_rate", array()), $this->getAttribute($context["OrderDetail"], "tax_rule", array()))), "html", null, true);
            echo "
数量： ";
            // line 52
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($context["OrderDetail"], "quantity", array())), "html", null, true);
            echo "

";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['OrderDetail'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 55
        echo "
-------------------------------------------------
小　計 ";
        // line 57
        echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getPriceFilter($this->getAttribute(($context["Order"] ?? null), "subtotal", array())), "html", null, true);
        if (($this->getAttribute(($context["Order"] ?? null), "tax", array()) > 0)) {
            echo "(うち消費税 ";
            echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getPriceFilter($this->getAttribute(($context["Order"] ?? null), "tax", array())), "html", null, true);
            echo ")";
        }
        // line 58
        echo "
手数料 ";
        // line 59
        echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getPriceFilter($this->getAttribute(($context["Order"] ?? null), "charge", array())), "html", null, true);
        echo "
送　料 ";
        // line 60
        echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getPriceFilter($this->getAttribute(($context["Order"] ?? null), "delivery_fee_total", array())), "html", null, true);
        echo "
";
        // line 61
        if (($this->getAttribute(($context["Order"] ?? null), "discount", array()) > 0)) {
            // line 62
            echo "値引き ";
            echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getPriceFilter((0 - $this->getAttribute(($context["Order"] ?? null), "discount", array()))), "html", null, true);
            echo "
";
        }
        // line 64
        echo "============================================
合　計 ";
        // line 65
        echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getPriceFilter($this->getAttribute(($context["Order"] ?? null), "payment_total", array())), "html", null, true);
        echo "

************************************************
　ご注文者情報
************************************************
お名前　：";
        // line 70
        echo twig_escape_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "name01", array()), "html", null, true);
        echo twig_escape_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "name02", array()), "html", null, true);
        echo "　様
";
        // line 71
        if ($this->getAttribute(($context["Order"] ?? null), "company_name", array())) {
            // line 72
            echo "会社名　：";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "company_name", array()), "html", null, true);
            echo "
";
        }
        // line 74
        if ($this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "form_country_enable", array())) {
            // line 75
            echo "国　　　：";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "Country", array()), "html", null, true);
            echo "
ZIPCODE ：";
            // line 76
            echo twig_escape_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "zip_code", array()), "html", null, true);
            echo "
";
        }
        // line 78
        echo "郵便番号：〒";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "zip01", array()), "html", null, true);
        echo "-";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "zip02", array()), "html", null, true);
        echo "
住所　　：";
        // line 79
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["Order"] ?? null), "Pref", array()), "name", array()), "html", null, true);
        echo twig_escape_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "addr01", array()), "html", null, true);
        echo twig_escape_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "addr02", array()), "html", null, true);
        echo "
電話番号：";
        // line 80
        echo twig_escape_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "tel01", array()), "html", null, true);
        echo "-";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "tel02", array()), "html", null, true);
        echo "-";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "tel03", array()), "html", null, true);
        echo "
FAX番号 ：";
        // line 81
        echo twig_escape_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "fax01", array()), "html", null, true);
        echo "-";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "fax02", array()), "html", null, true);
        echo "-";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "fax03", array()), "html", null, true);
        echo "

メールアドレス：";
        // line 83
        echo twig_escape_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "email", array()), "html", null, true);
        echo "

************************************************
　配送情報
************************************************

";
        // line 89
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
            // line 90
            echo "◎お届け先";
            if ($this->getAttribute(($context["Order"] ?? null), "multiple", array())) {
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
            }
            // line 91
            echo "
お名前　：";
            // line 92
            echo twig_escape_filter($this->env, $this->getAttribute($context["Shipping"], "name01", array()), "html", null, true);
            echo twig_escape_filter($this->env, $this->getAttribute($context["Shipping"], "name02", array()), "html", null, true);
            echo "　様
";
            // line 93
            if ($this->getAttribute($context["Shipping"], "company_name", array())) {
                // line 94
                echo "会社名　：";
                echo twig_escape_filter($this->env, $this->getAttribute($context["Shipping"], "company_name", array()), "html", null, true);
                echo "
";
            }
            // line 96
            if ($this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "form_country_enable", array())) {
                // line 97
                echo "    　国　　　：";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["Shipping"], "Country", array()), "name", array()), "html", null, true);
                echo "
    　ZIPCODE ：";
                // line 98
                echo twig_escape_filter($this->env, $this->getAttribute($context["Shipping"], "zip_code", array()), "html", null, true);
                echo "
";
            }
            // line 100
            echo "郵便番号：〒";
            echo twig_escape_filter($this->env, $this->getAttribute($context["Shipping"], "zip01", array()), "html", null, true);
            echo "-";
            echo twig_escape_filter($this->env, $this->getAttribute($context["Shipping"], "zip02", array()), "html", null, true);
            echo "
住所　　：";
            // line 101
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["Shipping"], "Pref", array()), "name", array()), "html", null, true);
            echo twig_escape_filter($this->env, $this->getAttribute($context["Shipping"], "addr01", array()), "html", null, true);
            echo twig_escape_filter($this->env, $this->getAttribute($context["Shipping"], "addr02", array()), "html", null, true);
            echo "
電話番号：";
            // line 102
            echo twig_escape_filter($this->env, $this->getAttribute($context["Shipping"], "tel01", array()), "html", null, true);
            echo "-";
            echo twig_escape_filter($this->env, $this->getAttribute($context["Shipping"], "tel02", array()), "html", null, true);
            echo "-";
            echo twig_escape_filter($this->env, $this->getAttribute($context["Shipping"], "tel03", array()), "html", null, true);
            echo "
FAX番号 ：";
            // line 103
            echo twig_escape_filter($this->env, $this->getAttribute($context["Shipping"], "fax01", array()), "html", null, true);
            echo "-";
            echo twig_escape_filter($this->env, $this->getAttribute($context["Shipping"], "fax02", array()), "html", null, true);
            echo "-";
            echo twig_escape_filter($this->env, $this->getAttribute($context["Shipping"], "fax03", array()), "html", null, true);
            echo "

お届け日：";
            // line 105
            echo twig_escape_filter($this->env, ((twig_test_empty($this->getAttribute($context["Shipping"], "shipping_delivery_date", array()))) ? ("指定なし") : ($this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getDateFormatFilter($this->getAttribute($context["Shipping"], "shipping_delivery_date", array())))), "html", null, true);
            echo "
お届け時間：";
            // line 106
            echo twig_escape_filter($this->env, (($this->getAttribute($context["Shipping"], "shipping_delivery_time", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["Shipping"], "shipping_delivery_time", array()), "指定なし")) : ("指定なし")), "html", null, true);
            echo "

";
            // line 108
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute($context["Shipping"], "ShipmentItems", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["ShipmentItem"]) {
                // line 109
                echo "商品コード: ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["ShipmentItem"], "product_code", array()), "html", null, true);
                echo "
商品名: ";
                // line 110
                echo twig_escape_filter($this->env, $this->getAttribute($context["ShipmentItem"], "product_name", array()), "html", null, true);
                echo "  ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["ShipmentItem"], "classcategory_name1", array()), "html", null, true);
                echo "  ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["ShipmentItem"], "classcategory_name2", array()), "html", null, true);
                echo "
数量：";
                // line 111
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
        // line 115
        echo "
";
        // line 116
        echo twig_escape_filter($this->env, ($context["footer"] ?? null), "html", null, true);
    }

    public function getTemplateName()
    {
        return "Mail/order.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  330 => 116,  327 => 115,  306 => 111,  298 => 110,  293 => 109,  289 => 108,  284 => 106,  280 => 105,  271 => 103,  263 => 102,  257 => 101,  250 => 100,  245 => 98,  240 => 97,  238 => 96,  232 => 94,  230 => 93,  225 => 92,  222 => 91,  217 => 90,  200 => 89,  191 => 83,  182 => 81,  174 => 80,  168 => 79,  161 => 78,  156 => 76,  151 => 75,  149 => 74,  143 => 72,  141 => 71,  136 => 70,  128 => 65,  125 => 64,  119 => 62,  117 => 61,  113 => 60,  109 => 59,  106 => 58,  99 => 57,  95 => 55,  86 => 52,  82 => 51,  74 => 50,  69 => 49,  65 => 48,  47 => 33,  43 => 32,  39 => 31,  35 => 30,  26 => 24,  19 => 22,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Mail/order.twig", "/home/ancharme/ancharme.jp/public_html/app/template/ancharme/Mail/order.twig");
    }
}
