<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/style.css">

  <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
  

</head>


<body>
  <div class="contact-form">
    <h1 class="contact-ttl">お問い合わせ</h1>
    <form action="/create" method="POST" id="form">
      @csrf
      <table class="contact-table">
        <tr>
          <th>お名前<span class="required-logo">※</span></th>
          <td class="name">
            <div class="firstName">
              <input type="name" name="firstName" @if(isset($firstName)) value="{{$firstName}}" @endif>
              <span class="example-word">例）山田</span><br>
            </div>
            <div class="lastName">
              <input type="name" name="lastName" @if(isset($lastName)) value="{{$lastName}}" @endif>
              <span class="example-word">例）太郎</span>
            </div>
          </td>
        </tr>
        @error('firstName')
        <tr class="error">
          <th></th>
          <td>{{$message}}</td>
        </tr>
        @enderror
        @error('lastName')
        <tr class="error">
          <th></th>
          <td>{{$message}}</td>
        </tr>
        @enderror
        <tr>
          <th>性別<span class="required-logo">※</span></th>
          <td>
            <input id="mens" type="radio" name="gender" value="1" checked="checked">
            <label for="mens" class="radio-label">男性</label>
            <input id="women" type="radio" name="gender" value="2" @if(isset($gender)) {{$gender == 2 ? "checked" : ""}} @endif>
            <label for="women" class="radio-label">女性</label>
          </td>
        </tr>
        @error('gender')
        <ul class="error">
          <li>{{$message}}</li>
        </ul>
        @enderror
        <tr>
          <th>メールアドレス<span class="required-logo">※</span></th>
          <td>
            <input type="email" name="email" @if(isset($email)) value="{{$email}}" @endif>
            <span class="example-word">例）test@example.com</span>
          </td>
        </tr>
        @error('email')
        <tr class="error">
          <th></th>
          <td>{{$message}}</td>
        </tr>
        @enderror

        <tr>
          <th>郵便番号<span class="required-logo">※</span></th>
          <td>
            <div class="post">
              <span class="post-logo">〒</span>
              <input id="postcord" type="text" class="post-input" name="postcord" onKeyUp="AjaxZip3.zip2addr(this,'','address','address');" @if(isset($postcord)) value="{{$postcord}}" @endif>

            </div>
            <span class="post-example-word">例）123-4567</span>
          </td>
        </tr>
        @error('postcord')
        <tr class="error">
          <th></th>
          <td>{{$message}}</td>
        </tr>
        @enderror
        <tr>
          <th>住所<span class="required-logo">※</span></th>
          <td>
            <input id="address" type="text" name="address" @if(isset($address)) value="{{$address}}" @endif>
            <span class="example-word">例）東京都渋谷区千駄ヶ谷1-2-3</span>
          </td>
        </tr>
        @error('address')
        <tr class="error">
          <th></th>
          <td>{{$message}}</td>
        </tr>
        @enderror
        <tr>
          <th>建物名</th>
          <td>
            <input type="text" name="building_name" @if(isset($building_name)) value="{{$building_name}}" @endif>
            <span class="example-word">例）千駄ヶ谷マンション101</span>
          </td>
        </tr>
        <tr>
          <th>ご意見<span class="required-logo">※</span></th>
          <td>
            <textarea type="text" name="opinion" cols="30" rows="4">@if(isset($opinion)){{$opinion}}@endif</textarea>
          </td>
        </tr>
        @error('opinion')
        <tr class="error">
          <th></th>
          <td>{{$message}}</td>
        </tr>
        @enderror
      </table>
      <button class="form-button">確認</button>
    </form>
  </div>


</body>
<script src="js/main.js"></script>


</html>