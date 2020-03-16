<?php

/* SalesReport/Resource/template/admin/index.twig */
class __TwigTemplate_0de8ff60f3e99d9d44a47c02a494e0eb7ef71079d029c3db28afc3dd4ce1c722 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 10
        $this->parent = $this->loadTemplate("default_frame.twig", "SalesReport/Resource/template/admin/index.twig", 10);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheet' => array($this, 'block_stylesheet'),
            'javascript' => array($this, 'block_javascript'),
            'chart' => array($this, 'block_chart'),
            'main' => array($this, 'block_main'),
            'option' => array($this, 'block_option'),
            'table' => array($this, 'block_table'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "default_frame.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 14
        $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->setTheme(($context["form"] ?? null), array(0 => "Form/bootstrap_3_horizontal_layout.html.twig"));
        // line 10
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 12
    public function block_title($context, array $blocks = array())
    {
        echo "売上管理";
    }

    // line 16
    public function block_stylesheet($context, array $blocks = array())
    {
        // line 17
        echo "    <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "admin_urlpath", array()), "html", null, true);
        echo "/assets/css/bootstrap-datetimepicker.min.css\">
";
    }

    // line 20
    public function block_javascript($context, array $blocks = array())
    {
        // line 21
        echo "    <script src=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "admin_urlpath", array()), "html", null, true);
        echo "/assets/js/vendor/moment.min.js\"></script>
    <script src=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "admin_urlpath", array()), "html", null, true);
        echo "/assets/js/vendor/moment-ja.js\"></script>
    <script src=\"";
        // line 23
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "admin_urlpath", array()), "html", null, true);
        echo "/assets/js/vendor/bootstrap-datetimepicker.min.js\"></script>
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.3.0/Chart.js\"></script>
    ";
        // line 25
        $this->displayBlock('chart', $context, $blocks);
        // line 26
        echo "    <script>
        \$(function () {
            var inputDate = document.createElement('input');
            inputDate.setAttribute('type', 'date');
            if (inputDate.type !== 'date') {
                \$('input[id\$=_start]').datetimepicker({
                    locale: 'ja',
                    format: 'YYYY-MM-DD',
                    useCurrent: false
                });

                \$('input[id\$=_end]').datetimepicker({
                    locale: 'ja',
                    format: 'YYYY-MM-DD',
                    showTodayButton: true
                });

                \$('input[id\$=monthly]').datetimepicker({
                    locale: 'ja',
                    format: 'YYYY-MM-01',
                    showTodayButton: true
                });
            }

            \$(\"#btn-monthly\").on(\"click\", function () {
                \$(\"#";
        // line 51
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "term_type", array()), "vars", array()), "id", array()), "html", null, true);
        echo "\").val('monthly');
                document.form1.submit();
            });

            \$(\"#btn-term\").on(\"click\", function () {
                \$(\"#";
        // line 56
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "term_type", array()), "vars", array()), "id", array()), "html", null, true);
        echo "\").val('term');
                document.form1.submit();
            });

        });

        function moneyFormat(money) {
            return money.toString().replace(/\\B(?=(\\d{3})+(?!\\d))/g, \",\");
        }

        jQuery.fn.tableToCSV = function() {
            var clean_text = function(text){
                text = text.replace(/\"/g, '\"\"');
                return '\"' + text + '\"';
            };

            \$(this).each(function(){
                var table = \$(this);
                var caption = \$('.box-title').text();
                var title = [];
                var rows = [];

                \$(this).find('tr').each(function(){
                    var data = [];
                    \$(this).find('th').each(function(){
                        var text = \$(this).text();
                        title.push(text);
                    });
                    \$(this).find('td').each(function(){
                        var td = \$(this);
                        var text = td.text();
                        if(td.hasClass('price-format')) {
                            td.find('span').each(function() {
                                text = \$(this).text().trim();
                                if (text != '-') {
                                    text = Math.round(text);
                                } else {
                                    text = 0;
                                }
                                data.push(text);
                            });
                        } else {
                            data.push(text);
                        }
                    });
                    data = data.join(\",\");
                    rows.push(data);
                });
                title = title.join(\",\");
                rows = rows.join(\"\\n\");

                var csv = title + rows;
                var ts = new Date();
                var fileName;
                ts = ts.getFullYear().toString() + (ts.getMonth() + 1) + ts.getDate() + ts.getHours() + ts.getMinutes() + ts.getSeconds();

                if(caption == \"\"){
                    fileName = ts + \".csv\";
                } else {
                    fileName = caption + \"_\" + ts + \".csv\";
                }

                // if microsoft IE
                if (navigator.msSaveBlob) {
                    navigator.msSaveBlob(new Blob([csv], { type: 'text/csv;charset=utf-8;' }), fileName);
                } else {
                    var uri = 'data:text/csv;charset=utf-8,' + encodeURIComponent(csv);
                    var download_link = document.createElement('a');
                    download_link.href = uri;
                    download_link.download = fileName;
                    document.body.appendChild(download_link);
                    download_link.click();
                    document.body.removeChild(download_link);
                }

            });
        };

    </script>
";
    }

    // line 25
    public function block_chart($context, array $blocks = array())
    {
    }

    // line 137
    public function block_main($context, array $blocks = array())
    {
        // line 138
        echo "    <form role=\"form\" name=\"form1\" id=\"form1\" method=\"post\" action=\"";
        echo twig_escape_filter($this->env, ($context["action"] ?? null), "html", null, true);
        echo "\" novalidate>
        ";
        // line 139
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "_token", array()), 'widget');
        echo "
        ";
        // line 140
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "term_type", array()), 'widget');
        echo "
        <div class=\"row\" id=\"aside_wrap\">
            <div class=\"col-xs-12 col-sm-12 col-md-12\">
                <div class=\"box form-horizontal\">
                    <div class=\"box-header\">
                        <h3 class=\"box-title\">";
        // line 145
        echo twig_escape_filter($this->env, ($context["report_title"] ?? null), "html", null, true);
        echo "</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class=\"box-body\">
                        <div class=\"form-group\">
                            <label class=\"col-sm-2 control-label\">月度集計</label>
                            <div class=\"col-sm-9 col-lg-10 form-inline\">
                                ";
        // line 152
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "monthly_year", array()), 'widget');
        echo " 年 ";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "monthly_month", array()), 'widget');
        echo " 月
                                ";
        // line 153
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "monthly_year", array()), 'errors');
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "monthly_month", array()), 'errors');
        echo "
                                <a id=\"btn-monthly\" class=\"btn btn-default\">月度で集計</a>
                            </div>
                        </div>
                        <div class=\"form-group\">
                            ";
        // line 158
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "term_start", array()), 'label');
        echo "
                            <div class=\"col-sm-9 col-lg-10 form-inline\">
                                ";
        // line 160
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "term_start", array()), 'widget', array("attr" => array("placeholder" => "年-月-日")));
        echo " ～ ";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "term_end", array()), 'widget', array("attr" => array("placeholder" => "年-月-日")));
        echo "
                                <a id=\"btn-term\" class=\"btn btn-default\">期間で集計</a>
                            </div>
                        </div>
                        <div class=\"form-group\" style=\"margin: auto 0 !important; \">
                            <label class=\"col-sm-2 control-label\"></label>
                            <div class=\"col-sm-9 col-lg-10 form-inline\">
                                ";
        // line 167
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "term_start", array()), 'errors');
        echo "
                                ";
        // line 168
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "term_end", array()), 'errors');
        echo "
                            </div>
                        </div>

                        ";
        // line 172
        $this->displayBlock('option', $context, $blocks);
        // line 173
        echo "
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>

        ";
        // line 182
        if ((($this->getAttribute($this->getAttribute(($context["app"] ?? null), "request", array()), "method", array()) == "POST") &&  !(null === ($context["rawData"] ?? null)))) {
            // line 183
            echo "        <div class=\"row\">
            <div class=\"col-sm-12 col-md-8 col-md-offset-2\">
                <canvas id=\"chart\"></canvas>
            </div>
        </div>
        ";
        }
        // line 189
        echo "
        ";
        // line 190
        $this->displayBlock('table', $context, $blocks);
        // line 191
        echo "
    </form>
";
    }

    // line 172
    public function block_option($context, array $blocks = array())
    {
    }

    // line 190
    public function block_table($context, array $blocks = array())
    {
    }

    public function getTemplateName()
    {
        return "SalesReport/Resource/template/admin/index.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  308 => 190,  303 => 172,  297 => 191,  295 => 190,  292 => 189,  284 => 183,  282 => 182,  271 => 173,  269 => 172,  262 => 168,  258 => 167,  246 => 160,  241 => 158,  232 => 153,  226 => 152,  216 => 145,  208 => 140,  204 => 139,  199 => 138,  196 => 137,  191 => 25,  107 => 56,  99 => 51,  72 => 26,  70 => 25,  65 => 23,  61 => 22,  56 => 21,  53 => 20,  46 => 17,  43 => 16,  37 => 12,  33 => 10,  31 => 14,  11 => 10,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "SalesReport/Resource/template/admin/index.twig", "/home/ancharme/ancharme.jp/public_html/app/Plugin/SalesReport/Resource/template/admin/index.twig");
    }
}
