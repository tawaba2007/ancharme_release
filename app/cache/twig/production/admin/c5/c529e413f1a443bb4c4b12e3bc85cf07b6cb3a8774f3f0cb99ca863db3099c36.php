<?php

/* __string_template__c408610fcf2ad45a69d23bebbac97bc972a304a9e117f6d1a8eafedfbf42a04a */
class __TwigTemplate_87671536c758852bcabad95a955806d57580038bab47649d40640ded91ca9e7f extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 22
        $this->parent = $this->loadTemplate("default_frame.twig", "__string_template__c408610fcf2ad45a69d23bebbac97bc972a304a9e117f6d1a8eafedfbf42a04a", 22);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'sub_title' => array($this, 'block_sub_title'),
            'javascript' => array($this, 'block_javascript'),
            'main' => array($this, 'block_main'),
            'stylesheet' => array($this, 'block_stylesheet'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "default_frame.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 24
        $context["menus"] = array(0 => "product", 1 => "product_master");
        // line 29
        if (($context["not_product_class"] ?? null)) {
            // line 30
            $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->setTheme(($context["form"] ?? null), array(0 => "Form/bootstrap_3_horizontal_layout.html.twig"));
        } else {
            // line 32
            $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->setTheme(($context["classForm"] ?? null), array(0 => "Form/bootstrap_3_horizontal_layout.html.twig"));
        }
        // line 22
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 26
    public function block_title($context, array $blocks = array())
    {
        echo "商品管理";
    }

    // line 27
    public function block_sub_title($context, array $blocks = array())
    {
        echo "商品登録(商品規格)";
    }

    // line 35
    public function block_javascript($context, array $blocks = array())
    {
        echo "<script src=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "admin_urlpath", array()), "html", null, true);
        echo "/assets/js/vendor/fileupload/vendor/jquery.ui.widget.js\"></script>
<script src=\"";
        // line 36
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "admin_urlpath", array()), "html", null, true);
        echo "/assets/js/vendor/fileupload/jquery.iframe-transport.js\"></script>
<script src=\"";
        // line 37
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "admin_urlpath", array()), "html", null, true);
        echo "/assets/js/vendor/fileupload/jquery.fileupload.js\"></script>
<script src=\"";
        // line 38
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "admin_urlpath", array()), "html", null, true);
        echo "/assets/js/vendor/fileupload/jquery.fileupload-process.js\"></script>
<script src=\"";
        // line 39
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "admin_urlpath", array()), "html", null, true);
        echo "/assets/js/vendor/fileupload/jquery.fileupload-validate.js\"></script>
<script src=\"https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js\"></script>
<script>
    \$(function () {
        \$(\"#result_box\").on(\"click\", \".delete-image\", function () {
            var \$this = \$(this);
            var index = \$this.data('index');
            \$('#file_name_' + index).val('');
            \$('#class_image_box_' + index).remove();
            \$('#file_delete_flag_' + index).prop('checked', true);
        });
        var image_html = ''
            + '<div class=\"ui-state-default\" id=\"class_image_box___index__\" >'
            + '<img src=\"__path__\" />'
            + '<a class=\"delete-image\" data-index=\"__index__\">'
            + '<svg class=\"cb cb-close\">'
            + '<use xmlns:xlink=\"http://www.w3.org/1999/xlink\" xlink:href=\"#cb-close\"></use>'
            + '</svg>'
            + '</a>'
            + '</div>';
        \$('.file-upload').fileupload({
            url: \"";
        // line 60
        echo $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getUrl("plugin_plugin_ApgProductClassImage_addImage");
        echo "\",
            type: \"post\",
            sequentialUploads: true,
            dataType: 'json',
            done: function (e, response) {
                var \$this = \$(this);
                var index = \$this.data('index');
                \$('#progress' + index).hide();
                \$('#file_name_' + index).val(response.result.file);
                \$('#file_delete_flag_' + index).prop('checked', false);
                var path = response.result.image_url;
                var temp = image_html.replace(/__path__/g, path);
                \$img = \$(temp.replace(/__index__/g, index));
                \$('#class_image_box_' + index).remove();
                \$('#result_box__plg_file_name--' + index).prepend(\$img);
            },
            fail: function (e, data) {
                alert('アップロードに失敗しました。');
            },
            always: function (e, data) {
                var \$this = \$(this);
                \$('#progress' + \$this.data('index')).hide();
                \$('#progress' + \$this.data('index') + ' .progress-bar').width('0%');
            },
            start: function (e, data) {
                var \$this = \$(this);
                \$('#progress' + \$this.data('index')).show();
            },
            submit: function (e, data) {
                var \$target = \$(this);
                data.formData = {id: \$target.data('id')};
                if (!data.formData.id) {
                    data.context.find('button').prop('disabled', false);
                    input.focus();
                    return false;
                }
            },
            acceptFileTypes: /(\\.|\\/)(gif|jpe?g|png)\$/i,
            maxFileSize: ";
        // line 98
        echo twig_escape_filter($this->env, $this->getAttribute(($context["ProductClassImageSetting"] ?? null), "imageMaxSizeUnitMb", array()), "html", null, true);
        echo ",
            singleFileUploads: true,
            maxNumberOfFiles: 1,
            progressall: function (e, data) {
                var \$this = \$(this);
                var progress = parseInt(data.loaded / data.total * 100, 10);
                \$('#progress' + \$this.data('index') + ' .progress-bar').css(
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
    })
</script>
<script>
    \$(function() {

        // 無制限チェックボックス初期表示
        \$('input[id\$=_stock_unlimited]').each(function() {
            var check = \$(this).prop('checked');
            var index = \$(this).attr('id').match(/\\d+/);

            if (check) {
                \$('#form_product_classes_' + index +'_stock').prop('disabled', true);
            } else {
                \$('#form_product_classes_' + index +'_stock').prop('disabled', false);
            }
        });



        // 無制限チェックボックス
        \$('input[id\$=_stock_unlimited]').click(function() {
            var check = \$(this).prop('checked');
            var index = \$(this).attr('id').match(/\\d+/);

            if (check) {
                \$('#form_product_classes_' + index +'_stock').prop('disabled', true);
            } else {
                \$('#form_product_classes_' + index +'_stock').prop('disabled', false);
            }
        });

        // 登録チェックボックス
        \$('#add-all').click(function() {
            var addall = \$('#add-all').prop('checked');
            if (addall) {
                \$('input[id\$=_add]').prop('checked', true);
            } else {
                \$('input[id\$=_add]').prop('checked', false);
            }
        });

        // 1行目をコピーボタン
        \$('#copy').click(function() {
            var check = \$('#form_product_classes_0_add').prop('checked');
            \$('input[id\$=_add]').prop('checked', check);

            var product_code = \$('#form_product_classes_0_code').val();
            \$('input[id\$=_code]').val(product_code);

            var stock = \$('#form_product_classes_0_stock').val();
            \$('input[id\$=_stock]').val(stock);

            var stock_unlimited = \$('#form_product_classes_0_stock_unlimited').prop('checked');
            // 無制限チェックボックス
            \$('input[id\$=_stock_unlimited]').each(function() {
                var index = \$(this).attr('id').match(/\\d+/);

                if (stock_unlimited) {
                    \$(this).prop('checked', true);
                    \$('#form_product_classes_' + index +'_stock').prop('disabled', true);
                } else {
                    \$(this).prop('checked', false);
                    \$('#form_product_classes_' + index +'_stock').prop('disabled', false);
                }
            });

            var sale_limit = \$('#form_product_classes_0_sale_limit').val();
            \$('input[id\$=_sale_limit]').val(sale_limit);

            var price01 = \$('#form_product_classes_0_price01').val();
            \$('input[id\$=_price01]').val(price01);

            var price02 = \$('#form_product_classes_0_price02').val();
            \$('input[id\$=_price02]').val(price02);

            var delivery_fee = \$('#form_product_classes_0_delivery_fee').val();
            \$('input[id\$=_delivery_fee]').val(delivery_fee);

            var delivery_date = \$('#form_product_classes_0_delivery_date').val();
            \$('select[id\$=_delivery_date]').val(delivery_date);

            var tax_rate = \$('#form_product_classes_0_tax_rate').val();
            \$('input[id\$=_tax_rate]').val(tax_rate);

            var product_type = \$('#form_product_classes_0_product_type_1').prop('checked');
            if (product_type) {
                \$('input[id\$=_product_type_1]').prop('checked', true);
            } else {
                \$('input[id\$=_product_type_2]').prop('checked', true);
            }

        });


        \$('#delete').click(function() {
            if (confirm('一度削除したデータは、元に戻せません。\\n削除しても宜しいですか？')) {
                \$('#mode').val('delete');
                \$('#product-class-form').submit();
                return true;
            }
            return false;
        });


    });
</script>
";
    }

    // line 224
    public function block_main($context, array $blocks = array())
    {
        // line 225
        echo "<div id=\"edit_info_wrap\" class=\"row\">
    <div id=\"edit_info_box\" class=\"col-md-12\">
        <form class=\"form-inline\" method=\"post\" action=\"";
        // line 227
        echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getUrl("admin_product_product_class", array("id" => $this->getAttribute(($context["Product"] ?? null), "id", array()))), "html", null, true);
        echo "\">
            <div id=\"edit_info_box__body\" class=\"box\">
                <div id=\"edit_info_box__header\" class=\"box-header\">
                    商品名 : <h3 class=\"box-title\">";
        // line 230
        echo twig_escape_filter($this->env, $this->getAttribute(($context["Product"] ?? null), "name", array()), "html", null, true);
        echo "</h3>
                </div><!-- /.box-header -->
                <div id=\"edit_info_box__body\" class=\"box-body\" style=\"padding-bottom: 30px;\">
                    ";
        // line 233
        if (($context["not_product_class"] ?? null)) {
            // line 234
            echo "                        ";
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "_token", array()), 'widget');
            echo "
                        <button type=\"submit\" class=\"btn btn-primary pull-right\">商品規格の設定</button>
                        <div id=\"edit_info_box__class_name\" class=\"form-horizontal\">
                            ";
            // line 237
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "class_name1", array()), 'widget');
            echo "
                            ";
            // line 238
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "class_name1", array()), 'errors');
            echo "
                            ";
            // line 239
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "class_name2", array()), 'widget');
            echo "
                            ";
            // line 240
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "class_name2", array()), 'errors');
            echo "

                        </div>
                        <div class=\"extra-form form-inline row\">
                            ";
            // line 244
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["form"] ?? null), "getIterator", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["f"]) {
                // line 245
                echo "                                ";
                if (preg_match("[^plg*]", $this->getAttribute($this->getAttribute($context["f"], "vars", array()), "name", array()))) {
                    // line 246
                    echo "                                    <div class=\"col-sm-12 form-group\">
                                    ";
                    // line 247
                    echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($context["f"], 'label');
                    echo "
                                    ";
                    // line 248
                    echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($context["f"], 'widget');
                    echo "
                                    ";
                    // line 249
                    echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($context["f"], 'errors');
                    echo "
                                    </div>
                                ";
                }
                // line 252
                echo "                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['f'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 253
            echo "                        </div>
                    ";
        } else {
            // line 255
            echo "                        <button type=\"button\" id=\"delete\" class=\"btn btn-default pull-right\" name=\"mode\" value=\"delete\">商品規格を初期化</button>
                        <div id=\"edit_info_box__class_name\">
                          規格1 : <strong>";
            // line 257
            echo twig_escape_filter($this->env, ($context["class_name1"] ?? null), "html", null, true);
            echo "</strong>
                          ";
            // line 258
            if ( !(null === ($context["class_name2"] ?? null))) {
                // line 259
                echo "                          <br>規格2 : <strong>";
                echo twig_escape_filter($this->env, ($context["class_name2"] ?? null), "html", null, true);
                echo "</strong>
                          ";
            }
            // line 261
            echo "                        </div>
                    ";
        }
        // line 263
        echo "                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </form>

    </div><!-- /.col -->
</div>


";
        // line 271
        if ( !(null === ($context["classForm"] ?? null))) {
            // line 272
            echo "<form id=\"product-class-form\" class=\"form-inline\" method=\"post\" action=\"";
            echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getUrl("admin_product_product_class_edit", array("id" => $this->getAttribute(($context["Product"] ?? null), "id", array()))), "html", null, true);
            echo "\">
";
            // line 273
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["classForm"] ?? null), "_token", array()), 'widget');
            echo "
<div id=\"result_wrap\" class=\"row\">
    <div id=\"result_box\" class=\"col-md-12\">
        <div id=\"result_box__body\" class=\"box\">
            ";
            // line 277
            if (((twig_length_filter($this->env, $this->getAttribute(($context["classForm"] ?? null), "product_classes", array())) > 0) && ($context["has_class_category_flg"] ?? null))) {
                // line 278
                echo "            <div id=\"result_box__header\" class=\"box-header\">
                <button type=\"button\" id=\"copy\" class=\"btn btn-default pull-right btn-xs\">1行目のデータをコピーする</button>
                <h3 class=\"box-title\">検索結果 <span class=\"normal\"><strong>";
                // line 280
                echo twig_escape_filter($this->env, twig_length_filter($this->env, $this->getAttribute(($context["classForm"] ?? null), "product_classes", array())), "html", null, true);
                echo " 件</strong> が該当しました</span></h3>
                ";
                // line 281
                if ( !(null === ($context["error"] ?? null))) {
                    // line 282
                    echo "                    <div id=\"result_box__error\" class=\"text-danger\">";
                    echo twig_escape_filter($this->env, $this->getAttribute(($context["error"] ?? null), "message", array()), "html", null, true);
                    echo "</div>
                ";
                }
                // line 284
                echo "            </div><!-- /.box-header -->
            <div id=\"result_box__body_inner\" class=\"box-body no-padding\">
                <div id=\"result_box__list_box\" class=\"table_list\">
                    <div id=\"result_box__list\" class=\"table-responsive with-border table-menu table-responsive-overflow\">
                        <table class=\"table table-striped\">
                            <thead>
                                
                                    <th id=\"result_box__header_add\" class=\"text-center\">登録<input id=\"add-all\" type=\"checkbox\" value=\"0\"></th>
                                    <th id=\"result_box__header_class_category1\">規格1</th>
                                    <th id=\"result_box__header_class_category2\">規格2</th>
                                    <th id=\"result_box__header_code\">商品コード</th>
                                    <th id=\"result_box__header_stock\">在庫数</th>
                                    <th id=\"result_box__header_sale_limit\">販売制限数</th>
                                    <th id=\"result_box__header_price01\">通常価格(円)</th>
                                    <th id=\"result_box__header_price02\">販売価格(円)</th>
                                    ";
                // line 299
                if ($this->getAttribute(($context["BaseInfo"] ?? null), "option_product_delivery_fee", array())) {
                    // line 300
                    echo "                                    <th id=\"result_box__header_delivery_fee\">送料</th>
                                    ";
                }
                // line 302
                echo "                                    <th id=\"result_box__header_delivery_date\">お届け可能日</th>
                                    ";
                // line 303
                if ($this->getAttribute(($context["BaseInfo"] ?? null), "option_product_tax_rule", array())) {
                    // line 304
                    echo "                                    <th id=\"result_box__header_tax_rate\">販売税率</th>
                                    ";
                }
                // line 306
                echo "                                    <th id=\"result_box__header_product_type\">商品種別</th>
                                <th id=\"result_box__header_file_name\">画像</th>
                            </thead>
                            <tbody>
                            ";
                // line 310
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["classForm"] ?? null), "product_classes", array()));
                foreach ($context['_seq'] as $context["_key"] => $context["product_class_form"]) {
                    // line 311
                    echo "                            <tr  ";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["product_class_form"], "vars", array()), "name", array()), "html", null, true);
                    echo "\">
                                <td id=\"result_box__add--";
                    // line 312
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["product_class_form"], "vars", array()), "name", array()), "html", null, true);
                    echo "\" class=\"text-center\">
                                    ";
                    // line 313
                    echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($context["product_class_form"], "add", array()), 'widget');
                    echo "
                                </td>
                                <td id=\"result_box__class_category1--";
                    // line 315
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["product_class_form"], "vars", array()), "name", array()), "html", null, true);
                    echo "\">
                                    ";
                    // line 316
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["product_class_form"], "vars", array()), "value", array()), "ClassCategory1", array()), "html", null, true);
                    echo "
                                    ";
                    // line 317
                    echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($context["product_class_form"], "ClassCategory1", array()), 'widget');
                    echo "
                                </td>
                                <td id=\"result_box__class_category2--";
                    // line 319
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["product_class_form"], "vars", array()), "name", array()), "html", null, true);
                    echo "\">
                                    ";
                    // line 320
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["product_class_form"], "vars", array()), "value", array()), "ClassCategory2", array()), "html", null, true);
                    echo "
                                    ";
                    // line 321
                    echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($context["product_class_form"], "ClassCategory2", array()), 'widget');
                    echo "
                                </td>
                                <td id=\"result_box__code--";
                    // line 323
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["product_class_form"], "vars", array()), "name", array()), "html", null, true);
                    echo "\">
                                    ";
                    // line 324
                    echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($context["product_class_form"], "code", array()), 'widget');
                    echo "
                                    ";
                    // line 325
                    echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($context["product_class_form"], "code", array()), 'errors');
                    echo "
                                </td>
                                <td id=\"result_box__stock--";
                    // line 327
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["product_class_form"], "vars", array()), "name", array()), "html", null, true);
                    echo "\">
                                    ";
                    // line 328
                    if ($this->getAttribute($this->getAttribute($this->getAttribute($context["product_class_form"], "vars", array()), "value", array()), "stock_unlimited", array())) {
                        // line 329
                        echo "                                    ";
                        // line 330
                        echo "                                    ";
                    }
                    // line 331
                    echo "                                    ";
                    echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($context["product_class_form"], "stock", array()), 'widget');
                    echo "
                                    ";
                    // line 332
                    echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($context["product_class_form"], "stock", array()), 'errors');
                    echo "
                                    ";
                    // line 333
                    echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($context["product_class_form"], "stock_unlimited", array()), 'widget');
                    echo "
                                    ";
                    // line 334
                    echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($context["product_class_form"], "stock_unlimited", array()), 'errors');
                    echo "
                                </td>
                                <td id=\"result_box__sale_limit--";
                    // line 336
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["product_class_form"], "vars", array()), "name", array()), "html", null, true);
                    echo "\">
                                    ";
                    // line 337
                    echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($context["product_class_form"], "sale_limit", array()), 'widget');
                    echo "
                                    ";
                    // line 338
                    echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($context["product_class_form"], "sale_limit", array()), 'errors');
                    echo "
                                </td>
                                <td id=\"result_box__price01--";
                    // line 340
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["product_class_form"], "vars", array()), "name", array()), "html", null, true);
                    echo "\" class=\"price_cell\">
                                    ";
                    // line 341
                    echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($context["product_class_form"], "price01", array()), 'widget', array("attr" => array("class" => "notmoney")));
                    echo "
                                    ";
                    // line 342
                    echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($context["product_class_form"], "price01", array()), 'errors');
                    echo "
                                </td>
                                <td id=\"result_box__price02--";
                    // line 344
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["product_class_form"], "vars", array()), "name", array()), "html", null, true);
                    echo "\" class=\"price_cell\">
                                    ";
                    // line 345
                    echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($context["product_class_form"], "price02", array()), 'widget', array("attr" => array("class" => "notmoney")));
                    echo "
                                    ";
                    // line 346
                    echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($context["product_class_form"], "price02", array()), 'errors');
                    echo "
                                </td>
                                ";
                    // line 348
                    if ($this->getAttribute(($context["BaseInfo"] ?? null), "option_product_delivery_fee", array())) {
                        // line 349
                        echo "                                <td id=\"result_box__delivery_fee--";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["product_class_form"], "vars", array()), "name", array()), "html", null, true);
                        echo "\">
                                    ";
                        // line 350
                        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($context["product_class_form"], "delivery_fee", array()), 'widget', array("attr" => array("class" => "notmoney")));
                        echo "
                                    ";
                        // line 351
                        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($context["product_class_form"], "delivery_fee", array()), 'errors');
                        echo "
                                </td>
                                ";
                    }
                    // line 354
                    echo "                                <td id=\"result_box__delivery_date--";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["product_class_form"], "vars", array()), "name", array()), "html", null, true);
                    echo "\">
                                    ";
                    // line 355
                    echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($context["product_class_form"], "delivery_date", array()), 'widget');
                    echo "
                                    ";
                    // line 356
                    echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($context["product_class_form"], "delivery_date", array()), 'errors');
                    echo "
                                </td>
                                ";
                    // line 358
                    if ($this->getAttribute(($context["BaseInfo"] ?? null), "option_product_tax_rule", array())) {
                        // line 359
                        echo "                                <td id=\"result_box__tax_rate--";
                        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["product_class_form"], "vars", array()), "name", array()), "html", null, true);
                        echo "\">
                                    ";
                        // line 360
                        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($context["product_class_form"], "tax_rate", array()), 'widget');
                        echo "
                                    ";
                        // line 361
                        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($context["product_class_form"], "tax_rate", array()), 'errors');
                        echo "
                                </td>
                                ";
                    }
                    // line 364
                    echo "                                <td id=\"result_box__product_type--";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["product_class_form"], "vars", array()), "name", array()), "html", null, true);
                    echo "\">
                                    ";
                    // line 365
                    echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($context["product_class_form"], "product_type", array()), 'widget');
                    echo "
                                    ";
                    // line 366
                    echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($context["product_class_form"], "product_type", array()), 'errors');
                    echo "
                                </td>
                            <td id=\"result_box__plg_file_name--";
                    // line 368
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["product_class_form"], "vars", array()), "name", array()), "html", null, true);
                    echo "\">
    ";
                    // line 369
                    if ( !$this->getAttribute($this->getAttribute($this->getAttribute($context["product_class_form"], "file_delete_flag", array()), "vars", array()), "data", array())) {
                        // line 370
                        echo "        ";
                        if ($this->getAttribute($this->getAttribute($this->getAttribute($context["product_class_form"], "file_name", array()), "vars", array()), "value", array())) {
                            // line 371
                            echo "            <div class=\"ui-state-default\" id=\"class_image_box_";
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["product_class_form"], "vars", array()), "name", array()), "html", null, true);
                            echo "\">
                <img src=\"";
                            // line 372
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["product_class_form"], "vars", array()), "value", array()), "product_class_image", array()), "getImageUrl", array(0 => $this->getAttribute($this->getAttribute($this->getAttribute($context["product_class_form"], "file_name", array()), "vars", array()), "value", array()), 1 => true), "method"), "html", null, true);
                            echo "\"/>
                <a class=\"delete-image\" data-index=\"";
                            // line 373
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["product_class_form"], "vars", array()), "name", array()), "html", null, true);
                            echo "\">
                    <svg class=\"cb cb-close\">
                        <use xmlns:xlink=\"http://www.w3.org/1999/xlink\" xlink:href=\"#cb-close\"></use>
                    </svg>
                </a>
            </div>
        ";
                        } elseif (($this->getAttribute($this->getAttribute($this->getAttribute(                        // line 379
$context["product_class_form"], "vars", array()), "value", array()), "product_class_image", array()) && $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["product_class_form"], "vars", array()), "value", array()), "product_class_image", array()), "file_name", array()))) {
                            // line 380
                            echo "            <div class=\"ui-state-default\" id=\"class_image_box_";
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["product_class_form"], "vars", array()), "name", array()), "html", null, true);
                            echo "\">
                <img src=\"";
                            // line 381
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute($context["product_class_form"], "vars", array()), "value", array()), "product_class_image", array()), "getImageUrl", array()), "html", null, true);
                            echo "\"/>
                <a class=\"delete-image\" data-index=\"";
                            // line 382
                            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["product_class_form"], "vars", array()), "name", array()), "html", null, true);
                            echo "\">
                    <svg class=\"cb cb-close\">
                        <use xmlns:xlink=\"http://www.w3.org/1999/xlink\" xlink:href=\"#cb-close\"></use>
                    </svg>
                </a>
            </div>
        ";
                        }
                        // line 389
                        echo "    ";
                    }
                    // line 390
                    echo "
    <div>
    <span class=\"btn btn-success fileinput-button\">
        <i class=\"glyphicon glyphicon-plus\"></i>
        <span>画像を選択</span>
        <!-- The file input field used as target for the file upload widget -->
        <input data-id=\"";
                    // line 396
                    echo twig_escape_filter($this->env, $this->getAttribute(($context["Product"] ?? null), "id", array()), "html", null, true);
                    echo "\" data-index=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["product_class_form"], "vars", array()), "name", array()), "html", null, true);
                    echo "\" class=\"file-upload\"
               type=\"file\" name=\"image_file\">
    </span>
    </div>
    <div id=\"progress";
                    // line 400
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["product_class_form"], "vars", array()), "name", array()), "html", null, true);
                    echo "\" class=\"progress\" style=\"display: none;\">
        <div class=\"progress-bar progress-bar-success\"></div>
    </div>

    ";
                    // line 405
                    echo "    ";
                    echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($context["product_class_form"], "file_name", array()), 'widget', array("id" => ("file_name_" . $this->getAttribute($this->getAttribute($context["product_class_form"], "vars", array()), "name", array()))));
                    echo "

    ";
                    // line 407
                    echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($context["product_class_form"], "file_delete_flag", array()), 'widget', array("id" => ("file_delete_flag_" . $this->getAttribute($this->getAttribute($context["product_class_form"], "vars", array()), "name", array())), "attr" => array("style" => "display:none")));
                    echo "

</td>

                            ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['product_class_form'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 412
                echo "                            </tbody>
                        </table>
                    </div>
                </div>
            </div><!-- /.box-body -->
            ";
            } else {
                // line 418
                echo "            <div id=\"result_box__error_message\" class=\"box-header\">
                <h3 class=\"box-title\">検索条件に該当するデータがありませんでした。</h3>
            </div><!-- /.box-header -->
            ";
            }
            // line 422
            echo "        </div><!-- /.box -->
    </div><!-- /.col -->
</div>

";
            // line 426
            if (((twig_length_filter($this->env, $this->getAttribute(($context["classForm"] ?? null), "product_classes", array())) > 0) && ($context["has_class_category_flg"] ?? null))) {
                // line 427
                echo "<div id=\"edit_box__footer\" class=\"row\">
    <div id=\"edit_box__button_menu\" class=\"col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 text-center btn_area\">
";
                // line 429
                if (($context["not_product_class"] ?? null)) {
                    // line 430
                    echo "        <button type=\"submit\" class=\"btn btn-primary btn-lg btn-block\" name=\"mode\" value=\"edit\">登録</button>
";
                } else {
                    // line 432
                    echo "        <input id=\"mode\" type=\"hidden\" name=\"mode\">
        <button type=\"submit\" class=\"btn btn-primary btn-lg btn-block\" name=\"mode\" value=\"update\">更新</button>
";
                }
                // line 435
                echo "        <p><a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getUrl("admin_product_product_edit", array("id" => $this->getAttribute(($context["Product"] ?? null), "id", array()))), "html", null, true);
                echo "\">商品登録に戻る</a></p>
    </div>
</div>
</form>
";
            }
            // line 440
            echo "
";
        }
        // line 442
        echo "


";
    }

    // line 447
    public function block_stylesheet($context, array $blocks = array())
    {
        // line 448
        echo "<link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "admin_urlpath", array()), "html", null, true);
        echo "/assets/css/fileupload/jquery.fileupload.css\">
<link rel=\"stylesheet\" href=\"";
        // line 449
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "admin_urlpath", array()), "html", null, true);
        echo "/assets/css/fileupload/jquery.fileupload-ui.css\">
<link rel=\"stylesheet\" href=\"https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css\">
<style>
    .ui-state-default {
        margin-bottom: 20px;
        position: relative;
        background: #fff;
        display: inline-block;
    }
    .ui-state-default img {
        width: 160px;
    }
    .progress {
        margin-top: 20px;
    }
    .delete-image {
        display: block;
        font-size: 20px;
        width: 40px;
        height: 40px;
        line-height: 40px;
        position: absolute;
        right: -13px;
        top: -13px;
        border: 1px solid #C4CCCE;
        background: rgba(248, 248, 248, 0.9);
        color: #666666;
        text-align: center;
        vertical-align: middle;
        border-radius: 100%;
        box-shadow: 1px 1px 3px rgba(0, 0, 0, 0.3);
    }
</style>
";
    }

    public function getTemplateName()
    {
        return "__string_template__c408610fcf2ad45a69d23bebbac97bc972a304a9e117f6d1a8eafedfbf42a04a";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  792 => 449,  787 => 448,  784 => 447,  777 => 442,  773 => 440,  764 => 435,  759 => 432,  755 => 430,  753 => 429,  749 => 427,  747 => 426,  741 => 422,  735 => 418,  727 => 412,  716 => 407,  710 => 405,  703 => 400,  694 => 396,  686 => 390,  683 => 389,  673 => 382,  669 => 381,  664 => 380,  662 => 379,  653 => 373,  649 => 372,  644 => 371,  641 => 370,  639 => 369,  635 => 368,  630 => 366,  626 => 365,  621 => 364,  615 => 361,  611 => 360,  606 => 359,  604 => 358,  599 => 356,  595 => 355,  590 => 354,  584 => 351,  580 => 350,  575 => 349,  573 => 348,  568 => 346,  564 => 345,  560 => 344,  555 => 342,  551 => 341,  547 => 340,  542 => 338,  538 => 337,  534 => 336,  529 => 334,  525 => 333,  521 => 332,  516 => 331,  513 => 330,  511 => 329,  509 => 328,  505 => 327,  500 => 325,  496 => 324,  492 => 323,  487 => 321,  483 => 320,  479 => 319,  474 => 317,  470 => 316,  466 => 315,  461 => 313,  457 => 312,  452 => 311,  448 => 310,  442 => 306,  438 => 304,  436 => 303,  433 => 302,  429 => 300,  427 => 299,  410 => 284,  404 => 282,  402 => 281,  398 => 280,  394 => 278,  392 => 277,  385 => 273,  380 => 272,  378 => 271,  368 => 263,  364 => 261,  358 => 259,  356 => 258,  352 => 257,  348 => 255,  344 => 253,  338 => 252,  332 => 249,  328 => 248,  324 => 247,  321 => 246,  318 => 245,  314 => 244,  307 => 240,  303 => 239,  299 => 238,  295 => 237,  288 => 234,  286 => 233,  280 => 230,  274 => 227,  270 => 225,  267 => 224,  139 => 98,  98 => 60,  74 => 39,  70 => 38,  66 => 37,  62 => 36,  55 => 35,  49 => 27,  43 => 26,  39 => 22,  36 => 32,  33 => 30,  31 => 29,  29 => 24,  11 => 22,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "__string_template__c408610fcf2ad45a69d23bebbac97bc972a304a9e117f6d1a8eafedfbf42a04a", "");
    }
}
