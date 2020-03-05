<?php

/* Block/tmp_youtube.twig */
class __TwigTemplate_23e08fdc40ee872dadeeb025f05fc9c9ac2fda20afa4631f4314e322b1d7206d extends Twig_Template
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
        // line 1
        echo "<!-- youtube -->
<div id=\"youtube\" class=\"template\">
    <div class=\"container\">
        <div id=\"player\"></div>
    </div>
</div>
<script>
    var tag = document.createElement('script');
        tag.src = \"https://www.youtube.com/iframe_api\";
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

        var player;
        function onYouTubeIframeAPIReady() {
            player = new YT.Player('player', {
                // height: '360',
                // width: '640',
                videoId: 'JyRKk4fkhSE',
                playerVars: {
                    playsinline: 1 // 1はtrue、0はfalse
                },
                events: {
                    'onReady': onPlayerReady,
                    'onStateChange': onPlayerStateChange
                }
            });
        }
        function onPlayerReady(event) {
            event.target.mute();
            event.target.playVideo();
        }
        function onPlayerStateChange(event) {
            if (event.data == YT.PlayerState.ENDED) {
                event.target.playVideo();
            }
        }
</script>
<!-- /youtube -->";
    }

    public function getTemplateName()
    {
        return "Block/tmp_youtube.twig";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "Block/tmp_youtube.twig", "/home/ancharme/ancharme.jp/public_html/app/template/ancharme/Block/tmp_youtube.twig");
    }
}
