<?php

/* Block/ecommerce_complete.twig */
class __TwigTemplate_13a2b4d917901067995907821a7f5904037d03d33225ac529d6c1dc500f2ebb5 extends Twig_Template
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
        echo "<!-- 完了ページのHTMLに記述 -->
<script>
// Eコマースのライブラリを読み込み
ga('require', 'ecommerce');

<?php
// サーバーサイドで記述したコードを読み込んで出力
echo getTransactionJs(\$trans);
// 複数商品に対応するためのループ処理
foreach (\$items as &\$item) {
  echo getItemJs(\$trans['id'], \$item);
}
?>

// Googleアナリティクスに送信
ga('ecommerce:send');
</script>";
    }

    public function getTemplateName()
    {
        return "Block/ecommerce_complete.twig";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Block/ecommerce_complete.twig", "/home/ancharme/ancharme.jp/public_html/app/template/ancharme/Block/ecommerce_complete.twig");
    }
}
