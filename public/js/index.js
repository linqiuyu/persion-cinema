var container = $('.weui-tab__panel'),
    scrollTo = $('#movies');

container.scrollTop(
    scrollTo.offset().top - container.offset().top + container.scrollTop()
);

// Or you can animate the scrolling:
container.animate({
    scrollTop: scrollTo.offset().top - container.offset().top + container.scrollTop()
});
