@extends('layouts.app')

@section('title', 'Dashboard - Panel de Administración Proyecto UNEDL')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

@section('contents')
<div class="container-fluid py-4">
    <div class="row">
      <div class="col-xl-3 col-sm-6">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10"><span class="material-symbols-outlined">
                restore_from_trash
                </span></i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Bolsas Recolectadas</p>
              <h4 class="mb-0">{{ $totalbags }} Bolsas</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
            {{-- <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5% </span>que el mes pasado</p> --}}
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-warning shadow-warning text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">view_in_ar</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Metros Cúbicos</p>
              <h4 class="mb-0">{{ $totalm3 }} m3</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">recycling</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Total de Separaciones</p>
              <h4 class="mb-0">{{ count($separations) }}</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
           
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">dashboard</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Materiales</p>
              <h4 class="mb-0">{{ count($materials) }} </h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-sm-6 mt-4 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">payment</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Pagos</p>
              <h4 class="mb-0">$ {{ $totalpayment }}</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">

          </div>
        </div>
      </div>
      <div class="col-xl-4 mt-4 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">checklist</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Kilos Recolectados</p>
              <h4 class="mb-0">{{ $totalweigth }} Kgs</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
          </div>
        </div>
      </div>
      <div class="col-xl-4 col-sm-6 mt-4 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <div class="icon icon-lg icon-shape bg-gradient-danger shadow-danger text-center border-radius-xl mt-n4 position-absolute">
              <i class="material-icons opacity-10">delete</i>
            </div>
            <div class="text-end pt-1">
              <p class="text-sm mb-0 text-capitalize">Merma</p>
              <h4 class="mb-0">{{ $totalmerma }} Kgs</h4>
            </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">

          </div>
        </div>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-lg-6 col-md-6 mt-4 mb-4">
        <div class="card z-index-2  ">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
            <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1">
              <div class="chart">
                <canvas id="chart-line" class="chart-canvas" height="170"></canvas>
              </div>
            </div>
          </div>
          <div class="card-body">
            <h6 class="mb-0 "> Pagos </h6>
            <hr class="dark horizontal">
            <div class="d-flex ">
              <i class="material-icons text-sm my-auto me-1">schedule</i>
              <p class="mb-0 text-sm"> Año 2024 </p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-6 mt-4 mb-3">
        <div class="card z-index-2 ">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 bg-transparent">
            <div class="bg-gradient-dark shadow-dark border-radius-lg py-3 pe-1">
              <div class="chart">
                <canvas id="chart-line-tasks" class="chart-canvas" height="170"></canvas>
              </div>
            </div>
          </div>
          <div class="card-body">
            <h6 class="mb-0 ">Kilos Recolectados</h6>
            <hr class="dark horizontal">
            <div class="d-flex ">
              <i class="material-icons text-sm my-auto me-1">schedule</i>
              <p class="mb-0 text-sm">Año 2024</p>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection
<script>
$(document).ready(function(){
  var separations =  {!! json_encode($separations) !!};
  var ene = 0;
  var feb = 0;
  var mar = 0;
  var abr = 0;
  var may = 0;
  var jun = 0;
  var jul = 0;
  var ago = 0;
  var sep = 0;
  var oct = 0;
  var nov = 0;
  var dic = 0;

  var enekgs = 0;
  var febkgs = 0;
  var markgs = 0;
  var abrkgs = 0;
  var maykgs = 0;
  var junkgs = 0;
  var julkgs = 0;
  var agokgs = 0;
  var sepkgs = 0;
  var octkgs = 0;
  var novkgs = 0;
  var dickgs = 0;

  for(i=0; i< separations.length; i++){
    if(separations[i]['updated_at'].slice(5, 7) == '01'){
      ene += separations[i]['payment']; 
      enekgs += separations[i]['weight']; 
    }
    if(separations[i]['updated_at'].slice(5, 7) == '02'){
      feb += separations[i]['payment']; 
      febkgs += separations[i]['weight']; 
    }
    if(separations[i]['updated_at'].slice(5, 7) == '03'){
      mar += separations[i]['payment']; 
      markgs += separations[i]['weight']; 
    }
    if(separations[i]['updated_at'].slice(5, 7) == '04'){
      abr += separations[i]['payment']; 
      abrkgs += separations[i]['weight']; 
    }
    if(separations[i]['updated_at'].slice(5, 7) == '05'){
      may += separations[i]['payment']; 
      maykgs += separations[i]['weight']; 
    }
    if(separations[i]['updated_at'].slice(5, 7) == '06'){
      jun += separations[i]['payment']; 
      junkgs += separations[i]['weight']; 
    }
  //console.log(separations[i]['updated_at'].slice(5, 7));
  }
  //console.log(separations[0]['created_at']);
var ctx2 = document.getElementById("chart-line").getContext("2d");
new Chart(ctx2, {
  type: "line",
  data: {
    labels: ["Ene","Feb","Mar","Abr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    datasets: [{
      label: "Mobile apps",
      tension: 0,
      borderWidth: 0,
      pointRadius: 5,
      pointBackgroundColor: "rgba(255, 255, 255, .8)",
      pointBorderColor: "transparent",
      borderColor: "rgba(255, 255, 255, .8)",
      borderColor: "rgba(255, 255, 255, .8)",
      borderWidth: 4,
      backgroundColor: "transparent",
      fill: true,
      data: [ene, feb, mar, abr, may, jun, 0, 0, 0,0,0,0],
      maxBarThickness: 6
    }],
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
      legend: {
        display: false,
      }
    },
    interaction: {
      intersect: false,
      mode: 'index',
    },
    scales: {
      y: {
        grid: {
          drawBorder: false,
          display: true,
          drawOnChartArea: true,
          drawTicks: false,
          borderDash: [5, 5],
          color: 'rgba(255, 255, 255, .2)'
        },
        ticks: {
          display: true,
          color: '#f8f9fa',
          padding: 10,
          font: {
            size: 14,
            weight: 300,
            family: "Roboto",
            style: 'normal',
            lineHeight: 2
          },
        }
      },
      x: {
        grid: {
          drawBorder: false,
          display: false,
          drawOnChartArea: false,
          drawTicks: false,
          borderDash: [5, 5]
        },
        ticks: {
          display: true,
          color: '#f8f9fa',
          padding: 10,
          font: {
            size: 14,
            weight: 300,
            family: "Roboto",
            style: 'normal',
            lineHeight: 2
          },
        }
      },
    },
  },
});
var ctx3 = document.getElementById("chart-line-tasks").getContext("2d");
new Chart(ctx3, {
  type: "line",
  data: {
    labels: ["Ene","Feb","Mar","Abr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
    datasets: [{
      label: "Mobile apps",
      tension: 0,
      borderWidth: 0,
      pointRadius: 5,
      pointBackgroundColor: "rgba(255, 255, 255, .8)",
      pointBorderColor: "transparent",
      borderColor: "rgba(255, 255, 255, .8)",
      borderWidth: 4,
      backgroundColor: "transparent",
      fill: true,
      data: [enekgs, febkgs, markgs, abrkgs, maykgs, junkgs, 0, 0, 0,0,0,0],
      maxBarThickness: 6
    }],
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
      legend: {
        display: false,
      }
    },
    interaction: {
      intersect: false,
      mode: 'index',
    },
    scales: {
      y: {
        grid: {
          drawBorder: false,
          display: true,
          drawOnChartArea: true,
          drawTicks: false,
          borderDash: [5, 5],
          color: 'rgba(255, 255, 255, .2)'
        },
        ticks: {
          display: true,
          padding: 10,
          color: '#f8f9fa',
          font: {
            size: 14,
            weight: 300,
            family: "Roboto",
            style: 'normal',
            lineHeight: 2
          },
        }
      },
      x: {
        grid: {
          drawBorder: false,
          display: false,
          drawOnChartArea: false,
          drawTicks: false,
          borderDash: [5, 5]
        },
        ticks: {
          display: true,
          color: '#f8f9fa',
          padding: 10,
          font: {
            size: 14,
            weight: 300,
            family: "Roboto",
            style: 'normal',
            lineHeight: 2
          },
        }
      },
    },
  },
});
});
</script>
