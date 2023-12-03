@extends('layouts.app')

@section('content')

<style>
    #chart{
        width: 12%,
    }
</style>

<div style="width: 25%">
    <canvas id="myChart"></canvas>
</div>

<script>
const ctx = document.getElementById('myChart');
const data = JSON.parse('{{ $data }}')
console.log(data)
new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ['Desconectados', 'Conectados', 'Jugando'],
    datasets: [{
      label: 'Users',
      data: data,
      borderWidth: 1
    }]
  },
//   options: {
//     scales: {
//       y: {
//         beginAtZero: true
//       }
//     }
//   }
});
</script>

@endsection
