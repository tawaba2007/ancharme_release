<?php

/* __string_template__f585d797c115cd64f6a458bc462d63e56a73361fed91d1290c293bb11878ab91 */
class __TwigTemplate_0fb9586e0b82e00ca1637cfdc4a7145487f9cd1a6caf4fd6e5d248bdae15d20e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 22
        $this->parent = $this->loadTemplate("default_frame.twig", "__string_template__f585d797c115cd64f6a458bc462d63e56a73361fed91d1290c293bb11878ab91", 22);
        $this->blocks = array(
            'main' => array($this, 'block_main'),
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

    // line 24
    public function block_main($context, array $blocks = array())
    {
        // line 25
        echo "    <h1 class=\"page-heading\">お届け先の指定</h1>
    <div id=\"deliver_wrap\" class=\"container-fluid\">
        <form method=\"post\" action=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getUrl("shopping_shipping", array("id" => ($context["shippingId"] ?? null))), "html", null, true);
        echo "\">
            <div id=\"deliveradd_select\" class=\"row\">
                <div id=\"list_box__body\" class=\"col-sm-10 col-sm-offset-1\">
                    <p id=\"list_box__add_button\">
                    ";
        // line 31
        if ((twig_length_filter($this->env, $this->getAttribute(($context["Customer"] ?? null), "CustomerAddresses", array())) < $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "deliv_addr_max", array()))) {
            // line 32
            echo "                        <a href=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getUrl("shopping_shipping_edit", array("id" => ($context["shippingId"] ?? null))), "html", null, true);
            echo "\" class=\"btn btn-default btn-sm\">新規お届け先を追加する</a>
                    ";
        } else {
            // line 34
            echo "                        <span id=\"list_box__deliv_addr_max_message\" class=\"text-danger\">お届け先登録上限の";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "deliv_addr_max", array()), "html", null, true);
            echo "件に達しています。お届け先を入力したい場合は、削除か変更を行ってください</span>
                    ";
        }
        // line 36
        echo "                    </p>
                    ";
        // line 37
        if (($context["error"] ?? null)) {
            // line 38
            echo "                        <p id=\"list_box__deliv_addr_alert\" class=\"text-danger\">お届け先を指定してください。</p>
                    ";
        }
        // line 40
        echo "
                    ";
        // line 41
        if ((twig_length_filter($this->env, $this->getAttribute(($context["Customer"] ?? null), "CustomerAddresses", array())) > 0)) {
            // line 42
            echo "                     <div id=\"list_box__list_body\" class=\"table address_table\">
                        <div id=\"list_box__list_body_inner\" class=\"tbody\">
                            ";
            // line 44
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["Customer"] ?? null), "CustomerAddresses", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["CustomerAddress"]) {
                // line 45
                echo "                            <div id=\"list_box__item--";
                echo twig_escape_filter($this->env, $this->getAttribute($context["CustomerAddress"], "id", array()), "html", null, true);
                echo "\" class=\"addr_box tr\">
                            <div id=\"list_box__id--";
                // line 46
                echo twig_escape_filter($this->env, $this->getAttribute($context["CustomerAddress"], "id", array()), "html", null, true);
                echo "\" class=\"icon_radio td\"><input type=\"radio\" id=\"address";
                echo twig_escape_filter($this->env, $this->getAttribute($context["CustomerAddress"], "id", array()), "html", null, true);
                echo "\" class=\"no-style\" name=\"address\" value=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["CustomerAddress"], "id", array()), "html", null, true);
                echo "\" /></div>
                            <div id=\"list_box__address_area--";
                // line 47
                echo twig_escape_filter($this->env, $this->getAttribute($context["CustomerAddress"], "id", array()), "html", null, true);
                echo "\" class=\"column td\">
                                <label for=\"address";
                // line 48
                echo twig_escape_filter($this->env, $this->getAttribute($context["CustomerAddress"], "id", array()), "html", null, true);
                echo "\">
                                    <p id=\"list_box__address--";
                // line 49
                echo twig_escape_filter($this->env, $this->getAttribute($context["CustomerAddress"], "id", array()), "html", null, true);
                echo "\" class=\"address\">
                                        ";
                // line 50
                echo twig_escape_filter($this->env, $this->getAttribute($context["CustomerAddress"], "name01", array()), "html", null, true);
                echo "&nbsp;";
                echo twig_escape_filter($this->env, $this->getAttribute($context["CustomerAddress"], "name02", array()), "html", null, true);
                echo "<br>
                                        〒";
                // line 51
                echo twig_escape_filter($this->env, $this->getAttribute($context["CustomerAddress"], "zip01", array()), "html", null, true);
                echo "-";
                echo twig_escape_filter($this->env, $this->getAttribute($context["CustomerAddress"], "zip02", array()), "html", null, true);
                echo " ";
                echo twig_escape_filter($this->env, $this->getAttribute($context["CustomerAddress"], "Pref", array()), "html", null, true);
                echo twig_escape_filter($this->env, $this->getAttribute($context["CustomerAddress"], "addr01", array()), "html", null, true);
                echo twig_escape_filter($this->env, $this->getAttribute($context["CustomerAddress"], "addr02", array()), "html", null, true);
                echo "<br>
                                        ";
                // line 52
                echo twig_escape_filter($this->env, $this->getAttribute($context["CustomerAddress"], "tel01", array()), "html", null, true);
                echo "-";
                echo twig_escape_filter($this->env, $this->getAttribute($context["CustomerAddress"], "tel02", array()), "html", null, true);
                echo "-";
                echo twig_escape_filter($this->env, $this->getAttribute($context["CustomerAddress"], "tel03", array()), "html", null, true);
                echo "
                                    </p>
                                </label>
                            </div>
                            </div>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['CustomerAddress'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 58
            echo "                            </div>
                        </div><!--/table-->
                        ";
        }
        // line 61
        echo "
                    <div id=\"list_box__button_menu\" class=\"row no-padding\">
                        <div class=\"btn_group col-sm-offset-4 col-sm-4\">
                            <p id=\"list_box__confirm_button\"><button type=\"submit\" class=\"btn btn-primary btn-block\">選択したお届け先に送る</button></p>
                            <p id=\"list_box__back_button\"><a href=\"";
        // line 65
        echo $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getUrl("shopping");
        echo "\" class=\"btn btn-info btn-block\">戻る</a></p>
                        </div>
                    </div>

                </div>
            </div><!-- /.row -->
        </form>

    </div>
";
    }

    public function getTemplateName()
    {
        return "__string_template__f585d797c115cd64f6a458bc462d63e56a73361fed91d1290c293bb11878ab91";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  146 => 65,  140 => 61,  135 => 58,  119 => 52,  109 => 51,  103 => 50,  99 => 49,  95 => 48,  91 => 47,  83 => 46,  78 => 45,  74 => 44,  70 => 42,  68 => 41,  65 => 40,  61 => 38,  59 => 37,  56 => 36,  50 => 34,  44 => 32,  42 => 31,  35 => 27,  31 => 25,  28 => 24,  11 => 22,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "__string_template__f585d797c115cd64f6a458bc462d63e56a73361fed91d1290c293bb11878ab91", "");
    }
}
