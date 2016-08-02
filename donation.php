<script src="myjs.js"> </script>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Donate</title>
<link href="styles.css" rel="stylesheet" type="text/css">
</head>
<body>
<!--Begin About Section-->
    <div id="about" style="background-color:darkslategrey;">
    	<h1><span style="font-weight:normal">Donate</span></h1>
        <div class="top-divider" style="background-color:#003d66"></div>
                <h2 style = "font-size: 22px;">Would You Like to Donate Anything !!</h2>
                <table class="form-table">
                    <tr>
                        <td>	
							<h2 style = "font-size: 18px;">Yes<input type="radio" name="bb" value="home" onclick="setSelect('yes')" checked></h2>
						</td>
						<td>	
							<h2 style = "font-size: 18px;">No<input  type="radio" name="bb" value="office" onclick="setSelect('no')" ></h2>
						</td>
                    </tr>
                </table>
				<select id="bedroom" onchange="run()">  <!--Call run() function-->
				</select><br><br>
				<div class="top-divider" style="background-color:#003d66"></div>
				<h2 >Shipping Information</h2>
                <table class="form-table" align="center">
                    <tr>
                        <td><h2 style = "font-size: 18px;">Name : <input type ="text" id="name" placeholder="Receiver Name" /></td></h2>
                    </tr>
					 <tr>
                        <td><h2 style = "font-size: 18px;">Address	:<input type="text" id="address" placeholder="Address"  /></td></h2>
                    </tr>
                    <tr>
                        <td><a ><input type="submit" class="button" ame="submit"  value="Submit" onClick="thanks()" /></td>
                    </tr>
                </table>	
    </div>

</body>
</html>