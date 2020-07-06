<!DOCTYPE html>
<html lang="en-US">
	<head><meta http-equiv="Content-Type" content="text/html" charset="UTF-8">
		
		<title> Natália's Weather Forecast </title>
    <link rel="shortcut icon" href="./img/pv_garage.JPG" />
    <link rel="stylesheet" href="css/index.css" /> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Gloria+Hallelujah&display=swap" /> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Manjari&display=swap" /> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Architects+Daughter&display=swap" />
    <meta name="description" content="Get the weather forecast around the WORLD." />
    <meta name="keywords" content="weather, forecast, city" />
    <meta http-equiv="author" content="Natalia Lucchino" /> 
    <!-- <meta http-equiv="pragma" content="no-cache" /> -->
	</head>
  <body>
    <header>
      <img src="./img/beach2.jpg" alt="Sunny beach" title="A sunny day at the beach" class="img-beach" />
      <h1>PV Weather Forecast</h1>
    </header>
      <aside>
        <nav>
           <h3>Menu</h3>
           <a href="index.html">Home</a>
        </nav>
      </aside>
    <div>  
		  <h2>Welcome to the PV Weather Forecast Site!</h2>
      <br /> 
      <p>Please enter your first name and the city in the form below and then click "submit".</p>
      <br />
                
      <form>
        <label> First name: </br><input type="text" name="firstname" id="firstname" placeholder="First name" /></label><br /><br />
        <label> City: </br><input type="text" name="city" id="city" placeholder="City" required/></label> <br />
        <input type="submit" name="submit" value="Submit" class="button button1" /> <br/> <br />
      </form>
     
     <?php
     $name = $_GET['firstname'];
     $location = $_GET['city'];
     
     $wj = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".urlencode($location)."&units=metric&APPID=da11f466695076dce5edf646a500fbf2");
            $w = json_decode($wj,true);
            $wdata = $w["weather"][0]["description"];
            $wtemp = round($w["main"]["temp"])."°C (".(round($w["main"]["temp_min"]))."°C - ".(round($w["main"]["temp_max"]))."°C).". " The relative humidity in air is " .$w["main"]["humidity"]."%.";
            if($location!=""){$location=$w["name"].", ".$w["sys"]["country"];}
                       
            $req_dump = print_r( $w, true );
                      $fp = file_put_contents( 'weather.log', $req_dump );
         
          if($location!="" AND $name==""){echo '<div class="answer">'.'Stranger, in ' . $location . ' - there is ' . $wdata." and temperature is ".$wtemp .'</div>';}
          elseif($location!=""){echo '<div class="answer">'.$name . ', in ' . $location . ' - there is ' . $wdata." and temperature is ".$wtemp.'</div>';}
                     
      ?>
      </div>
  </body>
  <footer class="page-footer">
        &copy; 2019 PV Garage
  </footer>
</html>