<?php

/* __string_template__e748083cd9bc21b0f13f52268e7cba9d24bd6c763d8ef1995bd8ed80208d46b3 */
class __TwigTemplate_00f1757c7b43f719aefeeac898d3410e72d58a23d50dc74615133d725b1841f3 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 10
        $this->parent = $this->loadTemplate("SalesReport/Resource/template/admin/index.twig", "__string_template__e748083cd9bc21b0f13f52268e7cba9d24bd6c763d8ef1995bd8ed80208d46b3", 10);
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
        $context["report_title"] = "期間別集計";
        // line 13
        $context["action"] = $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getUrl("admin_plugin_sales_report_term");
        // line 14
        $context["menus"] = array(0 => "admin_plugin_sales_report", 1 => "admin_plugin_sales_report");
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
            //create line chart
            if(graphData != null) {
                var dataSet = graphData.datasets;
                graphData.datasets = [dataSet];
                ";
        // line 24
        if (($this->getAttribute(($context["options"] ?? null), "unit", array(), "any", true, true) && (($this->getAttribute(($context["options"] ?? null), "unit", array()) == "byWeekDay") || ($this->getAttribute(($context["options"] ?? null), "unit", array()) == "byHour")))) {
            // line 25
            echo "                    var config = {
                        type: 'bar',
                        data: graphData,
                        options: {
                            responsive: true,
                            tooltips: {
                                callbacks: {
                                    label : function tooltipsRender(tooltipItem, graphData) {
                                        var index = tooltipItem.index;
                                        var tooltipData = graphData.datasets[0].data[index];
                                        var tooltipLabel = graphData.labels[index];
                                        return '購入合計 : ¥' + moneyFormat(tooltipData);
                                    }
                                }
                            },
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        callback: function(value){
                                            return Math.round(value).toString().replace(/(\\d)(?=(\\d{3})+\$)/g, '\$1,');
                                        }
                                    }
                                }]
                            }
                        }
                    };
                ";
        } else {
            // line 52
            echo "                    var config = {
                        type: 'line',
                        data: graphData,
                        options: {
                            responsive: true,
                            tooltips: {
                                callbacks: {
                                    label : function tooltipsRender(tooltipItem, graphData) {
                                        var index = tooltipItem.index;
                                        var tooltipData = graphData.datasets[0].data[index];
                                        var tooltipLabel = graphData.labels[index];
                                        return '購入合計 : ¥' + moneyFormat(tooltipData);
                                    }
                                }
                            },
                            scales: {
                                yAxes: [{
                                    ticks: {
                                        callback: function(value){
                                            return Math.round(value).toString().replace(/(\\d)(?=(\\d{3})+\$)/g, '\$1,');
                                        }
                                    }
                                }]
                            }
                        }
                    };
                ";
        }
        // line 79
        echo "                var ctx = document.getElementById(\"chart\").getContext(\"2d\");
                new Chart(ctx, config);
            }
            //export csv
            \$('#export-csv').click(function () {
                var form = document.createElement(\"form\");
                form.setAttribute(\"method\", 'POST');
                form.setAttribute(\"action\", \"";
        // line 86
        echo $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getUrl("admin_plugin_sales_report_export", array("type" => "term"));
        echo "\");
                document.body.appendChild(form);
                form.submit();
                document.body.removeChild(form);
            });
        };
    </script>
";
    }

    // line 95
    public function block_option($context, array $blocks = array())
    {
        // line 96
        echo "<div class=\"form-group\">
    ";
        // line 97
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "unit", array()), 'label');
        echo "
    <div class=\"col-sm-9 col-lg-10 form-inline\">
        ";
        // line 99
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "unit", array()), 'widget');
        echo "
        ";
        // line 100
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "unit", array()), 'errors');
        echo "
    </div>
</div>
";
    }

    // line 105
    public function block_table($context, array $blocks = array())
    {
        // line 106
        echo "    ";
        if (($this->getAttribute($this->getAttribute(($context["app"] ?? null), "request", array()), "method", array()) == "POST")) {
            // line 107
            echo "        ";
            if ( !(null === ($context["rawData"] ?? null))) {
                // line 108
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
                                <table class=\"table table-striped\" id=\"term-table\">
                                    <colgroup>
                                        <col />
                                        <col width=\"7%\"/>
                                        <col width=\"7%\"/>
                                        <col width=\"7%\"/>
                                        <col width=\"7%\"/>
                                        <col width=\"7%\"/>
                                        <col width=\"7%\"/>
                                        <col width=\"7%\"/>
                                        <col width=\"7%\"/>
                                        <col />
                                        <col />
                                    </colgroup>
                                    <thead>
                                        <tr>
                                            <th style=\"text-align: center\">期間</th>
                                            <th style=\"text-align: center\">購入件数</th>
                                            <th style=\"text-align: center\">男性</th>
                                            <th style=\"text-align: center\">女性</th>
                                            <th style=\"text-align: center\">不明</th>
                                            <th style=\"text-align: center\">男性 (会員)</th>
                                            <th style=\"text-align: center\">男性 (非会員)</th>
                                            <th style=\"text-align: center\">女性 (会員)</th>
                                            <th style=\"text-align: center\">女性 (非会員)</th>
                                            <th style=\"text-align: center\">購入合計(円)</th>
                                            <th style=\"text-align: center\">購入平均(円)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        ";
                // line 148
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["rawData"] ?? null));
                foreach ($context['_seq'] as $context["date"] => $context["row"]) {
                    // line 149
                    echo "                                            <tr>
                                                <td>";
                    // line 150
                    echo twig_escape_filter($this->env, $context["date"], "html", null, true);
                    echo "</td>
                                                <td class=\"text-right\">";
                    // line 151
                    echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($context["row"], "time", array())), "html", null, true);
                    echo "</td>

                                                <td class=\"text-right\">";
                    // line 153
                    echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($context["row"], "male", array())), "html", null, true);
                    echo "</td>
                                                <td class=\"text-right\">";
                    // line 154
                    echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($context["row"], "female", array())), "html", null, true);
                    echo "</td>
                                                <td class=\"text-right\">";
                    // line 155
                    echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($context["row"], "other", array())), "html", null, true);
                    echo "</td>
                                                <td class=\"text-right\">";
                    // line 156
                    echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($context["row"], "member_male", array())), "html", null, true);
                    echo "</td>
                                                <td class=\"text-right\">";
                    // line 157
                    echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($context["row"], "nonmember_male", array())), "html", null, true);
                    echo "</td>
                                                <td class=\"text-right\">";
                    // line 158
                    echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($context["row"], "member_female", array())), "html", null, true);
                    echo "</td>
                                                <td class=\"text-right\">";
                    // line 159
                    echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($context["row"], "nonmember_female", array())), "html", null, true);
                    echo "</td>

                                                <td class=\"price-format text-right\">
                                                    ";
                    // line 162
                    echo twig_escape_filter($this->env, twig_number_format_filter($this->env, $this->getAttribute($context["row"], "price", array())), "html", null, true);
                    echo "
                                                    <span class=\"hidden\">";
                    // line 163
                    echo twig_escape_filter($this->env, $this->getAttribute($context["row"], "price", array()), "html", null, true);
                    echo "</span>
                                                </td>
                                                <td class=\"price-format text-right\">
                                                    ";
                    // line 166
                    if (($this->getAttribute($context["row"], "time", array()) > 0)) {
                        // line 167
                        echo "                                                        ";
                        echo twig_escape_filter($this->env, twig_number_format_filter($this->env, twig_round(($this->getAttribute($context["row"], "price", array()) / $this->getAttribute($context["row"], "time", array())), 2, "floor")), "html", null, true);
                        echo "
                                                    ";
                    } else {
                        // line 169
                        echo "                                                        0
                                                    ";
                    }
                    // line 171
                    echo "                                                    <span class=\"hidden\">
                                                        ";
                    // line 172
                    if (($this->getAttribute($context["row"], "time", array()) > 0)) {
                        // line 173
                        echo "                                                            ";
                        echo twig_escape_filter($this->env, twig_round(($this->getAttribute($context["row"], "price", array()) / $this->getAttribute($context["row"], "time", array())), 2, "floor"), "html", null, true);
                        echo "
                                                        ";
                    } else {
                        // line 175
                        echo "                                                            0
                                                        ";
                    }
                    // line 177
                    echo "                                                    </span>
                                                </td>
                                            </tr>
                                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['date'], $context['row'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 181
                echo "                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div><!-- /.box -->
                </div><!-- /.col -->
            </div>
        ";
            } else {
                // line 189
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
            // line 199
            echo "    ";
        }
    }

    public function getTemplateName()
    {
        return "__string_template__e748083cd9bc21b0f13f52268e7cba9d24bd6c763d8ef1995bd8ed80208d46b3";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  321 => 199,  309 => 189,  299 => 181,  290 => 177,  286 => 175,  280 => 173,  278 => 172,  275 => 171,  271 => 169,  265 => 167,  263 => 166,  257 => 163,  253 => 162,  247 => 159,  243 => 158,  239 => 157,  235 => 156,  231 => 155,  227 => 154,  223 => 153,  218 => 151,  214 => 150,  211 => 149,  207 => 148,  165 => 108,  162 => 107,  159 => 106,  156 => 105,  148 => 100,  144 => 99,  139 => 97,  136 => 96,  133 => 95,  121 => 86,  112 => 79,  83 => 52,  54 => 25,  52 => 24,  43 => 18,  40 => 17,  37 => 16,  33 => 10,  31 => 14,  29 => 13,  27 => 12,  11 => 10,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "__string_template__e748083cd9bc21b0f13f52268e7cba9d24bd6c763d8ef1995bd8ed80208d46b3", "");
    }
}
