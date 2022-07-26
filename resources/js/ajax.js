// 自作のjqueryを記述

const { countBy } = require("lodash");

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

// 検索機能
$(function() {
    var searchUserByName;

    $('#search-user-submit').on('click', function() {
        searchUserByName = $('#search-user').val();

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/top-admin/top-admin-user",
            type: "POST",
            dataType: "json",
            data: {
                'name': searchUserByName,
            },
        }).done(function(json) {
            /* 使えないもの
            $.each(json['resultOfSearch'], function(property, value) {
                alert("名前:" + value.name + "フリガナ:" + value.kana + "メールアドレス" + value.email);
            })
            */
            for($i = 0; $i < json['resultOfSearch'].length; $i++){
                //alert(JSON.stringify(json['resultOfSearch'][$i]['name']));
                console.log(JSON.stringify(json['resultOfSearch'][$i]['name']));
            }
            //alert(json['resultOfSearch'].length);
            //alert(JSON.stringify(json['resultOfSearch'][1]));
            //alert("成功");
        }).fail(function(err) {
            alert('失敗');
        });

        return false;

    });
});

// チャット機能のjs
/**

$('#chatMessageSend').on('click', function() {

    $.ajax({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: '/general/chat',
        type: 'POST',
        data: {
            message: $('#chat_message'),
        }
    }).done(function() {
        alert('成功');
    }).fail(function() {
        alert('失敗');
    });
})

*/

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

// ユーザー情報の検索機能

