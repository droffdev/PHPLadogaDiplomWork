
<header class="container-fluid">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <h1> <a href="<?php echo BASE_URL ?>">"Ладога"</a></h1>
                </div>
                <nav class="col-8">
                    <ul> 
                        
                        <li><a href="<?php echo BASE_URL . 'hot.php' ?>"><i class="fa-brands fa-hotjar"></i>Горячее</a></li>
                        <li><a href="<?php echo BASE_URL . 'cold.php' ?>"><i class="fa-solid fa-snowflake"></i>Холодные блюда</a></li>
                        <li><a href="<?php echo BASE_URL . 'drink.php' ?>"><i class="fa-solid fa-mug-saucer"></i>Напитки</a></li>
                        <li><a href="<?php echo BASE_URL . 'cake.php' ?>"><i class="fa-solid fa-ice-cream"></i>Десерты</a></li>
                        
                        <li>
                        <?php if (isset($_SESSION['id'])): ?>
                            <a href="#">
                                <i class="fa fa-user"></i>
                                <?php echo $_SESSION['login']; ?>
                            </a>
                            <ul>
                                
                                <?php if ($_SESSION['admin']): ?>
                                    <li><a href="<?php echo BASE_URL . "admin/topics/index.php";?>">Админ панель</a> </li>
                                <?php endif; ?>
                                <li><a href="<?php echo BASE_URL . "logout.php"; ?>">Выход</a> </li>
                            </ul>
                        <?php else: ?>
                            <a href="<?php echo BASE_URL . "log.php"; ?>">
                                <i class="fa fa-user"></i>
                                Войти
                            </a>
                            <ul>
                                <li><a href="<?php echo BASE_URL . "reg.php"; ?>">Регистрация</a> </li>
                            </ul>
                        <?php endif; ?>

                    </li>
                      
                    </ul>
                </nav>
            </div>
        </div>
    </header>