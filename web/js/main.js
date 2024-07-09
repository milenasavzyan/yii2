(function ($) {
    "use strict";
    
    // Dropdown on mouse hover
    $(document).ready(function () {
        function toggleNavbarMethod() {
            if ($(window).width() > 992) {
                $('.navbar .dropdown').on('mouseover', function () {
                    $('.dropdown-toggle', this).trigger('click');
                }).on('mouseout', function () {
                    $('.dropdown-toggle', this).trigger('click').blur();
                });
            } else {
                $('.navbar .dropdown').off('mouseover').off('mouseout');
            }
        }
        toggleNavbarMethod();
        $(window).resize(toggleNavbarMethod);
    });
    
    
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Vendor carousel
    $('.vendor-carousel').owlCarousel({
        loop: true,
        margin: 29,
        nav: false,
        autoplay: true,
        smartSpeed: 1000,
        responsive: {
            0:{
                items:2
            },
            576:{
                items:3
            },
            768:{
                items:4
            },
            992:{
                items:5
            },
            1200:{
                items:6
            }
        }
    });


    // Related carousel
    $('.related-carousel').owlCarousel({
        loop: true,
        margin: 29,
        nav: false,
        autoplay: true,
        smartSpeed: 1000,
        responsive: {
            0:{
                items:1
            },
            576:{
                items:2
            },
            768:{
                items:3
            },
            992:{
                items:4
            }
        }
    });


    // Product Quantity
    $('.quantity button').on('click', function () {
        var button = $(this);
        var oldValue = button.parent().parent().find('input').val();
        if (button.hasClass('btn-plus')) {
            var newVal = parseFloat(oldValue) + 1;
        } else {
            if (oldValue > 0) {
                var newVal = parseFloat(oldValue) - 1;
            } else {
                newVal = 0;
            }
        }
        button.parent().parent().find('input').val(newVal);
    });
    
})(jQuery);


$('.add-to-cart').on('click', function() {
    let id = $(this).data('id');
    $.ajax({
        url: '/cart/add',
        data: { id: id },
        type: 'GET',
        success: function(res) {
            if (!res) {
                alert('Error');
            }
            showCart(res);
        },
    });
    return false;
});

function clearCart() {
    $.ajax({
        url: '/cart/clear',
        type: 'GET',
        success: function(res) {
            if (!res) {
                alert('Error');
            }
            showCart(res);
        },
    });
}

function getCart() {
    $.ajax({
        url: '/cart/show',
        type: 'GET',
        dataType: 'json',
        success: function(res) {
            if (!res) {
                alert('Error');
            } else {
                showCart(res);
            }
        },
    });
}



function showCart(cart){
    $('#modal-cart .modal-body').html(cart);
    $('#modal-cart').modal();
    let cartSum = $('#cart-sum').text() ? $('#cart-sum').text() :'$0';
    if (cartSum){
        $('#cart-sum').text(cartSum);
    }

}

// $('.value-minus').on('click', function() {
//     let id = $(this).data('id');
//     let qty = $(this).data('qty');
//     $('.cart-table .overlay').fadeIn();
//     $.ajax({
//         url: 'cart/change-cart',
//         data: { id: id, qty: qty },
//         type: 'GET',
//         success: function(res) {
//             if (!res) alert('Error');
//             location = 'cart/checkout';
//         },
//         error: function() {
//             alert('Error!!!!');
//         },
//     });
// });
