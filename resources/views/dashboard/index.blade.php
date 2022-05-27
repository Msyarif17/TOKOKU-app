@extends('layouts.dashboard')
@section('content')


<section class="content pt-4">
    @if ($message != '')
	<div class="alert alert-warning alert-block">
		<button type="button" class="close" data-dismiss="alert">×</button>    
		<p>{!! $message !!}</p>
	</div>
	@endif
    @include('layouts.flash')    
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
							
							<i class="fa fa-users logo-dashboard" aria-hidden="true"></i>
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