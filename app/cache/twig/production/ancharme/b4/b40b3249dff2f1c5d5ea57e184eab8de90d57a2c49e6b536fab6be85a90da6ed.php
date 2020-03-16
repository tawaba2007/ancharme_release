<?php

/* GmoEpsilon/Twig/shopping/shopping_complete_add.twig */
class __TwigTemplate_5365190c611bfe5b49960ab65b6452fbce3e093319d84560c4f97a066e28647b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'main' => array($this, 'block_main'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('main', $context, $blocks);
    }

    public function block_main($context, array $blocks = array())
    {
        // line 2
        echo "    <!-- ▼その他決済情報を表示する場合は表示 -->
    ";
        // line 3
        if ($this->getAttribute($this->getAttribute(($context["arrOther"] ?? null), "title", array(), "any", false, true), "value", array(), "any", true, true)) {
            echo "<h2 class=\"heading02\">■ ";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["arrOther"] ?? null), "title", array()), "value", array()), "html", null, true);
            echo "情報</h2>";
        }
        // line 4
        echo "
    <p style=\"text-align:left; word-wrap: break-word; white-space: normal;\">
        ";
        // line 6
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["arrOther"] ?? null));
        foreach ($context['_seq'] as $context["key"] => $context["item"]) {
            // line 7
            echo "            ";
            if (($context["key"] != "title")) {
                // line 8
                echo "                ";
                if ( !twig_test_empty($this->getAttribute($context["item"], "name", array()))) {
                    echo nl2br(twig_escape_filter($this->env, $this->getAttribute($context["item"], "name", array()), "html", null, true));
                    echo ":";
                }
                // line 9
                echo "                ";
                if (($context["key"] == "payment_url")) {
                    // line 10
                    echo "                    <a href='#' onClick=\"window.open('";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "value", array()), "html", null, true);
                    echo "'); \" >";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["item"], "value", array()), "html", null, true);
                    echo "</a>
                ";
                } else {
                    // line 12
                    echo "                    ";
                    echo nl2br(twig_escape_filter($this->env, $this->getAttribute($context["item"], "value", array()), "html", null, true));
                    echo "
                ";
                }
                // line 14
                echo "                <br/>
            ";
            }
            // line 16
            echo "        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 17
        echo "    </p>
";
    }

    public function getTemplateName()
    {
        return "GmoEpsilon/Twig/shopping/shopping_complete_add.twig";
    }

    public function getDebugInfo()
    {
        return array (  79 => 17,  73 => 16,  69 => 14,  63 => 12,  55 => 10,  52 => 9,  46 => 8,  43 => 7,  39 => 6,  35 => 4,  29 => 3,  26 => 2,  20 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "GmoEpsilon/Twig/shopping/shopping_complete_add.twig", "/home/ancharme/ancharme.jp/public_html/app/Plugin/GmoEpsilon/Twig/shopping/shopping_complete_add.twig");
    }
}
