<?php

/* Form/form_layout.twig */
class __TwigTemplate_408bf032103b62c199591bfdac4831ac01694b43c48a6186797799b3aead7b5d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 22
        $this->parent = $this->loadTemplate("bootstrap_3_layout.html.twig", "Form/form_layout.twig", 22);
        $this->blocks = array(
            'form_widget_compound' => array($this, 'block_form_widget_compound'),
            'form_row' => array($this, 'block_form_row'),
            'form_errors' => array($this, 'block_form_errors'),
            'form_widget' => array($this, 'block_form_widget'),
            'form_widget_simple' => array($this, 'block_form_widget_simple'),
            'hidden_row' => array($this, 'block_hidden_row'),
            'textarea_widget' => array($this, 'block_textarea_widget'),
            'choice_widget_collapsed' => array($this, 'block_choice_widget_collapsed'),
            'choice_widget_expanded' => array($this, 'block_choice_widget_expanded'),
            'checkbox_widget' => array($this, 'block_checkbox_widget'),
            'radio_widget' => array($this, 'block_radio_widget'),
            'password_widget' => array($this, 'block_password_widget'),
            'date_widget' => array($this, 'block_date_widget'),
            'name_widget' => array($this, 'block_name_widget'),
            'tel_widget' => array($this, 'block_tel_widget'),
            'fax_widget' => array($this, 'block_fax_widget'),
            'zip_widget' => array($this, 'block_zip_widget'),
            'address_widget' => array($this, 'block_address_widget'),
            'form_label' => array($this, 'block_form_label'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "bootstrap_3_layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 24
    public function block_form_widget_compound($context, array $blocks = array())
    {
        // line 25
        if ($this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", array()), "freeze_display_text", array())) {
            // line 26
            echo "<div class=\"dl_table\" ";
            $this->displayBlock("widget_container_attributes", $context, $blocks);
            echo ">";
            // line 27
            if ((twig_test_empty($this->getAttribute(($context["form"] ?? null), "parent", array())) && (twig_length_filter($this->env, ($context["errors"] ?? null)) > 0))) {
                // line 28
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock(($context["form"] ?? null), 'errors');
            }
            // line 30
            $this->displayBlock("form_rows", $context, $blocks);
            // line 31
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock(($context["form"] ?? null), 'rest');
            // line 32
            echo "</div>";
        } else {
            // line 34
            $this->displayBlock("form_rows", $context, $blocks);
            // line 35
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock(($context["form"] ?? null), 'rest');
        }
    }

    // line 39
    public function block_form_row($context, array $blocks = array())
    {
        // line 40
        if ($this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", array()), "freeze_display_text", array())) {
            // line 41
            $context["attr"] = twig_array_merge(($context["attr"] ?? null), array("class" => (($this->getAttribute(($context["attr"] ?? null), "class", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute(($context["attr"] ?? null), "class", array()), "")) : (""))));
            // line 42
            echo "    <dl>
        <dt>";
            // line 43
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock(($context["form"] ?? null), 'label');
            echo "</dt>
        <dd class=\"form-group";
            // line 44
            if ( !($context["valid"] ?? null)) {
                echo " has-error";
            }
            if (twig_in_filter("middle", $this->getAttribute(($context["attr"] ?? null), "class", array()))) {
                echo " input_name";
            }
            if (twig_in_filter("short", $this->getAttribute(($context["attr"] ?? null), "class", array()))) {
                echo " input_tel";
            }
            if (twig_in_filter("zip", $this->getAttribute(($context["attr"] ?? null), "class", array()))) {
                echo " input_zip";
            }
            echo "\">
            ";
            // line 45
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock(($context["form"] ?? null), 'widget');
            echo "
            ";
            // line 46
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock(($context["form"] ?? null), 'errors');
            echo "
        </dd>
    </dl>";
        } else {
            // line 50
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock(($context["form"] ?? null), 'errors');
            // line 51
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock(($context["form"] ?? null), 'widget');
        }
    }

    // line 55
    public function block_form_errors($context, array $blocks = array())
    {
        // line 56
        if ((twig_length_filter($this->env, ($context["errors"] ?? null)) > 0)) {
            // line 57
            if ($this->getAttribute(($context["form"] ?? null), "parent", array())) {
                // line 58
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["errors"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["error"]) {
                    // line 59
                    echo "<p class=\"errormsg text-danger\">";
                    echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans($this->getAttribute($context["error"], "message", array())), "html", null, true);
                    echo "</p>";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['error'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
            }
        }
    }

    // line 67
    public function block_form_widget($context, array $blocks = array())
    {
        // line 68
        $this->displayParentBlock("form_widget", $context, $blocks);
        // line 69
        if ((($context["freeze"] ?? null) == false)) {
            // line 70
            if ((array_key_exists("help", $context) &&  !twig_test_empty(($context["help"] ?? null)))) {
                // line 71
                echo "<p class=\"mini\"><span class=\"attention\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans(($context["help"] ?? null), array(), ($context["translation_domain"] ?? null)), "html", null, true);
                echo "</span></p>";
            }
        }
    }

    // line 76
    public function block_form_widget_simple($context, array $blocks = array())
    {
        // line 77
        if (($context["freeze"] ?? null)) {
            // line 78
            $context["type"] = "hidden";
            // line 79
            if (($context["freeze_display_text"] ?? null)) {
                // line 80
                echo nl2br(twig_escape_filter($this->env, ((array_key_exists("value", $context)) ? (_twig_default_filter(($context["value"] ?? null), "")) : ("")), "html", null, true));
            }
        }
        // line 83
        $this->displayParentBlock("form_widget_simple", $context, $blocks);
    }

    // line 86
    public function block_hidden_row($context, array $blocks = array())
    {
        // line 87
        if (($context["freeze_display_text"] ?? null)) {
            // line 88
            echo "<div style=\"display: none\">";
            // line 89
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock(($context["form"] ?? null), 'widget');
            // line 90
            echo "</div>";
        } else {
            // line 92
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock(($context["form"] ?? null), 'widget');
        }
    }

    // line 96
    public function block_textarea_widget($context, array $blocks = array())
    {
        // line 97
        if (($context["freeze"] ?? null)) {
            // line 98
            $this->displayBlock("form_widget_simple", $context, $blocks);
        } else {
            // line 100
            $this->displayParentBlock("textarea_widget", $context, $blocks);
            // line 101
            if ((array_key_exists("help", $context) &&  !twig_test_empty(($context["help"] ?? null)))) {
                // line 102
                echo "<p class=\"mini\"><span class=\"attention\">";
                echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans(($context["help"] ?? null), array(), ($context["translation_domain"] ?? null)), "html", null, true);
                echo "</span></p>";
            }
        }
    }

    // line 107
    public function block_choice_widget_collapsed($context, array $blocks = array())
    {
        // line 108
        if (($context["freeze"] ?? null)) {
            // line 109
            echo "        ";
            $context["flag"] = false;
            // line 110
            echo "        ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["choices"] ?? null));
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
            foreach ($context['_seq'] as $context["_key"] => $context["choice"]) {
                // line 111
                echo "            ";
                if ($this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->isSelectedChoice($context["choice"], ($context["value"] ?? null))) {
                    // line 112
                    if (($context["freeze_display_text"] ?? null)) {
                        // line 113
                        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\TranslationExtension')->trans($this->getAttribute($context["choice"], "label", array()), array(), ($context["translation_domain"] ?? null)), "html", null, true);
                        echo "
                ";
                    }
                    // line 115
                    echo "                <input type=\"hidden\" value=\"";
                    echo twig_escape_filter($this->env, $this->getAttribute($context["choice"], "value", array()), "html", null, true);
                    echo "\" ";
                    $this->displayBlock("widget_attributes", $context, $blocks);
                    echo ">
                ";
                    // line 116
                    $context["flag"] = true;
                    // line 117
                    echo "            ";
                }
                // line 118
                echo "        ";
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
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['choice'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 119
            echo "        ";
            if ((($context["flag"] ?? null) == false)) {
                echo "<input type=\"hidden\" value=\"\" ";
                $this->displayBlock("widget_attributes", $context, $blocks);
                echo ">";
            }
        } else {
            // line 121
            $this->displayParentBlock("choice_widget_collapsed", $context, $blocks);
        }
    }

    // line 126
    public function block_choice_widget_expanded($context, array $blocks = array())
    {
        // line 127
        if (($context["freeze"] ?? null)) {
            // line 128
            if (($context["freeze_display_text"] ?? null)) {
                // line 129
                echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", array(), "any", false, true), "data", array(), "any", false, true), "name", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", array(), "any", false, true), "data", array(), "any", false, true), "name", array()), $this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", array()), "data", array()))) : ($this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", array()), "data", array()))), "html", null, true);
            }
            // line 131
            echo "<input type=\"hidden\" value=\"";
            echo twig_escape_filter($this->env, (($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", array(), "any", false, true), "data", array(), "any", false, true), "id", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", array(), "any", false, true), "data", array(), "any", false, true), "id", array()), $this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", array()), "data", array()))) : ($this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", array()), "data", array()))), "html", null, true);
            echo "\" ";
            $this->displayBlock("widget_attributes", $context, $blocks);
            echo ">";
        } else {
            // line 133
            $this->displayParentBlock("choice_widget_expanded", $context, $blocks);
        }
    }

    // line 138
    public function block_checkbox_widget($context, array $blocks = array())
    {
        // line 139
        if (($context["freeze"] ?? null)) {
            // line 140
            if (($context["checked"] ?? null)) {
                // line 141
                if (($context["freeze_display_text"] ?? null)) {
                    // line 142
                    $this->displayBlock("form_label", $context, $blocks);
                }
                // line 144
                echo "<input type=\"hidden\" ";
                $this->displayBlock("widget_attributes", $context, $blocks);
                if (array_key_exists("value", $context)) {
                    echo " value=\"";
                    echo twig_escape_filter($this->env, ($context["value"] ?? null), "html", null, true);
                    echo "\"";
                }
                echo " />";
            }
        } else {
            // line 147
            $this->displayParentBlock("checkbox_widget", $context, $blocks);
        }
    }

    // line 151
    public function block_radio_widget($context, array $blocks = array())
    {
        // line 152
        if (($context["freeze"] ?? null)) {
            // line 153
            if (($context["checked"] ?? null)) {
                // line 154
                if (($context["freeze_display_text"] ?? null)) {
                    // line 155
                    $this->displayBlock("form_label", $context, $blocks);
                }
                // line 157
                echo "<input type=\"hidden\" ";
                $this->displayBlock("widget_attributes", $context, $blocks);
                if (array_key_exists("value", $context)) {
                    echo " value=\"";
                    echo twig_escape_filter($this->env, ($context["value"] ?? null), "html", null, true);
                    echo "\"";
                }
                echo " />";
            }
        } else {
            // line 160
            $this->displayParentBlock("radio_widget", $context, $blocks);
        }
    }

    // line 165
    public function block_password_widget($context, array $blocks = array())
    {
        // line 166
        if (($context["freeze"] ?? null)) {
            // line 167
            echo "<input type=\"hidden\" ";
            $this->displayBlock("widget_attributes", $context, $blocks);
            echo " value=\"";
            echo twig_escape_filter($this->env, $this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", array()), "data", array()), "html", null, true);
            echo "\" />";
        } else {
            // line 169
            $this->displayParentBlock("password_widget", $context, $blocks);
        }
    }

    // line 174
    public function block_date_widget($context, array $blocks = array())
    {
        // line 175
        if (($context["freeze"] ?? null)) {
            // line 176
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["form"] ?? null));
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
                // line 177
                if ( !twig_test_empty($this->getAttribute($this->getAttribute($context["child"], "vars", array()), "value", array()))) {
                    // line 178
                    echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($context["child"], 'widget');
                    // line 179
                    if (($this->getAttribute($context["loop"], "last", array()) == false)) {
                        echo "/";
                    }
                }
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
        } else {
            // line 183
            $this->displayParentBlock("date_widget", $context, $blocks);
        }
    }

    // line 192
    public function block_name_widget($context, array $blocks = array())
    {
        // line 193
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["form"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
            // line 194
            if (($context["freeze"] ?? null)) {
                // line 195
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($context["child"], 'widget');
            } else {
                // line 197
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($context["child"], 'widget');
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 200
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["form"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
            // line 201
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($context["child"], 'errors');
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    // line 205
    public function block_tel_widget($context, array $blocks = array())
    {
        // line 206
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["form"] ?? null));
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
            // line 207
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($context["child"], 'widget', array("type" => "tel", "attr" => array("style" => "ime-mode: disabled;")));
            // line 208
            if (($context["freeze"] ?? null)) {
                // line 209
                if ( !twig_test_empty($this->getAttribute($this->getAttribute($context["child"], "vars", array()), "value", array()))) {
                    // line 210
                    if (($this->getAttribute($context["loop"], "last", array()) == false)) {
                        echo "&nbsp;-&nbsp;";
                    }
                }
            } else {
                // line 213
                if (($this->getAttribute($context["loop"], "last", array()) == false)) {
                    echo "&nbsp;-&nbsp;";
                }
            }
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
        // line 216
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["form"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
            // line 217
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($context["child"], 'errors');
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    // line 221
    public function block_fax_widget($context, array $blocks = array())
    {
        // line 222
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["form"] ?? null));
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
            // line 223
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($context["child"], 'widget', array("attr" => array("style" => "ime-mode: disabled;")));
            // line 224
            if (($this->getAttribute($context["loop"], "last", array()) == false)) {
                echo "&nbsp;-&nbsp;";
            }
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
        // line 226
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["form"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
            // line 227
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($context["child"], 'errors');
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
    }

    // line 231
    public function block_zip_widget($context, array $blocks = array())
    {
        // line 232
        if (($context["freeze"] ?? null)) {
            // line 233
            echo "〒&nbsp;";
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), $this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", array()), "zip01_name", array()), array(), "array"), 'widget');
            echo "&nbsp;-&nbsp;";
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), $this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", array()), "zip02_name", array()), array(), "array"), 'widget');
        } else {
            // line 235
            echo "〒";
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), $this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", array()), "zip01_name", array()), array(), "array"), 'widget', array("id" => "zip01", "attr" => array("style" => "ime-mode: disabled;", "pattern" => "\\d*")));
            echo "-";
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), $this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", array()), "zip02_name", array()), array(), "array"), 'widget', array("id" => "zip02", "attr" => array("style" => "ime-mode: disabled;", "pattern" => "\\d*")));
            echo " <span class=\"question-circle\"><svg class=\"cb cb-question\"><use xlink:href=\"#cb-question\" /></svg></span> <a href=\"http://www.post.japanpost.jp/zipcode/\" target=\"_blank\">郵便番号検索</a>";
            // line 236
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["form"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                // line 237
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($context["child"], 'errors');
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 239
            echo "<div class=\"zip-search\"><button type=\"button\" id=\"zip-search\" class=\"btn btn-default btn-sm\">郵便番号から自動入力</button></div>";
        }
    }

    // line 243
    public function block_address_widget($context, array $blocks = array())
    {
        // line 244
        echo "<div class=\"form-inline form-group input_zip\">";
        // line 245
        echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), $this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", array()), "pref_name", array()), array(), "array"), 'widget', array("id" => "pref"));
        // line 246
        echo "</div>";
        // line 247
        if (($context["freeze"] ?? null)) {
            // line 248
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), $this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", array()), "addr01_name", array()), array(), "array"), 'widget');
            // line 249
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), $this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", array()), "addr02_name", array()), array(), "array"), 'widget');
        } else {
            // line 251
            echo "<div class=\"form-group\">";
            // line 252
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), $this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", array()), "addr01_name", array()), array(), "array"), 'widget', array("id" => "addr01", "attr" => array("style" => "ime-mode: active;", "placeholder" => "form.address1.help")));
            echo "<br />
        </div>
        <div class=\"form-group\">";
            // line 255
            echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($this->getAttribute(($context["form"] ?? null), $this->getAttribute($this->getAttribute(($context["form"] ?? null), "vars", array()), "addr02_name", array()), array(), "array"), 'widget', array("id" => "addr02", "attr" => array("style" => "ime-mode: active;", "placeholder" => "form.address2.help")));
            echo "<br />
        </div>";
            // line 257
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["form"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                // line 258
                echo $this->env->getExtension('Symfony\Bridge\Twig\Extension\FormExtension')->renderer->searchAndRenderBlock($context["child"], 'errors');
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['child'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
        }
    }

    // line 263
    public function block_form_label($context, array $blocks = array())
    {
        // line 264
        $this->displayParentBlock("form_label", $context, $blocks);
        // line 265
        if ( !($context["freeze"] ?? null)) {
            // line 266
            if (($context["required"] ?? null)) {
                echo "<span class=\"required\">必須</span>";
            }
        }
    }

    public function getTemplateName()
    {
        return "Form/form_layout.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  654 => 266,  652 => 265,  650 => 264,  647 => 263,  638 => 258,  634 => 257,  630 => 255,  625 => 252,  623 => 251,  620 => 249,  618 => 248,  616 => 247,  614 => 246,  612 => 245,  610 => 244,  607 => 243,  602 => 239,  596 => 237,  592 => 236,  586 => 235,  580 => 233,  578 => 232,  575 => 231,  567 => 227,  563 => 226,  547 => 224,  545 => 223,  528 => 222,  525 => 221,  517 => 217,  513 => 216,  496 => 213,  490 => 210,  488 => 209,  486 => 208,  484 => 207,  467 => 206,  464 => 205,  456 => 201,  452 => 200,  445 => 197,  442 => 195,  440 => 194,  436 => 193,  433 => 192,  428 => 183,  410 => 179,  408 => 178,  406 => 177,  389 => 176,  387 => 175,  384 => 174,  379 => 169,  372 => 167,  370 => 166,  367 => 165,  362 => 160,  351 => 157,  348 => 155,  346 => 154,  344 => 153,  342 => 152,  339 => 151,  334 => 147,  323 => 144,  320 => 142,  318 => 141,  316 => 140,  314 => 139,  311 => 138,  306 => 133,  299 => 131,  296 => 129,  294 => 128,  292 => 127,  289 => 126,  284 => 121,  276 => 119,  262 => 118,  259 => 117,  257 => 116,  250 => 115,  245 => 113,  243 => 112,  240 => 111,  222 => 110,  219 => 109,  217 => 108,  214 => 107,  206 => 102,  204 => 101,  202 => 100,  199 => 98,  197 => 97,  194 => 96,  189 => 92,  186 => 90,  184 => 89,  182 => 88,  180 => 87,  177 => 86,  173 => 83,  169 => 80,  167 => 79,  165 => 78,  163 => 77,  160 => 76,  152 => 71,  150 => 70,  148 => 69,  146 => 68,  143 => 67,  131 => 59,  127 => 58,  125 => 57,  123 => 56,  120 => 55,  115 => 51,  113 => 50,  107 => 46,  103 => 45,  88 => 44,  84 => 43,  81 => 42,  79 => 41,  77 => 40,  74 => 39,  69 => 35,  67 => 34,  64 => 32,  62 => 31,  60 => 30,  57 => 28,  55 => 27,  51 => 26,  49 => 25,  46 => 24,  11 => 22,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Form/form_layout.twig", "/home/ancharme/ancharme.jp/public_html/app/template/ancharme/Form/form_layout.twig");
    }
}
