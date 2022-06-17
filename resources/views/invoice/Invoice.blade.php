<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura</title>

    <link rel="stylesheet" href="{{public_path('css/styleinvoice.css')}}">
</head>

<body style=" background-color: #ffffff;">



    <div class="main">
        <img src="./images/trasport.jpg" / height="50" class="logo">
        <h4 style="text-align: center; color: #feb853; font-family: Verdana;">TRANSPORTMINA S.A.</h4>


        <h5 style="text-align: center; color: black; font-family: Verdana;">Factura No.: {{$ventas[0]->factura}}</h5>
        <h5 style="text-align: center; color: black; font-family: Verdana;">Certificación: {{$ventas[0]->certificacion}}</h5>
        <br>
        <h5>Fecha venta: {{$ventas[0]->fecha_venta}}</h5>
        <h5>Cliente: {{$ventas[0]->apellidos}}, {{$ventas[0]->nombres}}</h5>
        <h5>NIT: {{$ventas[0]->nit}}</h5>
        <h5>Dirección: {{$ventas[0]->direccion}}</h5>
        <br>

        <table class="table table-bordered table-striped">
            <tr>
                <td>Producto</td>
                <td>Cantidad</td>
                <td>Precio Individual</td>
                <td>Precio Total</td>
            </tr>
            <tr>
                <td>{{$ventas[0]->producto}} - {{$ventas[0]->unidadmedida}}</td>
                <td>{{$ventas[0]->cant_venta}}</td>
                <td>Q. {{$ventas[0]->precio_venta}}</td>
                <td>Q. {{$ventas[0]->precio_venta*$ventas[0]->cant_venta }}</td>
            </tr>
        </table>
        <h5 style="text-align: right; color: black; font-family: Verdana;">Suma Total: Q. {{$ventas[0]->total_iva + $ventas[0]->total_venta }}</h5>
        <h5 style="text-align: right; color: black; font-family: Verdana;">IVA: Q. {{$ventas[0]->total_iva}}</h5>
        <h5 style="text-align: right; color: black; font-family: Verdana;">Total sin IVA: Q. {{$ventas[0]->total_venta}}</h5>


        <h3 style="text-align: center; color: #feb853; font-family: Verdana;">GRACIAS POR TU COMPRA</h3>





    </div>


</body>

</html>