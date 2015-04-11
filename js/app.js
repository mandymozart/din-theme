/**
 * @author Danny Develop / WEAREPICTURES
 * @date 13.10.14
 * @time 18:24
 */
// 0. Globals
var container = document.querySelector('#productsContainer');
var msnry;

// 1. Background
function initBackground(){
    var x = 0;
    var y = 0;
    //cache a reference to the banner
    var banner = $("#layout-background-image");

    // set initial banner background position
    banner.css('left', x);

    // scroll up background position every 90 milliseconds
    window.setInterval(function() {
        banner.css("left", x);
        y--;
        //x--;

        //if you need to scroll image horizontally -
        // uncomment x and comment y

    }, 90);
}

// 2. Grid (Masonary)
function productsGrid(){

    // initialize Masonry after all images have loaded
    imagesLoaded( container, function() {
        msnry = new Masonry( container, {
            // options
            gutter: 40,
            itemSelector: '.product'
        });
    });

    // Grid Helper
    /* Adding 'inverse' class to items no aligned to the left */
    $('#productsContainer .product').each(function(){
        var position = $(this).position()
        if(position.left > 0) $(this).addClass('inverse')
    })
}

// 3. Gallery

function previewGallery(){
    $('.product-preview-gallery ul').each(function(e){

        $(this).find('li').click('on', function(e){
            e.preventDefault()
            if( !$(this).is(':last-child') ){
                $(this).toggleClass('hidden')
                $(this).next().toggleClass('hidden')
            }
            else {
                $(this).parent().children().first().toggleClass('hidden')
                console.log($(this).parent().children().first())
                $(this).toggleClass('hidden')
            }
            msnry.layout();
            })
        })
}

// 4. Notices
function dismissNotifications(){
    $('.woocommerce-message').delay(2000).fadeOut(2000)
    $('.woocommerce-info').delay(2000).fadeOut(2000)
}

// 5. Cart - Spin Edit
function initializeCart(){
    // load spin edit
    $('.qty').spinedit({
        minimum: 1,
        maximum: 20,
        step: 1
    });

    // build fields array with name as identifier
    var fields = new Array()
    $('.input-text.qty').each(function(e){

        fields.push(new Array( $(this).attr('name') , $(this).val() )  )

    })

    var cartChanged = false

    // DOM Update
    $('#myModalLabel').append('<span id="cartChangedAsteriks">*</span>')
    $('#cartChangedAsteriks').hide()
    $('.update-button').hide()
    var myDiv1Para = $('.woocommerce-message').detach();
    myDiv1Para.appendTo('body');

    // Event bindings
    // disable 'update cart' until any value is change
    $('.qty').on("valueChanged", function (e) {
        cartChanged = true
        $('.update-button').fadeIn()
        $('#cartChangedAsteriks').fadeIn()
        $('#myModal').on('hidden.bs.modal', function () {
            $('body').append('<div class="woocommerce-error">Update cart to save changes!</div>')
        })
    });

    //
}



/* 6. Shipping Address
* only call on checkout page
* */

function cartShipping(){
    // CSS fixes to WC defaults
    $('.payment_box').show() // solve display:none
    $('#ship-to-different-address-checkbox').change(function(e){
        $('.shipping_address').slideToggle(1000)
    })
}




/* Initialize
 * on specific pages
 **/
if( $('body').is('.post-type-archive-product,.single-product') ){
    productsGrid()
    previewGallery()
    initializeCart()
}

if( $('body').is('.woocommerce-checkout') ){
    cartShipping()
}



/* Finalize
 * after everything is executed
 **/
dismissNotifications()