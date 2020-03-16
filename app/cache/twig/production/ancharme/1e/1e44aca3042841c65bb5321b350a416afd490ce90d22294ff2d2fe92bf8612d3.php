<?php

/* Block/ecommerce_productbuy.twig */
class __TwigTemplate_dc5bc9ed12869867980f476c7809047b9abd57ee852691b3bd555e702e9f62fb extends Twig_Template
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
        echo "<?php
// Transacion（取引）データの登録
function getTransactionJs(&\$trans) {
  return <<<HTML
ga('ecommerce:addTransaction', {
  'id': '{\$trans['id']}',
  'affiliation': '{\$trans['affiliation']}',
  'revenue': '{\$trans['revenue']}',
  'shipping': '{\$trans['shipping']}',
  'tax': '{\$trans['tax']}'
});
HTML;
}

// 商品データの登録
function getItemJs(&\$transId, &\$item) {
  return <<<HTML
ga('ecommerce:addItem', {
  'id': '\$transId',
  'name': '{\$item['name']}',
  'sku': '{\$item['sku']}',
  'category': '{\$item['category']}',
  'price': '{\$item['price']}',
  'quantity': '{\$item['quantity']}'
});
HTML;
}
?>";
    }

    public function getTemplateName()
    {
        return "Block/ecommerce_productbuy.twig";
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
        return new Twig_Source("", "Block/ecommerce_productbuy.twig", "/home/ancharme/ancharme.jp/public_html/app/template/ancharme/Block/ecommerce_productbuy.twig");
    }
}
