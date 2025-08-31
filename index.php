<!DOCTYPE html>
<html lang="en">
<head>
    <title>madicalstore</title>
    
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>

<body style="background-image:url('img/b.gif');background-size:cover">
<!-- Contact Start -->
    
        <div class="container">
            <div class="row mt-5">
                <div class="col-lg-5 mx-auto mt-5" style="opacity:0.8">
                        <form class="p-4 mt-5 bg-white shadowshadow-lg" action="db.php" method="post">
                            
                            <h1><span class="text-primary">Lo</span>gin</h1>
                            <h4 class="text-danger"><?php if(!empty($msg)) echo $msg;?></h4>
                            <div class="input-group form-group">
                                <span class="input-group-text"><i class="fas fa-user"></i></span>
                                <input name="email" type="email" class="form-control" placeholder="username">
                            </div>
                            <div class="input-group form-group">
                                <span class="input-group-text"><i class="fas fa-key"></i></span>
                                <input name="password" type="password" class="form-control" placeholder="password">
                            </div>
                            <div class="form-group">
                              <input class="btn btn-info form-control" value="login" name="login" type="submit">
                            </div>
                        </form>
                </div>
                
            </div>
        </div>
</body>
</html>