<?php
   //requerimos la conexión a la bd
   require 'conexion.php';
   //ejecutamos la consulta para obtener el total de registro de los clientes
   $sql_clientes = "SELECT COUNT(*) as total_registros FROM clientes";
   //almacenamos el resultado
   $resultado_clientes = $mysqli->query($sql_clientes);
   
   // Verifica si la consulta fue exitosa
   if ($resultado_clientes) {
       $row = $resultado_clientes->fetch_assoc();
       $total_clientes = $row['total_registros'];
   } else {
       // Manejo de error si la consulta falla
       $total_clientes = "Error al obtener el total de clientes";
   }
   
   
   //consulta de registro de productos
   //ejecutamos la consulta para obtener el total de registro de los clientes
   $sql_productos = "SELECT COUNT(*) as total_productos FROM productos";
   //almacenamos el resultado
   $resultado_productos = $mysqli->query($sql_productos);
   
   // Verifica si la consulta fue exitosa
   if ($resultado_productos) {
       $row = $resultado_productos->fetch_assoc();
       $total_productos = $row['total_productos'];
   } else {
       // Manejo de error si la consulta falla
       $total_productos = "Error al obtener el total de productos";
   }
   
   
   //consulta de total ventas
   //ejecutamos la consulta para obtener el total de la suma de las ventas
   $sql_ventas = "SELECT SUM(CAST(REPLACE(REPLACE(total_pagar, '.', ''), ',', '') AS DECIMAL(13, 0))) AS total_suma FROM detalles_venta;";
   //almacenamos el resultado
   $resultado_ventas = $mysqli->query($sql_ventas);
   
   // Verifica si la consulta fue exitosa
   if ($resultado_ventas) {
       $row = $resultado_ventas->fetch_assoc();
       $valor_pagado = $row['total_suma'];
       // Formatear el número como moneda colombiana
      $valor_pagado_formateado = number_format($valor_pagado, 0, ',', '.');
   } else {
       // Manejo de error si la consulta falla
       $valor_pagado = "Error al obtener el total pagado";
   }
   
   
   //consulta de registro de tickets
   //ejecutamos la consulta para obtener el total de registro de los clientes
   $sql_tickets = "SELECT COUNT(*) as total_tickets FROM ventas";
   //almacenamos el resultado
   $resultado_tickets = $mysqli->query($sql_tickets);
   
   // Verifica si la consulta fue exitosa
   if ($resultado_tickets) {
       $row = $resultado_tickets->fetch_assoc();
       $total_tickets = $row['total_tickets'];
   } else {
       // Manejo de error si la consulta falla
       $total_productos = "Error al obtener el total de tickets";
   }
   
   
   include ('header.php');
   
   
   ?>
<div id="layoutSidenav_content">
   <main>
      <div class="container-fluid px-4">
         <h1 class="mt-4">Bienvenido (a)...</h1><br>
         <div class="row">
            <div class="col-xl-3 col-md-6">
               <div class="card mb-4 shadow-lg bg-white rounded">
                  <div class="card-body bg-primary text-white">Total Clientes: <?php echo $total_clientes; ?></div>
                  <div class=" d-flex justify-content-center">
                     <a class="" href="clientes.php">
                     <img src="img/cliente.gif" alt="" style="width: 100%">
                     </a>
                  </div>
               </div>
            </div>
            <div class="col-xl-3 col-md-6">
               <div class="card mb-4 shadow-lg bg-white rounded">
                  <div class="card-body bg-warning text-white">Total Productos: <?php echo $total_productos; ?></div>
                  <div class=" d-flex align-items-center justify-content-center">
                     <a class="" href="productos.php">
                     <img src="img/presentacion.gif" alt="" style="width: 100%">
                     </a>
                  </div>
               </div>
            </div>
            <div class="col-xl-3 col-md-6">
               <div class="card mb-4 shadow-lg bg-white rounded">
                  <div class="card-body bg-success text-white">Total Ventas: $<?php echo $valor_pagado_formateado; ?></div>
                  <div class=" d-flex align-items-center justify-content-center">
                     <a class="small text-white stretched-link" href="detalle-tickets.php">
                     <img src="img/lucro.gif" alt="" style="width: 100%">
                     </a>                            
                  </div>
               </div>
            </div>
            <div class="col-xl-3 col-md-6">
               <div class="card mb-4 shadow-lg bg-white rounded">
                  <div class="card-body bg-secondary text-white ">Total Ticket's: <?php echo $total_tickets; ?></div>
                  <div class=" d-flex align-items-center justify-content-center">
                     <a class="small text-white stretched-link" href="tickets.php">
                     <img src="img/factura.gif" alt="" style="width: 100%">
                     </a>
                  </div>
               </div>
            </div>
         </div>

         <!--- en desarrollo
                 <div class="row">
            <div class="col-xl-6">
               <div class="card mb-4">
                  <div class="card-header">
                     <i class="fas fa-chart-area me-1"></i>
                     Area Chart Example
                  </div>
                  <div class="card-body">
                     <canvas id="myAreaChart" width="100%" height="40"></canvas>
                  </div>
               </div>
            </div>
            <div class="col-xl-6">
               <div class="card mb-4">
                  <div class="card-header">
                     <i class="fas fa-chart-bar me-1"></i>
                     Bar Chart Example
                  </div>
                  <div class="card-body">
                     <canvas id="myBarChart" width="100%" height="40"></canvas>
                  </div>
               </div>
            </div>
         </div>
        -->
      </div>
   </main>
</div>
</div>
<?php
   include("footer.php");
   ?>

   <!--en desarrollo charts
   <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
   <script src="assets/demo/chart-area-demo.js"></script>
   <script src="assets/demo/chart-bar-demo.js"></script>
   -->
</body>
</html>