<?php

/* __string_template__e777c1cdfc67a663c391608659371a87b0d2b26715cfa2004f91b55bdd0b8959 */
class __TwigTemplate_2b69c6dec8912ccbe34703acc51f6dbcfe03d0400cb2c8ba5e6e70366d812960 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 22
        $this->parent = $this->loadTemplate("default_frame.twig", "__string_template__e777c1cdfc67a663c391608659371a87b0d2b26715cfa2004f91b55bdd0b8959", 22);
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
        <div id=\"privacy_wrap\" class=\"container-fluid inner no-padding\">
            <div id=\"main\">
                <h1 class=\"page-title-h1\">プライバシーポリシー</h1>
                <div id=\"privacy_box\" class=\"container-fluid\">
                    <div id=\"privacy_box__body\" class=\"row\">
                        <div id=\"privacy_box__body_inner\" class=\"col-md-10 col-md-offset-1\">
                            <p id=\"privacy_box__declaration\" class=\"page-text\">
                                ";
        // line 33
        if ( !(null === $this->getAttribute(($context["BaseInfo"] ?? null), "company_name", array()))) {
            // line 34
            echo "                                    ";
            echo twig_escape_filter($this->env, $this->getAttribute(($context["BaseInfo"] ?? null), "company_name", array()), "html", null, true);
            echo "は、
                                ";
        }
        // line 36
        echo "                                個人情報保護の重要性に鑑み、「個人情報の保護に関する法律」及び本プライバシーポリシーを遵守し、お客さまのプライバシー保護に努めます。
                            </p>
                            <br />
                            <ul class=\"list\">
                              <li class=\"list-item\">・当社では、お客様との取引やサービスを提供するためにお客様の個人情報を適法に収集し、その範囲内で収集した個人情報を利用いたします。</li>
                              <li class=\"list-item\">・収集したお客様の個人情報は、原則としてお客様の承諾を得ない第三者または取引先(当社の業務委託先への預託を除く) 等に対して提供・開示はいたしません。</li>
                              <li class=\"list-item\">・お客様の個人情報は、紛失・破壊・改ざん・漏洩・不正アクセス等が生じないようにセキュリティ対策を講じて適正に管理いたします。</li>
                              <li class=\"list-item\">・個人情報保護法などの法令・ガイドラインを遵守して、お客様の個人情報を取扱ってまいります。</li>
                              <li class=\"list-item\">・当社は、お客様との取引やサービスを提供するために個人情報に関する取扱いを外部に委託することがありますが、その場合には、適正な取扱いを確保するため、契約の締結、当社の個人情報保護の方針の周知徹底、実施状況の点検などを行ってまいります。</li>
                              <li class=\"list-item\">・お客様がご自身の個人情報について内容の照会、訂正、削除、利用の停止を求められる場合には、当社窓口までご連絡お願いいたします。</li>
                              <li class=\"list-item\">・当社は、お客様の個人情報の取扱いが適正に行われるよう従事者への教育を実施し、当該適正な取扱いにつき定期的に点検するとともに、個人情報保護の取り組を必要に応じて随時見直し、改善してまいります。</li>
                              <li class=\"list-item\">・当社の個人情報の取扱いに関するお問合せは下記までご連絡お願いいたします。</li>
                              <li class=\"list-item\">
                                <p>
                                  〒150-0001<br>
                                  　東京都渋谷区神宮前 五丁目29番10号 クリプトメリア神宮前ビル 4F<br>
                                  　株式会社GIVIN　EC事業部<br>
                                  　営業時間：10:00-19:00<br>
                                  　土、日、祝日定休
                                </p>
                              </li>
                            </ul> 
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
        return "__string_template__e777c1cdfc67a663c391608659371a87b0d2b26715cfa2004f91b55bdd0b8959";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  49 => 36,  43 => 34,  41 => 33,  31 => 25,  28 => 24,  11 => 22,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "__string_template__e777c1cdfc67a663c391608659371a87b0d2b26715cfa2004f91b55bdd0b8959", "");
    }
}
