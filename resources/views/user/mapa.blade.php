@extends('principal')

@section('breadcrumb', 'mapa')
@section('Contenido')
<div class="container inicio">
    <div id="chart_div" style="margin-top: 20% !important;margin-bottom:6%"></div>

    <html>
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
          <script type="text/javascript">
            google.charts.load('current', {packages:["orgchart"]});
            google.charts.setOnLoadCallback(drawChart);

            function drawChart() {
              var data = new google.visualization.DataTable();
              data.addColumn('string', 'Name');
              data.addColumn('string', 'Manager');
              data.addColumn('string', 'ToolTip');

              // For each orgchart box, provide the name, manager, and tooltip to show.
              data.addRows([
                [{'v':'Inicio', 'f':'Presentacion<div style="color:red; font-style:italic"></div>'},
                 '', 'Inicio'],
                [{'v':'Productos', 'f':'Productos<div style="color:red; font-style:italic"></div>'},
                 'Inicio', 'Productos'],
                [{'v':'Realizar Pedido', 'f':'Realizar Pedido<div style="color:red; font-style:italic"></div>'},
                 'Productos', 'Realizar Pedido'],
                [{'v':'Mis Pedidos', 'f':'Mis Pedidos<div style="color:red; font-style:italic"></div>'},
                 'Productos', 'Mis Pedidos'],
                [{'v':'Sobre Nosotros', 'f':'Sobre Nosotros<div style="color:red; font-style:italic"></div>'},
                 'Inicio', 'Sobre Nosotros'],
                [{'v':'Preguntas Frecuentes', 'f':'Preguntas Frecuentes<div style="color:red; font-style:italic"></div>'},
                 'Inicio', 'Preguntas Frecuentes'],
                [{'v':'Contactanos', 'f':'Contactanos<div style="color:red; font-style:italic"></div>'},
                 'Inicio', 'Contactanos']
              ]);

              // Create the chart.
              var chart = new google.visualization.OrgChart(document.getElementById('chart_div'));
              // Draw the chart, setting the allowHtml option to true for the tooltips.
              chart.draw(data, {'allowHtml':true});
            }
          </script>






</div>
@endsection
