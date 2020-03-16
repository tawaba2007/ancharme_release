<?php

/* __string_template__edaa54c2b945eeb68c7357a11e5bc521863d586e3ef2b89383337ca80c0cf53d */
class __TwigTemplate_defe121df2d03ae753e12c4e2d5a9b0dc01730e6d65e73302a24f2318b6fdb1e extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 22
        $this->parent = $this->loadTemplate("default_frame.twig", "__string_template__edaa54c2b945eeb68c7357a11e5bc521863d586e3ef2b89383337ca80c0cf53d", 22);
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
        $context["mypageno"] = "change";
        // line 26
        $context["body_class"] = "mypage";
        // line 22
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 28
    public function block_main($context, array $blocks = array())
    {
        // line 29
        echo "    <h1 class=\"page-heading\">マイページ/会員情報編集(完了)</h1>
    <div id=\"complete_wrap\" class=\"container-fluid\">
    ";
        // line 31
        $this->loadTemplate("Mypage/navi.twig", "__string_template__edaa54c2b945eeb68c7357a11e5bc521863d586e3ef2b89383337ca80c0cf53d", 31)->display($context);
        // line 32
        echo "        <div id=\"deliveradd_input\" class=\"row\">
            <div id=\"complete_box__body\" class=\"col-sm-10 col-sm-offset-1\">
                <div id=\"complete_box__message\"class=\"complete_message\">
                    <h2 class=\"heading01\">会員登録内容の変更が完了いたしました</h2>
                    <p>今後ともご愛顧賜りますようよろしくお願い申し上げます。</p>
                </div>
                <div id=\"complete_box__top_button\" class=\"row no-padding\">
                    <div class=\"btn_group col-sm-offset-4 col-sm-4\">
                        <p>
                            <a href=\"";
        // line 41
        echo $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getUrl("index");
        echo "\" class=\"btn btn-info btn-block\">トップページへ</a>
                        </p>
                    </div>
                </div>

            </div><!-- /.col -->
        </div><!-- /.row -->

    </div>
";
    }

    public function getTemplateName()
    {
        return "__string_template__edaa54c2b945eeb68c7357a11e5bc521863d586e3ef2b89383337ca80c0cf53d";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 41,  42 => 32,  40 => 31,  36 => 29,  33 => 28,  29 => 22,  27 => 26,  25 => 24,  11 => 22,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "__string_template__edaa54c2b945eeb68c7357a11e5bc521863d586e3ef2b89383337ca80c0cf53d", "");
    }
}
