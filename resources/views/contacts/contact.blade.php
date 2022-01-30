<?php 
session_start();
// require_once(__DIR__ .'/../../../app/Http/Controllers/ContactsController.php');
  // sendData($params['player']['id']);
  // session_start();
  // $controller = new ContactsController();
  // $params = $controller->view();
  // $countries = $controller->grabCountryList();
  // $detail = $controller->detail();
  // use App\ContactsControllers;
  // $controller->createRow();
  // $controller->register();

  // $validationList = $_SESSION['validationList'];
  // $validationFlag = $_SESSION['validationFlag'];
  
?>
<!-- 
// include 'functions.php';

// session_start();

// createRow();
// $result = readTheTable();



// function deleteRows($num){
//     $connection = mysqli_connect('localhost', 'root', '', 'cafe');
//     $query = "DELETE FROM contacts";
//     $query .= "WHERE id = $num";

//     $result = mysqli_query($connection, $query);
// };




    
?> -->


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Lesson Sample Site</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sp.css') }}">
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script>

        function deletingConfirmation(num) {   
            let text = 'id No.' + num + ' を削除しますか？' ;
            
            if (confirm(text) == true) {

                window.location = (`./delete.php?id="${num}"`) 
            } else {
                text = "You canceled!";
            }
            // document.getElementById("demo").innerHTML = text;
        }  



        function validateForm() {
            let name = document.querySelector('.name').value;
            let kana = document.querySelector('.kana').value;
            let tel = document.querySelector('.tel').value;
            let email  = document.querySelector('.email').value;
            let main = document.querySelector('.main').value;

            let flag = true;
            let warning = ''

            if(!name){
                flag =false;
                warning = warning + '氏名は必須入力です。' + '10文字以内でご入力ださい。'　+ '\n';
            }

            if(name.length > 10){
                flag =false;
                warning = warning + '氏名は10文字以内でご入力ださい。' + '\n';
            }

            if(!kana){
                flag =false;
                warning = warning + 'フリガナは必須入力です。' + '10文字以内でご入力ださい。'　+ '\n';
            }

            if(kana.length > 10){
                flag =false;
                warning = warning + 'フリガナは10文字以内でご入力ださい。' + '\n';
            }

            // let str = tel;
            // warnign = warning + tel

            if(tel){
                for (let i = 0; i < tel.length; i++) {
                    if(tel.charAt(i) == '0' || tel.charAt(i) == '1' || tel.charAt(i) == '2' || tel.charAt(i) == '3' || tel.charAt(i) == '4' || tel.charAt(i) == '5' || tel.charAt(i) == '6' || tel.charAt(i) == '7' || tel.charAt(i) == '8' || tel.charAt(i) == '9' ){
                        
                    } else{
                        flag =false;

                        warning = warning + '電話番号は0-9の数字のみでご入力ください'  + '\n';
                        // warning = warning + tel.charAt(i)
                        break;
                    }
                }

            }

            var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

            if (!filter.test(email)) {
                flag =false;
                warning = warning + 'メールアドレスは正しくご入力ください。' + '\n';
            }

            if(main.length == 0){
                flag = false;
                warning = warning + 'お問い合わせ内容は必須入力です。' + '\n';

                // warning = warning + ;
            }
            // main.split('\n').join('<br>'));

            // main = main.replace(/\n/g, "<br>");
            main = main.replace(/\n/g, "<br />");

            if(!flag) alert(`${warning}`);
            
            return true; 
        }

</script>
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
    <!-- <open-modal v-show="showContent" v-on="click: closeModal"></open-modal> -->

    <section>
        <div class="contact_box">
            <h2 style="">お問い合わせ</h2>
			<form name="myform" action="./check" method="POST">
            @csrf
            <!-- <form name="myform" action="./check" > -->
      <!-- @csrf 
      @method('PUT') -->
      <!-- @method('PUT') -->
                <h3 >下記の項目をご記入の上送信ボタンを押してください</h3>
                <p>送信頂いた件につきましては、当社より折り返しご連絡を差し上げます。</p>
                <p>なお、ご連絡までに、お時間を頂く場合もございますので予めご了承ください。</p>
                <p><span class="required">*</span>は必須項目となります。</p>


                <dl>
                    <dt><label for="name">氏名</label><span class="required">*</span></dt>
                    <?php 
                        if(isset($_POST['submit'])){
                            if($validationList['name'] !== true) echo '<dd class="error">' . $validationList['name'] . '</dd>';
                        }
                    ?> 
                    <dd><input class="name" type="text" name="name" id="username" placeholder="yamada" value="<?php echo isset($_POST["name"]) ? $_POST["name"] : ''; ?>"></dd>

                    <dt><label for="kana">フリガナ</label><span class="required">*</span></dt>
                    <?php 
                        if(isset($_POST['submit'])){
                            if($validationList['kana'] !== true) echo '<dd class="error">' . $validationList['kana'] . '</dd>';
                        }
                    ?> 
                    <dd><input class="kana" type="text" name="kana" id="kana" placeholder="ヤマダタロウ" value="<?php echo isset($_POST["kana"]) ? $_POST["kana"] : ''; ?>"></dd>

                    <dt><label for="tel">電話番号</label></dt>
                    <?php 
                        if(isset($_POST['submit'])){
                            if($validationList['tel'] !== true) echo '<dd class="error">' . $validationList['tel'] . '</dd>';
                        }
                    ?> 
                    <dd><input class="tel" type="text" name="tel" id="tel" placeholder="09012345678" value="<?php echo isset($_POST["tel"]) ? $_POST["tel"] : ''; ?>"></dd>

                    <dt><label for="email">メールアドレス</label><span class="required">*</span></dt>
                    <?php 
                        if(isset($_POST['submit'])){
                            if($validationList['email'] !== true) echo '<dd class="error">' . $validationList['email'] . '</dd>';
                        }
                    ?> 
                    <dd><input class="email" type="text" name="email" id="email" placeholder="test@test.co.jp" value="<?php echo isset($_POST["email"]) ? $_POST["email"] : ''; ?>"></dd>

                </dl>
                
                <h3><label for="body">お問い合わせ内容をご記入ください<span class="required">*</span></label></h3>
                <dl class="body">
                    <?php 
                        if(isset($_POST['submit'])){
                            if($validationList['body'] !== true) echo '<dd class="error">' . $validationList['body'] . '</dd>';
                        }
                    ?> 
                    <dd><textarea class="main" name="body" id="body" ><?php echo isset($_POST["body"]) ? $_POST["body"] : ''; ?></textarea></dd>
                    <dd><button type="submit" name="submit">送　信</button></dd>
                </dl>


                    
			</form>
        </div>
    </section>

        <div style="margin-left:auto; margin-right:auto; width:100%; ">

            <form name="secondForm" action="contact.php" method="post"  >
        
            <table style="margin-left:auto; margin-right:auto; text-align: middle; border-collapse: collapse; width:80%; border-spacing: 0 15px;">
                <tr style="  text-align: center; ">
                    <th style="border: 1px solid black;" >id</th>
                    <th style="border: 1px solid black; ">name</th>
                    <th style="border: 1px solid black;">kana</th>
                    <th style="border: 1px solid black;">tel</th>
                    <th style="border: 1px solid black;">email</th>
                    <th style="border: 1px solid black;">body</th>
                    <th style="border: 1px solid black;">created_at</th>
                    <th style="border: 1px solid black;">編集</th>
                    <th style="border: 1px solid black;">削除</th>

                    
                </tr>

                @foreach($results as $result)
                <tr><td> &nbsp; </td></tr>

                
                <tr style='background-color:lightgrey'>
                  <td>{{$result->id}}</td>
                  <td>{{$result->name}}</td>
                  <td>{{$result->kana}}</td>
                  <td>{{$result->tel}}</td>
                  <td>{{$result->email}}</td>
                  <td>{{$result->body}}</td>
                  <td>{{$result->created_at}}</td>
                  <td>編集</td>
                  <td>削除</td>
                            <!-- echo "<tr>";
                        echo "<td> &nbsp;"  . "</td>";
                        echo "</tr>";
                        echo "<tr style='background-color:lightgrey'>";
                        echo "<td>" . $row['id'] . "</td>";
                        echo "<td>" . $row['name'] . "</td>";
                        echo "<td>" . $row['kana'] . "</td>";
                        echo "<td>" . $row['tel'] . "</td>";
                        echo "<td>" . $row['email'] . "</td>";
                        echo "<td>" . $row['body'] . "</td>";
                        echo "<td>" . $row['created_at'] . "</td>";
                        // echo "<td >　編集". "</td>";
                        // echo '<td onclick="deletingConfirmation()"> <button onclick="deletingConfirmation()">  削除  </button> </td>';
                        echo "<td ><a href='edit.php?id=" . $row['id'] . "'>編集</a></td>";

                        echo "<td><input type = 'button' onclick = 'deletingConfirmation({$row['id']})' value = '削除'></td>";

                        // echo "<td><input type ='button' type='submit' name='delete' value = '削除'></td>";
                        // echo "<td><a href='delete.php?id=" . $row['id'] . ">Delete</a></td>";

                        // echo "<td ><a href='delete.php?id=" . $row['id'] . "'>削除</a></td>";


                        // echo

                        echo "</tr>"; -->
                    
                </tr>
                @endforeach
            </table>
            <!-- <button onclick="return confirm('Are you sure?')"> hey</button> -->
            </form>
        </div>


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
    <script>
        // alert("氏名は必須入力です。10文字以内でご入力ください。\nフリガナは必須入力です。10文字以内でご入力ください。\n電話番号は0-9の数字のみでご入力ください。\nメールアドレスは正しくご入力ください。\nお問い合わせ内容は必須入力です。");   
    </script>
</body>
</html>