<?php
if (!isset($_GET["id"])) {
    exit("No hay id");
}
$id = $_GET["id"];
include_once "base_de_datos.php";
$sentencia = $base_de_datos->prepare("SELECT id, fecha, total FROM ventas WHERE id = ?");
$sentencia->execute([$id]);
$venta = $sentencia->fetchObject();
if (!$venta) {
    exit("No existe venta con el id proporcionado");
}

$setenciaservicios = $base_de_datos->prepare("SELECT v.nomservicio, v.descripcion, v.precio, vv.cantidad
FROM servicios v
INNER JOIN 
servicios_vendidos vv
ON v.id = vv.id_servicio
WHERE vv.id_venta = ?");
$setenciaservicios->execute([$id]);
$servicios = $setenciaservicios->fetchAll();
if (!$servicios) {
    exit("No hay servicios");
}

?>
<style>
    * {
        font-size: 20px;
        font-family: 'Times New Roman';
    }

    td,
    th,
    tr,
    table {
        border-top: 1px solid black;
        padding-top: 10px;
        padding-bottom: 10px;
        border-collapse: collapse;
    }

    td.servicio,
    th.servicio {
        width: 80px;
        max-width: 80px;
    }

    td.cantidad,
    th.cantidad {
        padding-left: 45px;
        width: 150px;
        max-width: 150px;
        word-break: break-all;
    }

    td.precio,
    th.precio {
        width: 130px;
        max-width: 130px;
        word-break: break-all;
        text-align: right;
    }

    .centrado {
        text-align: center;
        align-content: center;
    }

    .ticket {
        width: 700px;
        max-width: 700px;
    }

    img {
        border-radius: 50%;
        max-width: 100px;
        width: 100px;
    }

    @media print {

        .oculto-impresion,
        .oculto-impresion * {
            display: none !important;
        }
    }
</style>

<body>
    <div class="ticket">
        <h1 style="color: gray;">BC</h1>
        <img src="logo.png" alt="Lo Siento">
        <h1>Beauty Corner</h1>
        <p class="centrado">TICKET DE VENTA
            <br><?php echo $venta->fecha; ?>
        </p>
        <table>
            <thead>
                <tr>
                    <th class="servicio">CANT</th>
                    <th class="precio">SERVICIO</th>
                    <th class="cantidad">DESCRIPCIÓN</th>
                    <th class="precio">PRECIO</th>
                    <th class="precio">TOTAL</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total = 0;
                foreach ($servicios as $servicio) {
                    $subtotal = $servicio->precio * $servicio->cantidad;
                    $total += $subtotal;
                ?>
                    <tr>
                        <td class="servicio"><?php echo $servicio->cantidad;  ?></td>
                        <td class="precio"><?php echo $servicio->nomservicio;  ?> </td>
                        <td class="cantidad">  <?php echo $servicio->descripcion;  ?></td>
                        <td class="precio"><strong>$<?php echo number_format($servicio->precio, 2) ?></strong></td>
                        <td class="precio">$<?php echo number_format($subtotal, 2)  ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="2" style="text-align: right;">TOTAL</td>
                    <td class="precio">
                        <strong>$<?php echo number_format($total, 2) ?></strong>
                    </td>
                </tr>
            </tbody>
        </table>
        <p class="centrado">¡GRACIAS POR SU COMPRA!
        </p>
    </div>
</body>


<script>
    document.addEventListener("DOMContentLoaded", () => {
        window.print();
        setTimeout(() => {
            window.location.href = "./ventas.php";
        }, 1000);
    });
</script>