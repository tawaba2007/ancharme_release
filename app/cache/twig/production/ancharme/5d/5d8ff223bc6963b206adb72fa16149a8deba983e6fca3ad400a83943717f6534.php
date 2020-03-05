<?php

/* UaGaEEc/Resource/template/default/uagaeec.twig */
class __TwigTemplate_1be021c7d1342aae6b57c7309be092e7c4bcf5ce9e00261bc4ea3c19190efd34 extends Twig_Template
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
        // line 8
        if ((twig_length_filter($this->env, $this->getAttribute(($context["uagaeec"] ?? null), "tid", array())) > 0)) {
            // line 9
            echo "<script type=\"text/javascript\">
  if (typeof ga == 'undefined') {
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');
  }
  ga('create', '";
            // line 16
            echo twig_escape_filter($this->env, $this->getAttribute(($context["uagaeec"] ?? null), "tid", array()), "html", null, true);
            echo "', {
    ";
            // line 17
            if ((twig_length_filter($this->env, $this->getAttribute(($context["uagaeec"] ?? null), "crossdomain_linker", array())) > 0)) {
                // line 18
                echo "      'allowLinker': true,
    ";
            }
            // line 20
            echo "    ";
            if ((twig_length_filter($this->env, $this->getAttribute(($context["uagaeec"] ?? null), "uid", array())) > 0)) {
                // line 21
                echo "      'userId': '";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["uagaeec"] ?? null), "uid", array()), "html", null, true);
                echo "',
    ";
            }
            // line 23
            echo "    'name': 'plg_uagaeec',
    'cookieDomain': 'auto'
  });
  ";
            // line 26
            if ((twig_length_filter($this->env, $this->getAttribute(($context["uagaeec"] ?? null), "crossdomain_linker", array())) > 0)) {
                // line 27
                echo "    ga('plg_uagaeec.require', 'linker');
    ga('plg_uagaeec.linker:autoLink', [";
                // line 28
                echo $this->getAttribute(($context["uagaeec"] ?? null), "crossdomain_linker", array());
                echo "]);
  ";
            }
            // line 30
            echo "  ";
            if (($this->getAttribute(($context["uagaeec"] ?? null), "display_features", array()) == $this->getAttribute($this->getAttribute(($context["config"] ?? null), "const", array()), "UAGAEEC_OP_WITH_DISPLAY_FEATURES", array()))) {
                // line 31
                echo "    ga('plg_uagaeec.require', 'displayfeatures');
  ";
            }
            // line 33
            echo "  ";
            if (($this->getAttribute(($context["uagaeec"] ?? null), "eec", array()) == $this->getAttribute($this->getAttribute(($context["config"] ?? null), "const", array()), "UAGAEEC_USE_EEC", array()))) {
                // line 34
                echo "    ga('plg_uagaeec.require', 'ec');

";
                // line 37
                echo "    ";
                if ($this->getAttribute(($context["uagaeec"] ?? null), "promo", array())) {
                    // line 38
                    echo "      ga('plg_uagaeec.ec:addPromo', {
        'id': '";
                    // line 39
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["uagaeec"] ?? null), "promo", array()), "id", array()), "html", null, true);
                    echo "',
        'name': '";
                    // line 40
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["uagaeec"] ?? null), "promo", array()), "name", array()), "html", null, true);
                    echo "'
        ";
                    // line 41
                    if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute(($context["uagaeec"] ?? null), "promo", array()), "creative", array())) > 0)) {
                        // line 42
                        echo "        , 'creative': '";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["uagaeec"] ?? null), "promo", array()), "creative", array()), "html", null, true);
                        echo "'
        ";
                    }
                    // line 44
                    echo "        ";
                    if ((twig_length_filter($this->env, $this->getAttribute($this->getAttribute(($context["uagaeec"] ?? null), "promo", array()), "position", array())) > 0)) {
                        // line 45
                        echo "        , 'position': '";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["uagaeec"] ?? null), "promo", array()), "position", array()), "html", null, true);
                        echo "'
        ";
                    }
                    // line 47
                    echo "      });
      ga('plg_uagaeec.ec:setAction', 'promo_click');
      ga('plg_uagaeec.send', 'event', 'Internal Promotions', 'click', '";
                    // line 49
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["uagaeec"] ?? null), "promo", array()), "name", array()), "html", null, true);
                    echo "');
";
                    // line 51
                    echo "
";
                    // line 53
                    echo "    ";
                } elseif ($this->getAttribute(($context["uagaeec"] ?? null), "click", array())) {
                    // line 54
                    echo "      ";
                    if (array_key_exists("products", $context)) {
                        // line 55
                        echo "        ";
                        $context['_parent'] = $context;
                        $context['_seq'] = twig_ensure_traversable(($context["products"] ?? null));
                        foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                            // line 56
                            echo "          ga('plg_uagaeec.ec:addProduct', {
            ";
                            // line 57
                            if ((twig_length_filter($this->env, $this->getAttribute($context["product"], "category", array())) > 0)) {
                                // line 58
                                echo "            'category': '";
                                echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "category", array()), "html", null, true);
                                echo "',
            ";
                            }
                            // line 60
                            echo "            'price': '";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "price", array()), "html", null, true);
                            echo "',
            ";
                            // line 61
                            if (($this->getAttribute($context["product"], "quantity", array()) > 0)) {
                                // line 62
                                echo "            'quantity': ";
                                echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "quantity", array()), "html", null, true);
                                echo ",
            ";
                            }
                            // line 64
                            echo "            'id': '";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "id", array()), "html", null, true);
                            echo "',
            'name': '";
                            // line 65
                            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "name", array()), "html", null, true);
                            echo "'
          });
        ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 68
                        echo "      ";
                    }
                    // line 69
                    echo "      ga('plg_uagaeec.ec:setAction', 'click', ";
                    echo "{";
                    echo $this->getAttribute(($context["uagaeec"] ?? null), "click", array());
                    echo "}";
                    echo ");
      ga('plg_uagaeec.send', 'event', 'Product clicks', 'click'";
                    // line 70
                    if (array_key_exists("products", $context)) {
                        echo ", 'id";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["products"] ?? null), 0, array(), "array"), "id", array()), "html", null, true);
                        echo " - ";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["products"] ?? null), 0, array(), "array"), "name", array()), "html", null, true);
                        echo "'";
                    }
                    echo ");
    ";
                }
                // line 73
                echo "
";
                // line 75
                echo "    ";
                if (array_key_exists("impressions", $context)) {
                    // line 76
                    echo "      ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(($context["impressions"] ?? null));
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
                    foreach ($context['_seq'] as $context["_key"] => $context["impression"]) {
                        // line 77
                        echo "        ga('plg_uagaeec.ec:addImpression', {
          'id': '";
                        // line 78
                        echo twig_escape_filter($this->env, $this->getAttribute($context["impression"], "id", array()), "html", null, true);
                        echo "',
          'name': '";
                        // line 79
                        echo twig_escape_filter($this->env, $this->getAttribute($context["impression"], "name", array()), "html", null, true);
                        echo "',
          'list': '";
                        // line 80
                        echo twig_escape_filter($this->env, $this->getAttribute($context["impression"], "list", array()), "html", null, true);
                        echo "',
          ";
                        // line 81
                        if ((twig_length_filter($this->env, $this->getAttribute($context["impression"], "category", array())) > 0)) {
                            // line 82
                            echo "          'category': '";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["impression"], "category", array()), "html", null, true);
                            echo "',
          ";
                        }
                        // line 84
                        echo "          'price': '";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["impression"], "price", array()), "html", null, true);
                        echo "',
          'position': ";
                        // line 85
                        echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
                        echo "
        });
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
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['impression'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 88
                    echo "    ";
                }
                // line 90
                echo "
";
                // line 92
                echo "    ";
                if (array_key_exists("products", $context)) {
                    // line 93
                    echo "      ";
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(($context["products"] ?? null));
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
                    foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                        // line 94
                        echo "        ga('plg_uagaeec.ec:addProduct', {
          'id': '";
                        // line 95
                        echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "id", array()), "html", null, true);
                        echo "',
          'name': '";
                        // line 96
                        echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "name", array()), "html", null, true);
                        echo "',
          ";
                        // line 97
                        if ((twig_length_filter($this->env, $this->getAttribute($context["product"], "category", array())) > 0)) {
                            // line 98
                            echo "          'category': '";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "category", array()), "html", null, true);
                            echo "',
          ";
                        }
                        // line 100
                        echo "          'price': '";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "price", array()), "html", null, true);
                        echo "',
          ";
                        // line 101
                        if (($this->getAttribute($context["product"], "quantity", array()) > 0)) {
                            // line 102
                            echo "          'quantity': ";
                            echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "quantity", array()), "html", null, true);
                            echo ",
          ";
                        }
                        // line 104
                        echo "          'position': ";
                        echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
                        echo "
        });
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
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 107
                    echo "    ";
                }
                // line 109
                echo "
";
                // line 111
                echo "    ";
                if (array_key_exists("action", $context)) {
                    // line 112
                    echo "      ga('plg_uagaeec.ec:setAction', '";
                    echo twig_escape_filter($this->env, $this->getAttribute(($context["action"] ?? null), "action", array()), "html", null, true);
                    echo "'";
                    if ((twig_length_filter($this->env, $this->getAttribute(($context["action"] ?? null), "option", array())) > 0)) {
                        echo ", ";
                        echo "{";
                        echo $this->getAttribute(($context["action"] ?? null), "option", array());
                        echo "}";
                    }
                    echo ");
    ";
                }
                // line 115
                echo "
  ";
            } elseif (($this->getAttribute(            // line 116
($context["uagaeec"] ?? null), "eec", array()) == $this->getAttribute($this->getAttribute(($context["config"] ?? null), "const", array()), "UAGAEEC_USE_EC", array()))) {
                // line 117
                echo "    ";
                if (array_key_exists("transaction", $context)) {
                    // line 118
                    echo "      ga('plg_uagaeec.require', 'ecommerce');
      ga('plg_uagaeec.ecommerce:addTransaction', {
        'id': ";
                    // line 120
                    echo $this->getAttribute(($context["transaction"] ?? null), "id", array());
                    echo ",
        'revenue': ";
                    // line 121
                    echo $this->getAttribute(($context["transaction"] ?? null), "revenue", array());
                    echo ",
        'tax': ";
                    // line 122
                    echo $this->getAttribute(($context["transaction"] ?? null), "tax", array());
                    echo ",
        'shipping': ";
                    // line 123
                    echo $this->getAttribute(($context["transaction"] ?? null), "shipping", array());
                    echo "
      });
      ";
                    // line 125
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(($context["products"] ?? null));
                    foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                        // line 126
                        echo "        ga('plg_uagaeec.ecommerce:addItem', {
          'id': ";
                        // line 127
                        echo $this->getAttribute(($context["transaction"] ?? null), "id", array());
                        echo ",
          'name': '";
                        // line 128
                        echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "name", array()), "html", null, true);
                        echo "',
          'sku': '";
                        // line 129
                        echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "id", array()), "html", null, true);
                        echo "',
          'category': '";
                        // line 130
                        echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "category", array()), "html", null, true);
                        echo "',
          'price': '";
                        // line 131
                        echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "price", array()), "html", null, true);
                        echo "',
          'quantity': ";
                        // line 132
                        echo twig_escape_filter($this->env, $this->getAttribute($context["product"], "quantity", array()), "html", null, true);
                        echo "
        });
      ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 135
                    echo "    ga('plg_uagaeec.ecommerce:send');
    ";
                }
                // line 137
                echo "  ";
            }
            // line 138
            echo "
  ga('plg_uagaeec.send', 'pageview');
  ";
            // line 140
            if (($this->getAttribute(($context["uagaeec"] ?? null), "user_timings", array()) == $this->getAttribute($this->getAttribute(($context["config"] ?? null), "const", array()), "UAGAEEC_OP_WITH_USER_TIMINGS", array()))) {
                // line 141
                echo "    if (window.performance) {
      var timeSincePageLoad = Math.round(performance.now());
      ga('plg_uagaeec.send', 'timing', 'EC-CUBE UaGaEEc Plugin', 'load', timeSincePageLoad);
    }
  ";
            }
            // line 146
            echo "</script>
";
        }
    }

    public function getTemplateName()
    {
        return "UaGaEEc/Resource/template/default/uagaeec.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  443 => 146,  436 => 141,  434 => 140,  430 => 138,  427 => 137,  423 => 135,  414 => 132,  410 => 131,  406 => 130,  402 => 129,  398 => 128,  394 => 127,  391 => 126,  387 => 125,  382 => 123,  378 => 122,  374 => 121,  370 => 120,  366 => 118,  363 => 117,  361 => 116,  358 => 115,  345 => 112,  342 => 111,  339 => 109,  336 => 107,  318 => 104,  312 => 102,  310 => 101,  305 => 100,  299 => 98,  297 => 97,  293 => 96,  289 => 95,  286 => 94,  268 => 93,  265 => 92,  262 => 90,  259 => 88,  242 => 85,  237 => 84,  231 => 82,  229 => 81,  225 => 80,  221 => 79,  217 => 78,  214 => 77,  196 => 76,  193 => 75,  190 => 73,  179 => 70,  172 => 69,  169 => 68,  160 => 65,  155 => 64,  149 => 62,  147 => 61,  142 => 60,  136 => 58,  134 => 57,  131 => 56,  126 => 55,  123 => 54,  120 => 53,  117 => 51,  113 => 49,  109 => 47,  103 => 45,  100 => 44,  94 => 42,  92 => 41,  88 => 40,  84 => 39,  81 => 38,  78 => 37,  74 => 34,  71 => 33,  67 => 31,  64 => 30,  59 => 28,  56 => 27,  54 => 26,  49 => 23,  43 => 21,  40 => 20,  36 => 18,  34 => 17,  30 => 16,  21 => 9,  19 => 8,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "UaGaEEc/Resource/template/default/uagaeec.twig", "/home/ancharme/ancharme.jp/public_html/app/Plugin/UaGaEEc/Resource/template/default/uagaeec.twig");
    }
}
