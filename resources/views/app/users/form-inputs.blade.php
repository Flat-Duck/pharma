@php $editing = isset($user) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="الاسم"
            :value="old('name', ($editing ? $user->name : ''))"
            maxlength="255"
            placeholder="الاسم"
            required
        ></x-inputs.text>
    </x-inputs.group>
    
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="phone"
            label="رقم الهاتف"
            :value="old('phone', ($editing ? $user->phone : ''))"
            maxlength="255"
            placeholder="رقم الهاتف"
            required
        ></x-inputs.text>
    </x-inputs.group>
    
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="address"
            label="العنوان"
            :value="old('address', ($editing ? $user->address : ''))"
            maxlength="255"
            placeholder="العنوان"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.email
            name="email"
            label="البريد الالكتروني"
            :value="old('email', ($editing ? $user->email : ''))"
            maxlength="255"
            placeholder="البريد الالكتروني"
            required
        ></x-inputs.email>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.password
            name="password"
            label="كلمة المرور"
            maxlength="255"
            placeholder="كلمة المرور"
            :required="!$editing"
        ></x-inputs.password>
    </x-inputs.group>

    <div class="form-group col-sm-12 mt-4">
        <h4>Assign @lang('crud.roles.name')</h4>

        @foreach ($roles as $role)
        <div>
            <x-inputs.checkbox
                id="role{{ $role->id }}"
                name="roles[]"
                label="{{ ucfirst($role->name) }}"
                value="{{ $role->id }}"
                :checked="isset($user) ? $user->hasRole($role) : false"
                :add-hidden-value="false"
            ></x-inputs.checkbox>
        </div>
        @endforeach
    </div>
</div>
