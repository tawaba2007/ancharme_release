<?php

/* __string_template__acf230a1975ff1c8e446bc4a0d45b4fa22aec6e70080019dd53f4e5322d875a3 */
class __TwigTemplate_dc325ddc59ee4687332f32a51dd0248c48dc036a7ebaf4c391b4bfa9863fc7fb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 22
        $this->parent = $this->loadTemplate("default_frame.twig", "__string_template__acf230a1975ff1c8e446bc4a0d45b4fa22aec6e70080019dd53f4e5322d875a3", 22);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'sub_title' => array($this, 'block_sub_title'),
            'stylesheet' => array($this, 'block_stylesheet'),
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
        $context["menus"] = array(0 => "setting", 1 => "shop", 2 => "shop_payment");
        // line 29
        $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->setTheme(($context["form"] ?? null), array(0 => "Form/bootstrap_3_horizontal_layout.html.twig"));
        // line 22
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 26
    public function block_title($context, array $blocks = array())
    {
        echo "ショップ設定";
    }

    // line 27
    public function block_sub_title($context, array $blocks = array())
    {
        echo "支払方法管理";
    }

    // line 31
    public function block_stylesheet($context, array $blocks = array())
    {
        // line 32
        echo "    <link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "admin_urlpath", array()), "html", null, true);
        echo "/assets/css/fileupload/jquery.fileupload.css\">
    <link rel=\"stylesheet\" href=\"";
        // line 33
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "admin_urlpath", array()), "html", null, true);
        echo "/assets/css/fileupload/jquery.fileupload-ui.css\">
    <link rel=\"stylesheet\" href=\"https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css\">
    <style>
        .ui-state-highlight {
            height: 148px;
            border: dashed 1px #ccc;
            background: #fff;
        }
    </style>
";
    }

    // line 44
    public function block_javascript($context, array $blocks = array())
    {
        // line 45
        echo "<script src=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "admin_urlpath", array()), "html", null, true);
        echo "/assets/js/vendor/fileupload/vendor/jquery.ui.widget.js\"></script>
<script src=\"";
        // line 46
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "admin_urlpath", array()), "html", null, true);
        echo "/assets/js/vendor/fileupload/jquery.iframe-transport.js\"></script>
<script src=\"";
        // line 47
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "admin_urlpath", array()), "html", null, true);
        echo "/assets/js/vendor/fileupload/jquery.fileupload.js\"></script>
<script src=\"";
        // line 48
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "admin_urlpath", array()), "html", null, true);
        echo "/assets/js/vendor/fileupload/jquery.fileupload-process.js\"></script>
<script src=\"";
        // line 49
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "admin_urlpath", array()), "html", null, true);
        echo "/assets/js/vendor/fileupload/jquery.fileupload-validate.js\"></script>
<script src=\"https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js\"></script>
<script>
    var hideSvg = function () {
        if (\$(\"#thumb li\").length > 0) {
            \$(\"#icon_no_image\").css(\"display\", \"none\");
        } else {
            \$(\"#icon_no_image\").css(\"display\", \"\");
        }
    };

    var proto_img = ''
            + '<li class=\"ui-state-default\">'
            + '<img src=\"__path__\" />'
            + '<a class=\"delete-image\">'
            + '<svg class=\"cb cb-close\">'
            + '<use xmlns:xlink=\"http://www.w3.org/1999/xlink\" xlink:href=\"#cb-close\"></use>'
            + '</svg>'
            + '</a>'
            + '</li>';
    if (\$(\"#";
        // line 69
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "payment_image", array()), "vars", array()), "id", array()), "html", null, true);
        echo "\").val() != \"\") {
        var filename = \$(\"#";
        // line 70
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "payment_image", array()), "vars", array()), "id", array()), "html", null, true);
        echo "\").val();
        var path = '";
        // line 71
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "image_save_urlpath", array()), "html", null, true);
        echo "/' + filename;
        var \$img = \$(proto_img.replace(/__path__/g, path));
        \$(\"#";
        // line 73
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "payment_image", array()), "vars", array()), "id", array()), "html", null, true);
        echo "\").val(filename);

        \$('#thumb').append(\$img);
    }
    hideSvg();

    \$('#";
        // line 79
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "payment_image_file", array()), "vars", array()), "id", array()), "html", null, true);
        echo "').fileupload({
        url: \"";
        // line 80
        echo $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getUrl("admin_payment_image_add");
        echo "\",
        type: \"post\",
        dataType: 'json',
        done: function (e, data) {
            \$('#progress').hide();
            var path = '";
        // line 85
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "image_temp_urlpath", array()), "html", null, true);
        echo "/' + data.result.filename;
            var \$img = \$(proto_img.replace(/__path__/g, path));
            \$(\"#";
        // line 87
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "payment_image", array()), "vars", array()), "id", array()), "html", null, true);
        echo "\").val(data.result.filename);

            \$('#thumb').append(\$img);
            hideSvg();
        },
        fail: function (e, data) {
            alert('アップロードに失敗しました。');
        },
        always: function (e, data) {
            \$('#progress').hide();
            \$('#progress .progress-bar').width('0%');
        },
        start: function (e, data) {
            \$('#progress').show();
            \$(\"#thumb\").find(\"li\").remove();
            \$(\"#";
        // line 102
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "payment_image", array()), "vars", array()), "id", array()), "html", null, true);
        echo "\").val('');
        },
        acceptFileTypes: /(\\.|\\/)(gif|jpe?g|png)\$/i,
        maxFileSize: 10000000,
        maxNumberOfFiles: 1,
        progressall: function (e, data) {
            var progress = parseInt(data.loaded / data.total * 100, 10);
            \$('#progress .progress-bar').css(
                    'width',
                    progress + '%'
            );
        },
        processalways: function (e, data) {
            if (data.files.error) {
                alert(\"画像ファイルサイズが大きいか画像ファイルではありません。\");
            }
        }
    });

    \$(\"#thumb\").on(\"click\", \".delete-image\", function () {
        \$(\"#";
        // line 122
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "payment_image", array()), "vars", array()), "id", array()), "html", null, true);
        echo "\").val('');
        \$(this).parent(\"li\").remove();
        hideSvg();
    });

    // 画像アップロード
    \$('#file_upload').on('click', function () {
        \$('#";
        // line 129
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "payment_image_file", array()), "vars", array()), "id", array()), "html", null, true);
        echo "').click();
    });
</script>
";
    }

    // line 134
    public function block_main($context, array $blocks = array())
    {
        // line 135
        echo "    <form role=\"form\" class=\"form-horizontal\" name=\"form1\" id=\"form1\" method=\"post\" action=\"\" ";
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock(($context["form"] ?? null), 'enctype');
        echo ">
        ";
        // line 136
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "_token", array()), 'widget');
        echo "
        ";
        // line 137
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "charge_flg", array()), 'widget');
        echo "
        ";
        // line 138
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "fix_flg", array()), 'widget');
        echo "
        <div class=\"row\" id=\"aside_wrap\">
            <div id=\"detail_wrap\" class=\"col-md-9\">
                <div id=\"detail_box\" class=\"box\">
                    <div id=\"detail_box__header\" class=\"box-header\">
                        <h3 class=\"box-title\">支払方法登録・編集</h3>
                    </div><!-- /.box-header -->
                    <div id=\"detail_box__body\" class=\"box-body\">

                        ";
        // line 147
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "method", array()), 'row');
        echo "
                        ";
        // line 148
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "charge", array()), 'row');
        echo "

                        <div id=\"detail_box__rule\" class=\"form-group\">
                            <label class=\"col-sm-2 control-label\">
                                利用条件
                            </label>
                            <div class=\"col-sm-10 form-inline";
        // line 154
        if ((($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "rule_min", array()), "vars", array()), "valid", array()) == false) || ($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "rule_max", array()), "vars", array()), "valid", array()) == false))) {
            echo " has-error";
        }
        echo "\">
                                ";
        // line 155
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "rule_min", array()), 'widget');
        echo "
                                〜
                                ";
        // line 157
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "rule_max", array()), 'widget');
        echo "
                                ";
        // line 158
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "rule_min", array()), 'errors');
        echo "
                                ";
        // line 159
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "rule_max", array()), 'errors');
        echo "
                            </div>
                        </div>
                        <div id=\"detail_box__image\" class=\"form-group\">
                            <label class=\"col-sm-2 control-label\" for=\"admin_product_product_image\">
                                ";
        // line 164
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "payment_image_file", array()), "vars", array()), "label", array()), "html", null, true);
        echo "
                                <br>
                                <span class=\"small\">620px以上推奨</span>
                            </label>
                            <div id=\"detail_box__files\" class=\"col-sm-9 col-lg-10\">
                                <div class=\"photo_files\" id=\"drag-drop-area\">
                                    <svg id=\"icon_no_image\" class=\"cb cb-photo no-image\"> <use xmlns:xlink=\"http://www.w3.org/1999/xlink\" xlink:href=\"#cb-photo\"></use></svg>
                                    <ul id=\"thumb\" class=\"clearfix\"></ul>
                                </div>
                            </div>
                        </div>

                        <div id=\"detail_list__payment_image\" class=\"form-group\">
                            <div id=\"detail_list__payment_image_body\" class=\"col-sm-offset-2 col-sm-9 col-lg-10 \">
                                <div id=\"progress\" class=\"progress progress-striped active\" style=\"display:none;\">
                                    <div class=\"progress-bar progress-bar-info\"></div>
                                </div>
                                ";
        // line 181
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "payment_image", array()), 'widget', array("attr" => array("style" => "display:none;")));
        echo "
                                ";
        // line 182
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "payment_image_file", array()), 'widget', array("attr" => array("accept" => "image/*", "style" => "display:none;")));
        echo "
                                <a id=\"file_upload\" class=\"with-icon\">
                                    <svg class=\"cb cb-plus\"> <use xlink:href=\"#cb-plus\" /></svg>ファイルをアップロード
                                </a>
                                ";
        // line 186
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "payment_image_file", array()), 'errors');
        echo "
                            </div>
                        </div>
                        <div class=\"extra-form\">
                            ";
        // line 190
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["form"] ?? null), "getIterator", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["f"]) {
            // line 191
            echo "                                ";
            if (preg_match("[^plg*]", $this->getAttribute($this->getAttribute($context["f"], "vars", array()), "name", array()))) {
                // line 192
                echo "                                    ";
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($context["f"], 'row');
                echo "
                                ";
            }
            // line 194
            echo "                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['f'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 195
        echo "                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
                <div id=\"detail_list__back_button\" class=\"row\">
                    <div class=\"col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 text-center btn_area\">
                        <p><a href=\"";
        // line 200
        echo $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getUrl("admin_setting_shop_payment");
        echo "\">一覧に戻る</a></p>
                    </div>
                </div>

            </div><!-- /.col -->
            
            <div id=\"detail_list_footer\" class=\"col-md-3\">
                <div class=\"col_inner\" id=\"aside_column\">
                    <div id=\"detail_list_footer__body\" class=\"box no-header\">
                        <div id=\"detail_list_footer__body_inner\" class=\"box-body\">
                            <div id=\"detail_list_footer__insert_button\" class=\"row text-center\">
                                <div class=\"col-sm-6 col-sm-offset-3 col-md-12 col-md-offset-0\">
                                    <button class=\"btn btn-primary btn-block btn-lg\" type=\"submit\">登録</button>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div>
            </div><!-- /.col --> 

        </div>
    </form>


";
    }

    public function getTemplateName()
    {
        return "__string_template__acf230a1975ff1c8e446bc4a0d45b4fa22aec6e70080019dd53f4e5322d875a3";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  344 => 200,  337 => 195,  331 => 194,  325 => 192,  322 => 191,  318 => 190,  311 => 186,  304 => 182,  300 => 181,  280 => 164,  272 => 159,  268 => 158,  264 => 157,  259 => 155,  253 => 154,  244 => 148,  240 => 147,  228 => 138,  224 => 137,  220 => 136,  215 => 135,  212 => 134,  204 => 129,  194 => 122,  171 => 102,  153 => 87,  148 => 85,  140 => 80,  136 => 79,  127 => 73,  122 => 71,  118 => 70,  114 => 69,  91 => 49,  87 => 48,  83 => 47,  79 => 46,  74 => 45,  71 => 44,  57 => 33,  52 => 32,  49 => 31,  43 => 27,  37 => 26,  33 => 22,  31 => 29,  29 => 24,  11 => 22,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "__string_template__acf230a1975ff1c8e446bc4a0d45b4fa22aec6e70080019dd53f4e5322d875a3", "");
    }
}
