<?php

/* PlgExpandProductColumns/Resource/template/Admin/expand_column.twig */
class __TwigTemplate_1f0397e34c13280149967a6d1a104b4909344423a856b15b216d8df10ea6e021 extends Twig_Template
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
        // line 10
        echo "
</div>
<div class=\"box accordion form-horizontal\">
    <div class=\"box-header toggle\">
        ";
        // line 15
        echo "        <h3 class=\"box-title\">拡張項目<svg class=\"cb cb-angle-down icon_down\"> <use xlink:href=\"#cb-angle-down\" /></svg></h3>
    </div>
    <div class=\"box-body accpanel\">
        ";
        // line 18
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable($this->getAttribute(($context["form"] ?? null), "admin_plg_expand_product_columns_value", array()));
        foreach ($context['_seq'] as $context["value_index"] => $context["columns"]) {
            // line 19
            echo "            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable($context["columns"]);
            foreach ($context['_seq'] as $context["key"] => $context["column"]) {
                // line 20
                echo "                ";
                if (($this->getAttribute($this->getAttribute($context["column"], "vars", array(), "any", false, true), "type", array(), "any", true, true) && ($this->getAttribute($this->getAttribute($context["column"], "vars", array()), "type", array()) == "file"))) {
                    // line 21
                    echo "                    <div id=\"detail_box__image_";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["column"], "vars", array()), "id", array()), "html", null, true);
                    echo "\" class=\"form-group\">
                        <label class=\"col-sm-2 control-label\" for=\"admin_product_product_image\">
                            ";
                    // line 23
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["column"], "vars", array()), "label", array()), "html", null, true);
                    echo "<br>
                            <span class=\"small\">620px以上推奨</span>
                        </label>
                        <div id=\"detail_files_box_";
                    // line 26
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["column"], "vars", array()), "id", array()), "html", null, true);
                    echo "\" class=\"col-sm-9 col-lg-10\">
                            <div class=\"photo_files\" id=\"drag-drop-area_";
                    // line 27
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["column"], "vars", array()), "id", array()), "html", null, true);
                    echo "\">
                                <svg id=\"icon_no_image_";
                    // line 28
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["column"], "vars", array()), "id", array()), "html", null, true);
                    echo "\" class=\"cb cb-photo no-image\" style=\"fill: #d0d0d0;font-size: 60px;\"> <use xmlns:xlink=\"http://www.w3.org/1999/xlink\" xlink:href=\"#cb-photo\"></use></svg>
                                <ul id=\"thumb_";
                    // line 29
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["column"], "vars", array()), "id", array()), "html", null, true);
                    echo "\" class=\"clearfix ex_thumb\" data-key=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["column"], "vars", array()), "id", array()), "html", null, true);
                    echo "\" data-value-index=\"";
                    echo twig_escape_filter($this->env, $context["value_index"], "html", null, true);
                    echo "\" data-value-key=\"";
                    echo twig_escape_filter($this->env, $context["key"], "html", null, true);
                    echo "\"></ul>
                            </div>
                        </div>
                    </div>
                    <div class=\"form-group marB30\">
                        <div id=\"detail_box__file_upload_";
                    // line 34
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["column"], "vars", array()), "id", array()), "html", null, true);
                    echo "\" class=\"col-sm-offset-2 col-sm-9 col-lg-10 \">

                            <div id=\"progress_";
                    // line 36
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["column"], "vars", array()), "id", array()), "html", null, true);
                    echo "\" class=\"progress progress-striped active\" style=\"display:none;\">
                                <div class=\"progress-bar progress-bar-info\"></div>
                            </div>

                            ";
                    // line 40
                    echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($context["column"], 'widget', array("attr" => array("accept" => "image/*", "style" => "display:none;", "class" => "ex_file_upload")));
                    echo "
                            <a id=\"file_upload_";
                    // line 41
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["column"], "vars", array()), "id", array()), "html", null, true);
                    echo "\" class=\"with-icon\">
                                <svg class=\"cb cb-plus\"> <use xlink:href=\"#cb-plus\" /></svg>ファイルをアップロード
                            </a>

                        </div>
                    </div>

                ";
                } elseif ((((($this->getAttribute($this->getAttribute(                // line 48
$context["column"], "vars", array(), "any", false, true), "multiple", array(), "any", true, true) && ($this->getAttribute($this->getAttribute($context["column"], "vars", array()), "multiple", array()) == true)) && $this->getAttribute($this->getAttribute($context["column"], "vars", array(), "any", false, true), "expanded", array(), "any", true, true)) && ($this->getAttribute($this->getAttribute($context["column"], "vars", array()), "expanded", array()) == true)) && $this->getAttribute($this->getAttribute($context["column"], "vars", array(), "any", false, true), "choices", array(), "any", true, true))) {
                    // line 49
                    echo "                    <input type=\"hidden\" name=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute($context["column"], "vars", array()), "full_name", array()), "html", null, true);
                    echo "[]\">
                    ";
                    // line 50
                    echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($context["column"], 'row');
                    echo "
                    ";
                    // line 51
                    echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($context["column"], 'errors');
                    echo "
                ";
                } else {
                    // line 53
                    echo "                    ";
                    echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($context["column"], 'row');
                    echo "
                    ";
                    // line 54
                    echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($context["column"], 'errors');
                    echo "
                ";
                }
                // line 56
                echo "            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['column'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 57
            echo "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['value_index'], $context['columns'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 58
        echo "    </div>
";
    }

    public function getTemplateName()
    {
        return "PlgExpandProductColumns/Resource/template/Admin/expand_column.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  144 => 58,  138 => 57,  132 => 56,  127 => 54,  122 => 53,  117 => 51,  113 => 50,  108 => 49,  106 => 48,  96 => 41,  92 => 40,  85 => 36,  80 => 34,  66 => 29,  62 => 28,  58 => 27,  54 => 26,  48 => 23,  42 => 21,  39 => 20,  34 => 19,  30 => 18,  25 => 15,  19 => 10,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "PlgExpandProductColumns/Resource/template/Admin/expand_column.twig", "/home/ancharme/ancharme.jp/public_html/app/Plugin/PlgExpandProductColumns/Resource/template/Admin/expand_column.twig");
    }
}
