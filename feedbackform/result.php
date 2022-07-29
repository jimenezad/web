
<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="utf-8">
	<title>Result Form</title>
	<style type="text/css">
	body *{
        font-family: Arial, Helvetica, sans-serif;
        font-size:15px;
    }
    div.container{
        width:300px;
        min-height: 250px;
        margin: 0px auto;
        border-radius:20px;
        padding-top:10px;
        padding-right:20px;
        border:1px solid black;
    }
    ul{
        list-style-type: none;
    }
    li{
        margin-top:10px;
    }
    li.textarea{
        
    }
	</style>
	</head>
	<body>
        <div class="container">
                <ul>
                <li><h1>Submitted Entry</h1>
                <li>Your Name(optional) : <?=$_POST['name']?>
                <li>Course Title        : <?=$_POST['course']?>       
                <li>Given Score         : <?=$_POST['score']?>  
                <li>Reason              : <?=$_POST['reason']?>
                <li><form action="">
                    <input type="submit" value="Return">
                    </form>
                </ul>
	        </form>
        </div>      
	</body>
</html>