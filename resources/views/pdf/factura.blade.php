<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura {{ $compra->referencia }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            font-size: 14px;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
        }
        .header h1 {
            margin: 0;
            color: #333;
        }
        .company-info {
            margin-bottom: 20px;
        }
        .invoice-details {
            margin-bottom: 20px;
        }
        .customer-details {
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .totals {
            float: right;
            width: 300px;
        }
        .totals table {
            width: 100%;
        }
        .totals table td {
            border: none;
        }
        .totals table td:last-child {
            text-align: right;
        }
        .footer {
            margin-top: 50px;
            text-align: center;
            font-size: 12px;
            color: #777;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>FACTURA</h1>
        <p>Sistema de Gestión de Inventario</p>
    </div>
    
    <div class="company-info">
        <h3>Información de la Empresa</h3>
        <p>Nombre de la Empresa: Sistema de Gestión de Inventario</p>
        <p>Dirección: Calle Principal #123</p>
        <p>Teléfono: (123) 456-7890</p>
        <p>Email: info@sisgestiondeinventario.com</p>
    </div>
    
    <div class="invoice-details">
        <h3>Detalles de la Factura</h3>
        <p><strong>Número de Factura:</strong> {{ $compra->referencia }}</p>
        <p><strong>Fecha:</strong> {{ $fecha }}</p>
        <p><strong>Estado:</strong> {{ ucfirst($compra->estado) }}</p>
    </div>
    
    <div class="customer-details">
        <h3>Cliente</h3>
        <p><strong>Nombre:</strong> {{ $compra->nombre_cliente }}</p>
        <p><strong>Email:</strong> {{ $compra->email_cliente }}</p>
        <p><strong>Dirección:</strong> {{ $compra->direccion_cliente }}</p>
        <p><strong>Teléfono:</strong> {{ $compra->telefono_cliente }}</p>
    </div>
    
    <h3>Productos</h3>
    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach($detalles as $detalle)
            <tr>
                <td>{{ $detalle->producto->nombre ?? 'Producto #' . $detalle->producto_id }}</td>
                <td>{{ $detalle->cantidad }}</td>
                <td>${{ number_format($detalle->precio, 2) }}</td>
                <td>${{ number_format($detalle->subtotal, 2) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <div class="totals">
        <table>
            <tr>
                <td><strong>Subtotal:</strong></td>
                <td>${{ number_format($subtotal, 2) }}</td>
            </tr>
            <tr>
                <td><strong>IVA (16%):</strong></td>
                <td>${{ number_format($iva, 2) }}</td>
            </tr>
            <tr>
                <td><strong>Total:</strong></td>
                <td>${{ number_format($total, 2) }}</td>
            </tr>
        </table>
    </div>
    
    <div style="clear: both;"></div>
    
    <div class="footer">
        <p>Gracias por su compra. Para cualquier consulta relacionada con esta factura, por favor contáctenos.</p>
        <p>Esta factura fue generada automáticamente y es válida sin firma ni sello.</p>
    </div>
</body>
</html>