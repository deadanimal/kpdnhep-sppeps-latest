@extends('layouts.base-admin-hq')

@section('content')

    <div class="container-fluid py-4">
        <div class="p-3">

            <div>
                <h5> Peranan Pegawai</h5>
            </div>


            <div class="container-fluid mt-4" style="padding: 0px !important;">
               
                    <div class="card">

                        <div class="card-header" style="background-color: #f7e8ff;">
                            <h6> Maklumat Pegawai </h6>
                        </div>

                        <div class="card-body p-3">

                            <div class="card-body">

                                <form class="d-flex justify-content-center font-black" style="width: 100%;">
                                    <div class="d-flex justify-content-center flex-wrap" fxLayout="column"
                                        fxLayoutAlign="space-evenly stretch" style="width: 100%;">

                                        <div class="p-3" fxLayout="column" fxLayoutAlign="space-evenly stretch"
                                            style="width: 90%;" *ngFor="let infos of info">


                                            <div class="d-flex flex-nowrap">
                                                <div class="col-5 form-group p-0">
                                                    <label for="name">
                                                        <strong>No. Kad Pengenalan</strong>
                                                    </label>
                                                    <div class="d-flex flex-nowrap align-items-center">
                                                        <input type="text" class="form-control col-9"
                                                            value="{{ $pegawai->no_kp }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-1"></div>
                                                <div class="col-5 form-group pr-0">
                                                    <label for="ic"><strong> Negeri</strong></label>
                                                    <input type="text" class="form-control" value="{{ $pegawai->negeri }}"
                                                        disabled>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-nowrap">
                                                <div class="col-5 form-group p-0">
                                                    <label for="name">
                                                        <strong>Nama Staf</strong>
                                                    </label>
                                                    <div class="d-flex flex-nowrap align-items-center">
                                                        <input type="text" class="form-control col-9"
                                                            value="{{ $pegawai->name }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-1"></div>
                                                <div class="col-5 form-group pr-0">
                                                    <label for="ic"><strong> E-mel</strong></label>
                                                    <input type="text" class="form-control" value="{{ $pegawai->email }}"
                                                        disabled>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-nowrap">
                                                <div class="col-5 form-group p-0">
                                                    <label for="name">
                                                        <strong>Jawatan</strong>
                                                    </label>
                                                    <div class="d-flex flex-nowrap align-items-center">
                                                        <input type="text" class="form-control col-9"
                                                            value="{{ $pegawai->jawatan }}" disabled>
                                                    </div>
                                                </div>
                                                <div class="col-1"></div>
                                                <div class="col-5 form-group pr-0">
                                                    <label for="ic"><strong>No. Telefon</strong></label>
                                                    <input type="text" class="form-control"
                                                        value="{{ $pegawai->no_telefon_pejabat }}" disabled>
                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
					
					<form method="POST" action="/peranan_pegawai/{{$pegawai->id}}">
						@csrf
						@method('PUT')
					

						 @if ($pegawai->negeri === 'WP Putrajaya')
							<div class="container-fluid mt-4" style="padding: 0px !important;">
								<div class="card">

									<div class="card-header" style="background-color: #f7e8ff;">
										<h6>Kemaskini Peranan Pegawai </h6>
									</div>

									<div class="card-body p-3">
										<div class="d-flex justify-content-center flex-wrap" fxLayout="column"
											fxLayoutAlign="space-evenly stretch" style="width: 100%;">
											
											<input type="hidden" name="role" value="pegawai_hq">

											<div class="p-3" fxLayout="column" fxLayoutAlign="space-evenly stretch"
												style="width: 90%;">

												<div class="d-flex flex-wrap">

													<div class="row " style="width: 100%;">
														<div class="row form-group">
															Peranan Pegawai
															
														</div>
													</div>
													<div class="form-group row d-flex flex-nowrap" style="width: 100%;">
														<div class="row">
															<div class="form-check">
																<input class="form-check-input" type="checkbox"
																	name="pemproses_negeri" value="1" 
																	@foreach($pegawai->roles as $role)
																		@if($role->id == 1)
																			checked
																			@break
																		@endif
																	@endforeach
																	>
																<label class="form-check-label">Pegawai Pemproses Negeri</label>
															</div>
														</div>
													</div>
													<div class="form-group row d-flex flex-nowrap" style="width: 100%;">
														<div class="row">
															<div class="form-check">
																<input class="form-check-input" type="checkbox"
																	name="pemproses_hq" value="4"
																	@foreach($pegawai->roles as $role)
																		@if($role->id == 4)
																			checked
																			@break
																		@endif
																	@endforeach>
																<label class="form-check-label">Pegawai Pemproses HQ</label>
															</div>
														</div>
													</div>
													<div class="form-group row d-flex flex-nowrap" style="width: 100%;">
														<div class="row">
															<div class="form-check">
																<input class="form-check-input" type="checkbox" name="penyokong"
																	value="5"
																	@foreach($pegawai->roles as $role)
																		@if($role->id == 5)
																			checked
																			@break
																		@endif
																	@endforeach
																	
																	>
																<label class="form-check-label">Penyokong</label>
															</div>
														</div>
													</div>
													<div class="form-group row d-flex flex-nowrap" style="width: 100%;">
														<div class="row">
															<div class="form-check">
																<input class="form-check-input" type="checkbox" name="pelulus"
																	value="6"
																	@foreach($pegawai->roles as $role)
																		@if($role->id == 6)
																			checked
																			@break
																		@endif
																	@endforeach>
																<label class="form-check-label">Pelulus</label>
															</div>
														</div>
													</div>
													<div class="form-group row d-flex flex-nowrap" style="width: 100%;">
														<div class="row">
															<div class="form-check">
																<input class="form-check-input" type="checkbox" name="pentadbir"
																	value="7"
																	@foreach($pegawai->roles as $role)
																		@if($role->id == 7)
																			checked
																			@break
																		@endif
																	@endforeach>
																<label class="form-check-label">Pentadbir Sistem HQ</label>
															</div>
														</div>
													</div>
													<div class="form-group row d-flex flex-nowrap" style="width: 100%;">
														<div class="row">
															<div class="form-check">
																<input class="form-check-input" type="checkbox"
																	name="pengurusan_maklumat" value="8"
																	@foreach($pegawai->roles as $role)
																		@if($role->id == 8)
																			checked
																			@break
																		@endif
																	@endforeach>
																<label class="form-check-label">Pentadbir Pengurusan
																	Maklumat</label>
															</div>
														</div>
													</div>
													<div class="form-group row d-flex flex-nowrap" style="width: 100%;">
														<div class="row">
															<div class="form-check">
																<input class="form-check-input" type="checkbox"
																	name="penguatkuasa" value="9"
																	@foreach($pegawai->roles as $role)
																		@if($role->id == 9)
																			checked
																			@break
																		@endif
																	@endforeach>
																<label class="form-check-label">Penguatkuasa</label>
															</div>
														</div>
													</div>

												</div>
												<div class="d-flex flex-nowrap">
													<div class="form-group">
														<label for="content">Status</label>
														<br>
														<div class="form-check form-check-inline">
															<input class="form-check-input" type="radio" name="status"
																id="active" value="Aktif"
																@if($pegawai->status ==  "Aktif")
																	checked
																@endif>
															<label class="form-check-label" for="active">Aktif</label>
														</div>
														<div class="form-check form-check-inline">
															<input class="form-check-input" type="radio" name="status"
																id="notActive" value="Tidak Aktif"
																@if($pegawai->status ==  "Tidak Aktif")
																	checked
																@endif>
															<label class="form-check-label" for="notActive">Tidak
																Aktif</label>
														</div>
													</div>
												</div>

												<div class="p-3 d-flex justify-content-center">
													<a href="/peranan_pegawai" class="btn btn-danger text-capitalize m-1"
														>Batal</a>

													<button type="submit" class="btn btn-success text-capitalize m-1"
														>Simpan</button>
												</div>
											</div>
										</div>

									</div>
								</div>
							</div>
						@else
							<div class="container-fluid mt-4" style="padding: 0px !important;">
								<div class="card">

									<div class="card-header" style="background-color: #f7e8ff;">
										<h6>Kemaskini Peranan Pegawai </h6>
									</div>
									
									<input type="hidden" name="role" value="pegawai_negeri">

									<div class="card-body p-3">
										<div class="d-flex justify-content-center flex-wrap" fxLayout="column"
											fxLayoutAlign="space-evenly stretch" style="width: 100%;">
											
											<input type="hidden" name="role" value="pegawai_hq">

											<div class="p-3" fxLayout="column" fxLayoutAlign="space-evenly stretch"
												style="width: 90%;">

												<div class="d-flex flex-wrap">

													<div class="row " style="width: 100%;">
														<div class="row form-group">
															Peranan Pegawai
														</div>
													</div>
													<div class="form-group row d-flex flex-nowrap" style="width: 100%;">
														<div class="row">
															<div class="form-check">
																<input class="form-check-input" type="checkbox"
																	name="pemproses_negeri" value="1"
																	@foreach($pegawai->roles as $role)
																		@if($role->id == 1)
																			checked
																			@break
																		@endif
																	@endforeach
																	>
																<label class="form-check-label">Pegawai Pemproses Negeri</label>
															</div>
														</div>
													</div>
													<div class="form-group row d-flex flex-nowrap" style="width: 100%;">
														<div class="row">
															<div class="form-check">
																<input class="form-check-input" type="checkbox" name="penyokong"
																	value="2"
																	@foreach($pegawai->roles as $role)
																		@if($role->id == 2)
																			checked
																			@break
																		@endif
																	@endforeach
																	>
																<label class="form-check-label">Penyokong</label>
															</div>
														</div>
													</div>
													<div class="form-group row d-flex flex-nowrap" style="width: 100%;">
														<div class="row">
															<div class="form-check">
																<input class="form-check-input" type="checkbox" name="pelulus"
																	value="3"
																	@foreach($pegawai->roles as $role)
																		@if($role->id == 3)
																			checked
																			@break
																		@endif
																	@endforeach
																	>
																<label class="form-check-label">Pelulus</label>
															</div>
														</div>
													</div>
													<div class="form-group row d-flex flex-nowrap" style="width: 100%;">
														<div class="row">
															<div class="form-check">
																<input class="form-check-input" type="checkbox"
																	name="penguatkuasa" value="9"
																	@foreach($pegawai->roles as $role)
																		@if($role->id == 9)
																			checked
																			@break
																		@endif
																	@endforeach
																	>
																<label class="form-check-label">Penguatkuasa</label>
															</div>
														</div>
													</div>

												</div>
												<div class="d-flex flex-nowrap">
													<div class="form-group">
														<label for="content">Status</label>
														<br>
														<div class="form-check form-check-inline">
															<input class="form-check-input" type="radio" name="status"
																id="active" value="Aktif"
																@if($pegawai->status ==  "Aktif")
																	checked
																@endif>
															<label class="form-check-label" for="active">Aktif</label>
														</div>
														<div class="form-check form-check-inline">
															<input class="form-check-input" type="radio" name="status"
																id="notActive" value="Tidak Aktif"
																@if($pegawai->status ==  "Tidak Aktif")
																	checked
																@endif>
															<label class="form-check-label" for="notActive">Tidak
																Aktif</label>
														</div>
													</div>
												</div>

												<div class="p-3 d-flex justify-content-center">
													<a href="/peranan_pegawai" class="btn btn-danger text-capitalize m-1"
														value="HANTAR">Batal</a>

													<button type="submit" class="btn btn-success text-capitalize m-1"
														value="HANTAR">Simpan</button>
												</div>
											</div>
										</div>

									</div>
								</div>
							</div>
						@endif
					
					</form>


            </div>

        </div>
    @stop
