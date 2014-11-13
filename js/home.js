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

store.coolFunction = function(index) {
    var index = index;

    //$(':radio[value="20mm"]').attr('checked', 'checked');
    //$(':radio[value="ACRYLIC"]').attr('checked', 'checked'); --> doesn't work

    var price = 0;
    var size = "";
    var material_id = ""; //$("input[name='material-id']").val();
    //console.log('first material id= ' + material_id);

    $("input[name='size']").change(function(){
        console.log('size= ' + $(this).val());
        size = $(this).val();
        for (var i = 0; i < store.items[index]['details'].length; i++){
            if (store.items[index]['details'][i]['size'] == size && store.items[index]['details'][i]['material_id']== material_id){
                console.log('size index= ' + i);
                price = store.items[index]['details'][i]['price'];
                $("#price-update").html('$' + price);

            }
        }
    });
    $("input[name='material-id']").change(function(){
        console.log('material id inside jquery= ' + $(this).val());
        console.log('mstore.items[index][].length= ' + store.items[index]['details'].length);
        material_id = $(this).val();
        for (var i = 0; i < store.items[index]['details'].length; i++){
            if (store.items[index]['details'][i]['material_id']== material_id && store.items[index]['details'][i]['size'] == size){
                console.log('material index= ' +i);
                price = store.items[index]['details'][i]['price'];
                $("#price-update").html('$' + price);
            }
        }
    });
}


