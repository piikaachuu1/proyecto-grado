 
<div class="wrapper" >


  <!-- Left side column. contains the logo and sidebar -->
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper" >
    <!-- Content Header (Page header) -->
    <section class="content-header row">

      <div class="col-md-8">
        <div class="row">
          <div class="col-md-6 hidden-xs" >
            Calendario de eventos
          </div>
                 </div>
      </div>
      
      <div class="col-md-1">
        <div class=" col-md-12 no-padding text-center">
          <a href="<?php echo base_url();  ?>index.php/usuario/calendario">            
            <i class="nav-icon fa-solid fa-calendar" title="Ver calendario mensual"></i>Mes
          </a>
        </div>
      </div>

      <div class="col-md-3">
        <div class="">
          <small><i class="fa fa-square text-green"></i> Pagados</small>
          <small><i class="fa fa-square text-aqua"></i> Reservados</small>
          <small><i class="fa fa-square text-yellow"></i> Pendientes</small>
        </div>
      </div>


    </section>

    <!-- Main content -->
    <section class="content" >

      <div class="" >

       
          
            <!-- THE CALENDAR -->
            <div id="mini-clndr" class=" row" style="" >
             

              <div class="clndr-1 col-md-4 col-sm-6"  ><div class="clndr" > </div> </div>                
                 
              <div class="clndr-2 col-md-4 col-sm-6"3 ><div class="clndr">  </div></div>          
              
              <div class="clndr-3 col-md-4 col-sm-6"><div class="clndr">   </div> </div>
  
              <div class="clndr-4 col-md-4 col-sm-6"><div class="clndr"> </div></div>

              <div class="clndr-5 col-md-4 col-sm-6"><div class="clndr"></div></div>

              <div class="clndr-6 col-md-4 col-sm-6"><div class="clndr">  </div></div>

              <div class="clndr-7 col-md-4 col-sm-6"><div class="clndr"> </div></div>

              <div class="clndr-8 col-md-4 col-sm-6"><div class="clndr">  </div></div>

              <div class="clndr-9 col-md-4 col-sm-6"><div class="clndr">   </div></div>

              <div class="clndr-10 col-md-4 col-sm-6"><div class="clndr">   </div></div>

              <div class="clndr-11 col-md-4 col-sm-6"><div class="clndr">   </div></div>

              <div class="clndr-12 col-md-4 col-sm-6"><div class="clndr"></div>  </div>
            </div>
          
        </div>
          
          
        <div class="row">
              <div class="col-md-4">
                <a href="#" class="btn btn-info col-md-12 col-xs-12">
                  <i class="fa fa-arrow-left"></i> Anterior</a>                  
              </div>
             <div class="col-md-4"></div>

              <div class="col-md-4">                  
                  <a href="#" class="btn btn-primary col-md-12 col-xs-12">
                    Siguiente <i class="fa fa-arrow-right"></i></a>
              </div>
              
        </div>
     </section>
    </div>
<!-- /.content-wrapper -->


</div>
<!-- ./wrapper -->

<div class="modal modal-primary" id="modalAddEvent" aria-hidden="true"  >
  <div class="modal-dialog" >
    <div class="modal-content" style="background:lightskyblue;">
      <div class="modal-header" style="background:orange;">
        <div class="container">
          <div class="row">
       
          <h5 class="modal-title">Agregar un evento para el dia <span id="titleModalDay">2023-08-12</span></h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span  aria-hidden="true">×</span></button>
        </div>
        </div>
      </div>
      <div class="modal-body">
      
        <section>          
        <div class="row">
          <label>Nombre del evento</label>
          <input type="text" class="form-control mandatory-field" id="eventName" required="required" placeholder="Ej. XV de Rubi, Cena Graduación Escuela X Gen 2017-200, ...">
        </div>      
        </section>        
        <br>

        <section class="row">
          
          <div class="col-md-6">
            <label class="row">Persona que contrata el evento</label>
            <input type="text" class="row form-control mandatory-field" id="userName" required="required" placeholder="Ej. Lic. Arnulfo Levenstein">
          </div>

          <div class="col-md-6">        
            <div class="row">
              <span class="col-md-2 input-group-addon"><i class="fa fa-phone"></i></span>
              <input type="tel" id="tel" class="col-md-10 form-control form-control-sm " required="required" placeholder="Teléfono">
            </div>          

            <div class="row">
              <span class="col-md-2 input-group-addon"><i class="fa fa-envelope"></i></span>
              <input type="text" id="email" class="col-md-10 form-control form-control-sm" required="required" placeholder="Email">
            </div>
          </div>
          
        </section>

        <hr>
    <section class="row">
  

        <section class="col-md-6 " style=";padding:10px">          
        
        <div class=" row">
          <div class="col-md-12">
            Horas contratadas: <span id="numberHrs">1</span>
          </div>
          <div class="col-md-12">

            <div class="slider" id="eventHours-slider" style="position: relative; user-select: none; box-sizing: border-box; min-height: 16px; margin-left: 8px; margin-right: 8px;"><div class="track" style="position: absolute; top: 50%; user-select: none; cursor: pointer; width: 100%; margin-top: -2px;"></div><div class="dragger" style="position: absolute; top: 50%; user-select: none; cursor: pointer; margin-top: -8px; margin-left: -8px; left: 0px;"></div></div><input id="eventHours" type="text" value="1" data-slider="true" data-slider-range="1,12" data-slider-step="1" data-slider-snap="true" style="display: none;">
          </div>
        </div>

        <div class="form-group col-md-12 row">
          <div class="col-md-5 ">Hra incio</div>
          <div class="col-md-7">
            <input type="text" class="form-control form-control-sm " id="startH" value="10:00 PM" autocomplete="off">
          </div>
        </div>

        <div class="form-group col-md-12 row">
          <div class="col-md-5">Hra fin</div>
          <div class="col-md-7">
            <input type="text" class="form-control form-control-sm" id="endH" value="11:00 PM" title="Desliza a la derecha las horas contratadas" disabled="">
            <label class="label label-danger" id="alert-another-event" style="display: none;">Otro evento se realiza a esta hora</label>
          </div>
        </div>
        </section>
        
        <section class="col-md-6 row " style=";padding:10px">
        
        
         <div class="row" >
              <div class="col-4" >Adelanto</div>
              <div class="col-1 "> <span class="input-group-addon">Bs</span> </div>
              <div class="col-6 ">  <input id="payment" type="tel" class="form-control form-control-sm text-right"  style="text-align: right;"> </div>
              <div class="col-1 ">  <div class="input-group-addon">.00</div></div>
        </div> 
         <div class="row">
              <div class="col-4" >Resto</div>
              <div class="col-1 "> <span class="input-group-addon">Bs</span> </div>
              <div class="col-6 ">  <input id="remain" type="tel" class="form-control form-control-sm text-right" disabled="disabled" style="text-align: right;"> </div>
              <div class="col-1 ">  <div class="input-group-addon">.00</div></div>
        </div> 
          <div class="row">
              <div class="col-4" >Tota</div>
              <div class="col-1 "> <span class="input-group-addon">Bs</span> </div>
              <div class="col-6 ">  <input id="total" type="tel" class="form-control form-control-sm text-right" disabled="disabled" style="text-align: right;"> </div>
              <div class="col-1 ">  <div class="input-group-addon d-flex justify-content-start" >.00</div></div>
   
        </div>  
        </section>
        </section>
        <div class="clearfix"></div>        

      </div>
      <div class="modal-footer d-flex justify-content-around bgt.acent" >
        <button type="button" class="btn btn-outline " data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-outline" id="addCalendarEvt" onclick="addCalendarEvt( &quot;2023-08-12&quot;)">Agregar evento</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>


    <script>"use strict";</script>
    <script src="<?php echo base_url();?>/calendario/res/jquery.js.descarga"></script>

    <script src="<?php echo base_url();?>/calendario/res/momentjs.lang.js"></script>ss

    <script src="<?php echo base_url();?>/calendario/res/bootstrap.min.js.descarga"></script>
    <script src="<?php echo base_url();?>/calendario/res/underscore-min.js"></script>

    <script src="<?php echo base_url();?>/calendario/res/clndr.min.js.descarga"></script>
    <script>

      function setLastVisited( id, pic, name ){

        localStorage.setItem( 'lastVisit.url', document.location );
        localStorage.setItem( 'lastVisit.id', id );
        localStorage.setItem( 'lastVisit.pic', pic );
        localStorage.setItem( 'lastVisit.name', name );

      }

      function removeLastVisit(){

        localStorage.removeItem( 'lastVisit.url' );
        localStorage.removeItem( 'lastVisit.id' );
        localStorage.removeItem( 'lastVisit.pic' );
        localStorage.removeItem( 'lastVisit.name' );

      }


      if( document.domain.indexOf("demo") > -1 ){
        $(".content").attr('style', 'background-image: url(/web/img/demo.png)' );
      }

    </script>


    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      reservarsalon = ['UA', '114663401', '1' ];
      gtag('config', reservarsalon.join("-"));
    </script>
    <script id="calendar-template" type="text/template">  


      <div class="col-md-12" >

        <div class="controls text-center">
          <div class="month"><%= month %>&nbsp;<%= year %></div>
        </div>

        <div class="days-container">
          <div class="days">
            <div class="headers">
              <% _.each(daysOfTheWeek, function(day) { %><div class="day-header"><%= day %></div><% }); %>
            </div>
            <% _.each(days, function(day) { %><div class="<%= day.classes %>" id="<%= day.id %>"><%= day.day %></div><% }); %>
          </div>
        </div>

      </div>

     
   </script>


   <script>


// var currentPeriod = 202606;
    var dweek =  ['L', 'M', 'I', 'J', 'V', 'S', 'D'];
    var clndrTempl = $('#calendar-template').html();
    var anualEventsPhp = {"202307":"[]","202308":"[]","202309":"[]","202310":"[]","202311":"[]","202312":"[]","202401":"[]","202402":"[]","202403":"[]","202404":"[]","202405":"[]","202406":"[]"};

    function loadBySection(){

       moment.locale('es'); /*Lang*/

      var aux;

      let currMont = 11;
      let currYear = 2023;

      for (var i = 1; i < 13; i++) {
        if ( currMont > 11 ) { 
          currMont = 0; 
          currYear+=1; 
        }
        generateCalendar('.clndr-'+i, currMont, currYear)
        currMont++;
      }


      function generateCalendar( htmlTag, month, year ){
        let indexAnualEventsYear = year
        let indexAnualEventsMonth = month+1


        if ( month < 9 ) { 
          indexAnualEventsMonth = '0'+(month+1)
        }

        let eventsData = anualEventsPhp[indexAnualEventsYear+''+indexAnualEventsMonth];

        eventsData = JSON.parse(eventsData)

        let objCalendar = $( htmlTag ).clndr({

         daysOfTheWeek: dweek,
         template  :    clndrTempl,
         events    :    eventsData.events,

         ready     :    function(){ setInterval(getNewData, 3000+month, 
          indexAnualEventsYear+''+indexAnualEventsMonth, this
          )},
         extras    :    {
          uuidJson : 0,
        },

        clickEvents: {
       // fired whenever a calendar box is clicked.
       // returns a 'target' object containing the DOM element, any events, and the date as a moment.js object.
         click: function(target){
           aux = target;

           dayClass = aux.element.className;

         /*today o YYYY-mm-dd*/
         clickedDay = aux.date._i;  /*dayClass.split(" ")[1].replace("calendar-day-", '');*/

           if ( dayClass.indexOf('event') > -1 ){

             eventDetail = aux.events[0];
             prepareModalDetail( clickedDay, eventDetail );

           }else{

             if ( dayClass.indexOf('past') < 0 && dayClass.indexOf('adjacent-month') < 0 ) {
               prepareModalToAdd( clickedDay );
             }

           }

         },
       /*onMonthChange: function(month) {
         waitOnCalendarLoad(true);
         currentPeriod =  month.format('YYYYMM');
       }*/

       }

     });

        objCalendar.setMonth(month);
        objCalendar.setYear(year);

        return objCalendar

      }


// Calcula la hora fin en caso de cambiar las horas contratadas
      $("#eventHours").bind("slider:changed", function (event, data) {
  // The currently selected value of the slider
        $("#numberHrs").text(data.value);

        startH = $("#startH").val();
        changeEndHour( startH, data.value );

  // The value as a ratio of the slider (between 0 and 1)
/*  alert(data.ratio);*/
      });


      $("#startH").timepicker({ 'timeFormat': 'h:i A', 'step': 60, 'minTime': '07:00am', 'maxTime': '11:00pm', 'disableTextInput': true });


// Calcula la hora fin en caso de cambiar la hora
      $("#startH").change(function(){ 

        startH = $(this).val();
        numberHrs = $("#eventHours").val();

        changeEndHour( startH, numberHrs );


      });


/*Calendario Interno del Popup de Pago Adicional*/
      $.fn.datepicker.dates['es'] = {
        days: ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"],
        daysShort: ["Dom", "Lun", "Mar", "Mier", "Jue", "Vie", "Sab"],
        daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
        months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "OCtubre", "Noviembre", "Diciembre"],
        monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
        today: "Hoy",
        clear: "Limpiar",
        format: "mm/dd/yyyy",
    titleFormat: "MM yyyy", /* Leverages same syntax as 'format' */
        weekStart: 0
      };

      $("#dateNewPay").datepicker({
        format:'dd-M-yyyy', 
        language: 'es',
        autoclose:true, 
        todayHighlight: false,
  endDate:"+0d", /*No se puede pagar 1 dia despues del evento, se tiene que liquidar antes*/
  startDate: "05-05-2017", // Esto se setea despues con cada click de "Agregar Pago"
  weekStart: 1
});

      $("#dateNewPay").datepicker('update', Date());
/*En Calendario interno*/

      $('#dateNewPay').datepicker()
      .on('changeDate', function(e) {

        console.log(e);

      });

      $("#total, #payment, #remain").inputmask({ alias: "currency", digits: 0, prefix: '', allowMinus: false });

      $("#totalBefore, #payBefore, #saldoBefore, #newPay, #newSaldo").inputmask({ alias: "currency", digits: 0, prefix: ''});

      $("#tel").inputmask({"mask": "(999) 999-9999", "clearIncomplete": true});
      $("#email").inputmask("email", { "clearIncomplete": true });

      $("#total, #payment").on('input', function(){

  //total =  $("#total").val().replace(/,/g, "");
  //payment = $("#payment").val().replace(/,/g, "");

        total =  $("#total").inputmask('unmaskedvalue');
        payment = $("#payment").inputmask('unmaskedvalue');

        remain = parseInt( total ) - (parseInt( payment ) || 0);

  // Que no se pase del resto por pagar
        if ( remain < 0 ) {  
          $("#payment").val( total );    
          remain = 0;
        }

        $("#remain").val( remain );

      });


// Colores de los dias del calendario
      colourByStatus();

      $("#salonSelect").custom_select({
        'name': 'e_salon', 
        'options': {"ea38":"Flamingos A","si57":"Flamingos B","bs95":"Flamingos C"},
        'selected': "si57"
      });
      $("#e_salon").on('change',function(){ 
       document.location = document.location.pathname+'?e_salon='+$(this).val()
     });

      var enjoyhint_instance = new EnjoyHint({});

      var enjoyhint_script_steps = [
      {
        'none #colors-descr' : 'Descripción de los colores: <br>Verde: Evento pagado al 100% <br> Azul: Evento pagado parcialmente <br> Naranja: Evento sin pago alguno',
        'showSkip': false,
        'showNext': true,
        'nextButton' : {className: 'btn-success', text: 'Siguiente'}
      },
      {
        'click .days-container' : 'Da click en un día disponible. (Cada 24 h. se eliminan los eventos en la cuenta DEMO)',
        'showSkip': false,
      },
      {
        'none #eventName' : 'Coloca el nombre del evento',
        'showSkip': false,
        'showNext': true,
        'nextButton' : {className: 'btn-success', text: 'Siguiente'}
      },
      {
        'none #userName' : 'Nombre de la persona que contrata el servicio',
        'showSkip': false,
        'showNext': true,
        'nextButton' : {className: '', text: 'Siguiente'},
      },
      {
        'none #tel' : 'Teléfono del cliente',
        'showSkip': false,
        'showNext': true,
        'nextButton' : {className: '', text: 'Siguiente'},    
      },
      {
        'none #email': 'Email del cliente',
        'showSkip': false,
        'showNext': true,
        'nextButton' : {className: '', text: 'Siguiente'},
      },
      {
        'none #startH': 'Selecciona la hora de inicio del Evento',
        'showSkip': false,
        'showNext': true,
        'nextButton' : {className: '', text: 'Siguiente'},
      },
      {
        'none #eventHours-slider' : 'Desliza para seleccionar las horas contratadas',
        'showSkip': false,
        'showNext': true,
        'nextButton' : {className: '', text: 'Siguiente'},    

      },
      {
        'none #total': 'Coloca el monto total por reservar el salón',
        'showSkip': false,
        'showNext': true,
        'nextButton' : {className: '', text: 'Siguiente'},    

      },
      {
        'none #payment' : 'Si recibiste un adelanto, colócalo aca, si no, dejalo en 0',
        'showSkip': false,
        'showNext': true,
        'nextButton' : {className: '', text: 'Siguiente'},
      },
      {
        'click #addCalendarEvt': 'Agrega tu evento',
        'showSkip': false    
      },    
      {
        'click #listevents': 'Da click en el nombre de tu evento y después en "Estado de cuenta"',    
        'showSkip': false,
        'showNext': true,    
        'nextButton' : {className: '', text: 'Ok'},    
      }
      ];

// https://github.com/xbsoftware/enjoyhint
      enjoyhint_instance.set(enjoyhint_script_steps);
      enjoyhint_instance.run();

    }


    function passValidation(){

  // Validar que no esten vacios los campos
      fieldsToCheck = ['eventName', 'userName', 'tel', 'email', 'total'];

      for (i = 0; i < fieldsToCheck.length; i++) { 

        fieldCheck = fieldsToCheck[i];

        var eventVal = $("#"+fieldCheck).val();

        if ( eventVal == '' || eventVal.length < 1 || eventVal == 0 ) {
          $("#"+fieldCheck).parent().addClass("has-error");      
          return false;
        }

      }

      return true;

    }


    function prepareModalDetail( clickedDay, eventDetail ){

      c = $(".calendar-day-" + clickedDay);
      c = c.attr("class").split(" ");  

      classModalType = c[ c.length-1 ] ;

      $("#modalType").removeClass().addClass('box box-solid event-item ' + classModalType);

      $("#eventActive").text( '"' + eventDetail.title + '"' );

      $("#infoDetail").html( $("#detailEvent"+eventDetail.id+" #"+eventDetail.date).html() );

      $("#modalDetailEvent").modal();

    }

    function prepareModalToAdd( clickedDay ){

      $("#titleModalDay").text( clickedDay );

      $("#addCalendarEvt")
      .removeAttr('onclick')
      .attr('onclick', 'addCalendarEvt( "' + clickedDay + '")');

      $("#modalAddEvent").modal({backdrop:"static"});

    }


    function addCalendarEvt( clickedDay ){

      if ( !passValidation() ) {
        return 0;
      }

/*  console.log( clickedDay );*/
      let periodN = clickedDay.split("-")[0]+clickedDay.split("-")[1]


      fieldsToGetVal = ['eventName', 'userName', 'tel', 'email', 'eventHours', 'startH', 'total', 'payment'];
      var ivtosend = '';

      for (i = 0; i < fieldsToGetVal.length; i++) {

        fieldToSend = fieldsToGetVal[i];
        valueToSend = $("#"+fieldToSend).val();

        ivtosend += '"' + fieldToSend + '":"' + valueToSend + '",';

      }

  // Agregar lo que falta
      ivtosend += '"day":"' + clickedDay + '"';
      ivtosend = '{' + ivtosend + '}';

      var objson = JSON.parse(ivtosend);
      let periodMonth = clickedDay.split("-")[1]
      let periodYear = clickedDay.split("-")[0]
      let period = periodYear+''+periodMonth

      $.post( 
        'https://demo.reservarsalon.com' + 
        '/calendar/addInternal/' + 
        3 + 
        '/'+ parseInt(periodN), 
        objson ,
        function( data ){

          console.log(data);
          $("#modalAddEvent .modal-header .close").click();

      // Limpiar campos ---------------------------
          for (i = 0; i < fieldsToGetVal.length; i++) {
            fieldToSend = fieldsToGetVal[i];
            $("#"+fieldToSend).val("");
          }
      // Campos que no se mandan pero se calculan
          $("#remain").val("0");
          $("#startH").val("10:00 PM");
          $("#eventHours").simpleSlider("setValue", 1);
          $("#eventHours").val(1);

      // Remover la clase error
          $(".has-error").removeClass('has-error');      
      // End limpiar campos ------------------------

        });

    }


    function getNewData( periodVal, calendarObj ){

      $.get('https://demo.reservarsalon.com' + 
        '/calendar/json/' + 
        3 +
        '/'+ periodVal,               
        
        function(data){

          //data = JSON.parse( data );

          uuidExternal = data.uuid;


          if ( calendarObj.options.extras.uuidJson != uuidExternal ) {

            waitOnCalendarLoad(false);
            calendarObj.options.extras.uuidJson = uuidExternal;

            if ( uuidExternal === undefined ) {

              // Como no hay eventos ese mes, cambiar el uuid por periodVal, 
              // Asi no queda sin cargarse el calendario(waitOnCalendarLoad) por comparar 2 undefined
              calendarObj.options.extras.uuidJson = periodVal; 

            }else{

              // Get reservations with client data
              $.get('https://demo.reservarsalon.com' +
                '/salon/json/' + periodVal + '/?e_salon=si57',
                function( jsonFull ){
                  refreshWithNewData( calendarObj, jsonFull.events );
                  colourByStatus();
                })

            }

          }

        })

    }


    loadBySection();



  </script>




</body><!-- 
<script src="/web/js/main.js?v=1.8"></script>

--></html>