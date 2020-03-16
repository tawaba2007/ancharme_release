<?php

/* __string_template__ad41dfbbec17b2423ff590154cffa0263aae9226257b5865bd9936ff67ac2d25 */
class __TwigTemplate_913994254dccc608ec6c1e770d8eff543dd3d36b6fccae0d6b31d3836e8e157f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 22
        $this->parent = $this->loadTemplate("default_frame.twig", "__string_template__ad41dfbbec17b2423ff590154cffa0263aae9226257b5865bd9936ff67ac2d25", 22);
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
        $context["body_class"] = "registration_page";
        // line 22
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 26
    public function block_javascript($context, array $blocks = array())
    {
        // line 27
        echo "<script src=\"//ajaxzip3.github.io/ajaxzip3.js\" charset=\"UTF-8\"></script>
<script>
    \$(function() {
        \$('#zip-search').click(function() {
            AjaxZip3.zip2addr('entry[zip][zip01]', 'entry[zip][zip02]', 'entry[address][pref]', 'entry[address][addr01]');
        });
    });
</script>
";
    }

    // line 37
    public function block_main($context, array $blocks = array())
    {
        // line 38
        echo "<h1 class=\"page-heading\">新規会員登録</h1>
<div id=\"top_wrap\" class=\"container-fluid\">
    <div id=\"top_box\" class=\"row\"><div class=\"col-md-10 col-md-offset-1\">LINEログイン済みです。この会員登録が完了すると、LINEでログインできるようになります。</div>

        <div id=\"top_box__body\" class=\"col-md-10 col-md-offset-1\">
            <form method=\"post\" action=\"";
        // line 43
        echo $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getUrl("entry");
        echo "\">
                ";
        // line 44
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "_token", array()), 'widget');
        echo "
                <div id=\"top_box__body_inner\" class=\"dl_table\">
                    <dl id=\"top_box__name\">
                        <dt>";
        // line 47
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "name", array()), 'label');
        echo "</dt>
                        <dd class=\"form-group input_name\">
                            ";
        // line 49
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "name", array()), "name01", array()), 'widget');
        echo "
                            ";
        // line 50
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "name", array()), "name02", array()), 'widget');
        echo "
                            ";
        // line 51
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "name", array()), "name01", array()), 'errors');
        echo "
                            ";
        // line 52
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "name", array()), "name02", array()), 'errors');
        echo "
                        </dd>
                    </dl>
                    <dl id=\"top_box__kana\">
                        <dt>";
        // line 56
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "kana", array()), 'label');
        echo "</dt>
                        <dd class=\"form-group input_name\">
                            ";
        // line 58
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "kana", array()), "kana01", array()), 'widget');
        echo "
                            ";
        // line 59
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "kana", array()), "kana02", array()), 'widget');
        echo "
                            ";
        // line 60
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "kana", array()), "kana01", array()), 'errors');
        echo "
                            ";
        // line 61
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "kana", array()), "kana02", array()), 'errors');
        echo "
                        </dd>
                    </dl>
<!--
                    <dl id=\"top_box__company_name\">
                        <dt>";
        // line 66
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "company_name", array()), 'label');
        echo "</dt>
                        <dd class=\"form-group input_name\">
                            ";
        // line 68
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "company_name", array()), 'widget');
        echo "
                            ";
        // line 69
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "company_name", array()), 'errors');
        echo "
                        </dd>
                    </dl>
-->
                    <dl id=\"top_box__address_detail\">
                        <dt>";
        // line 74
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "address", array()), 'label');
        echo "</dt>
                        <dd>
                            <div id=\"top_box__zip\" class=\"form-group form-inline input_zip ";
        // line 76
        if (( !twig_test_empty($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "zip", array()), "zip01", array()), "vars", array()), "errors", array())) ||  !twig_test_empty($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "zip", array()), "zip02", array()), "vars", array()), "errors", array())))) {
            echo "has-error";
        }
        echo "\">";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "zip", array()), 'widget');
        echo "</div>
                            <div id=\"top_box__address\" class=\"";
        // line 77
        if ((( !twig_test_empty($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "address", array()), "pref", array()), "vars", array()), "errors", array())) ||  !twig_test_empty($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "address", array()), "addr01", array()), "vars", array()), "errors", array()))) ||  !twig_test_empty($this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "address", array()), "addr02", array()), "vars", array()), "errors", array())))) {
            echo "has-error";
        }
        echo "\">
                                ";
        // line 78
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "address", array()), 'widget');
        echo "
                                ";
        // line 79
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "address", array()), 'errors');
        echo "
                            </div>
                        </dd>
                    </dl>
                    <dl id=\"top_box__tel\">
                        <dt>";
        // line 84
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "tel", array()), 'label');
        echo "</dt>
                        <dd>
                            <div class=\"form-inline form-group input_tel\">
                                ";
        // line 87
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "tel", array()), 'widget', array("attr" => array("class" => "short")));
        echo "
                                ";
        // line 88
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "tel", array()), 'errors');
        echo "
                            </div>
                        </dd>
                    </dl>

                    <dl id=\"top_box__fax\">
                        <dt>";
        // line 94
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "fax", array()), 'label');
        echo "</dt>
                        <dd>
                            <div class=\"form-inline form-group input_tel\">
                                ";
        // line 97
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "fax", array()), 'widget', array("attr" => array("class" => "short")));
        echo "
                                ";
        // line 98
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "fax", array()), 'errors');
        echo "
                            </div>
                        </dd>
                    </dl>


                    <dl id=\"top_box__email\">
                        <dt>";
        // line 105
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "email", array()), 'label');
        echo "</dt>
                        <dd>
                            ";
        // line 107
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["form"] ?? null), "email", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["emailField"]) {
            // line 108
            echo "                            <div class=\"form-group ";
            if ( !twig_test_empty($this->getAttribute($this->getAttribute($context["emailField"], "vars", array()), "errors", array()))) {
                echo "has-error";
            }
            echo "\">
                                ";
            // line 109
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($context["emailField"], 'widget');
            echo "
                                ";
            // line 110
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($context["emailField"], 'errors');
            echo "
                            </div>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['emailField'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 113
        echo "                        </dd>
                    </dl>
                    <dl id=\"top_box__password\">
                        <dt>";
        // line 116
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "password", array()), 'label');
        echo "</dt>
                        <dd>
                            ";
        // line 118
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["form"] ?? null), "password", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["passwordField"]) {
            // line 119
            echo "                            <div class=\"form-group ";
            if ( !twig_test_empty($this->getAttribute($this->getAttribute($context["passwordField"], "vars", array()), "errors", array()))) {
                echo "has-error";
            }
            echo "\">
                                ";
            // line 120
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($context["passwordField"], 'widget', array("type" => "password"));
            echo "
                                ";
            // line 121
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($context["passwordField"], 'errors');
            echo "
                            </div>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['passwordField'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 124
        echo "                        </dd>
                    </dl>
                </div>
                <div id=\"top_box__birth\" class=\"dl_table not_required\">
                    <dl>
                        <dt>";
        // line 129
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "birth", array()), 'label');
        echo "</dt>
                        <dd>
                            <div class=\"form-group form-inline\">
                                ";
        // line 132
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "birth", array()), 'widget');
        echo "
                                ";
        // line 133
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "birth", array()), 'errors');
        echo "
                            </div>
                        </dd>
                    </dl>
                    <dl>
                        <dt id=\"top_box__sex\">";
        // line 138
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "sex", array()), 'label');
        echo "</dt>
                        <dd>
                            <div class=\"form-group form-inline\">
                                ";
        // line 141
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "sex", array()), 'widget');
        echo "
                                ";
        // line 142
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "sex", array()), 'errors');
        echo "
                            </div>
                        </dd>
                    </dl>
                    <dl id=\"top_box__job\">
                        <dt>";
        // line 147
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "job", array()), 'label');
        echo "</dt>
                        <dd>
                            <div class=\"form-group form-inline\">
                                ";
        // line 150
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "job", array()), 'widget');
        echo "
                                ";
        // line 151
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "job", array()), 'errors');
        echo "
                            </div>
                        </dd>
                    </dl>";
        // line 175
        echo "<dl>
<dt>メールマガジン送付について<span class=\"required\">必須</span></dt>
<dd>
    <div class=\"form-group form-inline\">
        ";
        // line 179
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "mailmaga_flg", array()), 'widget');
        echo "
        ";
        // line 180
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "mailmaga_flg", array()), 'errors');
        echo "
    </div>
</dd>
</dl>

                </div>
                ";
        // line 186
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["form"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["f"]) {
            // line 187
            echo "                    ";
            if (preg_match("[^plg*]", $this->getAttribute($this->getAttribute($context["f"], "vars", array()), "name", array()))) {
                // line 188
                echo "                        <div class=\"extra-form dl_table\">
                            ";
                // line 189
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($context["f"], 'row');
                echo "
                        </div>
                    ";
            }
            // line 192
            echo "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['f'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 193
        echo "                <input id=\"top_box__hidden_mode\" type=\"hidden\" name=\"mode\" value=\"confirm\">
                <p id=\"top_box__agreement\" class=\"form_terms_link\"><a href=\"";
        // line 194
        echo $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getUrl("help_agreement");
        echo "\" target=\"_blank\">利用規約</a>に同意してお進みください
                </p>

                <div id=\"top_box__footer\" class=\"row no-padding\">
                    <div id=\"top_box__button_menu\" class=\"btn_group col-sm-offset-4 col-sm-4\">
                        <p>
                            <button type=\"submit\" class=\"btn btn-primary btn-block\">同意する</button>
                        </p>
                        <p><a href=\"";
        // line 202
        echo $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getUrl("index");
        echo "\" class=\"btn btn-info btn-block\">同意しない</a></p>
                    </div>
                </div>
            </form>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
";
    }

    public function getTemplateName()
    {
        return "__string_template__ad41dfbbec17b2423ff590154cffa0263aae9226257b5865bd9936ff67ac2d25";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  380 => 202,  369 => 194,  366 => 193,  360 => 192,  354 => 189,  351 => 188,  348 => 187,  344 => 186,  335 => 180,  331 => 179,  325 => 175,  319 => 151,  315 => 150,  309 => 147,  301 => 142,  297 => 141,  291 => 138,  283 => 133,  279 => 132,  273 => 129,  266 => 124,  257 => 121,  253 => 120,  246 => 119,  242 => 118,  237 => 116,  232 => 113,  223 => 110,  219 => 109,  212 => 108,  208 => 107,  203 => 105,  193 => 98,  189 => 97,  183 => 94,  174 => 88,  170 => 87,  164 => 84,  156 => 79,  152 => 78,  146 => 77,  138 => 76,  133 => 74,  125 => 69,  121 => 68,  116 => 66,  108 => 61,  104 => 60,  100 => 59,  96 => 58,  91 => 56,  84 => 52,  80 => 51,  76 => 50,  72 => 49,  67 => 47,  61 => 44,  57 => 43,  50 => 38,  47 => 37,  35 => 27,  32 => 26,  28 => 22,  26 => 24,  11 => 22,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "__string_template__ad41dfbbec17b2423ff590154cffa0263aae9226257b5865bd9936ff67ac2d25", "");
    }
}
