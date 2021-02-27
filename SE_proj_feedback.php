<?php
    $server="localhost";
    $username="root";
    $password="";
    $database="usercomplaints";
    $conn=mysqli_connect($server,$username,$password,$database);
    if(!$conn)
    {
        die("Connection Failed ". mysqli_connect_error());
    }
?>
<html>
    <head>
        <title>Real governance-feedback</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script>
            function validateForm()
            {
                var name=form.name;
                var location=form.location;
                var subject=form.subject;
                var feedback=form.feedback;
                if(name.value=="")
                {
                    window.alert("Please enter your name!");
                    name.focus();
                    return false;
                }
                if(location.value=="")
                {
                    window.alert("Please enter your location!");
                    location.focus();
                    return false;
                }
                if(subject.value=="")
                {
                    window.alert("Please enter your subject!");
                    subject.focus();
                    return false;
                }
                if(feedback.value=="")
                {
                    window.alert("Please enter your feedback!");
                    feedback.focus();
                    return false;
                }
                return true;
            }
        </script>
        <style>
            body{
                background-color: midnightblue;
                color: midnightblue;
                font-family: 'Raleway', sans-serif;
            }
            #header{
                background-color: darkturquoise;
                text-align-last: center;
                color: midnightblue;
                padding-top: 30px;
                padding-bottom: 30px;
                box-shadow: 0 15px 10px -10px rgba(31, 31, 31, 0.5);
            }
            #footer{
                background-color: darkturquoise;
                text-align-last: center;
                color: midnightblue;
            }
            #input{
                padding: 12px 20px;
                margin: 8px 0;
                box-sizing: border-box;
            }  
            .card{
                border-radius: 4px;
                background: #fff;
                box-shadow: 0 6px 10px rgba(0,0,0,.08), 0 0 6px rgba(0,0,0,.05);
                transition: .3s transform cubic-bezier(.155,1.105,.295,1.12),.3s box-shadow,.3s -webkit-transform cubic-bezier(.155,1.105,.295,1.12);
                padding: 14px 80px 18px 36px;
                cursor: pointer;
            }
            .card:hover{
                transform: scale(1.05);
                box-shadow: 0 10px 20px rgba(0,0,0,.12), 0 4px 8px rgba(0,0,0,.06);
            }
            
            .card h3{
                font-weight: 600;
            }
            
            .card img{
                position: absolute;
                top: 20px;
                right: 15px;
                max-height: 120px;
            }
            .card-2{
                background-image: url(https://ionicframework.com/img/getting-started/components-card.png);
                background-repeat: no-repeat;
                background-position: right;
                background-size: 80px;
            }
            @media(max-width: 990px){
                .card{
                    margin: 20px;
                }
            } 
        </style>
    </head>
    <body>
        <div id="header">
            <p style="font-size: 50px;"><b>We would love to hear from you</b></p>
        </div>
        <br><br>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="card card-2">
                        <form method="post" action="SE_proj_feedback.php" name="form" onsubmit="return validateForm();">
                            <div>
                                <label>Name</label><br>
                                <input id="input" type="text" name="name" id="name" placeholder="name">
                            </div>
                            <div>
                                <label>Location</label><br>
                                <input id="input" type="text" name="location" id="location" placeholder="location">
                            </div>
                            <div>
                                <label>Subject</label><br>
                                <input id="input" type="text" name="subject" class="subject" id="subject" placeholder="subject">
                            </div>
                            <div>
                                <label>Feedback</label><br>
                                <input id="input" type="textarea" name="feedback" class="feedback" id="feedback" placeholder="feedback">
                            </div>
                            <button type="submit" class="submit" id="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
        <div id="footer">
            <p>Made with <span style="color: red;">&hearts;</span> in India</p>
            <p>&copy;copyright2020</p>
        </div>
    </body>
</html>
<?php
    if(isset($_POST['name']))
    {
        $name=$_POST['name'];
        $location=$_POST['location'];
        $subject=$_POST['subject'];
        $feedback=$_POST['feedback'];
        $sql1="INSERT INTO feedback(name,location,problem,feedback)
        VALUES('$name','$location','$subject','$feedback')";
        if(mysqli_query($conn,$sql1))
        {
            echo "<h1>Feedback Taken!!!</h1><br><br>";
        }
        else
        {
            echo "Error" . mysqli_error($conn);
        }
    }
    mysqli_close($conn);
?>