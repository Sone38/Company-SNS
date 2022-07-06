// 自作のjqueryを記述

//const { dump } = require("laravel-mix");


$(function(){ // 遅延処理
    $('.button').on("click", function() {
        $(this).toggleClass(".active");
    });
});

// いいね機能のjs
$(function() {
    var like = $('.js-like-toggle');
    var likePostId;

    like.on('click', function() {
        var $this = $(this);
        likePostId = $this.data('postid');

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/general',
            type: 'POST',
            data: {
                'post_id': likePostId
            },
        }).done(function(data) {
            $this.toggleClass('liked');
            $this.next('.likesCount').html(data.postLikesCount);
        }).fail(function(err) {
            alert('失敗しました。');
        });

        return false;
    });
});

$(function() {
    $('.department-name').hover(function() {
        $('.department-link:not(:animated)', this).slideDown();
    },
    function() {
        $('.department-link', this).slideUp();
    });
});

// チャット機能のjs

//$(function() {
//    $("#chatMessageSend").on('click', function() {
//        $('#color-change').css('color', 'red');
//        $.ajax({
//            headers: {
//                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//            },
//            type: 'post',
//            url: '/general/chat',
//            data: {'message': $('#chat_message').val()},
//        }).done(function(data) {
//            $('#color-change').css('color', 'red');
//        }).fail(function(err) {
//            alert('失敗しました。');
//        });

//        return false;
//    });
//});



//$.ajax({
//    type: 'GET',
//    url: '/general/test', // url: は読み込むURLを表す
    //dataType: 'html', // 読み込むデータの種類を記入
//}).done(function (results) {
    // 通信成功時の処理
//    $('#text').html(results);
//}).fail(function (err) {
    // 通信失敗時の処理
//    alert('ファイルの取得に失敗しました。');
//});

// チャット機能
