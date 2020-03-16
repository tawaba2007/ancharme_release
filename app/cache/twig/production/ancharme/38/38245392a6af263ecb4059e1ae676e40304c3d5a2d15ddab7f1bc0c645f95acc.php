<?php

/* __string_template__231f9b36cd95d3d70481f01b5bc14c36505482efb43b9efb6abf4f3082e1f12a */
class __TwigTemplate_33dd96e1ee8c511c9fb20e6cbafce4b9a240fce3602fe03e3b935034b1410eea extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 22
        $this->parent = $this->loadTemplate("default_frame.twig", "__string_template__231f9b36cd95d3d70481f01b5bc14c36505482efb43b9efb6abf4f3082e1f12a", 22);
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
        echo "    <div id=\"contents\" class=\"main_only\">
        <div class=\"container-fluid inner no-padding\">
            <div id=\"main\">
                <h1 class=\"page-heading\">パスワードの再発行</h1>
                <div id=\"top_wrap\" class=\"container-fluid\">
                    <div id=\"top_box\" class=\"row\">
                        <div id=\"top_box__body\" class=\"col-md-10 col-md-offset-1\">
                            <p>ご登録時のメールアドレスを入力して「次へ」ボタンをクリックしてください。</p>
                            <p>※新しくパスワードを発行いたしますので、お忘れになったパスワードはご利用できなくなります。</p>
                            <form name=\"form1\" id=\"form1\" method=\"post\" action=\"";
        // line 34
        echo $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getUrl("forgot");
        echo "\">
                                ";
        // line 35
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "_token", array()), 'widget');
        echo "
                                <div id=\"top_box__body_inner\" class=\"dl_table\">
                                    <dl id=\"top_box__login_email\">
                                        <dt>";
        // line 38
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "login_email", array()), 'label');
        echo "</dt>
                                        <dd>
                                            <div class=\"form-group\">
                                                ";
        // line 41
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "login_email", array()), 'widget');
        echo "
                                                ";
        // line 42
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "login_email", array()), 'errors');
        echo "
                                            </div>
                                        </dd>
                                    </dl>
                                </div>
                                ";
        // line 47
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["form"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["f"]) {
            // line 48
            echo "                                    ";
            if (preg_match("[^plg*]", $this->getAttribute($this->getAttribute($context["f"], "vars", array()), "name", array()))) {
                // line 49
                echo "                                        <div class=\"extra-form dl_table\">
                                            ";
                // line 50
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($context["f"], 'row');
                echo "
                                        </div>
                                    ";
            }
            // line 53
            echo "                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['f'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 54
        echo "                                <div id=\"top_box__footer\" class=\"row no-padding\">
                                <div id=\"top_box__next_button\" class=\"btn_group col-sm-offset-4 col-sm-4\">
                                    <p><button type=\"submit\" class=\"btn btn-primary btn-block\">次のページへ</button></p>
                                </div>
                                </div>
                            </form>
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                </div>
            </div>
        </div>
    </div>

";
    }

    public function getTemplateName()
    {
        return "__string_template__231f9b36cd95d3d70481f01b5bc14c36505482efb43b9efb6abf4f3082e1f12a";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  92 => 54,  86 => 53,  80 => 50,  77 => 49,  74 => 48,  70 => 47,  62 => 42,  58 => 41,  52 => 38,  46 => 35,  42 => 34,  31 => 25,  28 => 24,  11 => 22,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "__string_template__231f9b36cd95d3d70481f01b5bc14c36505482efb43b9efb6abf4f3082e1f12a", "");
    }
}
