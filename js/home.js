store = window.store || {};

// handlebars helper if equals
Handlebars.registerHelper('ifEqual', function(value1, value2, options) {
    if (value1 == value2) {
        return options.fn(this);
    }
    return options.inverse(this);
});

store.getIndex = function(el){
    return $(el).attr('data-item-id');
}


var template = Handlebars.compile($('#overlay-template').html());
store.renderOverlay = function(index){
    var html = "";
    var i = 0;
    for (var k = 0; k < store.items.length; k++){
        if (store.items[k]['id'] == index){
            var i = k;
        }
    }
    html = template(store.items[i]);
    return html;
}
store.displayOverlay = function(html){
    $('#overlay-display').html(html);
}

store.overlayInitThumb = function() {
    $('.thumbnail-icon:first-child div')
        .addClass('icon-selected');
}

store.overlaySetPreview = function() {
    $('.icon-state').on('click', function() {
        var src = $(this).prev().attr('src');
        $('#preview-main').attr('src', src);

        $('.icon-state').removeClass('icon-selected');
        $(this).addClass('icon-selected');
    });
};

store.priceUpdate = function(index) {
    console.log(store.items);
    var index = index;

    /////////////////////////// pre-selection for price

    var id = 0;
    for (var k = 0; k < store.items.length; k++){
        if (store.items[k]['id'] == index){
            var id = k;
        }
    }

    var lowest_price = store.items[id]['details'][0]['price'];
    var detail_id = store.items[id]['details'][0]['detail_id'];
    $("input[name='detail_id']").val(detail_id);
    var size = store.items[id]['details'][0]['size'];
    var material_id = store.items[id]['details'][0]['material_id'];
    $("#price-update").html('Price: $' + lowest_price);
    $("input[name='size']:first").attr("checked", "true");
    $("input[name='material-id']:first").attr("checked", "true");
    /////////////////////////// update price on selection change

    $("input[name='size']").change(function(){

        size = $(this).val();
        
        for (var i = 0; i < store.items[id]['details'].length; i++){
            if (store.items[id]['details'][i]['size'] == size && store.items[id]['details'][i]['material_id']== material_id){
                var newSizePrice = store.items[id]['details'][i]['price'];
                var detail_id = store.items[id]['details'][i]['detail_id'];
            }
        }

        $("#price-update").html('Price: $' + newSizePrice);
        $("input[name='detail_id']").val(detail_id);

    });
    $("input[name='material-id']").change(function(){

        material_id = $(this).val();
        for (var i = 0; i < store.items[id]['details'].length; i++){
            if (store.items[id]['details'][i]['material_id']== material_id && store.items[id]['details'][i]['size'] == size){
                var newMatPrice = store.items[id]['details'][i]['price'];
                var detail_id = store.items[id]['details'][i]['detail_id'];
            }
        }
        $("#price-update").html('Price: $' + newMatPrice);
        $("input[name='detail_id']").val(detail_id);
    });
}


