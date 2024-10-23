
<div class="wrapper " style="background: #C69F74;">

    <div class="content-wrapper p-0 px-2"   style=" background-image: url('<?php echo base_url();?>/img/fondo.jpg');">
        <!--  (cabecera header) -->
        <section class=" p-2 m-0">


          <div class="row  d-flex justify-content-center">
            <div class="col-8 d-flex justify-content-center align-items-center">

              <h3 id="tituloChart" class="t-primary" >Eventos Frecuentes</h3>
          </div>

      </div>


  </section>
  <section class="px-2 py-1" style="background:rgba(255, 255, 255, .2); height: 78vh;"  >







    <div class="row mx-2" id="">
      <div class="col-sm-12 col-md-6 col-12 col-lg-6  d-flex"   style="background:rgba(255, 255, 255, .0); height:60vh" >
         <section > 
             <div class="position-absolute top-0 start-0">
                  <button  class="btn btnt-primary" id="btnCambiar" onclick="cambiar()">Servicios</button>
                </div>
            <figure  >
                <canvas id="modelsChart" class="d-flex align-items-stretch w-100" style="height:35vh;min-width: 100%; background: rgba(0, 0, 0, .2);">
                    
                </canvas>
            </figure>


        </section>

    </div>
    <div class="col-sm-12 col-md-6 col-12 col-lg-6  align-items-start"  >
        <div class=" row d-flex justify-content-center justify-content-center">

                   <div class="col-md-10 col-sm-12 d-flex justify-content-center"> 

                     <div class="d-flex align-items-center">
                      <h5>Desde </h5>
                      <div class="myBox">

                        <input id="servicioEventosMasInicio" class="myImputField" type="date" value="2024-10-01" name="" onchange="validarFecha()" >
                    </div>
                </div>
                <div class="d-flex align-items-center">
                  <h5>Hasta </h5>

                  <div class="myBox">

                    <input id="servicioEventosMasFin" class="myImputField" type="date" value="2024-10-27" name="" onchange="validarFecha()">
                </div>
            </div>
            </div>
            <div class="col-md-2 col-sm-12  d-flex justify-content-end align-items-center" >

                <button  title="Imprimir" class="btn btn-sm m-0  p-1 btnt-primary " id="btnPdfEventos"><b><i class="fa-solid fa-print fa-xl text-success"  ></i></b></button>

            </div>
</div>  

        <div id="divContenedorReportes" class="col-12">
              <table width="100%" class="table table-sm">
           <thead>
                 <tr>
                   <th style="text-align:center ;">Eventos</th>
                   <th style="text-align:center ;">Veces</th>
                   <th style="text-align:center ;">Total Bs.</th>

               </tr>
            </thead>
               <tbody id="eventoFrecuentes">
               
                </tbody>
                <tfoot>
                    <tr>
                       <th colspan="2">Total Ingresos</th>
                       <th  style="text-align:right; margin-right:10px">Bs <span id="ingresosFrecuentes">0.00</span></th>

                   </tr>
               </tfoot>
         </table>

         </div>
        <div id="divContenedorServicios" class="col-12" display="none" style="display: none;">
             <table width="100%" class="table table-sm">
           <thead>
                 <tr>
                   <th style="text-align:center ;">Servicio</th>
                   <th style="text-align:center ;">Veces</th>
                   <th style="text-align:center ;">Cantidades</th>

                   <th style="text-align:center ;">Total Bs.</th>

               </tr>
            </thead>
               <tbody id="serviciosMasReservados">
               
                </tbody>
                <tfoot>
                    <tr>
                       <th colspan="2">Total Ingresos</th>
                       <th  style="text-align:right; margin-right:10px">Bs <span id="ingresoPorServiosMas">0.00</span></th>

                   </tr>
               </tfoot>
         </table>

         </div>

   </div>
</div>
</section>
<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
<script type="text/javascript" src="<?php echo base_url();?>miestilos/js/chartjs/chart.min.js"></script> 
<script src="<?php echo base_url();?>/adminlti/plugins/jquery/jquery.min.js"></script>


<script type="text/javascript">

 var cambios=true;
 var seFInicio='';
var seFFin='';
fechaAuto();
// validarFecha();
function fechaAuto()
{
    var fechaEF=document.getElementById("servicioEventosMasFin");
    fechaEF.value=fechaHoy();
}

 function validarFecha()
 {
    seFInicio=document.getElementById("servicioEventosMasInicio").value;
    seFFin=document.getElementById("servicioEventosMasFin").value;
    var hoy =fechaHoy();
    if(seFFin<=hoy)
    {
        if(seFInicio<=seFFin)
        {
             servicioEventos();
        }
        else
        {
            document.getElementById("servicioEventosMasInicio").value=document.getElementById("servicioEventosMasFin").value;
            toastr.warning('La fecha  debes menor');
        }

    }else
    {
        document.getElementById("servicioEventosMasFin").value=hoy;
        toastr.warning('La fecha debe ser menor a hoy dia');
    }
 }
function cambiar() {

    if(cambios)
    {
        cambios=false;

        servicioEventos();
    }
    else
    {
        cambios=true;

        servicioEventos();
    }
}

function servicioEventos() {
    // alert(seFInicio);

       var dvConte = document.getElementById('divContenedorReportes');
       var dvConteSErvicio = document.getElementById('divContenedorServicios');

       var hTitulo = document.getElementById('tituloChart');

       var btnCambiar= document.getElementById('btnCambiar');
    if(!cambios){

        dvConte.style.display = 'none'; // Oculta el div
        dvConteSErvicio.style.display='block';
        btnCambiar.textContent="Eventos";
        hTitulo.textContent="Servicios más Reservados";
        servicioMasPedidos(seFInicio,seFFin);

    }else
    {
        dvConte.style.display = 'block'; // Oculta el div
        dvConteSErvicio.style.display='none';

        btnCambiar.textContent="Servicios";
        hTitulo.textContent="Eventos Frecuentes";
        eventosFrecuentes(seFInicio,seFFin);

    }
    tituloReportes=hTitulo.textContent;
}

Chart.defaults.color = '#001F3F'
Chart.defaults.borderColor = '#444'
var body =[];
var cabecera=[];
var tituloReportes=document.getElementById('tituloChart').textContent   ;
// eventosFrecuentes(seFInicio,seFFin);
validarFecha();

function fechaHoy() {
    const fechaActual = new Date();
    const año = fechaActual.getFullYear();
    const mes = fechaActual.getMonth() + 1; // Meses van de 0 a 11, por lo que sumamos 1
    const día = fechaActual.getDate();
    const hora = fechaActual.getHours();
    const minuto = fechaActual.getMinutes();
    
    // Formatear la fecha como desees (ejemplo: YYYY-MM-DD HH:mm:ss)
    // return `${año}-${mes.toString().padStart(2, '0')}-${día.toString().padStart(2, '0')} ${hora}:${minuto}`;
    return `${año}-${mes.toString().padStart(2, '0')}-${día.toString().padStart(2, '0')}`;

}

function eventosFrecuentes(fechaInicio,fechaFin) {
    body =[];
    cabecera=[["Eventos","Veces","Total Bs."]];
    // alert(fechaInicio+'-mmm-'+fechaFin);
    const fechahoy =fechaHoy();
    var spIngresoTotal=document.getElementById('ingresosFrecuentes');
    var nombres=[];
    var datos=[];
    var porcentaje=[];
    $.ajax({
        url:'../reportes/eventoFrecuentes',
        type:'POST',
        data:{fechaInicio,fechaFin,fechahoy},
        success:function(response){

          let servicio= JSON.parse(response);

          let template= "";
          var ingresoTotal=0;
          var datosbody=[];
          servicio.forEach(res=>{

            template+=`
            <tr servicioId=${res.id} nombreServicio='${res.nombre}'>

            <td>${res.nombre}</td>
            <td style ="text-align:right">${res.cantidadEventos}</td>
            <td style ="text-align:right">${res.totalSumado}</td>

            <td style></td>


            </tr>
            `
            ingresoTotal+=parseFloat(res.totalSumado);
            nombres.push(res.nombre);
            datos.push(res.cantidadEventos);
            datosbody=[res.nombre,res.cantidadEventos,res.totalSumado];
            body.push(datosbody);


        });
          spIngresoTotal.textContent=ingresoTotal.toFixed(2);
          $('#eventoFrecuentes').html(template); 

          printCharts(nombres,datos);
      }
  });
}

function servicioMasPedidos(fechaInicio,fechaFin) {
    body =[];
    var fechahoy =fechaHoy();
       cabecera=[["Servicios","Unidad Medida","Cantidad","Total Bs."]];
    // alert(fechaInicio+'-serv-'+fechaFin);
    var spIngresoTotal=document.getElementById('ingresoPorServiosMas');
    var nombres=[];
    var datos=[];
    var porcentaje=[];
    $.ajax({
        url:'../reportes/serviciosMasReservados',
        type:'POST',
        data:{fechaInicio,fechaFin,fechahoy},
        success:function(response){

          let servicio= JSON.parse(response);

          let template= "";
          var ingresoTotal=0;
          var datosbody=[];
          servicio.forEach(res=>{

            template+=`
            <tr servicioId=${res.id} nombreServicio='${res.Servicios}'>

            <td>${res.Servicios}</td>
            <td>${res.veces}</td>

            <td style ="text-align:right">${res.totalCantidad}</td>
            <td style ="text-align:right">${res.totalRecaudado}</td>

            <td style></td>


            </tr>
            `
            ingresoTotal+=parseFloat(res.totalRecaudado);
            nombres.push(res.Servicios);
            datos.push(res.totalRecaudado);
            datosbody=[res.Servicios,res.unidadMedida,res.totalCantidad,res.totalRecaudado];
            body.push(datosbody);


        });
          spIngresoTotal.textContent=ingresoTotal.toFixed(2);
          $('#serviciosMasReservados').html(template); 

          printCharts(nombres,datos);
      }
  });
}

function printCharts(nombres, veces) {
    var ctx = document.getElementById('modelsChart').getContext('2d');

    // Obtener el gráfico existente por ID
    var existingChart = Chart.getChart(ctx);

    // Verificar si el gráfico existe
    if (existingChart) {
        // Actualizar datos y opciones del gráfico existente
        existingChart.data.labels = nombres;
        existingChart.data.datasets[0].data = veces;
        existingChart.options.plugins.datalabels.labels = {
            fontSize: 14,
            color: 'red',
            formatter: (value, context) => {
                const label = context.chart.data.labels[context.dataIndex];
                const percentage = ((value / context.dataset.data.reduce((a, b) => a + b, 0)) * 100).toFixed(2) + '%';
                return label + ': ' + percentage;
            }
        };

        // Actualizar el gráfico
        existingChart.update();
    } else {
        // Si el gráfico no existe, crear uno nuevo
        const data = {
            labels: nombres,
            datasets: [{
                data: veces,
                borderColor: getDataColors(),
                backgroundColor: getDataColors(99)
            }]
        }

        const options = {
            plugins: {
                legend: { position: 'left' },
                datalabels: {
                    fontSize: 14,
                    color: 'red',
                    formatter: (value, context) => {
                        const label = context.chart.data.labels[context.dataIndex];
                        const percentage = ((value / context.dataset.data.reduce((a, b) => a + b, 0)) * 100).toFixed(2) + '%';
                        return label + ': ' + percentage;
                    }
                }
            }
        }

        new Chart('modelsChart', { type: 'doughnut', data, options });
    }
}

function getDataColors(opacity) {
    var colors = ['#7448c2', '#21c0d7', '#d99e2b', '#cd3a81', '#9c99cc', '#e14eca', '#ffffff', '#ff0000', '#d6ff00', '#0038ff'];
    return colors.map(function(color) {
        return opacity ? color + opacity : color;
    });
}
$(document).on('click', '#btnPdfEventos', function () {
    var spIngresoTotal=document.getElementById('ingresosFrecuentes').textContent;

    const canvas = document.getElementById('modelsChart');
    const cRutas = canvas.toDataURL('image/png');

    var fhoy=fechaHoy();
    var pdf = new jspdf.jsPDF();
       pdf.setFontSize(20);
        pdf.setFont("helvetica", "bold"); 
        pdf.setTextColor(0, 25, 62);      
        pdf.text(78, 35, tituloReportes);
        pdf.setTextColor(0, 0, 0);      

        pdf.setFontSize(12);
      if(seFInicio!='' && seFFin!='')
      {
          pdf.text(60, 45, 'Desde  ' + seFInicio);
        pdf.text(130, 45, 'Hasta  ' + seFFin);
      }
      else
      {
            (100, 45, 'Hoy Dia  ' + fhoy);
      }
       pdf.setFont("helvetica"); 

        var urlCompleta = window.location.href;
        pdf.addImage(urlCompleta + "../../../../img/logo.png", "PNG", 20, 15, 30, 30);

    const tableWidth = 170;
    var maxWidthColumn2 = 50;
    var maxWidthColumn3 = 40;
    const columnStyles = {
        0: {
            halign: 'left',
            textColor: 0
        },
        1: {
            cellWidth: maxWidthColumn2,
            overflow: 'linebreak',
            halign: 'center',
            textColor: 0
        },
        2: {
            cellWidth: maxWidthColumn3,
            overflow: 'linebreak',
            halign: 'right',
            textColor: 0
        },


    };
    const tableConfig = {
        styles: {
            cellPadding: 1,
            fontSize: 11
        },
        columnStyles,
        tableWidth, // Ancho de la tabla
        margin: {
            top: 30,
            right: 20,
            bottom: 30,
            left: 20
        }, // Márgenes para centrar la tabla
        headStyles: {
            fillColor: [0, 64, 128],
            halign: 'center'
        }, // Color de fondo para la fila de encabezado
        bodyStyles: {
            fillColor: [230, 248, 255],
            fontSize: 11
        }, // Color de fondo para las filas de datos
        alternateRowStyles: {
            fillColor: [183, 219, 219]
        }, // Color de fondo para filas alternas
        showHead: 'everyPage', // Mostrar el encabezado en cada página
    };
    var foot = [
        [{
            content: 'INGRESOS.',
            colSpan: 2,
            styles: {
                halign: 'center',
                fillColor: [255, 255, 255],
                fontStyle: 'bold',
                textColor: [0, 31, 63],
                lineWidth: 0.5
            },
            cellStyles: {
                borderTop: [255, 0, 0],
                borderTopWidth: 1
            }
        }, {
            content: 'Bs. ' + parseFloat(spIngresoTotal).toFixed(2),
            styles: {
                halign: 'right',
                fillColor: [255, 255, 255],
                fontStyle: 'bold',
                textColor: [0, 31, 63],
                lineWidth: 0.5
            },
            cellStyles: {
                borderTopColor: [255, 0, 0],
                borderTopWidth: 1
            }
        }]
        ];

    pdf.autoTable({
        startY: 50,
        head: cabecera,
        body: body,
        foot:foot,
        ...tableConfig, 
    });

    const ultimaPosicionY = pdf.previousAutoTable.finalY;
    pdf.addImage(cRutas, 'jpeg', 55, ultimaPosicionY+5, 100, 100);
    // pdf.save('chart.pdf');
     var pdfContent = pdf.output('blob');
        var blobUrl = URL.createObjectURL(pdfContent);
        window.open(blobUrl, '_blank');


});


</script>




