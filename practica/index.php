<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Web</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="header">
        <div class="menu container">
            <a href="#" class="logo">logo</a>
            <input type="checkbox" id="menu"/>
            <label for="menu">
                <img src="images/menu.png" class="menu-icono" alt="menu">
            </label>
            <nav class="navbar">
                <ul>
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">Nosotros</a></li>
                    <li><a href="#">Servicios</a></li>
                    <li><a href="#">Contacto</a></li>
                    <li><a href="medicos.php">Reporte</a></li>
                </ul>
            </nav>
        </div>

        <div class="header-content container">
            <div class="header-txt">
                <h1>Medical center</h1>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolores odit vitae aspernatur corporis dolorum nemo totam inventore error repudiandae? 
                    Recusandae magnam quam sequi quos nemo nulla ipsum natus laboriosam asperiores.
                </p>
                <a href="#" class="btn-1">Informacion</a>
            </div>
            <div class="header-img">
                <img src="images/left.png" alt="imagen">
            </div>
        </div>
    </header>

    <section class="about container">
        <div class="about-img">
            <img src="images/about.png" alt="imagen">
        </div>
        <div class="about-txt">
            <h2>Nosotros</h2>
            <p>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deserunt, eveniet mollitia cum sapiente labore quidem et repudiandae, obcaecati libero ipsa nulla animi quas esse nobis quod eaque ullam eius laboriosam?
            </p>
            <br>
            <p>
                Lorem ipsum dolor sit amet consectetur, adipisicing elit. Deserunt, eveniet mollitia cum sapiente labore quidem et repudiandae, obcaecati libero ipsa nulla animi quas esse nobis quod eaque ullam eius laboriosam?
            </p>
        </div>
    </section>

    <main class="services">
        <h2>Servicios</h2>
        <div class="services-content container">
            <div class="service-1">
                <i class="fa-sharp fa-solid fa-hospital-user"></i>
                <h3>Pediatria</h3>
            </div>
            <div class="service-1">
                <i class="fa-sharp fa-solid fa-spa"></i>
                <h3>Dermatologia</h3>
            </div>
            <div class="service-1">
                <i class="fa-solid fa-heart-pulse"></i>
                <h3>Cardiologia</h3>
            </div>
            <div class="service-1">
                <i class="fa-solid fa-teeth"></i>
                <h3>Odontologia</h3>
            </div>
        </div>
    </main>

    <section class="formulario container">
        <form method="post" autocomplete="off">
            <h2>Agenda Consulta</h2>
            <div class="input-group">
                <div class="input-container">
                    <input type="text" name="name" placeholder="Nombre y Apellido">
                    <i class="fa-solid fa-user"></i>
                </div>
                <div class="input-container">
                    <input type="tel" name="phone" placeholder="Telefono/Celular">
                    <i class="fa-solid fa-phone"></i>
                </div>
                <div class="input-container">
                    <input type="email" name="email" placeholder="Correo">
                    <i class="fa-solid fa-envelope"></i>
                </div>
                <div class="input-container">
                    <textarea name="message" placeholder="Detalles de la consulta"></textarea>
                </div>
                <input type="submit" name="send" class="btn" onClick="myFunction()">
            </div>
        </form>
    </section>

    <footer class="footer">
        <div class="footer-content container">
            <div class="link">
                <a href="#" class="logo">logo</a>
            </div>
            <div class="link">
                <ul>
                    <li><a href="#">Inicio</a></li>
                    <li><a href="#">Nosotros</a></li>
                    <li><a href="#">Servicios</a></li>
                    <li><a href="#">Contacto</a></li>
                    <li><a href="reporte.php">Reporte</a></li>
                </ul>
            </div>
        </div>
    </footer>

    <?php
        include("send.php")
    ?>
    <script>
        function myFunction(){
            window.location.href="http://localhost/practica"
        }
    </script>
</body>
</html>
