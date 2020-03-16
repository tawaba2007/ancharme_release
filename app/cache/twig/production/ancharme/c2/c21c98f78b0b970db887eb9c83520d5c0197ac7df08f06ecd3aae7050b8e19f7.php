<?php

/* __string_template__03b7da6be9d91796755888cf64aa420a781d80278ff7a8c8d13b39cbd790b629 */
class __TwigTemplate_095208eb9ee73447effb41335c13afc301a82a8a1d114b6302e7a55432a153d6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 22
        $this->parent = $this->loadTemplate("default_frame.twig", "__string_template__03b7da6be9d91796755888cf64aa420a781d80278ff7a8c8d13b39cbd790b629", 22);
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
                <h1 class=\"page-heading\">パスワード発行メールの送信 完了</h1>
                <div id=\"complete_wrap\" class=\"container-fluid\">
                    <div id=\"complete_box\" class=\"row\">
                        <div id=\"complete_box__body\" class=\"col-md-10 col-md-offset-1\">
                            <div id=\"complete_box__message\" class=\"complete_message\">
                                <h2>パスワード再発行メールの送信が完了しました。</h2>
                                <p>ご登録メールアドレスにパスワードを再発行するためのメールを送信いたしました。<br/>
                            メールの内容をご確認いただきますよう、お願いいたします。</p>
                                <p>※メールが届かない場合はメールアドレスをご確認の上、再度お試しください。</p>
                            </div>
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
        return "__string_template__03b7da6be9d91796755888cf64aa420a781d80278ff7a8c8d13b39cbd790b629";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 25,  28 => 24,  11 => 22,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "__string_template__03b7da6be9d91796755888cf64aa420a781d80278ff7a8c8d13b39cbd790b629", "");
    }
}
