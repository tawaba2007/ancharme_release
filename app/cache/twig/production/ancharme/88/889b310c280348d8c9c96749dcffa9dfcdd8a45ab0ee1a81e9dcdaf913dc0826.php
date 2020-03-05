<?php

/* block.twig */
class __TwigTemplate_ba3c309be979a8279ca60b33ff9cb6d4951544b90c8d655e43cbc7502e8f7e67 extends Twig_Template
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
        // line 22
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["Blocks"] ?? null));
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
        foreach ($context['_seq'] as $context["_key"] => $context["Block"]) {
            // line 23
            echo "    <!-- ▼";
            echo twig_escape_filter($this->env, $this->getAttribute($context["Block"], "name", array()), "html", null, true);
            echo " -->
    ";
            // line 24
            if ($this->getAttribute($context["Block"], "logic_flg", array())) {
                // line 25
                echo "        ";
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\HttpKernelExtension')->renderFragment($this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getPath(("block_" . $this->getAttribute($context["Block"], "file_name", array()))));
                echo "
    ";
            } else {
                // line 27
                echo "        ";
                echo twig_include($this->env, $context, (("Block/" . $this->getAttribute($context["Block"], "file_name", array())) . ".twig"), array(), true, true);
                echo "
    ";
            }
            // line 29
            echo "    <!-- ▲";
            echo twig_escape_filter($this->env, $this->getAttribute($context["Block"], "name", array()), "html", null, true);
            echo " -->
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
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['Block'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    public function getTemplateName()
    {
        return "block.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  55 => 29,  49 => 27,  43 => 25,  41 => 24,  36 => 23,  19 => 22,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "block.twig", "/home/ancharme/ancharme.jp/public_html/app/template/ancharme/block.twig");
    }
}
