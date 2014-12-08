store = window.store || {};

Handlebars.registerHelper('ifEqual', function (value1, value2, options) {
    if (value1 == value2) {
        return options.fn(this);
    }
    return options.inverse(this);
});
//Note that this returns the item ID, but it is 1 more than the index in the array
store.getIndex = function (el) {
    return $(el).attr('data-item-id');
};

//Renders the handlebars template
var template = Handlebars.compile($('#overlay-template').html());
//Puts the right json object into the template
store.renderOverlay = function (index) {
    var html = "";
    var i = 0;
    for (var k = 0; k < store.items.length; k++) {
        if (store.items[k]['id'] == index) {
            i = k;
        }
    }
    html = template(store.items[i]);
    return html;
};
store.displayOverlay = function (html) {
    $('#overlay-display').html(html);
};
//Makes the first image default
store.overlayInitThumb = function () {
    $('.thumbnail-icon:first-child div')
        .addClass('icon-selected');
};
//Allows for images to be selected and put in the preview box
store.overlaySetPreview = function () {
    $('.icon-state').on('click', function () {
        var src = $(this).prev().attr('src');
        $('#preview-main').attr('src', src);

        $('.icon-state').removeClass('icon-selected');
        $(this).addClass('icon-selected');
    });
};
//Updates the price as user clicks on different options
store.priceUpdate = function (index) {
    console.log(store.items);
    var index = index;

    var id = 0;
    for (var k = 0; k < store.items.length; k++) {
        if (store.items[k]['id'] == index) {
            var id = k;
        }
    }
    //Assuming that the "first" detail ID will always contain the lowest price (or in this case, will always be the price displayed because those radio boxes are auto checked
    var lowest_price = (store.items[id]['details'][0]['price'] + 6)*1.15;
    var detail_id = store.items[id]['details'][0]['detail_id'];
    $("input[name='detail_id']").val(detail_id);
    var size = store.items[id]['details'][0]['size'];
    var material_id = store.items[id]['details'][0]['material_id'];
    $("#price-update").html('Price: $' + lowest_price);
    //Checks the first of each radio button sets
    $("input[name='size']:first").attr("checked", "true");
    $("input[name='material-id']:first").attr("checked", "true");
    //update price on selection change, jquery automatically elects the entire input
    $("input[name='size']").change(function () {

        size = $(this).val();
        //matches to the array
        for (var i = 0; i < store.items[id]['details'].length; i++) {
            if (store.items[id]['details'][i]['size'] == size && store.items[id]['details'][i]['material_id'] == material_id) {
                var newSizePrice = (store.items[id]['details'][i]['price']+ 6)*1.15;
                var detail_id = store.items[id]['details'][i]['detail_id'];
            }
        }

        $("#price-update").html('Price: $' + newSizePrice);
        //this is required to pass to the next page
        $("input[name='detail_id']").val(detail_id);

    });
    //similar to above, but is needed to activate the function on both clicks/changes
    $("input[name='material-id']").change(function () {

        material_id = $(this).val();
        for (var i = 0; i < store.items[id]['details'].length; i++) {
            if (store.items[id]['details'][i]['material_id'] == material_id && store.items[id]['details'][i]['size'] == size) {
                var newMatPrice = (store.items[id]['details'][i]['price']+ 6)*1.15;
                var detail_id = store.items[id]['details'][i]['detail_id'];
            }
        }
        $("#price-update").html('Price: $' + newMatPrice);
        $("input[name='detail_id']").val(detail_id);
    });
};
$(document).ready(function () {
    //Overlay functions here, on click shows the overlay div, and clicking on close closes it

    $('.no-go').on('click', function (e) {
        e.preventDefault();

        $('#overlay')
            .removeClass('hidden')
            .addClass('shown');

        $('body').addClass('no-scroll');
        var index = store.getIndex(this);

        store.displayOverlay(store.renderOverlay(index));
        store.overlayInitThumb();
        store.overlaySetPreview();
        store.priceUpdate(index);

    });

    $('#overlay-close').on('click', function () {
        console.log('clicked #overlay-close');

        $(this).parent()
            .removeClass('shown')
            .addClass('hidden');

        $('body').removeClass('no-scroll');
    });

});


