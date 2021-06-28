
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
    <link rel="stylesheet" href="css/gameStyle.css">
    <title>Bouncy Bird </title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script >
    const user= {
        id: null
    };
    function log(e){
    e.preventDefault();
    $.post("Bouncy_dataBase.php",
    {
      username: $("#name-input").val(),
      password: $("#Pass").val()
      
    },
    function(data, status){
      alert("Data: " + data + "\nStatus: " + status);
      if(status=="success"){
          user.id= JSON.parse(data);
          var id= user.id;
        console.log({id})
        let player_name=document.getElementById("name-input").value

        player_span.innerHTML=("Hi, "+player_name)

        Login.remove()
        document.body.append(Game)
      }
    });
    return false;
}</script>

</head>

<body>

    <nav class="navbar  navbar-dark bg-dark navbar-expand-md ">
        <div class="container ">
            <div class="col text-start ">
                <span class=" text-light navbar-brand h1 mx-2">
            <img src="sprite/bird.png" alt="bird logo" width="50" height="35" >
             Bouncy bird</span>
            </div>
            <div class="col  text-center">
                <span class="text-light" id="player_name"></span>
            </div>
        </div>
    </nav>


 

    <div class="container text-center bg-light" id="Game-Body">
        <canvas id="myCanvas" style="border: 1px solid #000000;"></canvas> 
        <br><button onclick="end_click()">End Game</button>

    </div>

    
    <div  id="Login-Body">
        <form action="#"  onsubmit="return log(event)">
        <h2>
            Login
        </h2>
        <?php include('Bouncy_dataBase.php');?>
        <br><input type="text" placeholder="Username" class="inputs" id="name-input" name="username">
        <br><input type="password" placeholder="Password" class="password-input inputs" id="Pass" name="password">
        <br><input id="input6" type="submit" value="login">
        
        </form>
    
        
    </div>
    <div  id="ScoreBoard">
        <h1>ScoreBoard</h1>
        <div id="boardRecords">
        </div>
      
    </div>

    <script>
        const canv_width = 800;
        const canv_height = 600;

        let c = document.getElementById("myCanvas");
        var ctx = c.getContext("2d");
        ctx.canvas.width = canv_width;
        ctx.canvas.height = canv_height;
    </script>
     <script src="js/login.js"></script>
    <script src="js/key.js"></script>
    <script src="js/score.js"></script>
    <script src="js/bird.js"></script>
    <script src="js/pipe.js"></script>
    <script src="js/physics.js"></script>
    <script src="js/gameScript.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>
</body>

</html>