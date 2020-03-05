<?php

/* __string_template__63ac43e721394df46b95ea302db0a718a6bf1aac7936928de4d173d7badf5501 */
class __TwigTemplate_492ea4ef1024f269c085996b7844c5f87417b35b9785d999f4b503042d29b4f6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 22
        $this->parent = $this->loadTemplate("default_frame.twig", "__string_template__63ac43e721394df46b95ea302db0a718a6bf1aac7936928de4d173d7badf5501", 22);
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
        echo "<script>
    \$(function () {
        \$('#detail_image_box__slides').on('click', '.slick-dots li', function () {
            var \$img = \$(this).find('.selectable-class-image');
            if (\$('#classcategory_id1').length > 0) {
                \$('#classcategory_id1').val(\"__unselected\");
                \$('#classcategory_id1').change();
            }
            if (\$img.length > 0) {
                var class1 = \$img.data('class_category1');
                if (class1) {
                    \$('#classcategory_id1').val(class1);
                    \$('#classcategory_id1').change();
                }
                var class2 = \$img.data('class_category2');
                if (class2) {
                    setTimeout(function () {
                        \$('#classcategory_id2').val(class2);
                    }, 100);
                }
            }
        });
        if (\$('#classcategory_id1').length > 0 && \$('#classcategory_id2').length > 0) {
            \$('#classcategory_id2').change(function () {
                var \$this = \$(this);
                if (\$this.val()) {
                    if (\$('#apg_product_class_image-' + \$('#classcategory_id1').val() + '-' + \$this.val()).length > 0) {
                        \$index = \$('.slick-dots li').length - \$('.slick-dots .selectable-class-image').length + \$('#apg_product_class_image-' + \$('#classcategory_id1').val() + '-' + \$this.val()).data('class_index') - 1;
                        \$('.slides').slick('slickGoTo', \$index);
                    }
                }
            });
        } else if (\$('#classcategory_id1').length > 0) {
            \$('#classcategory_id1').change(function () {
                var \$this = \$(this);
                if (\$this.val() != \"__unselected\") {
                    if (\$('#apg_product_class_image-' + \$this.val() + '-').length > 0) {
                        \$index = \$('.slick-dots li').length - \$('.slick-dots .selectable-class-image').length + \$('#apg_product_class_image-' + \$this.val() + '-').data('class_index') - 1;
                        \$('.slides').slick('slickGoTo', \$index);
                    }
                }
            });
        } else if (\$('#classcategory_id2').length > 0) {
            \$('#classcategory_id2').change(function () {
                var \$this = \$(this);
                if (\$this.val()) {
                    if (\$('#apg_product_class_image--' + \$this.val()).length > 0) {
                        \$index = \$('.slick-dots li').length - \$('.slick-dots .selectable-class-image').length + \$('#apg_product_class_image--' + \$this.val()).data('class_index') - 1;
                        \$('.slides').slick('slickGoTo', \$index);
                    }
                }
            });
        }
    });
</script>

";
        // line 82
        $this->displayParentBlock("javascript", $context, $blocks);
        echo "
<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
document,'script','https://connect.facebook.net/en_US/fbevents.js');

fbq('init', '515063142397766', {}, {agent:'execcube-3.0.17-1.0.1'});
fbq('track', 'PageView', {\"agent\":\"execcube-3.0.17-1.0.1\",\"content_ids\":260,\"content_type\":\"product\",\"value\":4200,\"currency\":\"JPY\"});
fbq('track', 'ViewContent', {\"agent\":\"execcube-3.0.17-1.0.1\",\"content_ids\":260,\"content_type\":\"product\",\"value\":4200,\"currency\":\"JPY\"});
</script>
<!-- End Facebook Pixel Code -->
<script>
    eccube.classCategories = ";
        // line 97
        echo twig_jsonencode_filter($this->getAttribute(($context["Product"] ?? null), "class_categories", array()));
        echo ";

    // 規格2に選択肢を割り当てる。
    function fnSetClassCategories(form, classcat_id2_selected) {
        var \$form = \$(form);
        var product_id = \$form.find('input[name=product_id]').val();
        var \$sele1 = \$form.find('select[name=classcategory_id1]');
        var \$sele2 = \$form.find('select[name=classcategory_id2]');
        eccube.setClassCategories(\$form, product_id, \$sele1, \$sele2, classcat_id2_selected);
    }

    ";
        // line 108
        if ($this->getAttribute(($context["form"] ?? null), "classcategory_id2", array(), "any", true, true)) {
            // line 109
            echo "    fnSetClassCategories(
            document.form1, ";
            // line 110
            echo twig_jsonencode_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "classcategory_id2", array()), "vars", array()), "value", array()));
            echo "
    );
    ";
        }
        // line 113
        echo "</script>

<script>
\$(function(){
    \$('.carousel').slick({
        infinite: false,
        speed: 300,
        prevArrow:'<button type=\"button\" class=\"slick-prev\"><span class=\"angle-circle\"><svg class=\"cb cb-angle-right\"><use xlink:href=\"#cb-angle-right\" /></svg></span></button>',
        nextArrow:'<button type=\"button\" class=\"slick-next\"><span class=\"angle-circle\"><svg class=\"cb cb-angle-right\"><use xlink:href=\"#cb-angle-right\" /></svg></span></button>',
        slidesToShow: 4,
        slidesToScroll: 4,
        responsive: [
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3
                }
            }
        ]
    });

    \$('.slides').slick({
        dots: true,
        arrows: true,
        speed: 300,
        prevArrow:'<div class=\"slick-arrow left\"><svg class=\"cb cb-angle-right\"><use xlink:href=\"#cb-angle-right\" /></svg></div>',
        nextArrow:'<div class=\"slick-arrow right\"><svg class=\"cb cb-angle-right\"><use xlink:href=\"#cb-angle-right\" /></svg></div>',
        customPaging: function(slider, i) {
            return '<button class=\"thumbnail\">' + \$(slider.\$slides[i]).find('img').prop('outerHTML') + '</button>';
        }
    });

    \$('#favorite').click(function() {
        \$('#mode').val('add_favorite');
    });

    \$('#add-cart').click(function() {
        \$('#mode').val('add_cart');
    });

    // bfcache無効化
    \$(window).bind('pageshow', function(event) {
        if (event.originalEvent.persisted) {
            location.reload(true);
        }
    });
});
</script>

";
    }

    // line 165
    public function block_main($context, array $blocks = array())
    {
        // line 166
        echo "    ";
        // line 179
        echo "
    <!-- ▼item_detail▼ -->
    <div id=\"item_detail\">
        <div id=\"detail_wrap\" class=\"row\">
            <!--★画像★-->
            <div id=\"item_photo_area\" class=\"col-sm-6\">
                <div id=\"detail_image_box__slides\" class=\"slides\">
                    ";
        // line 186
        if ((twig_length_filter($this->env, $this->getAttribute(($context["Product"] ?? null), "ProductImage", array())) > 0)) {
            // line 187
            echo "                        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["Product"] ?? null), "ProductImage", array()));
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
            foreach ($context['_seq'] as $context["_key"] => $context["ProductImage"]) {
                // line 188
                echo "                        <div id=\"detail_image_box__item--";
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
                echo "\"><img src=\"";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "image_save_urlpath", array()), "html", null, true);
                echo "/";
                echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getNoImageProduct($context["ProductImage"]), "html", null, true);
                echo "\"/></div>
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ProductImage'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 190
            echo "                    ";
        } else {
            // line 191
            echo "                        <div id=\"detail_image_box__item\"><img src=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "image_save_urlpath", array()), "html", null, true);
            echo "/";
            echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getNoImageProduct(""), "html", null, true);
            echo "\"/></div>
                    ";
        }
        // line 192
        if ( !twig_test_empty(($context["ProductClassImages"] ?? null))) {
            // line 193
            echo "    ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["ProductClassImages"] ?? null));
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
            foreach ($context['_seq'] as $context["_key"] => $context["ProductClassImage"]) {
                // line 194
                echo "        <div id=\"detail_class_image_box__item--";
                echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
                echo "\">
            ";
                // line 195
                if (($this->getAttribute($this->getAttribute($context["ProductClassImage"], "ProductClass", array()), "ClassCategory1", array()) && $this->getAttribute($this->getAttribute($context["ProductClassImage"], "ProductClass", array()), "ClassCategory2", array()))) {
                    // line 196
                    echo "                <img id=\"apg_product_class_image-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["ProductClassImage"], "ProductClass", array()), "ClassCategory1", array()), "id", array()), "html", null, true);
                    echo "-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["ProductClassImage"], "ProductClass", array()), "ClassCategory2", array()), "id", array()), "html", null, true);
                    echo "\" class=\"apg_product_class_images selectable-class-image\" src=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["ProductClassImage"], "getImageUrl", array(), "method"), "html", null, true);
                    echo "\" data-class_index=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
                    echo "\"  data-class_category1=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["ProductClassImage"], "ProductClass", array()), "ClassCategory1", array()), "id", array()), "html", null, true);
                    echo "\" data-class_category2=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["ProductClassImage"], "ProductClass", array()), "ClassCategory2", array()), "id", array()), "html", null, true);
                    echo "\" >
            ";
                } elseif ($this->getAttribute($this->getAttribute(                // line 197
$context["ProductClassImage"], "ProductClass", array()), "ClassCategory1", array())) {
                    // line 198
                    echo "                <img id=\"apg_product_class_image-";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["ProductClassImage"], "ProductClass", array()), "ClassCategory1", array()), "id", array()), "html", null, true);
                    echo "-\" class=\"apg_product_class_images selectable-class-image\" src=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["ProductClassImage"], "getImageUrl", array(), "method"), "html", null, true);
                    echo "\" data-class_index=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
                    echo "\" data-class_category1=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["ProductClassImage"], "ProductClass", array()), "ClassCategory1", array()), "id", array()), "html", null, true);
                    echo "\">
            ";
                } elseif ($this->getAttribute($this->getAttribute(                // line 199
$context["ProductClassImage"], "ProductClass", array()), "ClassCategory2", array())) {
                    // line 200
                    echo "                <img id=\"apg_product_class_image--";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["ProductClassImage"], "ProductClass", array()), "ClassCategory2", array()), "id", array()), "html", null, true);
                    echo "\" class=\"apg_product_class_images selectable-class-image\" src=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["ProductClassImage"], "getImageUrl", array(), "method"), "html", null, true);
                    echo "\" data-class_index=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["loop"], "index", array()), "html", null, true);
                    echo "\" data-class_category2=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($this->getAttribute($context["ProductClassImage"], "ProductClass", array()), "ClassCategory2", array()), "id", array()), "html", null, true);
                    echo "\">
            ";
                }
                // line 202
                echo "        </div>
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ProductClassImage'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
        // line 205
        echo "
                </div>
            </div>

            <section id=\"item_detail_area\" class=\"col-sm-6\">
                      <div id=\"detail_image_box__item--";
        // line 210
        echo twig_escape_filter($this->env, $this->getAttribute(($context["loop"] ?? null), "index", array()), "html", null, true);
        echo "\">
                    <a href=\"https://ancharme.jp/help/guide\" class=\"link\">
<img src=\"";
        // line 212
        echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["app"] ?? null), "config", array()), "front_urlpath", array()), "html", null, true);
        echo "/img/banner/derivery_banner.png\">
</a>
                     </div>


                <!--★商品名★-->
                <h3 id=\"detail_description_box__name\" class=\"item_name\">";
        // line 218
        echo twig_escape_filter($this->env, $this->getAttribute(($context["Product"] ?? null), "name", array()), "html", null, true);
        echo "</h3>
                <div id=\"detail_description_box__body\" class=\"item_detail\">

                    ";
        // line 221
        if ( !twig_test_empty($this->getAttribute(($context["Product"] ?? null), "ProductTag", array()))) {
            // line 222
            echo "                        <!--▼商品タグ-->
                        <div id=\"product_tag_box\" class=\"product_tag\">
                            ";
            // line 224
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["Product"] ?? null), "ProductTag", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["ProductTag"]) {
                // line 225
                echo "                                <span id=\"product_tag_box__product_tag--";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["ProductTag"], "Tag", array()), "id", array()), "html", null, true);
                echo "\" class=\"product_tag_list\">";
                echo twig_escape_filter($this->env, $this->getAttribute($context["ProductTag"], "Tag", array()), "html", null, true);
                echo "</span>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['ProductTag'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 227
            echo "                        </div>
<!--                        <hr> -->
                        <!--▲商品タグ-->
                    ";
        }
        // line 231
        echo "
                    <!--★通常価格★-->
                    ";
        // line 233
        if ($this->getAttribute(($context["Product"] ?? null), "hasProductClass", array())) {
            // line 234
            if (( !(null === $this->getAttribute(($context["Product"] ?? null), "getPrice01Min", array())) && ($this->getAttribute(($context["Product"] ?? null), "getPrice01Min", array()) == $this->getAttribute(($context["Product"] ?? null), "getPrice01Max", array())))) {
                // line 235
                echo "                        <p id=\"detail_description_box__class_normal_price\" class=\"normal_price\"> 通常価格：<span class=\"price01_default\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getPriceFilter($this->getAttribute(($context["Product"] ?? null), "getPrice01Min", array())), "html", null, true);
                echo "</span> <span class=\"small\">税込</span></p>
                        ";
            } elseif (( !(null === $this->getAttribute(            // line 236
($context["Product"] ?? null), "getPrice01Min", array())) &&  !(null === $this->getAttribute(($context["Product"] ?? null), "getPrice01Max", array())))) {
                // line 237
                echo "                        <p id=\"detail_description_box__class_normal_range_price\" class=\"normal_price\"> 通常価格：<span class=\"price01_default\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getPriceFilter($this->getAttribute(($context["Product"] ?? null), "getPrice01Min", array())), "html", null, true);
                echo " ～ ";
                echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getPriceFilter($this->getAttribute(($context["Product"] ?? null), "getPrice01Max", array())), "html", null, true);
                echo "</span> <span class=\"small\">税込</span></p>
                        ";
            }
            // line 239
            echo "                    ";
        } else {
            // line 240
            if ( !(null === $this->getAttribute(($context["Product"] ?? null), "getPrice01Max", array()))) {
                // line 241
                echo "                        <p id=\"detail_description_box__normal_price\" class=\"normal_price\"> 通常価格：<span class=\"price01_default\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getPriceFilter($this->getAttribute(($context["Product"] ?? null), "getPrice01Min", array())), "html", null, true);
                echo "</span> <span class=\"small\">税込</span></p>
                        ";
            }
            // line 243
            echo "                    ";
        }
        // line 245
        echo "<!--★販売価格★-->
                    ";
        // line 246
        if ($this->getAttribute(($context["Product"] ?? null), "hasProductClass", array())) {
            // line 247
            if (($this->getAttribute(($context["Product"] ?? null), "getPrice02Min", array()) == $this->getAttribute(($context["Product"] ?? null), "getPrice02Max", array()))) {
                // line 248
                echo "                        <p id=\"detail_description_box__class_sale_price\" class=\"sale_price text-primary\"> <span class=\"price02_default\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getPriceFilter($this->getAttribute(($context["Product"] ?? null), "getPrice02Min", array())), "html", null, true);
                echo "</span> <span class=\"small\">税込</span></p>
                        ";
            } else {
                // line 250
                echo "                        <p id=\"detail_description_box__class_range_sale_price\" class=\"sale_price text-primary\"> <span class=\"price02_default\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getPriceFilter($this->getAttribute(($context["Product"] ?? null), "getPrice02Min", array())), "html", null, true);
                echo " ～ ";
                echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getPriceFilter($this->getAttribute(($context["Product"] ?? null), "getPrice02Max", array())), "html", null, true);
                echo "</span> <span class=\"small\">税込</span></p>
                        ";
            }
            // line 252
            echo "                    ";
        } else {
            // line 253
            echo "<p id=\"detail_description_box__sale_price\" class=\"sale_price text-primary\"> <span class=\"price02_default\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getPriceFilter($this->getAttribute(($context["Product"] ?? null), "getPrice02Min", array())), "html", null, true);
            echo "</span> <span class=\"small\">税込</span></p>
                    ";
        }
        // line 256
        echo "<!--カテゴリー欄-->

                    <form action=\"?\" method=\"post\" id=\"form1\" name=\"form1\">
                        <!--▼買い物かご-->
                        <div id=\"detail_cart_box\" class=\"cart_area\">
                            ";
        // line 261
        if ($this->getAttribute(($context["Product"] ?? null), "stock_find", array())) {
            // line 262
            echo "
                                ";
            // line 264
            echo "                                ";
            if ($this->getAttribute(($context["form"] ?? null), "classcategory_id1", array(), "any", true, true)) {
                // line 265
                echo "                                <ul id=\"detail_cart_box__cart_class_category_id\" class=\"classcategory_list\">
                                    ";
                // line 267
                echo "                                    <li>

                                        ";
                // line 269
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "classcategory_id1", array()), 'widget');
                echo "
                                        ";
                // line 270
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "classcategory_id1", array()), 'errors');
                echo "
                                    </li>
                                    ";
                // line 273
                echo "                                    ";
                if ($this->getAttribute(($context["form"] ?? null), "classcategory_id2", array(), "any", true, true)) {
                    // line 274
                    echo "                                        <li>
                                            ";
                    // line 275
                    echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "classcategory_id2", array()), 'widget');
                    echo "
                                            ";
                    // line 276
                    echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "classcategory_id2", array()), 'errors');
                    echo "
                                        </li>
                                     ";
                }
                // line 279
                echo "                                </ul>
                                ";
            }
            // line 281
            echo "
                                ";
            // line 283
            echo "                                <dl id=\"detail_cart_box__cart_quantity\" class=\"quantity\">
                                    <dt>数量</dt>
                                    <dd>
                                        ";
            // line 286
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "quantity", array()), 'widget');
            echo "
                                        ";
            // line 287
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), "quantity", array()), 'errors');
            echo "
                                    </dd>
                                </dl>

                                <div class=\"extra-form\">
                                    ";
            // line 292
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["form"] ?? null), "getIterator", array()));
            foreach ($context['_seq'] as $context["_key"] => $context["f"]) {
                // line 293
                echo "                                        ";
                if (preg_match("[^plg*]", $this->getAttribute($this->getAttribute($context["f"], "vars", array()), "name", array()))) {
                    // line 294
                    echo "                                            ";
                    echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($context["f"], 'row');
                    echo "
                                        ";
                }
                // line 296
                echo "                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['f'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 297
            echo "                                </div>

                                ";
            // line 300
            echo "                                <div id=\"detail_cart_box__button_area\" class=\"btn_area\">
                                    <ul id=\"detail_cart_box__insert_button\" class=\"row\">
                                        <li class=\"col-xs-12 col-sm-8\"><button type=\"submit\" id=\"add-cart\" class=\"btn btn-primary btn-block prevention-btn prevention-mask\">カートに入れる</button></li>
                                    </ul>
                                    ";
            // line 304
            if (($this->getAttribute(($context["BaseInfo"] ?? null), "option_favorite_product", array()) == 1)) {
                // line 305
                echo "                                    <ul id=\"detail_cart_box__favorite_button\" class=\"row\">
                                        ";
                // line 306
                if ((($context["is_favorite"] ?? null) == false)) {
                    // line 307
                    echo "                                            <li class=\"col-xs-12 col-sm-8\"><button type=\"submit\" id=\"favorite\" class=\"btn btn-info btn-block prevention-btn prevention-mask\">お気に入りに追加</button></li>
                                        ";
                } else {
                    // line 309
                    echo "                                            <li class=\"col-xs-12 col-sm-8\"><button type=\"submit\" id=\"favorite\" class=\"btn btn-info btn-block\" disabled=\"disabled\">お気に入りに追加済みです</button></li>
                                        ";
                }
                // line 311
                echo "                                    </ul>
                                    ";
            }
            // line 313
            echo "                                </div>
                            ";
        } else {
            // line 315
            echo "                                ";
            // line 316
            echo "                                <div id=\"detail_cart_box__button_area\" class=\"btn_area\">
                                    <ul class=\"row\">
                                        <li class=\"col-xs-12 col-sm-8\"><button type=\"button\" class=\"btn btn-default btn-block\" disabled=\"disabled\">ただいま品切れ中です</button></li>
                                    </ul>
                                </div>
                            ";
        }
        // line 322
        echo "                        </div>
                        <!--▲買い物かご-->
                        ";
        // line 324
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock(($context["form"] ?? null), 'rest');
        echo "
                    </form>

                    <!--★商品説明★-->
                    <p id=\"detail_not_stock_box__description_detail\" class=\"item_comment\">";
        // line 328
        echo nl2br($this->getAttribute(($context["Product"] ?? null), "description_detail", array()));
        echo "

<h3>モデル身長について</h3>
<p>モデル身長：154cm、155cm</p>

<h3>採寸について</h3>
<p>・商品の計測はcm単位です。<br>
・衣類は全て平台に平置きし外寸を測定しています。<br>
・同商品でも、生産の過程で1～2cmの個体差が生じる場合があります。<br>
・付属品の計測はおこなっていません。</p>

<h3>採寸箇所について</h3>
<p>・サイズ調整ができる商品は、最小値を記載します。
・形状により、サイズガイドに記載のない箇所の計測を行う場合がございます。<br>
※ an Charme独自の方法により採寸しております。</p>


                </div>
                <!-- /.item_detail -->

            </section>
            <!--詳細ここまで-->
        </div>

        ";
        // line 353
        echo "        ";
        if ($this->getAttribute(($context["Product"] ?? null), "freearea", array())) {
            // line 354
            echo "        <div id=\"sub_area\" class=\"row\">
            <div class=\"col-sm-10 col-sm-offset-1\">
                <div id=\"detail_free_box__freearea\" class=\"freearea\">";
            // line 356
            echo twig_include($this->env, $context, twig_template_from_string($this->env, $this->getAttribute(($context["Product"] ?? null), "freearea", array())));
            echo "</div>
            </div>
        </div>
        ";
        }
        // line 360
        echo "    </div>
    <!-- ▲item_detail▲ -->
";
    }

    public function getTemplateName()
    {
        return "__string_template__63ac43e721394df46b95ea302db0a718a6bf1aac7936928de4d173d7badf5501";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  646 => 360,  639 => 356,  635 => 354,  632 => 353,  605 => 328,  598 => 324,  594 => 322,  586 => 316,  584 => 315,  580 => 313,  576 => 311,  572 => 309,  568 => 307,  566 => 306,  563 => 305,  561 => 304,  555 => 300,  551 => 297,  545 => 296,  539 => 294,  536 => 293,  532 => 292,  524 => 287,  520 => 286,  515 => 283,  512 => 281,  508 => 279,  502 => 276,  498 => 275,  495 => 274,  492 => 273,  487 => 270,  483 => 269,  479 => 267,  476 => 265,  473 => 264,  470 => 262,  468 => 261,  461 => 256,  455 => 253,  452 => 252,  444 => 250,  438 => 248,  436 => 247,  434 => 246,  431 => 245,  428 => 243,  422 => 241,  420 => 240,  417 => 239,  409 => 237,  407 => 236,  402 => 235,  400 => 234,  398 => 233,  394 => 231,  388 => 227,  377 => 225,  373 => 224,  369 => 222,  367 => 221,  361 => 218,  352 => 212,  347 => 210,  340 => 205,  324 => 202,  312 => 200,  310 => 199,  299 => 198,  297 => 197,  282 => 196,  280 => 195,  275 => 194,  257 => 193,  255 => 192,  247 => 191,  244 => 190,  223 => 188,  205 => 187,  203 => 186,  194 => 179,  192 => 166,  189 => 165,  135 => 113,  129 => 110,  126 => 109,  124 => 108,  110 => 97,  92 => 82,  32 => 26,  28 => 22,  26 => 24,  11 => 22,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "__string_template__63ac43e721394df46b95ea302db0a718a6bf1aac7936928de4d173d7badf5501", "");
    }
}
