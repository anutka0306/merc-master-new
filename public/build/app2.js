(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["app2"],{

/***/ "./frontend/app.js":
/*!*************************!*\
  !*** ./frontend/app.js ***!
  \*************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var uikit__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! uikit */ "./node_modules/uikit/dist/js/uikit.js");
/* harmony import */ var uikit__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(uikit__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var uikit_dist_js_uikit_icons__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! uikit/dist/js/uikit-icons */ "./node_modules/uikit/dist/js/uikit-icons.js");
/* harmony import */ var uikit_dist_js_uikit_icons__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(uikit_dist_js_uikit_icons__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var uikit_dist_css_uikit_min_css__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! uikit/dist/css/uikit.min.css */ "./node_modules/uikit/dist/css/uikit.min.css");
/* harmony import */ var uikit_dist_css_uikit_min_css__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(uikit_dist_css_uikit_min_css__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _blocks_main_sass__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./blocks/main.sass */ "./frontend/blocks/main.sass");
/* harmony import */ var _blocks_main_sass__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_blocks_main_sass__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var _blocks_main_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./blocks/main.js */ "./frontend/blocks/main.js");
/* harmony import */ var _blocks_section_callback_callback_popup__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./blocks/section/callback/callback-popup */ "./frontend/blocks/section/callback/callback-popup.js");
/* harmony import */ var _blocks_section_map_map__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./blocks/section/map/map */ "./frontend/blocks/section/map/map.js");
/* harmony import */ var _blocks_section_mango_mango__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./blocks/section/mango/mango */ "./frontend/blocks/section/mango/mango.js");
/* harmony import */ var _libs_swiper_slider_swiper_sliders_js__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./libs/swiper_slider/swiper_sliders.js */ "./frontend/libs/swiper_slider/swiper_sliders.js");
/* harmony import */ var _libs_lazy_youtube_lazy_youtube__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! ./libs/lazy_youtube/lazy_youtube */ "./frontend/libs/lazy_youtube/lazy_youtube.js");
/* harmony import */ var _libs_lazyload_min__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ./libs/lazyload.min */ "./frontend/libs/lazyload.min.js");
/* harmony import */ var _libs_lazyload_min__WEBPACK_IMPORTED_MODULE_10___default = /*#__PURE__*/__webpack_require__.n(_libs_lazyload_min__WEBPACK_IMPORTED_MODULE_10__);











new _libs_lazyload_min__WEBPACK_IMPORTED_MODULE_10___default.a({
  elements_selector: ".lazy"
});

/***/ }),

/***/ "./frontend/blocks/main.js":
/*!*********************************!*\
  !*** ./frontend/blocks/main.js ***!
  \*********************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var core_js_modules_es_array_slice__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! core-js/modules/es.array.slice */ "./node_modules/core-js/modules/es.array.slice.js");
/* harmony import */ var core_js_modules_es_array_slice__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_slice__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _libs_jquery_maskedinput_min__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../libs/jquery.maskedinput.min */ "./frontend/libs/jquery.maskedinput.min.js");
/* harmony import */ var _libs_jquery_maskedinput_min__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_libs_jquery_maskedinput_min__WEBPACK_IMPORTED_MODULE_2__);



jquery__WEBPACK_IMPORTED_MODULE_1___default()(document).ready(function ($) {
  // Маска для телефона
  $('.js-phone').mask("+7(999) 999-99-99");
  $('.js-email').mask("*{1,20}[.*{1,20}][.*{1,20}][.*{1,20}]@*{1,20}[.*{2,6}][.*{1,2}]");
  $('.seo-box__text-hide').hide();
  $('.seo-box__more').on('click', function () {
    $(this).toggleClass('is-show');
    $(this).prev('.seo-box__text-hide').slideToggle();
    $(this).text($(this).text() === 'Свернуть' ? 'Развернуть' : 'Свернуть');
  }); // Показываем ,бренды

  $('.brands > div').hide();
  $('.brands > div').slice(0, 4).show();
  $('.brands__more').on('click', function (e) {
    e.preventDefault();
    $('.brands > div:hidden').slice(0, 2).slideDown();
    var elHidden = $('.brands > div:hidden').length;

    if (elHidden <= 0) {
      $('.brands__more').hide();
    }
  });
});

/***/ }),

/***/ "./frontend/blocks/main.sass":
/*!***********************************!*\
  !*** ./frontend/blocks/main.sass ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./frontend/blocks/section/callback/callback-popup.js":
/*!************************************************************!*\
  !*** ./frontend/blocks/section/callback/callback-popup.js ***!
  \************************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var core_js_modules_es_array_find__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! core-js/modules/es.array.find */ "./node_modules/core-js/modules/es.array.find.js");
/* harmony import */ var core_js_modules_es_array_find__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_find__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var core_js_modules_es_array_join__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! core-js/modules/es.array.join */ "./node_modules/core-js/modules/es.array.join.js");
/* harmony import */ var core_js_modules_es_array_join__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_join__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var core_js_modules_es_function_name__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! core-js/modules/es.function.name */ "./node_modules/core-js/modules/es.function.name.js");
/* harmony import */ var core_js_modules_es_function_name__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_function_name__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var core_js_modules_es_object_to_string__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! core-js/modules/es.object.to-string */ "./node_modules/core-js/modules/es.object.to-string.js");
/* harmony import */ var core_js_modules_es_object_to_string__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_to_string__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var core_js_modules_es_regexp_exec__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! core-js/modules/es.regexp.exec */ "./node_modules/core-js/modules/es.regexp.exec.js");
/* harmony import */ var core_js_modules_es_regexp_exec__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_regexp_exec__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var core_js_modules_es_regexp_to_string__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! core-js/modules/es.regexp.to-string */ "./node_modules/core-js/modules/es.regexp.to-string.js");
/* harmony import */ var core_js_modules_es_regexp_to_string__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_regexp_to_string__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var core_js_modules_es_string_replace__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! core-js/modules/es.string.replace */ "./node_modules/core-js/modules/es.string.replace.js");
/* harmony import */ var core_js_modules_es_string_replace__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_string_replace__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var _callback_popup_scss__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./callback-popup.scss */ "./frontend/blocks/section/callback/callback-popup.scss");
/* harmony import */ var _callback_popup_scss__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(_callback_popup_scss__WEBPACK_IMPORTED_MODULE_8__);










function verifyForm(Form) {
  var phoneField = jquery__WEBPACK_IMPORTED_MODULE_7___default()(Form).find('[name="phone"]');
  var emailField = jquery__WEBPACK_IMPORTED_MODULE_7___default()(Form).find('[name="email"]');
  var nameField = jquery__WEBPACK_IMPORTED_MODULE_7___default()(Form).find('[name="name"]');
  var selectField = jquery__WEBPACK_IMPORTED_MODULE_7___default()(Form).find('select');
  var errors = false;

  for (var i = 0; i < jquery__WEBPACK_IMPORTED_MODULE_7___default()(Form).find('[required]').length; i++) {
    var element = jquery__WEBPACK_IMPORTED_MODULE_7___default()(Form).find('[required]').eq(i);
    element.next().removeClass('show');

    if (element.val() === '') {
      element.addClass('error').next().addClass('show').text('Поле обязательно для заполнения');
      errors = true;
    }
  }

  if (phoneField.length) {
    var phoneValue = phoneField.val();
    var phone_pattern = /7\d{10}/;

    if (phoneValue === '') {} else if (/_/gi.test(phoneValue)) {
      phoneField.addClass('error').next().addClass('show').text('Введите корректный номер телефона');
      errors = true;
    } else if (!phone_pattern.test(phoneValue.replace(/\D/gi, ''))) {
      phoneField.addClass('error').next().addClass('show').text('Введите корректный номер телефона');
      console.log(phoneValue.replace(/\D/gi, ''));
      errors = true;
    }
  }

  if (emailField.length) {
    var emailValue = emailField.val();
    var regexp = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/i;

    if (emailValue !== '' && !regexp.test(emailValue)) {
      emailField.addClass('msg-error').next().addClass('show').text('Введите корректный адрес электронной почты');
      errors = true;
    }
  }

  if (nameField.length) {
    var nameValue = nameField.val();
    var regexpName = /[a-z0-9]+/i;

    if (nameValue !== '' && regexpName.test(nameValue)) {
      nameField.addClass('msg-error').next().addClass('show').text('Имя не должно содержать латинских символов и цифр');
      errors = true;
    } else {
      nameField.removeClass('msg-error').next().removeClass('show').text('');
    }
  }

  if (selectField.length) {
    if (selectField.val() === '0' || !selectField.val().length) {
      selectField.addClass('msg-error').next().addClass('show').text('Пожалуйста, выберите Сервисный Центр');
      errors = true;
    } else {
      selectField.removeClass('msg-error').next().removeClass('show').text('');
    }
  }

  return errors;
}

function parseValues(values) {
  var result = {};

  for (var i = 0; i < values.length; i++) {
    result[values[i].name] = values[i].value;
  }

  return result;
}

function sendForm(formData, Form) {
  jquery__WEBPACK_IMPORTED_MODULE_7___default.a.ajax({
    type: 'POST',
    url: Form.action,
    data: formData,
    dataType: 'json',
    success: function success(data) {
      if (data.status) {
        showSuccessMsg();
        alert(data.msg);
      } else {
        alert("Возникли ошибки:\n - " + data.errors.join("\n - "));
      }
    },
    error: function error(e) {
      console.log(e.responseJSON);
      alert(e.responseJSON.detail);
    }
  });
}

function showSuccessMsg() {
  jquery__WEBPACK_IMPORTED_MODULE_7___default()('.form-body').hide();
  jquery__WEBPACK_IMPORTED_MODULE_7___default()('.form-msg').show();
  var modal_callback = jquery__WEBPACK_IMPORTED_MODULE_7___default()('#modal-callback');

  if (!modal_callback.hasClass('is-visible')) {
    modal_callback.addClass('is-visible');
  }
}

jquery__WEBPACK_IMPORTED_MODULE_7___default()(document).ready(function () {
  var modal_callback = jquery__WEBPACK_IMPORTED_MODULE_7___default()('.popup');
  var modal_title = modal_callback.find('.middle_text_form');
  jquery__WEBPACK_IMPORTED_MODULE_7___default()(document).on('click', '.js-popup-trigger', function (e) {
    e.preventDefault();
    var title = jquery__WEBPACK_IMPORTED_MODULE_7___default()(this).data('title');

    if (!title) {
      title = jquery__WEBPACK_IMPORTED_MODULE_7___default()(this).html();
    }

    if (!title) {
      title = 'Заказать звонок';
    }

    modal_title.html(title + ':');
    modal_callback.addClass('show');
  });
  jquery__WEBPACK_IMPORTED_MODULE_7___default()('.popup .close').click(function (e) {
    e.preventDefault();
    jquery__WEBPACK_IMPORTED_MODULE_7___default()(this).parent().parent().removeClass('show');
    jquery__WEBPACK_IMPORTED_MODULE_7___default()('.error-input').removeClass('show');
  });
  jquery__WEBPACK_IMPORTED_MODULE_7___default()('.js-callback-form').submit(function (e) {
    e.preventDefault();
    var Form = this.closest('form');

    if (verifyForm(Form)) {
      return false;
    } //$(this).prop('disabled', true);


    var tel = jquery__WEBPACK_IMPORTED_MODULE_7___default()(Form).find('input[name="phone"]').val();

    if (window.Comagic) {
      // const array_of_dealers_for_comagic = {
      // 	'lobn': 205855,
      // 	'udal': 205857,
      // 	'sev': 205861,
      // };
      //
      // var t = +new Date() + 10000;
      // const location = $(Form).find('select[name=location]').val();
      // var selected_location = array_of_dealers_for_comagic[location];
      // console.log('Location: '+location);
      // console.log('Comagic group: '+selected_location);
      // Comagic.sitePhoneCall({
      // 	captcha_key: '',
      // 	captcha_val: '',
      // 	phone: tel,
      // 	delayed_call_time: t.toString(),
      // 	group_id: selected_location
      // }, function (resp) {
      //
      // });
      var t = +new Date() + 10000;
      var settings = {
        "url": "https://admin.qrenta.ru/api/sitephone/code_perezvon?phone=78004&site=4",
        "method": "GET",
        "timeout": 0
      };
      jquery__WEBPACK_IMPORTED_MODULE_7___default.a.ajax(settings).done(function (response) {
        var id_ploshadki = "";

        if (response['status']) {
          id_ploshadki = response['data']['code_perezvon'];
        }

        ComagicWidget.sitePhoneCall({
          phone: tel,
          group_id: id_ploshadki,
          delayed_call_time: t.toString()
        });
      });
    }

    var formData = parseValues(jquery__WEBPACK_IMPORTED_MODULE_7___default()(Form).serializeArray());
    sendForm(formData, Form);
  });
});

/***/ }),

/***/ "./frontend/blocks/section/callback/callback-popup.scss":
/*!**************************************************************!*\
  !*** ./frontend/blocks/section/callback/callback-popup.scss ***!
  \**************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./frontend/blocks/section/mango/mango.js":
/*!************************************************!*\
  !*** ./frontend/blocks/section/mango/mango.js ***!
  \************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var core_js_modules_es_object_to_string__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! core-js/modules/es.object.to-string */ "./node_modules/core-js/modules/es.object.to-string.js");
/* harmony import */ var core_js_modules_es_object_to_string__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_to_string__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var core_js_modules_es_regexp_to_string__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! core-js/modules/es.regexp.to-string */ "./node_modules/core-js/modules/es.regexp.to-string.js");
/* harmony import */ var core_js_modules_es_regexp_to_string__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_regexp_to_string__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var _libs_jquery_maskedinput_min__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../libs/jquery.maskedinput.min */ "./frontend/libs/jquery.maskedinput.min.js");
/* harmony import */ var _libs_jquery_maskedinput_min__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_libs_jquery_maskedinput_min__WEBPACK_IMPORTED_MODULE_3__);




jquery__WEBPACK_IMPORTED_MODULE_2___default()(document).ready(function () {
  jquery__WEBPACK_IMPORTED_MODULE_2___default()(".phone_mask_perezvon").mask("(999) 999-99-99");
  jquery__WEBPACK_IMPORTED_MODULE_2___default()('#perethvon0').on('click', function () {
    jquery__WEBPACK_IMPORTED_MODULE_2___default()('#perethvon0').hide();
    jquery__WEBPACK_IMPORTED_MODULE_2___default()('#perethvon').show();
  });
  jquery__WEBPACK_IMPORTED_MODULE_2___default()('.close-popup_perezvon').on('click', function () {
    jquery__WEBPACK_IMPORTED_MODULE_2___default()('#perethvon0').show();
    jquery__WEBPACK_IMPORTED_MODULE_2___default()('#perethvon').hide();
  });
  jquery__WEBPACK_IMPORTED_MODULE_2___default()('div.button-widget_perezvon').on('click', function () {
    var phone = jquery__WEBPACK_IMPORTED_MODULE_2___default()("#phoneperezvon").val();

    if (phone.length < 7) {
      jquery__WEBPACK_IMPORTED_MODULE_2___default()('#phoneperezvon').css('border', '1px solid #FF0000');
      alert("заполните полое телефон, пожалуйста.");
    } else {//$('#phoneperezvon').css('border', '1px solid #B2B2B2');
    }

    if (phone.length > 6) {
      jquery__WEBPACK_IMPORTED_MODULE_2___default()(this).html('Отправка...');
      jquery__WEBPACK_IMPORTED_MODULE_2___default.a.post("/mail/callback/mango", {
        phone: '+7' + phone,
        subject: 'Заказ звонка с сайта'
      }, function (data111s22122ddd2111) {
        if (window.ComagicWidget) {
          var t = +new Date() + 10000; //	yaCounter41408589.reachGoal('perezvon');

          ComagicWidget.sitePhoneCall({
            phone: phone,
            group_id: '',
            delayed_call_time: t.toString()
          });
          console.log('phone =>' + phone);
        } else {
          console.log('Comagic не инициализирован!');
        }

        alert('Отправлено');
        jquery__WEBPACK_IMPORTED_MODULE_2___default()('#perethvon0').show();
        jquery__WEBPACK_IMPORTED_MODULE_2___default()('#perethvon').hide();
        jquery__WEBPACK_IMPORTED_MODULE_2___default()('.button-widget_perezvon').html('Отправлено');
        jquery__WEBPACK_IMPORTED_MODULE_2___default()('#phoneperezvon').remove();
      });
    }
  });
});

/***/ }),

/***/ "./frontend/blocks/section/map/map.js":
/*!********************************************!*\
  !*** ./frontend/blocks/section/map/map.js ***!
  \********************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var core_js_modules_es_array_find__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! core-js/modules/es.array.find */ "./node_modules/core-js/modules/es.array.find.js");
/* harmony import */ var core_js_modules_es_array_find__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_find__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_1__);

 //Переменная для включения/отключения индикатора загрузки

var spinner = jquery__WEBPACK_IMPORTED_MODULE_1___default()('.ymap-container').children('.loader'); //Переменная для определения была ли хоть раз загружена Яндекс.Карта (чтобы избежать повторной загрузки при наведении)

var check_if_load = false; //Необходимые переменные для того, чтобы задать координаты на Яндекс.Карте

var map, myPlacemarkTemp; //Функция создания карты сайта и затем вставки ее в блок с идентификатором "map-yandex"

function init() {
  var map = new ymaps.Map("map-yandex", {
    center: [55.775695, 37.613371],
    zoom: 10,
    controls: ['zoomControl', 'fullscreenControl']
  }),
      MyBalloonLayout = ymaps.templateLayoutFactory.createClass('<div class="map-baloon">' + '<a class="close" href="#">&times;</a>' + '<div class="arrow"></div>' + '$[[options.contentLayout observeSize minWidth=235 maxWidth=235 maxHeight=350]]' + '</div>', {
    build: function build() {
      this.constructor.superclass.build.call(this);
      this._$element = jquery__WEBPACK_IMPORTED_MODULE_1___default()('.map-baloon', this.getParentElement());
      this.applyElementOffset();

      this._$element.find('.close').on('click', jquery__WEBPACK_IMPORTED_MODULE_1___default.a.proxy(this.onCloseClick, this));
    },
    clear: function clear() {
      this._$element.find('.close').off('click');

      this.constructor.superclass.clear.call(this);
    },
    onSublayoutSizeChange: function onSublayoutSizeChange() {
      MyBalloonLayout.superclass.onSublayoutSizeChange.apply(this, arguments);

      if (!this._isElement(this._$element)) {
        return;
      }

      this.events.fire('shapechange');
    },
    applyElementOffset: function applyElementOffset() {
      this._$element.css({
        left: -(this._$element[0].offsetWidth / 2),
        top: -(this._$element[0].offsetHeight + this._$element.find('.arrow')[0].offsetHeight)
      });
    },
    onCloseClick: function onCloseClick(e) {
      e.preventDefault();
      this.events.fire('userclose');
    },
    getShape: function getShape() {
      if (!this._isElement(this._$element)) {
        return MyBalloonLayout.superclass.getShape.call(this);
      }

      var position = this._$element.position();

      return new ymaps.shape.Rectangle(new ymaps.geometry.pixel.Rectangle([[position.left, position.top], [position.left + this._$element[0].offsetWidth, position.top + this._$element[0].offsetHeight + this._$element.find('.arrow')[0].offsetHeight]]));
    },
    _isElement: function _isElement(element) {
      return element && element[0] && element.find('.arrow')[0];
    }
  }),
      MyBalloonContentLayout = ymaps.templateLayoutFactory.createClass('<div>$[properties.balloonContent]</div>'),
      lob = window.myPlacemark = new ymaps.Placemark([55.892138, 37.524166], {
    hintContent: 'Лобненская',
    balloonContent: '<div class="map-info">' + '<div class="map-info__title">Лобненская</div>' + '<div class="map-info__phone">Телефон</div>' + '<div class="map-info__phone-number"><a href="tel:+74951507078">+7(495) 150-70-78</a></div>' + '<div class="map-info__adress">Адрес</div>' + '<div class="map-info__adress-info">ул. Лобненская, 17 стр.1</div>' + '<div class="map-info__btn map-info__btn-links">Проложить маршрут' + '<div class="map-info__btn__content">\n' + '<a href="https://yandex.ru/maps/213/moscow/?ll=37.522588%2C55.891251&mode=routes&rtext=~55.892138%2C37.524166&rtt=auto&sll=37.726797%2C55.657246&sspn=0.889206%2C0.284548&text=%D1%83%D0%BB.%20%D0%9B%D0%BE%D0%B1%D0%BD%D0%B5%D0%BD%D1%81%D0%BA%D0%B0%D1%8F%2C%2017%20%D1%81%D1%82%D1%80.1&toaddress=%D0%9C%D0%BE%D1%81%D0%BA%D0%B2%D0%B0%2C%D1%83%D0%BB.%D0%9B%D0%BE%D0%B1%D0%BD%D0%B5%D0%BD%D1%81%D0%BA%D0%B0%D1%8F%2C%2017%2C%D1%81%D1%82%D1%80.1&z=15" target="_blank"  data-name="Лобненская" data-map="яндекс карты" class="marsh">Веб-версия Яндекс Карт</a>\n' + '<a href="yandexnavi://build_route_on_map?lat_to=55.892138&lon_to=37.524166" target="_blank"  data-name="Лобненская" data-map="яндекс навигатор" class="marsh">Яндекс Навигатор</a>\n' + '<a href="https://www.google.ru/maps/dir//%D1%83%D0%BB.+%D0%9B%D0%BE%D0%B1%D0%BD%D0%B5%D0%BD%D1%81%D0%BA%D0%B0%D1%8F,+17,+%D0%9C%D0%BE%D1%81%D0%BA%D0%B2%D0%B0,+127644/@55.8918798,37.5189218,15.75z/data=!4m8!4m7!1m0!1m5!1m1!1s0x46b539cffbd294dd:0x35fa4f70919e3ab5!2m2!1d37.5241599!2d55.892144" target="_blank"  data-name="Лобненская" data-map="гугл карты" class="marsh">Google Maps</a>\n' + '</div>' + '</div>' + '<div class="map-info__btn popup-trigger">Записаться</div>' + '</div>',
    iconCaption: 'Лобненская'
  }, {
    iconLayout: 'default#imageWithContent',
    iconImageHref: '/img/map/map-baloon.png',
    iconImageSize: [40, 56],
    iconImageOffset: [0, -38],
    balloonShadow: false,
    balloonLayout: MyBalloonLayout,
    balloonContentLayout: MyBalloonContentLayout,
    balloonPanelMaxMapArea: 0
  }),
      nizh = window.myPlacemark = new ymaps.Placemark([55.730036, 37.725280], {
    hintContent: 'Нижегородская',
    balloonContent: '<div class="map-info">' + '<div class="map-info__title">Нижегородская</div>' + '<div class="map-info__phone">Телефон</div>' + '<div class="map-info__phone-number"><a href="tel:+74950232190">+7 (495) 023-21-90</a></div>' + '<div class="map-info__adress">Адрес</div>' + '<div class="map-info__adress-info">Нижегородская 102 стр.3А</div>' + '<div class="map-info__btn map-info__btn-links">Проложить маршрут' + '<div class="map-info__btn__content">\n' + '<a href="https://yandex.ru/maps/213/moscow/?ll=37.725280%2C55.730036&mode=routes&rtext=~55.730036%2C37.725280&rtt=auto&sll=37.726797%2C55.657246&sspn=1.009369%2C0.319486&text=%D0%9D%D0%B8%D0%B6%D0%B5%D0%B3%D0%BE%D1%80%D0%BE%D0%B4%D1%81%D0%BA%D0%B0%D1%8F%20102%20%D1%81%D1%82%D1%80.3%D0%90&toaddress=%D0%9C%D0%BE%D1%81%D0%BA%D0%B2%D0%B0%2C%D1%83%D0%BB.%D0%9B%D0%BE%D0%B1%D0%BD%D0%B5%D0%BD%D1%81%D0%BA%D0%B0%D1%8F%2C%2017%2C%D1%81%D1%82%D1%80.1&z=17" target="_blank" data-name="Нижегородская" data-map="яндекс карты" class="marsh">Веб-версия Яндекс Карт</a>\n' + '<a href="yandexnavi://build_route_on_map?lat_to=55.730036&lon_to=37.725280" target="_blank" data-name="Нижегородская" data-map="яндекс навигатор" class="marsh">Яндекс Навигатор</a>\n' + '<a href="https://www.google.ru/maps/dir//%D0%9D%D0%B8%D0%B6%D0%B5%D0%B3%D0%BE%D1%80%D0%BE%D0%B4%D1%81%D0%BA%D0%B0%D1%8F+%D1%83%D0%BB.,+102,+3%D0%90,+%D0%9C%D0%BE%D1%81%D0%BA%D0%B2%D0%B0,+109052/@55.7300721,37.7138392,14.25z/data=!4m8!4m7!1m0!1m5!1m1!1s0x414ab547e4c38c61:0x28780ebee25c0df!2m2!1d37.7249284!2d55.7305072" target="_blank" data-name="Нижегородская" data-map="гугл карты" class="marsh">Google Maps</a>\n' + '</div>' + '</div>' + '<div class="map-info__btn popup-trigger">Записаться</div>' + '</div>',
    iconCaption: 'Нижегородская'
  }, {
    iconLayout: 'default#imageWithContent',
    iconImageHref: '',
    iconImageSize: [0, 0],
    iconContent: '',
    iconImageOffset: [0, 0],
    balloonShadow: false,
    balloonLayout: MyBalloonLayout,
    balloonContentLayout: MyBalloonContentLayout,
    balloonPanelMaxMapArea: 0
  }),
      udal = window.myPlacemark = new ymaps.Placemark([55.687766, 37.488125], {
    hintContent: 'Удальцова',
    balloonContent: '<div class="map-info">' + '<div class="map-info__title">Удальцова</div>' + '<div class="map-info__phone">Телефон</div>' + '<div class="map-info__phone-number"><a href="tel:+74953748856">+7(495) 374-88-56</a></div>' + '<div class="map-info__adress">Адрес</div>' + '<div class="map-info__adress-info">ул. Удальцова, 60</div>' + '<div class="map-info__btn map-info__btn-links">Проложить маршрут' + '<div class="map-info__btn__content">\n' + '<a href="https://yandex.ru/maps/213/moscow/?ll=37.488125%2C55.687766&mode=routes&rtext=~55.687766%2C37.488125&rtt=auto&sll=37.725280%2C55.730036&sspn=0.015771%2C0.004983&text=%D1%83%D0%BB.%20%D0%A3%D0%B4%D0%B0%D0%BB%D1%8C%D1%86%D0%BE%D0%B2%D0%B0%2C%2060&toaddress=%D0%9C%D0%BE%D1%81%D0%BA%D0%B2%D0%B0%2C%D1%83%D0%BB.%D0%9B%D0%BE%D0%B1%D0%BD%D0%B5%D0%BD%D1%81%D0%BA%D0%B0%D1%8F%2C%2017%2C%D1%81%D1%82%D1%80.1&z=17" target="_blank" data-name="Удальцова" data-map="яндекс карты" class="marsh">Веб-версия Яндекс Карт</a>\n' + '<a href="yandexnavi://build_route_on_map?lat_to=55.730036&lon_to=37.725280" target="_blank" data-name="Удальцова" data-map="яндекс навигатор" class="marsh">Яндекс Навигатор</a>\n' + '<a href="https://www.google.ru/maps/dir//%D1%83%D0%BB.+%D0%A3%D0%B4%D0%B0%D0%BB%D1%8C%D1%86%D0%BE%D0%B2%D0%B0,+60,+%D0%9C%D0%BE%D1%81%D0%BA%D0%B2%D0%B0,+119607/@55.6877711,37.4831173,15.75z/data=!4m8!4m7!1m0!1m5!1m1!1s0x46b54c4c6219af57:0xad55ab00c4c7519d!2m2!1d37.4880468!2d55.6877346" target="_blank" data-name="Удальцова" data-map="гугл карты" class="marsh">Google Maps</a>\n' + '</div>' + '</div>' + '<div class="map-info__btn popup-trigger">Записаться</div>' + '</div>',
    iconCaption: 'Удальцова'
  }, {
    iconLayout: 'default#imageWithContent',
    iconImageHref: '/img/map/map-baloon.png',
    iconImageSize: [40, 56],
    iconContent: 'Удальцова',
    iconImageOffset: [0, -38],
    balloonShadow: false,
    balloonLayout: MyBalloonLayout,
    balloonContentLayout: MyBalloonContentLayout,
    balloonPanelMaxMapArea: 0
  }),
      sevastop = window.myPlacemark = new ymaps.Placemark([55.635345, 37.543578], {
    hintContent: 'Севастопольский',
    balloonContent: '<div class="map-info">' + '<div class="map-info__title">Севастопольский</div>' + '<div class="map-info__phone">Телефон</div>' + '<div class="map-info__phone-number"><a href="tel:+74953747712">+7(495) 374-77-12</a></div>' + '<div class="map-info__adress">Адрес</div>' + '<div class="map-info__adress-info">Севастопольский пр-т, 95б</div>' + '<div class="map-info__btn map-info__btn-links">Проложить маршрут' + '<div class="map-info__btn__content">\n' + '<a href="https://yandex.ru/maps/213/moscow/?ll=37.543972%2C55.635318&mode=routes&rtext=~55.635345%2C37.543578&rtt=auto&sll=37.488125%2C55.687766&sspn=0.015771%2C0.005206&text=%D0%A1%D0%B5%D0%B2%D0%B0%D1%81%D1%82%D0%BE%D0%BF%D0%BE%D0%BB%D1%8C%D1%81%D0%BA%D0%B8%D0%B9%20%D0%BF%D1%80-%D1%82%2C%2095%D0%B1&toaddress=%D0%9C%D0%BE%D1%81%D0%BA%D0%B2%D0%B0%2C%D1%83%D0%BB.%D0%9B%D0%BE%D0%B1%D0%BD%D0%B5%D0%BD%D1%81%D0%BA%D0%B0%D1%8F%2C%2017%2C%D1%81%D1%82%D1%80.1&z=18" target="_blank" data-name="Севастопольский" data-map="яндекс карты" class="marsh">Веб-версия Яндекс Карт</a>\n' + '<a href="yandexnavi://build_route_on_map?lat_to=55.635345&lon_to=37.543578" target="_blank"  data-name="Севастопольский" data-map="яндекс навигатор" class="marsh">Яндекс Навигатор</a>\n' + '<a href="https://www.google.ru/maps/dir//%D0%A1%D0%B5%D0%B2%D0%B0%D1%81%D1%82%D0%BE%D0%BF%D0%BE%D0%BB%D1%8C%D1%81%D0%BA%D0%B8%D0%B9+%D0%BF%D1%80.,+95%D0%91,+%D0%9C%D0%BE%D1%81%D0%BA%D0%B2%D0%B0,+117342/@55.6353295,37.5393014,16z/data=!4m8!4m7!1m0!1m5!1m1!1s0x414ab2b520b9d46b:0x2a38af8b6d18744d!2m2!1d37.5436788!2d55.6353296" target="_blank" data-name="Севастопольский" data-map="гугл карты" class="marsh">Google Maps</a>\n' + '</div>' + '</div>' + '<div class="map-info__btn popup-trigger">Записаться</div>' + '</div>',
    iconCaption: 'Севастопольский'
  }, {
    iconLayout: 'default#imageWithContent',
    iconImageHref: '/img/map/map-baloon.png',
    iconImageSize: [40, 56],
    iconContent: 'Севастопольский',
    iconImageOffset: [0, -38],
    balloonShadow: false,
    balloonLayout: MyBalloonLayout,
    balloonContentLayout: MyBalloonContentLayout,
    balloonPanelMaxMapArea: 0
  });
  map.geoObjects.add(sevastop).add(lob);
  map.geoObjects.add(udal);

  if (jquery__WEBPACK_IMPORTED_MODULE_1___default()(window).width() < 768) {
    map.behaviors.disable('scrollZoom');
    map.behaviors.disable('drag');
  } // Получаем первый экземпляр коллекции слоев, потом первый слой коллекции


  var layer = map.layers.get(0).get(0); // Решение по callback-у для определния полной загрузки карты

  waitForTilesLoad(layer).then(function () {
    // Скрываем индикатор загрузки после полной загрузки карты
    spinner.removeClass('is-active');
  });
} // Функция для определения полной загрузки карты (на самом деле проверяется загрузка тайлов) 


function waitForTilesLoad(layer) {
  return new ymaps.vow.Promise(function (resolve, reject) {
    var tc = getTileContainer(layer),
        readyAll = true;
    tc.tiles.each(function (tile, number) {
      if (!tile.isReady()) {
        readyAll = false;
      }
    });

    if (readyAll) {
      resolve();
    } else {
      tc.events.once("ready", function () {
        resolve();
      });
    }
  });
}

function getTileContainer(layer) {
  for (var k in layer) {
    if (layer.hasOwnProperty(k)) {
      if (layer[k] instanceof ymaps.layer.tileContainer.CanvasContainer || layer[k] instanceof ymaps.layer.tileContainer.DomContainer) {
        return layer[k];
      }
    }
  }

  return null;
} // Функция загрузки API Яндекс.Карт по требованию (в нашем случае при наведении)


function loadScript(url, callback) {
  var script = document.createElement("script");

  if (script.readyState) {
    // IE
    script.onreadystatechange = function () {
      if (script.readyState == "loaded" || script.readyState == "complete") {
        script.onreadystatechange = null;
        callback();
      }
    };
  } else {
    // Другие браузеры
    script.onload = function () {
      callback();
    };
  }

  script.src = url;
  document.getElementsByTagName("head")[0].appendChild(script);
} // Основная функция, которая проверяет когда мы навели на блок с классом "ymap-container"


var ymap = function ymap() {
  jquery__WEBPACK_IMPORTED_MODULE_1___default()('.ymap-container').mouseenter(function () {
    if (!check_if_load) {
      // проверяем первый ли раз загружается Яндекс.Карта, если да, то загружаем
      // Чтобы не было повторной загрузки карты, мы изменяем значение переменной
      check_if_load = true; // Показываем индикатор загрузки до тех пор, пока карта не загрузится

      spinner.addClass('is-active'); // Загружаем API Яндекс.Карт

      loadScript("https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;loadByRequire=1", function () {
        // Как только API Яндекс.Карт загрузились, сразу формируем карту и помещаем в блок с идентификатором "map-yandex"
        ymaps.load(init);
      });
    }
  });
};

jquery__WEBPACK_IMPORTED_MODULE_1___default()(function () {
  //Запускаем основную функцию
  ymap();
});

/***/ }),

/***/ "./frontend/libs/jquery.maskedinput.min.js":
/*!*************************************************!*\
  !*** ./frontend/libs/jquery.maskedinput.min.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_ARRAY__, __WEBPACK_AMD_DEFINE_RESULT__;__webpack_require__(/*! core-js/modules/es.symbol */ "./node_modules/core-js/modules/es.symbol.js");

__webpack_require__(/*! core-js/modules/es.symbol.description */ "./node_modules/core-js/modules/es.symbol.description.js");

__webpack_require__(/*! core-js/modules/es.symbol.iterator */ "./node_modules/core-js/modules/es.symbol.iterator.js");

__webpack_require__(/*! core-js/modules/es.array.iterator */ "./node_modules/core-js/modules/es.array.iterator.js");

__webpack_require__(/*! core-js/modules/es.array.join */ "./node_modules/core-js/modules/es.array.join.js");

__webpack_require__(/*! core-js/modules/es.array.map */ "./node_modules/core-js/modules/es.array.map.js");

__webpack_require__(/*! core-js/modules/es.object.to-string */ "./node_modules/core-js/modules/es.object.to-string.js");

__webpack_require__(/*! core-js/modules/es.regexp.constructor */ "./node_modules/core-js/modules/es.regexp.constructor.js");

__webpack_require__(/*! core-js/modules/es.regexp.exec */ "./node_modules/core-js/modules/es.regexp.exec.js");

__webpack_require__(/*! core-js/modules/es.regexp.to-string */ "./node_modules/core-js/modules/es.regexp.to-string.js");

__webpack_require__(/*! core-js/modules/es.string.iterator */ "./node_modules/core-js/modules/es.string.iterator.js");

__webpack_require__(/*! core-js/modules/es.string.replace */ "./node_modules/core-js/modules/es.string.replace.js");

__webpack_require__(/*! core-js/modules/es.string.split */ "./node_modules/core-js/modules/es.string.split.js");

__webpack_require__(/*! core-js/modules/web.dom-collections.iterator */ "./node_modules/core-js/modules/web.dom-collections.iterator.js");

function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

/*
    jQuery Masked Input Plugin
    Copyright (c) 2007 - 2015 Josh Bush (digitalbush.com)
    Licensed under the MIT license (http://digitalbush.com/projects/masked-input-plugin/#license)
    Version: 1.4.1
*/
!function (a) {
   true ? !(__WEBPACK_AMD_DEFINE_ARRAY__ = [__webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js")], __WEBPACK_AMD_DEFINE_FACTORY__ = (a),
				__WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?
				(__WEBPACK_AMD_DEFINE_FACTORY__.apply(exports, __WEBPACK_AMD_DEFINE_ARRAY__)) : __WEBPACK_AMD_DEFINE_FACTORY__),
				__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__)) : undefined;
}(function (a) {
  var b,
      c = navigator.userAgent,
      d = /iphone/i.test(c),
      e = /chrome/i.test(c),
      f = /android/i.test(c);
  a.mask = {
    definitions: {
      9: "[0-9]",
      a: "[A-Za-z]",
      "*": "[A-Za-z0-9]"
    },
    autoclear: !0,
    dataName: "rawMaskFn",
    placeholder: "_"
  }, a.fn.extend({
    caret: function caret(a, b) {
      var c;
      if (0 !== this.length && !this.is(":hidden")) return "number" == typeof a ? (b = "number" == typeof b ? b : a, this.each(function () {
        this.setSelectionRange ? this.setSelectionRange(a, b) : this.createTextRange && (c = this.createTextRange(), c.collapse(!0), c.moveEnd("character", b), c.moveStart("character", a), c.select());
      })) : (this[0].setSelectionRange ? (a = this[0].selectionStart, b = this[0].selectionEnd) : document.selection && document.selection.createRange && (c = document.selection.createRange(), a = 0 - c.duplicate().moveStart("character", -1e5), b = a + c.text.length), {
        begin: a,
        end: b
      });
    },
    unmask: function unmask() {
      return this.trigger("unmask");
    },
    mask: function mask(c, g) {
      var h, i, j, k, l, m, n, o;

      if (!c && this.length > 0) {
        h = a(this[0]);
        var p = h.data(a.mask.dataName);
        return p ? p() : void 0;
      }

      return g = a.extend({
        autoclear: a.mask.autoclear,
        placeholder: a.mask.placeholder,
        completed: null
      }, g), i = a.mask.definitions, j = [], k = n = c.length, l = null, a.each(c.split(""), function (a, b) {
        "?" == b ? (n--, k = a) : i[b] ? (j.push(new RegExp(i[b])), null === l && (l = j.length - 1), k > a && (m = j.length - 1)) : j.push(null);
      }), this.trigger("unmask").each(function () {
        function h() {
          if (g.completed) {
            for (var a = l; m >= a; a++) {
              if (j[a] && C[a] === p(a)) return;
            }

            g.completed.call(B);
          }
        }

        function p(a) {
          return g.placeholder.charAt(a < g.placeholder.length ? a : 0);
        }

        function q(a) {
          for (; ++a < n && !j[a];) {
            ;
          }

          return a;
        }

        function r(a) {
          for (; --a >= 0 && !j[a];) {
            ;
          }

          return a;
        }

        function s(a, b) {
          var c, d;

          if (!(0 > a)) {
            for (c = a, d = q(b); n > c; c++) {
              if (j[c]) {
                if (!(n > d && j[c].test(C[d]))) break;
                C[c] = C[d], C[d] = p(d), d = q(d);
              }
            }

            z(), B.caret(Math.max(l, a));
          }
        }

        function t(a) {
          var b, c, d, e;

          for (b = a, c = p(a); n > b; b++) {
            if (j[b]) {
              if (d = q(b), e = C[b], C[b] = c, !(n > d && j[d].test(e))) break;
              c = e;
            }
          }
        }

        function u() {
          var a = B.val(),
              b = B.caret();

          if (o && o.length && o.length > a.length) {
            for (A(!0); b.begin > 0 && !j[b.begin - 1];) {
              b.begin--;
            }

            if (0 === b.begin) for (; b.begin < l && !j[b.begin];) {
              b.begin++;
            }
            B.caret(b.begin, b.begin);
          } else {
            for (A(!0); b.begin < n && !j[b.begin];) {
              b.begin++;
            }

            B.caret(b.begin, b.begin);
          }

          h();
        }

        function v() {
          A(), B.val() != E && B.change();
        }

        function w(a) {
          if (!B.prop("readonly")) {
            var b,
                c,
                e,
                f = a.which || a.keyCode;
            o = B.val(), 8 === f || 46 === f || d && 127 === f ? (b = B.caret(), c = b.begin, e = b.end, e - c === 0 && (c = 46 !== f ? r(c) : e = q(c - 1), e = 46 === f ? q(e) : e), y(c, e), s(c, e - 1), a.preventDefault()) : 13 === f ? v.call(this, a) : 27 === f && (B.val(E), B.caret(0, A()), a.preventDefault());
          }
        }

        function x(b) {
          if (!B.prop("readonly")) {
            var c,
                d,
                e,
                g = b.which || b.keyCode,
                i = B.caret();

            if (!(b.ctrlKey || b.altKey || b.metaKey || 32 > g) && g && 13 !== g) {
              if (i.end - i.begin !== 0 && (y(i.begin, i.end), s(i.begin, i.end - 1)), c = q(i.begin - 1), n > c && (d = String.fromCharCode(g), j[c].test(d))) {
                if (t(c), C[c] = d, z(), e = q(c), f) {
                  var k = function k() {
                    a.proxy(a.fn.caret, B, e)();
                  };

                  setTimeout(k, 0);
                } else B.caret(e);

                i.begin <= m && h();
              }

              b.preventDefault();
            }
          }
        }

        function y(a, b) {
          var c;

          for (c = a; b > c && n > c; c++) {
            j[c] && (C[c] = p(c));
          }
        }

        function z() {
          B.val(C.join(""));
        }

        function A(a) {
          var b,
              c,
              d,
              e = B.val(),
              f = -1;

          for (b = 0, d = 0; n > b; b++) {
            if (j[b]) {
              for (C[b] = p(b); d++ < e.length;) {
                if (c = e.charAt(d - 1), j[b].test(c)) {
                  C[b] = c, f = b;
                  break;
                }
              }

              if (d > e.length) {
                y(b + 1, n);
                break;
              }
            } else C[b] === e.charAt(d) && d++, k > b && (f = b);
          }

          return a ? z() : k > f + 1 ? g.autoclear || C.join("") === D ? (B.val() && B.val(""), y(0, n)) : z() : (z(), B.val(B.val().substring(0, f + 1))), k ? b : l;
        }

        var B = a(this),
            C = a.map(c.split(""), function (a, b) {
          return "?" != a ? i[a] ? p(b) : a : void 0;
        }),
            D = C.join(""),
            E = B.val();
        B.data(a.mask.dataName, function () {
          return a.map(C, function (a, b) {
            return j[b] && a != p(b) ? a : null;
          }).join("");
        }), B.one("unmask", function () {
          B.off(".mask").removeData(a.mask.dataName);
        }).on("focus.mask", function () {
          if (!B.prop("readonly")) {
            clearTimeout(b);
            var a;
            E = B.val(), a = A(), b = setTimeout(function () {
              B.get(0) === document.activeElement && (z(), a == c.replace("?", "").length ? B.caret(0, a) : B.caret(a));
            }, 10);
          }
        }).on("blur.mask", v).on("keydown.mask", w).on("keypress.mask", x).on("input.mask paste.mask", function () {
          B.prop("readonly") || setTimeout(function () {
            var a = A(!0);
            B.caret(a), h();
          }, 0);
        }), e && f && B.off("input.mask").on("input.mask", u), A();
      });
    }
  });
});

/***/ }),

/***/ "./frontend/libs/lazy_youtube/lazy_youtube.js":
/*!****************************************************!*\
  !*** ./frontend/libs/lazy_youtube/lazy_youtube.js ***!
  \****************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _lazy_youtube_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./lazy_youtube.scss */ "./frontend/libs/lazy_youtube/lazy_youtube.scss");
/* harmony import */ var _lazy_youtube_scss__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_lazy_youtube_scss__WEBPACK_IMPORTED_MODULE_0__);


(function () {
  var youtube = document.querySelectorAll(".youtube");

  var _loop = function _loop(i) {
    var source = "https://i.ytimg.com/vi/" + youtube[i].dataset.embed + "/hqdefault.jpg";
    var image = new Image();
    image.src = source;
    image.addEventListener("load", function () {
      youtube[i].appendChild(image);
    }(i));
    youtube[i].addEventListener("click", function () {
      var iframe = document.createElement("iframe");
      iframe.setAttribute("frameborder", "0");
      iframe.setAttribute("allowfullscreen", "");
      iframe.setAttribute("src", "https://www.youtube.com/embed/" + this.dataset.embed + "?rel=0&showinfo=0&autoplay=1");
      this.innerHTML = "";
      this.appendChild(iframe);
    });
  };

  for (var i = 0; i < youtube.length; i++) {
    _loop(i);
  }
})();

/***/ }),

/***/ "./frontend/libs/lazy_youtube/lazy_youtube.scss":
/*!******************************************************!*\
  !*** ./frontend/libs/lazy_youtube/lazy_youtube.scss ***!
  \******************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./frontend/libs/lazyload.min.js":
/*!***************************************!*\
  !*** ./frontend/libs/lazyload.min.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_RESULT__;__webpack_require__(/*! core-js/modules/es.symbol */ "./node_modules/core-js/modules/es.symbol.js");

__webpack_require__(/*! core-js/modules/es.symbol.description */ "./node_modules/core-js/modules/es.symbol.description.js");

__webpack_require__(/*! core-js/modules/es.symbol.iterator */ "./node_modules/core-js/modules/es.symbol.iterator.js");

__webpack_require__(/*! core-js/modules/es.array.filter */ "./node_modules/core-js/modules/es.array.filter.js");

__webpack_require__(/*! core-js/modules/es.array.for-each */ "./node_modules/core-js/modules/es.array.for-each.js");

__webpack_require__(/*! core-js/modules/es.array.index-of */ "./node_modules/core-js/modules/es.array.index-of.js");

__webpack_require__(/*! core-js/modules/es.array.iterator */ "./node_modules/core-js/modules/es.array.iterator.js");

__webpack_require__(/*! core-js/modules/es.array.slice */ "./node_modules/core-js/modules/es.array.slice.js");

__webpack_require__(/*! core-js/modules/es.object.assign */ "./node_modules/core-js/modules/es.object.assign.js");

__webpack_require__(/*! core-js/modules/es.object.to-string */ "./node_modules/core-js/modules/es.object.to-string.js");

__webpack_require__(/*! core-js/modules/es.regexp.constructor */ "./node_modules/core-js/modules/es.regexp.constructor.js");

__webpack_require__(/*! core-js/modules/es.regexp.exec */ "./node_modules/core-js/modules/es.regexp.exec.js");

__webpack_require__(/*! core-js/modules/es.regexp.to-string */ "./node_modules/core-js/modules/es.regexp.to-string.js");

__webpack_require__(/*! core-js/modules/es.string.iterator */ "./node_modules/core-js/modules/es.string.iterator.js");

__webpack_require__(/*! core-js/modules/es.string.replace */ "./node_modules/core-js/modules/es.string.replace.js");

__webpack_require__(/*! core-js/modules/web.dom-collections.for-each */ "./node_modules/core-js/modules/web.dom-collections.for-each.js");

__webpack_require__(/*! core-js/modules/web.dom-collections.iterator */ "./node_modules/core-js/modules/web.dom-collections.iterator.js");

function _typeof2(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof2 = function _typeof2(obj) { return typeof obj; }; } else { _typeof2 = function _typeof2(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof2(obj); }

function _extends() {
  return (_extends = Object.assign || function (t) {
    for (var e = 1; e < arguments.length; e++) {
      var n = arguments[e];

      for (var o in n) {
        Object.prototype.hasOwnProperty.call(n, o) && (t[o] = n[o]);
      }
    }

    return t;
  }).apply(this, arguments);
}

function _typeof(t) {
  return (_typeof = "function" == typeof Symbol && "symbol" == _typeof2(Symbol.iterator) ? function (t) {
    return _typeof2(t);
  } : function (t) {
    return t && "function" == typeof Symbol && t.constructor === Symbol && t !== Symbol.prototype ? "symbol" : _typeof2(t);
  })(t);
}

!function (t, e) {
  "object" === ( false ? undefined : _typeof(exports)) && "undefined" != typeof module ? module.exports = e() :  true ? !(__WEBPACK_AMD_DEFINE_FACTORY__ = (e),
				__WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?
				(__WEBPACK_AMD_DEFINE_FACTORY__.call(exports, __webpack_require__, exports, module)) :
				__WEBPACK_AMD_DEFINE_FACTORY__),
				__WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__)) : undefined;
}(this, function () {
  "use strict";

  var t = "undefined" != typeof window,
      e = t && !("onscroll" in window) || "undefined" != typeof navigator && /(gle|ing|ro)bot|crawl|spider/i.test(navigator.userAgent),
      n = t && "IntersectionObserver" in window,
      o = t && "classList" in document.createElement("p"),
      r = {
    elements_selector: "img",
    container: e || t ? document : null,
    threshold: 300,
    thresholds: null,
    data_src: "src",
    data_srcset: "srcset",
    data_sizes: "sizes",
    data_bg: "bg",
    class_loading: "loading",
    class_loaded: "loaded",
    class_error: "error",
    load_delay: 0,
    auto_unobserve: !0,
    callback_enter: null,
    callback_exit: null,
    callback_reveal: null,
    callback_loaded: null,
    callback_error: null,
    callback_finish: null,
    use_native: !1
  },
      a = function a(t, e) {
    var n,
        o = new t(e);

    try {
      n = new CustomEvent("LazyLoad::Initialized", {
        detail: {
          instance: o
        }
      });
    } catch (t) {
      (n = document.createEvent("CustomEvent")).initCustomEvent("LazyLoad::Initialized", !1, !1, {
        instance: o
      });
    }

    window.dispatchEvent(n);
  };

  var i = function i(t, e) {
    return t.getAttribute("data-" + e);
  },
      s = function s(t, e, n) {
    var o = "data-" + e;
    null !== n ? t.setAttribute(o, n) : t.removeAttribute(o);
  },
      c = function c(t) {
    return "true" === i(t, "was-processed");
  },
      l = function l(t, e) {
    return s(t, "ll-timeout", e);
  },
      u = function u(t) {
    return i(t, "ll-timeout");
  },
      d = function d(t, e) {
    t && t(e);
  },
      f = function f(t, e) {
    t._loadingCount += e, 0 === t._elements.length && 0 === t._loadingCount && d(t._settings.callback_finish);
  },
      _ = function _(t) {
    for (var e, n = [], o = 0; e = t.children[o]; o += 1) {
      "SOURCE" === e.tagName && n.push(e);
    }

    return n;
  },
      v = function v(t, e, n) {
    n && t.setAttribute(e, n);
  },
      g = function g(t, e) {
    v(t, "sizes", i(t, e.data_sizes)), v(t, "srcset", i(t, e.data_srcset)), v(t, "src", i(t, e.data_src));
  },
      m = {
    IMG: function IMG(t, e) {
      var n = t.parentNode;
      n && "PICTURE" === n.tagName && _(n).forEach(function (t) {
        g(t, e);
      });
      g(t, e);
    },
    IFRAME: function IFRAME(t, e) {
      v(t, "src", i(t, e.data_src));
    },
    VIDEO: function VIDEO(t, e) {
      _(t).forEach(function (t) {
        v(t, "src", i(t, e.data_src));
      }), v(t, "src", i(t, e.data_src)), t.load();
    }
  },
      b = function b(t, e) {
    var n,
        o,
        r = e._settings,
        a = t.tagName,
        s = m[a];
    if (s) return s(t, r), f(e, 1), void (e._elements = (n = e._elements, o = t, n.filter(function (t) {
      return t !== o;
    })));
    !function (t, e) {
      var n = i(t, e.data_src),
          o = i(t, e.data_bg);
      n && (t.style.backgroundImage = 'url("'.concat(n, '")')), o && (t.style.backgroundImage = o);
    }(t, r);
  },
      h = function h(t, e) {
    o ? t.classList.add(e) : t.className += (t.className ? " " : "") + e;
  },
      p = function p(t, e, n) {
    t.addEventListener(e, n);
  },
      y = function y(t, e, n) {
    t.removeEventListener(e, n);
  },
      E = function E(t, e, n) {
    y(t, "load", e), y(t, "loadeddata", e), y(t, "error", n);
  },
      w = function w(t, e, n) {
    var r = n._settings,
        a = e ? r.class_loaded : r.class_error,
        i = e ? r.callback_loaded : r.callback_error,
        s = t.target;
    !function (t, e) {
      o ? t.classList.remove(e) : t.className = t.className.replace(new RegExp("(^|\\s+)" + e + "(\\s+|$)"), " ").replace(/^\s+/, "").replace(/\s+$/, "");
    }(s, r.class_loading), h(s, a), d(i, s), f(n, -1);
  },
      I = function I(t, e) {
    var n = function n(r) {
      w(r, !0, e), E(t, n, o);
    },
        o = function o(r) {
      w(r, !1, e), E(t, n, o);
    };

    !function (t, e, n) {
      p(t, "load", e), p(t, "loadeddata", e), p(t, "error", n);
    }(t, n, o);
  },
      k = ["IMG", "IFRAME", "VIDEO"],
      A = function A(t, e) {
    var n = e._observer;
    z(t, e), n && e._settings.auto_unobserve && n.unobserve(t);
  },
      L = function L(t) {
    var e = u(t);
    e && (clearTimeout(e), l(t, null));
  },
      x = function x(t, e) {
    var n = e._settings.load_delay,
        o = u(t);
    o || (o = setTimeout(function () {
      A(t, e), L(t);
    }, n), l(t, o));
  },
      z = function z(t, e, n) {
    var o = e._settings;
    !n && c(t) || (k.indexOf(t.tagName) > -1 && (I(t, e), h(t, o.class_loading)), b(t, e), function (t) {
      s(t, "was-processed", "true");
    }(t), d(o.callback_reveal, t), d(o.callback_set, t));
  },
      O = function O(t) {
    return !!n && (t._observer = new IntersectionObserver(function (e) {
      e.forEach(function (e) {
        return function (t) {
          return t.isIntersecting || t.intersectionRatio > 0;
        }(e) ? function (t, e) {
          var n = e._settings;
          d(n.callback_enter, t), n.load_delay ? x(t, e) : A(t, e);
        }(e.target, t) : function (t, e) {
          var n = e._settings;
          d(n.callback_exit, t), n.load_delay && L(t);
        }(e.target, t);
      });
    }, {
      root: (e = t._settings).container === document ? null : e.container,
      rootMargin: e.thresholds || e.threshold + "px"
    }), !0);
    var e;
  },
      N = ["IMG", "IFRAME"],
      C = function C(t, e) {
    return function (t) {
      return t.filter(function (t) {
        return !c(t);
      });
    }((n = t || function (t) {
      return t.container.querySelectorAll(t.elements_selector);
    }(e), Array.prototype.slice.call(n)));
    var n;
  },
      M = function M(t, e) {
    this._settings = function (t) {
      return _extends({}, r, t);
    }(t), this._loadingCount = 0, O(this), this.update(e);
  };

  return M.prototype = {
    update: function update(t) {
      var n,
          o = this,
          r = this._settings;
      (this._elements = C(t, r), !e && this._observer) ? (function (t) {
        return t.use_native && "loading" in HTMLImageElement.prototype;
      }(r) && ((n = this)._elements.forEach(function (t) {
        -1 !== N.indexOf(t.tagName) && (t.setAttribute("loading", "lazy"), z(t, n));
      }), this._elements = C(t, r)), this._elements.forEach(function (t) {
        o._observer.observe(t);
      })) : this.loadAll();
    },
    destroy: function destroy() {
      var t = this;
      this._observer && (this._elements.forEach(function (e) {
        t._observer.unobserve(e);
      }), this._observer = null), this._elements = null, this._settings = null;
    },
    load: function load(t, e) {
      z(t, this, e);
    },
    loadAll: function loadAll() {
      var t = this;

      this._elements.forEach(function (e) {
        A(e, t);
      });
    }
  }, t && function (t, e) {
    if (e) if (e.length) for (var n, o = 0; n = e[o]; o += 1) {
      a(t, n);
    } else a(t, e);
  }(M, window.lazyLoadOptions), M;
});

/***/ }),

/***/ "./frontend/libs/swiper_slider/swiper.scss":
/*!*************************************************!*\
  !*** ./frontend/libs/swiper_slider/swiper.scss ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

// extracted by mini-css-extract-plugin

/***/ }),

/***/ "./frontend/libs/swiper_slider/swiper_sliders.js":
/*!*******************************************************!*\
  !*** ./frontend/libs/swiper_slider/swiper_sliders.js ***!
  \*******************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var swiper__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! swiper */ "./node_modules/swiper/js/swiper.esm.bundle.js");
/* harmony import */ var _swiper_scss__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./swiper.scss */ "./frontend/libs/swiper_slider/swiper.scss");
/* harmony import */ var _swiper_scss__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_swiper_scss__WEBPACK_IMPORTED_MODULE_2__);



jquery__WEBPACK_IMPORTED_MODULE_0___default()(document).ready(function () {
  new swiper__WEBPACK_IMPORTED_MODULE_1__["default"]('.swiper-container', {
    effect: 'coverflow',
    grabCursor: true,
    centeredSlides: true,
    slidesPerView: 1,
    loop: true,
    // Disable preloading of all images
    preloadImages: false,
    // Enable lazy loading
    lazy: {
      loadPrevNext: true,
      //загрузка нескольких слайдов влево и вправо
      loadPrevNextAmount: 3 //Количество слайдов для предзагрузки

    },
    watchSlidesVisibility: true,
    coverflowEffect: {
      rotate: 60,
      stretch: 0,
      depth: 100,
      modifier: 1,
      slideShadows: true
    },
    pagination: {
      el: '.our_works .swiper-pagination'
    },
    // Navigation arrows
    navigation: {
      nextEl: '.our_works .swiper-button-next',
      prevEl: '.our_works .swiper-button-prev'
    },
    breakpoints: {
      // when window width is >= 320px
      320: {
        slidesPerView: 1
      },
      // when window width is >= 480px
      480: {
        slidesPerView: 1
      },
      // when window width is >= 640px
      640: {
        slidesPerView: 2
      },
      // when window width is >= 640px
      768: {
        slidesPerView: 3
      }
    }
  });
});

/***/ })

},[["./frontend/app.js","runtime","vendors~app2"]]]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9mcm9udGVuZC9hcHAuanMiLCJ3ZWJwYWNrOi8vLy4vZnJvbnRlbmQvYmxvY2tzL21haW4uanMiLCJ3ZWJwYWNrOi8vLy4vZnJvbnRlbmQvYmxvY2tzL21haW4uc2FzcyIsIndlYnBhY2s6Ly8vLi9mcm9udGVuZC9ibG9ja3Mvc2VjdGlvbi9jYWxsYmFjay9jYWxsYmFjay1wb3B1cC5qcyIsIndlYnBhY2s6Ly8vLi9mcm9udGVuZC9ibG9ja3Mvc2VjdGlvbi9jYWxsYmFjay9jYWxsYmFjay1wb3B1cC5zY3NzIiwid2VicGFjazovLy8uL2Zyb250ZW5kL2Jsb2Nrcy9zZWN0aW9uL21hbmdvL21hbmdvLmpzIiwid2VicGFjazovLy8uL2Zyb250ZW5kL2Jsb2Nrcy9zZWN0aW9uL21hcC9tYXAuanMiLCJ3ZWJwYWNrOi8vLy4vZnJvbnRlbmQvbGlicy9qcXVlcnkubWFza2VkaW5wdXQubWluLmpzIiwid2VicGFjazovLy8uL2Zyb250ZW5kL2xpYnMvbGF6eV95b3V0dWJlL2xhenlfeW91dHViZS5qcyIsIndlYnBhY2s6Ly8vLi9mcm9udGVuZC9saWJzL2xhenlfeW91dHViZS9sYXp5X3lvdXR1YmUuc2NzcyIsIndlYnBhY2s6Ly8vLi9mcm9udGVuZC9saWJzL2xhenlsb2FkLm1pbi5qcyIsIndlYnBhY2s6Ly8vLi9mcm9udGVuZC9saWJzL3N3aXBlcl9zbGlkZXIvc3dpcGVyLnNjc3MiLCJ3ZWJwYWNrOi8vLy4vZnJvbnRlbmQvbGlicy9zd2lwZXJfc2xpZGVyL3N3aXBlcl9zbGlkZXJzLmpzIl0sIm5hbWVzIjpbIkxhenlMb2FkIiwiZWxlbWVudHNfc2VsZWN0b3IiLCIkIiwiZG9jdW1lbnQiLCJyZWFkeSIsIm1hc2siLCJoaWRlIiwib24iLCJ0b2dnbGVDbGFzcyIsInByZXYiLCJzbGlkZVRvZ2dsZSIsInRleHQiLCJzbGljZSIsInNob3ciLCJlIiwicHJldmVudERlZmF1bHQiLCJzbGlkZURvd24iLCJlbEhpZGRlbiIsImxlbmd0aCIsInZlcmlmeUZvcm0iLCJGb3JtIiwicGhvbmVGaWVsZCIsImZpbmQiLCJlbWFpbEZpZWxkIiwibmFtZUZpZWxkIiwic2VsZWN0RmllbGQiLCJlcnJvcnMiLCJpIiwiZWxlbWVudCIsImVxIiwibmV4dCIsInJlbW92ZUNsYXNzIiwidmFsIiwiYWRkQ2xhc3MiLCJwaG9uZVZhbHVlIiwicGhvbmVfcGF0dGVybiIsInRlc3QiLCJyZXBsYWNlIiwiY29uc29sZSIsImxvZyIsImVtYWlsVmFsdWUiLCJyZWdleHAiLCJuYW1lVmFsdWUiLCJyZWdleHBOYW1lIiwicGFyc2VWYWx1ZXMiLCJ2YWx1ZXMiLCJyZXN1bHQiLCJuYW1lIiwidmFsdWUiLCJzZW5kRm9ybSIsImZvcm1EYXRhIiwiYWpheCIsInR5cGUiLCJ1cmwiLCJhY3Rpb24iLCJkYXRhIiwiZGF0YVR5cGUiLCJzdWNjZXNzIiwic3RhdHVzIiwic2hvd1N1Y2Nlc3NNc2ciLCJhbGVydCIsIm1zZyIsImpvaW4iLCJlcnJvciIsInJlc3BvbnNlSlNPTiIsImRldGFpbCIsIm1vZGFsX2NhbGxiYWNrIiwiaGFzQ2xhc3MiLCJtb2RhbF90aXRsZSIsInRpdGxlIiwiaHRtbCIsImNsaWNrIiwicGFyZW50Iiwic3VibWl0IiwiY2xvc2VzdCIsInRlbCIsIndpbmRvdyIsIkNvbWFnaWMiLCJ0IiwiRGF0ZSIsInNldHRpbmdzIiwiZG9uZSIsInJlc3BvbnNlIiwiaWRfcGxvc2hhZGtpIiwiQ29tYWdpY1dpZGdldCIsInNpdGVQaG9uZUNhbGwiLCJwaG9uZSIsImdyb3VwX2lkIiwiZGVsYXllZF9jYWxsX3RpbWUiLCJ0b1N0cmluZyIsInNlcmlhbGl6ZUFycmF5IiwiY3NzIiwicG9zdCIsInN1YmplY3QiLCJkYXRhMTExczIyMTIyZGRkMjExMSIsInJlbW92ZSIsInNwaW5uZXIiLCJjaGlsZHJlbiIsImNoZWNrX2lmX2xvYWQiLCJtYXAiLCJteVBsYWNlbWFya1RlbXAiLCJpbml0IiwieW1hcHMiLCJNYXAiLCJjZW50ZXIiLCJ6b29tIiwiY29udHJvbHMiLCJNeUJhbGxvb25MYXlvdXQiLCJ0ZW1wbGF0ZUxheW91dEZhY3RvcnkiLCJjcmVhdGVDbGFzcyIsImJ1aWxkIiwiY29uc3RydWN0b3IiLCJzdXBlcmNsYXNzIiwiY2FsbCIsIl8kZWxlbWVudCIsImdldFBhcmVudEVsZW1lbnQiLCJhcHBseUVsZW1lbnRPZmZzZXQiLCJwcm94eSIsIm9uQ2xvc2VDbGljayIsImNsZWFyIiwib2ZmIiwib25TdWJsYXlvdXRTaXplQ2hhbmdlIiwiYXBwbHkiLCJhcmd1bWVudHMiLCJfaXNFbGVtZW50IiwiZXZlbnRzIiwiZmlyZSIsImxlZnQiLCJvZmZzZXRXaWR0aCIsInRvcCIsIm9mZnNldEhlaWdodCIsImdldFNoYXBlIiwicG9zaXRpb24iLCJzaGFwZSIsIlJlY3RhbmdsZSIsImdlb21ldHJ5IiwicGl4ZWwiLCJNeUJhbGxvb25Db250ZW50TGF5b3V0IiwibG9iIiwibXlQbGFjZW1hcmsiLCJQbGFjZW1hcmsiLCJoaW50Q29udGVudCIsImJhbGxvb25Db250ZW50IiwiaWNvbkNhcHRpb24iLCJpY29uTGF5b3V0IiwiaWNvbkltYWdlSHJlZiIsImljb25JbWFnZVNpemUiLCJpY29uSW1hZ2VPZmZzZXQiLCJiYWxsb29uU2hhZG93IiwiYmFsbG9vbkxheW91dCIsImJhbGxvb25Db250ZW50TGF5b3V0IiwiYmFsbG9vblBhbmVsTWF4TWFwQXJlYSIsIm5pemgiLCJpY29uQ29udGVudCIsInVkYWwiLCJzZXZhc3RvcCIsImdlb09iamVjdHMiLCJhZGQiLCJ3aWR0aCIsImJlaGF2aW9ycyIsImRpc2FibGUiLCJsYXllciIsImxheWVycyIsImdldCIsIndhaXRGb3JUaWxlc0xvYWQiLCJ0aGVuIiwidm93IiwiUHJvbWlzZSIsInJlc29sdmUiLCJyZWplY3QiLCJ0YyIsImdldFRpbGVDb250YWluZXIiLCJyZWFkeUFsbCIsInRpbGVzIiwiZWFjaCIsInRpbGUiLCJudW1iZXIiLCJpc1JlYWR5Iiwib25jZSIsImsiLCJoYXNPd25Qcm9wZXJ0eSIsInRpbGVDb250YWluZXIiLCJDYW52YXNDb250YWluZXIiLCJEb21Db250YWluZXIiLCJsb2FkU2NyaXB0IiwiY2FsbGJhY2siLCJzY3JpcHQiLCJjcmVhdGVFbGVtZW50IiwicmVhZHlTdGF0ZSIsIm9ucmVhZHlzdGF0ZWNoYW5nZSIsIm9ubG9hZCIsInNyYyIsImdldEVsZW1lbnRzQnlUYWdOYW1lIiwiYXBwZW5kQ2hpbGQiLCJ5bWFwIiwibW91c2VlbnRlciIsImxvYWQiLCJhIiwiZGVmaW5lIiwiYiIsImMiLCJuYXZpZ2F0b3IiLCJ1c2VyQWdlbnQiLCJkIiwiZiIsImRlZmluaXRpb25zIiwiYXV0b2NsZWFyIiwiZGF0YU5hbWUiLCJwbGFjZWhvbGRlciIsImZuIiwiZXh0ZW5kIiwiY2FyZXQiLCJpcyIsInNldFNlbGVjdGlvblJhbmdlIiwiY3JlYXRlVGV4dFJhbmdlIiwiY29sbGFwc2UiLCJtb3ZlRW5kIiwibW92ZVN0YXJ0Iiwic2VsZWN0Iiwic2VsZWN0aW9uU3RhcnQiLCJzZWxlY3Rpb25FbmQiLCJzZWxlY3Rpb24iLCJjcmVhdGVSYW5nZSIsImR1cGxpY2F0ZSIsImJlZ2luIiwiZW5kIiwidW5tYXNrIiwidHJpZ2dlciIsImciLCJoIiwiaiIsImwiLCJtIiwibiIsIm8iLCJwIiwiY29tcGxldGVkIiwic3BsaXQiLCJwdXNoIiwiUmVnRXhwIiwiQyIsIkIiLCJjaGFyQXQiLCJxIiwiciIsInMiLCJ6IiwiTWF0aCIsIm1heCIsInUiLCJBIiwidiIsIkUiLCJjaGFuZ2UiLCJ3IiwicHJvcCIsIndoaWNoIiwia2V5Q29kZSIsInkiLCJ4IiwiY3RybEtleSIsImFsdEtleSIsIm1ldGFLZXkiLCJTdHJpbmciLCJmcm9tQ2hhckNvZGUiLCJzZXRUaW1lb3V0IiwiRCIsInN1YnN0cmluZyIsIm9uZSIsInJlbW92ZURhdGEiLCJjbGVhclRpbWVvdXQiLCJhY3RpdmVFbGVtZW50IiwieW91dHViZSIsInF1ZXJ5U2VsZWN0b3JBbGwiLCJzb3VyY2UiLCJkYXRhc2V0IiwiZW1iZWQiLCJpbWFnZSIsIkltYWdlIiwiYWRkRXZlbnRMaXN0ZW5lciIsImlmcmFtZSIsInNldEF0dHJpYnV0ZSIsImlubmVySFRNTCIsIl9leHRlbmRzIiwiT2JqZWN0IiwiYXNzaWduIiwicHJvdG90eXBlIiwiX3R5cGVvZiIsIlN5bWJvbCIsIml0ZXJhdG9yIiwiZXhwb3J0cyIsIm1vZHVsZSIsImNvbnRhaW5lciIsInRocmVzaG9sZCIsInRocmVzaG9sZHMiLCJkYXRhX3NyYyIsImRhdGFfc3Jjc2V0IiwiZGF0YV9zaXplcyIsImRhdGFfYmciLCJjbGFzc19sb2FkaW5nIiwiY2xhc3NfbG9hZGVkIiwiY2xhc3NfZXJyb3IiLCJsb2FkX2RlbGF5IiwiYXV0b191bm9ic2VydmUiLCJjYWxsYmFja19lbnRlciIsImNhbGxiYWNrX2V4aXQiLCJjYWxsYmFja19yZXZlYWwiLCJjYWxsYmFja19sb2FkZWQiLCJjYWxsYmFja19lcnJvciIsImNhbGxiYWNrX2ZpbmlzaCIsInVzZV9uYXRpdmUiLCJDdXN0b21FdmVudCIsImluc3RhbmNlIiwiY3JlYXRlRXZlbnQiLCJpbml0Q3VzdG9tRXZlbnQiLCJkaXNwYXRjaEV2ZW50IiwiZ2V0QXR0cmlidXRlIiwicmVtb3ZlQXR0cmlidXRlIiwiX2xvYWRpbmdDb3VudCIsIl9lbGVtZW50cyIsIl9zZXR0aW5ncyIsIl8iLCJ0YWdOYW1lIiwiSU1HIiwicGFyZW50Tm9kZSIsImZvckVhY2giLCJJRlJBTUUiLCJWSURFTyIsImZpbHRlciIsInN0eWxlIiwiYmFja2dyb3VuZEltYWdlIiwiY29uY2F0IiwiY2xhc3NMaXN0IiwiY2xhc3NOYW1lIiwicmVtb3ZlRXZlbnRMaXN0ZW5lciIsInRhcmdldCIsIkkiLCJfb2JzZXJ2ZXIiLCJ1bm9ic2VydmUiLCJMIiwiaW5kZXhPZiIsImNhbGxiYWNrX3NldCIsIk8iLCJJbnRlcnNlY3Rpb25PYnNlcnZlciIsImlzSW50ZXJzZWN0aW5nIiwiaW50ZXJzZWN0aW9uUmF0aW8iLCJyb290Iiwicm9vdE1hcmdpbiIsIk4iLCJBcnJheSIsIk0iLCJ1cGRhdGUiLCJIVE1MSW1hZ2VFbGVtZW50Iiwib2JzZXJ2ZSIsImxvYWRBbGwiLCJkZXN0cm95IiwibGF6eUxvYWRPcHRpb25zIiwiU3dpcGVyIiwiZWZmZWN0IiwiZ3JhYkN1cnNvciIsImNlbnRlcmVkU2xpZGVzIiwic2xpZGVzUGVyVmlldyIsImxvb3AiLCJwcmVsb2FkSW1hZ2VzIiwibGF6eSIsImxvYWRQcmV2TmV4dCIsImxvYWRQcmV2TmV4dEFtb3VudCIsIndhdGNoU2xpZGVzVmlzaWJpbGl0eSIsImNvdmVyZmxvd0VmZmVjdCIsInJvdGF0ZSIsInN0cmV0Y2giLCJkZXB0aCIsIm1vZGlmaWVyIiwic2xpZGVTaGFkb3dzIiwicGFnaW5hdGlvbiIsImVsIiwibmF2aWdhdGlvbiIsIm5leHRFbCIsInByZXZFbCIsImJyZWFrcG9pbnRzIl0sIm1hcHBpbmdzIjoiOzs7Ozs7Ozs7O0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQUE7QUFBQTtBQUFBO0FBQ0E7QUFDQTtBQUVBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBR0E7QUFFQSxJQUFJQSwwREFBSixDQUFhO0FBQ1RDLG1CQUFpQixFQUFFO0FBRFYsQ0FBYixFOzs7Ozs7Ozs7Ozs7Ozs7Ozs7OztBQ2ZBO0FBQ0E7QUFFQUMsNkNBQUMsQ0FBQ0MsUUFBRCxDQUFELENBQVlDLEtBQVosQ0FBa0IsVUFBVUYsQ0FBVixFQUFhO0FBRTlCO0FBQ0FBLEdBQUMsQ0FBQyxXQUFELENBQUQsQ0FBZUcsSUFBZixDQUFxQixtQkFBckI7QUFDQUgsR0FBQyxDQUFDLFdBQUQsQ0FBRCxDQUFlRyxJQUFmLENBQW9CLGlFQUFwQjtBQUVBSCxHQUFDLENBQUMscUJBQUQsQ0FBRCxDQUF5QkksSUFBekI7QUFDQUosR0FBQyxDQUFDLGdCQUFELENBQUQsQ0FBb0JLLEVBQXBCLENBQXVCLE9BQXZCLEVBQWdDLFlBQVU7QUFDekNMLEtBQUMsQ0FBQyxJQUFELENBQUQsQ0FBUU0sV0FBUixDQUFvQixTQUFwQjtBQUNB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LENBSmE7QUFLNUJDLFFBQUksRUFBRSxJQUxzQjtBQU01QjtBQUNBQyxpQkFBYSxFQUFFLEtBUGE7QUFRNUI7QUFDQUMsUUFBSSxFQUFFO0FBQ0ZDLGtCQUFZLEVBQUUsSUFEWjtBQUNpQjtBQUNuQkMsd0JBQWtCLEVBQUUsQ0FGbEIsQ0FFbUI7O0FBRm5CLEtBVHNCO0FBYTVCQyx5QkFBcUIsRUFBRSxJQWJLO0FBYzVCQyxtQkFBZSxFQUFFO0FBQ2JDLFlBQU0sRUFBRSxFQURLO0FBRWJDLGFBQU8sRUFBRSxDQUZJO0FBR2JDLFdBQUssRUFBRSxHQUhNO0FBSWJDLGNBQVEsRUFBRSxDQUpHO0FBS2JDLGtCQUFZLEVBQUU7QUFMRCxLQWRXO0FBcUI1QkMsY0FBVSxFQUFFO0FBQ1JDLFFBQUUsRUFBRTtBQURJLEtBckJnQjtBQXdCNUI7QUFDQUMsY0FBVSxFQUFFO0FBQ1JDLFlBQU0sRUFBRSxnQ0FEQTtBQUVSQyxZQUFNLEVBQUU7QUFGQSxLQXpCZ0I7QUE2QjVCQyxlQUFXLEVBQUU7QUFDVDtBQUNBLFdBQUs7QUFDRGxCLHFCQUFhLEVBQUU7QUFEZCxPQUZJO0FBS1Q7QUFDQSxXQUFLO0FBQ0RBLHFCQUFhLEVBQUU7QUFEZCxPQU5JO0FBU1Q7QUFDQSxXQUFLO0FBQ0RBLHFCQUFhLEVBQUU7QUFEZCxPQVZJO0FBYVQ7QUFDQSxXQUFLO0FBQ0RBLHFCQUFhLEVBQUU7QUFEZDtBQWRJO0FBN0JlLEdBQWhDO0FBZ0RILENBakRELEUiLCJmaWxlIjoiYXBwMi5qcyIsInNvdXJjZXNDb250ZW50IjpbImltcG9ydCAndWlraXQnXHJcbmltcG9ydCAndWlraXQvZGlzdC9qcy91aWtpdC1pY29ucydcclxuaW1wb3J0ICd1aWtpdC9kaXN0L2Nzcy91aWtpdC5taW4uY3NzJ1xyXG5cclxuaW1wb3J0ICcuL2Jsb2Nrcy9tYWluLnNhc3MnO1xyXG5pbXBvcnQgJy4vYmxvY2tzL21haW4uanMnO1xyXG5pbXBvcnQgJy4vYmxvY2tzL3NlY3Rpb24vY2FsbGJhY2svY2FsbGJhY2stcG9wdXAnO1xyXG5pbXBvcnQgJy4vYmxvY2tzL3NlY3Rpb24vbWFwL21hcCc7XHJcbmltcG9ydCAnLi9ibG9ja3Mvc2VjdGlvbi9tYW5nby9tYW5nbyc7XHJcbmltcG9ydCAnLi9saWJzL3N3aXBlcl9zbGlkZXIvc3dpcGVyX3NsaWRlcnMuanMnO1xyXG5pbXBvcnQgJy4vbGlicy9sYXp5X3lvdXR1YmUvbGF6eV95b3V0dWJlJztcclxuXHJcblxyXG5pbXBvcnQgTGF6eUxvYWQgZnJvbSAnLi9saWJzL2xhenlsb2FkLm1pbidcclxuXHJcbm5ldyBMYXp5TG9hZCh7XHJcbiAgICBlbGVtZW50c19zZWxlY3RvcjogXCIubGF6eVwiXHJcbn0pOyIsImltcG9ydCAkIGZyb20gJ2pxdWVyeSc7XHJcbmltcG9ydCAnLi4vbGlicy9qcXVlcnkubWFza2VkaW5wdXQubWluJztcclxuXHJcbiQoZG9jdW1lbnQpLnJlYWR5KGZ1bmN0aW9uICgkKSB7XHJcblxyXG5cdC8vINCc0LDRgdC60LAg0LTQu9GPINGC0LXQu9C10YTQvtC90LBcclxuXHQkKCcuanMtcGhvbmUnKS5tYXNrKCBcIis3KDk5OSkgOTk5LTk5LTk5XCIpO1xyXG5cdCQoJy5qcy1lbWFpbCcpLm1hc2soXCIqezEsMjB9Wy4qezEsMjB9XVsuKnsxLDIwfV1bLip7MSwyMH1dQCp7MSwyMH1bLip7Miw2fV1bLip7MSwyfV1cIik7XHJcblxyXG5cdCQoJy5zZW8tYm94X190ZXh0LWhpZGUnKS5oaWRlKCk7XHJcblx0JCgnLnNlby1ib3hfX21vcmUnKS5vbignY2xpY2snLCBmdW5jdGlvbigpe1xyXG5cdFx0JCh0aGlzKS50b2dnbGVDbGFzcygnaXMtc2hvdycpO1xyXG5cdFx0JCh0aGlzKS5wcmV2KCcuc2VvLWJveF9fdGV4dC1oaWRlJykuc2xpZGVUb2dnbGUoKTtcclxuXHRcdCQodGhpcykudGV4dCgkKHRoaXMpLnRleHQoKSA9PT0gJ9Ch0LLQtdGA0L3Rg9GC0YwnID8gJ9Cg0LDQt9Cy0LXRgNC90YPRgtGMJyA6ICfQodCy0LXRgNC90YPRgtGMJyk7XHJcblx0fSk7XHJcblxyXG4gIC8vINCf0L7QutCw0LfRi9Cy0LDQtdC8ICzQsdGA0LXQvdC00YtcclxuICAkKCcuYnJhbmRzID4gZGl2JykuaGlkZSgpO1xyXG4gICQoJy5icmFuZHMgPiBkaXYnKS5zbGljZSgwLCA0KS5zaG93KCk7XHJcbiAgJCgnLmJyYW5kc19fbW9yZScpLm9uKCdjbGljaycsIGZ1bmN0aW9uIChlKSB7XHJcbiAgXHRlLnByZXZlbnREZWZhdWx0KCk7XHJcbiAgXHQkKCcuYnJhbmRzID4gZGl2OmhpZGRlbicpLnNsaWNlKDAsIDIpLnNsaWRlRG93bigpO1xyXG4gIFx0dmFyIGVsSGlkZGVuID0gJCgnLmJyYW5kcyA+IGRpdjpoaWRkZW4nKS5sZW5ndGg7XHJcbiAgXHRpZiAoZWxIaWRkZW4gPD0gMCkge1xyXG4gIFx0XHQkKCcuYnJhbmRzX19tb3JlJykuaGlkZSgpO1xyXG4gIFx0fVxyXG4gIH0pO1xyXG5cclxufSk7IiwiLy8gZXh0cmFjdGVkIGJ5IG1pbmktY3NzLWV4dHJhY3QtcGx1Z2luIiwiaW1wb3J0ICQgZnJvbSAnanF1ZXJ5JztcclxuaW1wb3J0ICcuL2NhbGxiYWNrLXBvcHVwLnNjc3MnXHJcblxyXG5mdW5jdGlvbiB2ZXJpZnlGb3JtKEZvcm0pIHtcclxuXHRjb25zdCBwaG9uZUZpZWxkID0gJChGb3JtKS5maW5kKCdbbmFtZT1cInBob25lXCJdJyk7XHJcblx0Y29uc3QgZW1haWxGaWVsZCA9ICQoRm9ybSkuZmluZCgnW25hbWU9XCJlbWFpbFwiXScpO1xyXG5cdGNvbnN0IG5hbWVGaWVsZCA9ICQoRm9ybSkuZmluZCgnW25hbWU9XCJuYW1lXCJdJyk7XHJcblx0Y29uc3Qgc2VsZWN0RmllbGQgPSAkKEZvcm0pLmZpbmQoJ3NlbGVjdCcpO1xyXG5cdGxldCBlcnJvcnMgPSBmYWxzZTtcclxuXHRcclxuXHRmb3IgKGxldCBpID0gMDsgaSA8ICQoRm9ybSkuZmluZCgnW3JlcXVpcmVkXScpLmxlbmd0aDsgaSsrKSB7XHJcblx0XHRsZXQgZWxlbWVudCA9ICQoRm9ybSkuZmluZCgnW3JlcXVpcmVkXScpLmVxKGkpO1xyXG5cdFx0ZWxlbWVudC5uZXh0KCkucmVtb3ZlQ2xhc3MoJ3Nob3cnKTtcclxuXHRcdGlmIChlbGVtZW50LnZhbCgpID09PSAnJykge1xyXG5cdFx0XHRlbGVtZW50LmFkZENsYXNzKCdlcnJvcicpXHJcblx0XHRcdFx0Lm5leHQoKS5hZGRDbGFzcygnc2hvdycpXHJcblx0XHRcdFx0LnRleHQoJ9Cf0L7Qu9C1INC+0LHRj9C30LDRgtC10LvRjNC90L4g0LTQu9GPINC30LDQv9C+0LvQvdC10L3QuNGPJyk7XHJcblx0XHRcdGVycm9ycyA9IHRydWU7XHJcblx0XHR9XHJcblx0fVxyXG5cdFxyXG5cdGlmIChwaG9uZUZpZWxkLmxlbmd0aCkge1xyXG5cdFx0bGV0IHBob25lVmFsdWUgPSBwaG9uZUZpZWxkLnZhbCgpO1xyXG5cdFx0bGV0IHBob25lX3BhdHRlcm4gPSAvN1xcZHsxMH0vO1xyXG5cdFx0aWYgKHBob25lVmFsdWUgPT09ICcnKSB7XHJcblx0XHR9IGVsc2UgaWYgKC9fL2dpLnRlc3QocGhvbmVWYWx1ZSkpIHtcclxuXHRcdFx0cGhvbmVGaWVsZC5hZGRDbGFzcygnZXJyb3InKVxyXG5cdFx0XHRcdC5uZXh0KCkuYWRkQ2xhc3MoJ3Nob3cnKVxyXG5cdFx0XHRcdC50ZXh0KCfQktCy0LXQtNC40YLQtSDQutC+0YDRgNC10LrRgtC90YvQuSDQvdC+0LzQtdGAINGC0LXQu9C10YTQvtC90LAnKTtcclxuXHRcdFx0XHJcblx0XHRcdGVycm9ycyA9IHRydWU7XHJcblx0XHR9IGVsc2UgaWYgKCFwaG9uZV9wYXR0ZXJuLnRlc3QocGhvbmVWYWx1ZS5yZXBsYWNlKC9cXEQvZ2ksICcnKSkpIHtcclxuXHRcdFx0cGhvbmVGaWVsZC5hZGRDbGFzcygnZXJyb3InKVxyXG5cdFx0XHRcdC5uZXh0KCkuYWRkQ2xhc3MoJ3Nob3cnKVxyXG5cdFx0XHRcdC50ZXh0KCfQktCy0LXQtNC40YLQtSDQutC+0YDRgNC10LrRgtC90YvQuSDQvdC+0LzQtdGAINGC0LXQu9C10YTQvtC90LAnKTtcclxuXHRcdFx0Y29uc29sZS5sb2cocGhvbmVWYWx1ZS5yZXBsYWNlKC9cXEQvZ2ksICcnKSk7XHJcblx0XHRcdGVycm9ycyA9IHRydWU7XHJcblx0XHR9XHJcblx0fVxyXG5cclxuXHRpZiAoZW1haWxGaWVsZC5sZW5ndGgpIHtcclxuXHRcdGxldCBlbWFpbFZhbHVlID0gZW1haWxGaWVsZC52YWwoKTtcclxuXHRcdGNvbnN0IHJlZ2V4cCA9IC9bYS16MC05ISMkJSYnKisvPT9eX2B7fH1+LV0rKD86XFwuW2EtejAtOSEjJCUmJyorLz0/Xl9ge3x9fi1dKykqQCg/OlthLXowLTldKD86W2EtejAtOS1dKlthLXowLTldKT9cXC4pK1thLXowLTldKD86W2EtejAtOS1dKlthLXowLTldKT8vaTtcclxuXHRcdFxyXG5cdFx0aWYgKGVtYWlsVmFsdWUgIT09ICcnICYmICFyZWdleHAudGVzdChlbWFpbFZhbHVlKSkge1xyXG5cdFx0XHRlbWFpbEZpZWxkLmFkZENsYXNzKCdtc2ctZXJyb3InKVxyXG5cdFx0XHRcdC5uZXh0KCkuYWRkQ2xhc3MoJ3Nob3cnKVxyXG5cdFx0XHRcdC50ZXh0KCfQktCy0LXQtNC40YLQtSDQutC+0YDRgNC10LrRgtC90YvQuSDQsNC00YDQtdGBINGN0LvQtdC60YLRgNC+0L3QvdC+0Lkg0L/QvtGH0YLRiycpO1xyXG5cdFx0XHRcclxuXHRcdFx0ZXJyb3JzID0gdHJ1ZTtcclxuXHRcdH1cclxuXHR9XHJcblxyXG5cdGlmIChuYW1lRmllbGQubGVuZ3RoKSB7XHJcblx0XHRsZXQgbmFtZVZhbHVlID0gbmFtZUZpZWxkLnZhbCgpO1xyXG5cdFx0Y29uc3QgcmVnZXhwTmFtZSA9IC9bYS16MC05XSsvaTtcclxuXHJcblx0XHRpZiAobmFtZVZhbHVlICE9PSAnJyAmJiByZWdleHBOYW1lLnRlc3QobmFtZVZhbHVlKSkge1xyXG5cdFx0XHRuYW1lRmllbGQuYWRkQ2xhc3MoJ21zZy1lcnJvcicpXHJcblx0XHRcdFx0Lm5leHQoKS5hZGRDbGFzcygnc2hvdycpXHJcblx0XHRcdFx0LnRleHQoJ9CY0LzRjyDQvdC1INC00L7Qu9C20L3QviDRgdC+0LTQtdGA0LbQsNGC0Ywg0LvQsNGC0LjQvdGB0LrQuNGFINGB0LjQvNCy0L7Qu9C+0LIg0Lgg0YbQuNGE0YAnKTtcclxuXHJcblx0XHRcdGVycm9ycyA9IHRydWU7XHJcblx0XHR9ZWxzZXtcclxuXHRcdFx0bmFtZUZpZWxkLnJlbW92ZUNsYXNzKCdtc2ctZXJyb3InKVxyXG5cdFx0XHRcdC5uZXh0KCkucmVtb3ZlQ2xhc3MoJ3Nob3cnKVxyXG5cdFx0XHRcdC50ZXh0KCcnKTtcclxuXHRcdH1cclxuXHR9XHJcblxyXG5cdGlmIChzZWxlY3RGaWVsZC5sZW5ndGgpe1xyXG5cdFx0aWYgKHNlbGVjdEZpZWxkLnZhbCgpID09PSAnMCcgfHwgIXNlbGVjdEZpZWxkLnZhbCgpLmxlbmd0aCkge1xyXG5cdFx0XHRzZWxlY3RGaWVsZC5hZGRDbGFzcygnbXNnLWVycm9yJylcclxuXHRcdFx0XHQubmV4dCgpLmFkZENsYXNzKCdzaG93JylcclxuXHRcdFx0XHQudGV4dCgn0J/QvtC20LDQu9GD0LnRgdGC0LAsINCy0YvQsdC10YDQuNGC0LUg0KHQtdGA0LLQuNGB0L3Ri9C5INCm0LXQvdGC0YAnKTtcclxuXHJcblx0XHRcdGVycm9ycyA9IHRydWU7XHJcblx0XHR9XHJcblx0XHRlbHNlIHtcclxuXHRcdFx0c2VsZWN0RmllbGQucmVtb3ZlQ2xhc3MoJ21zZy1lcnJvcicpXHJcblx0XHRcdFx0Lm5leHQoKS5yZW1vdmVDbGFzcygnc2hvdycpXHJcblx0XHRcdFx0LnRleHQoJycpO1xyXG5cdFx0fVxyXG5cdH1cclxuXHJcblx0cmV0dXJuIGVycm9ycztcclxufVxyXG5cclxuZnVuY3Rpb24gcGFyc2VWYWx1ZXModmFsdWVzKSB7XHJcblx0bGV0IHJlc3VsdCA9IHt9O1xyXG5cdFxyXG5cdGZvciAobGV0IGkgPSAwOyBpIDwgdmFsdWVzLmxlbmd0aDsgaSsrKVxyXG5cdFx0cmVzdWx0W3ZhbHVlc1tpXS5uYW1lXSA9IHZhbHVlc1tpXS52YWx1ZTtcclxuXHRcclxuXHRyZXR1cm4gcmVzdWx0O1xyXG59XHJcblxyXG5mdW5jdGlvbiBzZW5kRm9ybShmb3JtRGF0YSwgRm9ybSkge1xyXG5cdCQuYWpheCh7XHJcblx0XHR0eXBlOiAnUE9TVCcsXHJcblx0XHR1cmw6IEZvcm0uYWN0aW9uLFxyXG5cdFx0ZGF0YTogZm9ybURhdGEsXHJcblx0XHRkYXRhVHlwZTogJ2pzb24nLFxyXG5cdFx0c3VjY2VzczogZnVuY3Rpb24gKGRhdGEpIHtcclxuXHRcdFx0aWYgKGRhdGEuc3RhdHVzKSB7XHJcblx0XHRcdFx0c2hvd1N1Y2Nlc3NNc2coKTtcclxuXHRcdFx0XHRhbGVydChkYXRhLm1zZyk7XHJcblx0XHRcdH1cclxuXHRcdFx0ZWxzZSB7XHJcblx0XHRcdFx0YWxlcnQoXCLQktC+0LfQvdC40LrQu9C4INC+0YjQuNCx0LrQuDpcXG4gLSBcIiArIGRhdGEuZXJyb3JzLmpvaW4oXCJcXG4gLSBcIikpO1xyXG5cdFx0XHR9XHJcblx0XHR9LFxyXG5cdFx0ZXJyb3I6IGZ1bmN0aW9uIChlKSB7XHJcblx0XHRcdGNvbnNvbGUubG9nKGUucmVzcG9uc2VKU09OKTtcclxuXHRcdFx0YWxlcnQoZS5yZXNwb25zZUpTT04uZGV0YWlsKTtcclxuXHRcdH1cclxuXHR9KTtcclxufVxyXG5mdW5jdGlvbiBzaG93U3VjY2Vzc01zZygpIHtcclxuXHQkKCcuZm9ybS1ib2R5JykuaGlkZSgpO1xyXG5cdCQoJy5mb3JtLW1zZycpLnNob3coKTtcclxuXHRjb25zdCBtb2RhbF9jYWxsYmFjayA9ICQoJyNtb2RhbC1jYWxsYmFjaycpO1xyXG5cdGlmICghIG1vZGFsX2NhbGxiYWNrLmhhc0NsYXNzKCdpcy12aXNpYmxlJykpIHtcclxuXHRcdG1vZGFsX2NhbGxiYWNrLmFkZENsYXNzKCdpcy12aXNpYmxlJylcclxuXHR9XHJcbn1cclxuJChkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24gKCkge1xyXG5cdGNvbnN0IG1vZGFsX2NhbGxiYWNrID0gJCgnLnBvcHVwJyk7XHJcblx0Y29uc3QgbW9kYWxfdGl0bGUgPSBtb2RhbF9jYWxsYmFjay5maW5kKCcubWlkZGxlX3RleHRfZm9ybScpO1xyXG5cdCQoZG9jdW1lbnQpLm9uKCdjbGljaycsICcuanMtcG9wdXAtdHJpZ2dlcicsIGZ1bmN0aW9uIChlKSB7XHJcblx0XHRlLnByZXZlbnREZWZhdWx0KCk7XHJcblx0XHRsZXQgdGl0bGUgPSAkKHRoaXMpLmRhdGEoJ3RpdGxlJyk7XHJcblx0XHRpZiAoIXRpdGxlKSB7XHJcblx0XHRcdHRpdGxlID0gJCh0aGlzKS5odG1sKCk7XHJcblx0XHR9XHJcblx0XHRpZiAoIXRpdGxlKSB7XHJcblx0XHRcdHRpdGxlID0gJ9CX0LDQutCw0LfQsNGC0Ywg0LfQstC+0L3QvtC6JztcclxuXHRcdH1cclxuXHRcdG1vZGFsX3RpdGxlLmh0bWwodGl0bGUgKyAnOicpO1xyXG5cdFx0bW9kYWxfY2FsbGJhY2suYWRkQ2xhc3MoJ3Nob3cnKTtcclxuXHR9KTtcclxuXHQkKCcucG9wdXAgLmNsb3NlJykuY2xpY2soZnVuY3Rpb24gKGUpIHtcclxuXHRcdGUucHJldmVudERlZmF1bHQoKTtcclxuXHRcdCQodGhpcykucGFyZW50KCkucGFyZW50KCkucmVtb3ZlQ2xhc3MoJ3Nob3cnKTtcclxuXHRcdCQoJy5lcnJvci1pbnB1dCcpLnJlbW92ZUNsYXNzKCdzaG93Jyk7XHJcblx0fSk7XHJcblx0XHJcblx0JCgnLmpzLWNhbGxiYWNrLWZvcm0nKS5zdWJtaXQoZnVuY3Rpb24gKGUpIHtcclxuXHRcdGUucHJldmVudERlZmF1bHQoKTtcclxuXHRcdHZhciBGb3JtID0gKHRoaXMpLmNsb3Nlc3QoJ2Zvcm0nKTtcclxuXHRcdGlmICh2ZXJpZnlGb3JtKEZvcm0pKSB7XHJcblx0XHRcdHJldHVybiBmYWxzZTtcclxuXHRcdH1cclxuXHRcdFxyXG5cdFx0Ly8kKHRoaXMpLnByb3AoJ2Rpc2FibGVkJywgdHJ1ZSk7XHJcblx0XHRcclxuXHRcdGxldCB0ZWwgPSAkKEZvcm0pLmZpbmQoJ2lucHV0W25hbWU9XCJwaG9uZVwiXScpLnZhbCgpO1xyXG5cclxuXHRcdGlmICh3aW5kb3cuQ29tYWdpYykge1xyXG5cclxuXHRcdFx0Ly8gY29uc3QgYXJyYXlfb2ZfZGVhbGVyc19mb3JfY29tYWdpYyA9IHtcclxuXHRcdFx0Ly8gXHQnbG9ibic6IDIwNTg1NSxcclxuXHRcdFx0Ly8gXHQndWRhbCc6IDIwNTg1NyxcclxuXHRcdFx0Ly8gXHQnc2V2JzogMjA1ODYxLFxyXG5cdFx0XHQvLyB9O1xyXG4gICAgICAgICAgICAvL1xyXG5cdFx0XHQvLyB2YXIgdCA9ICtuZXcgRGF0ZSgpICsgMTAwMDA7XHJcblx0XHRcdC8vIGNvbnN0IGxvY2F0aW9uID0gJChGb3JtKS5maW5kKCdzZWxlY3RbbmFtZT1sb2NhdGlvbl0nKS52YWwoKTtcclxuXHRcdFx0Ly8gdmFyIHNlbGVjdGVkX2xvY2F0aW9uID0gYXJyYXlfb2ZfZGVhbGVyc19mb3JfY29tYWdpY1tsb2NhdGlvbl07XHJcblx0XHRcdC8vIGNvbnNvbGUubG9nKCdMb2NhdGlvbjogJytsb2NhdGlvbik7XHJcblx0XHRcdC8vIGNvbnNvbGUubG9nKCdDb21hZ2ljIGdyb3VwOiAnK3NlbGVjdGVkX2xvY2F0aW9uKTtcclxuXHRcdFx0Ly8gQ29tYWdpYy5zaXRlUGhvbmVDYWxsKHtcclxuXHRcdFx0Ly8gXHRjYXB0Y2hhX2tleTogJycsXHJcblx0XHRcdC8vIFx0Y2FwdGNoYV92YWw6ICcnLFxyXG5cdFx0XHQvLyBcdHBob25lOiB0ZWwsXHJcblx0XHRcdC8vIFx0ZGVsYXllZF9jYWxsX3RpbWU6IHQudG9TdHJpbmcoKSxcclxuXHRcdFx0Ly8gXHRncm91cF9pZDogc2VsZWN0ZWRfbG9jYXRpb25cclxuXHRcdFx0Ly8gfSwgZnVuY3Rpb24gKHJlc3ApIHtcclxuICAgICAgICAgICAgLy9cclxuXHRcdFx0Ly8gfSk7XHJcbiAgICAgICAgICAgIHZhciB0ID0gK25ldyBEYXRlKCkgKyAxMDAwMDtcclxuICAgICAgICAgICAgdmFyIHNldHRpbmdzID0ge1xyXG4gICAgICAgICAgICAgICAgXCJ1cmxcIjogXCJodHRwczovL2FkbWluLnFyZW50YS5ydS9hcGkvc2l0ZXBob25lL2NvZGVfcGVyZXp2b24/cGhvbmU9NzgwMDQmc2l0ZT00XCIsXHJcbiAgICAgICAgICAgICAgICBcIm1ldGhvZFwiOiBcIkdFVFwiLFxyXG4gICAgICAgICAgICAgICAgXCJ0aW1lb3V0XCI6IDAsXHJcbiAgICAgICAgICAgIH07XHJcbiAgICAgICAgICAgICQuYWpheChzZXR0aW5ncykuZG9uZShmdW5jdGlvbiAocmVzcG9uc2UpIHtcclxuICAgICAgICAgICAgICAgIHZhciBpZF9wbG9zaGFka2kgPSBcIlwiO1xyXG4gICAgICAgICAgICAgICAgaWYocmVzcG9uc2VbJ3N0YXR1cyddKXtcclxuICAgICAgICAgICAgICAgICAgICBpZF9wbG9zaGFka2kgPSByZXNwb25zZVsnZGF0YSddWydjb2RlX3BlcmV6dm9uJ107XHJcbiAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgICAgICBDb21hZ2ljV2lkZ2V0LnNpdGVQaG9uZUNhbGwoe3Bob25lOiB0ZWwsIGdyb3VwX2lkOiBpZF9wbG9zaGFka2ksIGRlbGF5ZWRfY2FsbF90aW1lOiB0LnRvU3RyaW5nKCl9KTtcclxuICAgICAgICAgICAgfSk7XHJcblx0XHR9XHJcblx0XHRcclxuXHRcdFxyXG5cdFx0bGV0IGZvcm1EYXRhID0gcGFyc2VWYWx1ZXMoJChGb3JtKS5zZXJpYWxpemVBcnJheSgpKTtcclxuXHRcdHNlbmRGb3JtKGZvcm1EYXRhLCBGb3JtKTtcclxuXHR9KTtcclxufSk7IiwiLy8gZXh0cmFjdGVkIGJ5IG1pbmktY3NzLWV4dHJhY3QtcGx1Z2luIiwiaW1wb3J0ICQgZnJvbSAnanF1ZXJ5JztcclxuaW1wb3J0ICcuLi8uLi8uLi9saWJzL2pxdWVyeS5tYXNrZWRpbnB1dC5taW4nO1xyXG5cclxuJChkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24gKCkge1xyXG5cdCQoXCIucGhvbmVfbWFza19wZXJlenZvblwiKS5tYXNrKFwiKDk5OSkgOTk5LTk5LTk5XCIpO1xyXG5cdFxyXG5cdCQoJyNwZXJldGh2b24wJykub24oJ2NsaWNrJyxmdW5jdGlvbiAoKSB7XHJcblx0XHQkKCcjcGVyZXRodm9uMCcpLmhpZGUoKTtcclxuXHRcdCQoJyNwZXJldGh2b24nKS5zaG93KCk7XHJcblx0fSk7XHJcblx0XHJcblx0JCgnLmNsb3NlLXBvcHVwX3BlcmV6dm9uJykub24oJ2NsaWNrJyxmdW5jdGlvbiAoKSB7XHJcblx0XHQkKCcjcGVyZXRodm9uMCcpLnNob3coKTtcclxuXHRcdCQoJyNwZXJldGh2b24nKS5oaWRlKCk7XHJcblx0fSk7XHJcblx0XHJcblx0JCgnZGl2LmJ1dHRvbi13aWRnZXRfcGVyZXp2b24nKS5vbignY2xpY2snLCBmdW5jdGlvbiAoKSB7XHJcblx0XHRjb25zdCBwaG9uZSA9ICQoXCIjcGhvbmVwZXJlenZvblwiKS52YWwoKTtcclxuXHRcdFxyXG5cdFx0XHJcblx0XHRpZiAocGhvbmUubGVuZ3RoIDwgNykge1xyXG5cdFx0XHQkKCcjcGhvbmVwZXJlenZvbicpLmNzcygnYm9yZGVyJywgJzFweCBzb2xpZCAjRkYwMDAwJyk7XHJcblx0XHRcdGFsZXJ0KFwi0LfQsNC/0L7Qu9C90LjRgtC1INC/0L7Qu9C+0LUg0YLQtdC70LXRhNC+0L0sINC/0L7QttCw0LvRg9C50YHRgtCwLlwiKTtcclxuXHRcdH0gZWxzZSB7XHJcblx0XHRcdC8vJCgnI3Bob25lcGVyZXp2b24nKS5jc3MoJ2JvcmRlcicsICcxcHggc29saWQgI0IyQjJCMicpO1xyXG5cdFx0fVxyXG5cdFx0XHJcblx0XHRcclxuXHRcdGlmIChwaG9uZS5sZW5ndGggPiA2KSB7XHJcblx0XHRcdFxyXG5cdFx0XHQkKHRoaXMpLmh0bWwoJ9Ce0YLQv9GA0LDQstC60LAuLi4nKTtcclxuXHRcdFx0JC5wb3N0KFwiL21haWwvY2FsbGJhY2svbWFuZ29cIixcclxuXHRcdFx0XHR7cGhvbmU6ICcrNycgKyBwaG9uZSwgc3ViamVjdDogJ9CX0LDQutCw0Lcg0LfQstC+0L3QutCwINGBINGB0LDQudGC0LAnfSxcclxuXHRcdFx0XHRmdW5jdGlvbiAoZGF0YTExMXMyMjEyMmRkZDIxMTEpIHtcclxuXHRcdFx0XHRcdGlmICh3aW5kb3cuQ29tYWdpY1dpZGdldCkge1xyXG5cdFx0XHRcdFx0XHR2YXIgdCA9ICtuZXcgRGF0ZSgpICsgMTAwMDA7XHJcblxyXG5cdFx0XHRcdFx0Ly9cdHlhQ291bnRlcjQxNDA4NTg5LnJlYWNoR29hbCgncGVyZXp2b24nKTtcclxuXHRcdFx0XHRcdFx0Q29tYWdpY1dpZGdldC5zaXRlUGhvbmVDYWxsKHtcclxuXHRcdFx0XHRcdFx0XHRwaG9uZTogcGhvbmUsXHJcblx0XHRcdFx0XHRcdFx0Z3JvdXBfaWQ6ICcnLFxyXG5cdFx0XHRcdFx0XHRcdGRlbGF5ZWRfY2FsbF90aW1lOiB0LnRvU3RyaW5nKClcclxuXHRcdFx0XHRcdFx0fSk7XHJcblx0XHRcdFx0XHRcdGNvbnNvbGUubG9nKCdwaG9uZSA9PicrcGhvbmUpO1xyXG5cdFx0XHRcdFx0fWVsc2V7XHJcblx0XHRcdFx0XHRcdGNvbnNvbGUubG9nKCdDb21hZ2ljINC90LUg0LjQvdC40YbQuNCw0LvQuNC30LjRgNC+0LLQsNC9IScpO1xyXG5cdFx0XHRcdFx0fVxyXG5cdFx0XHRcdFx0YWxlcnQoJ9Ce0YLQv9GA0LDQstC70LXQvdC+Jyk7XHJcblx0XHRcdFx0XHQkKCcjcGVyZXRodm9uMCcpLnNob3coKTtcclxuXHRcdFx0XHRcdCQoJyNwZXJldGh2b24nKS5oaWRlKCk7XHJcblx0XHRcdFx0XHQkKCcuYnV0dG9uLXdpZGdldF9wZXJlenZvbicpLmh0bWwoJ9Ce0YLQv9GA0LDQstC70LXQvdC+Jyk7XHJcblx0XHRcdFx0XHQkKCcjcGhvbmVwZXJlenZvbicpLnJlbW92ZSgpO1xyXG5cdFx0XHRcdH1cclxuXHRcdFx0KTtcclxuXHRcdH1cclxuXHRcdFxyXG5cdH0pO1xyXG59KTsiLCJpbXBvcnQgJCBmcm9tICdqcXVlcnknXHJcbi8v0J/QtdGA0LXQvNC10L3QvdCw0Y8g0LTQu9GPINCy0LrQu9GO0YfQtdC90LjRjy/QvtGC0LrQu9GO0YfQtdC90LjRjyDQuNC90LTQuNC60LDRgtC+0YDQsCDQt9Cw0LPRgNGD0LfQutC4XHJcbnZhciBzcGlubmVyID0gJCgnLnltYXAtY29udGFpbmVyJykuY2hpbGRyZW4oJy5sb2FkZXInKTtcclxuLy/Qn9C10YDQtdC80LXQvdC90LDRjyDQtNC70Y8g0L7Qv9GA0LXQtNC10LvQtdC90LjRjyDQsdGL0LvQsCDQu9C4INGF0L7RgtGMINGA0LDQtyDQt9Cw0LPRgNGD0LbQtdC90LAg0K/QvdC00LXQutGBLtCa0LDRgNGC0LAgKNGH0YLQvtCx0Ysg0LjQt9Cx0LXQttCw0YLRjCDQv9C+0LLRgtC+0YDQvdC+0Lkg0LfQsNCz0YDRg9C30LrQuCDQv9GA0Lgg0L3QsNCy0LXQtNC10L3QuNC4KVxyXG52YXIgY2hlY2tfaWZfbG9hZCA9IGZhbHNlO1xyXG4vL9Cd0LXQvtCx0YXQvtC00LjQvNGL0LUg0L/QtdGA0LXQvNC10L3QvdGL0LUg0LTQu9GPINGC0L7Qs9C+LCDRh9GC0L7QsdGLINC30LDQtNCw0YLRjCDQutC+0L7RgNC00LjQvdCw0YLRiyDQvdCwINCv0L3QtNC10LrRgS7QmtCw0YDRgtC1XHJcbnZhciBtYXAsIG15UGxhY2VtYXJrVGVtcDtcclxuXHJcbi8v0KTRg9C90LrRhtC40Y8g0YHQvtC30LTQsNC90LjRjyDQutCw0YDRgtGLINGB0LDQudGC0LAg0Lgg0LfQsNGC0LXQvCDQstGB0YLQsNCy0LrQuCDQtdC1INCyINCx0LvQvtC6INGBINC40LTQtdC90YLQuNGE0LjQutCw0YLQvtGA0L7QvCBcIm1hcC15YW5kZXhcIlxyXG5mdW5jdGlvbiBpbml0KCkge1xyXG4gICAgdmFyIG1hcCA9IG5ldyB5bWFwcy5NYXAoXCJtYXAteWFuZGV4XCIsIHtcclxuICAgICAgICAgICAgY2VudGVyOiBbNTUuNzc1Njk1LCAzNy42MTMzNzFdLFxyXG4gICAgICAgICAgICB6b29tOiAxMCxcclxuICAgICAgICAgICAgY29udHJvbHM6IFsnem9vbUNvbnRyb2wnLCAnZnVsbHNjcmVlbkNvbnRyb2wnXVxyXG4gICAgICAgIH0pLFxyXG4gICAgICAgIE15QmFsbG9vbkxheW91dCA9IHltYXBzLnRlbXBsYXRlTGF5b3V0RmFjdG9yeS5jcmVhdGVDbGFzcyhcclxuICAgICAgICAgICAgJzxkaXYgY2xhc3M9XCJtYXAtYmFsb29uXCI+JyArXHJcbiAgICAgICAgICAgICc8YSBjbGFzcz1cImNsb3NlXCIgaHJlZj1cIiNcIj4mdGltZXM7PC9hPicgK1xyXG4gICAgICAgICAgICAnPGRpdiBjbGFzcz1cImFycm93XCI+PC9kaXY+JyArXHJcbiAgICAgICAgICAgICckW1tvcHRpb25zLmNvbnRlbnRMYXlvdXQgb2JzZXJ2ZVNpemUgbWluV2lkdGg9MjM1IG1heFdpZHRoPTIzNSBtYXhIZWlnaHQ9MzUwXV0nICtcclxuICAgICAgICAgICAgJzwvZGl2PicsIHtcclxuICAgICAgICAgICAgICAgIGJ1aWxkOiBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgdGhpcy5jb25zdHJ1Y3Rvci5zdXBlcmNsYXNzLmJ1aWxkLmNhbGwodGhpcyk7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgIHRoaXMuXyRlbGVtZW50ID0gJCgnLm1hcC1iYWxvb24nLCB0aGlzLmdldFBhcmVudEVsZW1lbnQoKSk7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgIHRoaXMuYXBwbHlFbGVtZW50T2Zmc2V0KCk7XHJcblxyXG4gICAgICAgICAgICAgICAgICAgIHRoaXMuXyRlbGVtZW50LmZpbmQoJy5jbG9zZScpXHJcbiAgICAgICAgICAgICAgICAgICAgICAgIC5vbignY2xpY2snLCAkLnByb3h5KHRoaXMub25DbG9zZUNsaWNrLCB0aGlzKSk7XHJcbiAgICAgICAgICAgICAgICB9LFxyXG4gICAgICAgICAgICAgICAgY2xlYXI6IGZ1bmN0aW9uICgpIHtcclxuICAgICAgICAgICAgICAgICAgICB0aGlzLl8kZWxlbWVudC5maW5kKCcuY2xvc2UnKVxyXG4gICAgICAgICAgICAgICAgICAgICAgICAub2ZmKCdjbGljaycpO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICB0aGlzLmNvbnN0cnVjdG9yLnN1cGVyY2xhc3MuY2xlYXIuY2FsbCh0aGlzKTtcclxuICAgICAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgICAgICBvblN1YmxheW91dFNpemVDaGFuZ2U6IGZ1bmN0aW9uICgpIHtcclxuICAgICAgICAgICAgICAgICAgICBNeUJhbGxvb25MYXlvdXQuc3VwZXJjbGFzcy5vblN1YmxheW91dFNpemVDaGFuZ2UuYXBwbHkodGhpcywgYXJndW1lbnRzKTtcclxuXHJcbiAgICAgICAgICAgICAgICAgICAgaWYgKCF0aGlzLl9pc0VsZW1lbnQodGhpcy5fJGVsZW1lbnQpKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIHJldHVybjtcclxuICAgICAgICAgICAgICAgICAgICB9XHJcblxyXG4gICAgICAgICAgICAgICAgICAgIHRoaXMuZXZlbnRzLmZpcmUoJ3NoYXBlY2hhbmdlJyk7XHJcbiAgICAgICAgICAgICAgICB9LFxyXG4gICAgICAgICAgICAgICAgYXBwbHlFbGVtZW50T2Zmc2V0OiBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgdGhpcy5fJGVsZW1lbnQuY3NzKHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgbGVmdDogLSh0aGlzLl8kZWxlbWVudFswXS5vZmZzZXRXaWR0aCAvIDIpLFxyXG4gICAgICAgICAgICAgICAgICAgICAgICB0b3A6IC0odGhpcy5fJGVsZW1lbnRbMF0ub2Zmc2V0SGVpZ2h0ICsgdGhpcy5fJGVsZW1lbnQuZmluZCgnLmFycm93JylbMF0ub2Zmc2V0SGVpZ2h0KVxyXG4gICAgICAgICAgICAgICAgICAgIH0pO1xyXG4gICAgICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgICAgIG9uQ2xvc2VDbGljazogZnVuY3Rpb24gKGUpIHtcclxuICAgICAgICAgICAgICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XHJcbiAgICAgICAgICAgICAgICAgICAgdGhpcy5ldmVudHMuZmlyZSgndXNlcmNsb3NlJyk7XHJcbiAgICAgICAgICAgICAgICB9LFxyXG4gICAgICAgICAgICAgICAgZ2V0U2hhcGU6IGZ1bmN0aW9uICgpIHtcclxuICAgICAgICAgICAgICAgICAgICBpZiAoIXRoaXMuX2lzRWxlbWVudCh0aGlzLl8kZWxlbWVudCkpIHtcclxuICAgICAgICAgICAgICAgICAgICAgICAgcmV0dXJuIE15QmFsbG9vbkxheW91dC5zdXBlcmNsYXNzLmdldFNoYXBlLmNhbGwodGhpcyk7XHJcbiAgICAgICAgICAgICAgICAgICAgfVxyXG5cclxuICAgICAgICAgICAgICAgICAgICB2YXIgcG9zaXRpb24gPSB0aGlzLl8kZWxlbWVudC5wb3NpdGlvbigpO1xyXG5cclxuICAgICAgICAgICAgICAgICAgICByZXR1cm4gbmV3IHltYXBzLnNoYXBlLlJlY3RhbmdsZShuZXcgeW1hcHMuZ2VvbWV0cnkucGl4ZWwuUmVjdGFuZ2xlKFtcclxuICAgICAgICAgICAgICAgICAgICAgICAgW3Bvc2l0aW9uLmxlZnQsIHBvc2l0aW9uLnRvcF0sIFtcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHBvc2l0aW9uLmxlZnQgKyB0aGlzLl8kZWxlbWVudFswXS5vZmZzZXRXaWR0aCxcclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIHBvc2l0aW9uLnRvcCArIHRoaXMuXyRlbGVtZW50WzBdLm9mZnNldEhlaWdodCArIHRoaXMuXyRlbGVtZW50LmZpbmQoJy5hcnJvdycpWzBdLm9mZnNldEhlaWdodFxyXG4gICAgICAgICAgICAgICAgICAgICAgICBdXHJcbiAgICAgICAgICAgICAgICAgICAgXSkpO1xyXG4gICAgICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgICAgIF9pc0VsZW1lbnQ6IGZ1bmN0aW9uIChlbGVtZW50KSB7XHJcbiAgICAgICAgICAgICAgICAgICAgcmV0dXJuIGVsZW1lbnQgJiYgZWxlbWVudFswXSAmJiBlbGVtZW50LmZpbmQoJy5hcnJvdycpWzBdO1xyXG4gICAgICAgICAgICAgICAgfVxyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgKSxcclxuICAgICAgICBNeUJhbGxvb25Db250ZW50TGF5b3V0ID0geW1hcHMudGVtcGxhdGVMYXlvdXRGYWN0b3J5LmNyZWF0ZUNsYXNzKFxyXG4gICAgICAgICAgICAnPGRpdj4kW3Byb3BlcnRpZXMuYmFsbG9vbkNvbnRlbnRdPC9kaXY+J1xyXG4gICAgICAgICksXHJcbiAgICAgICAgbG9iID0gd2luZG93Lm15UGxhY2VtYXJrID0gbmV3IHltYXBzLlBsYWNlbWFyayhbNTUuODkyMTM4LCAzNy41MjQxNjZdLCB7XHJcbiAgICAgICAgICAgIGhpbnRDb250ZW50OiAn0JvQvtCx0L3QtdC90YHQutCw0Y8nLFxyXG4gICAgICAgICAgICBiYWxsb29uQ29udGVudDogJzxkaXYgY2xhc3M9XCJtYXAtaW5mb1wiPicgK1xyXG4gICAgICAgICAgICAgICAgJzxkaXYgY2xhc3M9XCJtYXAtaW5mb19fdGl0bGVcIj7Qm9C+0LHQvdC10L3RgdC60LDRjzwvZGl2PicgK1xyXG4gICAgICAgICAgICAgICAgJzxkaXYgY2xhc3M9XCJtYXAtaW5mb19fcGhvbmVcIj7QotC10LvQtdGE0L7QvTwvZGl2PicgK1xyXG4gICAgICAgICAgICAgICAgJzxkaXYgY2xhc3M9XCJtYXAtaW5mb19fcGhvbmUtbnVtYmVyXCI+PGEgaHJlZj1cInRlbDorNzQ5NTE1MDcwNzhcIj4rNyg0OTUpIDE1MC03MC03ODwvYT48L2Rpdj4nICtcclxuICAgICAgICAgICAgICAgICc8ZGl2IGNsYXNzPVwibWFwLWluZm9fX2FkcmVzc1wiPtCQ0LTRgNC10YE8L2Rpdj4nICtcclxuICAgICAgICAgICAgICAgICc8ZGl2IGNsYXNzPVwibWFwLWluZm9fX2FkcmVzcy1pbmZvXCI+0YPQuy4g0JvQvtCx0L3QtdC90YHQutCw0Y8sIDE3INGB0YLRgC4xPC9kaXY+JyArXHJcbiAgICAgICAgICAgICAgICAnPGRpdiBjbGFzcz1cIm1hcC1pbmZvX19idG4gbWFwLWluZm9fX2J0bi1saW5rc1wiPtCf0YDQvtC70L7QttC40YLRjCDQvNCw0YDRiNGA0YPRgicgK1xyXG4gICAgICAgICAgICAgICAgJzxkaXYgY2xhc3M9XCJtYXAtaW5mb19fYnRuX19jb250ZW50XCI+XFxuJyArXHJcbiAgICAgICAgICAgICAgICAnPGEgaHJlZj1cImh0dHBzOi8veWFuZGV4LnJ1L21hcHMvMjEzL21vc2Nvdy8/bGw9MzcuNTIyNTg4JTJDNTUuODkxMjUxJm1vZGU9cm91dGVzJnJ0ZXh0PX41NS44OTIxMzglMkMzNy41MjQxNjYmcnR0PWF1dG8mc2xsPTM3LjcyNjc5NyUyQzU1LjY1NzI0NiZzc3BuPTAuODg5MjA2JTJDMC4yODQ1NDgmdGV4dD0lRDElODMlRDAlQkIuJTIwJUQwJTlCJUQwJUJFJUQwJUIxJUQwJUJEJUQwJUI1JUQwJUJEJUQxJTgxJUQwJUJBJUQwJUIwJUQxJThGJTJDJTIwMTclMjAlRDElODElRDElODIlRDElODAuMSZ0b2FkZHJlc3M9JUQwJTlDJUQwJUJFJUQxJTgxJUQwJUJBJUQwJUIyJUQwJUIwJTJDJUQxJTgzJUQwJUJCLiVEMCU5QiVEMCVCRSVEMCVCMSVEMCVCRCVEMCVCNSVEMCVCRCVEMSU4MSVEMCVCQSVEMCVCMCVEMSU4RiUyQyUyMDE3JTJDJUQxJTgxJUQxJTgyJUQxJTgwLjEmej0xNVwiIHRhcmdldD1cIl9ibGFua1wiICBkYXRhLW5hbWU9XCLQm9C+0LHQvdC10L3RgdC60LDRj1wiIGRhdGEtbWFwPVwi0Y/QvdC00LXQutGBINC60LDRgNGC0YtcIiBjbGFzcz1cIm1hcnNoXCI+0JLQtdCxLdCy0LXRgNGB0LjRjyDQr9C90LTQtdC60YEg0JrQsNGA0YI8L2E+XFxuJyArXHJcbiAgICAgICAgICAgICAgICAnPGEgaHJlZj1cInlhbmRleG5hdmk6Ly9idWlsZF9yb3V0ZV9vbl9tYXA/bGF0X3RvPTU1Ljg5MjEzOCZsb25fdG89MzcuNTI0MTY2XCIgdGFyZ2V0PVwiX2JsYW5rXCIgIGRhdGEtbmFtZT1cItCb0L7QsdC90LXQvdGB0LrQsNGPXCIgZGF0YS1tYXA9XCLRj9C90LTQtdC60YEg0L3QsNCy0LjQs9Cw0YLQvtGAXCIgY2xhc3M9XCJtYXJzaFwiPtCv0L3QtNC10LrRgSDQndCw0LLQuNCz0LDRgtC+0YA8L2E+XFxuJyArXHJcbiAgICAgICAgICAgICAgICAnPGEgaHJlZj1cImh0dHBzOi8vd3d3Lmdvb2dsZS5ydS9tYXBzL2Rpci8vJUQxJTgzJUQwJUJCLislRDAlOUIlRDAlQkUlRDAlQjElRDAlQkQlRDAlQjUlRDAlQkQlRDElODElRDAlQkElRDAlQjAlRDElOEYsKzE3LCslRDAlOUMlRDAlQkUlRDElODElRDAlQkElRDAlQjIlRDAlQjAsKzEyNzY0NC9ANTUuODkxODc5OCwzNy41MTg5MjE4LDE1Ljc1ei9kYXRhPSE0bTghNG03ITFtMCExbTUhMW0xITFzMHg0NmI1MzljZmZiZDI5NGRkOjB4MzVmYTRmNzA5MTllM2FiNSEybTIhMWQzNy41MjQxNTk5ITJkNTUuODkyMTQ0XCIgdGFyZ2V0PVwiX2JsYW5rXCIgIGRhdGEtbmFtZT1cItCb0L7QsdC90LXQvdGB0LrQsNGPXCIgZGF0YS1tYXA9XCLQs9GD0LPQuyDQutCw0YDRgtGLXCIgY2xhc3M9XCJtYXJzaFwiPkdvb2dsZSBNYXBzPC9hPlxcbicgK1xyXG4gICAgICAgICAgICAgICAgJzwvZGl2PicgK1xyXG4gICAgICAgICAgICAgICAgJzwvZGl2PicgK1xyXG4gICAgICAgICAgICAgICAgJzxkaXYgY2xhc3M9XCJtYXAtaW5mb19fYnRuIHBvcHVwLXRyaWdnZXJcIj7Ql9Cw0L/QuNGB0LDRgtGM0YHRjzwvZGl2PicgK1xyXG4gICAgICAgICAgICAgICAgJzwvZGl2PicsXHJcbiAgICAgICAgICAgIGljb25DYXB0aW9uOiAn0JvQvtCx0L3QtdC90YHQutCw0Y8nXHJcbiAgICAgICAgfSwge1xyXG4gICAgICAgICAgICBpY29uTGF5b3V0OiAnZGVmYXVsdCNpbWFnZVdpdGhDb250ZW50JyxcclxuICAgICAgICAgICAgaWNvbkltYWdlSHJlZjogJy9pbWcvbWFwL21hcC1iYWxvb24ucG5nJyxcclxuICAgICAgICAgICAgaWNvbkltYWdlU2l6ZTogWzQwLCA1Nl0sXHJcbiAgICAgICAgICAgIGljb25JbWFnZU9mZnNldDogWzAsIC0zOF0sXHJcbiAgICAgICAgICAgIGJhbGxvb25TaGFkb3c6IGZhbHNlLFxyXG4gICAgICAgICAgICBiYWxsb29uTGF5b3V0OiBNeUJhbGxvb25MYXlvdXQsXHJcbiAgICAgICAgICAgIGJhbGxvb25Db250ZW50TGF5b3V0OiBNeUJhbGxvb25Db250ZW50TGF5b3V0LFxyXG4gICAgICAgICAgICBiYWxsb29uUGFuZWxNYXhNYXBBcmVhOiAwXHJcbiAgICAgICAgfSksXHJcbiAgICAgICAgbml6aCA9IHdpbmRvdy5teVBsYWNlbWFyayA9IG5ldyB5bWFwcy5QbGFjZW1hcmsoWzU1LjczMDAzNiwgMzcuNzI1MjgwXSwge1xyXG4gICAgICAgICAgICBoaW50Q29udGVudDogJ9Cd0LjQttC10LPQvtGA0L7QtNGB0LrQsNGPJyxcclxuICAgICAgICAgICAgYmFsbG9vbkNvbnRlbnQ6ICc8ZGl2IGNsYXNzPVwibWFwLWluZm9cIj4nICtcclxuICAgICAgICAgICAgICAgICc8ZGl2IGNsYXNzPVwibWFwLWluZm9fX3RpdGxlXCI+0J3QuNC20LXQs9C+0YDQvtC00YHQutCw0Y88L2Rpdj4nICtcclxuICAgICAgICAgICAgICAgICc8ZGl2IGNsYXNzPVwibWFwLWluZm9fX3Bob25lXCI+0KLQtdC70LXRhNC+0L08L2Rpdj4nICtcclxuICAgICAgICAgICAgICAgICc8ZGl2IGNsYXNzPVwibWFwLWluZm9fX3Bob25lLW51bWJlclwiPjxhIGhyZWY9XCJ0ZWw6Kzc0OTUwMjMyMTkwXCI+KzcgKDQ5NSkgMDIzLTIxLTkwPC9hPjwvZGl2PicgK1xyXG4gICAgICAgICAgICAgICAgJzxkaXYgY2xhc3M9XCJtYXAtaW5mb19fYWRyZXNzXCI+0JDQtNGA0LXRgTwvZGl2PicgK1xyXG4gICAgICAgICAgICAgICAgJzxkaXYgY2xhc3M9XCJtYXAtaW5mb19fYWRyZXNzLWluZm9cIj7QndC40LbQtdCz0L7RgNC+0LTRgdC60LDRjyAxMDIg0YHRgtGALjPQkDwvZGl2PicgK1xyXG4gICAgICAgICAgICAgICAgJzxkaXYgY2xhc3M9XCJtYXAtaW5mb19fYnRuIG1hcC1pbmZvX19idG4tbGlua3NcIj7Qn9GA0L7Qu9C+0LbQuNGC0Ywg0LzQsNGA0YjRgNGD0YInICtcclxuICAgICAgICAgICAgICAgICc8ZGl2IGNsYXNzPVwibWFwLWluZm9fX2J0bl9fY29udGVudFwiPlxcbicgK1xyXG4gICAgICAgICAgICAgICAgJzxhIGhyZWY9XCJodHRwczovL3lhbmRleC5ydS9tYXBzLzIxMy9tb3Njb3cvP2xsPTM3LjcyNTI4MCUyQzU1LjczMDAzNiZtb2RlPXJvdXRlcyZydGV4dD1+NTUuNzMwMDM2JTJDMzcuNzI1MjgwJnJ0dD1hdXRvJnNsbD0zNy43MjY3OTclMkM1NS42NTcyNDYmc3Nwbj0xLjAwOTM2OSUyQzAuMzE5NDg2JnRleHQ9JUQwJTlEJUQwJUI4JUQwJUI2JUQwJUI1JUQwJUIzJUQwJUJFJUQxJTgwJUQwJUJFJUQwJUI0JUQxJTgxJUQwJUJBJUQwJUIwJUQxJThGJTIwMTAyJTIwJUQxJTgxJUQxJTgyJUQxJTgwLjMlRDAlOTAmdG9hZGRyZXNzPSVEMCU5QyVEMCVCRSVEMSU4MSVEMCVCQSVEMCVCMiVEMCVCMCUyQyVEMSU4MyVEMCVCQi4lRDAlOUIlRDAlQkUlRDAlQjElRDAlQkQlRDAlQjUlRDAlQkQlRDElODElRDAlQkElRDAlQjAlRDElOEYlMkMlMjAxNyUyQyVEMSU4MSVEMSU4MiVEMSU4MC4xJno9MTdcIiB0YXJnZXQ9XCJfYmxhbmtcIiBkYXRhLW5hbWU9XCLQndC40LbQtdCz0L7RgNC+0LTRgdC60LDRj1wiIGRhdGEtbWFwPVwi0Y/QvdC00LXQutGBINC60LDRgNGC0YtcIiBjbGFzcz1cIm1hcnNoXCI+0JLQtdCxLdCy0LXRgNGB0LjRjyDQr9C90LTQtdC60YEg0JrQsNGA0YI8L2E+XFxuJyArXHJcbiAgICAgICAgICAgICAgICAnPGEgaHJlZj1cInlhbmRleG5hdmk6Ly9idWlsZF9yb3V0ZV9vbl9tYXA/bGF0X3RvPTU1LjczMDAzNiZsb25fdG89MzcuNzI1MjgwXCIgdGFyZ2V0PVwiX2JsYW5rXCIgZGF0YS1uYW1lPVwi0J3QuNC20LXQs9C+0YDQvtC00YHQutCw0Y9cIiBkYXRhLW1hcD1cItGP0L3QtNC10LrRgSDQvdCw0LLQuNCz0LDRgtC+0YBcIiBjbGFzcz1cIm1hcnNoXCI+0K/QvdC00LXQutGBINCd0LDQstC40LPQsNGC0L7RgDwvYT5cXG4nICtcclxuICAgICAgICAgICAgICAgICc8YSBocmVmPVwiaHR0cHM6Ly93d3cuZ29vZ2xlLnJ1L21hcHMvZGlyLy8lRDAlOUQlRDAlQjglRDAlQjYlRDAlQjUlRDAlQjMlRDAlQkUlRDElODAlRDAlQkUlRDAlQjQlRDElODElRDAlQkElRDAlQjAlRDElOEYrJUQxJTgzJUQwJUJCLiwrMTAyLCszJUQwJTkwLCslRDAlOUMlRDAlQkUlRDElODElRDAlQkElRDAlQjIlRDAlQjAsKzEwOTA1Mi9ANTUuNzMwMDcyMSwzNy43MTM4MzkyLDE0LjI1ei9kYXRhPSE0bTghNG03ITFtMCExbTUhMW0xITFzMHg0MTRhYjU0N2U0YzM4YzYxOjB4Mjg3ODBlYmVlMjVjMGRmITJtMiExZDM3LjcyNDkyODQhMmQ1NS43MzA1MDcyXCIgdGFyZ2V0PVwiX2JsYW5rXCIgZGF0YS1uYW1lPVwi0J3QuNC20LXQs9C+0YDQvtC00YHQutCw0Y9cIiBkYXRhLW1hcD1cItCz0YPQs9C7INC60LDRgNGC0YtcIiBjbGFzcz1cIm1hcnNoXCI+R29vZ2xlIE1hcHM8L2E+XFxuJyArXHJcbiAgICAgICAgICAgICAgICAnPC9kaXY+JyArXHJcbiAgICAgICAgICAgICAgICAnPC9kaXY+JyArXHJcbiAgICAgICAgICAgICAgICAnPGRpdiBjbGFzcz1cIm1hcC1pbmZvX19idG4gcG9wdXAtdHJpZ2dlclwiPtCX0LDQv9C40YHQsNGC0YzRgdGPPC9kaXY+JyArXHJcbiAgICAgICAgICAgICAgICAnPC9kaXY+JyxcclxuICAgICAgICAgICAgaWNvbkNhcHRpb246ICfQndC40LbQtdCz0L7RgNC+0LTRgdC60LDRjydcclxuICAgICAgICB9LCB7XHJcbiAgICAgICAgICAgIGljb25MYXlvdXQ6ICdkZWZhdWx0I2ltYWdlV2l0aENvbnRlbnQnLFxyXG4gICAgICAgICAgICBpY29uSW1hZ2VIcmVmOiAnJyxcclxuICAgICAgICAgICAgaWNvbkltYWdlU2l6ZTogWzAsIDBdLFxyXG4gICAgICAgICAgICBpY29uQ29udGVudDogJycsXHJcbiAgICAgICAgICAgIGljb25JbWFnZU9mZnNldDogWzAsIDBdLFxyXG4gICAgICAgICAgICBiYWxsb29uU2hhZG93OiBmYWxzZSxcclxuICAgICAgICAgICAgYmFsbG9vbkxheW91dDogTXlCYWxsb29uTGF5b3V0LFxyXG4gICAgICAgICAgICBiYWxsb29uQ29udGVudExheW91dDogTXlCYWxsb29uQ29udGVudExheW91dCxcclxuICAgICAgICAgICAgYmFsbG9vblBhbmVsTWF4TWFwQXJlYTogMFxyXG5cclxuICAgICAgICB9KSxcclxuICAgICAgICB1ZGFsID0gd2luZG93Lm15UGxhY2VtYXJrID0gbmV3IHltYXBzLlBsYWNlbWFyayhbNTUuNjg3NzY2LCAzNy40ODgxMjVdLCB7XHJcbiAgICAgICAgICAgIGhpbnRDb250ZW50OiAn0KPQtNCw0LvRjNGG0L7QstCwJyxcclxuICAgICAgICAgICAgYmFsbG9vbkNvbnRlbnQ6ICc8ZGl2IGNsYXNzPVwibWFwLWluZm9cIj4nICtcclxuICAgICAgICAgICAgICAgICc8ZGl2IGNsYXNzPVwibWFwLWluZm9fX3RpdGxlXCI+0KPQtNCw0LvRjNGG0L7QstCwPC9kaXY+JyArXHJcbiAgICAgICAgICAgICAgICAnPGRpdiBjbGFzcz1cIm1hcC1pbmZvX19waG9uZVwiPtCi0LXQu9C10YTQvtC9PC9kaXY+JyArXHJcbiAgICAgICAgICAgICAgICAnPGRpdiBjbGFzcz1cIm1hcC1pbmZvX19waG9uZS1udW1iZXJcIj48YSBocmVmPVwidGVsOis3NDk1Mzc0ODg1NlwiPis3KDQ5NSkgMzc0LTg4LTU2PC9hPjwvZGl2PicgK1xyXG4gICAgICAgICAgICAgICAgJzxkaXYgY2xhc3M9XCJtYXAtaW5mb19fYWRyZXNzXCI+0JDQtNGA0LXRgTwvZGl2PicgK1xyXG4gICAgICAgICAgICAgICAgJzxkaXYgY2xhc3M9XCJtYXAtaW5mb19fYWRyZXNzLWluZm9cIj7Rg9C7LiDQo9C00LDQu9GM0YbQvtCy0LAsIDYwPC9kaXY+JyArXHJcbiAgICAgICAgICAgICAgICAnPGRpdiBjbGFzcz1cIm1hcC1pbmZvX19idG4gbWFwLWluZm9fX2J0bi1saW5rc1wiPtCf0YDQvtC70L7QttC40YLRjCDQvNCw0YDRiNGA0YPRgicgK1xyXG4gICAgICAgICAgICAgICAgJzxkaXYgY2xhc3M9XCJtYXAtaW5mb19fYnRuX19jb250ZW50XCI+XFxuJyArXHJcbiAgICAgICAgICAgICAgICAnPGEgaHJlZj1cImh0dHBzOi8veWFuZGV4LnJ1L21hcHMvMjEzL21vc2Nvdy8/bGw9MzcuNDg4MTI1JTJDNTUuNjg3NzY2Jm1vZGU9cm91dGVzJnJ0ZXh0PX41NS42ODc3NjYlMkMzNy40ODgxMjUmcnR0PWF1dG8mc2xsPTM3LjcyNTI4MCUyQzU1LjczMDAzNiZzc3BuPTAuMDE1NzcxJTJDMC4wMDQ5ODMmdGV4dD0lRDElODMlRDAlQkIuJTIwJUQwJUEzJUQwJUI0JUQwJUIwJUQwJUJCJUQxJThDJUQxJTg2JUQwJUJFJUQwJUIyJUQwJUIwJTJDJTIwNjAmdG9hZGRyZXNzPSVEMCU5QyVEMCVCRSVEMSU4MSVEMCVCQSVEMCVCMiVEMCVCMCUyQyVEMSU4MyVEMCVCQi4lRDAlOUIlRDAlQkUlRDAlQjElRDAlQkQlRDAlQjUlRDAlQkQlRDElODElRDAlQkElRDAlQjAlRDElOEYlMkMlMjAxNyUyQyVEMSU4MSVEMSU4MiVEMSU4MC4xJno9MTdcIiB0YXJnZXQ9XCJfYmxhbmtcIiBkYXRhLW5hbWU9XCLQo9C00LDQu9GM0YbQvtCy0LBcIiBkYXRhLW1hcD1cItGP0L3QtNC10LrRgSDQutCw0YDRgtGLXCIgY2xhc3M9XCJtYXJzaFwiPtCS0LXQsS3QstC10YDRgdC40Y8g0K/QvdC00LXQutGBINCa0LDRgNGCPC9hPlxcbicgK1xyXG4gICAgICAgICAgICAgICAgJzxhIGhyZWY9XCJ5YW5kZXhuYXZpOi8vYnVpbGRfcm91dGVfb25fbWFwP2xhdF90bz01NS43MzAwMzYmbG9uX3RvPTM3LjcyNTI4MFwiIHRhcmdldD1cIl9ibGFua1wiIGRhdGEtbmFtZT1cItCj0LTQsNC70YzRhtC+0LLQsFwiIGRhdGEtbWFwPVwi0Y/QvdC00LXQutGBINC90LDQstC40LPQsNGC0L7RgFwiIGNsYXNzPVwibWFyc2hcIj7Qr9C90LTQtdC60YEg0J3QsNCy0LjQs9Cw0YLQvtGAPC9hPlxcbicgK1xyXG4gICAgICAgICAgICAgICAgJzxhIGhyZWY9XCJodHRwczovL3d3dy5nb29nbGUucnUvbWFwcy9kaXIvLyVEMSU4MyVEMCVCQi4rJUQwJUEzJUQwJUI0JUQwJUIwJUQwJUJCJUQxJThDJUQxJTg2JUQwJUJFJUQwJUIyJUQwJUIwLCs2MCwrJUQwJTlDJUQwJUJFJUQxJTgxJUQwJUJBJUQwJUIyJUQwJUIwLCsxMTk2MDcvQDU1LjY4Nzc3MTEsMzcuNDgzMTE3MywxNS43NXovZGF0YT0hNG04ITRtNyExbTAhMW01ITFtMSExczB4NDZiNTRjNGM2MjE5YWY1NzoweGFkNTVhYjAwYzRjNzUxOWQhMm0yITFkMzcuNDg4MDQ2OCEyZDU1LjY4NzczNDZcIiB0YXJnZXQ9XCJfYmxhbmtcIiBkYXRhLW5hbWU9XCLQo9C00LDQu9GM0YbQvtCy0LBcIiBkYXRhLW1hcD1cItCz0YPQs9C7INC60LDRgNGC0YtcIiBjbGFzcz1cIm1hcnNoXCI+R29vZ2xlIE1hcHM8L2E+XFxuJyArXHJcbiAgICAgICAgICAgICAgICAnPC9kaXY+JyArXHJcbiAgICAgICAgICAgICAgICAnPC9kaXY+JyArXHJcbiAgICAgICAgICAgICAgICAnPGRpdiBjbGFzcz1cIm1hcC1pbmZvX19idG4gcG9wdXAtdHJpZ2dlclwiPtCX0LDQv9C40YHQsNGC0YzRgdGPPC9kaXY+JyArXHJcbiAgICAgICAgICAgICAgICAnPC9kaXY+JyxcclxuICAgICAgICAgICAgaWNvbkNhcHRpb246ICfQo9C00LDQu9GM0YbQvtCy0LAnXHJcbiAgICAgICAgfSwge1xyXG4gICAgICAgICAgICBpY29uTGF5b3V0OiAnZGVmYXVsdCNpbWFnZVdpdGhDb250ZW50JyxcclxuICAgICAgICAgICAgaWNvbkltYWdlSHJlZjogJy9pbWcvbWFwL21hcC1iYWxvb24ucG5nJyxcclxuICAgICAgICAgICAgaWNvbkltYWdlU2l6ZTogWzQwLCA1Nl0sXHJcbiAgICAgICAgICAgIGljb25Db250ZW50OiAn0KPQtNCw0LvRjNGG0L7QstCwJyxcclxuICAgICAgICAgICAgaWNvbkltYWdlT2Zmc2V0OiBbMCwgLTM4XSxcclxuICAgICAgICAgICAgYmFsbG9vblNoYWRvdzogZmFsc2UsXHJcbiAgICAgICAgICAgIGJhbGxvb25MYXlvdXQ6IE15QmFsbG9vbkxheW91dCxcclxuICAgICAgICAgICAgYmFsbG9vbkNvbnRlbnRMYXlvdXQ6IE15QmFsbG9vbkNvbnRlbnRMYXlvdXQsXHJcbiAgICAgICAgICAgIGJhbGxvb25QYW5lbE1heE1hcEFyZWE6IDBcclxuXHJcbiAgICAgICAgfSksXHJcbiAgICAgICAgc2V2YXN0b3AgPSB3aW5kb3cubXlQbGFjZW1hcmsgPSBuZXcgeW1hcHMuUGxhY2VtYXJrKFs1NS42MzUzNDUsIDM3LjU0MzU3OF0sIHtcclxuICAgICAgICAgICAgaGludENvbnRlbnQ6ICfQodC10LLQsNGB0YLQvtC/0L7Qu9GM0YHQutC40LknLFxyXG4gICAgICAgICAgICBiYWxsb29uQ29udGVudDogJzxkaXYgY2xhc3M9XCJtYXAtaW5mb1wiPicgK1xyXG4gICAgICAgICAgICAgICAgJzxkaXYgY2xhc3M9XCJtYXAtaW5mb19fdGl0bGVcIj7QodC10LLQsNGB0YLQvtC/0L7Qu9GM0YHQutC40Lk8L2Rpdj4nICtcclxuICAgICAgICAgICAgICAgICc8ZGl2IGNsYXNzPVwibWFwLWluZm9fX3Bob25lXCI+0KLQtdC70LXRhNC+0L08L2Rpdj4nICtcclxuICAgICAgICAgICAgICAgICc8ZGl2IGNsYXNzPVwibWFwLWluZm9fX3Bob25lLW51bWJlclwiPjxhIGhyZWY9XCJ0ZWw6Kzc0OTUzNzQ3NzEyXCI+KzcoNDk1KSAzNzQtNzctMTI8L2E+PC9kaXY+JyArXHJcbiAgICAgICAgICAgICAgICAnPGRpdiBjbGFzcz1cIm1hcC1pbmZvX19hZHJlc3NcIj7QkNC00YDQtdGBPC9kaXY+JyArXHJcbiAgICAgICAgICAgICAgICAnPGRpdiBjbGFzcz1cIm1hcC1pbmZvX19hZHJlc3MtaW5mb1wiPtCh0LXQstCw0YHRgtC+0L/QvtC70YzRgdC60LjQuSDQv9GALdGCLCA5NdCxPC9kaXY+JyArXHJcbiAgICAgICAgICAgICAgICAnPGRpdiBjbGFzcz1cIm1hcC1pbmZvX19idG4gbWFwLWluZm9fX2J0bi1saW5rc1wiPtCf0YDQvtC70L7QttC40YLRjCDQvNCw0YDRiNGA0YPRgicgK1xyXG4gICAgICAgICAgICAgICAgJzxkaXYgY2xhc3M9XCJtYXAtaW5mb19fYnRuX19jb250ZW50XCI+XFxuJyArXHJcbiAgICAgICAgICAgICAgICAnPGEgaHJlZj1cImh0dHBzOi8veWFuZGV4LnJ1L21hcHMvMjEzL21vc2Nvdy8/bGw9MzcuNTQzOTcyJTJDNTUuNjM1MzE4Jm1vZGU9cm91dGVzJnJ0ZXh0PX41NS42MzUzNDUlMkMzNy41NDM1NzgmcnR0PWF1dG8mc2xsPTM3LjQ4ODEyNSUyQzU1LjY4Nzc2NiZzc3BuPTAuMDE1NzcxJTJDMC4wMDUyMDYmdGV4dD0lRDAlQTElRDAlQjUlRDAlQjIlRDAlQjAlRDElODElRDElODIlRDAlQkUlRDAlQkYlRDAlQkUlRDAlQkIlRDElOEMlRDElODElRDAlQkElRDAlQjglRDAlQjklMjAlRDAlQkYlRDElODAtJUQxJTgyJTJDJTIwOTUlRDAlQjEmdG9hZGRyZXNzPSVEMCU5QyVEMCVCRSVEMSU4MSVEMCVCQSVEMCVCMiVEMCVCMCUyQyVEMSU4MyVEMCVCQi4lRDAlOUIlRDAlQkUlRDAlQjElRDAlQkQlRDAlQjUlRDAlQkQlRDElODElRDAlQkElRDAlQjAlRDElOEYlMkMlMjAxNyUyQyVEMSU4MSVEMSU4MiVEMSU4MC4xJno9MThcIiB0YXJnZXQ9XCJfYmxhbmtcIiBkYXRhLW5hbWU9XCLQodC10LLQsNGB0YLQvtC/0L7Qu9GM0YHQutC40LlcIiBkYXRhLW1hcD1cItGP0L3QtNC10LrRgSDQutCw0YDRgtGLXCIgY2xhc3M9XCJtYXJzaFwiPtCS0LXQsS3QstC10YDRgdC40Y8g0K/QvdC00LXQutGBINCa0LDRgNGCPC9hPlxcbicgK1xyXG4gICAgICAgICAgICAgICAgJzxhIGhyZWY9XCJ5YW5kZXhuYXZpOi8vYnVpbGRfcm91dGVfb25fbWFwP2xhdF90bz01NS42MzUzNDUmbG9uX3RvPTM3LjU0MzU3OFwiIHRhcmdldD1cIl9ibGFua1wiICBkYXRhLW5hbWU9XCLQodC10LLQsNGB0YLQvtC/0L7Qu9GM0YHQutC40LlcIiBkYXRhLW1hcD1cItGP0L3QtNC10LrRgSDQvdCw0LLQuNCz0LDRgtC+0YBcIiBjbGFzcz1cIm1hcnNoXCI+0K/QvdC00LXQutGBINCd0LDQstC40LPQsNGC0L7RgDwvYT5cXG4nICtcclxuICAgICAgICAgICAgICAgICc8YSBocmVmPVwiaHR0cHM6Ly93d3cuZ29vZ2xlLnJ1L21hcHMvZGlyLy8lRDAlQTElRDAlQjUlRDAlQjIlRDAlQjAlRDElODElRDElODIlRDAlQkUlRDAlQkYlRDAlQkUlRDAlQkIlRDElOEMlRDElODElRDAlQkElRDAlQjglRDAlQjkrJUQwJUJGJUQxJTgwLiwrOTUlRDAlOTEsKyVEMCU5QyVEMCVCRSVEMSU4MSVEMCVCQSVEMCVCMiVEMCVCMCwrMTE3MzQyL0A1NS42MzUzMjk1LDM3LjUzOTMwMTQsMTZ6L2RhdGE9ITRtOCE0bTchMW0wITFtNSExbTEhMXMweDQxNGFiMmI1MjBiOWQ0NmI6MHgyYTM4YWY4YjZkMTg3NDRkITJtMiExZDM3LjU0MzY3ODghMmQ1NS42MzUzMjk2XCIgdGFyZ2V0PVwiX2JsYW5rXCIgZGF0YS1uYW1lPVwi0KHQtdCy0LDRgdGC0L7Qv9C+0LvRjNGB0LrQuNC5XCIgZGF0YS1tYXA9XCLQs9GD0LPQuyDQutCw0YDRgtGLXCIgY2xhc3M9XCJtYXJzaFwiPkdvb2dsZSBNYXBzPC9hPlxcbicgK1xyXG4gICAgICAgICAgICAgICAgJzwvZGl2PicgK1xyXG4gICAgICAgICAgICAgICAgJzwvZGl2PicgK1xyXG4gICAgICAgICAgICAgICAgJzxkaXYgY2xhc3M9XCJtYXAtaW5mb19fYnRuIHBvcHVwLXRyaWdnZXJcIj7Ql9Cw0L/QuNGB0LDRgtGM0YHRjzwvZGl2PicgK1xyXG4gICAgICAgICAgICAgICAgJzwvZGl2PicsXHJcbiAgICAgICAgICAgIGljb25DYXB0aW9uOiAn0KHQtdCy0LDRgdGC0L7Qv9C+0LvRjNGB0LrQuNC5J1xyXG4gICAgICAgIH0sIHtcclxuICAgICAgICAgICAgaWNvbkxheW91dDogJ2RlZmF1bHQjaW1hZ2VXaXRoQ29udGVudCcsXHJcbiAgICAgICAgICAgIGljb25JbWFnZUhyZWY6ICcvaW1nL21hcC9tYXAtYmFsb29uLnBuZycsXHJcbiAgICAgICAgICAgIGljb25JbWFnZVNpemU6IFs0MCwgNTZdLFxyXG4gICAgICAgICAgICBpY29uQ29udGVudDogJ9Ch0LXQstCw0YHRgtC+0L/QvtC70YzRgdC60LjQuScsXHJcbiAgICAgICAgICAgIGljb25JbWFnZU9mZnNldDogWzAsIC0zOF0sXHJcbiAgICAgICAgICAgIGJhbGxvb25TaGFkb3c6IGZhbHNlLFxyXG4gICAgICAgICAgICBiYWxsb29uTGF5b3V0OiBNeUJhbGxvb25MYXlvdXQsXHJcbiAgICAgICAgICAgIGJhbGxvb25Db250ZW50TGF5b3V0OiBNeUJhbGxvb25Db250ZW50TGF5b3V0LFxyXG4gICAgICAgICAgICBiYWxsb29uUGFuZWxNYXhNYXBBcmVhOiAwXHJcblxyXG4gICAgICAgIH0pO1xyXG5cclxuICAgIG1hcC5nZW9PYmplY3RzXHJcbiAgICAgICAgLmFkZChzZXZhc3RvcClcclxuICAgICAgICAuYWRkKGxvYik7XHJcblxyXG4gICAgbWFwLmdlb09iamVjdHNcclxuICAgICAgICAuYWRkKHVkYWwpO1xyXG5cclxuXHJcbiAgICBpZiAoJCh3aW5kb3cpLndpZHRoKCkgPCA3NjgpIHtcclxuICAgICAgICBtYXAuYmVoYXZpb3JzLmRpc2FibGUoJ3Njcm9sbFpvb20nKTtcclxuICAgICAgICBtYXAuYmVoYXZpb3JzLmRpc2FibGUoJ2RyYWcnKTtcclxuICAgIH1cclxuXHJcbiAgICAvLyDQn9C+0LvRg9GH0LDQtdC8INC/0LXRgNCy0YvQuSDRjdC60LfQtdC80L/Qu9GP0YAg0LrQvtC70LvQtdC60YbQuNC4INGB0LvQvtC10LIsINC/0L7RgtC+0Lwg0L/QtdGA0LLRi9C5INGB0LvQvtC5INC60L7Qu9C70LXQutGG0LjQuFxyXG4gICAgdmFyIGxheWVyID0gbWFwLmxheWVycy5nZXQoMCkuZ2V0KDApO1xyXG5cclxuICAgIC8vINCg0LXRiNC10L3QuNC1INC/0L4gY2FsbGJhY2st0YMg0LTQu9GPINC+0L/RgNC10LTQtdC70L3QuNGPINC/0L7Qu9C90L7QuSDQt9Cw0LPRgNGD0LfQutC4INC60LDRgNGC0YtcclxuICAgIHdhaXRGb3JUaWxlc0xvYWQobGF5ZXIpLnRoZW4oZnVuY3Rpb24gKCkge1xyXG4gICAgICAgIC8vINCh0LrRgNGL0LLQsNC10Lwg0LjQvdC00LjQutCw0YLQvtGAINC30LDQs9GA0YPQt9C60Lgg0L/QvtGB0LvQtSDQv9C+0LvQvdC+0Lkg0LfQsNCz0YDRg9C30LrQuCDQutCw0YDRgtGLXHJcbiAgICAgICAgc3Bpbm5lci5yZW1vdmVDbGFzcygnaXMtYWN0aXZlJyk7XHJcbiAgICB9KTtcclxufVxyXG5cclxuLy8g0KTRg9C90LrRhtC40Y8g0LTQu9GPINC+0L/RgNC10LTQtdC70LXQvdC40Y8g0L/QvtC70L3QvtC5INC30LDQs9GA0YPQt9C60Lgg0LrQsNGA0YLRiyAo0L3QsCDRgdCw0LzQvtC8INC00LXQu9C1INC/0YDQvtCy0LXRgNGP0LXRgtGB0Y8g0LfQsNCz0YDRg9C30LrQsCDRgtCw0LnQu9C+0LIpIFxyXG5mdW5jdGlvbiB3YWl0Rm9yVGlsZXNMb2FkKGxheWVyKSB7XHJcbiAgICByZXR1cm4gbmV3IHltYXBzLnZvdy5Qcm9taXNlKGZ1bmN0aW9uIChyZXNvbHZlLCByZWplY3QpIHtcclxuICAgICAgICB2YXIgdGMgPSBnZXRUaWxlQ29udGFpbmVyKGxheWVyKSwgcmVhZHlBbGwgPSB0cnVlO1xyXG4gICAgICAgIHRjLnRpbGVzLmVhY2goZnVuY3Rpb24gKHRpbGUsIG51bWJlcikge1xyXG4gICAgICAgICAgICBpZiAoIXRpbGUuaXNSZWFkeSgpKSB7XHJcbiAgICAgICAgICAgICAgICByZWFkeUFsbCA9IGZhbHNlO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfSk7XHJcbiAgICAgICAgaWYgKHJlYWR5QWxsKSB7XHJcbiAgICAgICAgICAgIHJlc29sdmUoKTtcclxuICAgICAgICB9IGVsc2Uge1xyXG4gICAgICAgICAgICB0Yy5ldmVudHMub25jZShcInJlYWR5XCIsIGZ1bmN0aW9uICgpIHtcclxuICAgICAgICAgICAgICAgIHJlc29sdmUoKTtcclxuICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgfVxyXG4gICAgfSk7XHJcbn1cclxuXHJcbmZ1bmN0aW9uIGdldFRpbGVDb250YWluZXIobGF5ZXIpIHtcclxuICAgIGZvciAodmFyIGsgaW4gbGF5ZXIpIHtcclxuICAgICAgICBpZiAobGF5ZXIuaGFzT3duUHJvcGVydHkoaykpIHtcclxuICAgICAgICAgICAgaWYgKFxyXG4gICAgICAgICAgICAgICAgbGF5ZXJba10gaW5zdGFuY2VvZiB5bWFwcy5sYXllci50aWxlQ29udGFpbmVyLkNhbnZhc0NvbnRhaW5lclxyXG4gICAgICAgICAgICAgICAgfHwgbGF5ZXJba10gaW5zdGFuY2VvZiB5bWFwcy5sYXllci50aWxlQ29udGFpbmVyLkRvbUNvbnRhaW5lclxyXG4gICAgICAgICAgICApIHtcclxuICAgICAgICAgICAgICAgIHJldHVybiBsYXllcltrXTtcclxuICAgICAgICAgICAgfVxyXG4gICAgICAgIH1cclxuICAgIH1cclxuICAgIHJldHVybiBudWxsO1xyXG59XHJcblxyXG4vLyDQpNGD0L3QutGG0LjRjyDQt9Cw0LPRgNGD0LfQutC4IEFQSSDQr9C90LTQtdC60YEu0JrQsNGA0YIg0L/QviDRgtGA0LXQsdC+0LLQsNC90LjRjiAo0LIg0L3QsNGI0LXQvCDRgdC70YPRh9Cw0LUg0L/RgNC4INC90LDQstC10LTQtdC90LjQuClcclxuZnVuY3Rpb24gbG9hZFNjcmlwdCh1cmwsIGNhbGxiYWNrKSB7XHJcbiAgICB2YXIgc2NyaXB0ID0gZG9jdW1lbnQuY3JlYXRlRWxlbWVudChcInNjcmlwdFwiKTtcclxuXHJcbiAgICBpZiAoc2NyaXB0LnJlYWR5U3RhdGUpIHsgIC8vIElFXHJcbiAgICAgICAgc2NyaXB0Lm9ucmVhZHlzdGF0ZWNoYW5nZSA9IGZ1bmN0aW9uICgpIHtcclxuICAgICAgICAgICAgaWYgKHNjcmlwdC5yZWFkeVN0YXRlID09IFwibG9hZGVkXCIgfHxcclxuICAgICAgICAgICAgICAgIHNjcmlwdC5yZWFkeVN0YXRlID09IFwiY29tcGxldGVcIikge1xyXG4gICAgICAgICAgICAgICAgc2NyaXB0Lm9ucmVhZHlzdGF0ZWNoYW5nZSA9IG51bGw7XHJcbiAgICAgICAgICAgICAgICBjYWxsYmFjaygpO1xyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfTtcclxuICAgIH0gZWxzZSB7ICAvLyDQlNGA0YPQs9C40LUg0LHRgNCw0YPQt9C10YDRi1xyXG4gICAgICAgIHNjcmlwdC5vbmxvYWQgPSBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgIGNhbGxiYWNrKCk7XHJcbiAgICAgICAgfTtcclxuICAgIH1cclxuXHJcbiAgICBzY3JpcHQuc3JjID0gdXJsO1xyXG4gICAgZG9jdW1lbnQuZ2V0RWxlbWVudHNCeVRhZ05hbWUoXCJoZWFkXCIpWzBdLmFwcGVuZENoaWxkKHNjcmlwdCk7XHJcbn1cclxuXHJcbi8vINCe0YHQvdC+0LLQvdCw0Y8g0YTRg9C90LrRhtC40Y8sINC60L7RgtC+0YDQsNGPINC/0YDQvtCy0LXRgNGP0LXRgiDQutC+0LPQtNCwINC80Ysg0L3QsNCy0LXQu9C4INC90LAg0LHQu9C+0Log0YEg0LrQu9Cw0YHRgdC+0LwgXCJ5bWFwLWNvbnRhaW5lclwiXHJcbnZhciB5bWFwID0gZnVuY3Rpb24gKCkge1xyXG4gICAgJCgnLnltYXAtY29udGFpbmVyJykubW91c2VlbnRlcihmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgIGlmICghY2hlY2tfaWZfbG9hZCkgeyAvLyDQv9GA0L7QstC10YDRj9C10Lwg0L/QtdGA0LLRi9C5INC70Lgg0YDQsNC3INC30LDQs9GA0YPQttCw0LXRgtGB0Y8g0K/QvdC00LXQutGBLtCa0LDRgNGC0LAsINC10YHQu9C4INC00LAsINGC0L4g0LfQsNCz0YDRg9C20LDQtdC8XHJcblxyXG4gICAgICAgICAgICAgICAgLy8g0KfRgtC+0LHRiyDQvdC1INCx0YvQu9C+INC/0L7QstGC0L7RgNC90L7QuSDQt9Cw0LPRgNGD0LfQutC4INC60LDRgNGC0YssINC80Ysg0LjQt9C80LXQvdGP0LXQvCDQt9C90LDRh9C10L3QuNC1INC/0LXRgNC10LzQtdC90L3QvtC5XHJcbiAgICAgICAgICAgICAgICBjaGVja19pZl9sb2FkID0gdHJ1ZTtcclxuXHJcbiAgICAgICAgICAgICAgICAvLyDQn9C+0LrQsNC30YvQstCw0LXQvCDQuNC90LTQuNC60LDRgtC+0YAg0LfQsNCz0YDRg9C30LrQuCDQtNC+INGC0LXRhSDQv9C+0YAsINC/0L7QutCwINC60LDRgNGC0LAg0L3QtSDQt9Cw0LPRgNGD0LfQuNGC0YHRj1xyXG4gICAgICAgICAgICAgICAgc3Bpbm5lci5hZGRDbGFzcygnaXMtYWN0aXZlJyk7XHJcblxyXG4gICAgICAgICAgICAgICAgLy8g0JfQsNCz0YDRg9C20LDQtdC8IEFQSSDQr9C90LTQtdC60YEu0JrQsNGA0YJcclxuICAgICAgICAgICAgICAgIGxvYWRTY3JpcHQoXCJodHRwczovL2FwaS1tYXBzLnlhbmRleC5ydS8yLjEvP2xhbmc9cnVfUlUmYW1wO2xvYWRCeVJlcXVpcmU9MVwiLCBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgLy8g0JrQsNC6INGC0L7Qu9GM0LrQviBBUEkg0K/QvdC00LXQutGBLtCa0LDRgNGCINC30LDQs9GA0YPQt9C40LvQuNGB0YwsINGB0YDQsNC30YMg0YTQvtGA0LzQuNGA0YPQtdC8INC60LDRgNGC0YMg0Lgg0L/QvtC80LXRidCw0LXQvCDQsiDQsdC70L7QuiDRgSDQuNC00LXQvdGC0LjRhNC40LrQsNGC0L7RgNC+0LwgXCJtYXAteWFuZGV4XCJcclxuICAgICAgICAgICAgICAgICAgICB5bWFwcy5sb2FkKGluaXQpO1xyXG4gICAgICAgICAgICAgICAgfSk7XHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9XHJcbiAgICApO1xyXG59XHJcblxyXG4kKGZ1bmN0aW9uICgpIHtcclxuXHJcbiAgICAvL9CX0LDQv9GD0YHQutCw0LXQvCDQvtGB0L3QvtCy0L3Rg9GOINGE0YPQvdC60YbQuNGOXHJcbiAgICB5bWFwKCk7XHJcblxyXG59KTsiLCIvKlxyXG4gICAgalF1ZXJ5IE1hc2tlZCBJbnB1dCBQbHVnaW5cclxuICAgIENvcHlyaWdodCAoYykgMjAwNyAtIDIwMTUgSm9zaCBCdXNoIChkaWdpdGFsYnVzaC5jb20pXHJcbiAgICBMaWNlbnNlZCB1bmRlciB0aGUgTUlUIGxpY2Vuc2UgKGh0dHA6Ly9kaWdpdGFsYnVzaC5jb20vcHJvamVjdHMvbWFza2VkLWlucHV0LXBsdWdpbi8jbGljZW5zZSlcclxuICAgIFZlcnNpb246IDEuNC4xXHJcbiovXHJcbiFmdW5jdGlvbihhKXtcImZ1bmN0aW9uXCI9PXR5cGVvZiBkZWZpbmUmJmRlZmluZS5hbWQ/ZGVmaW5lKFtcImpxdWVyeVwiXSxhKTphKFwib2JqZWN0XCI9PXR5cGVvZiBleHBvcnRzP3JlcXVpcmUoXCJqcXVlcnlcIik6alF1ZXJ5KX0oZnVuY3Rpb24oYSl7dmFyIGIsYz1uYXZpZ2F0b3IudXNlckFnZW50LGQ9L2lwaG9uZS9pLnRlc3QoYyksZT0vY2hyb21lL2kudGVzdChjKSxmPS9hbmRyb2lkL2kudGVzdChjKTthLm1hc2s9e2RlZmluaXRpb25zOns5OlwiWzAtOV1cIixhOlwiW0EtWmEtel1cIixcIipcIjpcIltBLVphLXowLTldXCJ9LGF1dG9jbGVhcjohMCxkYXRhTmFtZTpcInJhd01hc2tGblwiLHBsYWNlaG9sZGVyOlwiX1wifSxhLmZuLmV4dGVuZCh7Y2FyZXQ6ZnVuY3Rpb24oYSxiKXt2YXIgYztpZigwIT09dGhpcy5sZW5ndGgmJiF0aGlzLmlzKFwiOmhpZGRlblwiKSlyZXR1cm5cIm51bWJlclwiPT10eXBlb2YgYT8oYj1cIm51bWJlclwiPT10eXBlb2YgYj9iOmEsdGhpcy5lYWNoKGZ1bmN0aW9uKCl7dGhpcy5zZXRTZWxlY3Rpb25SYW5nZT90aGlzLnNldFNlbGVjdGlvblJhbmdlKGEsYik6dGhpcy5jcmVhdGVUZXh0UmFuZ2UmJihjPXRoaXMuY3JlYXRlVGV4dFJhbmdlKCksYy5jb2xsYXBzZSghMCksYy5tb3ZlRW5kKFwiY2hhcmFjdGVyXCIsYiksYy5tb3ZlU3RhcnQoXCJjaGFyYWN0ZXJcIixhKSxjLnNlbGVjdCgpKX0pKToodGhpc1swXS5zZXRTZWxlY3Rpb25SYW5nZT8oYT10aGlzWzBdLnNlbGVjdGlvblN0YXJ0LGI9dGhpc1swXS5zZWxlY3Rpb25FbmQpOmRvY3VtZW50LnNlbGVjdGlvbiYmZG9jdW1lbnQuc2VsZWN0aW9uLmNyZWF0ZVJhbmdlJiYoYz1kb2N1bWVudC5zZWxlY3Rpb24uY3JlYXRlUmFuZ2UoKSxhPTAtYy5kdXBsaWNhdGUoKS5tb3ZlU3RhcnQoXCJjaGFyYWN0ZXJcIiwtMWU1KSxiPWErYy50ZXh0Lmxlbmd0aCkse2JlZ2luOmEsZW5kOmJ9KX0sdW5tYXNrOmZ1bmN0aW9uKCl7cmV0dXJuIHRoaXMudHJpZ2dlcihcInVubWFza1wiKX0sbWFzazpmdW5jdGlvbihjLGcpe3ZhciBoLGksaixrLGwsbSxuLG87aWYoIWMmJnRoaXMubGVuZ3RoPjApe2g9YSh0aGlzWzBdKTt2YXIgcD1oLmRhdGEoYS5tYXNrLmRhdGFOYW1lKTtyZXR1cm4gcD9wKCk6dm9pZCAwfXJldHVybiBnPWEuZXh0ZW5kKHthdXRvY2xlYXI6YS5tYXNrLmF1dG9jbGVhcixwbGFjZWhvbGRlcjphLm1hc2sucGxhY2Vob2xkZXIsY29tcGxldGVkOm51bGx9LGcpLGk9YS5tYXNrLmRlZmluaXRpb25zLGo9W10saz1uPWMubGVuZ3RoLGw9bnVsbCxhLmVhY2goYy5zcGxpdChcIlwiKSxmdW5jdGlvbihhLGIpe1wiP1wiPT1iPyhuLS0saz1hKTppW2JdPyhqLnB1c2gobmV3IFJlZ0V4cChpW2JdKSksbnVsbD09PWwmJihsPWoubGVuZ3RoLTEpLGs+YSYmKG09ai5sZW5ndGgtMSkpOmoucHVzaChudWxsKX0pLHRoaXMudHJpZ2dlcihcInVubWFza1wiKS5lYWNoKGZ1bmN0aW9uKCl7ZnVuY3Rpb24gaCgpe2lmKGcuY29tcGxldGVkKXtmb3IodmFyIGE9bDttPj1hO2ErKylpZihqW2FdJiZDW2FdPT09cChhKSlyZXR1cm47Zy5jb21wbGV0ZWQuY2FsbChCKX19ZnVuY3Rpb24gcChhKXtyZXR1cm4gZy5wbGFjZWhvbGRlci5jaGFyQXQoYTxnLnBsYWNlaG9sZGVyLmxlbmd0aD9hOjApfWZ1bmN0aW9uIHEoYSl7Zm9yKDsrK2E8biYmIWpbYV07KTtyZXR1cm4gYX1mdW5jdGlvbiByKGEpe2Zvcig7LS1hPj0wJiYhalthXTspO3JldHVybiBhfWZ1bmN0aW9uIHMoYSxiKXt2YXIgYyxkO2lmKCEoMD5hKSl7Zm9yKGM9YSxkPXEoYik7bj5jO2MrKylpZihqW2NdKXtpZighKG4+ZCYmaltjXS50ZXN0KENbZF0pKSlicmVhaztDW2NdPUNbZF0sQ1tkXT1wKGQpLGQ9cShkKX16KCksQi5jYXJldChNYXRoLm1heChsLGEpKX19ZnVuY3Rpb24gdChhKXt2YXIgYixjLGQsZTtmb3IoYj1hLGM9cChhKTtuPmI7YisrKWlmKGpbYl0pe2lmKGQ9cShiKSxlPUNbYl0sQ1tiXT1jLCEobj5kJiZqW2RdLnRlc3QoZSkpKWJyZWFrO2M9ZX19ZnVuY3Rpb24gdSgpe3ZhciBhPUIudmFsKCksYj1CLmNhcmV0KCk7aWYobyYmby5sZW5ndGgmJm8ubGVuZ3RoPmEubGVuZ3RoKXtmb3IoQSghMCk7Yi5iZWdpbj4wJiYhaltiLmJlZ2luLTFdOyliLmJlZ2luLS07aWYoMD09PWIuYmVnaW4pZm9yKDtiLmJlZ2luPGwmJiFqW2IuYmVnaW5dOyliLmJlZ2luKys7Qi5jYXJldChiLmJlZ2luLGIuYmVnaW4pfWVsc2V7Zm9yKEEoITApO2IuYmVnaW48biYmIWpbYi5iZWdpbl07KWIuYmVnaW4rKztCLmNhcmV0KGIuYmVnaW4sYi5iZWdpbil9aCgpfWZ1bmN0aW9uIHYoKXtBKCksQi52YWwoKSE9RSYmQi5jaGFuZ2UoKX1mdW5jdGlvbiB3KGEpe2lmKCFCLnByb3AoXCJyZWFkb25seVwiKSl7dmFyIGIsYyxlLGY9YS53aGljaHx8YS5rZXlDb2RlO289Qi52YWwoKSw4PT09Znx8NDY9PT1mfHxkJiYxMjc9PT1mPyhiPUIuY2FyZXQoKSxjPWIuYmVnaW4sZT1iLmVuZCxlLWM9PT0wJiYoYz00NiE9PWY/cihjKTplPXEoYy0xKSxlPTQ2PT09Zj9xKGUpOmUpLHkoYyxlKSxzKGMsZS0xKSxhLnByZXZlbnREZWZhdWx0KCkpOjEzPT09Zj92LmNhbGwodGhpcyxhKToyNz09PWYmJihCLnZhbChFKSxCLmNhcmV0KDAsQSgpKSxhLnByZXZlbnREZWZhdWx0KCkpfX1mdW5jdGlvbiB4KGIpe2lmKCFCLnByb3AoXCJyZWFkb25seVwiKSl7dmFyIGMsZCxlLGc9Yi53aGljaHx8Yi5rZXlDb2RlLGk9Qi5jYXJldCgpO2lmKCEoYi5jdHJsS2V5fHxiLmFsdEtleXx8Yi5tZXRhS2V5fHwzMj5nKSYmZyYmMTMhPT1nKXtpZihpLmVuZC1pLmJlZ2luIT09MCYmKHkoaS5iZWdpbixpLmVuZCkscyhpLmJlZ2luLGkuZW5kLTEpKSxjPXEoaS5iZWdpbi0xKSxuPmMmJihkPVN0cmluZy5mcm9tQ2hhckNvZGUoZyksaltjXS50ZXN0KGQpKSl7aWYodChjKSxDW2NdPWQseigpLGU9cShjKSxmKXt2YXIgaz1mdW5jdGlvbigpe2EucHJveHkoYS5mbi5jYXJldCxCLGUpKCl9O3NldFRpbWVvdXQoaywwKX1lbHNlIEIuY2FyZXQoZSk7aS5iZWdpbjw9bSYmaCgpfWIucHJldmVudERlZmF1bHQoKX19fWZ1bmN0aW9uIHkoYSxiKXt2YXIgYztmb3IoYz1hO2I+YyYmbj5jO2MrKylqW2NdJiYoQ1tjXT1wKGMpKX1mdW5jdGlvbiB6KCl7Qi52YWwoQy5qb2luKFwiXCIpKX1mdW5jdGlvbiBBKGEpe3ZhciBiLGMsZCxlPUIudmFsKCksZj0tMTtmb3IoYj0wLGQ9MDtuPmI7YisrKWlmKGpbYl0pe2ZvcihDW2JdPXAoYik7ZCsrPGUubGVuZ3RoOylpZihjPWUuY2hhckF0KGQtMSksaltiXS50ZXN0KGMpKXtDW2JdPWMsZj1iO2JyZWFrfWlmKGQ+ZS5sZW5ndGgpe3koYisxLG4pO2JyZWFrfX1lbHNlIENbYl09PT1lLmNoYXJBdChkKSYmZCsrLGs+YiYmKGY9Yik7cmV0dXJuIGE/eigpOms+ZisxP2cuYXV0b2NsZWFyfHxDLmpvaW4oXCJcIik9PT1EPyhCLnZhbCgpJiZCLnZhbChcIlwiKSx5KDAsbikpOnooKTooeigpLEIudmFsKEIudmFsKCkuc3Vic3RyaW5nKDAsZisxKSkpLGs/YjpsfXZhciBCPWEodGhpcyksQz1hLm1hcChjLnNwbGl0KFwiXCIpLGZ1bmN0aW9uKGEsYil7cmV0dXJuXCI/XCIhPWE/aVthXT9wKGIpOmE6dm9pZCAwfSksRD1DLmpvaW4oXCJcIiksRT1CLnZhbCgpO0IuZGF0YShhLm1hc2suZGF0YU5hbWUsZnVuY3Rpb24oKXtyZXR1cm4gYS5tYXAoQyxmdW5jdGlvbihhLGIpe3JldHVybiBqW2JdJiZhIT1wKGIpP2E6bnVsbH0pLmpvaW4oXCJcIil9KSxCLm9uZShcInVubWFza1wiLGZ1bmN0aW9uKCl7Qi5vZmYoXCIubWFza1wiKS5yZW1vdmVEYXRhKGEubWFzay5kYXRhTmFtZSl9KS5vbihcImZvY3VzLm1hc2tcIixmdW5jdGlvbigpe2lmKCFCLnByb3AoXCJyZWFkb25seVwiKSl7Y2xlYXJUaW1lb3V0KGIpO3ZhciBhO0U9Qi52YWwoKSxhPUEoKSxiPXNldFRpbWVvdXQoZnVuY3Rpb24oKXtCLmdldCgwKT09PWRvY3VtZW50LmFjdGl2ZUVsZW1lbnQmJih6KCksYT09Yy5yZXBsYWNlKFwiP1wiLFwiXCIpLmxlbmd0aD9CLmNhcmV0KDAsYSk6Qi5jYXJldChhKSl9LDEwKX19KS5vbihcImJsdXIubWFza1wiLHYpLm9uKFwia2V5ZG93bi5tYXNrXCIsdykub24oXCJrZXlwcmVzcy5tYXNrXCIseCkub24oXCJpbnB1dC5tYXNrIHBhc3RlLm1hc2tcIixmdW5jdGlvbigpe0IucHJvcChcInJlYWRvbmx5XCIpfHxzZXRUaW1lb3V0KGZ1bmN0aW9uKCl7dmFyIGE9QSghMCk7Qi5jYXJldChhKSxoKCl9LDApfSksZSYmZiYmQi5vZmYoXCJpbnB1dC5tYXNrXCIpLm9uKFwiaW5wdXQubWFza1wiLHUpLEEoKX0pfX0pfSk7IiwiaW1wb3J0ICcuL2xhenlfeW91dHViZS5zY3NzJ1xyXG5cclxuKCBmdW5jdGlvbigpIHtcclxuXHRjb25zdCB5b3V0dWJlID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbChcIi55b3V0dWJlXCIpO1xyXG5cdGZvciAobGV0IGkgPSAwOyBpIDwgeW91dHViZS5sZW5ndGg7IGkrKykge1xyXG5cdFx0Y29uc3Qgc291cmNlID0gXCJodHRwczovL2kueXRpbWcuY29tL3ZpL1wiICsgeW91dHViZVtpXS5kYXRhc2V0LmVtYmVkICsgXCIvaHFkZWZhdWx0LmpwZ1wiO1xyXG5cdFx0Y29uc3QgaW1hZ2UgPSBuZXcgSW1hZ2UoKTtcclxuXHRcdGltYWdlLnNyYyA9IHNvdXJjZTtcclxuXHRcdGltYWdlLmFkZEV2ZW50TGlzdGVuZXIoIFwibG9hZFwiLCBmdW5jdGlvbigpIHtcclxuXHRcdFx0eW91dHViZVsgaSBdLmFwcGVuZENoaWxkKCBpbWFnZSApO1xyXG5cdFx0fSggaSApICk7XHJcblx0XHRcclxuXHRcdHlvdXR1YmVbaV0uYWRkRXZlbnRMaXN0ZW5lciggXCJjbGlja1wiLCBmdW5jdGlvbigpIHtcclxuXHRcdFx0Y29uc3QgaWZyYW1lID0gZG9jdW1lbnQuY3JlYXRlRWxlbWVudChcImlmcmFtZVwiKTtcclxuXHRcdFx0aWZyYW1lLnNldEF0dHJpYnV0ZSggXCJmcmFtZWJvcmRlclwiLCBcIjBcIiApO1xyXG5cdFx0XHRpZnJhbWUuc2V0QXR0cmlidXRlKCBcImFsbG93ZnVsbHNjcmVlblwiLCBcIlwiICk7XHJcblx0XHRcdGlmcmFtZS5zZXRBdHRyaWJ1dGUoIFwic3JjXCIsIFwiaHR0cHM6Ly93d3cueW91dHViZS5jb20vZW1iZWQvXCIrIHRoaXMuZGF0YXNldC5lbWJlZCArXCI/cmVsPTAmc2hvd2luZm89MCZhdXRvcGxheT0xXCIgKTtcclxuXHRcdFx0dGhpcy5pbm5lckhUTUwgPSBcIlwiO1xyXG5cdFx0XHR0aGlzLmFwcGVuZENoaWxkKCBpZnJhbWUgKTtcclxuXHRcdH0gKTtcclxuXHR9XHJcbn0gKSgpOyIsIi8vIGV4dHJhY3RlZCBieSBtaW5pLWNzcy1leHRyYWN0LXBsdWdpbiIsImZ1bmN0aW9uIF9leHRlbmRzKCl7cmV0dXJuKF9leHRlbmRzPU9iamVjdC5hc3NpZ258fGZ1bmN0aW9uKHQpe2Zvcih2YXIgZT0xO2U8YXJndW1lbnRzLmxlbmd0aDtlKyspe3ZhciBuPWFyZ3VtZW50c1tlXTtmb3IodmFyIG8gaW4gbilPYmplY3QucHJvdG90eXBlLmhhc093blByb3BlcnR5LmNhbGwobixvKSYmKHRbb109bltvXSl9cmV0dXJuIHR9KS5hcHBseSh0aGlzLGFyZ3VtZW50cyl9ZnVuY3Rpb24gX3R5cGVvZih0KXtyZXR1cm4oX3R5cGVvZj1cImZ1bmN0aW9uXCI9PXR5cGVvZiBTeW1ib2wmJlwic3ltYm9sXCI9PXR5cGVvZiBTeW1ib2wuaXRlcmF0b3I/ZnVuY3Rpb24odCl7cmV0dXJuIHR5cGVvZiB0fTpmdW5jdGlvbih0KXtyZXR1cm4gdCYmXCJmdW5jdGlvblwiPT10eXBlb2YgU3ltYm9sJiZ0LmNvbnN0cnVjdG9yPT09U3ltYm9sJiZ0IT09U3ltYm9sLnByb3RvdHlwZT9cInN5bWJvbFwiOnR5cGVvZiB0fSkodCl9IWZ1bmN0aW9uKHQsZSl7XCJvYmplY3RcIj09PShcInVuZGVmaW5lZFwiPT10eXBlb2YgZXhwb3J0cz9cInVuZGVmaW5lZFwiOl90eXBlb2YoZXhwb3J0cykpJiZcInVuZGVmaW5lZFwiIT10eXBlb2YgbW9kdWxlP21vZHVsZS5leHBvcnRzPWUoKTpcImZ1bmN0aW9uXCI9PXR5cGVvZiBkZWZpbmUmJmRlZmluZS5hbWQ/ZGVmaW5lKGUpOnQuTGF6eUxvYWQ9ZSgpfSh0aGlzLGZ1bmN0aW9uKCl7XCJ1c2Ugc3RyaWN0XCI7dmFyIHQ9XCJ1bmRlZmluZWRcIiE9dHlwZW9mIHdpbmRvdyxlPXQmJiEoXCJvbnNjcm9sbFwiaW4gd2luZG93KXx8XCJ1bmRlZmluZWRcIiE9dHlwZW9mIG5hdmlnYXRvciYmLyhnbGV8aW5nfHJvKWJvdHxjcmF3bHxzcGlkZXIvaS50ZXN0KG5hdmlnYXRvci51c2VyQWdlbnQpLG49dCYmXCJJbnRlcnNlY3Rpb25PYnNlcnZlclwiaW4gd2luZG93LG89dCYmXCJjbGFzc0xpc3RcImluIGRvY3VtZW50LmNyZWF0ZUVsZW1lbnQoXCJwXCIpLHI9e2VsZW1lbnRzX3NlbGVjdG9yOlwiaW1nXCIsY29udGFpbmVyOmV8fHQ/ZG9jdW1lbnQ6bnVsbCx0aHJlc2hvbGQ6MzAwLHRocmVzaG9sZHM6bnVsbCxkYXRhX3NyYzpcInNyY1wiLGRhdGFfc3Jjc2V0Olwic3Jjc2V0XCIsZGF0YV9zaXplczpcInNpemVzXCIsZGF0YV9iZzpcImJnXCIsY2xhc3NfbG9hZGluZzpcImxvYWRpbmdcIixjbGFzc19sb2FkZWQ6XCJsb2FkZWRcIixjbGFzc19lcnJvcjpcImVycm9yXCIsbG9hZF9kZWxheTowLGF1dG9fdW5vYnNlcnZlOiEwLGNhbGxiYWNrX2VudGVyOm51bGwsY2FsbGJhY2tfZXhpdDpudWxsLGNhbGxiYWNrX3JldmVhbDpudWxsLGNhbGxiYWNrX2xvYWRlZDpudWxsLGNhbGxiYWNrX2Vycm9yOm51bGwsY2FsbGJhY2tfZmluaXNoOm51bGwsdXNlX25hdGl2ZTohMX0sYT1mdW5jdGlvbih0LGUpe3ZhciBuLG89bmV3IHQoZSk7dHJ5e249bmV3IEN1c3RvbUV2ZW50KFwiTGF6eUxvYWQ6OkluaXRpYWxpemVkXCIse2RldGFpbDp7aW5zdGFuY2U6b319KX1jYXRjaCh0KXsobj1kb2N1bWVudC5jcmVhdGVFdmVudChcIkN1c3RvbUV2ZW50XCIpKS5pbml0Q3VzdG9tRXZlbnQoXCJMYXp5TG9hZDo6SW5pdGlhbGl6ZWRcIiwhMSwhMSx7aW5zdGFuY2U6b30pfXdpbmRvdy5kaXNwYXRjaEV2ZW50KG4pfTt2YXIgaT1mdW5jdGlvbih0LGUpe3JldHVybiB0LmdldEF0dHJpYnV0ZShcImRhdGEtXCIrZSl9LHM9ZnVuY3Rpb24odCxlLG4pe3ZhciBvPVwiZGF0YS1cIitlO251bGwhPT1uP3Quc2V0QXR0cmlidXRlKG8sbik6dC5yZW1vdmVBdHRyaWJ1dGUobyl9LGM9ZnVuY3Rpb24odCl7cmV0dXJuXCJ0cnVlXCI9PT1pKHQsXCJ3YXMtcHJvY2Vzc2VkXCIpfSxsPWZ1bmN0aW9uKHQsZSl7cmV0dXJuIHModCxcImxsLXRpbWVvdXRcIixlKX0sdT1mdW5jdGlvbih0KXtyZXR1cm4gaSh0LFwibGwtdGltZW91dFwiKX0sZD1mdW5jdGlvbih0LGUpe3QmJnQoZSl9LGY9ZnVuY3Rpb24odCxlKXt0Ll9sb2FkaW5nQ291bnQrPWUsMD09PXQuX2VsZW1lbnRzLmxlbmd0aCYmMD09PXQuX2xvYWRpbmdDb3VudCYmZCh0Ll9zZXR0aW5ncy5jYWxsYmFja19maW5pc2gpfSxfPWZ1bmN0aW9uKHQpe2Zvcih2YXIgZSxuPVtdLG89MDtlPXQuY2hpbGRyZW5bb107bys9MSlcIlNPVVJDRVwiPT09ZS50YWdOYW1lJiZuLnB1c2goZSk7cmV0dXJuIG59LHY9ZnVuY3Rpb24odCxlLG4pe24mJnQuc2V0QXR0cmlidXRlKGUsbil9LGc9ZnVuY3Rpb24odCxlKXt2KHQsXCJzaXplc1wiLGkodCxlLmRhdGFfc2l6ZXMpKSx2KHQsXCJzcmNzZXRcIixpKHQsZS5kYXRhX3NyY3NldCkpLHYodCxcInNyY1wiLGkodCxlLmRhdGFfc3JjKSl9LG09e0lNRzpmdW5jdGlvbih0LGUpe3ZhciBuPXQucGFyZW50Tm9kZTtuJiZcIlBJQ1RVUkVcIj09PW4udGFnTmFtZSYmXyhuKS5mb3JFYWNoKGZ1bmN0aW9uKHQpe2codCxlKX0pO2codCxlKX0sSUZSQU1FOmZ1bmN0aW9uKHQsZSl7dih0LFwic3JjXCIsaSh0LGUuZGF0YV9zcmMpKX0sVklERU86ZnVuY3Rpb24odCxlKXtfKHQpLmZvckVhY2goZnVuY3Rpb24odCl7dih0LFwic3JjXCIsaSh0LGUuZGF0YV9zcmMpKX0pLHYodCxcInNyY1wiLGkodCxlLmRhdGFfc3JjKSksdC5sb2FkKCl9fSxiPWZ1bmN0aW9uKHQsZSl7dmFyIG4sbyxyPWUuX3NldHRpbmdzLGE9dC50YWdOYW1lLHM9bVthXTtpZihzKXJldHVybiBzKHQsciksZihlLDEpLHZvaWQoZS5fZWxlbWVudHM9KG49ZS5fZWxlbWVudHMsbz10LG4uZmlsdGVyKGZ1bmN0aW9uKHQpe3JldHVybiB0IT09b30pKSk7IWZ1bmN0aW9uKHQsZSl7dmFyIG49aSh0LGUuZGF0YV9zcmMpLG89aSh0LGUuZGF0YV9iZyk7biYmKHQuc3R5bGUuYmFja2dyb3VuZEltYWdlPSd1cmwoXCInLmNvbmNhdChuLCdcIiknKSksbyYmKHQuc3R5bGUuYmFja2dyb3VuZEltYWdlPW8pfSh0LHIpfSxoPWZ1bmN0aW9uKHQsZSl7bz90LmNsYXNzTGlzdC5hZGQoZSk6dC5jbGFzc05hbWUrPSh0LmNsYXNzTmFtZT9cIiBcIjpcIlwiKStlfSxwPWZ1bmN0aW9uKHQsZSxuKXt0LmFkZEV2ZW50TGlzdGVuZXIoZSxuKX0seT1mdW5jdGlvbih0LGUsbil7dC5yZW1vdmVFdmVudExpc3RlbmVyKGUsbil9LEU9ZnVuY3Rpb24odCxlLG4pe3kodCxcImxvYWRcIixlKSx5KHQsXCJsb2FkZWRkYXRhXCIsZSkseSh0LFwiZXJyb3JcIixuKX0sdz1mdW5jdGlvbih0LGUsbil7dmFyIHI9bi5fc2V0dGluZ3MsYT1lP3IuY2xhc3NfbG9hZGVkOnIuY2xhc3NfZXJyb3IsaT1lP3IuY2FsbGJhY2tfbG9hZGVkOnIuY2FsbGJhY2tfZXJyb3Iscz10LnRhcmdldDshZnVuY3Rpb24odCxlKXtvP3QuY2xhc3NMaXN0LnJlbW92ZShlKTp0LmNsYXNzTmFtZT10LmNsYXNzTmFtZS5yZXBsYWNlKG5ldyBSZWdFeHAoXCIoXnxcXFxccyspXCIrZStcIihcXFxccyt8JClcIiksXCIgXCIpLnJlcGxhY2UoL15cXHMrLyxcIlwiKS5yZXBsYWNlKC9cXHMrJC8sXCJcIil9KHMsci5jbGFzc19sb2FkaW5nKSxoKHMsYSksZChpLHMpLGYobiwtMSl9LEk9ZnVuY3Rpb24odCxlKXt2YXIgbj1mdW5jdGlvbiBuKHIpe3cociwhMCxlKSxFKHQsbixvKX0sbz1mdW5jdGlvbiBvKHIpe3cociwhMSxlKSxFKHQsbixvKX07IWZ1bmN0aW9uKHQsZSxuKXtwKHQsXCJsb2FkXCIsZSkscCh0LFwibG9hZGVkZGF0YVwiLGUpLHAodCxcImVycm9yXCIsbil9KHQsbixvKX0saz1bXCJJTUdcIixcIklGUkFNRVwiLFwiVklERU9cIl0sQT1mdW5jdGlvbih0LGUpe3ZhciBuPWUuX29ic2VydmVyO3oodCxlKSxuJiZlLl9zZXR0aW5ncy5hdXRvX3Vub2JzZXJ2ZSYmbi51bm9ic2VydmUodCl9LEw9ZnVuY3Rpb24odCl7dmFyIGU9dSh0KTtlJiYoY2xlYXJUaW1lb3V0KGUpLGwodCxudWxsKSl9LHg9ZnVuY3Rpb24odCxlKXt2YXIgbj1lLl9zZXR0aW5ncy5sb2FkX2RlbGF5LG89dSh0KTtvfHwobz1zZXRUaW1lb3V0KGZ1bmN0aW9uKCl7QSh0LGUpLEwodCl9LG4pLGwodCxvKSl9LHo9ZnVuY3Rpb24odCxlLG4pe3ZhciBvPWUuX3NldHRpbmdzOyFuJiZjKHQpfHwoay5pbmRleE9mKHQudGFnTmFtZSk+LTEmJihJKHQsZSksaCh0LG8uY2xhc3NfbG9hZGluZykpLGIodCxlKSxmdW5jdGlvbih0KXtzKHQsXCJ3YXMtcHJvY2Vzc2VkXCIsXCJ0cnVlXCIpfSh0KSxkKG8uY2FsbGJhY2tfcmV2ZWFsLHQpLGQoby5jYWxsYmFja19zZXQsdCkpfSxPPWZ1bmN0aW9uKHQpe3JldHVybiEhbiYmKHQuX29ic2VydmVyPW5ldyBJbnRlcnNlY3Rpb25PYnNlcnZlcihmdW5jdGlvbihlKXtlLmZvckVhY2goZnVuY3Rpb24oZSl7cmV0dXJuIGZ1bmN0aW9uKHQpe3JldHVybiB0LmlzSW50ZXJzZWN0aW5nfHx0LmludGVyc2VjdGlvblJhdGlvPjB9KGUpP2Z1bmN0aW9uKHQsZSl7dmFyIG49ZS5fc2V0dGluZ3M7ZChuLmNhbGxiYWNrX2VudGVyLHQpLG4ubG9hZF9kZWxheT94KHQsZSk6QSh0LGUpfShlLnRhcmdldCx0KTpmdW5jdGlvbih0LGUpe3ZhciBuPWUuX3NldHRpbmdzO2Qobi5jYWxsYmFja19leGl0LHQpLG4ubG9hZF9kZWxheSYmTCh0KX0oZS50YXJnZXQsdCl9KX0se3Jvb3Q6KGU9dC5fc2V0dGluZ3MpLmNvbnRhaW5lcj09PWRvY3VtZW50P251bGw6ZS5jb250YWluZXIscm9vdE1hcmdpbjplLnRocmVzaG9sZHN8fGUudGhyZXNob2xkK1wicHhcIn0pLCEwKTt2YXIgZX0sTj1bXCJJTUdcIixcIklGUkFNRVwiXSxDPWZ1bmN0aW9uKHQsZSl7cmV0dXJuIGZ1bmN0aW9uKHQpe3JldHVybiB0LmZpbHRlcihmdW5jdGlvbih0KXtyZXR1cm4hYyh0KX0pfSgobj10fHxmdW5jdGlvbih0KXtyZXR1cm4gdC5jb250YWluZXIucXVlcnlTZWxlY3RvckFsbCh0LmVsZW1lbnRzX3NlbGVjdG9yKX0oZSksQXJyYXkucHJvdG90eXBlLnNsaWNlLmNhbGwobikpKTt2YXIgbn0sTT1mdW5jdGlvbih0LGUpe3RoaXMuX3NldHRpbmdzPWZ1bmN0aW9uKHQpe3JldHVybiBfZXh0ZW5kcyh7fSxyLHQpfSh0KSx0aGlzLl9sb2FkaW5nQ291bnQ9MCxPKHRoaXMpLHRoaXMudXBkYXRlKGUpfTtyZXR1cm4gTS5wcm90b3R5cGU9e3VwZGF0ZTpmdW5jdGlvbih0KXt2YXIgbixvPXRoaXMscj10aGlzLl9zZXR0aW5nczsodGhpcy5fZWxlbWVudHM9Qyh0LHIpLCFlJiZ0aGlzLl9vYnNlcnZlcik/KGZ1bmN0aW9uKHQpe3JldHVybiB0LnVzZV9uYXRpdmUmJlwibG9hZGluZ1wiaW4gSFRNTEltYWdlRWxlbWVudC5wcm90b3R5cGV9KHIpJiYoKG49dGhpcykuX2VsZW1lbnRzLmZvckVhY2goZnVuY3Rpb24odCl7LTEhPT1OLmluZGV4T2YodC50YWdOYW1lKSYmKHQuc2V0QXR0cmlidXRlKFwibG9hZGluZ1wiLFwibGF6eVwiKSx6KHQsbikpfSksdGhpcy5fZWxlbWVudHM9Qyh0LHIpKSx0aGlzLl9lbGVtZW50cy5mb3JFYWNoKGZ1bmN0aW9uKHQpe28uX29ic2VydmVyLm9ic2VydmUodCl9KSk6dGhpcy5sb2FkQWxsKCl9LGRlc3Ryb3k6ZnVuY3Rpb24oKXt2YXIgdD10aGlzO3RoaXMuX29ic2VydmVyJiYodGhpcy5fZWxlbWVudHMuZm9yRWFjaChmdW5jdGlvbihlKXt0Ll9vYnNlcnZlci51bm9ic2VydmUoZSl9KSx0aGlzLl9vYnNlcnZlcj1udWxsKSx0aGlzLl9lbGVtZW50cz1udWxsLHRoaXMuX3NldHRpbmdzPW51bGx9LGxvYWQ6ZnVuY3Rpb24odCxlKXt6KHQsdGhpcyxlKX0sbG9hZEFsbDpmdW5jdGlvbigpe3ZhciB0PXRoaXM7dGhpcy5fZWxlbWVudHMuZm9yRWFjaChmdW5jdGlvbihlKXtBKGUsdCl9KX19LHQmJmZ1bmN0aW9uKHQsZSl7aWYoZSlpZihlLmxlbmd0aClmb3IodmFyIG4sbz0wO249ZVtvXTtvKz0xKWEodCxuKTtlbHNlIGEodCxlKX0oTSx3aW5kb3cubGF6eUxvYWRPcHRpb25zKSxNfSk7IiwiLy8gZXh0cmFjdGVkIGJ5IG1pbmktY3NzLWV4dHJhY3QtcGx1Z2luIiwiaW1wb3J0ICQgZnJvbSAnanF1ZXJ5JztcclxuaW1wb3J0IFN3aXBlciBmcm9tICdzd2lwZXInO1xyXG5pbXBvcnQgJy4vc3dpcGVyLnNjc3MnO1xyXG5cclxuJChkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24gKCkge1xyXG4gICAgbmV3IFN3aXBlcignLnN3aXBlci1jb250YWluZXInLCB7XHJcbiAgICAgICAgZWZmZWN0OiAnY292ZXJmbG93JyxcclxuICAgICAgICBncmFiQ3Vyc29yOiB0cnVlLFxyXG4gICAgICAgIGNlbnRlcmVkU2xpZGVzOiB0cnVlLFxyXG4gICAgICAgIHNsaWRlc1BlclZpZXc6IDEsXHJcbiAgICAgICAgbG9vcDogdHJ1ZSxcclxuICAgICAgICAvLyBEaXNhYmxlIHByZWxvYWRpbmcgb2YgYWxsIGltYWdlc1xyXG4gICAgICAgIHByZWxvYWRJbWFnZXM6IGZhbHNlLFxyXG4gICAgICAgIC8vIEVuYWJsZSBsYXp5IGxvYWRpbmdcclxuICAgICAgICBsYXp5OiB7XHJcbiAgICAgICAgICAgIGxvYWRQcmV2TmV4dDogdHJ1ZSwvL9C30LDQs9GA0YPQt9C60LAg0L3QtdGB0LrQvtC70YzQutC40YUg0YHQu9Cw0LnQtNC+0LIg0LLQu9C10LLQviDQuCDQstC/0YDQsNCy0L5cclxuICAgICAgICAgICAgbG9hZFByZXZOZXh0QW1vdW50OiAzLy/QmtC+0LvQuNGH0LXRgdGC0LLQviDRgdC70LDQudC00L7QsiDQtNC70Y8g0L/RgNC10LTQt9Cw0LPRgNGD0LfQutC4XHJcbiAgICAgICAgfSxcclxuICAgICAgICB3YXRjaFNsaWRlc1Zpc2liaWxpdHk6IHRydWUsXHJcbiAgICAgICAgY292ZXJmbG93RWZmZWN0OiB7XHJcbiAgICAgICAgICAgIHJvdGF0ZTogNjAsXHJcbiAgICAgICAgICAgIHN0cmV0Y2g6IDAsXHJcbiAgICAgICAgICAgIGRlcHRoOiAxMDAsXHJcbiAgICAgICAgICAgIG1vZGlmaWVyOiAxLFxyXG4gICAgICAgICAgICBzbGlkZVNoYWRvd3M6IHRydWUsXHJcbiAgICAgICAgfSxcclxuICAgICAgICBwYWdpbmF0aW9uOiB7XHJcbiAgICAgICAgICAgIGVsOiAnLm91cl93b3JrcyAuc3dpcGVyLXBhZ2luYXRpb24nLFxyXG4gICAgICAgIH0sXHJcbiAgICAgICAgLy8gTmF2aWdhdGlvbiBhcnJvd3NcclxuICAgICAgICBuYXZpZ2F0aW9uOiB7XHJcbiAgICAgICAgICAgIG5leHRFbDogJy5vdXJfd29ya3MgLnN3aXBlci1idXR0b24tbmV4dCcsXHJcbiAgICAgICAgICAgIHByZXZFbDogJy5vdXJfd29ya3MgLnN3aXBlci1idXR0b24tcHJldicsXHJcbiAgICAgICAgfSxcclxuICAgICAgICBicmVha3BvaW50czoge1xyXG4gICAgICAgICAgICAvLyB3aGVuIHdpbmRvdyB3aWR0aCBpcyA+PSAzMjBweFxyXG4gICAgICAgICAgICAzMjA6IHtcclxuICAgICAgICAgICAgICAgIHNsaWRlc1BlclZpZXc6IDFcclxuICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgLy8gd2hlbiB3aW5kb3cgd2lkdGggaXMgPj0gNDgwcHhcclxuICAgICAgICAgICAgNDgwOiB7XHJcbiAgICAgICAgICAgICAgICBzbGlkZXNQZXJWaWV3OiAxXHJcbiAgICAgICAgICAgIH0sXHJcbiAgICAgICAgICAgIC8vIHdoZW4gd2luZG93IHdpZHRoIGlzID49IDY0MHB4XHJcbiAgICAgICAgICAgIDY0MDoge1xyXG4gICAgICAgICAgICAgICAgc2xpZGVzUGVyVmlldzogMixcclxuICAgICAgICAgICAgfSxcclxuICAgICAgICAgICAgLy8gd2hlbiB3aW5kb3cgd2lkdGggaXMgPj0gNjQwcHhcclxuICAgICAgICAgICAgNzY4OiB7XHJcbiAgICAgICAgICAgICAgICBzbGlkZXNQZXJWaWV3OiAzLFxyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfVxyXG4gICAgfSk7XHJcbn0pOyJdLCJzb3VyY2VSb290IjoiIn0=