<?php include("path.php");
      include ("db.php");
 ?>

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
        <!--карусель-->
        <div class="container">
            <div class="row">

                <h2 class="slider-title">Добро пожаловать!</h2>
                <div class="section search">
                  <h3 class="slider-title2">Поиск <form action="/" method="post">
                    <input type="text" name="search-term" class="text-input" placeholder="Введите искомое слово">
                  </form>
                  </h3>
                  
                </div>
            </div>
         <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="false">
            
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="images/karosel1.jpeg" class="d-block w-100" alt="...">
                <div class="carousel-caption-hack carousel-caption d-none d-md-block">
                  <h5>Для заказа перейдите в разделы меню!</a></h5>
                  
                </div>
              </div>
              <div class="carousel-item">
                <img src="images/karousel2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption-hack carousel-caption d-none d-md-block">
                  <h5>В конце нашего круиза вас ждет капитанский ужин!</h5>
                  
                </div>
              </div>
              <div class="carousel-item">
                <img src="images/karousel3.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption-hack carousel-caption d-none d-md-block">
                  <h5>Шведский стол на завтрак</h5>
                  
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
        <!--конец карусели-->
        <!--main-->
        <!--endmain-->
        <!--FOOTER-->
        <?php include("app/include/footer.php"); ?>
        

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/cc81aa6e53.js" crossorigin="anonymous"></script>
  </body>
</html>