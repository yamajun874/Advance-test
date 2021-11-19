const opinion = document.getElementById('opinion');
console.log(opinion);

//取得したidの文字列の値をコンソール
console.log(opinion.textContent);

opinion.textContent = omittedContent(opinion.textContent);

// 関数omittedContent定義
function omittedContent(string) {
  const MAX_LENGTH = 25;
  if (string.length > MAX_LENGTH) {
    return string.substr(0, MAX_LENGTH) + '...';
  }
  return string;
}


const opinionTextarea = document.getElementById('opinionTextarea')
console.log(opinionTextarea);

const anotherValue = opinionTextarea.value;
//確認用
console.log(anotherValue);

opinion.addEventListener('mouseover', function () {
  opinion.textContent = anotherValue;
  const reOpinion = document.getElementById('opinion')
  //確認用
  console.log(reOpinion);
  
  reOpinion.addEventListener('mouseout', function () {
    reOpinion.textContent = omittedContent(reOpinion.textContent);
  })
})




