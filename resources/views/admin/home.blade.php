@extends('layouts.app')

@section('content')

<style>
    #chart{
        width: 12%,
    }
</style>
<div class="container">
    <div class="row">
        <div class="col">
            <nav class="nav flex-column">
                <a class="nav-link" aria-current="page" href='{{ route("admin.carta") }}'>{{ __('Add Card') }}</a>
                {{-- <a class="nav-link" aria-current="page" href='{{  route("admin.update.carta")  }}'>{{ __('Update Card') }}</a> --}}
              </nav>
        </div>
        <div class="col" style="width: 25%">
            <canvas  id="myChart"></canvas>
        </div>

        {{-- TODO --}}
        <table class="table col">
            <thead class="thead-dark">
              <tr class="table-dark">
                <th scope="col">ID</th>
                <th scope="col">Nick</th>
                <th scope="col">Last</th>
                <th scope="col">Handle</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
              </tr>
            </tbody>
          </table>



    </div>

</div>

<script>
const ctx = document.getElementById('myChart');
const data = JSON.parse('{{ $data }}')
// console.log(data);
new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ['Desconectados', 'Conectados', 'Jugando'],
    datasets: [{
      label: 'Users',
      data: data,
      borderWidth: 1
    }]
  }
});

</script>

@endsection
