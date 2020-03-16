<?php

/* __string_template__ba581b9420a0fc647ce2fe8dd009d7a3066a6cc8d4c77804f0d3abb77b3eb81b */
class __TwigTemplate_940df8c91804c3624df5d12d6098a2410c4f8da3dd02ee47cb89d8667fc034c6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 10
        $this->parent = $this->loadTemplate("SalesReport/Resource/template/admin/index.twig", "__string_template__ba581b9420a0fc647ce2fe8dd009d7a3066a6cc8d4c77804f0d3abb77b3eb81b", 10);
        $this->blocks = array(
            'chart' => array($this, 'block_chart'),
            'option' => array($this, 'block_option'),
            'table' => array($this, 'block_table'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "SalesReport/Resource/template/admin/index.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 12
        $context["report_title"] = "商品別集計";
        // line 13
        $context["action"] = $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getUrl("admin_plugin_sales_report_product");
        // line 14
        $context["menus"] = array(0 => "admin_plugin_sales_report", 1 => "admin_plugin_sales_report_product");
        // line 10
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 16
    public function block_chart($context, array $blocks = array())
    {
        // line 17
        echo "    <script>
        var graphData = ";
        // line 18
        echo ($context["graphData"] ?? null);
        echo ";
        window.onload = function() {
            var dataSet = graphData.datasets;
            graphData.datasets = [dataSet];
            //create pie chart
            if (graphData != null) {
                var config = {
                    type: 'bar',
                    data: graphData,
                    options: {
                        responsive: true,
                        title:{
                            display: true,
                            text: \"商品別集計 上位\" + ";
        // line 31
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "SalesReport", array()), "const", array()), "product_maximum_display", array()), "html", null, true);
        echo " + \"件\"
                        },
                        tooltips: {
                            callbacks: {
                                label : function tooltipsRender(tooltipItem, graphData) {
                                    var index = tooltipItem.index;
                                    var tooltipData = graphData.datasets[0].data[index];
                                    var tooltipLabel = graphData.labels[index];
                                    return tooltipLabel + ' : ¥' + moneyFormat(tooltipData);
                                }
                            }
                        },
                        legend: {
                            display: false
                        },
                        scales: {
                            xAxes: [{
                                ticks: {
                                    minRotation: 90,
                                    maxRotation: 90
                                }
                            }],
                            yAxes: [{
                                ticks: {
                                    callback: function(value){
                                        return Math.round(value).toString().replace(/(\\d)(?=(\\d{3})+\$)/g, '\$1,');
                                    },
                                    beginAtZero:true,
                                    suggestedMin: 0
                                }
                            }]
                        }
                    }
                };
                var ctx = document.getElementById(\"chart\").getContext(\"2d\");
                new Chart(ctx, config);
            }
            //export csv
            \$('#export-csv').click(function () {
                var form = document.createElement(\"form\");
                form.setAttribute(\"method\", 'POST');
                form.setAttribute(\"action\", \"";
        // line 72
        echo $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getUrl("admin_plugin_sales_report_export", array("type" => "product"));
        echo "\");
                document.body.appendChild(form);
                form.submit();
                document.body.removeChild(form);
            });
        };
    </script>
";
    }

    // line 81
    public function block_option($context, array $blocks = array())
    {
    }

    // line 83
    public function block_table($context, array $blocks = array())
    {
        // line 84
        echo "    ";
        if (($this->getAttribute($this->getAttribute(($context["app"] ?? null), "request", array()), "method", array()) == "POST")) {
            // line 85
            echo "        ";
            if ( !(null === ($context["rawData"] ?? null))) {
                // line 86
                echo "            <div class=\"row\">
                <div class=\"box-header\">
                    <button type=\"button\" class=\"btn btn-default pull-right\" id=\"export-csv\">CSVダウンロード</button>
                </div>
            </div>
            <div class=\"row\">
                <div class=\"col-md-12\">
                    <div class=\"box\">
                        <div class=\"table_list\">
                            <div class=\"table-responsive with-border\">
                                <table class=\"table table-striped\" id=\"product-table\">
                                    <thead>
                                    <tr>
                                        <th>商品コード</th>
                                        <th>商品名</th>
                                        <th>購入件数(件)</th>
                                        <th>数量(個)</th>
                                        <th>金額(円)</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    ";
                // line 107
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["rawData"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["row"]) {
                    // line 108
                    echo "                                        <tr>
                                            <td>";
                    // line 109
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["row"], "OrderDetail", array()), "product_code", array()), "html", null, true);
                    echo "</td>
                                            <td>";
                    // line 110
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["row"], "OrderDetail", array()), "product_name", array()), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["row"], "OrderDetail", array()), "class_category_name1", array()), "html", null, true);
                    echo " ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["row"], "OrderDetail", array()), "class_category_name2", array()), "html", null, true);
                    echo "</td>
                                            <td class=\"text-right\">";
                    // line 111
                    echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($context["row"], "time", array())), "html", null, true);
                    echo "</td>
                                            <td class=\"text-right\">";
                    // line 112
                    echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($context["row"], "quantity", array())), "html", null, true);
                    echo "</td>
                                            <td class=\"price-format text-right\">
                                                ";
                    // line 114
                    echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($context["row"], "total", array())), "html", null, true);
                    echo "
                                                <span class=\"hidden\">";
                    // line 115
                    echo $this->getAttribute($context["row"], "total", array());
                    echo "</span>
                                            </td>
                                        </tr>
                                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['row'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 119
                echo "                                    </tbody>
                                </table>
                            </div>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div>
        ";
            } else {
                // line 127
                echo "            <div class=\"row\">
                <div class=\"col-md-12\">
                    <div class=\"box\">
                        <div class=\"box-header with-arrow\">
                            <h3 class=\"box-title\">集計期間にデータがありませんでした。</h3>
                        </div><!-- /.box-header -->
                    </div>
                </div>
            </div>
        ";
            }
            // line 137
            echo "    ";
        }
    }

    public function getTemplateName()
    {
        return "__string_template__ba581b9420a0fc647ce2fe8dd009d7a3066a6cc8d4c77804f0d3abb77b3eb81b";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  216 => 137,  204 => 127,  194 => 119,  184 => 115,  180 => 114,  175 => 112,  171 => 111,  163 => 110,  159 => 109,  156 => 108,  152 => 107,  129 => 86,  126 => 85,  123 => 84,  120 => 83,  115 => 81,  103 => 72,  59 => 31,  43 => 18,  40 => 17,  37 => 16,  33 => 10,  31 => 14,  29 => 13,  27 => 12,  11 => 10,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "__string_template__ba581b9420a0fc647ce2fe8dd009d7a3066a6cc8d4c77804f0d3abb77b3eb81b", "");
    }
}
