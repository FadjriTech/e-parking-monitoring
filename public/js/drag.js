let empty = $('.seat-horizontal')

$(".seat-vertical").on("touchmove",function(event){
    let touch = event.targetTouches[0];
    $(this).css('position', 'fixed');
    $(this).css('top', `${touch.pageY}px`);
    $(this).css('left', `${touch.pageX}px`);
    var drag = $(this);

    console.log(drag.get(0).getBoundingClientRect());

    empty = jQuery.map( empty, function(item) {
        if(
            drag.get(0).getBoundingClientRect().top + drag.offsetWidth / 2 < item.getBoundingClientRect().bottom
        ){
            alert('match')
        }
        // console.log(item.getBoundingClientRect());
    });
});

$(".seat-vertical").on("touchend",function(event){
    $(this).css('position', 'relative');
    $(this).css('top','');
    $(this).css('left', '');
});
