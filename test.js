<html>
  <head>
    <title></title>
  </head>
  <body>
    <h1>yay</h1>
    <script >
    alert('yay');
      var totalGen = 19;
var totalMW = 0;
var smallMW = 62;
var bigMW = 124;
for(var currentGen = 0; totalGen <= currentGen; currentGen++){
	var even = currentGen % 2;
  if(currentGen <= 4){
  	if(even == 0){
	  	totalMW += smallMW;
  	 	console.log("Generator #"+ currentGen + " is on, adding " + smallMW + " MW, for a total of " + totalMW + "MW!");
    }else{
    	console.log("Generator #" + currentGen + " is off.");
    }
  }else{
    	if(even == 0){
	  	totalMW += smallMW;
  	 	console.log("Generator #"+ currentGen + " is on, adding " + bigMW + " MW, for a total of " + totalMW + "MW!");
    }else{
    	console.log("Generator #" + currentGen + " is off.");
    }
    }
  }


    </script>
  </body>
</html>
