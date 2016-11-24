$(function() {
    var gmap = $("#map-canvas")
    .gmap3({
        //address: '大阪府大阪市西区新町１丁目２８−１１',
        center:[34.675845, 135.493676],
        zoom: 18,
        navigationControl: true,
        mapTypeControl: true,
        scaleControl: true
    });
    gmap.marker({
        position:[34.675845, 135.493676],
        title: '本社安川ビル'
    })
    .then(function (marker) {
        marker.addListener('click', function() {
            new google.maps.InfoWindow({
                content: '<div class="infoWindowWrapper"><h4>本社</h4><p>エクストランス</p></div>'
            }).open(marker.getMap(), marker);
        });
    });
    gmap.marker({
        position:[34.6770583, 135.4938319],
        title: '石田',
    })
    .then(function (marker) {
        marker.addListener('click', function() {
            new google.maps.InfoWindow({
                content: '<div class="infoWindowWrapper"><h4>石田</h4><p>ギルドの聖地、癒しのババア</p><p>★★★</p></div>'
            }).open(marker.getMap(), marker);
        });
    });
    gmap.marker({
        position:[34.680252, 135.493399],
        title: '鬼平',
    })
    .then(function (marker) {
        marker.addListener('click', function() {
            new google.maps.InfoWindow({
                content: '<div class="infoWindowWrapper"><h4>鬼平犯科帳</h4><p>絶対に許さない！</p><p>★</p></div>'
            }).open(marker.getMap(), marker);
        });
    });
    gmap.marker({
        position:[34.674127, 135.493514],
        title: 'カレー堂',
    })
    .then(function (marker) {
        marker.addListener('click', function() {
            new google.maps.InfoWindow({
                content: '<div class="infoWindowWrapper"><h4>カレー堂！</h4><p>国民的栄養食。一説には風邪ひかなくなる。</p><p>★★★★★</p></div>'
            }).open(marker.getMap(), marker);
        });
    });

    var menu = new Gmap3Menu($("#map-canvas"));
    menu.add("omise tuika", "itemB",
        function(){
            menu.close();
        }
    );
    var current;

    gmap.on({
        rightclick:function(map, event){
            current = event;
            menu.open(current);
        }
    });


});


/*
//gmap.on('click', function (point) {
//    alert('お店を追加します');
//    console.log(point.position);
//});
.on({
    click: function (marker) {
        infowindow.open(this.get(0), marker);
    }
});
.on({
    click: function (marker) {
        infowindow.open(this.get(0), marker);
    }
});
{
    position:[34.6770583, 135.4938319],
    title: '石田',
    content: '<div class="infoWindowWrapper"><h4>石田</h4><p>ギルドの聖地、癒しのババア</p><p>★★★</p></div>',
    openInfo: false
},
{
    position:[34.680252, 135.493399],
    title: '鬼平',
    content: '<div class="infoWindowWrapper"><h4>鬼平犯科帳</h4><p>絶対に許さない！</p><p>★</p></div>',
    openInfo: false
},
{
    position:[34.674127, 135.493514],
    title: 'カレー堂',
    content: '<div class="infoWindowWrapper"><h4>カレー堂！</h4><p>国民的栄養食。一説には風邪ひかなくなる。</p><p>★★★★★</p></div>',
    openInfo: false
}
*/
