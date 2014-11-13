store = window.store || {};
///////////////////////////////////////// HANDLEBARS HELPER

// Handlebars.registerHelper('compare', function(lvalue, rvalue, options) {

//     if (arguments.length < 3)
//         throw new Error("Handlerbars Helper 'compare' needs 2 parameters");

//     operator = options.hash.operator || "==";

//     var operators = {
//         '===':      function(l,r) { return l === r; },
//         '!=':       function(l,r) { return l != r; },
//         '<':        function(l,r) { return l < r; },
//         '>':        function(l,r) { return l > r; },
//     }

//     if (!operators[operator])
//         throw new Error("Handlerbars Helper 'compare' doesn't know the operator "+operator);

//     var result = operators[operator](lvalue,rvalue);

//     if( result ) {
//         return options.fn(this);
//     } else {
//         return options.inverse(this);
//     }

// });

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

    ///////////////////////////// pre-selection for price
    //
    //var i = 0;
    //for (var k = 0; k < store.items.length; k++){
    //    if (store.items[k]['id'] == index){
    //        var i = k;
    //    }
    //}
    //
    //var smallSize = store.items[i]['size_array'][0];
    //var smallMat = store.items[i]['material_array'][0];     //doesn't do anything
    //
    //document.getElementById(smallSize).checked = true;
    //document.getElementById("Acrylic").checked = true;      //hack bc each item has acrylic as a material
    ////$(':radio[value="1"]').attr('checked', 'checked');
    //
    //var price = 0;
    //var size = smallSize;
    //var material_id = "1";                                 //hack bc each item has acrylic as a material
    //
    //for (var i = 0; i < store.items[index]['details'].length; i++){
    //    if (store.items[index]['details'][i]['size'] == size && store.items[index]['details'][i]['material_id']== material_id){
    //        console.log('size index= ' + i);
    //        price = store.items[index]['details'][i]['price'];
    //        $("#price-update").html('Price: $' + price);
    //
    //    }
    //}

    /////////////////////////// pre-selection for price

    var id = 0;
    for (var k = 0; k < store.items.length; k++){
        if (store.items[k]['id'] == index){
            var id = k;
        }
    }

    var lowest_price = store.items[id]['details'][0]['price'];
    var size = store.items[id]['details'][0]['size'];
    var material_id = 1;
    $("#price-update").html('Price: $' + lowest_price);
    document.getElementById(store.items[id]['details'][0]['size']).checked = true;
    document.getElementById(store.items[id]['details'][0]['material']).checked = true;      //hack bc each item has acrylic as a material
    //$(':radio[value="1"]').attr('checked', 'checked');
    /////////////////////////// update price on selection change

    $("input[name='size']").change(function(){

        size = $(this).val();

        for (var i = 0; i < store.items[id]['details'].length; i++){
            if (store.items[id]['details'][i]['size'] == size && store.items[id]['details'][i]['material_id']== material_id){
                var newPrice = store.items[id]['details'][i]['price'];
                $("#price-update").html('Price: $' + newPrice);

            }
        }
    });
    $("input[name='material-id']").change(function(){

        material_id = $(this).val();

        for (var i = 0; i < store.items[id]['details'].length; i++){
            if (store.items[id]['details'][i]['material_id']== material_id && store.items[id]['details'][i]['size'] == size){
                var newPrice = store.items[id]['details'][i]['price'];
                $("#price-update").html('Price: $' + newPrice);

            }
        }
    });
}


