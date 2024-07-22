@php $editing = isset($order) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="number"
            label="رقم الطلبية"
            :value="old('number', ($editing ? $order->number : ''))"
            max="255"
            placeholder="رقم الطلبية"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.number
            name="total"
            label="قيمة الطلبية"
            :value="old('total', ($editing ? $order->total : ''))"
            max="255"
            step="0.01"
            placeholder="قيمة الطلبية"
            required
        ></x-inputs.number>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.checkbox
            name="is_delivered"
            label="هل تم توصيل الطلبية"
            :checked="old('is_delivered', ($editing ? $order->is_delivered : 0))"
        ></x-inputs.checkbox>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="user_id" label="الزبون" required>
            @php $selected = old('user_id', ($editing ? $order->user_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>الرجاء اختيار الزبون</option>
            @foreach($users as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
