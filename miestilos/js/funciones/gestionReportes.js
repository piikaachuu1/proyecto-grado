

$(document).ready(function() {
    $(document).on('change', '#fechaIncio', function() {
        // document.getElementById('fechaFin');
        var fechaFin = document.getElementById('fechaFin').value;
        var fechaInic = document.getElementById('fechaIncio').value;
        if (document.getElementById('fechaFin').value >= document.getElementById('fechaIncio').value) {
            IngresosEnfechas(fechaInic, fechaFin);
        } else {
            toastr.warning("La fecha debe ser menor ", '', {
                "preventDuplicates": true
            });
            document.getElementById('fechaIncio').value = document.getElementById('fechaFin').value;
            IngresosEnfechas(fechaInic, fechaFin);
        }
    });
    $(document).on('change', '#fechaFin', function() {
        var fechaFin = document.getElementById('fechaFin').value;
        var fechaInic = document.getElementById('fechaIncio').value;
        if (document.getElementById('fechaFin').value >= document.getElementById('fechaIncio').value) {
            IngresosEnfechas(fechaInic, fechaFin);
        } else {
            toastr.warning("La fecha debe ser mayor al inicio", '', {
                "preventDuplicates": true
            });
            document.getElementById('fechaFin').value = document.getElementById('fechaIncio').value;
            IngresosEnfechas(fechaInic, fechaFin);
        }
    });
  fechasCargarReporte();
    function fechasCargarReporte()
    {
         var fechaFin = document.getElementById('fechaIncio').value;
         document.getElementById('fechaFin').value=fechaHoyDDDD();
        IngresosEnfechas(fechaFin,fechaHoyDDDD());
    }
    

    function fechaHoyDDDD() {
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
    function IngresosEnfechas(fechaInicio, fechaFin) {
        document.getElementById("ingresosReporte").innerText = '';
        $.ajax({
            url: '../reportes/ingresoEnfechas',
            type: 'POST',
            data: {
                fechaInicio,
                fechaFin
            },
            success: function(response) {
                // console.log(response+"golas");
                let general = JSON.parse(response);
                console.log(general);
                let template = "";
                i = 0;
                let tIngreso = 0;
                general.forEach(res => {
                    template += `
        <tr usuarioId=${res.id}>
        <td style="text-align:center; width:25px"">${res.id}</td>

        <td style="text-align:center;">${res.fechaInicio}</td>
        <td >${res.nombreCompleto}</td>
        <td style="text-align:right; margin-right:50px">${res.total}</td>
        </tr>
        `
                    tIngreso += parseFloat(res.total);
                    i++;
                });
                document.getElementById("ingresosReporte").innerText = tIngreso.toFixed(2);
                $('.tReporteGeneral').html(template);
                if (i == 0) {
                    toastr.info("Sin registros en esas fechas", "", {
                        "preventDuplicates": true,
                    });
                }
            }
        });
    }
    $(document).on('click', '.imprimirReporte', function() {
        generarReportePdf();
    });
   






    function generarReportePdf() {
        // var totalIngreso = 0;
        // $(".tReporteGeneral").find('tr').each(function() {
        //     totalIngreso += parseFloat($(this).find("td:eq(3)").text());
        // });
        var totalIngreso =0;
        var fechaInicio = document.getElementById('fechaIncio').value;
        var fechaFin = document.getElementById('fechaFin').value;
        if (fechaInicio <= fechaFin) {
            $.ajax({
                url: '../reportes/ingresoEnfechas',
                type: 'POST',
                data: {
                    fechaInicio,
                    fechaFin
                },
                success: function(response) {
                    let general = JSON.parse(response);
                    let body = [];
                    var i = 0;
                    general.forEach(res => {
                        var datos = [res.id, res.fechaInicio, res.nombreCompleto, res.total];
                        totalIngreso+=parseFloat( res.total);
                        body.push(datos);
                        i++;
                    });
                    // Después de obtener los datos, ahora puedes generar el PDF
                    if (i != 0) {
                        generarPDF(body, totalIngreso, fechaInicio, fechaFin);
                    } else {
                        toastr.info("No se encuentra nungun registro selecciona en ese rango de fecha");
                    }
                }
            });
        } else {
            toastr.info("La fecha inicio debe ser menor que fecha fin", '', {
                "preventDuplicates": true
            });
        }
    }

    function generarPDF(body, totalIngreso, fechaInicio, fechafin) {
        var nombreUsuarioSeccion = document.getElementById('nombreUsuarioSeccion').textContent;
        const fechaActual = new Date();
        // Obtener los componentes de la fecha (año, mes, día, hora, minuto, segundo)
        const año = fechaActual.getFullYear();
        const mes = fechaActual.getMonth() + 1; // Meses van de 0 a 11, por lo que sumamos 1
        const día = fechaActual.getDate();
        const hora = fechaActual.getHours();
        const minuto = fechaActual.getMinutes();
        // Formatear la fecha como desees (ejemplo: YYYY-MM-DD HH:mm:ss)
        const fechaFormateada = `${año}-${mes.toString().padStart(2, '0')}-${día.toString().padStart(2, '0')} ${hora.toString().padStart(2, '0')}:${minuto.toString().padStart(2, '0')}`;
        var doc = new jspdf.jsPDF('p', 'mm', 'letter');
        doc.setFontSize(20);
        doc.setFont("helvetica", "bold"); 
        doc.setTextColor(0, 25, 62);      
        doc.text(78, 35, 'Reporte General');
        doc.setTextColor(0, 0, 0);      

        doc.setFontSize(12);
        doc.text(60, 45, 'Desde  ' + fechaInicio);
        doc.text(130, 45, 'Hasta  ' + fechafin);
       doc.setFont("helvetica"); 

        var urlCompleta = window.location.href;
        doc.addImage(urlCompleta + "../../../../img/usuario.png", "PNG", 20, 15, 30, 30);
        const tableWidth = 170;
        var maxWidthColumn2 = 15;
        var maxWidthColumn3 = 30;
        const columnStyles = {
            0: {
                cellWidth: maxWidthColumn2,
                overflow: 'linebreak',
                halign: 'center',
                textColor: 0
            },
            1: {
                cellWidth: maxWidthColumn3,
                overflow: 'linebreak',
                halign: 'center',
                textColor: 0
            },
            2: {
                halign: 'left',
                textColor: 0
            },
            3: {
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
                right: 22,
                bottom: 30,
                left: 22
            }, // Márgenes para centrar la tabla
            headStyles: {
                fillColor: [0, 25, 62],
                halign: 'center'
            }, // Color de fondo para la fila de encabezado
            bodyStyles: {
                fillColor: [236, 206, 174],
                fontSize: 11,
                 font: "helvetica" 
            }, // Color de fondo para las filas de datos
            alternateRowStyles: {
                fillColor: [183, 219, 219]
            }, // Color de fondo para filas alternas
            showHead: 'everyPage', // Mostrar el encabezado en cada página
        };
        var head = [
            ['Nro', 'Fechas', 'Clientes', 'Total Bs.']
        ];
        var foot = [
            [{
                content: 'INGRESOS.',
                colSpan: 3,
                styles: {
                    halign: 'center',
                    fillColor: [255, 255, 255],
                    fontStyle: 'bold',
                    textColor: [0, 31, 63],
                    lineWidth: 0.5
                },
                cellStyles: {
                    borderTopColor: [255, 0, 0],
                    borderTopWidth: 1
                }
            }, {
                content: 'Bs. ' + parseFloat(totalIngreso).toFixed(2),
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
        doc.autoTable({
            startY: 50,
            head: head,
            body: body,
            foot: foot,
            ...tableConfig, 
            
               drawRow: (row, data) => {
                data.doc.setDrawColor(0, 0, 0); // Establecer el color del trazo en negro

                // Dibujar borde alrededor de cada celda en la fila
                row.cells.forEach(cell => {
                  data.doc.rect(cell.x, cell.y, cell.width, cell.height);
                });

                // Verificar si es la última fila y dibujar un borde superior adicional
                if (row.index === data.table.body.length - 2) {
                  data.doc.line(row.x, row.y, row.x + row.width, row.y); // Dibujar borde superior
                }

                data.doc.setLineWidth(0.7);
              }
        });
        const ultimaPosicionY = doc.previousAutoTable.finalY;
        doc.setFontSize(10);
        doc.text(`Página ${doc.internal.getNumberOfPages()}`, 110, 270);
        doc.text(`Usuario: ` + nombreUsuarioSeccion, 20, 270);
        doc.text(20, 265, 'Fecha emision: ' + fechaFormateada);
        var ingresoLiteral = NumeroALetras(parseInt(totalIngreso));
        var nPosition = ultimaPosicionY;
        doc.setFontSize(10);
        doc.text(22, nPosition + 10,'SON: '+ ingresoLiteral+ ' '+obtenerParteDecimal(totalIngreso) + '/100');
       
           
            // doc.save("reporteGeneral"+fechaFormateada);
        var pdfContent = doc.output('blob');
        var blobUrl = URL.createObjectURL(pdfContent);
        window.open(blobUrl, '_blank');

    }
})
