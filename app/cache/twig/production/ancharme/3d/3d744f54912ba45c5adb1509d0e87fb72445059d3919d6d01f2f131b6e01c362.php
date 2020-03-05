<?php

/* __string_template__13f027792f4647cc9d8bd172b4176affa5d5df5477750ba2d283ad77fe71925a */
class __TwigTemplate_1e24ce1c534861fc67431aedecf85c2a33a2bf0342a530d36add59f170c99e14 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 22
        $this->parent = $this->loadTemplate("default_frame.twig", "__string_template__13f027792f4647cc9d8bd172b4176affa5d5df5477750ba2d283ad77fe71925a", 22);
        $this->blocks = array(
            'javascript' => array($this, 'block_javascript'),
            'main' => array($this, 'block_main'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "default_frame.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 24
        $context["body_class"] = "product_page list";
        // line 22
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 26
    public function block_javascript($context, array $blocks = array())
    {
        // line 27
        echo "<script>
    // 並び順を変更
    function fnChangeOrderBy(orderby) {
        eccube.setValue('orderby', orderby);
        eccube.setValue('pageno', 1);
        eccube.submitForm();
    }

    // 表示件数を変更
    function fnChangeDispNumber(dispNumber) {
        eccube.setValue('disp_number', dispNumber);
        eccube.setValue('pageno', 1);
        eccube.submitForm();
    }
    // 商品表示BOXの高さを揃える
    \$(window).load(function () {
        \$('.product_item').matchHeight();
    });
</script>
";
    }

    // line 48
    public function block_main($context, array $blocks = array())
    {
        // line 49
        echo "<form name=\"form1\" id=\"form1\" method=\"get\" action=\"?\">
    ";
        // line 50
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock(($context["search_form"] ?? null), 'widget');
        echo "
</form>
<!-- ▼topicpath▼ -->
<div id=\"topicpath\" class=\"row\">
    <ol id=\"list_header_menu\">
        <li><a href=\"";
        // line 55
        echo $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getUrl("product_list");
        echo "\">全商品</a></li>
        ";
        // line 56
        if ( !(null === ($context["Category"] ?? null))) {
            // line 57
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["Category"] ?? null), "path", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["Path"]) {
                // line 58
                echo "        <li><a href=\"";
                echo $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getUrl("product_list");
                echo "?category_id=";
                echo twig_escape_filter($this->env, $this->getAttribute($context["Path"], "id", array()), "html", null, true);
                echo "\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["Path"], "name", array()), "html", null, true);
                echo "</a></li>
        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['Path'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 60
            echo "        ";
        }
        // line 61
        echo "        ";
        if ($this->getAttribute($this->getAttribute($this->getAttribute(($context["search_form"] ?? null), "vars", array()), "value", array()), "name", array())) {
            // line 62
            echo "        <li>「";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["search_form"] ?? null), "vars", array()), "value", array()), "name", array()), "html", null, true);
            echo "」の検索結果</li>
        ";
        }
        // line 64
        echo "    </ol>
</div>
<!-- ▲topicpath▲ -->
<div id=\"result_info_box\" class=\"row\">
    <form name=\"page_navi_top\" id=\"page_navi_top\" action=\"?\">
        <p id=\"result_info_box__item_count\" class=\"intro col-sm-6\"><strong><span
                    id=\"productscount\">";
        // line 70
        echo twig_escape_filter($this->env, $this->getAttribute(($context["pagination"] ?? null), "totalItemCount", array()), "html", null, true);
        echo "</span>件</strong>の商品がみつかりました。
        </p>

        <div id=\"result_info_box__menu_box\" class=\"col-sm-6 no-padding\">
            <ul id=\"result_info_box__menu\" class=\"pagenumberarea clearfix\">
                <li id=\"result_info_box__disp_menu\">
                    ";
        // line 76
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock(($context["disp_number_form"] ?? null), 'widget', array("id" => "", "attr" => array("onchange" => "javascript:fnChangeDispNumber(this.value);")));
        // line 77
        echo "
                </li>
                <li id=\"result_info_box__order_menu\">
                    ";
        // line 80
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock(($context["order_by_form"] ?? null), 'widget', array("id" => "", "attr" => array("onchange" => "javascript:fnChangeOrderBy(this.value);")));
        // line 81
        echo "
                </li>
            </ul>
        </div>

        ";
        // line 86
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["disp_number_form"] ?? null), "getIterator", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["f"]) {
            // line 87
            echo "        ";
            if (preg_match("[^plg*]", $this->getAttribute($this->getAttribute($context["f"], "vars", array()), "name", array()))) {
                // line 88
                echo "        ";
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($context["f"], 'label');
                echo "
        ";
                // line 89
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($context["f"], 'widget');
                echo "
        ";
                // line 90
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($context["f"], 'errors');
                echo "
        ";
            }
            // line 92
            echo "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['f'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 93
        echo "
        ";
        // line 94
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["order_by_form"] ?? null), "getIterator", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["f"]) {
            // line 95
            echo "        ";
            if (preg_match("[^plg*]", $this->getAttribute($this->getAttribute($context["f"], "vars", array()), "name", array()))) {
                // line 96
                echo "        ";
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($context["f"], 'label');
                echo "
        ";
                // line 97
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($context["f"], 'widget');
                echo "
        ";
                // line 98
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($context["f"], 'errors');
                echo "
        ";
            }
            // line 100
            echo "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['f'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 101
        echo "

    </form>
</div>

<!-- ▼item_list▼ -->
<div id=\"item_list\">
    <div class=\"row no-padding\">
        ";
        // line 109
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["pagination"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["Product"]) {
            // line 110
            echo "        <div id=\"result_list_box--";
            echo twig_escape_filter($this->env, $this->getAttribute($context["Product"], "id", array()), "html", null, true);
            echo "\" class=\"col-sm-3 col-xs-6\">
            <div id=\"result_list__item--";
            // line 111
            echo twig_escape_filter($this->env, $this->getAttribute($context["Product"], "id", array()), "html", null, true);
            echo "\" class=\"product_item\">
                <a href=\"";
            // line 112
            echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getUrl("product_detail", array("id" => $this->getAttribute($context["Product"], "id", array()))), "html", null, true);
            echo "\">
                    <div id=\"result_list__image--";
            // line 113
            echo twig_escape_filter($this->env, $this->getAttribute($context["Product"], "id", array()), "html", null, true);
            echo "\" class=\"item_photo\">
                        <img src=\"";
            // line 114
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "image_save_urlpath", array()), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getNoImageProduct($this->getAttribute($context["Product"], "main_list_image", array())), "html", null, true);
            echo "\">
                    </div>
                    <dl id=\"result_list__detail--";
            // line 116
            echo twig_escape_filter($this->env, $this->getAttribute($context["Product"], "id", array()), "html", null, true);
            echo "\">
                        <dt id=\"result_list__name--";
            // line 117
            echo twig_escape_filter($this->env, $this->getAttribute($context["Product"], "id", array()), "html", null, true);
            echo "\" class=\"item_name\">";
            echo twig_escape_filter($this->env, $this->getAttribute($context["Product"], "name", array()), "html", null, true);
            echo "</dt>
                        ";
            // line 118
            if ($this->getAttribute($context["Product"], "description_list", array())) {
                // line 119
                echo "                        <dd id=\"result_list__description_list--";
                echo twig_escape_filter($this->env, $this->getAttribute($context["Product"], "id", array()), "html", null, true);
                echo "\" class=\"item_comment\">
                            ";
                // line 120
                echo nl2br($this->getAttribute($context["Product"], "description_list", array()));
                echo "</dd>
                        ";
            }
            // line 122
            echo "                        ";
            if ($this->getAttribute($context["Product"], "hasProductClass", array())) {
                // line 123
                echo "                        ";
                if (($this->getAttribute($context["Product"], "getPrice02Min", array()) == $this->getAttribute($context["Product"], "getPrice02Max", array()))) {
                    // line 124
                    echo "                        <dd id=\"result_list__price02_inc_tax--";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["Product"], "id", array()), "html", null, true);
                    echo "\" class=\"item_price\">
                            ";
                    // line 125
                    echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getPriceFilter($this->getAttribute($context["Product"], "getPrice02Min", array())), "html", null, true);
                    echo "
                        </dd>
                        ";
                } else {
                    // line 128
                    echo "                        <dd id=\"result_list__price02_inc_tax--";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["Product"], "id", array()), "html", null, true);
                    echo "\" class=\"item_price\">
                            ";
                    // line 129
                    echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getPriceFilter($this->getAttribute($context["Product"], "getPrice02Min", array())), "html", null, true);
                    echo " ～ ";
                    echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getPriceFilter($this->getAttribute($context["Product"], "getPrice02Max", array())), "html", null, true);
                    echo "
                        </dd>
                        ";
                }
                // line 132
                echo "                        ";
            } else {
                // line 133
                echo "                        <dd id=\"result_list__price02_inc_tax--";
                echo twig_escape_filter($this->env, $this->getAttribute($context["Product"], "id", array()), "html", null, true);
                echo "\" class=\"item_price\">
                            ";
                // line 134
                echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getPriceFilter($this->getAttribute($context["Product"], "getPrice02Min", array())), "html", null, true);
                echo "</dd>
                        ";
            }
            // line 136
            echo "                    </dl>
                </a>
            </div>
        </div>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['Product'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 141
        echo "    </div>

</div>
<!-- ▲item_list▲ -->
";
        // line 145
        if (($this->getAttribute(($context["pagination"] ?? null), "totalItemCount", array()) > 0)) {
            // line 146
            $this->loadTemplate("pagination.twig", "__string_template__13f027792f4647cc9d8bd172b4176affa5d5df5477750ba2d283ad77fe71925a", 146)->display(array_merge($context, array("pages" => $this->getAttribute(($context["pagination"] ?? null), "paginationData", array()))));
        }
    }

    public function getTemplateName()
    {
        return "__string_template__13f027792f4647cc9d8bd172b4176affa5d5df5477750ba2d283ad77fe71925a";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  319 => 146,  317 => 145,  311 => 141,  301 => 136,  296 => 134,  291 => 133,  288 => 132,  280 => 129,  275 => 128,  269 => 125,  264 => 124,  261 => 123,  258 => 122,  253 => 120,  248 => 119,  246 => 118,  240 => 117,  236 => 116,  229 => 114,  225 => 113,  221 => 112,  217 => 111,  212 => 110,  208 => 109,  198 => 101,  192 => 100,  187 => 98,  183 => 97,  178 => 96,  175 => 95,  171 => 94,  168 => 93,  162 => 92,  157 => 90,  153 => 89,  148 => 88,  145 => 87,  141 => 86,  134 => 81,  132 => 80,  127 => 77,  125 => 76,  116 => 70,  108 => 64,  102 => 62,  99 => 61,  96 => 60,  83 => 58,  78 => 57,  76 => 56,  72 => 55,  64 => 50,  61 => 49,  58 => 48,  35 => 27,  32 => 26,  28 => 22,  26 => 24,  11 => 22,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "__string_template__13f027792f4647cc9d8bd172b4176affa5d5df5477750ba2d283ad77fe71925a", "");
    }
}
