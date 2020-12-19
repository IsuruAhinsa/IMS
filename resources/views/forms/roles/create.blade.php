<form action="{{ $route }}" method="POST">

    @csrf

    @if(Route::currentRouteName() == 'roles.edit')
        @method('PUT')
    @endif

    <div class="form-group">
        <label for="name">Role Name</label>
        <input
            type="text"
            class="form-control form-control-sm rounded-0"
            id="name"
            placeholder="Enter Role Name"
            name="name"
            value="{{ $nameVal }}"
        >
    </div>

    <div class="form-group">

        <label for="permissions">Permissions</label>
        <br>

        <div class="icheck-{{ $commonSetting ? $commonSetting->skin : 'primary' }} d-inline">
            <input
                type="checkbox"
                id="checkPermissionAll"
                value="1"
                @if(Route::currentRouteName() == 'roles.edit')
                    {{ App\User::roleHasPermissions($role, $allPermissions) ? 'checked' : '' }}
                @endif
            >
            <label class="font-weight-normal" for="checkPermissionAll">All</label>
        </div>

        <hr>

        @php $i = 1; @endphp
        @foreach($permissionGroups as $permissionGroup)

            <div class="row">

                @php
                    $permissions = App\User::getpermissionsByGroupName($permissionGroup->name);
                    $j = 1;
                @endphp

                <div class="col-md-3">

                    <div class="icheck-{{ $commonSetting ? $commonSetting->skin : 'primary' }} d-inline">
                        <input
                            type="checkbox"
                            id="{{ $i }}Management"
                            value="{{ $permissionGroup->name }}"
                            onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)"
                            @if(Route::currentRouteName() == 'roles.edit')
                                {{ App\User::roleHasPermissions($role, $permissions) ? 'checked' : '' }}
                            @endif
                        >
                        <label class="font-weight-normal" for="{{ $i }}Management">{{ $permissionGroup->name }}</label>
                    </div>

                </div>

                <div class="col-md-9 role-{{ $i }}-management-checkbox">

                    @foreach($permissions as $permission)

                        <div class="icheck-{{ $commonSetting ? $commonSetting->skin : 'primary' }} d-inline">
                            <input
                                type="checkbox"
                                id="checkPermission{{ $permission->id }}"
                                name="permissions[]"
                                value="{{ $permission->name }}"
                                @if(Route::currentRouteName() == 'roles.edit')
                                    {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }}
                                @endif
                                onclick="checkSinglePermission('role-{{ $i }}-management-checkbox', '{{ $i }}Management', {{ count($permissions) }})"
                            >
                            <label class="font-weight-normal" for="checkPermission{{ $permission->id }}">{{ ucwords(\Illuminate\Support\Str::replaceFirst('.', ' ', $permission->name)) }}</label>
                        </div>

                        <br>
                        @php  $j++; @endphp
                    @endforeach

                </div>

            </div>

            <hr>
            @php  $i++; @endphp
        @endforeach

    </div>

    <x-SubmitButton :btnText="$btnText" :cancelBtnRoute="route('roles.index')"></x-SubmitButton>

</form>

@push('js')
    <script src="{{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            bsCustomFileInput.init();
            // check and uncheck all the permission
            $("#checkPermissionAll").click(function () {
                if($(this).is(':checked')) {
                    $('input[type=checkbox]').prop('checked', true);
                } else {
                    $('input[type=checkbox]').prop('checked', false);
                }
            })
        });

        function checkPermissionByGroup(className, checkThis){
            const groupIdName = $("#"+checkThis.id);
            const classCheckBox = $('.'+className+' input');
            if(groupIdName.is(':checked')){
                classCheckBox.prop('checked', true);
            }else{
                classCheckBox.prop('checked', false);
            }
            implementAllChecked();
        }

        function checkSinglePermission(groupClassName, groupID, countTotalPermission) {
            const classCheckbox = $('.'+groupClassName+ ' input');
            const groupIDCheckBox = $("#"+groupID);
            // if there is any occurance where something is not selected then make selected = false
            if($('.'+groupClassName+ ' input:checked').length == countTotalPermission){
                groupIDCheckBox.prop('checked', true);
            }else{
                groupIDCheckBox.prop('checked', false);
            }
            implementAllChecked();
        }

        function implementAllChecked() {
            const countPermissions = {{ count($allPermissions) }};
            const countPermissionGroups = {{ count($permissionGroups) }};
            //  console.log((countPermissions + countPermissionGroups));
            //  console.log($('input[type="checkbox"]:checked').length);
            if($('input[type="checkbox"]:checked').length >= (countPermissions + countPermissionGroups)){
                $("#checkPermissionAll").prop('checked', true);
            }else{
                $("#checkPermissionAll").prop('checked', false);
            }
        }
    </script>
@endpush
