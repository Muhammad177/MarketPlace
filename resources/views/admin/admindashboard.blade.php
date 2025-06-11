@extends('admin.dashboard.main')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
  <h1>Hallo {{ auth()->user()->name }}</h1>
</div>

<div class="row">
  <div class="col-md-6">
    <canvas id="postUserPieChart" width="400" height="400"></canvas>
  </div>
  <div class="col-md-6">
    <div class="card">
      <div class="card-header">
        <h5 class="mb-0">🏆 Top 3 Users with Most Posts</h5>
      </div>
      <div class="list-group list-group-flush">
        @foreach($topUsers as $user)
          <div class="list-group-item d-flex justify-content-between align-items-center">
            <div>{{ $user->name }}</div>
            <span class="badge bg-primary rounded-pill">{{ $user->posts_count }} Posts</span>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</div>

{{-- Script Chart --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('postUserPieChart').getContext('2d');
const postUserPieChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Posts', 'Users'],
        datasets: [{
            label: 'Jumlah',
            data: [{{ $postCount }}, {{ $userCount }}],
            backgroundColor: [
                'rgba(54, 162, 235, 0.7)', // biru
                'rgba(255, 99, 132, 0.7)'  // merah
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(255, 99, 132, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true
    }
});
</script>
@endsection
