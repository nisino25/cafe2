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
        // $params = [
        //     'test' => 'this is test',
        //     'sample' => 'this is sample'
        // ];

        // return view('contacts.index', compact('params'));
    }

    public function display(){
        echo $_POST['name']; 
    }

    public function check(){
        $results= 'hey';
        if(isset($_POST['submit'])){
              $username = $_POST['name']; 
        }   
        echo $username;
        return view('contacts.check', compact('username'));
        // makeConnection();
    
        // $query = "SELECT *  FROM contacts";
        // $result = mysqli_query($GLOBALS['connection'], $query); 
    
        // if(!$result){
        //     die('failed sending data. '. mysqli_error($connection));
        // };

        // echo 'hey';
        // if(isset($_POST['submit'])){
        //     echo 'done';
        // }else{
        //     echo 'not yet';
        // }
    
        // $validationFlag = true;
        // $validationList = [
        //     "name"=> true,
        //     "kana"=> true,
        //     "tel"=> true,
        //     "email"=> true,
        //     "body"=> true,
        // ];
    
        // if(isset($_POST['submit'])){
        //   $username = $_POST['name']; 
        //   $kana = $_POST['kana']; 
        //   $tel = $_POST['tel']; 
        //   $email = $_POST['email']; 
        //   $body = $_POST['body']; 
    
        //   if(!$username){
        //     $validationList['name'] = '氏名は必須入力です。　１０文字以内でご入力ださい。';
        //     $validationFlag = false;
        //   };
          
        //   if(mb_strlen(strval($username)) > 10){
        //     $validationList['name'] = '氏名は１０文字以内でご入力ださい。' . mb_strlen($username);
        //     $validationFlag = false;
        //   };
          
          
        //   // kana validation
        //   if(!$kana){
        //   $validationList['kana'] = 'フリガナは必須入力です。　１０文字以内でご入力ださい。';
        //   $validationFlag  = false;
        //   };
          
        //   if(mb_strlen($kana) > 10){
        //   $validationList['kana'] = 'フリガナは１０文字以内でご入力ださい。';
        //   $validationFlag  = false;
        //   };
    
        //   if($tel){
        //       $validationList['tel'] = '';
        //       $str = $tel;
        //       for($i =0; $i<strlen($tel); $i++){
        //           if($str[0] == '0' || $str[0] == '1' || $str[0] == '2'|| $str[0] == '3'|| $str[0] == '4'|| $str[0] == '5'|| $str[0] == '6'|| $str[0] == '7'|| $str[0] == '8' || $str[0] == '9'){
        //           } else{
        //               $validationList['tel'] = '電話番号は0-9の数字のみでご入力ください';
        //               $validationFlag = false;
        //           };
        //           $str = substr($str, 1);
        //       };
        //   }
    
        //   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        //       $validationList['email'] = 'メールアドレスは正しくご入力ください。';
        //       $validationFlag = false;
        //   };
    
        //   if(strlen($body) == ''){
        //       $validationList['body'] ='お問い合わせ内容は必須入力です。';
        //       $validationFlag = false;
        //   }
            
    
    
    
        //   if($validationFlag){
        //     $body  =str_replace("\n", '<br />', $body);
        //     $_SESSION['name'] = $username; 
        //     $_SESSION['kana'] = $kana; 
        //     $_SESSION['tel'] = $tel;
        //     $_SESSION['email'] = $email; 
        //     $_SESSION['body'] = $body;
    
    
            
    
        //     header("Location: ./confirm.php");
        //     die();
        //   };
        
        // };
    }
}