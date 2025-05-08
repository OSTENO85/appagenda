<body>

    <div class="contenedor-app">
  
        <div class="imagen"></div>
       
        <div class="app">
            <h1 class="nombre-pagina">Login</h1>
            <p class="descripcion-pagina">Inicia sesión con tus datos</p>

            <?php 
             include_once __DIR__ . "/../templates/alertas.php";
            ?>

            <form class="formulario" method="POST" action="/">

                <div class="campo campo-login">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="white" stroke="white" stroke-linecap="round" stroke-linejoin="round" width="32" height="32" stroke-width="2.25"> <path d="M8 7a4 4 0 1 0 8 0a4 4 0 0 0 -8 0"></path> <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2"></path> </svg> 
                    <input type="email" id="email" placeholder="Tu Email" name="email">
                </div>

                <div class="campo campo-login">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="white" stroke-linecap="round" stroke-linejoin="round" width="32" height="32" stroke-width="2.25"> <path d="M5 13a2 2 0 0 1 2 -2h10a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-10a2 2 0 0 1 -2 -2v-6z"></path> <path d="M11 16a1 1 0 1 0 2 0a1 1 0 0 0 -2 0"></path> <path d="M8 11v-4a4 4 0 1 1 8 0v4"></path> </svg> 
                    <input type="password" id="password" placeholder="Tu Password" name="password">
                </div>

                <input type="submit" class="boton botonlogin" value="Iniciar Sesión">

         


            </form>


        </div>
     
    </div>
            
</body>