@extends('layouts.admin')
@section('title', 'Inicio')
@section('content')
<div class="container">
  <div class="row">
    <div class="col-lg-12 col-6">
      <div class="card">
        @php
         $ente = App\Models\Ente::find($id)
        @endphp
        <div class="title ml-2 mb-2">
          <h3>Resultado de votaciones por parte de {{ $ente->descripcion }} </h3>
        </div>
        <div class="card-body">
          <canvas id="donutChart" style="height:250px;"></canvas>
        </div>
        <div class="card-footer">
          Cantidad de funcionarios que votaron : {{ $voto }}  <p class="float-right">Cantidad de funcionarios que no votaron: {{ $novoto }}</p>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection
 
@push('scripts')

<script>
  $(function () {
   


    //-------------
    //- DONUT CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData        = {
      labels: [
          'Votó',
          'No votó',
      ],
      datasets: [
        {
          data: [{{ $voto }},{{ $novoto }}],
          backgroundColor : ['#00a65a', '#f56954'],
        }
      ]
    }
    var donutOptions     = {
      maintainAspectRatio : true,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    new Chart(donutChartCanvas, {
      type: 'doughnut',
      data: donutData,
      options: donutOptions
    })

   

    
  })
</script>
@endpush
