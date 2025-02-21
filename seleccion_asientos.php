
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

