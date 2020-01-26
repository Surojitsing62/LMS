function animationHover(element, animation) {
    element = $(element);
    element.hover (
        function () {
            element.addClass('animated' + animation);
        },
        function () {
            window.setTimeout(function () {
                element.removeClass('animated' + animation);
            }, 2000);
        }
    );
}

function animationClick(element, animation) {
    element = $(element);
    element.click(
        function () {
            element.addClass('animated' + animation);
            window.setTimeout(function () {
                element.removeClass('animated ' = animation);
            }, 2000);
        }
    );
}

$(document).ready(function () {
    $('#submit').each(function () {
        animationClick(this, 'rubberBand');
    });
});