<?php

/* Mail/entry_complete.twig */
class __TwigTemplate_9927b4c4a9db4b1e7a3306767fbbcf783199657f9e62e0c5fcaadce16e823bca extends Twig_Template
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
        // line 22
        echo "　
　※本メールは自動配信メールです。
　等幅フォント(MSゴシック12ポイント、Osaka-等幅など)で
　最適にご覧になれます。

┏━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┓
　※本メールは、
　";
        // line 29
        echo twig_escape_filter($this->env, $this->getAttribute(($context["BaseInfo"] ?? null), "shop_name", array()), "html", null, true);
        echo "より会員登録を希望された方に
　お送りしています。
　もしお心当たりが無い場合は、
　その旨 ";
        // line 32
        echo twig_escape_filter($this->env, $this->getAttribute(($context["BaseInfo"] ?? null), "email02", array()), "html", null, true);
        echo " まで
　ご連絡いただければ幸いです。
┗━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━┛

";
        // line 36
        echo twig_escape_filter($this->env, $this->getAttribute(($context["Customer"] ?? null), "name01", array()), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, $this->getAttribute(($context["Customer"] ?? null), "name02", array()), "html", null, true);
        echo " 様

";
        // line 38
        echo twig_escape_filter($this->env, $this->getAttribute(($context["BaseInfo"] ?? null), "shop_name", array()), "html", null, true);
        echo "でございます。

この度は会員登録依頼をいただきましてまことに有り難うございます。

本会員登録が完了いたしました。
ショッピングをお楽しみくださいませ。

今後ともどうぞ";
        // line 45
        echo twig_escape_filter($this->env, $this->getAttribute(($context["BaseInfo"] ?? null), "shop_name", array()), "html", null, true);
        echo "をよろしくお願い申し上げます。
";
    }

    public function getTemplateName()
    {
        return "Mail/entry_complete.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 45,  48 => 38,  41 => 36,  34 => 32,  28 => 29,  19 => 22,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Mail/entry_complete.twig", "/home/ancharme/ancharme.jp/public_html/app/template/ancharme/Mail/entry_complete.twig");
    }
}
