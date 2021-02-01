//Marquee
$(function (){

    /* Example options:*/

    let options = {
        autostart: true,
        property: 'value',
        onComplete: null,
        duration: 20000,
        padding: 10,
        marquee_class: '.marquee',
        container_class: '.simple-marquee-container',
        sibling_class: 0,
        hover: true,
        velocity: 0,
        direction: 'right'
    }

    $('.simple-marquee-container').SimpleMarquee(options);



    $('.simple-marquee-container').SimpleMarquee();

});
