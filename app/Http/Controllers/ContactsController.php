<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}

use App\Models\Contacts;
use Illuminate\Http\Request;
// use App\ContactsController;
// App\ContactsController.

class ContactsController extends Controller{
    
    public function index(){
        $contacts = Contacts::all();
        return view('contacts.index', compact('contacts'));
        // $params = [
        //     'test' => 'this is test',
        //     'sample' => 'this is sample'
        // ];

        // return view('contacts.index', compact('params'));
    }

    public function contact(){
      $results = Contacts::all();
      return view('contacts.contact', compact('results'));
      if(isset($_POST['submit'])){
        $username = $_POST['name']; 
      }    
			$validationFlag = true;
			$validationList = [
					"name"=> true,
					"kana"=> true,
					"tel"=> true,
					"email"=> true,
					"body"=> true,
			];
			$_SESSION['validationList'] = $validationList;
			$_SESSION['validationFlag'] = $validationFlag;
      echo $username;
      return view('contacts.check');
        // $params = [
        //     'test' => 'this is test',
        //     'sample' => 'this is sample'
        // ];

        // return view('contacts.index', compact('params'));
    }

    public function display(){
        echo $_POST['name']; 
    }

    public function check(Request $request) {
			$results = Contacts::all();
      // return view('contacts.contact', compact('results'));

			// 投稿内容の受け取って変数に入れる
			$name = $request->input('name');
			$kana = $request->input('kana');
			$tel = $request->input('tel');
			$email = $request->input('email');
			$body = $request->input('body');

			
			$nameError= '';
			$kanaError = '';
			$telError = '';
			$emailError = '';
			$bodyError = '';

			$validationFlag = true;
			if(!$name){
        $nameError = '氏名は必須入力です。　１０文字以内でご入力ださい。';
				echo '1';
        $validationFlag = false;
      };
      
      if(mb_strlen(strval($name)) > 10){
				echo '2';
        $nameError = '氏名は１０文字以内でご入力ださい。' . mb_strlen($name);
        $validationFlag = false;
      };
      
      
      // kana validation
      if(!$kana){
				echo '3';
      $kanaError = 'フリガナは必須入力です。　１０文字以内でご入力ださい。';
      $validationFlag  = false;
      };
      
      if(mb_strlen($kana) > 10){
				echo '4';
      $kanaError = 'フリガナは１０文字以内でご入力ださい。';
      $validationFlag  = false;
      };

      if($tel){
				
          $str = $tel;
          for($i =0; $i<strlen($tel); $i++){
              if($str[0] == '0' || $str[0] == '1' || $str[0] == '2'|| $str[0] == '3'|| $str[0] == '4'|| $str[0] == '5'|| $str[0] == '6'|| $str[0] == '7'|| $str[0] == '8' || $str[0] == '9'){
              } else{
								echo '5';
                  $telError = '電話番号は0-9の数字のみでご入力ください';
                  $validationFlag = false;
              };
              $str = substr($str, 1);
          };
      }

      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				echo '6';
          $emailError = 'メールアドレスは正しくご入力ください。';
          $validationFlag = false;
      };

      if(strlen($body) == ''){
				echo '7';
          $bodyError ='お問い合わせ内容は必須入力です。';
          $validationFlag = false;
      }

			// echo '8';

			// 変数をビューに渡す
			$body  =str_replace("\n", '<br />', $body);

			

			if($validationFlag){
				// $_SESSION['name'] = $name;
				// $_SESSION['kana'] =$kana;
				// $_SESSION['tel'] =$tel;
				// $_SESSION['email']  =$email;
				// $_SESSION['body'] =$body;

				\App\Models\Contacts::insert([
					'name' => $name,
					'kana' => $kana,
					'tel' => $tel,
					'email' => $email,
					'body' => $body,
					'created_at' => now()
				]);
				// header("Location: ./contact");
				// die();

				// session('name') = $name;
				// session('kana') =$kana;
				// session('tel') =$tel;
				// session('email')  =$email;
				// session('body') =$body;
				
				// echo 'syo';
				return view('contacts.complete')->with([
					"name" => $name,
					"kana"  => $kana,
					"tel"  => $tel,
					"email"  => $email,
					"body"  => $body,
				]);
			}else{
				// echo 'syoaaa';
				return view('contacts.contact')->with([
					"name" => $name,
					"kana"  => $kana,
					"tel"  => $tel,
					"email"  => $email,
					"body"  => $body,
					"validationFlag" => $validationFlag,
					'results' => $results,

					'nameError' => $nameError,
					'kanaError' => $kanaError,
					'telError' => $telError,
					'emailError' => $emailError,
					'bodyError' => $bodyError
			]);
			}
			
		}

		public function create(Request $request){
			$name = $request->input('name');
			$kana = $request->get('kana');
			$tel = $request->get('tel');
			$email = $request->get('email');
			$body =  $request->get('body');

			\App\Models\Contacts::insert([
				'name' => $name,
				'kana' => $kana,
				'tel' => $tel,
				'email' => $email,
				'body' => $body,
				'created_at' => now()
			]);


			// $GLOBALS['connection'] = mysqli_connect('localhost', 'root', '', 'cafe');
			// $name = mysqli_real_escape_string($GLOBALS['connection'],$name );
      // $kana = mysqli_real_escape_string($GLOBALS['connection'],$kana );
      // $tel = mysqli_real_escape_string($GLOBALS['connection'],$tel );
      // $email = mysqli_real_escape_string($GLOBALS['connection'],$email );
      // $body = mysqli_real_escape_string($GLOBALS['connection'],$body );
			// $results = DB::insert("INSERT INTO contacts(name,kana,tel,email,body,created_at) VALUES ('$name', '$kana', '$tel', '$email', '$body',now() )");
  
      // $query = "INSERT INTO contacts(name,kana,tel,email,body,created_at)";
      // $query .= "VALUES ('$name', '$kana', '$tel', '$email', '$body',now() )";
  
      // $result = mysqli_query($GLOBALS['connection'], $query); 
			header("Location: ./contact");
      die();
		}

		public function delete(Request $request){
            $key = $request->key
				$id = $request->id;
                
            // $query = "DELETE FROM contacts WHERE id = $id";
            $deleted = DB::delete('delete from contacts where id = ?',[$id]);

            header("Location: ./contact");
            die();
			
			// $name = $request->input('name');
			// $kana = $request->get('kana');
			// $tel = $request->get('tel');
			// $email = $request->get('email');
			// $body =  $request->get('body');
			return view('contacts.delete');

			// \App\Models\Contacts::insert([
			// 	'name' => $name,
			// 	'kana' => $kana,
			// 	'tel' => $tel,
			// 	'email' => $email,
			// 	'body' => $body,
			// 	'created_at' => now()
			// ]);


			// $GLOBALS['connection'] = mysqli_connect('localhost', 'root', '', 'cafe');
			// $name = mysqli_real_escape_string($GLOBALS['connection'],$name );
      // $kana = mysqli_real_escape_string($GLOBALS['connection'],$kana );
      // $tel = mysqli_real_escape_string($GLOBALS['connection'],$tel );
      // $email = mysqli_real_escape_string($GLOBALS['connection'],$email );
      // $body = mysqli_real_escape_string($GLOBALS['connection'],$body );
			// $results = DB::insert("INSERT INTO contacts(name,kana,tel,email,body,created_at) VALUES ('$name', '$kana', '$tel', '$email', '$body',now() )");
  
      // $query = "INSERT INTO contacts(name,kana,tel,email,body,created_at)";
      // $query .= "VALUES ('$name', '$kana', '$tel', '$email', '$body',now() )";
  
      // $result = mysqli_query($GLOBALS['connection'], $query); 
		}
}
