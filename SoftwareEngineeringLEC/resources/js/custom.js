$(document).ready(function(){

        var quantity=0;
        $('.quantity-left-minus').click(function(e){
            e.preventDefault();
            var quantity = $(this).closest('.quantity-group').find('#quantity').val();

            if(quantity>1){
                quantity--;
                $(this).closest('.quantity-group').find('#quantity').val(quantity);
                let cart_id = $(this).closest('.quantity-group').find('#cart_id').val();
                let token = $(this).closest('.quantity-group').find('#token').val();
                let price = $(this).closest('.quantity-group').find('#price').val();
                // let totalPriceCartsThen = $(this).closest('.totalCartsDetails').find('#totalPriceCartsValue').val();
                // console.log(cart_id);
                savequantity(cart_id,quantity,token);
                var url = $(this).attr('action');
                var total = quantity*price;
                // let totalPriceCartsNow = total + totalPriceCartsThen;
                // console.log(totalPriceCartsNow, totalPriceCartsThen, total);

                const formatter = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 0,
                  
                    // These options are needed to round to whole numbers if that's what you want.
                    //minimumFractionDigits: 0, // (this suffices for whole numbers, but will print 2500.10 as $2,500.1)
                    //maximumFractionDigits: 0, // (causes 2500.99 to be printed as $2,501)
                });
                window.document.getElementById("totalPriceProduct" + "_" + cart_id).innerHTML = formatter.format(total);
                // window.document.getElementById("totalPriceCarts").innerHTML = formatter.format(totalPriceCartsNow);
            }   
        });
        $('.quantity-right-plus').click(function(e){
            e.preventDefault();
            var quantity = $(this).closest('.quantity-group').find('#quantity').val();

                quantity++;
                $(this).closest('.quantity-group').find('#quantity').val(quantity);
                let cart_id = $(this).closest('.quantity-group').find('#cart_id').val();
                let token = $(this).closest('.quantity-group').find('#token').val();
                let price = $(this).closest('.quantity-group').find('#price').val();
                // let totalPriceCartsThen = $(this).closest('.totalCartsDetails').find('#totalPriceCartsValue').val();
                // console.log(cart_id);
                savequantity(cart_id,quantity,token);
                var url = $(this).attr('action');
                var total = quantity*price;
                // let totalPriceCartsNow = total + totalPriceCartsThen;
                // console.log(totalPriceCartsNow, totalPriceCartsThen, total);

                const formatter = new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR',
                    minimumFractionDigits: 0,
                    maximumFractionDigits: 0,
                  
                    // These options are needed to round to whole numbers if that's what you want.
                    //minimumFractionDigits: 0, // (this suffices for whole numbers, but will print 2500.10 as $2,500.1)
                    //maximumFractionDigits: 0, // (causes 2500.99 to be printed as $2,501)
                });
                window.document.getElementById("totalPriceProduct" + "_" + cart_id).innerHTML = formatter.format(total);
                // window.document.getElementById("totalPriceCarts").innerHTML = formatter.format(totalPriceCartsNow);
        });

        $('.quantity-left-minuss').click(function(e){
            e.preventDefault();
            var quantity = $(this).closest('.quantity-group').find('#quantity').val();

            if(quantity>1){
                quantity--;
                $(this).closest('.quantity-group').find('#quantity').val(quantity);
            }   
        });
        $('.quantity-right-pluss').click(function(e){
            e.preventDefault();
            var quantity = $(this).closest('.quantity-group').find('#quantity').val();

                quantity++;
                $(this).closest('.quantity-group').find('#quantity').val(quantity);
        });
        //carts.view

        function savequantity(cart_id,quantity,token){
            event.preventDefault();

            $.ajax({
                type: 'POST',
                url: 'updatequantity',
                data: {
                    '_token' : token,
                    'cart_id' : cart_id,
                    'quantity' : quantity
                },
                datatype: 'JSON',
            });
            return false;
        }

        // var all_checked = [];

        // function add_checked(checked_checkbox) {
        //     var id_checked = checked_checkbox.id;
        //     all_checked.push(id_checked);

        //     console.log(all_checked);

        //     var carts = document.createElement("input");
        //     carts.setAttribute('type', 'hidden');
        //     carts.setAttribute('value', all_checked);
        //     var name_checked = name_checked.concat(id_checked , '_');
        //     carts.setAttribute('name', name_checked);

        //     var carts_product = document.getElementById('cart_product');
        //     carts_product.appendChild(carts);
        // };


        $(".panel-header button").on("click", function() {
            var $this = $(this);
            var $panelHeader = $this.closest('.panel-header');
            var $panel = $panelHeader.next('.panel');
            var isExpanded = $panelHeader.hasClass('expanded');
            
            if(isExpanded === true){
                  $panel.slideUp();
                  setTimeout(function(){
                        $panelHeader.removeClass('expanded');
                  }, 400);
            }
            else{
                  $panel.slideDown();
                  $panelHeader.addClass('expanded');
            }
        });
        $(".dropDownBtn").on("click", function() {
                var $this = $(this);
                $this.toggleClass('droppedDown');
        });

        $('#check-all').click(function(event) {   
            if(this.checked) {
                // Iterate each checkbox
                $(':checkbox').each(function() {
                    this.checked = true;                        
                });
            } else {
                $(':checkbox').each(function() {
                    this.checked = false;                       
                });
            }
        });

        $("#unpaid-btn").on("click", function() {
            console.log('unpaid_page');
            $('#unpaid-btn').removeClass('text-white');
            $('#unpaid-btn').addClass('text-warning');
            $('#paid-btn').removeClass('text-warning');
            $('#paid-btn').addClass('text-white');
            $('#unpaid').addClass('d-block');
            $('#paid').addClass('d-none');
            $('#unpaid').removeClass('d-none');
            $('#paid').removeClass('d-block');
        });

        $("#paid-btn").on("click", function() {
            console.log('paid_page');
            $('#paid-btn').removeClass('text-white');
            $('#paid-btn').addClass('text-warning');
            $('#unpaid-btn').removeClass('text-warning');
            $('#unpaid-btn').addClass('text-white');
            $('#unpaid').addClass('d-none');
            $('#paid').addClass('d-block');
            $('#unpaid').removeClass('d-block');
            $('#paid').removeClass('d-none');
        });

        

});

// function increment() {
//     var quantityInput = document.getElementById("quantity");
//     var quantityValue = quantityInput.value.trim();
    
//     if (isNaN(quantityValue)){
//             quantityInput.value = 1;
//     }
//     else {
//             // quantityInput.value = parseInt(quantityInput.value) + 1;
//             var incrementedValue = parseInt(quantityValue) + 1;
            
//             if(isNaN(incrementedValue)){
//                 quantityInput.value = 1;
//             }
//             else{
//                 quantityInput.value = incrementedValue;
//             }                        
//     }

//     document.getElementById("price").textContent = "Rp" + (quantityInput.value * 99000);function decrement() {
//     var quantityInput = document.getElementById("quantity");
//     var quantityValue = quantityInput.value.trim();
    
//     if (isNaN(quantityValue)){
//             quantityInput.value = 1;
//     }
//     else {
//             var incrementedValue = parseInt(quantityValue) - 1;
            
//             if(isNaN(incrementedValue) || incrementedValue <= 1){
//                 quantityInput.value = 1;
//             }
//             else{
//                 quantityInput.value = incrementedValue;
//             }                        
//     }

//     if (quantityValue > 1) {
//             quantityInput.value = quantityValue - 1;
//     }

//     document.getElementById("price").textContent = "Rp" + (quantityInput.value * 99000);
// }

// function success(){
//     alert("Product added to cart");
// }

// var qtyInput = document.getElementById("quantity");

// qtyInput.addEventListener("input", function() {
//     document.getElementById("price").textContent = "Rp" + (qtyInput.value * 99000);
// });
// }

