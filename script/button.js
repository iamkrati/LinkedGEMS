var p=["o"];
function start_the_service() {
  document.getElementById("chatter-msg").style.opacity=0;
  if (p[0] ==="o") {
    var t  = document.createElement("div");
    var t2  = document.createElement("script");
    t.id = "chat";
    if (window.innerWidth > window.innerHeight) {
      t.style.width="25.6%";
      t.style.left="72%";
      t.style.top="27vh";
      
    } else {
      t.style.width = "92.8%";
    }
    t2.src="script/chat.js";
    document.body.appendChild(t);
    p[0] = "c";
    document.body.appendChild(t2);
    document.getElementById("mn-btn").style.borderRadius = "0px 0px 20px 20px";
  } else {
    document.getElementById('chat').remove();
    p[0] ="o";
    document.getElementById("mn-btn").style.borderRadius = "20px 20px 0px 0px";
  }
}
document.body.onload = function () {
if (window.innerWidth < window.innerHeight) {
  var t = document.getElementById("mn-btnnb");
  t.style.width="94%";
  t.style.left="2vh";
  t.style.top="75vh";
}
console.log("loaded");
}