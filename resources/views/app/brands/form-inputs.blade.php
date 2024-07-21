@php $editing = isset($brand) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="name"
            label="الاسم"
            :value="old('name', ($editing ? $brand->name : ''))"
            maxlength="255"
            placeholder="الاسم"
            required
        ></x-inputs.text>
    </x-inputs.group>
</div>
