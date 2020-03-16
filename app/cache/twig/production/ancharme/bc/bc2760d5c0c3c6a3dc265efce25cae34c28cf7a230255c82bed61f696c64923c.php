<?php

/* __string_template__3d083530ffc26119b4922feb4837577d969e920fac8935c984cbca6ec79bce10 */
class __TwigTemplate_fccfce6702ea8edef2e6c50d4610b4f01c163cf10260f1bceaac876fe00d58c6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 22
        $this->parent = $this->loadTemplate("default_frame.twig", "__string_template__3d083530ffc26119b4922feb4837577d969e920fac8935c984cbca6ec79bce10", 22);
        $this->blocks = array(
            'main' => array($this, 'block_main'),
            'javascript' => array($this, 'block_javascript'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "default_frame.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 24
        $context["body_class"] = "cart_page";
        // line 22
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 26
    public function block_main($context, array $blocks = array())
    {
        // line 27
        echo "    <h1 class=\"page-heading\">ご注文完了</h1>
    <div id=\"complete_wrap\" class=\"container-fluid\">
        <div id=\"complete_flow_box\" class=\"row\">
            <div id=\"complete_flow_box__body\" class=\"col-md-12\">
                ";
        // line 31
        if ($this->env->getExtension('Symfony\Bridge\Twig\Extension\SecurityExtension')->isGranted("ROLE_USER")) {
            // line 32
            echo "                <div id=\"complete_flow_box__flow_state\" class=\"flowline step3\">
                ";
        } else {
            // line 34
            echo "                <div id=\"complete_flow_box__flow_state\" class=\"flowline step4\">
                ";
        }
        // line 36
        echo "                    <ul id=\"complete_flow_box__flow_state_list\" class=\"clearfix\">
                        <li><span class=\"flow_number\">1</span><br>カートの商品</li>
                    ";
        // line 38
        if ($this->env->getExtension('Symfony\Bridge\Twig\Extension\SecurityExtension')->isGranted("ROLE_USER")) {
            // line 39
            echo "                        <li><span class=\"flow_number\">2</span><br>ご注文内容確認</li>
                        <li class=\"active\"><span class=\"flow_number\">3</span><br>完了</li>
                    ";
        } else {
            // line 42
            echo "                        <li><span class=\"flow_number\">2</span><br>お客様情報</li>
                        <li><span class=\"flow_number\">3</span><br>ご注文内容確認</li>
                        <li class=\"active\"><span class=\"flow_number\">4</span><br>完了</li>
                    ";
        }
        // line 46
        echo "                    </ul>
                </div>
            </div><!-- /.col -->
        </div><!-- /.row -->


        <div id=\"deliveradd_input\" class=\"row\">
            <div id=\"deliveradd_input_box\" class=\"col-sm-10 col-sm-offset-1\">
                <div id=\"deliveradd_input_box__message\" class=\"complete_message\">
                    <h2 class=\"heading01\">ご注文ありがとうございました</h2>
                    <p>ただいま、ご注文の確認メールをお送りさせていただきました。<br />
                        万一、ご確認メールが届かない場合は、トラブルの可能性もありますので大変お手数ではございますがもう一度お問い合わせいただくか、お電話にてお問い合わせくださいませ。<br />
                        今後ともご愛顧賜りますようよろしくお願い申し上げます。</p>
                </div>
                <div id=\"deliveradd_input_box__top_button\" class=\"row no-padding\">
                    <div class=\"btn_group col-sm-offset-4 col-sm-4\">
                        <p>
                            <a href=\"";
        // line 63
        echo $this->env->getExtension('Eccube\Twig\Extension\EccubeExtension')->getUrl("homepage");
        echo "\" class=\"btn btn-info btn-block\">トップページへ</a>
                        </p>
                    </div>
                </div>

            </div><!-- /.col -->
        </div><!-- /.row -->

    </div>
";
    }

    // line 73
    public function block_javascript($context, array $blocks = array())
    {
        // line 74
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
fbq('track', 'PageView', {\"agent\":\"execcube-3.0.17-1.0.1\",\"content_ids\":[266],\"content_type\":\"product\",\"value\":3570,\"currency\":\"JPY\"});
fbq('track', 'Purchase', {\"agent\":\"execcube-3.0.17-1.0.1\",\"content_ids\":[266],\"content_type\":\"product\",\"value\":3570,\"currency\":\"JPY\"});
</script>
<!-- End Facebook Pixel Code -->";
    }

    public function getTemplateName()
    {
        return "__string_template__3d083530ffc26119b4922feb4837577d969e920fac8935c984cbca6ec79bce10";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  104 => 74,  101 => 73,  87 => 63,  68 => 46,  62 => 42,  57 => 39,  55 => 38,  51 => 36,  47 => 34,  43 => 32,  41 => 31,  35 => 27,  32 => 26,  28 => 22,  26 => 24,  11 => 22,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "__string_template__3d083530ffc26119b4922feb4837577d969e920fac8935c984cbca6ec79bce10", "");
    }
}
