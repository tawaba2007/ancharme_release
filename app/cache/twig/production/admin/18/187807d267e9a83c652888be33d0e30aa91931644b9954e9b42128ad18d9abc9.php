<?php

/* __string_template__77ed56d380108ba1c6dc4f7cd8388f7a824b83df413ab9c146f058c7a48112a3 */
class __TwigTemplate_aa449752964e18a41d0b104d0008416c5919610a04a632e74798fb04c4b8baaf extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 11
        $this->parent = $this->loadTemplate("default_frame.twig", "__string_template__77ed56d380108ba1c6dc4f7cd8388f7a824b83df413ab9c146f058c7a48112a3", 11);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'sub_title' => array($this, 'block_sub_title'),
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
        // line 12
        $context["menus"] = array(0 => "setting", 1 => "admin_setting_sales_ranking");
        // line 16
        $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->setTheme(($context["form"] ?? null), array(0 => "Form/bootstrap_3_horizontal_layout.html.twig"));
        // line 11
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 13
    public function block_title($context, array $blocks = array())
    {
        echo "基本情報設定";
    }

    // line 14
    public function block_sub_title($context, array $blocks = array())
    {
        echo "売上ランキングブロック設定";
    }

    // line 18
    public function block_javascript($context, array $blocks = array())
    {
        // line 19
        echo "<script>
function changeAction(action) {
    document.form1.action = action;
}
</script>
";
    }

    // line 26
    public function block_main($context, array $blocks = array())
    {
        // line 27
        echo "            <form role=\"form\" name=\"form1\" id=\"form1\" method=\"post\" action=\"\" novalidate enctype=\"multipart/form-data\">
            ";
        // line 28
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "_token", array()), 'widget');
        echo "
            <div class=\"row\" id=\"aside_wrap\">
                <div class=\"col-md-9\">
                    <div class=\"box form-horizontal\">
                        <div class=\"box-body\">
                            <div class=\"form-group\">
                                ";
        // line 34
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "term", array()), 'label');
        echo "
                                <div class=\"col-sm-9 col-lg-10\">
                                    ";
        // line 36
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "term", array()), 'widget');
        echo "
                                </div>
                            </div>
                            <div class=\"form-group\">
                                ";
        // line 40
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "display_num", array()), 'label');
        echo "
                                <div class=\"col-sm-9 col-lg-10\">
                                   ";
        // line 42
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "display_num", array()), 'widget');
        echo "
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class=\"col-md-3\">
                    <div class=\"col_inner\" id=\"aside_column\">
                        <div class=\"box no-header\">
                            <div class=\"box-body\">
                                <div class=\"row text-center\">
                                    <div class=\"col-sm-6 col-sm-offset-3 col-md-12 col-md-offset-0\">
                                        <button class=\"btn btn-primary btn-block btn-lg\" onclick=\"document.form1.submit();\">登録</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </form>
";
    }

    public function getTemplateName()
    {
        return "__string_template__77ed56d380108ba1c6dc4f7cd8388f7a824b83df413ab9c146f058c7a48112a3";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  92 => 42,  87 => 40,  80 => 36,  75 => 34,  66 => 28,  63 => 27,  60 => 26,  51 => 19,  48 => 18,  42 => 14,  36 => 13,  32 => 11,  30 => 16,  28 => 12,  11 => 11,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "__string_template__77ed56d380108ba1c6dc4f7cd8388f7a824b83df413ab9c146f058c7a48112a3", "");
    }
}
