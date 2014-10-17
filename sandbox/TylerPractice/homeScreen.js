var theData = {
    storeItems:[
        {
            name: "Super Cool Necklace",
            materials: ["wood", "copper", "plastic"],
            sizes: [5, 6, 7],
            colors: ["red", "blue", "white"],
            img: "../images/icon_tumblr.png",
            description: "This is the complete ically pass the ically pass the ting HTML code from " +
                "ically pass the ically pass the ically pass the ically pass thpass the ically pass the " +
                "the data into a JavaScript variable, I decided tically pass the o put all of that into",
            price:20.99
        },
        {
            name: "Pretty Butterfly Thing",
            materials: ["silver", "copper", "plastic"],
            sizes: [5, 7],
            colors: ["pink", "purple", "cyan"],
            img: "../images/logo.png",
            description: "ically pass the ically pass the ically pass the ically pass the ically pass the " +
                "ically pass the ically pass the ically pass the ically pass the ically pass the ically pass the " +
                "ically pass the ically pass the ically pass the ically pass the ically pass the ically pass the " +
                "ically pass the ically pass the ically pass the ically pass the ically pass the ically pass the ",
            price:9.99
        }
    ]
};

var openOverlay = function() {

    console.log("hello");

    document.getElementById('light').style.display = 'block';
    document.getElementById('fade').style.display = 'block';
    //document.getElementById('light').style.top = (parseInt($(window).height()) / 2)-200 + "px";
    //document.getElementById('light').style.left = (parseInt($(window).width()) / 2)-200 + "px";
    $('#light').center();

};

var closeOverlay = function() {

    document.getElementById('light').style.display='none';
    document.getElementById('fade').style.display='none';

};

/////////////////////////////////////////
jQuery.prototype.center = function () {
    this.css("position","absolute");

    var windowHeight = (($(window).height() - $(this).outerHeight()) / 2) + $(window).scrollTop();
    var windowWidth = (($(window).width() - $(this).outerWidth()) / 2) + $(window).scrollLeft();

    this.css("top", Math.max(0, windowHeight) + "px");
    this.css("left", Math.max(0, windowWidth) + "px");

    return this;
};

/////////////////////////////



var scriptHTML = document.getElementById('overlay-template').innerHTML;
var templateFunction = Handlebars.compile(scriptHTML);
var html = templateFunction(theData.storeItems[0]);
document.getElementById('light').innerHTML = html;


