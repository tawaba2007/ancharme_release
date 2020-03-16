<?php

/* GmoEpsilon/Twig/shopping/convenience.twig */
class __TwigTemplate_e0086f2226b8a229a3f44af05a22bba1a573bb3ff9d0dd42533dc54ab9abd08a extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 2
        $this->parent = $this->loadTemplate("default_frame.twig", "GmoEpsilon/Twig/shopping/convenience.twig", 2);
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
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 4
    public function block_javascript($context, array $blocks = array())
    {
        // line 5
        echo "
";
    }

    // line 8
    public function block_main($context, array $blocks = array())
    {
        // line 9
        echo "
    <h2 class=\"title\">";
        // line 10
        echo twig_escape_filter($this->env, ($context["title"] ?? null), "html", null, true);
        echo "</h2>
    <form name=\"form1\" id=\"form1\" method=\"post\" action=\"?\" >
        ";
        // line 12
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "_token", array()), 'widget');
        echo "
        <div class=\"dl_table\" id=\"payment_form_body\">
            <dl>
                <dt>コンビニ選択<span class=\"required\">必須</span></dt>
                <dd>
                    <div class=\"form-group form-inline ";
        // line 17
        if ( !twig_test_empty($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "convenience", array()), "vars", array()), "errors", array()))) {
            echo "has-error";
        }
        echo "\">
                        ";
        // line 18
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "convenience", array()), 'widget');
        echo "
                        ";
        // line 19
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "convenience", array()), 'errors');
        echo "
                    </div>
                </dd>
            </dl>
            <dl>
                <dt>利用者名(カナ)<span class=\"required\">必須</span></dt>
                <dd>
                    <div class=\"form-group form-inline ";
        // line 26
        if (( !twig_test_empty($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "kana01", array()), "vars", array()), "errors", array())) ||  !twig_test_empty($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "kana02", array()), "vars", array()), "errors", array())))) {
            echo "has-error";
        }
        echo "\">
                        セイ：";
        // line 27
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "kana01", array()), 'widget');
        echo "  &nbsp;メイ：";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "kana02", array()), 'widget');
        echo "
                        ";
        // line 28
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "kana01", array()), 'errors');
        echo "
                        ";
        // line 29
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "kana02", array()), 'errors');
        echo "
                    </div>
                </dd>
            </dl>
            <dl>
                <dt>電話番号<span class=\"required\">必須</span></dt>
                <dd>
                    <div class=\"form-group form-inline ";
        // line 36
        if ((( !twig_test_empty($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "tel01", array()), "vars", array()), "errors", array())) ||  !twig_test_empty($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "tel02", array()), "vars", array()), "errors", array()))) ||  !twig_test_empty($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "tel03", array()), "vars", array()), "errors", array())))) {
            echo "has-error";
        }
        echo "\">
                        ";
        // line 37
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "tel01", array()), 'widget');
        echo "  &nbsp; - &nbsp; ";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "tel02", array()), 'widget');
        echo " &nbsp; - &nbsp; ";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "tel03", array()), 'widget');
        echo "
                        ";
        // line 38
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "tel01", array()), 'errors');
        echo "
                        ";
        // line 39
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "tel02", array()), 'errors');
        echo "
                        ";
        // line 40
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "tel03", array()), 'errors');
        echo "
                    </div>
                </dd>
            </dl>

        </div>

        <p>以上の内容で間違いなければ、下記「ご注文完了ページへ」ボタンをクリックしてください。</p>
        <p>※ 画面が切り替わるまで少々時間がかかる場合がございますが、そのままお待ちください。</p>

        <div class=\"row no-padding\">
            <div class=\"btn_group col-sm-offset-4 col-sm-4\">
                <p>
                    <input type=\"submit\" class=\"btn btn-primary btn-block\" value=\"ご注文完了ページへ\" />
                </p>
                <p><a href=\"";
        // line 55
        echo $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getPath("epsilon_shopping_payment_back");
        echo "?order_number=";
        echo twig_escape_filter($this->env, ($context["order_number"] ?? null), "html", null, true);
        echo "\" class=\"btn btn-info btn-block\">戻る</a></p>
            </div>
        </div>

    </form>
";
    }

    public function getTemplateName()
    {
        return "GmoEpsilon/Twig/shopping/convenience.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  142 => 55,  124 => 40,  120 => 39,  116 => 38,  108 => 37,  102 => 36,  92 => 29,  88 => 28,  82 => 27,  76 => 26,  66 => 19,  62 => 18,  56 => 17,  48 => 12,  43 => 10,  40 => 9,  37 => 8,  32 => 5,  29 => 4,  11 => 2,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "GmoEpsilon/Twig/shopping/convenience.twig", "/home/ancharme/ancharme.jp/public_html/app/Plugin/GmoEpsilon/Twig/shopping/convenience.twig");
    }
}
