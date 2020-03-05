<?php

/* Block/header02.twig */
class __TwigTemplate_d818e0b6f77bd4729358a3fb1f27fc47eb800c64b60eba7389921af86bcd4123 extends Twig_Template
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
        // line 1
        echo "<!-- ▼Header -->
<div
    class=\"plg_aui_header header-style1\">

    <!-- /aui_topbar -->

    <div
        class=\"aui_header_body clearfix\">
        <!-- ▼ロゴ -->
        <div class=\"header_logo_area\">
            <h1 class=\"header_logo\">
                <a href=\"https://ancharme.jp/\">
                    <img src=\"https://ancharme.jp/html/template/ancharme/img/top/logo.svg\"></a>
            </h1>
        </div>

        <!-- ▲ロゴ -->
    <!-- ▼商品検索 -->

        <!-- ▲商品検索 -->
        <!-- ▼カゴの中 -->

        ";
        // line 24
        echo "        <!-- ▲カゴの中 -->
    </div>
    <!-- /aui_header -->
</div>
<!-- ▲Header -->
<!-- ▼商品検索 -->

<!-- ▲商品検索 -->


    <div class=\"drawer_block \">

    <div class=\"origin-header-form\">
        <form method=\"get\" id=\"searchform\" action=\"/products/list\">
            <div class=\"input_search clearfix\">
                <input type=\"search\" id=\"name\" name=\"name\" maxlength=\"50\" placeholder=\"何かお探しでしょうか?\" class=\"form-control\">
                <button type=\"submit\" class=\"bt_search\"><img src=\"https://ancharme.jp/html/template/ancharme/img/top/drawer_search.png\" alt=\"\"></button>
            </div>
        </form>
    </div>

    <div class=\"drawer_function\">
        <a href=\"https://ancharme.jp/entry\"><img src=\"https://ancharme.jp/html/template/ancharme/img/top/people.png\" alt=\"\">新規会員登録</a>
    </div>

    <div class=\"drawer_function\">
        <a href=\"https://ancharme.jp/mypage/login\"><img src=\"https://ancharme.jp/html/template/ancharme/img/top/login.png\" alt=\"\">ログイン</a>
    </div>
<!--
 <ul>
        <li><img src=\"https://ancharme.jp/html/template/ancharme/img/top/people.png\" alt=\"\">
            <a href=\"https://ancharme.jp/entry\">会員登録</a>
        </li>

        <li>
              <img src=\"";
        // line 59
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "front_urlpath", array()), "html", null, true);
        echo "/img/top/login.png\" alt=\"icon\" class=\"label-icon-image\">
            <a href=\"https://ancharme.jp/mypage/login\">ログイン</a>
        </li>
-->
    </ul>

    <ul>
    <li>
            <a href=\"https://ancharme.jp/mypage\">My page</a>
        </li>

    <li>
            <a href=\"";
        // line 71
        echo $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getUrl("homepage");
        echo "\">HOME</a>
        </li>
        <li>
            <a href=\"https://ancharme.jp/products/list\">AII ITEM</a>
        </li>
       <li>
            <a href=\"https://ancharme.jp/listTops\">ー　TOPS</a>
        </li>
       <li>
            <a href=\"https://ancharme.jp/listOuter\">ー　OUTER</a>
        </li>
       <li>
            <a href=\"https://ancharme.jp/listBottoms\">ー　BOTTOMS</a>
        </li>
       <li>
            <a href=\"https://ancharme.jp/listDress\">ー　DRESS</a>
        </li>
       <li>
            <a href=\"https://ancharme.jp/listSetup\">ー　SET UP</a>
        </li>
        <li>
            <a href=\"https://ancharme.jp/help/guide\">SHOP GUIDE</a>
        </li>
        <li>
            <a href=\"https://ancharme.jp/contact\">CONTACT</a>
        </li>
    </ul>

    <ul>
        <li>Influencer's LINK</li>
        <li>
            <ul>
                <li><a href=\"https://www.instagram.com/asupk_/?hl=ja\">ーInstagram</a></li>
                <li><a href=\"https://twitter.com/__asupk\">ーTwitter</a></li>
            </ul>
        </li>
    </ul>

    <div class=\"drawer_official_insta\">
        <a href=\"https://www.instagram.com/ancharme_official/\"><img src=\"https://ancharme.jp/html/template/ancharme/img/top/drawer_insta.png\" alt=\"\">Shop Offisial Instagram</a>
    </div>
    ";
        // line 113
        echo "    
</div>";
    }

    public function getTemplateName()
    {
        return "Block/header02.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  139 => 113,  95 => 71,  80 => 59,  43 => 24,  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Block/header02.twig", "/home/ancharme/ancharme.jp/public_html/app/template/ancharme/Block/header02.twig");
    }
}
