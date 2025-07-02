<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['tour']) && isset($_POST['nombre']) && isset($_POST['email']) && isset($_POST['codigo']) && isset($_POST['numero']) && isset($_POST['pais']) && isset($_POST['fechaviaje']) && isset($_POST['servicio']) && isset($_POST['fechaviaje2']) && isset($_POST['viajeros']) && isset($_POST['hotel'])) {
        
        $toursJSON = $_POST['tour'];
        $stardate = $_POST['fechaviaje'];
        $optionalDate = $_POST['fechaviaje2'];
        $typetours = $_POST['servicio'];
        $fullname = $_POST['nombre'];
        $numTravellers = json_decode($_POST['viajeros'], true);
        $codnumber = $_POST['codigo'];
        $number_phone = $_POST['numero'];
        $pais = $_POST['pais'];
        $email = $_POST['email'];
        $hotel = json_decode($_POST['hotel'], true);

        // Decode the JSON string into an array
        $toursArray = json_decode($toursJSON, true);
        $tourDetails = '';

        if (json_last_error() === JSON_ERROR_NONE && is_array($toursArray)) {
            foreach ($toursArray as $index => $tour) {
                $tourDetails .= 'Tour ' . ($index + 1) . ': ' . htmlspecialchars($tour['nombre'], ENT_QUOTES, 'UTF-8') . '<br>' ;
            }
        } else {
            $tourDetails = '<tr style="width: 100%; display: table;">
                                <td colspan="2">Invalid tour data.</td>
                            </tr>';
        }
        $travellerInfo = "Adults: " . $numTravellers['adults'] . ", Children: " . $numTravellers['children'] . ", Infants: " . $numTravellers['infants'];
        
        $hotelInfo = "Type of hotel: " . $hotel['tipo_hotel'] . " star , Room type: " . $hotel['tipo_habitacion'] . ", Aditional: " . $hotel['adicional'];

        $to = 'orangenationperu@gmail.com';
        $subject = 'FORM CREATE YOUR PACKAGE';
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
                            border-radius: 8px;
                            overflow: hidden;
                            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
                            border: 1px solid #dee2e6;">
                    <div class="py-4 px-3">
                        <div style="text-align:center; background-color:#fff;margin: 21px 0 13px">
                            <img src="https://www.orange-nation.com/wp-content/uploads/2018/06/Web_Logo.png" style="width:180px; height:auto;margin:auto;">
                        </div>
                        <div style=" 
                            font-size: 1em;
                            color: #000;
                            text-align: center;
                            text-transform: uppercase;
                            font-weight: 800;
                            padding: 5px;
                            border-top: 1px solid #ccc;
                            border-bottom: 1px solid #ccc;
                            letter-spacing: 0.2em;
                            margin-bottom: 1rem;">
                                Booking information
                        </div>
                        <table style="font-size: 14px;width: 100%;
                                      text-align: left;">
                            <thead style="margin-top: 10px;
                                          padding: 8px 0;
                                          display: table-caption;
                                          border-bottom: 1px solid #dee2e6;
                                          width: 100%;">
                                <tr style="width: 100%;display: table;border-bottom: 1px solid #ccc;padding: 15px 20px;">
                                    <th scope="col" style="width:40%">Selected tours</th>
                                    <td style="width:60%">' . $tourDetails . '</td>
                                </tr>
                                <tr style="display: flex;
                                    border-bottom: 1px solid #ccc;
                                    border-top: 1px solid #ccc;
                                    font-weight: 800;
                                    font-size: 14px;
                                    text-transform: uppercase;
                                    letter-spacing: 0.2em;
                                    padding: 8px;
                                    justify-content: center;">
                                    <th colspan="2" style="width: 100%;text-align: center;font-weight: 800;">Contact information demo</th>
                                </tr> 
                                <tr style="width: 100%;display: table;padding: 15px 20px 0px">
                                    <th scope="col" style="width:40%">Full Name</th>
                                    <td style="width:60%">' . htmlspecialchars($fullname, ENT_QUOTES, 'UTF-8') . '</td>
                                </tr>
                                <tr style="width: 100%;display: table;padding: 15px 20px 0px">
                                    <th scope="col" style="width:40%">E-mail</th>
                                    <td style="width:60%">' . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . '</td>
                                </tr>
                                <tr style="width: 100%;display: table;padding: 15px 20px 0px">
                                    <th scope="col" style="width:40%">Phone</th>
                                    <td style="width:60%">' . htmlspecialchars($codnumber, ENT_QUOTES, 'UTF-8') . ' ' . htmlspecialchars($number_phone, ENT_QUOTES, 'UTF-8') . '</td>
                                </tr>
                                <tr style="width: 100%;display: table;padding: 15px 20px">
                                    <th scope="col" style="width:40%">Country</th>
                                    <td style="width:60%">' . htmlspecialchars($pais, ENT_QUOTES, 'UTF-8') . '</td>
                                </tr>
                                <tr style="display: flex;
                                border-bottom: 1px solid #ccc;
                                border-top: 1px solid #ccc;
                                font-weight: 800;
                                font-size: 14px;
                                text-transform: uppercase;
                                letter-spacing: 0.2em;
                                padding: 8px;
                                justify-content: center;">
                                    <th colspan="2" style="width: 100%;text-align: center;font-weight: 800;">Trip data</th>
                                </tr> 
                                <tr style="width: 100%;display: table;padding: 15px 20px 0px;">
                                    <th scope="col" style="width:40%">Star Date</th>
                                    <td style="width:60%">' . htmlspecialchars($stardate, ENT_QUOTES, 'UTF-8') . '</td>
                                </tr>
                                <tr style="width: 100%;display: table;padding: 15px 20px 0px">
                                    <th scope="col" style="width:40%">Optional Date</th>
                                    <td style="width:60%">' . htmlspecialchars($optionalDate, ENT_QUOTES, 'UTF-8') . '</td>
                                </tr>
                                <tr style="width: 100%;display: table;padding: 15px 20px 0px">
                                    <th scope="col" style="width:40%">Type of service</th>
                                    <td style="width:60%">' . htmlspecialchars($typetours, ENT_QUOTES, 'UTF-8') . '</td>
                                </tr>
                                <tr style="width: 100%;display: table;padding: 15px 20px 0px">
                                    <th scope="col" style="width:40%">Number of travel</th>
                                    <td style="width:60%">' . htmlspecialchars($travellerInfo, ENT_QUOTES, 'UTF-8') . '</td>
                                </tr>
                                <tr style="width: 100%;display: table;padding: 15px 20px">
                                    <th scope="col" style="width:40%">Hotel</th>
                                    <td style="width:60%">' . htmlspecialchars($hotelInfo, ENT_QUOTES, 'UTF-8') . '</td>
                                </tr>
                            </thead>
                        </table>
                        <div style="padding: 20px;display:flex; align-items:center; justify-content: space-between">
                            <p style="margin: 0;">Sent form Orange Nation (<a style="color:#c9304e; text-decoration: none" href="https://orange-nation.com">https://orange-nation.com</a>)</p>
                        </div>
                    </div>
                </div>
            </body>
            </html>
        ');

        $numeroAleatorio = mt_rand(0, 100);
        $reserva = 'Package' . $numeroAleatorio;

        // Configurar las cabeceras del correo electrónico
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";
        $headers .= 'From: ' . $reserva . "\r\n";

        $mailSent = mail($to, $subject, $message, $headers);

        if ($mailSent) {
            echo json_encode(array('reservado' => true));
        } else {
            echo json_encode(array('reservado' => false));
        }
    } else {
        echo json_encode(array('reservado' => false, 'error' => 'No se han recibido todos los campos del formulario.'));
    }
} else {
    echo json_encode(array('reservado' => false, 'error' => 'No se ha enviado un formulario.'));
}
?>
