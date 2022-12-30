$(function() {
    window.toast         = function (text, head, icon) {
        var bgColor   = '#616161';
        var textColor = '#FEFEFE';
        switch (icon) {
            case 'error':
                bgColor = '#DC3545';
                break;
            case 'success':
                bgColor = '#198754';
                break;
            case 'warning':
                bgColor = '#BB9107';
                break;
            case 'info':
                bgColor = '#0A6BB9';
                break;
            default:
                bgColor = '#616161';
        }

        $.toast({
            text: text, // Text that is to be shown in the toast
            heading: head || '', // Optional heading to be shown on the toast
            showHideTransition: 'slide', // fade, slide or plain
            allowToastClose: true, // Boolean value true or false
            hideAfter: 4000,
            stack: 5,
            position: 'top-right',
            bgColor: bgColor,  // Background color of the toast
            textColor: textColor,  // Text color of the toast
            textAlign: 'left',  // Text alignment i.e. left, right or center
            loader: false,  // Whether to show loader or not. True by default
            icon: false,
            beforeShow: function () {}, // will be triggered before the toast is shown
            afterShown: function () {}, // will be triggered after the toat has been shown
            beforeHide: function () {}, // will be triggered before the toast gets hidden
            afterHidden: function () {}  // will be triggered after the toast has been hidden
        });
    };
    window.toast_success = function (text, head) {
        toast(text, head, 'success');
    };
    window.toast_error   = function (text, head) {
        toast(text, head, 'error');
    };
    window.toast_info    = function (text, head) {
        toast(text, head, 'info');
    };
    window.toast_warning = function (text, head) {
        toast(text, head, 'warning');
    };
    window.api ={
        get(path, data) {
            let _path = path;
            let parts = path.split('?', 2);
            if (data !== undefined) {
                if (parts.length === 2) {
                    parts[1] += '&' + $.param(data);
                } else {
                    parts[0] += '?' + $.param(data);
                }
            }
            _path = parts.join('?');

            if (!_path.includes('__token')) {
                parts = _path.split('?', 2);

                if (parts.length === 2) {
                    parts[1] += '&__token=' + wbapp._session.token;
                } else {
                    parts[0] += '?__token=' + wbapp._session.token;
                }
                _path = parts.join('?');
            }

            const defaultOptions = {Method: 'GET'};
            return fetch(_path, defaultOptions).then((result) => result.json());
        },
        post(path, data) {
            //return this.request(path, 'post', data, options);
            if (is_string(data) && (data.indexOf('__token') == -1)) {
                data += '&__token=' + wbapp._session.token;
            } else if (!data.hasOwnProperty('__token')) {
                try { data.__token = wbapp._session.token; } catch (error) { null; }
            }
            wbapp.loading();
            return $.post(path, data, function () {
                wbapp.unloading();
            });
        }
    };
    window.popupMessage = function (title, subtitle, caption, html, onShow) {
        return new Ractive({
            el: '.popup.--message',
            template: wbapp.tpl('#popupMessage').html,
            data: {
                content: html,
                title: title,
                subtitle: subtitle,
                caption: caption,
                html: html
            },
            on: {
                init() {
                },
                complete() {
                    if (!!onShow) {
                        onShow(this);
                    }
                    $(this.el).show();
                },
                close(e) {}
            }
        });

    };
    $(document).ready(function() {
        $(document).delegate('.select .select__main', 'click', function() {
            $(this).parent().toggleClass('active');
            return false;
        }).delegate('.select .select__item', 'click', function(e) {
            //e.stopPropagation(); - не работает фильр блога
            var value = false;
            if ($(this).hasClass('select__item--checkbox')) {
                var ne = false;
                value = [];
                $(this).closest('.select__list').find('.select__item--checkbox').each(function() {
                    if ($(this).find('input[type=checkbox]:checked').length) {
                        value.push($(this).find('.select__name:first').text());
                        ne = true;
                    }
                });
                value = value.join(', ');
                $(this).closest('.select').toggleClass('has-values', ne).find('.select__values:first').html(value);
            } else {
                value = $(this).html();
                $(this).addClass('active').siblings('.select__item').removeClass('active');
                $(this).closest('.select').removeClass('active').find('.select__main:first').html(value);
                if ($(this).data('id') !== undefined) value = $(this).data('id');
                $(this).closest('.select').find('input[type=hidden]:not(.group):not(.status):not(.pay_status)').each(function() {
                    $(this).val(value);
                });
            }
        })

        $('body').on('click', 'a.--openfilter', function() {
            $($(this).attr('href')).show();
            return false;
        }).on('click', '.--closefilter', function() {
            $(this).closest('.mainfilter').hide();
            return false;
        }).on('click', '.data-tab-link', function() {
            var W = $('.data-tab-wrapper[data-tabs="' + $(this).attr('data-tabs') + '"]:first');
            var T = W.find('.data-tab-item[data-tab="' + $(this).attr('data-tab') + '"]:first');
            $(this).addClass('active').siblings('.data-tab-link').removeClass('active');
            T.addClass('active').siblings('.data-tab-item').removeClass('active');
            return false;
        }).on('click', '.--openpopup', function() {
            var P = $(this).attr('data-popup');
            var _f = $(this).data('call');

            $('body').find('div.' + P + ':first').show();
            setTimeout(function() {
                $(document).find('.gallery__slider').each(function() {
                    new Swiper(this, {
                        loop: true,
                        slidesPerView: 1,
                        speed: 1000,
                        spaceBetween: 30,
                        navigation: { nextEl: '.gallery__nav .next', prevEl: '.gallery__nav .prev' },
                    });
                });
            }, 600);
            //return false;
        }).on('click', '.--switchpopup', function() {
            var P = $(this).attr('data-popup');
            $(this).closest('.popup').hide();
            $('body').find('div.' + P + ':first').show();
            return false;
        }).on('click', '.popup__panel.--succed.d-block .popup__close', function(e) {
            e.stopPropagation();
            $(this).closest('.popup').hide();
            $(this).closest('.popup').find('.popup__panel.d-none:not(.--succed)').removeClass('d-none');
            $(this).closest('.popup').find('.--succed.d-block').removeClass('d-block');
            return false;
        }).on('click', '.popup__close', function() {
            $(this).closest('.popup').hide();
            return false;
        }).on('click', 'button.burger', function(e) {
            e.stopPropagation();
            $(this).toggleClass('active');
            $('#mainmenu').toggleClass('active', $(this).hasClass('active'));
        }).on('click', '#mainmenu', function(e) {
            e.stopPropagation();
        }).on('click', '.accardeon .accardeon__click', function() {
            if ($(this).closest('.accardeon').hasClass('active')) {
                $(this).closest('.accardeon').removeClass('active');
            } else {
                $(this).closest('.accardeon').addClass('active').siblings('.accardeon').removeClass('active');
            }

            return false;
        }).on('___click', '.select .select__main', function() { // ###############
            if ($(this).parent().hasClass('active')) {
                $(this).parent().removeClass('active');
            } else {
                $('.select').each(function() {
                    $(this).removeClass('active');
                });
                $(this).parent().addClass('active');
            }
            return false;
        }).on('___click', '.select .select__item', function(e) { // ###############
            //e.stopPropagation(); - не работает фильр блога
            var value = false;
            if ($(this).hasClass('select__item--checkbox')) {
                var ne = false;
                value = [];
                $(this).closest('.select__list').find('.select__item--checkbox').each(function() {
                    if ($(this).find('input[type=checkbox]:checked').length) {
                        value.push($(this).find('.select__name:first').text());
                        ne = true;
                    }
                });
                value = value.join(', ');
                $(this).closest('.select').toggleClass('has-values', ne).find('.select__values:first').html(value);
            } else {
                value = $(this).html();
                $(this).addClass('active').siblings('.select__item').removeClass('active');
                $(this).closest('.select').removeClass('active').find('.select__main:first').html(value);
                $(this).closest('.select').find('input[type=hidden]').each(function() {
                    $(this).val(value);
                });
            }
        }).on('click', '.admin-editor button.user__edit', function() {
            $(this).closest('.admin-editor').find('.profile-edit:first').addClass('active');
            return false;
        }).on('click', '.account button.user__edit.all', function() {
            $(this).parents('.account').find('.profile-edit').toggleClass('active');
            return false;
        }).on('click', '.account button.user__edit:not(.all)', function() {
            $(this).closest('.account').find('.profile-edit:first').toggleClass('active');
            return false;
        }).on('click', '.accardeon button.user__edit', function() {
            $(this).closest('.accardeon').find('.profile-edit:first').toggleClass('active');
            return false;
        }).on('click', '.popup__overlay', function() {
            $(this).closest('.popup').hide();
        }).on('click', '.profile-menu', function(e) {
            e.stopPropagation();
            $(this).toggleClass('active');
        }).on('click', 'button.flag-date__ico', function() {
            $(this).toggleClass('checked');
        }).on('change', '.hider-checkbox input[type=checkbox]', function(e) {
            $('[data-hide="' + $(this).parent().attr('data-hide-input') + '"]').toggle(!(this.checked));
        }).on('change', '.show-checkbox input[type=checkbox]', function(e) {
            $('[data-show="' + $(this).parent().attr('data-show-input') + '"]').toggle(this.checked);
        }).on('click', '.repeater-delete', function() {
            $(this).closest('.repeater-item').remove();
            return false;
        }).on('click', '.repeater-add', function() {
            var R = $(this).attr('data-repeater');
            var S = $('.repeater-sample[data-repeater="' + R + '"]:first');
            var C = $('.repeater-container[data-repeater="' + R + '"]:first');
            if (S)
                if (C) {
                    S = S.clone();
                    S.removeClass('repeater-sample').addClass('repeater-item').appendTo(C);
                    S.trigger('repeaterAdd');
                }
            return false;
        }).on('repeaterAdd', '[data-repeater="license"]', function() {
            $(this).find('input').attr('name', 'adv[licenses][]');
            initPlugins();
        }).on('repeaterAdd', '[data-repeater="study"]', function() {
            var _max_idx = $(this).parents('.repeater-container')
                .find('.profile-education__inner.row[data-idx]:last')
                .data('idx');
            _max_idx++;
            $(this).attr('data-idx', _max_idx);
            $(this).find('input[name="stages[][stage]"]').attr('name', 'adv[stages][' +
                _max_idx + '][stage]');
            $(this).find('input[name="stages[][year]"]').attr('name', 'adv[stages][' +
                _max_idx + '][year]');
            $(this).find('input[name="stages[][year_end]"]').attr('name', 'adv[stages][' +
                _max_idx + '][year_end]');
            initPlugins();
        }).on('click', '.ddl', function() {
            $(this).toggleClass('active');
            return false;
        }).on('click', '.ddl a', function() {
            $(this).parent().toggleClass('active');
            return false;
        });

        $('html').on('click', 'body', function() {
            $('.select').removeClass('active');
            $('button.burger').removeClass('active');
            $('#mainmenu').removeClass('active');
            $('.profile-menu').removeClass('active');
        }).on('click', 'header', function() {
            $('#mainfilter').hide();
        });

        $(document).find('.gallery__slider').each(function() {
            new Swiper(this, {
                loop: true,
                slidesPerView: 1,
                speed: 1000,
                loop: true,
                loopFillGroupWithBlank: true,
                spaceBetween: 30,
                navigation: { nextEl: '.gallery__nav .next', prevEl: '.gallery__nav .prev' },
            });

        })

        initPlugins = function() {
            $('input.datebirthdaypickr').each(function() {
                console.log($(this).val());
                new AirDatepicker(this, {
                    selectedDates: [$(this).val() || (new Date())],
                    maxDate: (new Date()),
                    autoClose: true,
                    dateFormat: 'dd.MM.yyyy',
                    timepicker: false
                });
            });
            $('input.daterangepickr').each(function() {
                new AirDatepicker(this, {
                    autoClose: true,
                    range: true,
                    multipleDatesSeparator: ' - '
                });
            });
            $('input.yearpickr').each(function() {
                let _config = {
                    selectedDates: [$(this).val() || (new Date())],
                    dateFormat: 'yyyy',
                    maxDate: (new Date()),
                    view: 'years',
                    timepicker: false,
                    minView: 'years',
                    autoClose: true
                };
                if ($(this).hasClass('empty-date') || $(this).val() == '') {
                    delete _config.selectedDates;
                }

                new AirDatepicker(this, _config);
            });

            $('input.datepickr').each(function() {
                let _config = {
                    timepicker: false,
                    dateFormat: 'dd.MM.yyyy',
                    autoClose: true
                };

                if ($(this).val() != '') {
                    _config.selectedDates = [$(this).val()],

                        _config.minDate = $(this).data('min-date') || '';
                    if ($(this).data('max-date')) {
                        _config.maxDate = $(this).data('max-date');
                    }
                }

                new AirDatepicker(this, _config);
            });

            $('.input__control.timepickr').each(function(e) {
                console.log($(this), e);
                $(this).timepicker({
                    timeFormat: $(this).data('time-format') || 'HH:mm',
                    interval: $(this).data('interval') || 15,
                    minTime: $(this).data('min-time') || '08:00',
                    maxTime: $(this).data('max-time') || '19:00',
                    dynamic: false,
                    dropdown: true,
                    scrollbar: true
                });
            });
            $('input.datetimepickr').each(function() {
                new AirDatepicker(this, {
                    selectedDates: [$(this).val() || (new Date())],
                    minHours: 8,
                    maxHours: 20,
                    timepicker: true,
                    autoClose: true,
                    minutesStep: 10,
                    dateFormat: 'dd.MM.yyyy',
                    timeFormat: "HH:mm"
                });
            });

            $('input[data-inputmask]').each(function() {
                $(this).inputmask();
            });

            //
            //$('input.autocomplete').each(function () {
            //    $(this).autocomplete({
            //        noCache: true,
            //        minChars: 3,
            //    });
            //});

            $('input.autocomplete-inline').each(function() {
                let _lookup = $(this).data('lookup');
                if (!!_lookup) {
                    _lookup = _lookup.split(',');
                } else {
                    _lookup = [];
                }
                $(this).autocomplete({
                    noCache: true,
                    minChars: 1,
                    noSuggestionNotice: '<p>Нет результатов..</p>',
                    lookup: function(query, done) {
                        // Do Ajax call or lookup locally, when done,
                        // call the callback and pass your results:
                        var _res = [];
                        _lookup.forEach(function(v, k) {
                            _res.push({ "value": v, "data": k });
                        });
                        var result = { suggestions: _res };
                        done(result);
                    },
                });
            });

        };

        $(document).on('click', 'a.login, a.signout', function(e) {
            console.log('Clear cached data...');
            sessionStorage.removeItem('db.quoteStatus');
            sessionStorage.removeItem('db.quotePay');
            sessionStorage.removeItem('db.quoteType');
            sessionStorage.removeItem('db.categories');
            sessionStorage.removeItem('db.services');
            sessionStorage.removeItem('db.servicesList');
            sessionStorage.removeItem('db.servicePrices');
            sessionStorage.removeItem('db.experts');
        });

        $(document).on('wb-verify-false', function(e, el, err) {
            if (err !== undefined) {
                alert(err)
                    //wbapp.toast(wbapp._settings.sysmsg.error, err, { target: '.content-toasts', 'bgcolor': 'warning', 'txcolor': 'white' });
            }
        });

        $(document).on('wb-save-error', function(e, res) {
            if (res.data == undefined) return;
            if (res.data.error == true) {
                alert(res.data.msg)
                    //wbapp.toast(wbapp._settings.sysmsg.error, err, { target: '.content-toasts', 'bgcolor': 'warning', 'txcolor': 'white' });
            }
        });

        $(document).on('wb-ajax-done', function(e, res) {
            if (res.data.error == true) {
                alert(res.data.msg)
                    //wbapp.toast(wbapp._settings.sysmsg.error, err, { target: '.content-toasts', 'bgcolor': 'warning', 'txcolor': 'white' });
            }
        });

        function getCookie(name) {
            var match = document.cookie.match(RegExp('(?:^|;\\s*)' + name + '=([^;]*)'));
            return match ? match[1] : null;
        }

        function setCookie(c_name, value, exdays) {
            var exdate = new Date();
            exdate.setDate(exdate.getDate() + exdays);
            var c_value = escape(value) + ((exdays == null) ? "" : "; expires=" + exdate.toUTCString());
            document.cookie = c_name + "=" + c_value;
        }

        /*
         var map = document.querySelector('#map');
         if (map) {
         new google.maps.Map(map, {
         center: { lat: 55.742403, lng: 37.575313 },
         zoom: 12,
         });
         }
         */

        /*
         var header = $('.header'),
         scrollPrev = 0;

         $(window).scroll(function() {
         var scrolled = $(window).scrollTop();

         if ((scrolled > 10) && (scrolled > scrollPrev)) {
         header.addClass('out');
         } else {
         header.removeClass('out');
         }

         scrollPrev = scrolled;
         });

         */

        //header flip
        /*
         if($('.header__logo').hasClass('header__logo-red')){
         setTimeout(function(){
         $('.header__logo-red').addClass('active');
         }, 2000);
         }
         */

        //sliders
        var swiper = new Swiper('.product-slider', {
            slidesPerView: 1,
            watchSlidesVisibility: true,
            watchOverflow: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
        /*
         var swiper = new Swiper('.post-slider', {
         slidesPerView: 1,
         watchOverflow: true,
         spaceBetween: 30,
         });

         */

        if (getCookie('cookok')) {
            $('.cookies-block').remove()
        } else {
            $('.cookies-block').addClass('cookies-block--active')
            $('.cookies-block .cookies-block__accept-button').on('click', function() {
                setCookie('cookok', true, 300)
                $('.cookies-block').removeClass('cookies-block--active')
            })
        }

        // top button
        $('.to_top_btn').click(function() {
            $('html, body').animate({ scrollTop: 0 }, 800);
        })

        if (window.pageYOffset > 10) {
            $('.header').addClass('out');
            $('.to_top_btn').addClass('showed');
        }

        $(window).scroll(function() {
            if ($(this).scrollTop() <= 10) {
                $('.header').removeClass('out');
                $('.to_top_btn').removeClass('showed');
            }
            if ($(this).scrollTop() > 10) {
                $('.header').addClass('out');
                $('.to_top_btn').addClass('showed');
            }
        });
    });

});