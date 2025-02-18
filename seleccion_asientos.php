<<<<<<< HEAD
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selección de Asientos</title>
    <link rel="stylesheet" href="/css/compratusentradas.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #141414; /* Fondo oscuro */
            color: white; /* Texto blanco */
            padding: 20px;
            margin: 0;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: #1c1c1c;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0,0,0,0.5);
            text-align: center;
        }
        h1 {
            color: #e50914;
            margin-bottom: 20px;
        }
        .screen {
            background-color: #fff;
            height: 50px;
            margin: 20px 0;
            width: 100%;
            text-align: center;
            line-height: 50px;
            color: #000;
            border-radius: 10px;
        }
        .seat {
            width: 40px;
            height: 40px;
            margin: 5px;
            background-color: #444;
            border-radius: 5px;
            display: inline-block;
            cursor: pointer;
            text-align: center;
            line-height: 40px;
            color: white;
            font-size: 20px;
            position: relative;
        }
        .seat.selected {
            background-color: #6feaf6;
        }
        .seat.occupied {
            background-color: #fff;
            cursor: not-allowed;
        }
        .seat-row {
            display: flex;
            justify-content: center;
        }
        .total {
            margin-top: 20px;
            font-size: 20px;
        }
        .btn-pagar {
            background-color: #e50914;
            color: white;
            padding: 15px 10px;
            border: none;
            border-radius: 30px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        .btn-pagar:hover {
            background-color: #c40000;
        }
        .seat-info {
            margin-top: 10px;
            font-size: 18px;
            color: #e50914;
        }
    </style>
    
    <iframe src="header.php" onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>
</head>
<body>
    <div class="container">
        <h1>Selecciona tus Asientos</h1>
        <div class="screen">Pantalla</div>
        <div class="seat-info" id="seatInfo">Pasa el ratón sobre un asiento para ver el número</div>
        <form id="seatsForm" action="carrito.php" method="POST">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "maciflix";

            // Verifica que las credenciales sean correctas
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Verifica si hay errores en la conexión
            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            $sala_id = $_POST['sala'];
            $sql = "SELECT `rows`, `columns` FROM sala WHERE id = $sala_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $rows = $row['rows'];
                $columns = $row['columns'];

                for ($i = 0; $i < $rows; $i++) {
                    echo '<div class="seat-row">';
                    for ($j = 0; $j < $columns; $j++) {
                        $seatNumber = chr(65 + $i) . ($j + 1); // Generar nombre de asiento (ej. A1, B2)
                        echo '<div class="seat" data-seat="' . $seatNumber . '"><i class="fas fa-couch"></i></div>';
                    }
                    echo '</div>';
                }
            } else {
                echo "No se encontraron asientos para esta sala.";
            }

            $conn->close();
            ?>
            <input type="hidden" name="selectedSeats" id="selectedSeats">
            <div class="total">Total: €<span id="total">0</span></div>
            <button type="submit" class="btn-pagar">Pagar Entradas</button>
        </form>
        
    </div>
    <script>
        const seats = document.querySelectorAll('.seat');
        const selectedSeatsInput = document.getElementById('selectedSeats');
        const totalElement = document.getElementById('total');
        const seatInfo = document.getElementById('seatInfo');
        let selectedSeats = [];
        const seatPrice = 12;

        seats.forEach(seat => {
            seat.addEventListener('mouseover', () => {
                const seatNumber = seat.getAttribute('data-seat');
                seatInfo.textContent = `Asiento: ${seatNumber}`;
            });

            seat.addEventListener('mouseout', () => {
                seatInfo.textContent = 'Pasa el ratón sobre un asiento para ver el número';
            });

            seat.addEventListener('click', () => {
                if (!seat.classList.contains('occupied')) {
                    seat.classList.toggle('selected');
                    const seatNumber = seat.getAttribute('data-seat');
                    if (seat.classList.contains('selected')) {
                        selectedSeats.push(seatNumber);
                    } else {
                        selectedSeats = selectedSeats.filter(s => s !== seatNumber);
                    }
                    selectedSeatsInput.value = selectedSeats.join(',');
                    totalElement.textContent = selectedSeats.length * seatPrice;
                }
            });
        });
    </script>
</body>
<iframe src="footer.php" onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>
</html>
=======
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selección de Asientos</title>
    <link rel="stylesheet" href="/css/compratusentradas.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/footer.css">
</head>
<body class="seleccion-asientos">
    <iframe src="header.html" onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>
    <h2 class="subtitulo">Selección de Asientos</h2>

    <div id="contenedor-pelicula" class="contenedor-pelicula">
        <img src alt="Imagen de la película" class="imagen-pelicula">
        <div class="info-pelicula">
            <h2 class="titulo-pelicula">Título de la película</h2>
            <div class="detalles-pelicula">
                <span class="genero">Género: Acción</span>
                <span class="duracion">Duración: 2h 15m</span>
                <span class="calificacion">⭐ 8.5/10</span>
            </div>
        </div>
    </div>

    <body class="botones"> 
        <button class="boton-seleccion-cine">Selección de cine</button>
        <div class="opciones-cine">
            <button class="opcion-cine">Cine 1</button>
            <button class="opcion-cine">Cine 2</button>
        </div>
        
        <div class="entradas-selector">
            <label for="cantidad-entradas">Entradas:</label>
            <input type="number" id="cantidad-entradas" name="cantidad-entradas" min="0" max="10" value="0">
        </div>
        <div class="tipo-entrada-selector">
            <label for="tipo-entrada">Tipo de entrada:</label>
            <select id="tipo-entrada" name="tipo-entrada">
                <option value="basica">Básica (8€)</option>
                <option value="premium">Premium (10€)</option>
            </select>
        </div>
        <div class="total-selector">
            <label for="total">Total:</label>
            <input type="text" id="total" name="total" readonly>
        </div>

        <div class="sala-de-cine" id="sala-de-cine" > 
            <h3>Selecciona tu asiento:</h3>
            <div class="asientos-container">
                
            </div>
            <button class="confirmar-asiento" id="confirmar-asiento" disabled>Confirmar Asientos</button>
        </div>
        
    

        <button id="boton-finalizar-compra" onclick="location.href='metododepago.html'">Finalizar compra</button>
    </body>

    <script src="/js/java.js"></script>
    <iframe src="footer.html" onload="this.before((this.contentDocument.body||this.contentDocument).children[0]);this.remove()"></iframe>
</body>
>>>>>>> bad8819ace5771dd5e0995180e6aa44ff1d3d4a8
