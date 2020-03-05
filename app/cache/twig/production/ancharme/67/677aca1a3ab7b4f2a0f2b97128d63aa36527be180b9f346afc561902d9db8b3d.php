<?php

/* default_frame.twig */
class __TwigTemplate_edd4a5f42a2b1d8bb7dd88f1c48f2d3a232f723d95644ab65d2039d75feb3527 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'stylesheet' => array($this, 'block_stylesheet'),
            'main' => array($this, 'block_main'),
            'javascript' => array($this, 'block_javascript'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!doctype html>
<html lang=\"ja\">
<head>
  <meta charset=\"utf-8\">
  <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
  <title>";
        // line 6
        echo twig_escape_filter($this->env, $this->getAttribute(($context["BaseInfo"] ?? null), "shop_name", array()), "html", null, true);
        if ((array_key_exists("subtitle", $context) &&  !twig_test_empty(($context["subtitle"] ?? null)))) {
            echo " / ";
            echo twig_escape_filter($this->env, ($context["subtitle"] ?? null), "html", null, true);
        } elseif ((array_key_exists("title", $context) &&  !twig_test_empty(($context["title"] ?? null)))) {
            echo " / ";
            echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
        }
        echo "</title>
  ";
        // line 7
        if ( !twig_test_empty($this->getAttribute(($context["PageLayout"] ?? null), "author", array()))) {
            // line 8
            echo "    <meta name=\"author\" content=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["PageLayout"] ?? null), "author", array()), "html", null, true);
            echo "\">
  ";
        }
        // line 10
        echo "  ";
        if ( !twig_test_empty($this->getAttribute(($context["PageLayout"] ?? null), "description", array()))) {
            // line 11
            echo "    <meta name=\"description\" content=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["PageLayout"] ?? null), "description", array()), "html", null, true);
            echo "\">
  ";
        }
        // line 13
        echo "  ";
        if ( !twig_test_empty($this->getAttribute(($context["PageLayout"] ?? null), "keyword", array()))) {
            // line 14
            echo "    <meta name=\"keywords\" content=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["PageLayout"] ?? null), "keyword", array()), "html", null, true);
            echo "\">
  ";
        }
        // line 16
        echo "  ";
        if ( !twig_test_empty($this->getAttribute(($context["PageLayout"] ?? null), "meta_robots", array()))) {
            // line 17
            echo "    <meta name=\"robots\" content=\"";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["PageLayout"] ?? null), "meta_robots", array()), "html", null, true);
            echo "\">
  ";
        }
        // line 19
        echo "  <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
  <link rel=\"icon\" href=\"";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "front_urlpath", array()), "html", null, true);
        echo "/img/common/favicon.ico\">


  <!-- スマホ用アイコン -->
  <link rel=\"apple-touch-icon\" sizes=\"180x180\" href=\"";
        // line 24
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "front_urlpath", array()), "html", null, true);
        echo "/img/common/apple-touch-icon.png\">
  <!-- Vendor
  ============================================= -->
  <link rel=\"stylesheet\" href=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "front_urlpath", array()), "html", null, true);
        echo "/css/style.css?v=";
        echo twig_escape_filter($this->env, twig_constant("Eccube\\Common\\Constant::VERSION"), "html", null, true);
        echo "\">
  <link rel=\"stylesheet\" href=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "front_urlpath", array()), "html", null, true);
        echo "/css/slick.css?v=";
        echo twig_escape_filter($this->env, twig_constant("Eccube\\Common\\Constant::VERSION"), "html", null, true);
        echo "\">
  <link rel=\"stylesheet\" href=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "front_urlpath", array()), "html", null, true);
        echo "/css/default.css?v=";
        echo twig_escape_filter($this->env, twig_constant("Eccube\\Common\\Constant::VERSION"), "html", null, true);
        echo "\">
  <link rel=\"stylesheet\" href=\"";
        // line 30
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "front_urlpath", array()), "html", null, true);
        echo "/css/origin.css?v=";
        echo twig_escape_filter($this->env, twig_constant("Eccube\\Common\\Constant::VERSION"), "html", null, true);
        echo "\">
  <link rel=\"stylesheet\" href=\"";
        // line 31
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "front_urlpath", array()), "html", null, true);
        echo "/css/baguetteBox.css?v=";
        echo twig_escape_filter($this->env, twig_constant("Eccube\\Common\\Constant::VERSION"), "html", null, true);
        echo "\">

  <!-- Theme
  ============================================= -->
  <link rel=\"stylesheet\" href=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "front_urlpath", array()), "html", null, true);
        echo "/css/theme.css?v=";
        echo twig_escape_filter($this->env, twig_constant("Eccube\\Common\\Constant::VERSION"), "html", null, true);
        echo "\">

  <!-- for original theme CSS -->
  ";
        // line 38
        $this->displayBlock('stylesheet', $context, $blocks);
        // line 39
        echo "
  <script src=\"https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js\"></script>
  <script>window.jQuery || document.write('<script src=\"";
        // line 41
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "front_urlpath", array()), "html", null, true);
        echo "/js/vendor/jquery-1.11.3.min.js?v=";
        echo twig_escape_filter($this->env, twig_constant("Eccube\\Common\\Constant::VERSION"), "html", null, true);
        echo "\"><\\/script>')</script>

  ";
        // line 44
        echo "  ";
        if ($this->getAttribute(($context["PageLayout"] ?? null), "Head", array())) {
            // line 45
            echo "    ";
            // line 46
            echo "    ";
            echo twig_include($this->env, $context, "block.twig", array("Blocks" => $this->getAttribute(($context["PageLayout"] ?? null), "Head", array())));
            echo "
    ";
            // line 48
            echo "  ";
        }
        // line 49
        echo "  ";
        // line 50
        echo "
</head>
<body id=\"page_";
        // line 52
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "request", array()), "get", array(0 => "_route"), "method"), "html", null, true);
        echo "\" class=\"";
        echo twig_escape_filter($this->env, ((array_key_exists("body_class", $context)) ? (_twig_default_filter(($context["body_class"] ?? null), "other_page")) : ("other_page")), "html", null, true);
        echo "\">
  <div id=\"wrapper\">

    <header id=\"header\">
      <div class=\"container inner\">
        ";
        // line 58
        echo "        ";
        if ($this->getAttribute(($context["PageLayout"] ?? null), "Header", array())) {
            // line 59
            echo "          ";
            // line 60
            echo "          ";
            echo twig_include($this->env, $context, "block.twig", array("Blocks" => $this->getAttribute(($context["PageLayout"] ?? null), "Header", array())));
            echo "
          ";
            // line 62
            echo "        ";
        }
        // line 63
        echo "        ";
        // line 64
        echo "        <p id=\"btn_menu\"><a class=\"nav-trigger\" href=\"#nav\">Menu<span></span></a></p>
      </div>
    </header>

    <div id=\"contents\" class=\"";
        // line 68
        echo twig_escape_filter($this->env, $this->getAttribute(($context["PageLayout"] ?? null), "theme", array()), "html", null, true);
        echo "\">

      <div id=\"contents_top\">
        ";
        // line 72
        echo "        ";
        if ($this->getAttribute(($context["PageLayout"] ?? null), "ContentsTop", array())) {
            // line 73
            echo "          ";
            // line 74
            echo "          ";
            echo twig_include($this->env, $context, "block.twig", array("Blocks" => $this->getAttribute(($context["PageLayout"] ?? null), "ContentsTop", array())));
            echo "
          ";
            // line 76
            echo "        ";
        }
        // line 77
        echo "        ";
        // line 78
        echo "      </div>

      <div class=\"container inner\">
        <div class=\"row\">

          ";
        // line 84
        echo "          ";
        if ($this->getAttribute(($context["PageLayout"] ?? null), "MainTop", array())) {
            // line 85
            echo "            <div id=\"main_top\" class=\"col-xs-12\">
              ";
            // line 86
            echo twig_include($this->env, $context, "block.twig", array("Blocks" => $this->getAttribute(($context["PageLayout"] ?? null), "MainTop", array())));
            echo "
            </div>
          ";
        }
        // line 89
        echo "          ";
        // line 90
        echo "
          <div id=\"main\" class=\"col-xs-12 ";
        // line 91
        if (($this->getAttribute(($context["PageLayout"] ?? null), "theme", array()) == "theme_side_right")) {
            echo "col-sm-9";
        } elseif (($this->getAttribute(($context["PageLayout"] ?? null), "theme", array()) == "theme_side_left")) {
            echo "col-sm-9 col-sm-push-3";
        } elseif (($this->getAttribute(($context["PageLayout"] ?? null), "theme", array()) == "theme_side_both")) {
            echo "col-sm-6 col-sm-push-3";
        }
        echo " origin-main\">

            <div id=\"main_middle\">
              ";
        // line 94
        $this->displayBlock('main', $context, $blocks);
        // line 95
        echo "            </div>

            ";
        // line 98
        echo "            ";
        if ($this->getAttribute(($context["PageLayout"] ?? null), "MainBottom", array())) {
            // line 99
            echo "              <div id=\"main_bottom\">
                ";
            // line 100
            echo twig_include($this->env, $context, "block.twig", array("Blocks" => $this->getAttribute(($context["PageLayout"] ?? null), "MainBottom", array())));
            echo "
              </div>
            ";
        }
        // line 103
        echo "            ";
        // line 104
        echo "          </div>

          ";
        // line 107
        echo "          ";
        if ($this->getAttribute(($context["PageLayout"] ?? null), "SideLeft", array())) {
            // line 108
            echo "            <div id=\"side_left\" class=\"side col-sm-3 ";
            if (($this->getAttribute(($context["PageLayout"] ?? null), "theme", array()) == "theme_side_both")) {
                echo "col-sm-pull-6";
            } else {
                echo "col-sm-pull-9";
            }
            echo "\">
              ";
            // line 110
            echo "              ";
            echo twig_include($this->env, $context, "block.twig", array("Blocks" => $this->getAttribute(($context["PageLayout"] ?? null), "SideLeft", array())));
            echo "
              ";
            // line 112
            echo "            </div>
          ";
        }
        // line 114
        echo "          ";
        // line 115
        echo "
          ";
        // line 117
        echo "          ";
        if ($this->getAttribute(($context["PageLayout"] ?? null), "SideRight", array())) {
            // line 118
            echo "            <div id=\"side_right\" class=\"side col-sm-3\">
              ";
            // line 120
            echo "              ";
            echo twig_include($this->env, $context, "block.twig", array("Blocks" => $this->getAttribute(($context["PageLayout"] ?? null), "SideRight", array())));
            echo "
              ";
            // line 122
            echo "            </div>
          ";
        }
        // line 124
        echo "          ";
        // line 125
        echo "
        </div><!-- /row -->

        ";
        // line 129
        echo "        ";
        if ($this->getAttribute(($context["PageLayout"] ?? null), "ContentsBottom", array())) {
            // line 130
            echo "          <div id=\"contents_bottom\">
            ";
            // line 132
            echo "            ";
            echo twig_include($this->env, $context, "block.twig", array("Blocks" => $this->getAttribute(($context["PageLayout"] ?? null), "ContentsBottom", array())));
            echo "
            ";
            // line 134
            echo "          </div>
        ";
        }
        // line 136
        echo "        ";
        // line 137
        echo "
      </div><!-- /container -->

      <footer id=\"footer\">
        ";
        // line 142
        echo "        ";
        if ($this->getAttribute(($context["PageLayout"] ?? null), "Footer", array())) {
            // line 143
            echo "          ";
            // line 144
            echo "          ";
            echo twig_include($this->env, $context, "block.twig", array("Blocks" => $this->getAttribute(($context["PageLayout"] ?? null), "Footer", array())));
            echo "
          ";
            // line 146
            echo "        ";
        }
        // line 147
        echo "        ";
        // line 148
        echo "      </footer>

    </div><!-- /#contents -->

    <div id=\"drawer\" class=\"drawer sp\"></div>

  </div><!-- /#wrapper -->

  <div class=\"overlay\"></div>

  <script src=\"";
        // line 158
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "front_urlpath", array()), "html", null, true);
        echo "/js/vendor/bootstrap.custom.min.js?v=";
        echo twig_escape_filter($this->env, twig_constant("Eccube\\Common\\Constant::VERSION"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 159
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "front_urlpath", array()), "html", null, true);
        echo "/js/vendor/slick.min.js?v=";
        echo twig_escape_filter($this->env, twig_constant("Eccube\\Common\\Constant::VERSION"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 160
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "front_urlpath", array()), "html", null, true);
        echo "/js/vendor/baguetteBox.js?v=";
        echo twig_escape_filter($this->env, twig_constant("Eccube\\Common\\Constant::VERSION"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 161
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "front_urlpath", array()), "html", null, true);
        echo "/js/function.js?v=";
        echo twig_escape_filter($this->env, twig_constant("Eccube\\Common\\Constant::VERSION"), "html", null, true);
        echo "\"></script>
  <script src=\"";
        // line 162
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "front_urlpath", array()), "html", null, true);
        echo "/js/eccube.js?v=";
        echo twig_escape_filter($this->env, twig_constant("Eccube\\Common\\Constant::VERSION"), "html", null, true);
        echo "\"></script>
  <script>
  \$(function () {
    \$('#drawer').append(\$('.drawer_block').clone(true).children());
    \$.ajax({
      url: '";
        // line 167
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "front_urlpath", array()), "html", null, true);
        echo "/img/common/svg.html',
      type: 'GET',
      dataType: 'html',
    }).done(function(data){
      \$('body').prepend(data);
    }).fail(function(data){
    });
  });
  </script>
<script>
  window.onload = function() {
    baguetteBox.run('.gallery-container-list');
  };
</script>
<!-- original
============================================= -->
<script src=\"";
        // line 183
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "front_urlpath", array()), "html", null, true);
        echo "/js/common/compornents/tmp_pickup.js\"></script>
<script src=\"";
        // line 184
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "front_urlpath", array()), "html", null, true);
        echo "/js/common/compornents/tmp_headerNavi.js\"></script>


";
        // line 187
        $this->displayBlock('javascript', $context, $blocks);
        // line 188
        echo "</body>
</html>
";
    }

    // line 38
    public function block_stylesheet($context, array $blocks = array())
    {
    }

    // line 94
    public function block_main($context, array $blocks = array())
    {
    }

    // line 187
    public function block_javascript($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "default_frame.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  455 => 187,  450 => 94,  445 => 38,  439 => 188,  437 => 187,  431 => 184,  427 => 183,  408 => 167,  398 => 162,  392 => 161,  386 => 160,  380 => 159,  374 => 158,  362 => 148,  360 => 147,  357 => 146,  352 => 144,  350 => 143,  347 => 142,  341 => 137,  339 => 136,  335 => 134,  330 => 132,  327 => 130,  324 => 129,  319 => 125,  317 => 124,  313 => 122,  308 => 120,  305 => 118,  302 => 117,  299 => 115,  297 => 114,  293 => 112,  288 => 110,  279 => 108,  276 => 107,  272 => 104,  270 => 103,  264 => 100,  261 => 99,  258 => 98,  254 => 95,  252 => 94,  240 => 91,  237 => 90,  235 => 89,  229 => 86,  226 => 85,  223 => 84,  216 => 78,  214 => 77,  211 => 76,  206 => 74,  204 => 73,  201 => 72,  195 => 68,  189 => 64,  187 => 63,  184 => 62,  179 => 60,  177 => 59,  174 => 58,  164 => 52,  160 => 50,  158 => 49,  155 => 48,  150 => 46,  148 => 45,  145 => 44,  138 => 41,  134 => 39,  132 => 38,  124 => 35,  115 => 31,  109 => 30,  103 => 29,  97 => 28,  91 => 27,  85 => 24,  78 => 20,  75 => 19,  69 => 17,  66 => 16,  60 => 14,  57 => 13,  51 => 11,  48 => 10,  42 => 8,  40 => 7,  29 => 6,  22 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "default_frame.twig", "/home/ancharme/ancharme.jp/public_html/app/template/ancharme/default_frame.twig");
    }
}
