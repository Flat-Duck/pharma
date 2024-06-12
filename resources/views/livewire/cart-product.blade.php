<tr class="col-md-8 mb-5">
    <td class="pd">
        <div class="product-detail-box">
            <div class="img-block">
                <a href="{{route('shop.products.show', $product)}}"><img src="{{asset($product->image)}}" alt="{{$product->name}}" style="max-height: 100px;"></a>
            </div>
            <div>
                <h5 class="dark-gray">{{$product->name}}</h5>
            </div>
        </div>
    </td>
    <td> <h5 class="dark-gray">{{$product->price}} د.ل </h5></td>
    <td>
        <div class="quantity quantity-wrap">
            <input class="decrement" type="button" value="-" wire:click.debounce="decrement">
            <input type="text" name="productQuantity" value="1" maxlength="2" size="1" wire:model="productQuantity" class="quantity">
            <input class="increment" type="button" value="+" wire:click.debounce="increment">
        </div>
    </td>
    <td>
        <h5>{{$total}}</h5>
    </td>
    <td><span wire:click.debounce="remove"><i class="fal fa-times"></i></span></td>
</tr>
