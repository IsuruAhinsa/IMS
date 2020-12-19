<form action="{{ route('update.password') }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="current_password">Current Password</label>
        <input
            type="password"
            class="form-control form-control-sm"
            id="current_password"
            placeholder="Enter Current Password"
            name="current_password"
        >
    </div>
    <div class="form-group">
        <label for="password">New Password</label>
        <input
            type="password"
            class="form-control form-control-sm"
            id="password"
            placeholder="Enter New Password"
            name="password"
        >
    </div>
    <div class="form-group">
        <label for="password_confirmation">Re-enter New Password</label>
        <input
            type="password"
            class="form-control form-control-sm"
            id="password_confirmation"
            placeholder="Re-enter New Password"
            name="password_confirmation"
        >
    </div>
    <x-SubmitButton :btnText="'Change Password'" :cancelBtnRoute="route('profile')"></x-SubmitButton>
</form>
