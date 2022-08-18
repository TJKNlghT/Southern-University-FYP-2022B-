//Cart Window Toggler
$(document).ready(function(){
    $('#flip').click(function(){
        $('#panel').slideToggle("slow");
    })
})

//Cart Window Toggler
$(document).ready(function(){
    $('.viewcartbtn').click(function(){
        $('#panel').slideToggle("slow");
    })
})

//Event check if view cart window is not on focus (if not on focus it closes)
$(document).on("click", function (event) {
    // If the target is not the container or a child of the container, then process
    // the click event for outside of the container.
    if ($(event.target).closest("#panel").length === 0 && $(event.target).closest("#flip").length === 0 && $(event.target).closest(".viewcartbtn").length === 0 && $(event.target).closest(".cart-delete-item").length === 0) {
        $('#panel').slideUp("slow");
    }
  });

//Quantity Chooser
$(document).ready(function() {
    $('.minus').click(function () {
        var $input = $(this).parent().find('input');
        var count = parseInt($input.val()) - 1;
        count = count < 1 ? 1 : count;
        $input.val(count);
        $input.change();
        return false;
    });
    $('.plus').click(function () {
        var $input = $(this).parent().find('input');
        $input.val(parseInt($input.val()) + 1);
        $input.change();
        return false;
    });
});


//Cart Function
class CartItem{
    constructor(name, desc, img, price, quantity){
        this.name = name
        this.desc = desc
        this.img=img
        this.price = price
        this.quantity = quantity
   }
}

class CartCustomItem{
    constructor(customName, customImg, customDesc, customPrice, customQuantity){
        this.name = customName
        this.img= customImg
        this.desc = customDesc
        this.price = customPrice
        this.quantity = customQuantity
   }
}

class LocalCart{
    static key = "cartItems"
    

    static getLocalCartItems(){
        let cartMap = new Map()
     const cart = localStorage.getItem(LocalCart.key)   
     if(cart===null || cart.length===0)  return cartMap
        return new Map(Object.entries(JSON.parse(cart)))
    }
    

    static addItemToLocalCart(id, item){
        let cart = LocalCart.getLocalCartItems()
        if(cart.has(id)){
            let mapItem = cart.get(id)
            mapItem.quantity += item.quantity
            cart.set(id, mapItem)
        }
        else
        cart.set(id, item)
       localStorage.setItem(LocalCart.key,  JSON.stringify(Object.fromEntries(cart)))
       updateCartUI()
    }

    static removeItemFromCart(id){
    let cart = LocalCart.getLocalCartItems()
    if(cart.has(id)){
        let mapItem = cart.get(id)
        if(mapItem.quantity>1)
       {
        mapItem.quantity -=1
        cart.set(id, mapItem)
       }
       else
       cart.delete(id)
    } 
    if (cart.length===0)
        localStorage.clear()
    else
    localStorage.setItem(LocalCart.key,  JSON.stringify(Object.fromEntries(cart)))
        updateCartUI()
    }

    static removeItemFromPaymentWindow(id){
        let cart = LocalCart.getLocalCartItems()
        if(cart.has(id)){
            let mapItem = cart.get(id)
            if(mapItem.quantity>1)
           {
            mapItem.quantity -=1
            cart.set(id, mapItem)
           }
           else
           cart.delete(id)
        } 
        if (cart.length===0)
            localStorage.clear()
        else
        localStorage.setItem(LocalCart.key,  JSON.stringify(Object.fromEntries(cart)))
            updateCartWindowUI()
        }
}

const btnPay = document.querySelector('.btn-pay')
const emptyCart = document.querySelector('.empty-cart')
const emptyCartWindow = document.querySelector('.empty-cart-window')
const cartIcon = document.querySelector('.cartbadge')
const quantityIcon = document.querySelector('.quantitybadge')
const addToCartBtns = document.querySelectorAll('.add-to-cart-btn')
addToCartBtns.forEach( (btn)=>{
    btn.addEventListener('click', addItemFunction)
}  )

function addItemFunction(){
    const id = document.getElementById('productId').value;
    const img = document.getElementById("productImg").alt;
    const name = document.getElementById('productName').innerHTML;
    const desc = "";
    const quantity = parseInt(document.getElementById('productQuantity').value);

    let price = document.getElementById('price').innerHTML;
    price = price.replace("RM", '')
    const item = new CartItem(name, desc, img, price, quantity)
    LocalCart.addItemToLocalCart(id, item)

}

const addToCartBtnsTwo = document.querySelectorAll('.add-to-cart-btn-two')
addToCartBtnsTwo.forEach( (btn)=>{
    btn.addEventListener('click', addCustomItemFunction)
}  )

function addCustomItemFunction(){
    const customId = document.getElementById("customProductId").innerHTML;
    const customImg = document.getElementById("customProductImg").alt;
    const customName = "Create Own Sushi";

    var item = document.getElementsByName("customProductDesc");
    var customDesc = "";

    for(var i =0; i<item.length; i++) {
        let text1 = item[i].innerHTML
        customDesc = customDesc.concat(text1, " - ");
    }

    const customQuantity = parseInt(document.getElementById('customQuantity').value);

    let customPrice = parseFloat(document.getElementById('customPrice').innerHTML);
    const customItem = new CartCustomItem(customName, customImg, customDesc, customPrice, customQuantity)

    LocalCart.addItemToLocalCart(customId, customItem)
}
 

function updateCartUI(){
    const cartWrapper = document.querySelector('.food-cart-items')
    cartWrapper.innerHTML = "<hr>"
    const items = LocalCart.getLocalCartItems()
    if(items === null) return
    let count = 0
    let total = 0
    let finalTotal = 0
    let serviceFee = 1.3
    for(const [key, value] of items.entries()){
        const cartItem = document.createElement('div')
        cartItem.classList.add('food-item')
        cartItem.classList.add('col-12')
        cartItem.classList.add('text-end')
        let price = value.price*value.quantity
        price = Math.round(price*100)/100
        count+= value.quantity
        total += price
        total = Math.round(total*100)/100

        finalTotal = Math.round((total + serviceFee)*100)/100
        cartItem.innerHTML =
        `
        <div class="d-flex align-items-center">
          <div class="quantity p-2 flex-shrink-0"><h6>${value.quantity} x</h6></div>
          <div class="p-2 w-100 ms-3">
            <div class="row align-items-center">
              <div class="image-col col">
                <img class="image-adj" src="/images/${value.img}" class="img-fluid" alt="">
              </div>
              <div class="col text-start">
                  <p>${value.name}</p>
                  <small>${value.desc}</small>
              </div>
            </div>
          </div>
          <div class="p-2 flex-shrink-1">RM ${price}</div>
        </div>
        <span class="cart-delete-item text-danger">Delete Item</span>
        `

        cartItem.lastElementChild.addEventListener('click', ()=>{
            LocalCart.removeItemFromCart(key)
        })     
        cartWrapper.append(cartItem)
    }

    if(count > 0){
        cartIcon.classList.remove('hide')
        emptyCart.classList.add('hide')
        if(count<=99){
            quantityIcon.innerHTML = `${count}`
        } else {
            quantityIcon.innerHTML = `99+`
        }
        let root = document.querySelector(':root')
        root.style.setProperty('--after-content', `"${count}"`)
    }
    else{
        emptyCart.classList.remove('hide')
        cartIcon.classList.add('hide')
    }

    const subtotal = document.querySelector('.subtotal')
    subtotal.innerHTML = `RM ${total}`
    
    const totalPrice = document.querySelector('.totalPrice')
    totalPrice.innerHTML = `RM ${finalTotal}`
}
document.addEventListener('DOMContentLoaded', ()=>{updateCartUI()})




function updateCartWindowUI(){
    const cartWindowWrapper = document.querySelector('.cart-summary')
    cartWindowWrapper.innerHTML = "<hr>"
    const items = LocalCart.getLocalCartItems()
    if(items === null) return
    let count = 0
    let total = 0
    let finalTotal = 0
    let serviceFee = 1.3
    for(const [key, value] of items.entries()){
        const cartWindowItem = document.createElement('div')
        cartWindowItem.classList.add('row')
        cartWindowItem.classList.add('align-items-center')
        cartWindowItem.classList.add('border-bottom')
        cartWindowItem.classList.add('pb-3')
        cartWindowItem.classList.add('pt-3')
        let price = value.price*value.quantity
        price = Math.round(price*100)/100
        count+= value.quantity
        total += price
        total = Math.round(total*100)/100

        finalTotal = Math.round((total + serviceFee)*100)/100
        cartWindowItem.innerHTML =
        `
        <div class="image-col col">
            <img src="/images/${value.img}" class="img-fluid rounded-3" alt="">
        </div>
    
        <div class="col">
            <h6 class="text-black mb-0">${value.name}</h6>
            <small> ${value.desc} </small>
        </div>

        <div class="col-2 p-0 d-flex">

            <input id="quantity" min="1" name="quantity" disabled value="${value.quantity}" type="number"
            class="form-control text-center" />
    
        </div>

        <div class="col mx-auto">
            <h6 class="mb-0 text-center">RM ${price}</h6>
        </div>
    
        <div class="col-1 d-flex justify-content-center">
            
        </div>
        <span class="text-danger text-decoration-none col-1 d-flex justify-content-center"><i class="fas fa-times"></i></span>
        `

        cartWindowItem.lastElementChild.addEventListener('click', ()=>{
            LocalCart.removeItemFromPaymentWindow(key)
        })     
        cartWindowWrapper.append(cartWindowItem)
    }

    if(count > 0){
        emptyCartWindow.classList.add('hide')
        btnPay.classList.remove('disabled')

    } else {
        emptyCartWindow.classList.remove('hide')
        btnPay.classList.add('disabled')
    }

    const subtotal = document.querySelector('.subtotal')
    subtotal.innerHTML = `RM ${total}`
    
    const totalPrice = document.querySelector('.totalPrice')
    totalPrice.innerHTML = `RM ${finalTotal}`
}
document.addEventListener('DOMContentLoaded', ()=>{updateCartWindowUI()})

//List Items
function allStorage() {
    var cartItem = Array.from(LocalCart.getLocalCartItems().values());
    var itemArray = [];
    
    for(let i = 0; i<cartItem.length; i++) {
        var itemName = cartItem[i].name
        var itemDesc = cartItem[i].desc
        var itemPrice = cartItem[i].price
        var itemQuantity = cartItem[i].quantity

        var store = [];

        store.push(itemName, itemDesc, itemPrice, itemQuantity);

        let result = store.join('/');

        store.splice(0, store.length)

        itemArray.push(result);
    }

    document.getElementById('a').value = itemArray
    document.getElementById('b').value = itemArray
    console.log(document.getElementById('b').value)

}
document.addEventListener('DOMContentLoaded', ()=>{allStorage()})

function clearCart(){
    console.log($('form')[0].checkValidity())
    if ($('form')[0].checkValidity()) {
        localStorage.clear();
      }
}


/*Text Animation ( Custom Sushi Menu )*/
// Wrap every letter in a span
var textWrapper = document.querySelector('.ml16');
textWrapper.innerHTML = textWrapper.textContent.replace(/\S/g, "<span class='letter'>$&</span>");

anime.timeline({loop: true})
  .add({
    targets: '.ml16 .letter',
    translateY: [-100,0],
    easing: "easeOutExpo",
    duration: 1400,
    delay: (el, i) => 30 * i
  }).add({
    targets: '.ml16',
    opacity: 0,
    duration: 1000,
    easing: "easeOutExpo",
    delay: 1000
  });