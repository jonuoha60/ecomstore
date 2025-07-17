const ITEMS = [
    {
        id: 1,
        name: 'HOODIE',
        price: 57.25,
        image: 'blackf.png',
        qty: 1,
        taxes: 18.00,
    },
]

const openBtn = document.getElementById('open_cart_btn')
const cart = document.getElementById('sidecart')
const closeBtn = document.getElementById('close_btn')
const itemsEl = document.querySelector('.items')
const cartItems = document.querySelector('.cart_items')
const itemsNum = document.getElementById('items_num')
const subtotalPrice = document.getElementById('subtotal_price')

const backdrop = document.querySelector('.backdrop')
const sizes = document.querySelector('.sizes')

let cart_data = []

openBtn.addEventListener('click', openCart)
closeBtn.addEventListener('click', closeCart)

renderItems()
renderCartItems()

// Open Cart
function openCart() {
    cart.classList.add('open')
    backdrop.classList.add('show')
}

// Close Cart
function closeCart() {
    cart.classList.remove('open')
    backdrop.classList.remove('show')
}

// Add Items to Cart
function addItem(idx, itemId) {
    // Get the selected size
    const sizeSelect = document.getElementById('sizeSelect')
    const selectedSize = sizeSelect.options[sizeSelect.selectedIndex].value
    const colorSelect = document.getElementById('colorSelect')
    const selectedColor = colorSelect.options[colorSelect.selectedIndex].value

    // Find same items
    const foundedItem = cart_data.find(
        (item) => item.id.toString() === itemId.toString() && item.size === selectedSize && item.color === selectedColor
    )
    if (foundedItem) {
        increaseQty(itemId, selectedSize, selectedColor)
    } else {
        const newItem = { ...ITEMS[idx], size: selectedSize, color: selectedColor } // Copy item data and add size and color
        cart_data.push(newItem)
    }
    updateCart()
    openCart()
}

// Remove Cart Items
function removeCartItem(itemId, size, color) {
    cart_data = cart_data.filter((item) => !(item.id == itemId && item.size == size && item.color == color))

    updateCart()
}

// Increase Qty
function increaseQty(itemId, size, color) {
    cart_data = cart_data.map(item =>
        item.id.toString() === itemId.toString() && item.size === size && item.color === color
            ? { ...item, qty: item.qty + 1 }
            : item
    )

    updateCart()
}

// Decrease Qty
function decreaseQty(itemId, size, color) {
    cart_data = cart_data.map(item =>
        item.id.toString() === itemId.toString() && item.size === size && item.color === color
            ? { ...item, qty: item.qty > 1 ? item.qty - 1 : item.qty }
            : item
    )

    updateCart()
}

// Calculate Items Number
function calcItemsNum() {
    let itemsCount = 0

    cart_data.forEach((item) => (itemsCount += item.qty))

    itemsNum.innerText = itemsCount
}

// Calculate Subtotal Price
function calcSubtotalPrice() {
    let subtotal = 0

    cart_data.forEach((item) => (subtotal += item.price * item.qty + item.taxes))

    subtotalPrice.innerText = subtotal
}

// Render Items
function renderItems() {
    ITEMS.forEach((item, idx) => {
        const itemEl = document.createElement('div')
        itemEl.classList.add('item')
       
        itemEl.innerHTML = `
        <div class="description">
        <h2>${item.name}</h2><br>
        <h3>Description</h3><br>
        <p>BLANK HOODIES; Long Sleeve (BLACK AND BROWN ONLY)</p><br>
        <bold><p>Price:</bold> $${item.price}</p><br>
        <label for="sizeSelect">Size:</label>
        <select id="sizeSelect">
            <option value="small">Small</option>
            <option value="large">Large</option>
            <!-- Add other size options as needed -->
        </select>
        <label for="colorSelect">Color:</label>
        <select id="colorSelect">
            <option value="black">Black</option>
            <option value="green">Green</option>
            <option value="red">Red</option>
            <!-- Add other color options as needed -->
        </select>
           <button class="atc">ADD</button>

    </div><br>

        `;
                // Attach the click event listener to the button
                const addButton = itemEl.querySelector('.atc');
                addButton.onclick = () => addItem(idx, item.id);
        
        itemsEl.appendChild(itemEl)
    })
}

// Display / Render Cart Items
function renderCartItems() {
    // Remove everything from cart
    cartItems.innerHTML = ''

    if (cart_data.length === 0) {
        cartItems.innerHTML = '<p>Cart is empty</p>'
    } else {
        // Add new data
        cart_data.forEach((item) => {
            const cartItem = document.createElement('div')
            cartItem.classList.add('cart_item')
            cartItem.innerHTML = `
                <div class="remove_item" onclick="removeCartItem(${item.id}, '${item.size}', '${item.color}')">
                    <span>&times;</span>
                </div>
                <div class="item_img">
                    <img src="${item.image}" alt="">
                </div>
                <div class="item_details">
                    <p>${item.name}</p><br>
                    <div class="menu2">
                        <p>size: ${item.size}</p>
                        <p>color: ${item.color}</p>
                        <strong>$${item.price}</strong>
                        <div class="qty">
                            <span onclick="decreaseQty(${item.id}, '${item.size}', '${item.color}')">-</span>
                            <strong>${item.qty}</strong>
                            <span onclick="increaseQty(${item.id}, '${item.size}', '${item.color}')">+</span>
                        </div>
                    </div>
                </div>
            `
            cartItems.appendChild(cartItem)
        })
    }
}

function updateCart() {
    // Render cart items with updated data
    renderCartItems()
    // Update items number in cart
    calcItemsNum()
    // Update subtotal price
    calcSubtotalPrice()
}
