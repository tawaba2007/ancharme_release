<?php

/* __string_template__282d52906981b55b2103788b11abc082702bf8a42ed5a27178463b5121e0699d */
class __TwigTemplate_fca5a225c394063f71c234d649515c2d3c66e9eea8c229d6264e853c18d6d9ce extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 22
        $this->parent = $this->loadTemplate("default_frame.twig", "__string_template__282d52906981b55b2103788b11abc082702bf8a42ed5a27178463b5121e0699d", 22);
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
        // line 24
        $context["mypageno"] = "favorite";
        // line 26
        $context["body_class"] = "mypage";
        // line 22
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 28
    public function block_main($context, array $blocks = array())
    {
        // line 29
        echo "    <h1 class=\"page-heading\">マイページ/お気に入り一覧</h1>
    <div id=\"favorite_wrap\" class=\"container-fluid\">

        ";
        // line 32
        $this->loadTemplate("Mypage/navi.twig", "__string_template__282d52906981b55b2103788b11abc082702bf8a42ed5a27178463b5121e0699d", 32)->display($context);
        // line 33
        echo "
        <div id=\"favorite_list_box\" class=\"row\">
            <div id=\"favorite_list_box__body\" class=\"col-md-12\">
            ";
        // line 36
        if (($this->getAttribute(($context["pagination"] ?? null), "totalItemCount", array()) > 0)) {
            // line 37
            echo "                <p id=\"favorite_lst__total_item_count\" class=\"intro\"><strong>";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["pagination"] ?? null), "totalItemCount", array()), "html", null, true);
            echo "件</strong>のお気に入りがあります。</p>
                <div id=\"item_list\">
                    <div id=\"favorite_list__list\" class=\"row no-padding\">
                        ";
            // line 40
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["pagination"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["FavoriteProduct"]) {
                // line 41
                echo "                        ";
                $context["Product"] = $this->getAttribute($context["FavoriteProduct"], "Product", array());
                // line 42
                echo "                        <div id=\"favorite__list--";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["Product"] ?? null), "id", array()), "html", null, true);
                echo "\" class=\"col-sm-3 col-xs-6\">
                            <div id=\"favorite_list__item--";
                // line 43
                echo twig_escape_filter($this->env, $this->getAttribute(($context["Product"] ?? null), "id", array()), "html", null, true);
                echo "\" class=\"product_item\">
                                <a href=\"";
                // line 44
                echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getUrl("product_detail", array("id" => $this->getAttribute(($context["Product"] ?? null), "id", array()))), "html", null, true);
                echo "\">
                                    <div id=\"favorite_list__image--";
                // line 45
                echo twig_escape_filter($this->env, $this->getAttribute(($context["Product"] ?? null), "id", array()), "html", null, true);
                echo "\" class=\"item_photo\">
                                        <img src=\"";
                // line 46
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "image_save_urlpath", array()), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getNoImageProduct($this->getAttribute(($context["Product"] ?? null), "main_list_image", array())), "html", null, true);
                echo "\" alt=\"";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["Product"] ?? null), "name", array()), "html", null, true);
                echo "\"/>
                                    </div>
                                </a>
                                <a href=\"";
                // line 49
                echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getUrl("mypage_favorite_delete", array("id" => $this->getAttribute(($context["Product"] ?? null), "id", array()))), "html", null, true);
                echo "\" ";
                echo $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getCsrfTokenForAnchor();
                echo " data-method=\"delete\">
                                    <button type=\"button\" class=\"btn_circle\"><svg class=\"cb cb-close\"><use xlink:href=\"#cb-close\"></use></svg></button>
                                </a>
                                <a href=\"";
                // line 52
                echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getUrl("product_detail", array("id" => $this->getAttribute(($context["Product"] ?? null), "id", array()))), "html", null, true);
                echo "\">
                                    <dl id=\"favorite_list__detail--";
                // line 53
                echo twig_escape_filter($this->env, $this->getAttribute(($context["Product"] ?? null), "id", array()), "html", null, true);
                echo "\">
                                        <dt id=\"favorite_list__name--";
                // line 54
                echo twig_escape_filter($this->env, $this->getAttribute(($context["Product"] ?? null), "id", array()), "html", null, true);
                echo "\" class=\"item_name\" style=\"height: 22px;\"> ";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["Product"] ?? null), "name", array()), "html", null, true);
                echo "</dt>
                                        <dd id=\"favorite_list__price02_inc_tax--";
                // line 55
                echo twig_escape_filter($this->env, $this->getAttribute(($context["Product"] ?? null), "id", array()), "html", null, true);
                echo "\" class=\"item_price\">
                                            ";
                // line 56
                if (($this->getAttribute(($context["Product"] ?? null), "price02_inc_tax_min", array()) == $this->getAttribute(($context["Product"] ?? null), "price02_inc_tax_max", array()))) {
                    // line 57
                    echo "                                                ";
                    echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getPriceFilter($this->getAttribute(($context["Product"] ?? null), "price02_inc_tax_min", array())), "html", null, true);
                    echo "
                                            ";
                } else {
                    // line 59
                    echo "                                                ";
                    echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getPriceFilter($this->getAttribute(($context["Product"] ?? null), "price02_inc_tax_min", array())), "html", null, true);
                    echo "～";
                    echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getPriceFilter($this->getAttribute(($context["Product"] ?? null), "price02_inc_tax_max", array())), "html", null, true);
                    echo "
                                            ";
                }
                // line 61
                echo "                                        </dd>
                                    </dl>
                                </a>
                            </div>
                        </div>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['FavoriteProduct'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 67
            echo "                    </div>
                </div>
                <div id=\"favorite_list__pagination\" class=\"paging\">
                    ";
            // line 70
            $this->loadTemplate("pagination.twig", "__string_template__282d52906981b55b2103788b11abc082702bf8a42ed5a27178463b5121e0699d", 70)->display(array_merge($context, array("pages" => $this->getAttribute(($context["pagination"] ?? null), "paginationData", array()))));
            // line 71
            echo "                </div>
            ";
        } else {
            // line 73
            echo "                <p id=\"favorite_list__not_found_message\" class=\"intro\">お気に入りが登録されていません。</p>
            ";
        }
        // line 75
        echo "            </div>
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "__string_template__282d52906981b55b2103788b11abc082702bf8a42ed5a27178463b5121e0699d";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  159 => 75,  155 => 73,  151 => 71,  149 => 70,  144 => 67,  133 => 61,  125 => 59,  119 => 57,  117 => 56,  113 => 55,  107 => 54,  103 => 53,  99 => 52,  91 => 49,  81 => 46,  77 => 45,  73 => 44,  69 => 43,  64 => 42,  61 => 41,  57 => 40,  50 => 37,  48 => 36,  43 => 33,  41 => 32,  36 => 29,  33 => 28,  29 => 22,  27 => 26,  25 => 24,  11 => 22,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "__string_template__282d52906981b55b2103788b11abc082702bf8a42ed5a27178463b5121e0699d", "");
    }
}
