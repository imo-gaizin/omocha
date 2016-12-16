$(function(){
    $('#sortable').sortable({
        revert: false
    });
    $('#sortable').disableSelection();

    $('#reset').click(function(){
        resetApiRequest();
    });
    $('#drow').click(function(){
        drowApiRequest();
    });
});

function resetApiRequest() {
    var obj = {
        method : 'reset'
    };
    $.ajax({
        type: "POST",
        url: "/api.php",
        dataType: "json",
        data: JSON.stringify(obj),
        async: false,
        success: function(result_data) {
            $('#sortable').empty();
            $.each(result_data.value, function(id, card) {
                addHands(card);
            });
        }
    });
}

function drowApiRequest() {
    var obj = {
        method : 'drow'
    };
    $.ajax({
        type: "POST",
        url: "/api.php",
        dataType: "json",
        data: JSON.stringify(obj),
        async: false,
        success: function(result_data) {
            $.each(result_data.value, function(id, card) {
                addHands(card);
            });
        }
    });
}

function addHands(card) {
    $('#sortable').append(
        $('<div>').attr('class', 'span1 box').attr('style', '').append(
            $('<div>').attr('class', 'card').append(
                $('<div>').attr('class', 'card-block').append(
                    $('<h4>').attr('class', 'card-title').append(card.name),
                    $('<p>').attr('class', 'card-text').append(card.type),
                    $('<p>').attr('class', 'card-text').append(card.mana)
                )
            )
        )
    );
}
