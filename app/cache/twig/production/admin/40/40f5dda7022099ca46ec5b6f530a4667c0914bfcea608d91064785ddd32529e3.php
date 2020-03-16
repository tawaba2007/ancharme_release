<?php

/* __string_template__35a4cf738f6ad0c7face39bf4415d3c0a4abd5ca0a857e55d7d06cd7902ce6b7 */
class __TwigTemplate_5465e7628e98c40c845f9f92395d4dfb0cbd4384ff0efd9a2fa3f8a440a1cf81 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 17
        $this->parent = $this->loadTemplate("default_frame.twig", "__string_template__35a4cf738f6ad0c7face39bf4415d3c0a4abd5ca0a857e55d7d06cd7902ce6b7", 17);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'sub_title' => array($this, 'block_sub_title'),
            'stylesheet' => array($this, 'block_stylesheet'),
            'javascript' => array($this, 'block_javascript'),
            'main' => array($this, 'block_main'),
            'modal' => array($this, 'block_modal'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "default_frame.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 19
        $context["menus"] = array(0 => "product", 1 => "product_edit");
        // line 24
        $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->setTheme(($context["form"] ?? null), array(0 => "Form/bootstrap_3_horizontal_layout.html.twig"));
        // line 854
        $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->setTheme(($context["searchForm"] ?? null), array(0 => "Form/bootstrap_3_horizontal_layout.html.twig"));
        // line 17
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 21
    public function block_title($context, array $blocks = array())
    {
        echo "商品管理";
    }

    // line 22
    public function block_sub_title($context, array $blocks = array())
    {
        echo "商品登録";
    }

    // line 26
    public function block_stylesheet($context, array $blocks = array())
    {
        // line 27
        echo "<link rel=\"stylesheet\" href=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "admin_urlpath", array()), "html", null, true);
        echo "/assets/css/fileupload/jquery.fileupload.css\">
<link rel=\"stylesheet\" href=\"";
        // line 28
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

    // line 39
    public function block_javascript($context, array $blocks = array())
    {
        // line 40
        echo "<script src=\"";
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "admin_urlpath", array()), "html", null, true);
        echo "/assets/js/vendor/fileupload/vendor/jquery.ui.widget.js\"></script>
<script src=\"";
        // line 41
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "admin_urlpath", array()), "html", null, true);
        echo "/assets/js/vendor/fileupload/jquery.iframe-transport.js\"></script>
<script src=\"";
        // line 42
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "admin_urlpath", array()), "html", null, true);
        echo "/assets/js/vendor/fileupload/jquery.fileupload.js\"></script>
<script src=\"";
        // line 43
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "admin_urlpath", array()), "html", null, true);
        echo "/assets/js/vendor/fileupload/jquery.fileupload-process.js\"></script>
<script src=\"";
        // line 44
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "admin_urlpath", array()), "html", null, true);
        echo "/assets/js/vendor/fileupload/jquery.fileupload-validate.js\"></script>
<script src=\"https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js\"></script>
<script>
\$(function() {
    \$(\"#thumb\").sortable({
        cursor: 'move',
        opacity: 0.7,
        placeholder: 'ui-state-highlight',
        update: function (event, ui) {
            updateRank();
        }
    });
    ";
        // line 56
        if ((($context["has_class"] ?? null) == false)) {
            // line 57
            echo "    if (\$(\"#";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "class", array()), "stock_unlimited", array()), "vars", array()), "id", array()), "html", null, true);
            echo "\").prop(\"checked\")) {
        \$(\"#";
            // line 58
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "class", array()), "stock", array()), "vars", array()), "id", array()), "html", null, true);
            echo "\").attr(\"disabled\", \"disabled\").val('');
    } else {
        \$(\"#";
            // line 60
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "class", array()), "stock", array()), "vars", array()), "id", array()), "html", null, true);
            echo "\").removeAttr(\"disabled\");
    }
    \$(\"#";
            // line 62
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "class", array()), "stock_unlimited", array()), "vars", array()), "id", array()), "html", null, true);
            echo "\").on(\"click change\", function () {
        if (\$(this).prop(\"checked\")) {
            \$(\"#";
            // line 64
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "class", array()), "stock", array()), "vars", array()), "id", array()), "html", null, true);
            echo "\").attr(\"disabled\", \"disabled\").val('');
        } else {
            \$(\"#";
            // line 66
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "class", array()), "stock", array()), "vars", array()), "id", array()), "html", null, true);
            echo "\").removeAttr(\"disabled\");
        }
    });
    ";
        }
        // line 70
        echo "    var proto_img = ''
            + '<li class=\"ui-state-default\">'
            + '<img src=\"__path__\" />'
            + '<a class=\"delete-image\">'
            + '<svg class=\"cb cb-close\">'
            + '<use xmlns:xlink=\"http://www.w3.org/1999/xlink\" xlink:href=\"#cb-close\"></use>'
            + '</svg>'
            + '</a>'
            + '</li>';
    var proto_add = '";
        // line 79
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "add_images", array()), "vars", array()), "prototype", array()), 'widget');
        echo "';
    var proto_del = '";
        // line 80
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "delete_images", array()), "vars", array()), "prototype", array()), 'widget');
        echo "';
    ";
        // line 81
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["form"] ?? null), "images", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["image"]) {
            // line 82
            echo "    var \$img = \$(proto_img.replace(/__path__/g, '";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "image_save_urlpath", array()), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["image"], "vars", array()), "value", array()), "html", null, true);
            echo "'));
    var \$widget = \$('";
            // line 83
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($context["image"], 'widget');
            echo "');
    \$widget.val('";
            // line 84
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["image"], "vars", array()), "value", array()), "html", null, true);
            echo "');
    \$(\"#thumb\").append(\$img.append(\$widget));
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['image'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 87
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["form"] ?? null), "add_images", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["add_image"]) {
            // line 88
            echo "    var \$img = \$(proto_img.replace(/__path__/g, '";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "image_temp_urlpath", array()), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["add_image"], "vars", array()), "value", array()), "html", null, true);
            echo "'));
    var \$widget = \$('";
            // line 89
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($context["add_image"], 'widget');
            echo "');
    \$widget.val('";
            // line 90
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["add_image"], "vars", array()), "value", array()), "html", null, true);
            echo "');
    \$(\"#thumb\").append(\$img.append(\$widget));
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['add_image'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 93
        echo "    ";
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["form"] ?? null), "delete_images", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["delete_image"]) {
            // line 94
            echo "    \$(\"#thumb\").append('";
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($context["delete_image"], 'widget');
            echo "');
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['delete_image'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 96
        echo "    var hideSvg = function () {
        if (\$(\"#thumb li\").length > 0) {
            \$(\"#icon_no_image\").css(\"display\", \"none\");
        } else {
            \$(\"#icon_no_image\").css(\"display\", \"\");
        }
    };
    var updateRank = function () {
        \$(\"#thumb li\").each(function (index) {
            \$(this).find(\".rank_images\").remove();
            filename = \$(this).find(\"input[type='hidden']\").val();
            \$rank = \$('<input type=\"hidden\" class=\"rank_images\" name=\"rank_images[]\" />');
            \$rank.val(filename + '//' + parseInt(index + 1));
            \$(this).append(\$rank);
        });
    }
    hideSvg();
    updateRank();
    // 画像削除時
    var count_del = 0;
    \$(\"#thumb\").on(\"click\", \".delete-image\", function () {
        var \$new_delete_image = \$(proto_del.replace(/__name__/g, count_del));
        var src = \$(this).prev().attr('src')
                .replace('";
        // line 119
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "image_temp_urlpath", array()), "html", null, true);
        echo "/', '')
                .replace('";
        // line 120
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "image_save_urlpath", array()), "html", null, true);
        echo "/', '');
        \$new_delete_image.val(src);
        \$(\"#thumb\").append(\$new_delete_image);
        \$(this).parent(\"li\").remove();
        hideSvg();
        updateRank();
        count_del++;
    });
    var count_add = ";
        // line 128
        echo twig_escape_filter($this->env, _twig_default_filter(twig_length_filter($this->env, $this->getAttribute(($context["form"] ?? null), "add_images", array())), 0), "html", null, true);
        echo ";
    \$('#";
        // line 129
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "product_image", array()), "vars", array()), "id", array()), "html", null, true);
        echo "').fileupload({dropZone: \$(\"#drag-drop-area\"),
        url: \"";
        // line 130
        echo $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getUrl("admin_product_image_add");
        echo "\",
        type: \"post\",
        sequentialUploads: true,
        dataType: 'json',
        done: function (e, data) {
            \$('#progress').hide();
            \$.each(data.result.files, function (index, file) {
                var path = '";
        // line 137
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "image_temp_urlpath", array()), "html", null, true);
        echo "/' + file;
                var \$img = \$(proto_img.replace(/__path__/g, path));
                var \$new_img = \$(proto_add.replace(/__name__/g, count_add));
                \$new_img.val(file);
                \$child = \$img.append(\$new_img);
                \$('#thumb').append(\$child);
                count_add++;
            });
            hideSvg();
            updateRank();
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
        },
        acceptFileTypes: /(\\.|\\/)(gif|jpe?g|png)\$/i,
        maxFileSize: 10000000,
        maxNumberOfFiles: 10,
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
    // 画像アップロード
    \$('#file_upload').on('click', function () {
        \$('#";
        // line 176
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "product_image", array()), "vars", array()), "id", array()), "html", null, true);
        echo "').click();
    });
});

function fnClass(action) {
    document.form1.action = action;
    document.form1.submit();
    return false;
}

</script>
<script>
    ";
        // line 191
        echo "    \$(function() {
        \$ex_thumb = \$(\".ex_thumb\");

        ";
        // line 195
        echo "        var hideSvg = function (\$thumbs) {
            \$.each(\$thumbs, function (i, thumb) {
                var \$thumb = \$(thumb);
                if (\$thumb.find('li').length > 0) {
                    \$(\"#icon_no_image_\" + \$thumb.data('key')).css(\"display\", \"none\");
                } else {
                    \$(\"#icon_no_image_\" + \$thumb.data('key')).css(\"display\", \"\");
                }
            });
        };
        var updateRank = function (\$thumbs) {
            \$.each(\$thumbs, function (i, thumb) {
                var \$thumb = \$(thumb);
                \$thumb.find('li').each(function (index) {
                    \$(this).find(\".rank_images\").remove();
                    filename = \$(this).find(\"input[type='hidden']\").val();
                    var input_name = \$thumb.data('key') + 'rank_images[]';
                    \$rank = \$('<input type=\"hidden\" class=\"rank_images\" name=\"' + input_name + '\" />');
                    \$rank.val(filename + '//' + parseInt(index + 1));
                    \$(this).append(\$rank);
                });
            });
        };

        var createId = function(name, value_index, value_key, num) {
            return name + value_index + '_' + value_key + '_' + num;
        };

        var addInputImage = function(name, value_index, value_key, num, file) {
            return \$('<input type=\"hidden\" id=\"' + createId(name, value_index, value_key, num) + '\" value=\"' + file + '\" name=\"' + name + '[' + value_key + ']['+ num +']\" multiple=\"multiple\" accept=\"image\" style=\"display:none;\" class=\"ex_file_upload\">');
        };

        var deleteInputImage = function(name, value_index, value_key, num) {
            return \$('#' + createId(name, value_index, value_key, num)).remove();
        };

        ";
        // line 232
        echo "        \$.each(\$ex_thumb, function(i, thumb) {
            var \$thumb = \$(thumb);
            \$thumb.sortable({
                cursor: 'move',
                opacity: 0.7,
                placeholder: 'ui-state-highlight',
                update: function (event, ui) {
                    updateRank();
                }
            });
        });

        var proto_img = ''
                + '<li class=\"ui-state-default\">'
                + '<img src=\"__path__\" />'
                + '<a class=\"delete-image\" data-input=\"__id__\">'
                + '<svg class=\"cb cb-close\">'
                + '<use xmlns:xlink=\"http://www.w3.org/1999/xlink\" xlink:href=\"#cb-close\"></use>'
                + '</svg>'
                + '</a>'
                + '</li>';
        var proto_add = '<input type=\"hidden\" id=\"ex_admin_product_add_images___name__\" name=\"ex_admin_product[add_images][__name__]\" required=\"required\" class=\"form-control\" />';
        var proto_del = '<input type=\"hidden\" id=\"ex_admin_product_delete_images___name__\" name=\"ex_admin_product[delete_images][__name__]\" required=\"required\" class=\"form-control\" />';

        var count_add = [];
        var wk_thumb = null;

        /**
         * 保存済みの画像を表示する
         */
        ";
        // line 262
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["ex_images"] ?? null));
        foreach ($context['_seq'] as $context["thumb_key"] => $context["thumb_images"]) {
            // line 263
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["thumb_images"]);
            foreach ($context['_seq'] as $context["_key"] => $context["image"]) {
                // line 264
                echo "                ";
                if ($context["image"]) {
                    // line 265
                    echo "                    wk_thumb = \$('[data-value-key=";
                    echo twig_escape_filter($this->env, $context["thumb_key"], "html", null, true);
                    echo "]');     
                    if (wk_thumb) {
                        var image_value = '";
                    // line 267
                    echo twig_escape_filter($this->env, $this->getAttribute($context["image"], "value", array()), "html", null, true);
                    echo "';
                        var image_list = image_value.split(',');
                        count_add[wk_thumb.data('key')] = image_list.length > 0 ? image_list.length : 0;
                        \$.each(image_list, function(i, image){
                            if (image) {
                                var proto_add_img = proto_img.replace(/__path__/g, '";
                    // line 272
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "image_save_urlpath", array()), "html", null, true);
                    echo "/' + image);
                                var \$img = \$(proto_add_img.replace(/__id__/g, createId('ex_product_images', wk_thumb.data('value-index'),wk_thumb.data('value-key'), i)));
                                wk_thumb.append(\$img);
                            
                                /**
                                 * input要素も一緒に作っておく
                                 */
                                \$('#detail_box__file_upload_' + wk_thumb.data('key')).append(
                                addInputImage('ex_product_images', wk_thumb.data('value-index'),wk_thumb.data('value-key'), i, image)
                                );
                            }
                        });
                    } else {
                        count_add[wk_thumb.data('key')] = 0;
                    }
                ";
                } else {
                    // line 288
                    echo "                    
                ";
                }
                // line 290
                echo "            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['image'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 291
            echo "          
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['thumb_key'], $context['thumb_images'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 293
        echo "
        ";
        // line 304
        echo "

        hideSvg(\$ex_thumb);
        updateRank(\$ex_thumb);

        ";
        // line 310
        echo "        ";
        // line 311
        echo "        var count_del = [];
        \$.each(\$ex_thumb, function(i, thumb){
            var \$thumb = \$(thumb);
            count_del[\$thumb.data('key')] = 0;
            \$thumb.on(\"click\", \".delete-image\", function () {
                var src = \$(this).prev().attr('src')
                        .replace('";
        // line 317
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "image_temp_urlpath", array()), "html", null, true);
        echo "/', '')
                        .replace('";
        // line 318
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "image_save_urlpath", array()), "html", null, true);
        echo "/', '');
                /**
                 * サムネイル削除
                 */
                \$(this).parent('li').remove();
                /**
                 * input削除
                 */
                \$('#' + \$(this).data('input')).remove();
                hideSvg([\$thumb]);
                updateRank([\$thumb]);

                /**
                 * POSTの追加
                 */
                \$('#detail_box__file_upload_' + \$thumb.data('key')).append(
                        addInputImage('ex_product_del_images', \$thumb.data('value-index'),\$thumb.data('value-key'), count_del[\$thumb.data('key')], src)
                );

                count_del[\$thumb.data('key')]++;
            });
        });

        ";
        // line 342
        echo "        \$.each(\$ex_thumb, function(i, thumb){
            var \$thumb = \$(thumb);
            \$('#'+ \$thumb.data('key')).fileupload({
                url: \"";
        // line 345
        echo $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getUrl("admin_product_image_add");
        echo "\",
                type: \"post\",
                dataType: 'json',
                dropZone: \$('#drag-drop-area_' + \$thumb.data('key')),
                done: function (e, data) {
                    \$('#progress_' + \$thumb.data('key')).hide();
                    \$.each(data.result.files, function (index, file) {
                        count_add[\$thumb.data('key')] = count_add[\$thumb.data('key')] ? count_add[\$thumb.data('key')] + 1 : 1;
                        /**
                         * サムネイルの追加
                         */
                        var path = '";
        // line 356
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "image_temp_urlpath", array()), "html", null, true);
        echo "/' + file;
                        var \$img = \$(proto_img.replace(/__path__/g, path));
                        var \$new_img = \$(proto_add.replace(/__name__/g, count_add[\$thumb.data('key')]));
                        \$new_img.val(file);
                        \$child = \$img.append(\$new_img);
                        \$thumb.append(\$child);

                        /**
                         * POSTの追加
                         */
                        \$('#detail_box__file_upload_' + \$thumb.data('key')).append(
                                addInputImage('ex_product_images', \$thumb.data('value-index'),\$thumb.data('value-key'), count_add[\$thumb.data('key')], file)
                        );
                    });
                    hideSvg([\$thumb]);
                    updateRank([\$thumb]);
                },
                fail: function (e, data) {
                    alert('";
        // line 374
        echo "アップロードに失敗しました。";
        echo "');
                },
                always: function (e, data) {
                    \$('#progress_' + \$thumb.data('key')).hide();
                    \$('#progress_' + \$thumb.data('key') + ' .progress-bar').width('0%');
                },
                start: function (e, data) {
                    \$('#progress_' + \$thumb.data('key')).show();
                },
                acceptFileTypes: /(\\.|\\/)(gif|jpe?g|png)\$/i,
                maxFileSize: 10000000,
                maxNumberOfFiles: 10,
                progressall: function (e, data) {
                    var progress = parseInt(data.loaded / data.total * 100, 10);
                    \$('#progress_' + \$thumb.data('key') + ' .progress-bar').css(
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
        });

        ";
        // line 402
        echo "        \$.each(\$ex_thumb, function(i, thumb) {
            var \$thumb = \$(thumb);
            \$('#file_upload_' + \$thumb.data('key')).on('click', function () {
                \$('#' + \$thumb.data('key')).click();
            });
        });

    });
</script>
";
    }

    // line 413
    public function block_main($context, array $blocks = array())
    {
        // line 414
        echo "        <div class=\"row\" id=\"aside_wrap\">
            <form role=\"form\" name=\"form1\" id=\"form1\" method=\"post\" action=\"\" novalidate enctype=\"multipart/form-data\">
            ";
        // line 416
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "_token", array()), 'widget');
        echo "
                <div id=\"detail_wrap\" class=\"col-md-9\">
                    <div id=\"detail_box\" class=\"box form-horizontal\">
                        <div id=\"detail_box__header\" class=\"box-header\">
                            <h3 class=\"box-title\">基本情報</h3>
                        </div><!-- /.box-header -->
                        <div id=\"detail_box__body\" class=\"box-body\">

                            ";
        // line 425
        echo "                            ";
        if ($this->getAttribute(($context["Product"] ?? null), "id", array())) {
            // line 426
            echo "                                <div id=\"detail_box__id\" class=\"form-group\">
                                    <label class=\"col-sm-3 col-lg-2 control-label\">商品ID</label>
                                    <div class=\"col-sm-9 col-lg-10 padT07\">";
            // line 428
            echo twig_escape_filter($this->env, $this->getAttribute(($context["Product"] ?? null), "id", array()), "html", null, true);
            echo "</div>
                                </div>
                            ";
        }
        // line 431
        echo "

                            ";
        // line 433
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "name", array()), 'row');
        echo "
                            ";
        // line 434
        if ((($context["has_class"] ?? null) == false)) {
            // line 435
            echo "                                ";
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "class", array()), "product_type", array()), 'row', array("attr" => array("class" => "form-inline  padT07")));
            echo "
                            ";
        }
        // line 437
        echo "
                            <div id=\"detail_box__image\" class=\"form-group\">
                                <label class=\"col-sm-2 control-label\" for=\"admin_product_product_image\">
                                    ";
        // line 440
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "product_image", array()), "vars", array()), "label", array()), "html", null, true);
        echo "<br>
                                    <span class=\"small\">620px以上推奨</span>
                                </label>
                                <div id=\"detail_files_box\" class=\"col-sm-9 col-lg-10\">
                                    <div class=\"photo_files\" id=\"drag-drop-area\">
                                        <svg id=\"icon_no_image\" class=\"cb cb-photo no-image\"> <use xmlns:xlink=\"http://www.w3.org/1999/xlink\" xlink:href=\"#cb-photo\"></use></svg>
                                        <ul id=\"thumb\" class=\"clearfix\"></ul>
                                    </div>
                                </div>
                            </div>
                            <div class=\"form-group marB30\">
                                <div id=\"detail_box__file_upload\" class=\"col-sm-offset-2 col-sm-9 col-lg-10 \">

                                    <div id=\"progress\" class=\"progress progress-striped active\" style=\"display:none;\">
                                        <div class=\"progress-bar progress-bar-info\"></div>
                                    </div>

                                    ";
        // line 457
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "product_image", array()), 'widget', array("attr" => array("accept" => "image/*", "style" => "display:none;")));
        echo "
                                    ";
        // line 458
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "product_image", array()), 'errors');
        echo "
                                    <a id=\"file_upload\" class=\"with-icon\">
                                        <svg class=\"cb cb-plus\"> <use xlink:href=\"#cb-plus\" /></svg>ファイルをアップロード
                                    </a>

                                </div>
                            </div>

                            <div id=\"detail_description_box\" class=\"form-group\">
                                ";
        // line 467
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "description_detail", array()), 'label');
        echo "
                                <div id=\"detail_description_box__detail\" class=\"col-sm-9 col-lg-10\">
                                    ";
        // line 469
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "description_detail", array()), 'widget');
        echo "
                                    ";
        // line 470
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "description_detail", array()), 'errors');
        echo "
                                    <div id=\"detail_description_box__list\" class=\"accordion marT15 marB20\"><a id=\"detail_description_box__list_toggle\" class=\"toggle with-icon\"><svg class=\"cb cb-plus icon_plus\"> <use xlink:href=\"#cb-plus\" /></svg>一覧コメントを追加</a>
                                        <div class=\"accpanel padT08\">
                                            ";
        // line 473
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "description_list", array()), 'widget');
        echo "
                                            ";
        // line 474
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "description_list", array()), 'errors');
        echo "
                                        </div>
                                    </div>
                                </div>
                            </div>

                            ";
        // line 480
        if ((($context["has_class"] ?? null) == false)) {
            // line 481
            echo "                            <div id=\"detail_box__price\" class=\"form-group\">
                                ";
            // line 482
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "class", array()), "price02", array()), 'label');
            echo "
                                <div id=\"detail_box__price02\" class=\"col-sm-3 col-lg-3\">
                                    ";
            // line 484
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "class", array()), "price02", array()), 'widget');
            echo "
                                    ";
            // line 485
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "class", array()), "price02", array()), 'errors');
            echo "
                                    <div id=\"detail_box__price01\" class=\"accordion marT15 marB20\"><a class=\"toggle with-icon\"><svg class=\"cb cb-plus icon_plus\"> <use xlink:href=\"#cb-plus\" /></svg>通常価格を追加</a>
                                        <div class=\"accpanel padT08\">
                                            ";
            // line 488
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "class", array()), "price01", array()), 'widget');
            echo "
                                            ";
            // line 489
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "class", array()), "price01", array()), 'errors');
            echo "
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id=\"detail_box__stock\" class=\"form-group\">
                                ";
            // line 496
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "class", array()), "stock", array()), 'label');
            echo "
                                <div class=\"col-sm-9 col-lg-10\">
                                    <div class=\"row\">
                                        <div id=\"detail_box__unlimited\" class=\"col-xs-12 form-inline\">
                                            ";
            // line 500
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "class", array()), "stock", array()), 'widget');
            echo "
                                            ";
            // line 501
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "class", array()), "stock", array()), 'errors');
            echo "
                                            ";
            // line 502
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "class", array()), "stock_unlimited", array()), 'widget');
            echo "
                                            ";
            // line 503
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "class", array()), "stock_unlimited", array()), 'errors');
            echo "
                                        </div>
                                    </div>

                                </div>
                            </div>
                            ";
        }
        // line 510
        echo "
                            <div id=\"detail_category_box\" class=\"form-group\">
                                ";
        // line 512
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "Category", array()), 'label');
        echo "
                                <div class=\"col-sm-9 col-lg-10\">
                                    <div class=\"accordion marT05\">
                                        <a id=\"detail_category_box__toggle\" class=\"toggle with-icon\"><svg class=\"cb cb-plus icon_plus\"> <use xlink:href=\"#cb-plus\" /></svg>カテゴリを選択</a>
                                        <div id=\"detail_category_box__list\" class=\"accpanel padT08";
        // line 516
        if (($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "Category", array()), "vars", array()), "valid", array()) == false)) {
            echo " has-error";
        }
        echo "\">
                                            ";
        // line 517
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "Category", array()), 'widget');
        echo "
                                            ";
        // line 518
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "Category", array()), 'errors');
        echo "
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id=\"detail_tag_box\" class=\"form-group\">
                                ";
        // line 525
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "Tag", array()), 'label');
        echo "
                                <div class=\"col-sm-9 col-lg-10\">
                                    <div class=\"accordion marT05\">
                                        <a id=\"detail_tags_box__toggle\" class=\"toggle with-icon\"><svg class=\"cb cb-plus icon_plus\"> <use xlink:href=\"#cb-plus\" /></svg>";
        // line 528
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans("Tag"), "html", null, true);
        echo "を選択</a>
                                        <div id=\"detail_tags_box__list\" class=\"accpanel padT08\">
                                            ";
        // line 530
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "Tag", array()), 'widget');
        echo "
                                            ";
        // line 531
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "Tag", array()), 'errors');
        echo "
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class=\"extra-form\">
                                ";
        // line 538
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["form"] ?? null), "getIterator", array()));
        foreach ($context['_seq'] as $context["_key"] => $context["f"]) {
            // line 539
            echo "                                    ";
            if (preg_match("[^plg*]", $this->getAttribute($this->getAttribute($context["f"], "vars", array()), "name", array()))) {
                // line 540
                echo "                                        ";
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($context["f"], 'row');
                echo "
                                    ";
            }
            // line 542
            echo "                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['f'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 543
        echo "                            </div>

                        </div><!-- /.box-body -->
                    </div><!-- /.box -->

                    <div id=\"sub_detail_box\" class=\"box accordion form-horizontal\">
                        <div  id=\"sub_detail_box__toggle\" class=\"box-header toggle\">
                            <h3 class=\"box-title\">詳細な設定<svg class=\"cb cb-angle-down icon_down\"> <use xlink:href=\"#cb-angle-down\" /></svg></h3>
                        </div><!-- /.box-header -->
                        <div id=\"sub_detail_box__body\" class=\"box-body accpanel\">

                            ";
        // line 554
        if ((($context["has_class"] ?? null) == false)) {
            // line 555
            echo "                                ";
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "class", array()), "code", array()), 'row');
            echo "
                                ";
            // line 556
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "class", array()), "sale_limit", array()), 'row');
            echo "
                            ";
        }
        // line 558
        echo "
                            ";
        // line 559
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "search_word", array()), 'row');
        echo "
                            ";
        // line 560
        if ((($context["has_class"] ?? null) == false)) {
            // line 561
            echo "                                ";
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "class", array()), "delivery_date", array()), 'row');
            echo "
                                ";
            // line 562
            if ($this->getAttribute(($context["BaseInfo"] ?? null), "option_product_delivery_fee", array())) {
                // line 563
                echo "                                <div id=\"sub_detail_box__delivery_fee\" class=\"form-group\">
                                    ";
                // line 564
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "class", array()), "delivery_fee", array()), 'label');
                echo "
                                    <div class=\"col-sm-3 col-lg-3\">
                                        ";
                // line 566
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "class", array()), "delivery_fee", array()), 'widget');
                echo "
                                        ";
                // line 567
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "class", array()), "delivery_fee", array()), 'errors');
                echo "
                                    </div>
                                </div>
                                ";
            }
            // line 571
            echo "                                ";
            if ($this->getAttribute(($context["BaseInfo"] ?? null), "option_product_tax_rule", array())) {
                // line 572
                echo "                                <div id=\"sub_detail_box__tax_rate\" class=\"form-group\">
                                    ";
                // line 573
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "class", array()), "tax_rate", array()), 'label');
                echo "
                                    <div class=\"col-sm-3 col-lg-3\">
                                        ";
                // line 575
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "class", array()), "tax_rate", array()), 'widget');
                echo "
                                        ";
                // line 576
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($this->getAttribute(($context["form"] ?? null), "class", array()), "tax_rate", array()), 'errors');
                echo "
                                    </div>
                                </div>
                                ";
            }
            // line 580
            echo "                            ";
        }
        // line 581
        echo "
                        </div>
                    </div>

                    <div id=\"free_box\" class=\"box accordion\">
                        <div id=\"free_box__body_toggle\" class=\"box-header toggle\">
                            <h3 class=\"box-title\">フリーエリア<svg class=\"cb cb-angle-down icon_down\"> <use xlink:href=\"#cb-angle-down\" /></svg></h3>
                        </div><!-- /.box-header -->
                        <div id=\"free_box__body\" class=\"box-body accpanel\">
                            ";
        // line 590
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "free_area", array()), 'widget', array("id" => "wysiwyg-area"));
        echo "
                            ";
        // line 591
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "free_area", array()), 'errors');
        echo "
                        </div>
                    </div>

                    ";
        // line 604
        echo "
<script>
\$(function() {
    var dataId = null;

    \$(document).on('click', '.delete', function() {
        var data = \$(this).data();
        \$('.related-view' + data.id ).addClass('hidden');
        \$('#admin_product_related_collection_' + data.id + '_ChildProduct').val('');
        \$('#admin_product_related_collection_' + data.id + '_content' ).val('');
        \$('#searchResult').children().remove();
    });

    window.onload = function () {
        \$(\"select.child-product\").each(function () {
            var html = \$(this).clone();
            var productId = \$(this).val();
            var index = \$(this).parent().find('button').attr('data-id');
            var productCode = \$('#product-code' + index).text();
            var parentDiv =  \$('#related-div-' + index);
            if (productId && !productCode) {
                \$.ajax({
                    type: \"POST\",
                    url: \"";
        // line 627
        echo $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getUrl("admin_related_product_get_product");
        echo "\",
                    data: {
                        product_id : productId,
                        index : index
                    },
                    success: function(data){
                        parentDiv.empty().append(data);
                        parentDiv.append(html);
                    },
                    error: function() {
                        alert('get product info failed.');
                    }
                });
            }
        });
    };

    \$(document).on(\"click\", 'a[id^=\"search_\"]', function () {
        dataId = \$(this).attr(\"data-id\");
        \$(\"#relatedDataId\").val(dataId);
        \$(\"#searchResult\").children().remove();
        \$('div.box-footer a').remove();
    });

    \$(\"#searchButton\").on(\"click\", function () {
        var formIdVal = \$(\"#";
        // line 652
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["searchForm"] ?? null), "id", array()), "vars", array()), "id", array()), "html", null, true);
        echo "\").val();
        var formCatIdVal = \$(\"#";
        // line 653
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["searchForm"] ?? null), "category_id", array()), "vars", array()), "id", array()), "html", null, true);
        echo "\").val();
        var data = {
            id: formIdVal,
            category_id: formCatIdVal,
            product_id: ";
        // line 657
        echo twig_escape_filter($this->env, (($this->getAttribute(($context["Product"] ?? null), "id", array())) ? ($this->getAttribute(($context["Product"] ?? null), "id", array())) : (0)), "html", null, true);
        echo "
        };
        \$(\"#searchResult\")
                .children()
                .remove();
        \$.ajax({
            type: \"POST\",
            url: \"";
        // line 664
        echo $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getUrl("admin_related_product_search");
        echo "\",
            data: data,
            success: function(data){
                \$(\"#searchResult\").append(data);
            },
            error: function() {
                alert('product search failed.');
            }
        });
    });
});
</script>

<div class=\"box accordion form-horizontal\">

    <div class=\"box-header toggle\">
        <h3 class=\"box-title\">
            ";
        // line 681
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "related_collection", array()), "vars", array()), "label", array()), "html", null, true);
        echo "
            <svg class=\"cb cb-angle-down icon_down\"> <use xlink:href=\"#cb-angle-down\" /></svg>
        </h3>
    </div><!-- /.box-header -->

    <div class=\"box-body accpanel\">
        ";
        // line 687
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["form"] ?? null), "related_collection", array()));
        $context['loop'] = array(
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        );
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
            // line 688
            echo "            <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\">
                    ";
            // line 690
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["child"], "ChildProduct", array()), "vars", array()), "label", array()), "html", null, true);
            echo "
                </label>
                ";
            // line 692
            $context["ChildProduct"] = $this->getAttribute($this->getAttribute(($context["RelatedProducts"] ?? null), $this->getAttribute($context["loop"], "index0", array()), array(), "array"), "ChildProduct", array());
            // line 693
            echo "                <div class=\"col-sm-9 col-lg-9\" id=\"related-div-";
            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index0", array()), "html", null, true);
            echo "\">
                    ";
            // line 694
            if (($context["ChildProduct"] ?? null)) {
                // line 695
                echo "                        <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getUrl("admin_product_product_edit", array("id" => $this->getAttribute(($context["ChildProduct"] ?? null), "id", array()))), "html", null, true);
                echo "\" id=\"product-image-link";
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index0", array()), "html", null, true);
                echo "\" class=\"flL related-view";
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index0", array()), "html", null, true);
                echo "\" >
                            <img src=\"";
                // line 696
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "image_save_urlpath", array()), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getNoImageProduct($this->getAttribute(($context["ChildProduct"] ?? null), "mainFileName", array())), "html", null, true);
                echo "\" id=\"product-image-img";
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index0", array()), "html", null, true);
                echo "\" style=\"max-width: 100px;margin-right: 10px;\" />
                        </a>
                        <span id=\"product-name";
                // line 698
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index0", array()), "html", null, true);
                echo "\" class=\"related-view";
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index0", array()), "html", null, true);
                echo "\" style=\"margin-right: 10px;\">";
                echo twig_escape_filter($this->env, $this->getAttribute(($context["ChildProduct"] ?? null), "name", array()), "html", null, true);
                echo "</span>
                        <a id=\"search_";
                // line 699
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index0", array()), "html", null, true);
                echo "\" class=\"btn btn-default btn::after-block btn-sm\" data-toggle=\"modal\" data-target=\"#searchProductModal\" data-id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index0", array()), "html", null, true);
                echo "\">
                            商品を選択
                        </a>
                        <button type=\"button\" id=\"product-delete";
                // line 702
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index0", array()), "html", null, true);
                echo "\" class=\"btn btn-default text-right delete related-view";
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index0", array()), "html", null, true);
                echo "\" data-id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index0", array()), "html", null, true);
                echo "\">削除</button>
                        ";
                // line 703
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($context["child"], "ChildProduct", array()), 'widget', array("attr" => array("style" => "display: none", "class" => "child-product")));
                echo "
                        <br>
                        <span class=\"related-view";
                // line 705
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index0", array()), "html", null, true);
                echo "\" id=\"product-code";
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index0", array()), "html", null, true);
                echo "\">
                            ";
                // line 706
                echo twig_escape_filter($this->env, $this->getAttribute(($context["ChildProduct"] ?? null), "code_min", array()), "html", null, true);
                echo "
                            ";
                // line 707
                if (($this->getAttribute(($context["ChildProduct"] ?? null), "code_min", array()) != $this->getAttribute(($context["ChildProduct"] ?? null), "code_max", array()))) {
                    echo " ～ ";
                    echo twig_escape_filter($this->env, $this->getAttribute(($context["ChildProduct"] ?? null), "code_max", array()), "html", null, true);
                    echo "
                            ";
                }
                // line 709
                echo "                        </span>
                    ";
            } else {
                // line 711
                echo "                        <a href=\"\" id=\"product-image-link";
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index0", array()), "html", null, true);
                echo "\" class=\"flL related-view";
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index0", array()), "html", null, true);
                echo " hidden\" >
                            <img src=\"\" id=\"product-image-img";
                // line 712
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index0", array()), "html", null, true);
                echo "\" style=\"max-width: 100px;margin-right: 10px;\" />
                        </a>
                        <span id=\"product-name";
                // line 714
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index0", array()), "html", null, true);
                echo "\" class=\"related-view";
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index0", array()), "html", null, true);
                echo " hidden\" ></span>
                        <a id=\"search_";
                // line 715
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index0", array()), "html", null, true);
                echo "\" class=\"btn btn-default btn::after-block btn-sm\" data-toggle=\"modal\" data-target=\"#searchProductModal\" data-id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index0", array()), "html", null, true);
                echo "\">
                            商品を選択
                        </a>
                        <button  type=\"button\" id=\"product-delete";
                // line 718
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index0", array()), "html", null, true);
                echo "\" class=\"btn btn-default text-right delete related-view";
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index0", array()), "html", null, true);
                echo " hidden\" data-id=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index0", array()), "html", null, true);
                echo "\">削除</button>
                        ";
                // line 719
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($context["child"], "ChildProduct", array()), 'widget', array("attr" => array("style" => "display: none", "class" => "child-product")));
                echo "
                        <br>
                        <span id=\"product-code";
                // line 721
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index0", array()), "html", null, true);
                echo "\" class=\"related-view";
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index0", array()), "html", null, true);
                echo " hidden\"></span>
                    ";
            }
            // line 723
            echo "

                </div>
            </div>
            <div class=\"form-group\">
                <label class=\"col-sm-2 control-label\">
                    ";
            // line 729
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["child"], "content", array()), "vars", array()), "label", array()), "html", null, true);
            echo "
                </label>
                <div class=\"col-sm-9 col-lg-10 related-content";
            // line 731
            echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index0", array()), "html", null, true);
            echo "\">
                    ";
            // line 732
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($context["child"], "content", array()), 'widget', array("attr" => array("class" => "col-sm-9 col-lg-10 form-control")));
            echo "
                    ";
            // line 733
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute($context["child"], "content", array()), 'errors');
            echo "
                </div>
            </div>
        ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 737
        echo "        <input type=\"hidden\" id=\"relatedDataId\" value=\"\">
    </div>
</div>

<div id=\"detail_box__footer\" class=\"row hidden-xs hidden-sm\">
                        <div class=\"col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 text-center btn_area\">
                            <p><a href=\"";
        // line 743
        echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getUrl("admin_product_page", array("page_no" => (($this->getAttribute($this->getAttribute(($context["app"] ?? null), "session", array(), "any", false, true), "get", array(0 => "eccube.admin.product.search.page_no"), "method", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute(($context["app"] ?? null), "session", array(), "any", false, true), "get", array(0 => "eccube.admin.product.search.page_no"), "method"), "1")) : ("1")))), "html", null, true);
        echo "?resume=1\">検索画面に戻る</a></p>
                        </div>
                    </div>

                </div><!-- /.col -->

                <div class=\"col-md-3\" id=\"aside_column\">
                    <div id=\"common_box\" class=\"col_inner\">
                        <div id=\"common_button_box\" class=\"box no-header\">
                            <div id=\"common_button_box__body\" class=\"box-body\">
                                <div id=\"common_button_box__status\" class=\"row\">
                                    <div class=\"col-xs-12\">
                                        <div class=\"form-group\">
                                            ";
        // line 756
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "Status", array()), 'widget');
        echo "
                                            ";
        // line 757
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "Status", array()), 'errors');
        echo "
                                        </div>
                                    </div>
                                </div>
                                <div id=\"common_button_box__insert_button\" class=\"row text-center\">
                                    <div class=\"col-sm-6 col-sm-offset-3 col-md-12 col-md-offset-0\">
                                        <button type=\"submit\" class=\"btn btn-primary btn-block btn-lg prevention-btn prevention-mask\" >商品を登録</button>
                                    </div>
                                </div>
                                <div id=\"common_button_box__class_set_button\" class=\"row text-center with-border\">
                                    <div class=\"col-sm-6 col-sm-offset-3 col-md-12 col-md-offset-0\">
                                        ";
        // line 768
        if ((null === ($context["id"] ?? null))) {
            // line 769
            echo "                                            <button class=\"btn btn-default btn-block btn-sm\" disabled>
                                                規格設定
                                            </button>
                                        ";
        } else {
            // line 773
            echo "                                            <button class=\"btn btn-default btn-block btn-sm\" onclick=\"fnClass('";
            echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getUrl("admin_product_product_class", array("id" => ($context["id"] ?? null))), "html", null, true);
            echo "');return false;\">
                                                規格設定
                                            </button>
                                        ";
        }
        // line 777
        echo "                                    </div>
                                </div>
                                <div id=\"common_button_box__operation_button\" class=\"row text-center with-border\">
                                    <div class=\"col-sm-6 col-sm-offset-3 col-md-12 col-md-offset-0\">
                                        <ul class=\"col-3\">
                                            ";
        // line 782
        if ((null === ($context["id"] ?? null))) {
            // line 783
            echo "                                                <li>
                                                    <button class=\"btn btn-default btn-block btn-sm\" disabled>
                                                        確認
                                                    </button>
                                                </li>
                                                <li>
                                                    <button class=\"btn btn-default btn-block btn-sm\" disabled>
                                                        複製
                                                    </button>
                                                </li>
                                                <li>
                                                    <button class=\"btn btn-default btn-block btn-sm\" disabled>
                                                        削除
                                                    </button>
                                                </li>
                                            ";
        } else {
            // line 799
            echo "                                                <li>
                                                    <a class=\"btn btn-default btn-block btn-sm\" href=\"";
            // line 800
            echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getUrl("admin_product_product_display", array("id" => ($context["id"] ?? null))), "html", null, true);
            echo "\" target=\"_blank\">
                                                        確認
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class=\"btn btn-default btn-block btn-sm\" href=\"";
            // line 805
            echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getUrl("admin_product_product_copy", array("id" => $this->getAttribute(($context["Product"] ?? null), "id", array()))), "html", null, true);
            echo "\"  ";
            echo $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getCsrfTokenForAnchor();
            echo " data-method=\"post\" data-message=\"この商品情報を複製してもよろしいですか？\">
                                                        複製
                                                    </a>
                                                </li>
                                                <li>
                                                     <a class=\"btn btn-default btn-block btn-sm\" href=\"";
            // line 810
            echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getUrl("admin_product_product_delete", array("id" => $this->getAttribute(($context["Product"] ?? null), "id", array()))), "html", null, true);
            echo "\" ";
            echo $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getCsrfTokenForAnchor();
            echo " data-method=\"delete\" data-message=\"この商品情報を削除してもよろしいですか？\">
                                                        削除
                                                    </a>
                                                </li>
                                            ";
        }
        // line 815
        echo "                                        </ul>
                                    </div>
                                </div>
                            </div><!-- /.box-body -->
                        </div><!-- /.box -->

                        <div id=\"common_date_info_box\" class=\"box no-header\">
                            <div id=\"common_date_info_box__body\" class=\"box-body update-area\">
                                <p><svg class=\"cb cb-clock\"> <use xlink:href=\"#cb-clock\" /></svg>登録日：";
        // line 823
        echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getDateFormatFilter($this->getAttribute(($context["Product"] ?? null), "create_date", array())), "html", null, true);
        echo "</p>
                                <p><svg class=\"cb cb-clock\"> <use xlink:href=\"#cb-clock\" /></svg>更新日：";
        // line 824
        echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getDateFormatFilter($this->getAttribute(($context["Product"] ?? null), "update_date", array())), "html", null, true);
        echo "</p>
                            </div>
                        </div><!-- /.box -->

                        <div id=\"common_shop_note_box\" class=\"box\">
                            <div id=\"common_shop_note_box__header\" class=\"box-header\">
                                <h3 class=\"box-title\">ショップ用メモ欄</h3>
                            </div><!-- /.box-header -->
                            <div id=\"common_shop_note_box__body\" class=\"box-body\">
                                ";
        // line 833
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "note", array()), 'widget');
        echo "
                                ";
        // line 834
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "note", array()), 'errors');
        echo "
                            </div>
                        </div>
                    </div>
                </div><!-- /.col -->

            </form>
        </div>

";
    }

    // line 856
    public function block_modal($context, array $blocks = array())
    {
        // line 857
        echo "
<div class=\"modal\" id=\"searchProductModal\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"myModalLabel\" aria-hidden=\"true\">
    <div class=\"modal-dialog\">
        <div class=\"modal-content\">
            <div class=\"modal-header\">
                <button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\"><span class=\"modal-close\" aria-hidden=\"true\">&times;</span></button>
                <h4 class=\"modal-title\" id=\"myModalLabel\">商品検索</h4>
            </div>
            <div class=\"modal-body\">
                <div class=\"form-group\">
                    ";
        // line 867
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["searchForm"] ?? null), "id", array()), 'widget', array("attr" => array("placeholder" => "商品名・ID・コード")));
        echo "
                </div>
                <div class=\"form-group\">
                    ";
        // line 870
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["searchForm"] ?? null), "category_id", array()), 'widget');
        echo "
                </div>
                <div class=\"form-group\">
                    <button type=\"button\" id=\"searchButton\" class=\"btn btn-primary\" >
                        検索
                    </button>
                </div>
                <div class=\"form-group\" id=\"searchResult\">
                </div>
            </div>
        </div>
    </div>
</div>

";
    }

    public function getTemplateName()
    {
        return "__string_template__35a4cf738f6ad0c7face39bf4415d3c0a4abd5ca0a857e55d7d06cd7902ce6b7";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  1443 => 870,  1437 => 867,  1425 => 857,  1422 => 856,  1408 => 834,  1404 => 833,  1392 => 824,  1388 => 823,  1378 => 815,  1368 => 810,  1358 => 805,  1350 => 800,  1347 => 799,  1329 => 783,  1327 => 782,  1320 => 777,  1312 => 773,  1306 => 769,  1304 => 768,  1290 => 757,  1286 => 756,  1270 => 743,  1262 => 737,  1244 => 733,  1240 => 732,  1236 => 731,  1231 => 729,  1223 => 723,  1216 => 721,  1211 => 719,  1203 => 718,  1195 => 715,  1189 => 714,  1184 => 712,  1177 => 711,  1173 => 709,  1166 => 707,  1162 => 706,  1156 => 705,  1151 => 703,  1143 => 702,  1135 => 699,  1127 => 698,  1118 => 696,  1109 => 695,  1107 => 694,  1102 => 693,  1100 => 692,  1095 => 690,  1091 => 688,  1074 => 687,  1065 => 681,  1045 => 664,  1035 => 657,  1028 => 653,  1024 => 652,  996 => 627,  971 => 604,  964 => 591,  960 => 590,  949 => 581,  946 => 580,  939 => 576,  935 => 575,  930 => 573,  927 => 572,  924 => 571,  917 => 567,  913 => 566,  908 => 564,  905 => 563,  903 => 562,  898 => 561,  896 => 560,  892 => 559,  889 => 558,  884 => 556,  879 => 555,  877 => 554,  864 => 543,  858 => 542,  852 => 540,  849 => 539,  845 => 538,  835 => 531,  831 => 530,  826 => 528,  820 => 525,  810 => 518,  806 => 517,  800 => 516,  793 => 512,  789 => 510,  779 => 503,  775 => 502,  771 => 501,  767 => 500,  760 => 496,  750 => 489,  746 => 488,  740 => 485,  736 => 484,  731 => 482,  728 => 481,  726 => 480,  717 => 474,  713 => 473,  707 => 470,  703 => 469,  698 => 467,  686 => 458,  682 => 457,  662 => 440,  657 => 437,  651 => 435,  649 => 434,  645 => 433,  641 => 431,  635 => 428,  631 => 426,  628 => 425,  617 => 416,  613 => 414,  610 => 413,  597 => 402,  567 => 374,  546 => 356,  532 => 345,  527 => 342,  501 => 318,  497 => 317,  489 => 311,  487 => 310,  480 => 304,  477 => 293,  470 => 291,  464 => 290,  460 => 288,  441 => 272,  433 => 267,  427 => 265,  424 => 264,  419 => 263,  415 => 262,  383 => 232,  345 => 195,  340 => 191,  325 => 176,  283 => 137,  273 => 130,  269 => 129,  265 => 128,  254 => 120,  250 => 119,  225 => 96,  216 => 94,  211 => 93,  202 => 90,  198 => 89,  191 => 88,  186 => 87,  177 => 84,  173 => 83,  166 => 82,  162 => 81,  158 => 80,  154 => 79,  143 => 70,  136 => 66,  131 => 64,  126 => 62,  121 => 60,  116 => 58,  111 => 57,  109 => 56,  94 => 44,  90 => 43,  86 => 42,  82 => 41,  77 => 40,  74 => 39,  60 => 28,  55 => 27,  52 => 26,  46 => 22,  40 => 21,  36 => 17,  34 => 854,  32 => 24,  30 => 19,  11 => 17,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "__string_template__35a4cf738f6ad0c7face39bf4415d3c0a4abd5ca0a857e55d7d06cd7902ce6b7", "");
    }
}
