// based on https://github.com/idiot/doge
(function dogeMode($) {
  $.doge = function things($things) {
    const words = $.extend(['doge', 'shibe', 'excite', 'impress', 'skill', 'amaze', 'website', 'article', 'read', 'click', 'link', 'ad'], $things);

    function randomer(arr) {
      let thing;
      if (arr) {
        thing = arr;
      } else {
        thing = words;
      }
      return thing[Math.floor(Math.random() * thing.length)];
    }

    const dogeMod = [
      'wow', 'such ' + randomer(), 'very ' + randomer(), 'much ' + randomer(),
      'wow', 'such ' + randomer(), 'very ' + randomer(), 'much ' + randomer(),
      'so ' + randomer(), 'many ' + randomer(), 'want ' + randomer(),
      'wow', 'wow',
    ];

    $('body').append('<div class="wpdm-overlay" />');

    const potatos = [
      wpdm.img_url + 'doge-1.jpg',
      wpdm.img_url + 'doge-2.jpg',
      wpdm.img_url + 'doge-3.jpg',
      wpdm.img_url + 'doge-4.jpg',
      wpdm.img_url + 'doge-5.jpg',
      wpdm.img_url + 'doge-6.jpg',
      wpdm.img_url + 'doge-7.jpg',
      wpdm.img_url + 'doge-8.jpg',
      wpdm.img_url + 'doge-9.jpg',
      wpdm.img_url + 'doge-10.jpg',
      wpdm.img_url + 'doge-11.jpg',
    ];
    $('img').each(function imageDogenizator() {
      $(this).attr('src', potatos[Math.floor(Math.random() * potatos.length)]);
    });

    setInterval(function dogeModeInit() {
      $('.wpdm-overlay').append(
        '<span style="position: absolute; left: ' + Math.random()  * 100 + '%;top: ' + Math.random()  * 100 + '%;font-size: ' + Math.max(24, (Math.random() * 50 + 50)) + 'px; color: rgb(' + Math.round(Math.random() * 255) + ', ' + Math.round(Math.random() * 255) + ', ' + Math.round(Math.random() * 255) + ');">'
        + randomer(dogeMod) +
        '</span>'
      );
    }, 1500);
  };
})(jQuery);

jQuery(jQuery.doge);
