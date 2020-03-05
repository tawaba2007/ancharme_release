
<!--{if $smarty.server.PHP_SELF == "`$smarty.const.URL_DIR`smp/shopping/complete.php" && $arrGAOrder && $arrGAOrderDetail}-->
<script type="text/javascript">
        var dataLayer = dataLayer || [];
        dataLayer.push({
            'ecommerce': {
                'purchase': {
                    'actionField': {
                        'id': '<!--{$arrGAOrder.order_id}-->',
                        'affiliation': '<!--{$arrGAOrder.shop_name}-->',
                        'revenue': '<!--{$arrGAOrder.total_without_tax_shipping - }-->',
                        'tax': '<!--{$arrGAOrder.tax}-->',
                        'shipping': '<!--{$arrGAOrder.shipping_total}-->',
                    },
                    <!--{section name=cnt loop=$arrGAOrderDetail}-->
                    'products': [{
                        'name': '<!--{$arrGAOrderDetail[cnt].product_name}-->',
                        'id': '<!--{$arrGAOrderDetail[cnt].product_code}-->',
                        'price': '<!--{$arrGAOrderDetail[cnt].tax_added_price}-->',
                        'category': '<!--{$arrGAOrderDetail[cnt].category_name}-->',
                        'quantity': '<!--{$arrGAOrderDetail[cnt].quantity}-->',
                    }]
                    <!--{/section}-->
                }
            }
        });
    </script>
<!--{/if}-->
