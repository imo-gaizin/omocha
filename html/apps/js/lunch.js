$(function() {
    $("#map-canvas").gmap3({
        //address: '大阪府大阪市西区新町１丁目２８−１１',
        latitude: 34.675845,
        longitude: 135.493676,
        zoom: 18,
        navigationControl: true,
        mapTypeControl: true,
        scaleControl: true,
        markers: [
            {
                latitude: 34.675845,
                longitude: 135.493676,
                title: '本社安川ビル',
                content: '<div class="infoWindowWrapper"><h4>本社</h4><p>エクストランス</p></div>',
                openInfo: false
            },
            {
                address: '大阪府大阪市西区新町１丁目３１−１',
                title: '石田',
                content: '<div class="infoWindowWrapper"><h4>石田</h4><p>ギルドの聖地、癒しのババア</p><p>★★★</p></div>',
                openInfo: false
            },
            {
                latitude: 34.680252,
                longitude: 135.493399,
                title: '鬼平',
                content: '<div class="infoWindowWrapper"><h4>鬼平</h4><p>絶対に許さない！鬼平犯科帳</p><p>★</p></div>',
                openInfo: false
            },
            {
                latitude: 34.674127,
                longitude: 135.493514,
                title: 'カレー堂',
                content: '<div class="infoWindowWrapper"><h4>カレー堂！</h4><p>国民的栄養食。風邪ひかなくなる。</p><p>★★★★★</p></div>',
                openInfo: false
            }
        ]

    });

});
