@extends('layouts.admin')
@section('title','Roles')
@section('page_title', 'Buscar resultados por gerencia')
@section('content')

      <div class="container">
        <div class="col-md-6">
          <div class="btn-group">
           
           @can('RegistrarRole')
            <div class="btn-group">
             <button type="button" class="btn btn-primary blue darken-4 mb-4" data-toggle="modal" data-target="#createModalRole"><i class="fa fa-plus-square"></i> Agregar role </button>
             </div><br> 
           @endcan
          </div>
        </div>
      <br>
      <div class="row">
        <div class="col-md-12">
          <div class="card card-line-primary">
            <div class="card-header  ">
              <h5>Resultados por gerencia</h5>
             
            </div>

                 <div class="card-body">
                  {{ $descripcion }}
                   
                     <div  id="chart9" style="width:100%; min-height:410px;"></div>
                  
                
                 </div>
    
                  {!! Form::close()!!}
                </div>
                <!-- /.card-body -->
            </div>
        </div>
   
      </div>

      </div>

@endsection
@push('scripts')
  <script type="text/javascript">
    $(function () {
    chart8();
});
    function chart8() {
  // Themes begin
  am4core.useTheme(am4themes_animated);
  // Themes end

  // Create chart instance
  var chart = am4core.create("chart9", am4charts.PieChart);

  // Add data
  chart.data = [{
    "country": "FUNCIONARIOS QUE EJERCIERON EL VOTO",
    "litres":  {{$voto}},
  }, 
  {
    "country": "FUNCIONARIOS QUE NO EJERCIERON EL VOTO",
    "litres":{{$Novoto}},
  }
    ];

  // Add and configure Series
  var pieSeries = chart.series.push(new am4charts.PieSeries());
  pieSeries.dataFields.value = "litres";
  pieSeries.dataFields.category = "country";
  pieSeries.slices.template.stroke = am4core.color("#1A8F03");
  pieSeries.slices.template.strokeWidth = 0;
  pieSeries.width = 100;
  pieSeries.slices.template.strokeOpacity = 1;
  pieSeries.labels.template.fill = am4core.color("#027538");

  // This creates initial animation
  pieSeries.hiddenState.properties.opacity = 1;
  pieSeries.hiddenState.properties.endAngle = 40;
  pieSeries.hiddenState.properties.startAngle = 40;
 
}
  
 

  </script>
  @endpush