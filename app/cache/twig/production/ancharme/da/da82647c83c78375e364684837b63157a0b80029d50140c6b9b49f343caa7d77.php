<?php

/* __string_template__c979be40460d6425e5fe2e347e5220aeacf995c069d9f664a88461dcef375204 */
class __TwigTemplate_a911f1d1b96cf5bbaa5eb83aaab75399f83143908ae99455ee7eabc332293d84 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 22
        $this->parent = $this->loadTemplate("default_frame.twig", "__string_template__c979be40460d6425e5fe2e347e5220aeacf995c069d9f664a88461dcef375204", 22);
        $this->blocks = array(
            'main' => array($this, 'block_main'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "default_frame.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 24
    public function block_main($context, array $blocks = array())
    {
        // line 25
        echo "        <div id=\"contents\" class=\"main_only\">
            <div id=\"guide_wrap\" class=\"container-fluid inner no-padding\">
                <div id=\"main\">
                    <h1 class=\"page-title-h1\">SHOPPING GUIDE</h1>
                    <div id=\"guide_box__body\"  class=\"container-fluid\">
                        <div id=\"guide_box__body_inner\" class=\"row\">
                            <div id=\"guide_box__body_item\" class=\"col-md-10 col-md-offset-1\">
                              <div class=\"guide-container\">
                                <div class=\"guide-navigation\">
                                  <nav>
                                    <ul class=\"guide-navigation-list\">
                                      <li class=\"guide-navigation-list-item\">
                                        <a href=\"#guide-01\">注文方法について</a>
                                      </li>
                                      <li class=\"guide-navigation-list-item\">
                                        <a href=\"#guide-02\">お支払いについて</a>
                                      </li>
                                      <li class=\"guide-navigation-list-item\">
                                        <a href=\"#guide-03\">配送方法について</a>
                                      </li>
                                      <li class=\"guide-navigation-list-item\">
                                        <a href=\"#guide-04\">消費税について</a>
                                      </li>
                                      <li class=\"guide-navigation-list-item\">
                                        <a href=\"#guide-05\">返品について</a>
                                      </li>
                                      <li class=\"guide-navigation-list-item\">
                                        <a href=\"#guide-06\">セレクト商品について</a>
                                      </li>
                                    </ul>
                                  </nav>
                                </div>
                                <div class=\"guide-contents\">
                                  <div class=\"guide-contents-box\">
                                    <h2 class=\"page-title-h2\" id=\"guide-01\">注文方法について</h2>
                                    <p class=\"page-text\">
                                      当サイトのカートから購入画面へ移動してください。<br>
                                      またご購入の際は会員登録が必須になりますので、新規会員登録よりご登録をお願い致します。
                                    </p>
                                  </div>
                                  <div class=\"guide-contents-box\">
                                    <h2 class=\"page-title-h2\" id=\"guide-02\">お支払いについて</h2>
                                    <div class=\"sub-contetns-box\">
                                      <h4 class=\"page-title-h4\">クレジットカード決済</h4>
                                      <p class=\"page-text\">
                                        ご利用いただけるカード会社は以下の通りです。<br>
                                        VISA/MASTER/DINERS/JCB/AMEX
                                      </p>
                                      <p class=\"page-text\">備考</p>
                                      <ul class=\"list\">
                                        <li class=\"list-item\">・お支払い回数は１回払いのみになります。</li>
                                        <li class=\"list-item\">・お支払い総額は以下の通りです。</li>
                                        <li class=\"list-item\">商品代金＋送料（※）＋消費税</li>
                                        <li class=\"list-item\">※送料は全国一律648円（税込）になります。</li>
                                      </ul>
                                    </div>
                                    <div class=\"sub-contetns-box\">
                                      <h4 class=\"page-title-h4\">携帯キャリア決済</h4>
                                      <p class=\"page-text\">
                                        商品購入代金を、携帯料金とまとめてお支払できる決済方法です。<br>                        
                                       各キャリアの画面にて4桁の暗証番号入力だけで簡単に決済ができます。<br>
                                      </p>
                                    </div>

                                    <div class=\"sub-contetns-box\">
                                        <h4 class=\"page-title-h4\">代金引換</h4>
                                        <p class=\"page-text\">代金引換手数料</p>
                                        <ul class=\"list\">
                                          <li class=\"list-item\">0～9,999円\t　　  ¥364(税込)</li>
                                          <li class=\"list-item\">10,000～29,999円\t¥464(税込)</li>
                                          <li class=\"list-item\">30,000～99,999円\t¥664(税込)</li>
                                          <li class=\"list-item\">※表示されている金額はすべて税込みの金額になります。</li>
                                        </ul>
                                      </div>

                                      <div class=\"sub-contetns-box\">
                                        <h4 class=\"page-title-h4\">コンビニ決済</h4>
                                        <p class=\"page-text\">コンビニ決済手数料</p>
                                        <ul class=\"list\">
                                          <li class=\"list-item\">コンビニ決済手数料：¥330(税込)</li>
                                          <li class=\"list-item\">※表示されている金額はすべて税込みの金額になります。</li>
                                          <li class=\"list-item\">なお、入金期限は10日間とさせていただき、超過した場合にはキャンセルとさせていただきます。</li>
                                        </ul>
                                      </div>
                                    
                                      <div class=\"sub-contetns-box\">
                                        <h4 class=\"page-title-h4\">後払い決済</h4>
                                        <p class=\"page-text\">
                                            このお支払方法の詳細<br>
                                            商品の到着を確認してから、「コンビニ」「郵便局」「銀行」で後払いできる安心・簡単な決済方法です。 <br>
                                            請求書は、商品とは別に郵送されますので、発行から14日以内にお支払いをお願いします。<br>
                                        </p> 

                                        </p>
                                        <ul class=\"list\">
                                          <li class=\"list-item\">後払い手数料：¥330(税込)</li>
                                          <li class=\"list-item\">※表示されている金額はすべて税込みの金額になります。</li>
                                          <li class=\"list-item\">※請求書の発行は商品到着後、9日以内に行われます。</li>
                                        </ul>
                                      </div>

                                      <div class=\"sub-contetns-box\">
                                        <h4 class=\"page-title-h4\">apple pay</h4>
                                        <p class=\"page-text\">
                                            このお支払方法の詳細<br>
                                            商品購入時に、apple payを選択して支払い決済を済ませてください。<br>                        
                                            apple payについては、apple payガイドラインを参照ください。<br>
                                        </p> 

                                        </p>
                                        <ul class=\"list\">
                                          <li class=\"list-item\">apple pay決済手数料：¥330(税込)</li>
                                          <li class=\"list-item\">※表示されている金額はすべて税込みの金額になります。</li>
                                        </ul>
                                      </div>

                                  <div class=\"guide-contents-box\">
                                    <h2 class=\"page-title-h2\" id=\"guide-03\">配送方法について</h2>
                                    <div class=\"sub-contetns-box\">
                                      <h4 class=\"page-title-h4\">お届けについて</h4>
                                      <ul class=\"list\">
                                        <li class=\"list-item\">商品のお届け時期は、商品の在庫状況によって異なります。</li>
                                        <li class=\"list-item\">通常ご注文より2-10日営業日で発送となります。</li>
                                        <li class=\"list-item\">※天候や配送業者により遅れる場合がございます。</li>
                                        <li class=\"list-item\">出荷目安の日数につきましては、商品の到着日をお約束するものではありません。</li>
                                        <li class=\"list-item\">返品及び交換の際には、必ず運営スタッフ(contact@ancharme.jp)へご連絡ください。</li>
                                      </ul>                                  
                                    </div>

                                    <div class=\"sub-contetns-box\">
                                        <h4 class=\"page-title-h4\">商品のお届けについて
                                        </h4>
                                        <p class=\"page-text\">
                                            23時59分までのご注文で最短で翌日中に発送、2営業日でのお届けとなります。<br>
                                            最短でお届けをご希望の場合は、「指定なし」をお選びください。
                                          </p>
                                          <ul class=\"list\">
                                            <li class=\"list-item\">※住所情報に誤りがある場合や在庫手配にお時間を頂戴する場合など、最短発送対象外となる場合がございますのであらかじめご了承ください。
                                            </li>
                                            <li class=\"list-item\">※コンビニ決済は入金確認後に発送いたします。</li>
                                            <li class=\"list-item\">※キャンペーン・セール期間中は発送の混雑が予想され、通常よりもお届けにお時間をいただく場合がございます。</li>
                                            <li class=\"list-item\">※予約商品・先行受注商品、その他対象外商品は除外させていただきます。</li>
                                            <li class=\"list-item\">※配送事情（天候・災害・交通事情など）により、お届けにお時間をいただく場合がございます。</li>
                                            <li class=\"list-item\">※日祝は発送業務がお休みとなります。</li>
                                            <li class=\"list-item\">※商品に関しまして、十分に注意をして出品しておりますが、在庫切れになる場合がございます。その場合はメールにてご連絡いたします。</li>
                                          </ul>                            
                                      </div>

                                      <h4 class=\"page-title-h4\">◯ご注文で翌日発送可能な決済</h4>
                                      <ul class=\"list\">
                                        <li class=\"list-item\">・クレジットカード決済</li>
                                        <li class=\"list-item\">・後払い決済</li>
                                        <li class=\"list-item\">・キャリア決済</li>
                                        <li class=\"list-item\">・代金引換</li>
                                        <li class=\"list-item\">・Apple pay決済</li>
                                      </ul>

                                      <h4 class=\"page-title-h4\">◯ご入金で翌日発送可能な決済</h4>
                                      <ul class=\"list\">
                                        <li class=\"list-item\">・コンビニ決済</li>
                                      </ul>



                                    <div class=\"sub-contetns-box\">
                                      <h4 class=\"page-title-h4\">配送方法・配送業者について</h4>
                                      <p class=\"page-text\">ヤマト運輸 or 佐川急便</p>
                                    </div>
                                    <div class=\"sub-contetns-box\">
                                      <h4 class=\"page-title-h4\">送料</h4>
                                      <ul class=\"list\">
                                        <li class=\"list-item\">お買い上げ合計金額が8,000円（税込）以上の場合は全国(離島を含む)送料無料です。</li>
                                        <li class=\"list-item\">8,000円（税込）未満の場合は、送料770円(税込)となります。（離島/北海道/沖縄は送料1,210円（税込）です）</li>
                                        <li class=\"list-item\">商品はお振込完了から2日から最大10日程度でお届け致します。</li>
                                        <li class=\"list-item\">※商品発送後、お客様のお住まいの地域や天候などにより、お届けまでに7日以上有する場合がございます。</li>
                                      </ul>  
                                    </div>
                                  </div>
                                  <div class=\"guide-contents-box\">
                                    <h2 class=\"page-title-h2\" id=\"guide-04\">消費税について</h2>
                                    <p class=\"page-text\">全ての商品に消費税がかかります。</p>
                                  </div>
                                  <div class=\"guide-contents-box\">
                                    <h2 class=\"page-title-h2\" id=\"guide-05\">返品について</h2>
                                    <div class=\"sub-contetns-box\">
                                      <h4 class=\"page-title-h4\">返品期限</h4>
                                      <ul class=\"list\">
                                        <li class=\"list-item\">①商品到着後8日以内とさせていただきます。</li>
                                        <li class=\"list-item\">お客様都合による返品は一切承りません。</li>
                                        <li class=\"list-item\">②商品受領日から8日以内に、欠陥であることを証明できる画像(商品全体及び欠陥の拡大画像)を添付し、「contact@ancharme.jp」までご連絡をお願い致します。</li>
                                      </ul>
                                      <p class=\"page-text\">※以下の場合は、返品・交換をお受けできません</p>
                                      <ul class=\"list\">
                                        <li class=\"list-item\">・使用済みの商品</li>
                                        <li class=\"list-item\">・セット商品の一部のみ</li>
                                        <li class=\"list-item\">・ワンサイズ商品の返品交換</li>
                                        <li class=\"list-item\">・おまけ商品の返品交換</li>
                                        <li class=\"list-item\">・お届けから3日以上経過した商品</li>
                                        <li class=\"list-item\">・商品のタグ等（説明書・箱・付属品など）が破損、紛失、または破棄された商品</li>
                                        <li class=\"list-item\">・商品到着以降に出来た傷や汚れ、破損が生じた商品</li>
                                        <li class=\"list-item\">・返品・交換のご連絡なしに返送された商品</li>
                                        <li class=\"list-item\">・水着、ピアス、アクセサリー等の商品</li>
                                        <li class=\"list-item\">・製造過程により生じた匂い、糸のほつれがある商品</li>
                                        <li class=\"list-item\">・ファーや毛の付いた商品が毛が抜けるという理由での返品交換</li>
                                      </ul>
                                    </div>
                                    <div class=\"sub-contetns-box\">
                                      <h4 class=\"page-title-h4\">返品後の対応</h4>
                                      <p class=\"page-text\">
                                        返品商品が弊社に到着次第、ご返金手続きをさせていただきます。<br>
                                        返金手続きには１〜２週間前後かかる場合もございますので、予めご了承いただきますよう、お願い申し上げます。
                                      </p>
                                    </div>
    
                                    <div class=\"guide-contents\">
                                        <div class=\"guide-contents-box\">
                                          <h2 class=\"page-title-h2\" id=\"guide-06\">セレクト商品について</h2>
                                          <p class=\"page-text\">
                                            詳しくは以下のページを参照してください。<br>
                                            <a href=\"https://ancharme.jp/about\">詳しくはこちら</a>
                                          </p>
                                        </div>
    
                                  </div>

                              </div>

                                </div>
                              </div>
    
                            </div><!-- /.col -->
                        </div><!-- /.row -->
    
                    </div>
                </div>
            </div>
        </div>
    ";
    }

    public function getTemplateName()
    {
        return "__string_template__c979be40460d6425e5fe2e347e5220aeacf995c069d9f664a88461dcef375204";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  31 => 25,  28 => 24,  11 => 22,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "__string_template__c979be40460d6425e5fe2e347e5220aeacf995c069d9f664a88461dcef375204", "");
    }
}
