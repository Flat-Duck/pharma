@php $editing = isset($ad) @endphp

<div class="row">
    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="title"
            label="العنوان"
            :value="old('title', ($editing ? $ad->title : ''))"
            maxlength="255"
            placeholder="العنوان"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.textarea name="body" label="Body" maxlength="255" required
            >{{ old('body', ($editing ? $ad->body : '')) }}</x-inputs.textarea
        >
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.text
            name="offer"
            label="العرض"
            :value="old('offer', ($editing ? $ad->offer : ''))"
            maxlength="255"
            placeholder="العرض"
            required
        ></x-inputs.text>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <div
            x-data="imageViewer('{{ $editing && $ad->image ? \Storage::url($ad->image) : '' }}')"
        >
            <x-inputs.partials.label
                name="image"
                label="صورة "
            ></x-inputs.partials.label
            ><br />

            <!-- Show the image -->
            <template x-if="imageUrl">
                <img
                    :src="imageUrl"
                    class="object-cover rounded border border-gray-200"
                    style="width: 100px; height: 100px;"
                />
            </template>

            <!-- Show the gray box when image is not available -->
            <template x-if="!imageUrl">
                <div
                    class="border rounded border-gray-200 bg-gray-100"
                    style="width: 100px; height: 100px;"
                ></div>
            </template>

            <div class="mt-2">
                <input
                    type="file"
                    name="image"
                    id="image"
                    @change="fileChosen"
                />
            </div>

            @error('image') @include('components.inputs.partials.error')
            @enderror
        </div>
    </x-inputs.group>

    <x-inputs.group class="col-sm-12">
        <x-inputs.select name="product_id" label="المنتج" required>
            @php $selected = old('product_id', ($editing ? $ad->product_id : '')) @endphp
            <option disabled {{ empty($selected) ? 'selected' : '' }}>الرجاء اختيار المنتج</option>
            @foreach($products as $value => $label)
            <option value="{{ $value }}" {{ $selected == $value ? 'selected' : '' }} >{{ $label }}</option>
            @endforeach
        </x-inputs.select>
    </x-inputs.group>
</div>
