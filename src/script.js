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

    const potatos = [
      'http://i3.kym-cdn.com/photos/images/original/000/581/296/c09.jpg',
      'http://upload.wikimedia.org/wikipedia/en/5/5f/Original_Doge_meme.jpg',
      'http://images.says.com/uploads/story_source/source_image/257750/522b.jpg',
      'http://cdn.superbwallpapers.com/wallpapers/meme/doge-pattern-27481-1600x1200.jpg',
      'http://dogecoin.com/imgs/doge.png',
      'http://www.freeallimages.com/wp-content/uploads/2014/09/doge-original-4.jpg',
      'http://www.freeallimages.com/wp-content/uploads/2014/09/doge-original-3.jpg',
      'http://www.freeallimages.com/wp-content/uploads/2014/09/doge-original-2.jpg',
      'http://www.freeallimages.com/wp-content/uploads/2014/09/doge-original-1.jpg',
      'http://www.freeallimages.com/wp-content/uploads/2014/09/doge-original-3.jpg',
      'http://www.freeallimages.com/wp-content/uploads/2014/09/doge-original-5.jpg',
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
