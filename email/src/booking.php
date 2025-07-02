<?php
    //incluye el archivo wpdb para usar funcionalidades  de wordpress

    define( 'SHORTINIT', true );
    require( '../../../../../wp-load.php' );if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se han recibido los datos del formulario
    if (isset($_POST['travels']) && isset($_POST['tour']) && isset($_POST['fechaincio']) && isset($_POST['fechaopcional']) && isset($_POST['servicio']) && isset($_POST['nombre']) && isset($_POST['viajeros']) && isset($_POST['telefono']) && isset($_POST['detalles']) && isset($_POST['email'])) {
        // Recibir los datos del formulario
        $tour = $_POST['tour'];
        $startDate = $_POST['fechaincio'];
        $optionalDate = $_POST['fechaopcional'];
        $service = $_POST['servicio'];
        $name = $_POST['nombre'];
        $surname = $_POST['apellidos'];
        $travellers = $_POST['viajeros'];
        $phone = $_POST['telefono'];
        $details = $_POST['detalles'];
        $travels = $_POST['travels'];
        $email = $_POST['email'];

        $detailsArray = json_decode($details, true);

        $detailsFormatted = '';
        foreach ($detailsArray as $key => $value) {
            $detailsFormatted .= ucfirst($key) . ': ' . $value . '/';
        }
        

        $travelsArray = json_decode($travels, true);
        $detailsFormatTravels = '';
        $passengerCounter = 1; 

        $customNames = [
            'nombre' => 'Full Name',
            'email' => 'Email',
            'tipo_documento' => 'Document Type',
            'numero_documento' => 'Document Number',
            'fecha_documento' => 'Document Date',
            'pais' => 'Country',
            'genero' => 'Gender',
            'estudiante' => 'Student',
            'restriccion' => 'Restriction',
            'datos_restriccion' => 'Restriction Data'
        ];

        foreach ($travelsArray as $travel) {
            $detailsFormatTravels .= "<table style='width: 100%; display: table; margin-bottom: 20px;'>"; 

            $allData = '';

            if (isset($travel['nombre']) && isset($travel['apellido'])) {
                $fullName = $travel['nombre'] . ' ' . $travel['apellido'];
                $allData .= "<strong>Full Name:</strong> " . $fullName . " / ";
            }

            foreach ($travel as $key => $value) {
                if ($key !== 'nombre' && $key !== 'apellido' && $key !== 'fecha_tavel' && isset($customNames[$key])) {
                    $allData .= "<strong>" . $customNames[$key] . ":</strong> " . $value . " / ";
                }
            }

            $detailsFormatTravels .= "
            <tr style='width: 100%; display: table;'>
                <th scope='col' style='width:35%'><strong>Traveler $passengerCounter</strong></th>
                <td style='width:65%'>" . nl2br($allData) . "</td>
            </tr>";

            $detailsFormatTravels .= "</table>"; 
            $passengerCounter++; 
        }



        $esValido = (
            $tour != '' 
        );
        if ($esValido) {
            $resultado = $wpdb->insert(
                'reservas',
                [    
                    'tour' => $tour,  // Consistencia en el nombre de la variable
                    'fecha_incio' => $startDate,
                    'fecha_opcional' => $optionalDate,
                    'servicio' => $service,
                    'nombre' => $name . ' ' . $surname,
                    'viajeros' => $travellers,
                    'telefono' => $phone,
                    'detalles' => $detailsFormatted,
                    'email' => $email,
                    'travels' => $travels,
                ]
            );
        }        
        
        $to = 'orangenationperu@gmail.com';
        $subject = 'New booking form';
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
                                Booking information
                        </div>
                        <table style="font-size: 14px;width: 100%;
                                    text-align: left;overflow: hidden;">     
                            <thead style="margin-top: 10px;
                                        padding: 8px 0;
                                        display: table-caption;
                                        border-bottom: 1px solid #dee2e6;
                                        width: 100%;">
                                    <tr style="width: 100%;
                                                display: table;
                                                background-color: #f7520a59;
                                                padding: 5px 10px;
                                                text-align: center;
                                                margin: 10px 0;
                                                text-transform: uppercase;">
                                        <th scope="col" style="width:100%">Tour Data</th>
                                    </tr>
                                    <tr style="width: 100%;display: table;">
                                        <th scope="col" style="width:35%">Reserved Tour</th>
                                        <td style="width:65%">'.$tour.'</td>
                                    </tr>
                                    <tr style="width: 100%;display: table;">
                                        <th scope="col" style="width:35%">Initial Travel Date</th>
                                        <td style="width:65%">'.$startDate.'</td>
                                    </tr>
                                    <tr style="width: 100%;display: table;">
                                        <th scope="col" style="width:35%">Optional Travel Date</th>
                                        <td style="width:65%">'.$optionalDate.'</td>
                                    </tr>
                                    <tr style="width: 100%;display: table;">
                                        <th scope="col" style="width:35%">Type of Service</th>
                                        <td style="width:65%">'.$service.'</td>
                                    </tr>
                                    <tr style="width: 100%;display: table;">
                                        <th scope="col" style="width:35%">Number of travelers</th>
                                        <td style="width:65%">'.$travellers.'</td>
                                    </tr>
                                    <tr style="width: 100%;
                                                display: table;
                                                background-color: #f7520a59;
                                                padding: 5px 10px;
                                                text-align: center;
                                                margin: 10px 0;
                                                text-transform: uppercase;">
                                        <th scope="col" style="width:100%">Traveler data</th>
                                    </tr>
                                    <tr style="width: 100%;display: table;">
                                        <td>'.$detailsFormatTravels.'</td>
                                    </tr>
                                    <tr style="width: 100%;
                                                display: table;
                                                background-color: #f7520a59;
                                                padding: 5px 10px;
                                                text-align: center;
                                                margin: 10px 0;
                                                text-transform: uppercase;">
                                        <th scope="col" style="width:100%">CONTACT INFORMATION</th>
                                    </tr>
                                    <tr style="width: 100%;display: table;">
                                        <th scope="col" style="width:35%">Full Name</th>
                                        <td style="width:65%">'.$name.' '.$surname.'</td>
                                    </tr>
                                    
                                    <tr style="width: 100%;display: table;">
                                        <th scope="col" style="width:35%">Email</th>
                                        <td style="width:65%">'.$email.'</td>
                                    </tr>
                                    <tr style="width: 100%;display: table;">
                                        <th scope="col" style="width:35%">Phone</th>
                                        <td style="width:65%">'.$phone.'</td>
                                    </tr>
                                    <tr style="width: 100%;
                                                display: table;
                                                background-color: #f7520a59;
                                                padding: 5px 10px;
                                                text-align: center;
                                                margin: 10px 0;
                                                text-transform: uppercase;">
                                        <th scope="col" style="width:100%">Additional Data</th>
                                    </tr>
                                    <tr style="width: 100%;display: table;">
                                        <th scope="col" style="width:35%">Detalles</th>
                                        <td style="width:65%">'.$detailsFormatted.'</td>
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

        $reserva = 'Booking' . $numeroAleatorio; 
        $headers = 'MIME-Version: 1.0'."\r\n";
        $headers .= 'Content-type: text/html; charset=UTF-8'."\r\n";
        $headers .= 'From: '.$reserva."\r\n";

        $mailSent = mail($to, $subject, $message, $headers);

        if ($mailSent) {
            echo json_encode(array('reservado' => true));
        } else {
            echo json_encode(array('reservado' => false));
        }
    } else {
        echo json_encode(array('success' => false, 'error' => 'No se han recibido todos los campos del formulario.'));
    }
} else {
    echo json_encode(array('success' => false, 'error' => 'No se ha enviado un formulario.'));
}
?>
