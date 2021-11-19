<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/control.css">
</head>

<body>
  <div class="control-main">
    <h1 class="control-ttl">管理システム</h1>
    <div class="control-wrapper">
      <form action="/select" method="GET">
        @csrf
        <table class="control-form">
          <tr class="control-form--wrapper">
            <th class="control-form--ttl">お名前</th>
            <td><input type="name" name="fullname"></td>

            <th class="control--gender control-form--ttl">性別</th>
            <td>
              <input id="all" type="radio" name="gender" value="" checked="checked">
              <label for="all" class="radio-label">全て</label>
              <input id="mens" type="radio" name="gender" value="1">
              <label for="mens" class="radio-label">男性</label>
              <input id="women" type="radio" name="gender" value="2">
              <label for="women" class="radio-label">女性</label>
            </td>
          </tr>
          <tr class="control-form--wrapper">
            <th class="control-form--ttl">登録日</th>
            <td>
              <input type="date" name="from">
              <span class="date-between">~</span>
              <input type="date" name="until">
            </td>
          </tr>
          <tr class="control-form--wrapper">
            <th class="control-form--ttl">メールアドレス</th>
            <td><input type="email" name="email"></td>
          </tr>
        </table>
        <button class="research-btn">検索</button>
        <a href="/control" class="reset-link">リセット</a>
      </form>
    </div>



    <!-- 検索結果表示欄 -->
    @if(isset($items))
    <div class="research-wrapper">
      <!-- ページネーション -->
      <div class="pagination-wrapper">
        <p class="pagination-guideline">全{{$items->total()}}件中
          {{($items->currentPage()-1) * $items->perPage()+1}}~
          {{(($items->currentPage()-1) * $items->perPage()+1)+(count($items) -1)}}件
        </p>
        <div>{{$items->links()}}</div>
      </div>


      <form action="/delete" method="POST">
        @csrf
        <table>
          <div class="border">
            <tr class="research-ttl__content">
              <th class="research-ttl research-ttl--id">ID</th>
              <th class="research-ttl research-ttl--fullname">お名前</th>
              <th class="research-ttl research-ttl--gender">性別</th>
              <th class="research-ttl research-ttl--email">メールアドレス</th>
              <th class="research-ttl research-ttl--opinion">ご意見</th>
            </tr>
          </div>
          @foreach($items as $item)
          <tr class="research-item__content">
            <input type="hidden" name="id" value="{{$item->id}}">
            <td class="research-item--id">{{$item->id}}</td>
            <input type="hidden" name="fullname" value="{{$item->fullname}}">
            <td class="research-item--fullname">{{$item->fullname}}</td>
            <input type="hidden" name="gender" value="{{$item->gender}}">
            <td class="research-item--gender">
              @if($item->gender == 1)
              男性
              @else
              女性
              @endif
            </td>
            <input type="hidden" name="email;" value="{{$item->email}}">
            <td class="research-item--email">{{$item->email}}</td>
            <textarea id="opinionTextarea" type="text" name="opinion" cols="30" rows="4" class="opinion">{{$item->opinion}}</textarea>
            <td id="opinion" class="research-item--opinion">{{$item->opinion}}</td>
            <td><button class="delete-btn">削除</button></td>
          </tr>
          @endforeach
        </table>
      </form>

    </div>
    @endif


  </div>

</body>
<script src="js/control.js"></script>

</html>