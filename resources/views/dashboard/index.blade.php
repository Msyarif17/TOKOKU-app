@extends('layouts.dashboard')
@section('content')


<section class="content pt-4">
    @if (count($message) !=0)
	@foreach ($message as $m)
	<div class="alert alert-warning alert-block">
		<button type="button" class="close" data-dismiss="alert">×</button>    
		<p>{!! $m !!}</p>
	</div>
	@endforeach
	
	@endif
    @include('layouts.flash') 
	<div class="row">
		<div class="col-md-4 col-sm-12 pb-4 box-size-1">
			<div class="card card-primary">
				<div class="card-header">
					<div class="card-title">
						Laba Bersih Harian
					</div>
				</div>
				
				<div class="card-body p-0">
					<div class="chart">
						<canvas id="harian" ></canvas>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4 col-sm-12 pb-4 box-size-1">
			<div class="card card-warning">
				<div class="card-header">
					<div class="card-title">
						Laba Bersih Mingguan
					</div>
				</div>
				<div class="card-body p-0">
					<div class="chart">
						<canvas id="mingguan" ></canvas>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4 col-sm-12 pb-4 box-size-1">
			<div class="card card-success">
				<div class="card-header">
					<div class="card-title">
						Laba Bersih Bulanan
					</div>
				</div>
				<div class="card-body p-0">
					<div class="chart">
						<canvas id="bulanan" ></canvas>
					</div>
				</div>
			</div>
		</div></div>   
    <div class="row">
		
        <div class="col-md-4 col-sm-12 pb-4 box-size-1">
			<a href="#">
				<div class="card bg-warning text-light border-0  overflow-hidden shadow">
					<div class="card-header border-0 bg-transparent text-light text-capitalize">
						<h4 class="">Jumlah Barang Keseluruhan</h4>
					</div>
					<div class="card-body">
						<div class="text-left text-light">
							<h1>{{$barang}}</h1>
						</div>
						<div class="text-right" style="margin-top: -20px;">
							
							<i class="fa fa-eye logo-dashboard" aria-hidden="true"></i>
						</div>

					</div>
				</div>
			</a>
		</div>
        <div class="col-md-4 col-sm-12 pb-4 box-size-1">
			<a href="">
				<div class="card bg-primary text-light border-0  overflow-hidden shadow">
					<div class="card-header border-0 bg-transparent text-light text-capitalize">
						<h4 class="">Nilai Asset Keseluruhan</h4>
					</div>
					<div class="card-body">
						<div class="text-left text-light">
							<h1>Rp. {{$asset}},-</h1>
						</div>
						<div class="text-right" style="margin-top: -20px;">
							
							<i class="fa fa-wallet logo-dashboard" aria-hidden="true"></i>
						</div>
					</div>
				</div>
			</a>
		</div>
		
		<div class="col-md-4 col-sm-12 pb-4 box-size-1">
			<a href="#">
				<div class="card bg-secondary text-light border-0  overflow-hidden shadow">
					<div class="card-header border-0 bg-transparent text-light text-capitalize">
						<h4 class="">Total Penjualan Harian</h4>
					</div>
					<div class="card-body">
						<div class="text-left text-light py-0 my-0">
							<div class="row">
								<div class="col-6">
									<p class="py-0 my-0">Barang</p>
									<p class="py-0 my-0">{{$harian['barang']}}</p>
								</div>
								<div class="col-6">
									<p class="py-0 my-0">Total Pendapatan</p>
									<p class="py-0 my-0">Rp.{{$harian['pendapatan']}}</p>
								</div>
							</div>
	
							

						</div>
						<div class="text-right" style="margin-top: -20px;">
							
							<i class="fa fa-file logo-dashboard" aria-hidden="true"></i>
						</div>

					</div>
				</div>
			</a>
		</div>
        <div class="col-md-4 col-sm-12 pb-4 box-size-1">
			<a href="">
				<div class="card bg-dark text-light border-0  overflow-hidden shadow">
					<div class="card-header border-0 bg-transparent text-light text-capitalize">
						<h4 class="">Total Penjualan Bulanan</h4>
					</div>
					<div class="card-body">
						<div class="text-left text-light py-0 my-0">
							<div class="row">
								<div class="col-6">
									<p class="py-0 my-0">Barang</p>
									<p class="py-0 my-0">{{$bulanan['barang']}}</p>
								</div>
								<div class="col-6">
									<p class="py-0 my-0">Total Pendapatan</p>
									<p class="py-0 my-0">Rp.{{$bulanan['pendapatan']}}</p>
								</div>
							</div>
						</div>
						<div class="text-right" style="margin-top: -20px;">
							
							<i class="fa fa-file logo-dashboard" aria-hidden="true"></i>
						</div>

					</div>
				</div>
			</a>
		</div>
        
        <div class="col-md-4 col-sm-12 pb-4 box-size-1">
			<a href="">
				<div class="card bg-success text-light border-0  overflow-hidden shadow">
					<div class="card-header border-0 bg-transparent text-light text-capitalize">
						<h4 class="">Jumlah Supplyer</h4>
					</div>
					<div class="card-body">
						<div class="text-left text-light">
							<h1>{{$supplyer}}</h1>
						</div>
						<div class="text-right" style="margin-top: -20px;">
							
							<i class="fa fa-users logo-dashboard" aria-hidden="true"></i>
						</div>

					</div>
				</div>
			</a>
		</div>
        <div class="col-md-4 col-sm-12 pb-4 box-size-1">
			<a href="">
				<div class="card text-light border-0  overflow-hidden shadow" style="background-color: #7868E6">
					<div class="card-header border-0 bg-transparent text-light text-capitalize">
						<h4 class="">Admin</h4>
					</div>
					<div class="card-body">
						<div class="text-left text-light">
							<h1>{{$admin}}</h1>
						</div>
						<div class="text-right" style="margin-top: -20px;">
							
							<i class="fa fa-user logo-dashboard" aria-hidden="true"></i>
						</div>

					</div>
				</div>
			</a>
		</div>
    </div>
</section>
@stop
@push('js')
	<script>
const harian = document.getElementById('harian').getContext('2d');
const mingguan = document.getElementById('mingguan').getContext('2d');
const bulanan = document.getElementById('bulanan').getContext('2d');
const harianC = new Chart(harian, {
    type: 'line',
    data: {
        labels: {!!$chart['label'][0]!!},
        datasets: [{
            label: 'Penghasilan Harian',
			data: {!!$chart['data'][0]!!},
                  backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
const mingguanC = new Chart(mingguan, {
    type: 'line',
    data: {
        labels: {!!$chart['label'][1]!!},
        datasets: [{
            label: 'Penghasilan Mingguan',
			data: {!!$chart['data'][1]!!},
                  backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
const bulananC = new Chart(bulanan, {
    type: 'line',
    data: {
        labels: {!!$chart['label'][2]!!},
        datasets: [{
            label: 'Penghasilan Bulanan',
			data: {!!$chart['data'][2]!!},
                  backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
	</script>
@endpush