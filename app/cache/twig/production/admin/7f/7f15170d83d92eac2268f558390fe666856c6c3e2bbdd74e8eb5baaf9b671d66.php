<?php

/* __string_template__b4a1eeeeb708a6fd3f338ed75010f6ebdd86b379797fc46bfe7e2d31193c3545 */
class __TwigTemplate_98a1cacf3a605f0bde892f4906a7bf8ec1f8ffde6b181fad7b067a0071ff2937 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 9
        $this->parent = $this->loadTemplate("default_frame.twig", "__string_template__b4a1eeeeb708a6fd3f338ed75010f6ebdd86b379797fc46bfe7e2d31193c3545", 9);
        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'sub_title' => array($this, 'block_sub_title'),
            'main' => array($this, 'block_main'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "default_frame.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 11
        $context["menus"] = array(0 => "content", 1 => "mail");
        // line 9
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 13
    public function block_title($context, array $blocks = array())
    {
        echo "コンテンツ管理";
    }

    // line 14
    public function block_sub_title($context, array $blocks = array())
    {
        echo "メール管理";
    }

    // line 16
    public function block_main($context, array $blocks = array())
    {
        // line 17
        echo "    <div class=\"container-fluid\">
        <div class=\"row\">
            <div class=\"col-md-12\">
                <div class=\"box\">
                    <div class=\"box-header\">
                        <div class=\"box-title\">
                            メールファイル一覧
                        </div>
                    </div>
                    <div class=\"box-body no-padding no-border\">
                        <div class=\"sortable_list\">
                            <div class=\"tableish\">
                                ";
        // line 29
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["files"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["file"]) {
            // line 30
            echo "                                    <div class=\"item_box tr\">
                                        <div class=\"item_pattern td\">
                                            <a href=\"";
            // line 32
            echo twig_escape_filter($this->env, $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getUrl("plugin_MailTemplateEditor_mail_edit", array("name" => $context["file"])), "html", null, true);
            echo "\">";
            echo twig_escape_filter($this->env, $context["file"], "html", null, true);
            echo "</a>
                                        </div>
                                    </div><!-- /.item_box -->
                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['file'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 36
        echo "                            </div>
                        </div>
                    </div><!-- /.box-body -->
                </div><!-- /.box -->
            </div><!-- /.col -->
        </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "__string_template__b4a1eeeeb708a6fd3f338ed75010f6ebdd86b379797fc46bfe7e2d31193c3545";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  82 => 36,  70 => 32,  66 => 30,  62 => 29,  48 => 17,  45 => 16,  39 => 14,  33 => 13,  29 => 9,  27 => 11,  11 => 9,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "__string_template__b4a1eeeeb708a6fd3f338ed75010f6ebdd86b379797fc46bfe7e2d31193c3545", "");
    }
}
