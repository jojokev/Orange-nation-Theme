<?php
// Verificar si se han recibido los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];
    $apellidos = $_POST['apellidos'];
    $mensaje = $_POST['mensaje'];

    // Configurar el destinatario del correo electrónico
    $to = 'orangenationperu@gmail.com';

    // Configurar el asunto del correo electrónico
    $subject = 'Nuevo formulario de contacto';

    // Construir el cuerpo del correo electrónico
    $message = ('
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        </head>
        <body>
            <div style="background-color: #fff;
                        padding: 15px 20px;
                        border-radius: 8px;
                        overflow: hidden;
                        box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
                        border: 1px solid #dee2e6;">
                <div class="py-4 px-3">
                    <div style="text-align:center; background-color:#fff;margin-bottom: 15px">
                        <img src="https://www.orange-nation.com/wp-content/uploads/2018/06/Web_Logo.png" style="width:170px; height:auto;margin:auto;">
                    </div>
                    <div style=" 
                        font-size: 1em;
                        color: #000;
                        text-align: center;
                        text-transform: uppercase;
                        font-weight: 700;
                        padding: 3px;
                        border: 1px solid #ccc;
                        border-radius: 5px;
                        letter-spacing: 0.3em;
                        margin-bottom: 1rem;">
                            INFOMACIÓN DE CONTÁCTO
                    </div>
                    <table style="font-size: 14px;width: 100%;
                                  text-align: left;">
                        <thead style="margin-top: 10px;
                                      padding: 8px 0;
                                      display: table-caption;
                                      border-bottom: 1px solid #dee2e6;
                                      width: 100%;">
                            <tr style="width: 100%;display: table;">
                                <th scope="col" style="width:50%">Nombres Completos</th>
                                <td style="width:50%">'.$nombre.' '.$apellidos.'</td>
                            </tr>
                            <tr style="width: 100%;display: table;">
                                <th scope="col" style="width:50%">Correo Electronico</th>
                                <td style="width:50%">'.$email.'</td>
                            </tr>
                            <tr style="width: 100%;display: table;">
                                <th scope="col" style="width:50%">Telefono</th>
                                <td style="width:50%">'.$telefono.'</td>
                            </tr>
                            <tr style="width: 100%;display: table;">
                                <th scope="col" style="width:50%">Mensaje</th>
                                <td style="width:50%">'.$mensaje.'</td>
                            </tr>
                        </thead>
                    </tbody>
                </table>
                <div style="padding: 15px 0;display:flex; align-items:center; justify-content: space-between">
                    <p style="margin-bottom: 0;">Sent  form Orange Nation (<a style="color:#c9304e; text-decoration: none" href="https://orange-nation.com">https://orange-nation.com</a>)</p>
                </div>
            </div>
        </div>
    </body>
    </html>
    ');

    $numeroAleatorio = rand(0, 100);
    $numeroAleatorio = mt_rand(0, 100);

    $reserva = 'contacto' . $numeroAleatorio; // Corrección aquí
    // Configurar las cabeceras del correo electrónico
    $headers = 'MIME-Version: 1.0'."\r\n";
    $headers .= 'Content-type: text/html; charset=UTF-8'."\r\n";
    $headers .= 'From: '.$reserva."\r\n";
    $headers .= 'Reply-To: ' . $email . "\r\n";

    $mailSent = mail($to, $subject, $message, $headers);

    if ($mailSent) {
        echo json_encode(array('success' => true));
    } else {
        echo json_encode(array('success' => false));
    }
} else {
    echo json_encode(array('success' => false, 'error' => 'No se han recibido todos los campos del formulario.'));
}
?>
