

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Lesson Sample Site</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/sp.css">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body id="app" v-on="click: closeMenu">
<header style="background-image: url(''); 
      position: absolute;
        top: 0px;
      min-height: 0px;
        background-color: rgba(0,0,0,0.8);
          ">
      <nav v-class="motion: position > 50">
                <div class='logo'><a href="index.php"><img src="img/logo.png" alt='Cafe'></a></div>
                <div class='g_nav'>
                    <div class='menu _click' v-on="click: toIntro" v-transition>はじめに</div>
                    <div class='menu _click' v-on="click: toExp" v-transition>体験</div>
                    <div class='menu'><a href="contact">お問い合わせ</a></div>
                </div>
                <div class='sign'>
                    <div class='signin _click' v-on="click: openModal">サインイン</div>
                    
              </div>
          </nav>
    </header>
    <open-modal v-show="showContent" v-on="click: closeModal"></open-modal>

    <section>
        <div class="contact_box">
            <h2>お問い合わせ</h2>
          <form action="confirm" method="POST">
          {{ csrf_field() }}
          <h1 style="text-align:center">お問い合わせ頂きありがとうございます。</h1>
          <br><br>
                <p>送信頂いた件につきましては、当社より折り返しご連絡を差し上げます。</p>
                <p>なお、ご連絡までに、お時間を頂く場合もございますので予めご了承ください。</p>
            <dl class="confirm">
                      <dt>氏名</dt>
                      <dd name="name"  value={{$name}}>{{$name}}</dd>
                      <dt>フリガナ</dt>
                      <dd name="kana">{{$kana}}</dd>
                      <dt>電話番号</dt>
                      <dd name="tel">{{$tel}}</dd>
                      <dt>メールアドレス</dt>
                      <dd name="email">{{$email}}</dd>
                      <dt>お問い合わせ内容</dt>
                      <dd name="body">{{$body}}</dd>
                      <dd class="confirm_btn">
                          <a href="/">戻　る</button>
                      </dd>
            </dl>
			</form>
        </div>
    </section>

    <footer>
        <div class="outer">
      <div class="nav_area">
          <div class="inner">
              <h2>企業情報</h2>
              <ul>
                  <li><a href="#">ご利用方法</a></li>
                  <li><a href="#">ニュースルーム</a></li>
                  <li><a href="#">株主・投資家のみなさまへ</a></li>
                  <li><a href="#">XXXXXXXXXXXXXXX</a></li>
                  <li><a href="#">XXXXXXXXXXXXXXX</a></li>
                  <li><a href="#">XXXXXXXXXXXXXXX</a></li>
                  <li><a href="#">採用情報</a></li>
              </ul>
          </div>
          <div class="inner">
              <h2>コミュニティ</h2>
              <ul>
                  <li><a href="#">ダイバーシティ</a></li>
                  <li><a href="#">アクセシビリティ対応</a></li>
                  <li><a href="#">お友達を招待</a></li>
                  <li><a href="#">XXXXXXXXXXXXXXX</a></li>
                  <li><a href="#">XXXXXXXXXXXXXXX</a></li>
              </ul>
          </div>
          <div class="inner">
              <h2>ホスト</h2>
              <ul>
                  <li><a href="#">XXXXXXXXXXXXXXX</a></li>
                  <li><a href="#">XXXXXXXXXXXXXXX</a></li>
                  <li><a href="#">XXXXXXXXXXXXXXX</a></li>
              </ul>
          </div>
          <div class="inner">
              <h2>サポート</h2>
              <ul>
                  <li><a href="#">新型コロナウイルスに対する取り組み</a></li>
                  <li><a href="#">ヘルプセンター</a></li>
                  <li><a href="#">キャンセルオプション</a></li>
                  <li><a href="#">コミュニティサポート</a></li>
                  <li><a href="#">信頼＆安全</a></li>
              </ul>
          </div>
      </div>

      <div class="reserved">
          <p>このサイトの素材は全て著作権フリーのものを使用しています。</p>
          <div class="menu">
              <span class="_click">プライバシーポリシー</span>
              <span class="_click">利用規約</span>
              <span class="_click">サイトマップ</span>
              <span class="_click">企業情報</span>
          </div>
          <p>&copy; 2021- LiNew, Inc. All rights reserved.</p>
      </div>
    </div>
    </footer>

    <script src="http://cdnjs.cloudflare.com/ajax/libs/vue/0.11.5/vue.min.js"></script>
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
</body>
</html> 