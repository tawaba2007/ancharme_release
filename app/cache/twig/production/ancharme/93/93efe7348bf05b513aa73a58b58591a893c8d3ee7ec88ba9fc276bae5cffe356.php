<?php

/* __string_template__ee5468fd7dc2122d936155aa0f17bc2ad1b45a446186fc12597181886e7a6f9e */
class __TwigTemplate_9b295a3929a4aff72a807ab572d9d8cd72c81d570d2d2fda969d1bf783393066 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 22
        $this->parent = $this->loadTemplate("default_frame.twig", "__string_template__ee5468fd7dc2122d936155aa0f17bc2ad1b45a446186fc12597181886e7a6f9e", 22);
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
        $context["body_class"] = "product_page";
        // line 22
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 26
    public function block_javascript($context, array $blocks = array())
    {
        // line 27
        echo "    <script>
        // 並び順を変更
        function fnChangeOrderBy(orderby) {
            eccube.setValue('orderby', orderby);
            eccube.setValue('pageno', 1);
            eccube.submitForm();
        }

        // 表示件数を変更
        function fnChangeDispNumber(dispNumber) {
            eccube.setValue('disp_number', dispNumber);
            eccube.setValue('pageno', 1);
            eccube.submitForm();
        }
        // 商品表示BOXの高さを揃える
        \$(window).load(function() {
            \$('.product_item').matchHeight();
        });
    </script>
";
    }

    // line 48
    public function block_main($context, array $blocks = array())
    {
        // line 49
        echo "    <!-- ▼topicpath▼ -->
    <div id=\"topicpath\" class=\"row\">
      <div id=\"item-list\" class=\"page-vision\">
<div class=\"caution\">
<div class=\"footer_logo_area\">
        <p class=\"logo\">
          <a href=\"";
        // line 55
        echo $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getUrl("homepage");
        echo "\">
            <img src=\"";
        // line 56
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "front_urlpath", array()), "html", null, true);
        echo "/img/top/footer_logo.svg\" alt=\"ancharme\">
          </a>
        </p>
 <p class=\"contents-title font_a\">セレクト商品とオリジナル商品<br>について</p>

    </div>
    
<section>
<div class=\"topCategory-wrapp shop-guide\">
    <div class=\"title-wrapp\">

 <p class=\"contents-title-text\">10/06にリリースした<br>
@aspuk　たぐちゃんがプロデュースする「anCharme」</p>

 <p class=\"contents-title-text\">たくさんの皆様にご利用いただきありがとうございます。</p>
    
      <p class=\"contents-title-text\">当ブランドはオリジナル商品をメインで取り扱う完全プライベートブランドを目指しておりますが<br>
オリジナル商品に関してはデザイン、制作に大変お時間がかかります。</p>

      <p class=\"contents-title-text\">ですので、当ブランドの世界観、表現をより伝えやすくするために、現在はセレクト商品も取り扱っております。<br>
セレクト商品に関しては、海外の卸工場から取り寄せた商品ですが、かなり厳選してセレクトしております。</br>
      <p class=\"contents-title-text\">セレクト商品は商標の問題から、他ブランドでも取り扱っている可能性もございますので、<br>ご購入の際はご了承いただきご購入いただきますよう宜しくお願い致します。</p>


     <p class=\"contents-title-text\">an charme は完全オリジナルブランドを目指しておりますので、随時オリジナル商品の制作に努めてます。</p>

      <p class=\"contents-title-text\">ご理解ご了承いただきますよう、よろしくお願い申し上げます。</p>

    </div>
</section>

      </div>
</div>
    </div>
    <!-- ▲topicpath▲ -->
";
    }

    public function getTemplateName()
    {
        return "__string_template__ee5468fd7dc2122d936155aa0f17bc2ad1b45a446186fc12597181886e7a6f9e";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 56,  69 => 55,  61 => 49,  58 => 48,  35 => 27,  32 => 26,  28 => 22,  26 => 24,  11 => 22,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "__string_template__ee5468fd7dc2122d936155aa0f17bc2ad1b45a446186fc12597181886e7a6f9e", "");
    }
}
