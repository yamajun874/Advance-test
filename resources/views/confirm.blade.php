<!-- レイアウトに関して -->
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/confirm.css">

</head>

<body>
  <div class="confirm-form">
    <h1 class="confirm-ttl">確認内容</h1>
    <form action="/register" method="POST">
      @csrf
      <table class="confirm-table">
        <tr>
          <th>お名前</span></th>
          <td class="name">
            <div class="firstName">
              <input type="hidden" name="firstName" value="{{$form['firstName']}}">
              <p>{{$form['firstName']}}</p>
            </div>
            <div class="lastName">
              <input type="hidden" name="lastName" value="{{$form['lastName']}}">
              <p>{{$form['lastName']}}</p>
            </div>
          </td>
        </tr>
        <th>性別</th>
        <td><input type="hidden" name="gender" value="{{$form['gender']}}">
          {{$sex['sex']}}
        </td>
        </tr>
        <tr>
          <th>メールアドレス</th>
          <td>
            <input type="hidden" name="email" value="{{$form['email']}}">
            {{$form['email']}}
          </td>
        </tr>
        <tr>
          <th>郵便番号</th>
          <td>
            <input type="hidden" class="post-input" name="postcord" value="{{$form['postcord']}}">
            {{$form['postcord']}}
          </td>
        </tr>
        <tr>
          <th>住所</th>
          <td>
            <input type="hidden" name="address" value="{{$form['address']}}">
            {{$form['address']}}
          </td>
        </tr>
        <tr>
          <th>建物名</th>
          <td>
            <input type="hidden" name="building_name" value="{{$form['building_name']}}">
            {{$form['building_name']}}
          </td>
        </tr>
        <tr>
          <th>ご意見</th>
          <td>
            <textarea name="opinion" cols="30" rows="4">{{$form['opinion']}}</textarea>
            <p class="opinion-text">{{$form['opinion']}}</p>
          </td>
        </tr>
      </table>
      <button type="submit" class="submit-button">送信</button>
      <button type="submit" class="revise-link" formaction="/revise">修正する</button>
    </form>
  </div>
</body>

</html>