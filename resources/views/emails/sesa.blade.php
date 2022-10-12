
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SESA APP</title>

    <style>
        body{
            background: rgb(158, 158, 158);
        }

        span{
            color: rgb(6, 13, 219);
        }

        h1{
            text-align: center;
        }

    </style>
</head>

<body>

    <div>

        <h1>{{ $mailData['title'] }}</h1>

        <p>{{ $mailData['body'] }}</p>
    
       
    
        <p>Welcome to <span>SASEDIGITAL</span></p>

    </div>

  

</body>
</html>

