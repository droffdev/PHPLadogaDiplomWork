<?php include("path.php"); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ladoga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
      <!--шапка-->
      <?php include("app/include/header.php"); ?>
        <!--main-->
        <div class="container">
            <div class="contanet row">
                <div class="main-content col-md-9">
                    <h2>Десерты</h2>

                    <div class="post row">
                        <div class="img col-12 col-md-4">
                            <img src="images/karousel2.jpg" alt="" class="img-thumbnail">
                        </div>
                        <div class="post_text col-12 col-md-8">
                            <h3>
                                <a href="#">Блюдо1</a>
                            </h3>
                            <i class="">Горячее</i>
                            <p>
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit...
                            </p>
                            <p style="text-align: center"><input type="button" class="button1" value="Добавить"><input type="button" class="button2" value="Убарть"></p> </p></p>
                        </div>
                    </div>

                    <div class="post row">
                      <div class="img col-12 col-md-4">
                          <img src="images/karousel2.jpg" alt="" class="img-thumbnail">
                      </div>
                      <div class="post_text col-12 col-md-8">
                          <h3>
                              <a href="#">Блюдо1</a>
                          </h3>
                          <i class="">Горячее</i>
                          <p>
                              Lorem ipsum dolor, sit amet consectetur adipisicing elit...
                          </p>
                          <p style="text-align: center"><input type="button" class="button1" value="Добавить"><input type="button" class="button2" value="Убарть"></p> </p></p>
                      </div>
                  </div>

                  
                    
                </div>
            </div>
        </div>
        <!--endmain-->
        <!--FOOTER-->
        <?php include("app/include/footer.php"); ?>
        

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/cc81aa6e53.js" crossorigin="anonymous"></script>
  </body>
</html>