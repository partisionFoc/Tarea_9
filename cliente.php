<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>DWES: Tarea 9</title>
        <link rel="stylesheet" type="text/css" href="estilos.css">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                //Cada 10 segundos (10000 milisegundos) se ejecutará la función refrescar
                setTimeout(refrescar, 10000);
            });
            function refrescar(){
                //Actualiza la página
                location.reload();
            }
        </script>
    </head>
    <body>
        <h1> Chistes y Gatos </h1>
        <?php
            /**
             * Página HTML que muestra un chiste y una imagen de un gato.
             *
             * Esta página realiza peticiones a dos APIs diferentes para obtener un chiste y una imagen de gato,
             * y luego los muestra en la página.
             *
             * @author Álvaro Ponce de León Cabezas
             */
            
            /**
             * Realiza una petición a la API de chistes y obtiene un chiste en formato JSON.
             *
             * @return string JSON con la información del chiste.
             */
            $broma_json = file_get_contents('https://v2.jokeapi.dev/joke/Any?lang=es&type=single');
            /**
             * Convierte el JSON de la API de chistes en un objeto PHP.
             *
             * @var stdClass $broma Objeto que contiene la información del chiste.
             */
             // Se decodifica el fichero JSON y se convierte a objeto
            $broma = json_decode($broma_json);

            /**
             * Realiza una petición a la API de gatos y obtiene una imagen de gato en formato JSON.
             *
             * @return string JSON con la información de la imagen del gato.
             */
            $gato_json = file_get_contents('https://api.thecatapi.com/v1/images/search');
            /**
             * Convierte el JSON de la API de gatos en un array PHP.
             *
             * @var array $gato Array que contiene la información de la imagen del gato.
             */
            $gato = json_decode($gato_json,true);
            /**
             * URL de la imagen del gato obtenida de la API.
             *
             * @var string $url_gato URL de la imagen del gato.
             */
            $url_gato = $gato[0]['url'];
        ?>
        <div class="broma-container">
            <p><cite><?php echo $broma->joke; ?></cite></p>
        </div>
        <div class="image-container">
            <?php echo '<img src="' . $url_gato . '" alt="Imagen de gato">'?>
        </div>
        <footer>
        <p>El propietario de esta página no se hace responsable de la poca gracia que tienen los chistes</p>
    </footer>
    </body>
</html>
