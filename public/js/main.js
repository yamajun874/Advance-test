const postcord = document.getElementById('postcord');
console.log(postcord);

postcord.addEventListener("change", function () {
  const postcordValue = postcord.value;

  console.log(postcordValue);
  
  const newValue = postcordValue.replace(/[Ａ-Ｚａ-ｚ０-９]/g, function (s) {
    return String.fromCharCode(s.charCodeAt(0) - 65248);
  })
  .replace(/[-－﹣−‐⁃‑‒–—﹘―⎯⏤ーｰ─━]/g, '-');
  
  console.log(newValue);
  postcord.value = newValue;
})


const form = document.getElementById('form');

form.addEventListener('change', update)

function update(e) {
  let type = e.target.type;
  let validationMessage = e.target.validationMessage;
  console.log(type, validationMessage);
}