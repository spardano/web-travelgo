<div>
    <div class="container">
        <div class="row justify-content-center">

            @if (empty(Session::get('access_token')))
                <div class="col-md-12">
                    <div class="card border-0 rounded shadow">
                        <div class="card-body">

                            <div class="py-4">
                                @include('components.alert-small')
                            </div>

                            @if ($isRegistrationEnabled == false)
                            <h5 class="text-center"> <i class="fa fa-user-circle"></i> LOGIN</h5>
                            <hr>
                                <form wire:submit.prevent="login">

                                    <div class="form-group mt-4">
                                        <label class="font-weight-bold">ALAMAT EMAIL</label>
                                        <input type="text" wire:model.lazy="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            placeholder="Alamat Email">
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <div class="form-group mt-4">
                                        <label class="font-weight-bold">PASSWORD</label>
                                        <input type="password" wire:model.lazy="password"
                                            class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                                        @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-block mt-4">LOGIN</button>
                                </form>

                            @else
                            <h5 class="text-center"> <i class="fa fa-user-plus"></i> REGISTER</h5>
                            <hr>
                            <form wire:submit.prevent="registrasi">
    
                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label class="font-weight-bold">NAMA LENGKAP</label>
                                        <input type="text" wire:model.lazy="name" class="form-control @error('name') is-invalid @enderror"
                                            placeholder="Nama lengkap">
                                        @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label class="font-weight-bold">ALAMAT EMAIL</label>
                                        <input type="text" wire:model.lazy="email" class="form-control @error('email') is-invalid @enderror"
                                            placeholder="Alamat Email">
                                        @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label class="font-weight-bold">PASSWORD</label>
                                        <input type="password" wire:model.lazy="password"
                                            class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                                        @error('password')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-12 mt-3">
                                    <div class="form-group">
                                        <label class="font-weight-bold">KONFIRMASI PASSWORD</label>
                                        <input type="password" wire:model.lazy="password_confirmation"
                                            class="form-control" placeholder="Konfirmasi Password">
                                    </div>
                                </div>
    
                                
                                <button type="submit" class="btn btn-primary btn-block mt-4">REGISTER</button>

                            </form>

                            @endif
                            
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    @if ($isRegistrationEnabled == false)
                        <p>Belum Memiliki Akun ?. <a wire:click="enableRegistration()" href="#"><b>Registrasi Disini</b></a></p>
                    @else
                        <p>Sudah Memiliki Akun ?. <a wire:click="enableRegistration()" href="#"><b>Login Disini</b></a></p>
                    @endif
                </div>
            @else
                
        
                <img src="{{asset('assets/img/travelgo2.png')}}" class="img-rounded" style="width: 40%" alt="">

                <div class="text-center mt-3">
                    <p>{{ Session::get('email_cus') }}</h5>
                </div>

                <button class="mt-2 btn btn-warning" wire:click="logout()">Log Out</button>
            
            @endif
            
        </div>
    </div>
</div>
