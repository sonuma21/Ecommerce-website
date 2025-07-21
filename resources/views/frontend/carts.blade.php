<x-frontend-layout>
    <section>
        <div class="container py-10">
            <h1 class="text-3xl font-bold text-center mb-8">
                Your Cart
            </h1>

            @forelse ($carts as $shop => $items)
                @php
                    $totalAmt = 0;
                @endphp
                <div class="border border-gray-300 rounded-lg p-4 mb-6" data-shop-id="{{ $shop }}">
                    <h2 class="text-xl font-semibold mb-3">
                        Seller: {{ $items->first()->product->shop->shop_profile->shop_name ?? 'Unknown Seller' }}
                    </h2>

                    <ul class="space-y-4">
                        @foreach ($items as $cart)
                            @php
                                $totalAmt += $cart->amount;
                                $images = $cart->product->images;
                                $firstImage =
                                    is_array($images) && !empty($images) ? $images[0] : asset('images/placeholder.jpg');
                            @endphp
                            <li class="flex justify-between items-center border-b pb-2">
                                <div class="flex items-center space-x-4">
                                    <img src="{{ Storage::url($firstImage) }}" alt="{{ $cart->product->name }}"
                                        class="w-16 h-16 object-cover rounded">
                                    <div>
                                        <p class="font-medium">{{ $cart->product->name }}</p>
                                        <label for="quantity">Qty:</label>
                                        <input type="number" class="quantity-input border rounded px-2 py-1"
                                            data-cart-id="{{ $cart->id }}" data-price="{{ $cart->product->price }}"
                                            min="1" value="{{ $cart->quantity }}">
                                    </div>
                                </div>
                                <p class="text-right font-semibold amount-display">Rs.
                                    {{ number_format($cart->amount, 2) }}</p>
                            </li>

                            <div class="flex justify-end gap-2">
                                <form action="{{ route('carts.delete', $cart->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit"
                                        class="bg-red-600 px-2 py-1 text-white rounded">Remove</button>
                                </form>
                            </div>
                        @endforeach
                        <div class="total-amount font-bold">
                            <b>Total:</b> Rs. {{ number_format($totalAmt, 2) }}
                        </div>
                    </ul>
                </div>
            @empty
                <p class="text-center text-gray-500">Your cart is empty.</p>
            @endforelse
        </div>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.quantity-input').forEach(input => {
                input.addEventListener('change', function() {
                    const cartId = this.dataset.cartId;
                    const quantity = parseInt(this.value);
                    const price = parseFloat(this.dataset.price);
                    const amountDisplay = this.closest('li').querySelector('.amount-display');
                    const shopContainer = this.closest('[data-shop-id]');
                    const totalAmountDisplay = shopContainer.querySelector('.total-amount');

                    // Validate input
                    if (isNaN(quantity) || quantity < 1) {
                        alert('Please enter a valid quantity (minimum 1).');
                        this.value = 1; // Reset to minimum
                        return;
                    }

                    console.log('Sending request:', {
                        cart_id: cartId,
                        quantity: quantity
                    });
                    console.log('Client-side price:', price, 'Quantity:', quantity,
                        'Expected amount:', price * quantity);

                    fetch("{{ route('carts.updateQuantity') }}", {
                            method: 'PUT',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}'
                            },
                            body: JSON.stringify({
                                cart_id: cartId,
                                quantity: quantity
                            })
                        })
                        .then(response => {
                            console.log('Response status:', response.status);
                            if (!response.ok) {
                                throw new Error(`HTTP error! Status: ${response.status}`);
                            }
                            return response.json();
                        })
                        .then(data => {
                            console.log('Response data:', data);
                            if (data.status) {
                                // Temporary fix: Use client-side calculation for individual amount
                                const amount = price * quantity;
                                if (isNaN(amount)) {
                                    throw new Error('Invalid client-side amount calculation');
                                }

                                // Update individual item amount
                                amountDisplay.innerText = `Rs. ${amount.toFixed(2)}`;
                                console.log('Server amount:', data.amount, 'Client amount:',
                                    amount);

                                // Recalculate total amount for the shop
                                let total = 0;
                                shopContainer.querySelectorAll('.quantity-input').forEach(
                                    input => {
                                        const itemPrice = parseFloat(input.dataset.price);
                                        const itemQuantity = parseInt(input.value);
                                        total += itemPrice * itemQuantity;
                                    });
                                totalAmountDisplay.innerText = `Total: Rs. ${total.toFixed(2)}`;
                            } else {
                                alert(data.message ||
                                    'Failed to update quantity. Please try again.');
                            }
                        })
                        .catch(error => {
                            console.error('Fetch error:', error);
                            alert('An error occurred while updating the quantity: ' + error
                                .message);
                        });
                });
            });
        });
    </script>
</x-frontend-layout>
