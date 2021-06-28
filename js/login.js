

var Game=document.getElementById("Game-Body")
Game.remove()
var board=document.getElementById("ScoreBoard")
board.remove()
var Login=document.getElementById("Login-Body")
var player_span =document.getElementById("player_name")


 function users_output(users){
     var recordsParentDev= document.getElementById("boardRecords");
     recordsParentDev.innerHTML= "";
     users.forEach(user => {
         var userRow= `<div class="name">${user.username}</div><div class="score">${user.BestScore}</div>`;
         var newDiv= document.createElement('div');
         newDiv.className= "row"
         newDiv.innerHTML= userRow;
         console.log({newDiv})

         console.log({userRow})
         recordsParentDev.appendChild(newDiv);
     })
 }

function end_click(){
    var id= user.id;
    
    var currentScore= score.value;
    console.log({currentScore})
    console.log({id})
    $.post("ScoreUpdate.php",
    {
      id: id,
      score: currentScore
    },
    function(data, status){
        Game.remove()
        document.body.append(board)
          var users= JSON.parse(data);
        users_output(users);
    });
}
