//Переменная для включения/отключения индикатора загрузки
var spinner = $('.ymap-container').children('.loader');
//Переменная для определения была ли хоть раз загружена Яндекс.Карта (чтобы избежать повторной загрузки при наведении)
var check_if_load = false;

//Функция создания карты сайта и затем вставки ее в блок с идентификатором "map-yandex"
function init() {
    var myMapTemp = new ymaps.Map("map-yandex", {
        center: [55.730138, 37.594238], // координаты центра на карте
        zoom: 10, // коэффициент приближения карты
        controls: ['zoomControl', 'fullscreenControl'] // выбираем только те функции, которые необходимы при использовании
    });

    var myPlacemark  = new ymaps.Placemark([55.892144, 37.524160], {balloonContent: '<strong>Лобненская, 17 стр.5</strong><br><br><center class="popup-call text-block__reviews-link">+7 (499) 450-73-83</center><br>', }, {iconLayout: 'default#image', iconImageSize: [40, 40], iconImageHref: '/img/map-baloon.png'});
    var myPlacemark2 = new ymaps.Placemark([55.655718, 37.553078], {balloonContent: '<strong>Научный проезд ул. 14а с. 7</strong><br><br><center class="popup-call text-block__reviews-link">+7 (495) 477-33-96</center><br>', }, {iconLayout: 'default#image', iconImageSize: [40, 40], iconImageHref: '/img/map-baloon.png'});
    var myPlacemark3 = new ymaps.Placemark([55.635345, 37.543578], {balloonContent: '<strong>Севастопольский пр-т, 95 с.3</strong><br><br><center class="popup-call text-block__reviews-link">+7 (499) 444-14-37</center><br>', }, {iconLayout: 'default#image', iconImageSize: [40, 40], iconImageHref: '/img/map-baloon.png'});
    var myPlacemark4 = new ymaps.Placemark([55.687766, 37.488125], {balloonContent: '<strong>Удальцова, д.60 стр.7</strong><br><br><center class="popup-call text-block__reviews-link">+7 (499) 444-14-37</center><br>', }, {iconLayout: 'default#image', iconImageSize: [40, 40], iconImageHref: '/img/map-baloon.png'});

    myMapTemp.geoObjects.add(myPlacemark); // помещаем флажок на карту
    myMapTemp.geoObjects.add(myPlacemark2); // помещаем флажок на карту
    myMapTemp.geoObjects.add(myPlacemark3); // помещаем флажок на карту
    myMapTemp.geoObjects.add(myPlacemark4); // помещаем флажок на карту

    // Получаем первый экземпляр коллекции слоев, потом первый слой коллекции
    var layer = myMapTemp.layers.get(0).get(0);

    // Решение по callback-у для определния полной загрузки карты
    waitForTilesLoad(layer).then(function () {
        // Скрываем индикатор загрузки после полной загрузки карты
        spinner.removeClass('is-active');
    });
}

// Функция для определения полной загрузки карты (на самом деле проверяется загрузка тайлов)
function waitForTilesLoad(layer) {
    return new ymaps.vow.Promise(function (resolve, reject) {
        var tc = getTileContainer(layer), readyAll = true;
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
            if (
                layer[k] instanceof ymaps.layer.tileContainer.CanvasContainer
                || layer[k] instanceof ymaps.layer.tileContainer.DomContainer
            ) {
                return layer[k];
            }
        }
    }
    return null;
}

// Функция загрузки API Яндекс.Карт по требованию (в нашем случае при наведении)
function loadScript(url, callback) {
    var script = document.createElement("script");

    if (script.readyState) {  // IE
        script.onreadystatechange = function () {
            if (script.readyState == "loaded" ||
                script.readyState == "complete") {
                script.onreadystatechange = null;
                callback();
            }
        };
    } else {  // Другие браузеры
        script.onload = function () {
            callback();
        };
    }

    script.src = url;
    document.getElementsByTagName("head")[0].appendChild(script);
}

// Основная функция, которая проверяет когда мы навели на блок с классом "ymap-container"
var ymap = function () {
    $('.ymap-container').mouseenter(function () {
            if (!check_if_load) { // проверяем первый ли раз загружается Яндекс.Карта, если да, то загружаем

                // Чтобы не было повторной загрузки карты, мы изменяем значение переменной
                check_if_load = true;

                // Показываем индикатор загрузки до тех пор, пока карта не загрузится
                spinner.addClass('is-active');

                // Загружаем API Яндекс.Карт
                loadScript("https://api-maps.yandex.ru/2.1/?lang=ru_RU&amp;loadByRequire=1", function () {
                    // Как только API Яндекс.Карт загрузились, сразу формируем карту и помещаем в блок с идентификатором "map-yandex"
                    ymaps.load(init);
                });
            }
        }
    );
}

$(function () {

    //Запускаем основную функцию
    ymap();
    console.log('yamap works');
});