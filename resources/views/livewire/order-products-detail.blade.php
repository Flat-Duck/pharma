<div>
    <div class="mb-4">
        @can('create', App\Models\Product::class)
        <button class="btn btn-primary" wire:click="newProduct">
            <i class="icon ion-md-add"></i>
            @lang('crud.common.attach')
        </button>
        @endcan
    </div>

    <x-modal id="extoutbox-attachments-modal" wire:model="showingModal">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $modalTitle }}</h5>
                <button type="button" class="btn close badge bg-red text-red-fg badge-pill" wire:click="$toggle('showingModal')" data-dismiss="modal" aria-label="Close" data-bs-dismiss="modal" style="
                max-width: 25px;
                max-height: 25px;
                margin-top: 0px;
                margin-left: -40px;
                ">
                <i class="ti ti-x"></i> </button>
            </div>


            <div class="modal-body">
                <div>
                    <x-inputs.group class="col-sm-12">
                        <x-inputs.select
                            name="product_id"
                            label="المنتج"
                            wire:model="product_id"
                        >
                            <option value="null" disabled>الرجاء اختيار منتج</option>
                            @foreach($productsForSelect as $value => $label)
                            <option value="{{ $value }}"  >{{ $label }}</option>
                            @endforeach
                        </x-inputs.select>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.number
                            name="quantity"
                            label="الكمية"
                            wire:model="quantity"
                            max="255"
                            placeholder="الكمية"
                        ></x-inputs.number>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.number
                            name="price"
                            label="السعر"
                            wire:model="price"
                            max="255"
                            step="0.01"
                            placeholder="السعر"
                        ></x-inputs.number>
                    </x-inputs.group>

                    <x-inputs.group class="col-sm-12">
                        <x-inputs.number
                            name="total"
                            label="المجموع"
                            wire:model="total"
                            max="255"
                            step="0.01"
                            placeholder="المجموع"
                        ></x-inputs.number>
                    </x-inputs.group>
                </div>
            </div>

            <div class="modal-footer">
                <button
                    type="button"
                    class="btn btn-light float-left"
                    wire:click="$toggle('showingModal')"
                >
                    <i class="icon ion-md-close"></i>
                    @lang('crud.common.cancel')
                </button>

                <button type="button" class="btn btn-primary" wire:click="save">
                    <i class="icon ion-md-save"></i>
                    @lang('crud.common.save')
                </button>
            </div>
        </div>
    </x-modal>

    <div class="table-responsive">
        <table class="table table-borderless table-hover">
            <thead>
                <tr>
                    <th class="text-left">
                        @lang('crud.order_products.inputs.product_id')
                    </th>
                    <th class="text-right">
                        @lang('crud.order_products.inputs.quantity')
                    </th>
                    <th class="text-right">
                        @lang('crud.order_products.inputs.price')
                    </th>
                    <th class="text-right">
                        @lang('crud.order_products.inputs.total')
                    </th>
                    <th></th>
                </tr>
            </thead>
            <tbody class="text-gray-600">
                @foreach ($orderProducts as $product)
                <tr class="hover:bg-gray-100">
                    <td class="text-left">{{ $product->name ?? '-' }}</td>
                    <td class="text-right">
                        {{ $product->ordered->quantity ?? '-' }}
                    </td>
                    <td class="text-right">
                        {{ $product->ordered->price ?? '-' }}
                    </td>
                    <td class="text-right">
                        {{ $product->ordered->total ?? '-' }}
                    </td>
                    <td class="text-right" style="width: 70px;">
                        <div
                            role="group"
                            aria-label="Row Actions"
                            class="relative inline-flex align-middle"
                        >
                            @can('delete-any', App\Models\Product::class)
                            <button
                                class="btn btn-danger"
                                onclick="confirm('Are you sure?') || event.stopImmediatePropagation()"
                                wire:click="detach('{{ $product->id }}')"
                            >
                                <i class="icon ion-md-trash"></i>
                                @lang('crud.common.detach')
                            </button>
                            @endcan
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="5">{{ $orderProducts->render() }}</td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>
