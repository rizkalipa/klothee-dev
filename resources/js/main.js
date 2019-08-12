// Social Media Sharer

$('#shareFb').click(function()
{
    u = 'klothee.rf.gd';
    t = $('#share-desc').text();

    window.open("http://www.facebook.com/sharer.php?u=https://klothee.rf.gd&t='Ini adalah contoh produk'");
})

$('.menu .nav-bar').click(function(e)
{
    e.stopPropagation();
    $('.mobile-header').animate({'right': '0'}, 500)
})

$('body').click(function()
{   

    $('.mobile-header').animate({'right': '-300px'}, 500)
})

$('.responsive-menu a').mouseover(function()
{
    $(this).css({
        'background': 'white',
        'transition': '0.3s ease-in-out',
        'cursor': 'pointer',
        'color': '#333'});
})

$('.responsive-menu a').mouseout(function()
{
    $(this).css({
        'background': '#333',
        'transition': '0.3s ease-in-out',
        'color': 'white'});
})