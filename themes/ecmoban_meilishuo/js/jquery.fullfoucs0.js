; (function ($) {
    $.extend({
        'fullFoucs': function (con) {
            var $win = $(window)
                , $control = $('#flash_control')
                , $imgBox = $('#index_ex_slide')
                , i = 0
                , getNextIndex = function (y) { return i + y >= config._imgLen ? i + y - config._imgLen : i + y; }
                , getPrevIndex = function (y) { return i - y < 0 ? config._imgLen + i - y : i - y; }
                , config = {
                    isAutoPlay: con && typeof con.isAutoPlay !== 'undefined' ? con.isAutoPlay : true,
                    interval: con && con.interval || 3500,
                    animateTime: con && con.animateTime || 1000,
                    direction: con && con.direction || 'up',
                    _imgLen: 6
                }
                , setPosition = function () {
                    $control.css({
                        left: ($win.width() - $control.width()) / 2
                    });
                    $imgBox.find('li').css({
                        width: $win.width(),
                        height: $win.height()
                    });
                }
                , slide = function (dec) {
                    $imgBox.find('li:eq(' + i + ')').stop().animate({
                        left: dec ? $win.width() : -$win.width()
                    }, config.animateTime).end().find('li:eq(' + (dec ? getPrevIndex(1) : getNextIndex(1)) + ')').stop().animate({
                        left: 0
                    }, config.animateTime, function () {
                        $imgBox.find('li:eq(' + (dec ? getPrevIndex(2) : getNextIndex(2)) + ')').css({
                            left: dec ? -$win.width() : $win.width()
                        }).end().find('li:eq(' + (dec ? getPrevIndex(3) : getNextIndex(3)) + ')').css({
                            left: dec ? -$win.width() * 2 : $win.width() * 2
                        });
                        i = dec ? getPrevIndex(1) : getNextIndex(1);
                    });
                }, s
            , play = function () {
                s = setInterval(function () {
                    slide(config.direction === 'down');
                }, config.interval);
                $control.find('div:eq(0)').removeClass('on');
            }
            , pause = function () { clearInterval(s); $control.find('div:eq(0)').addClass('on'); }
            , init = function () {
                if (config.direction === 'up') {
                    $imgBox.find('li').each(function (x) { $(this).css('left', x * $win.width()); });
                } else {
                    $imgBox.find('li').each(function (x) { $(this).css('left', (x === 0 ? 0 : x - config._imgLen) * $win.width()); });
                }
                setPosition();
                if (config.isAutoPlay) {
                    play();
                } else { $control.find('div:eq(0)').addClass('on'); }
                $control.find('a.icon-pause').click(pause).siblings('a.icon-play').click(play).siblings('a.icon-up').click(function () {
                    if ($(':animated').length === 0) { slide(false); }
                }).siblings('a.icon-down').click(function () { if ($(':animated').length === 0) { slide(true); } });
                $win.resize(setPosition);
            };
            init();
        }
    });
}(jQuery));