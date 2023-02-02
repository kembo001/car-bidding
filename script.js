var timer = 180;
var timeInterval = setInterval(runTimer,1000);

function runTimer(){
  var timerText = document.getElementById("timer")
  timer -= 1;
  timerText.innerHTML = timer
  if (timer === 0) {
    window.clearInterval(timeInterval)
  }
}

function bid(){
  if (timer > 0) {
    var newname = document.getElementById("newname");
    var newbid = document.getElementById("newbid");
    var winner = document.getElementById("Winner");
    var currentbid = document.getElementById("currentbid");
    var numnewbid = Number(newbid.value);
    var numcurrbid = Number(currentbid.innerHTML);
    
    if (numnewbid > numcurrbid) {
      currentbid.innerHTML = newbid.value;
      winner.innerHTML = newname.value;
    }
    
  }
}
