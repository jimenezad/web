<!DOCTYPE html>
<html lang="en">
	<head>
	<meta charset="utf-8">
	<title>Feedback Form</title>
	<style type="text/css">
	body *{
        font-family: Arial, Helvetica, sans-serif;
        font-size:15px;
    }
    div.container{
        width:300px;
        min-height: 400px;
        margin: 0px auto;
        border-radius:20px;
        padding-top:10px;
        border:1px solid black;
    }
    ul{
        list-style-type: none;
    }
    li{
        margin-top:10px;
    }
    textarea{
      
        resize:none;
    }
	</style>
	</head>
	<body>
        <div class="container">
            <form action="result.php" method="POST">
                <ul>
                <li><h1>Feedback Form</h1>
                <li><label for="name">Your Name(optional):</label>
                <li><input type="name" name="name">
                <li><label for="course">Course Title:</label>
                <li><select name="course" class="course">
                        <option value="webfun">Web Fundamentals</option>
                        <option value="phptrack">PHP Track</option>
                    </select>
                <li><label for="score">Given Score (1-10):</label>
                <li><select name="score" class="score">
                        <option value="one">1</option>
                        <option value="two">2</option>
                        <option value="three">3</option>
                        <option value="four">4</option>
                        <option value="five">5</option>
                        <option value="six">6</option>
                        <option value="seven">7</option>
                        <option value="eight">8</option>
                        <option value="nine">9</option>
                        <option value="ten">10</option>
                    </select>     
                <li><label for="reason">Reason:</label>
                <li><textarea type="reason" name="reason"></textarea>
                <li><input type="submit">
                </ul>
	        </form>
        </div>      
	</body>
</html>