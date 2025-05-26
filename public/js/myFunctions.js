	  

// var figure = $(".video").hover( hoverVideo, hideVideo );

$(document).ready(function() {

    sharedVideoId = "{{ $sharedVideoId }}";
    sharedVideoSrc = "{{ $sharedVideoSrc }}";
    if (sharedVideoId != '') {
        $('#SlikeModal').modal();
        modelbox_open(sharedVideoSrc, sharedVideoId);
    }

});

function videoShare(link)
{
    facebookLink = "{{ Share::page(':link', '')->facebook()->getRawLinks() }}";
    twitterLink = "{{ Share::page(':link', null)->twitter()->getRawLinks() }}";
    whatsappLink = "{{ Share::page(':link')->whatsapp()->getRawLinks() }}";
    facebookLink = facebookLink.replace(':link', link);
    twitterLink = twitterLink.replace(':link', link);
    whatsappLink = whatsappLink.replace(':link', link);

    htmlContent = "<div class='d-flex flex-row justify-content-around'><a href='" + facebookLink + "'><i class='fa fa-facebook-square fa-2x ml-2' aria-hidden='true'></i></a>" +
            "<a href='" + twitterLink + "'><i class='fa fa-twitter-square fa-2x ml-2' aria-hidden='true'></i></a>" +
            "<a href='" + whatsappLink + "'><i class='fa fa-whatsapp fa-2x ml-2 mb-2 mr-2' aria-hidden='true'></i></a>" +
            "</div>";
    $("#video-share").popover({
        // title: function() {
        // 	return '<h5 class="text-white">Share</h5>';
        // },
        placement: 'top',
        container: 'body',
        html: true,
        content: function() {
                    return htmlContent;
                }
    });
    $("#video-share").popover('show');
}

$('#modal-comment-form').on('submit', function(e) {
    e.preventDefault();
    form_data = $(this).serialize();
    formUrl = $('#modal-comment-form').prop('action');
    $.ajax({
        url : formUrl,
        type : 'POST',
        datatype : 'json',
        data : form_data,
        success: function(data) {
            if (data.success) {
                $('#video_comment').val('');
                $("#modal-comment-list").animate({ scrollTop: $('#modal-comment-list').prop("scrollHeight")}, 1000);
                videoComments('insert');
            }
        },
        error: function(data) {
            if (data.status == 401) {
                window.location.href = "{{ route('web.login') }}";
            }
        }
    });
});

function hoverVideo(id) {
    $("#video_"+id).get(0).play();
}

function hideVideo(id) {
    $("#video_"+id).get(0).pause();
}

window.document.onkeydown = function(e) {
    if (!e) {
        e = event;
    }
    if (e.keyCode == 27) {
        model_close();
    }
}

var checkThePlayheadPositionTenTimesASecond;
var videoId = document.getElementById("slikeVideo");

var pageNo = 5;
var commentFormRoute = '';
var morePages;
var oldPage;
var newPage;
var bottom;

videoId.ontimeupdate = function() {myFunction()};

function videoLike()
{
    vId = $('#video_id').val();
    var likeUrl = "{{ route('web.videoLike', ':id') }}";
    likeUrl = likeUrl.replace(':id', vId);
    $.ajax({
        url : likeUrl,
        type : 'GET',
        datatype : 'json',
        success : function(data) {
            if (data.success) {
                if(data.liked) {
                    $('#video-like').removeClass('fa-heart-o');
                    $('#video-like').addClass('fa-heart');
                } else {
                    $('#video-like').removeClass('fa-heart');
                    $('#video-like').addClass('fa-heart-o');
                }
            }
        },
        error : function(data){
            if (data.status == 401) {
                window.location.href = "{{ route('web.login') }}";
            }
        }
    });
}

function modelbox_open(source, videoId)
{

    oldPage = 1;
    newPage = 2;
    morePages = true;
    bottom = true;

    $("#modal-comment-list").html(' ');
    
    $("#modal-comment-list").animate({scrollTop: $("#modal-comment-list").offset().top});

    var slikeVideo = document.getElementById("slikeVideo");
    slikeVideo.src = source;
    slikeVideo.play();

    checkThePlayheadPositionTenTimesASecond = setInterval(function() { myTimer(videoId);}, 1000);

    var vidUrl = "{{ route('web.videoInfo', ':id') }}";
    vidUrl = vidUrl.replace(':id', videoId);

    commentFormRoute = "{{ route('web.videoPostComments', ':id') }}";
    commentFormRoute = commentFormRoute.replace(':id', videoId);

    socialLink = "{{ utf8_decode(urldecode(route('web.home', ['videoId' => ':id']))) }}";
    socialLink = socialLink.replace(':id', videoId);

    userProfileUrl = "{{ route('web.userProfile', ':id') }}";

    $.ajax({
        url: vidUrl,
        type: 'GET',
        datatype: 'json',
        success:function(data) {

            proifleImg = '';
            if (data.video.login_type != 'O') {
                proifleImg = data.video.user_dp;
            } else {
                profileImg = "{{ asset('storage/profile_pic/:userId/small/') }}" + '/' + data.video.user_dp;
                profileImg= profileImg.replace(':userId', data.video.user_id);
            }

            $('#video_id').val(videoId);

            userProfileUrl = userProfileUrl.replace(':id', data.video.user_id);

            $("#user-profile-img").closest("a").attr('href', userProfileUrl);
            $('#user-profile-img').prop('src', profileImg);
            $('#user-profile-info').html(data.video.username);
            $('#modal-comment-list').html(data.comment_html);
            $('#modal-total-views').html(data.video.total_views + ' Views');
            $('#modal-video-date').html(data.video.video_date);

            $('#modal-comment-form').prop('action', commentFormRoute);

            if (data.userLikedVideo != '') {
                $('#video-like').removeClass('fa-heart-o');
                $('#video-like').addClass('fa-heart');
            }

            $('#video-share').attr('onclick', "videoShare('" + socialLink + "')");

        }
    });

}

$("#modal-comment-list").scroll(function(){
    videoComments('scroll');			
});

function videoComments(type)
{
    canScroll = newPage > oldPage;
    var elem = $('#modal-comment-list');
    bottom = (elem[0].scrollHeight - elem.scrollTop()) == elem.outerHeight();
        
        if ((morePages && canScroll && bottom) || type == 'insert') {
            oldPage = newPage;
            videoId = $('#video_id').val();
            var vidUrl = "{{ route('web.videoComments', ['id' => ':id', 'type' => ':type']) }}" + "?page=" + newPage;
            vidUrl = vidUrl.replace(':id', videoId);
            vidUrl = vidUrl.replace(':type', type);
            $.ajax({
                url: vidUrl,
                type: 'GET',
                datatype: 'json',
                success:function(data){
                        $('#modal-comment-list').append(data.comment_html);
                        newPage++;
                        morePages = data.morePages;
                }
            });

        }

}

function myTimer(vId)
{
    if (!videoId.paused) {
        var ctime = videoId.currentTime;
        if (ctime >=5) { //alert('abc');
            //send ajax request for views increment
            var vidUrl = "{{ route('web.videoViewed', ':id') }}";
            vidUrl = vidUrl.replace(':id', vId);
            $.ajax({
                url: vidUrl,
                type: 'GET',
                datatype: 'json',
                data : {
                    'unique_token' : "{{ Illuminate\Support\Facades\Cookie::get('videoViewed') }}",
                },
                success: function(data) {
                    // alert(data.success);
                }
            });

            clearInterval(checkThePlayheadPositionTenTimesASecond);
        }
    }
}

function model_close() 
{
    var slikeVideo = document.getElementById("slikeVideo");
    slikeVideo.pause();
    
    $('#video_id').val('');
    $('#user-profile-img').prop('src', '');
    $('#user-profile-info').html(' ');
    $('#modal-comment-list').html(' ');
    $('#modal-total-views').html(' ');
    $('#modal-video-date').html(' ');
    $('#modal-comment-form').prop('action', '');

}

function myFunction() {}

$('body').on('click', function (e) {
    $('[data-toggle=popover]').each(function () {
        // hide any open popovers when the anywhere else in the body is clicked
        if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
            $(this).popover('hide');
        }
    });
});