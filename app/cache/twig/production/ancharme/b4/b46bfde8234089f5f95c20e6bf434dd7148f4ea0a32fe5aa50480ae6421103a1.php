<?php

/* NEConnect/Resource/template/default/Mail/order_to_NE.twig */
class __TwigTemplate_3ed3426785c7a2bb9625891c18144550ddda4aef2a2c18bb625d598210298966 extends Twig_Template
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
        echo "注文コード：";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "id", array()), "html", null, true);
        echo "
注文日時：";
        // line 2
        echo twig_escape_filter($this->env, ($context["createDate"] ?? null), "html", null, true);
        echo "
■注文者の情報
氏名：";
        // line 4
        echo twig_escape_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "name01", array()), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "name02", array()), "html", null, true);
        echo "
氏名（フリガナ）：";
        // line 5
        echo twig_escape_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "kana01", array()), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "kana02", array()), "html", null, true);
        echo "
郵便番号：";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "zip01", array()), "html", null, true);
        echo "-";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "zip02", array()), "html", null, true);
        echo "
住所：";
        // line 7
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["Order"] ?? null), "Pref", array()), "name", array()), "html", null, true);
        echo twig_escape_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "addr01", array()), "html", null, true);
        echo twig_escape_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "addr02", array()), "html", null, true);
        echo "
電話番号：";
        // line 8
        echo twig_escape_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "tel01", array()), "html", null, true);
        echo twig_escape_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "tel02", array()), "html", null, true);
        echo twig_escape_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "tel03", array()), "html", null, true);
        echo "
Ｅメールアドレス：";
        // line 9
        echo twig_escape_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "email", array()), "html", null, true);
        echo "
■支払方法
支払方法：";
        // line 11
        echo twig_escape_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "payment_method", array()), "html", null, true);
        echo "
■注文内容
";
        // line 13
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["Order"] ?? null), "OrderDetails", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["OrderDetail"]) {
            echo "------------------------------------------------------------
    商品番号：";
            // line 14
            echo twig_escape_filter($this->env, $this->getAttribute($context["OrderDetail"], "product_code", array()), "html", null, true);
            echo "
    注文商品名：";
            // line 15
            echo twig_escape_filter($this->env, $this->getAttribute($context["OrderDetail"], "product_name", array()), "html", null, true);
            echo "
    商品オプション：";
            // line 16
            if ($this->getAttribute($context["OrderDetail"], "classcategory_name1", array())) {
                echo twig_escape_filter($this->env, $this->getAttribute($context["OrderDetail"], "classcategory_name1", array()), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->getAttribute($context["OrderDetail"], "classcategory_name2", array()), "html", null, true);
            }
            // line 17
            echo "    単価：￥";
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getCalcIncTax($this->getAttribute($context["OrderDetail"], "price", array()), $this->getAttribute($context["OrderDetail"], "tax_rate", array()), $this->getAttribute($context["OrderDetail"], "tax_rule", array()))), "html", null, true);
            echo "
    数量：";
            // line 18
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($context["OrderDetail"], "quantity", array())), "html", null, true);
            echo "
    小計：￥";
            // line 19
            echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ($this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getCalcIncTax($this->getAttribute($context["OrderDetail"], "price", array()), $this->getAttribute($context["OrderDetail"], "tax_rate", array()), $this->getAttribute($context["OrderDetail"], "tax_rule", array())) * $this->getAttribute($context["OrderDetail"], "quantity", array()))), "html", null, true);
            echo "
";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['OrderDetail'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 21
        echo "------------------------------------------------------------
商品合計：￥";
        // line 22
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, ($this->getAttribute(($context["Order"] ?? null), "subtotal", array()) - $this->getAttribute(($context["Order"] ?? null), "tax", array()))), "html", null, true);
        echo "
税金：￥";
        // line 23
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "tax", array())), "html", null, true);
        echo "
送料：￥";
        // line 24
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "delivery_fee_total", array())), "html", null, true);
        echo "
手数料：￥";
        // line 25
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "charge", array())), "html", null, true);
        echo "
その他費用：￥";
        // line 26
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, (0 - $this->getAttribute(($context["Order"] ?? null), "discount", array()))), "html", null, true);
        echo "
";
        // line 27
        if ((($context["lastPreUsePoint"] ?? null) != null)) {
            // line 28
            echo "ポイント利用額：▲￥";
            echo twig_escape_filter($this->env, ($context["lastPreUsePointTotal"] ?? null), "html", null, true);
            echo "(";
            echo twig_escape_filter($this->env, ($context["lastPreUsePoint"] ?? null), "html", null, true);
            echo "ポイント)
";
        } else {
            // line 30
            echo "ポイント利用額：▲￥0(0ポイント)
";
        }
        // line 32
        echo "------------------------------------------------------------
合計金額(税込)：￥";
        // line 33
        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "payment_total", array())), "html", null, true);
        echo "
------------------------------------------------------------
■届け先の情報
";
        // line 36
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
            echo "[送付先";
            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
            echo "]
    　送付先";
            // line 37
            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
            echo "氏名：";
            echo twig_escape_filter($this->env, $this->getAttribute($context["Shipping"], "name01", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["Shipping"], "name02", array()), "html", null, true);
            echo "
    　送付先";
            // line 38
            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
            echo "氏名（フリガナ）：";
            echo twig_escape_filter($this->env, $this->getAttribute($context["Shipping"], "kana01", array()), "html", null, true);
            echo " ";
            echo twig_escape_filter($this->env, $this->getAttribute($context["Shipping"], "kana02", array()), "html", null, true);
            echo "
    　送付先";
            // line 39
            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
            echo "郵便番号：";
            echo twig_escape_filter($this->env, $this->getAttribute($context["Shipping"], "zip01", array()), "html", null, true);
            echo "-";
            echo twig_escape_filter($this->env, $this->getAttribute($context["Shipping"], "zip02", array()), "html", null, true);
            echo "
    　送付先";
            // line 40
            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
            echo "住所：";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["Shipping"], "Pref", array()), "name", array()), "html", null, true);
            echo twig_escape_filter($this->env, $this->getAttribute($context["Shipping"], "addr01", array()), "html", null, true);
            echo twig_escape_filter($this->env, $this->getAttribute($context["Shipping"], "addr02", array()), "html", null, true);
            echo "
    　送付先";
            // line 41
            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
            echo "電話番号：";
            echo twig_escape_filter($this->env, $this->getAttribute($context["Shipping"], "tel01", array()), "html", null, true);
            echo "-";
            echo twig_escape_filter($this->env, $this->getAttribute($context["Shipping"], "tel02", array()), "html", null, true);
            echo "-";
            echo twig_escape_filter($this->env, $this->getAttribute($context["Shipping"], "tel03", array()), "html", null, true);
            echo "
    　送付先";
            // line 42
            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
            echo "のし・ギフト包装：
    　送付先";
            // line 43
            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
            echo "お届け方法：";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["Shipping"], "Delivery", array()), "name", array()), "html", null, true);
            echo "
    　送付先";
            // line 44
            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
            echo "お届け希望日：";
            if (($this->getAttribute(($context["deliveryDateArray"] ?? null), $this->getAttribute($context["Shipping"], "id", array()), array(), "array", true, true) && ($this->getAttribute(($context["deliveryDateArray"] ?? null), $this->getAttribute($context["Shipping"], "id", array()), array(), "array") != null))) {
                echo twig_escape_filter($this->env, $this->getAttribute(($context["deliveryDateArray"] ?? null), $this->getAttribute($context["Shipping"], "id", array()), array(), "array"), "html", null, true);
            } else {
                echo "指定なし";
            }
            // line 45
            echo "
    　送付先";
            // line 46
            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
            echo "お届け希望時間：";
            echo twig_escape_filter($this->env, (($this->getAttribute($context["Shipping"], "shipping_delivery_time", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["Shipping"], "shipping_delivery_time", array()), "指定なし")) : ("指定なし")), "html", null, true);
            echo "
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['Shipping'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 48
        echo "■通信欄
";
        // line 49
        echo twig_escape_filter($this->env, $this->getAttribute(($context["Order"] ?? null), "message", array()), "html", null, true);
        echo "
";
    }

    public function getTemplateName()
    {
        return "NEConnect/Resource/template/default/Mail/order_to_NE.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  257 => 49,  254 => 48,  236 => 46,  233 => 45,  225 => 44,  219 => 43,  215 => 42,  205 => 41,  197 => 40,  189 => 39,  181 => 38,  173 => 37,  152 => 36,  146 => 33,  143 => 32,  139 => 30,  131 => 28,  129 => 27,  125 => 26,  121 => 25,  117 => 24,  113 => 23,  109 => 22,  106 => 21,  98 => 19,  94 => 18,  89 => 17,  83 => 16,  79 => 15,  75 => 14,  69 => 13,  64 => 11,  59 => 9,  53 => 8,  47 => 7,  41 => 6,  35 => 5,  29 => 4,  24 => 2,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "NEConnect/Resource/template/default/Mail/order_to_NE.twig", "/home/ancharme/ancharme.jp/public_html/app/Plugin/NEConnect/Resource/template/default/Mail/order_to_NE.twig");
    }
}
