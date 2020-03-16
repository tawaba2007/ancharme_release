<?php

/* __string_template__a66a8a61ebc5f2504725bcbdc2f2585155f6c7050fd436579978f22099b0857b */
class __TwigTemplate_58f5c665d88912a9fd1c0ded6c864b39e9eaf19e95fb3068462f1a890ddddb95 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 22
        $this->parent = $this->loadTemplate("default_frame.twig", "__string_template__a66a8a61ebc5f2504725bcbdc2f2585155f6c7050fd436579978f22099b0857b", 22);
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
        $context["body_class"] = "registration_page";
        // line 22
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 26
    public function block_main($context, array $blocks = array())
    {
        // line 27
        echo "    <h1 class=\"page-heading\">新規会員登録（完了）</h1>
    <div id=\"activate_box\" class=\"container-fluid\">
        <div id=\"deliveradd_input\" class=\"row\">
            <div id=\"activate_box__body\" class=\"col-sm-10 col-sm-offset-1\">
                <div id=\"activate_box__message\" class=\"complete_message\">
                    <h2 class=\"heading01\">本登録が完了いたしました。</h2>
                    <p>それではショッピングをお楽しみください。</p>
                    <p>今後ともご愛顧賜りますようよろしくお願い申し上げます。</p>
                </div>
                <div id=\"activate_box__footer\" class=\"row no-padding\">
                    <div id=\"activate_box__button_menu\" class=\"btn_group col-sm-offset-4 col-sm-4\">
                        <p id=\"activate_box__top_button\" >
                            <a href=\"";
        // line 39
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
        return "__string_template__a66a8a61ebc5f2504725bcbdc2f2585155f6c7050fd436579978f22099b0857b";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  48 => 39,  34 => 27,  31 => 26,  27 => 22,  25 => 24,  11 => 22,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "__string_template__a66a8a61ebc5f2504725bcbdc2f2585155f6c7050fd436579978f22099b0857b", "");
    }
}
