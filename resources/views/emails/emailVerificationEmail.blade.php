<div class="bg-light p-5 rounded">
    <h1>Hello, {{ $user->name }}</h1>

    In order to be able to login, please click on the button below to verify your email address
    <form action="" class="d-inline">
        @csrf
        <button type="submit" class="d-inline btn btn-link p-0">
            <a href="{{ route('user.verify', $token) }}>Verify Email Address</a>
        </button>.
    </form>
</div>
