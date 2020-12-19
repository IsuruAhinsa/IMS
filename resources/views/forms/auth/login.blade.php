<form action="{{ route('login') }}" method="POST">
    @csrf
    <div class="input-group mb-3">
        <input
            type="email"
            class="form-control form-control-sm @error('email') is-invalid @enderror"
            placeholder="Email"
            name="email"
            value="{{ old('email') }}"
            required
            autocomplete="email"
            autofocus
        >
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-envelope"></span>
            </div>
        </div>
        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="input-group mb-3">
        <input
            type="password"
            class="form-control form-control-sm @error('password') is-invalid @enderror"
            placeholder="Password"
            name="password"
            required
            autocomplete="current-password"
        >
        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>

    <div class="row">
        <div class="col">
            <div class="icheck-primary">
                <input
                    type="checkbox"
                    name="remember"
                    id="remember" {{ old('remember') ? 'checked' : '' }}
                >
                <label for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>
        </div>
    </div>

    <button type="submit" class="btn btn-primary btn-block mt-2">
        {{ __('Login') }}
    </button>

</form>
