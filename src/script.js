// based on https://github.com/idiot/doge
(function dogeMode($) {
  $.doge = function things($things) {
    const words = $.extend(['doge', 'shibe', 'excite', 'impress', 'skill', 'warn'], $things);

    const r = function random(arr) {
      let thing;
      if (arr) {
        thing = arr;
      } else {
        thing = words;
      }
      return thing[Math.floor(Math.random() * thing.length)];
    };

    const dogeMod = [
      'wow', 'such ' + r(), 'very ' + r(), 'much ' + r(),
      'wow', 'such ' + r(), 'very ' + r(), 'much ' + r(),
      'so ' + r(), 'many ' + r(), 'want ' + r(),
      'wow', 'wow',
    ];

    doge.append('<div class="wpdb-overlay" />');

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
        + r(dogeMod) +
        '</span>'
      );
    }, 700);
  };
})(jQuery);
