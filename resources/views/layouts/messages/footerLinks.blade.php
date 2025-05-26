<script>
    // var socketId = Echo.socketId();

    // window.axios.defaults.headers.common['X-Socket-ID'] = socketId;

    skip = 20;
    loaded = 20;
    editCheck = 0;
    $('#pills-tab a').on('click', function(e) {
        e.preventDefault();
        $(this).tab('show')
    });


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            "X-Socket-Id": Echo.socketId(),

        }
    });

    $(document).ready(function() {
        getConversations();
        <?php if (isset($id)) { ?>

            height = $(window).height() - 110;
            $('.message-container').css('height', height);
            rightHeight = height - 110;
            $('.messages').css('height', rightHeight);
            bottomHeight = $('#message-{{$id}}')[0].scrollHeight

            $(".messages").animate({
                scrollTop: bottomHeight
            }, 1000);

            id = "{{$id}}";
            readMessages(id);

            setTimeout(() => {
                $("#message-{{$id}}").scroll(function() {
                    if ($("#message-{{$id}}").scrollTop() == 0) {
                        topa = $(".message-card:first-child").offset().top;
                        console.log('aaaaaaaa ' + $(".message-card:first-child").offset().top);
                        if (topa >= 156) {
                            loadMsgUrl = "{{ route('web.messages.chat',$id) }}";
                            $('.loading').show();
                            $.ajax({
                                url: loadMsgUrl,
                                type: 'GET',
                                datatype: 'json',
                                data: {
                                    'skip': skip,
                                    'type': 'ajax'
                                },
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    // "X-Socket-Id": Echo.socketId(),
                                },
                                success: function(res) {
                                    // console.log('vvvvvvv ', res);
                                    $('.loading').hide();
                                    if (res.html != "") {
                                        $("#message-{{$id}}").prepend(res.html);
                                        loaded = res.loaded;
                                        skip = skip + loaded;
                                    }
                                    if (editCheck == 1) {
                                        $('.chk-box').show();
                                    }
                                },
                                error: function(res) {

                                }
                            });

                        }
                    }
                });
            }, 2000);


        <?php } ?>
    });


    $(document).on('keyup', '.message-input', function() {
        length = $(this).val().length;
        if (length == 1) {
            type = true;
            typing(type);
        } else if (length == 0) {
            type = false;
            typing(type);
        }
        if (event.keyCode == 13) {
            if (length > 0) {
                typing(false);
                $('#msg-submit').trigger('click');

            }
        } else {

        }


    });

    $(document).on('click', '.delete-convo', function(e) {
        id = $(this).attr('id');
        e.preventDefault();
        swal({
                title: "Are you sure you want to delete ?",
                // text: 'aaa',
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        type: "POST",
                        url: "{{ route('web.conversation.deleteMessage') }}",
                        data: {
                            id: id
                        },
                        success: function(data) {
                            window.location.href = "{{ route('web.messages') }}";
                        }
                    });
                }
            });

    });

    $(document).on('click', '.edit-msgs', function() {
        $('.chk-box').show();
        $('.selected-delete').show();
        editCheck = 1;
    });


    $(document).on('click', '.selected-delete', function() {
        var favorite = [];
        $.each($(".edit-convo-id:checked"), function() {
            favorite.push($(this).attr('data-val'));
        });
        conv_id = $('#conversation_id').val();

        if (favorite != "") {
            swal({
                    title: "Are you sure you want to delete ?",
                    // text: 'aaa',
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        var ids = favorite.join(",");
                        $.ajax({
                            type: "POST",
                            url: "{{ route('web.messages.messagesDelete') }}",
                            data: {
                                ids: ids
                            },
                            success: function(data) {
                                location.reload();
                            }
                        });
                    }
                });

            // if (confirm('Are you sure you want to delete ?')) {
            //     var ids = favorite.join(",");
            //     $.post("{{ route('web.messages.messagesDelete') }}", 'ids=' + ids, function(data) {
            //         //window.location = "{{ route('web.messages',':id') }}";
            //         location.reload();
            //     });
            // }
        } else {
            alert("Please select item to delete.")
        }
    });

    $(document).on('change', ".edit-convo-id", function() {
        if (this.checked) {
            //Do stuff
            $(this).parent().parent().addClass('active-row');
        } else {
            $(this).parent().parent().removeClass('active-row');
        }
    });

    function readMessages(id) {

        var readUrl = "{{ route('web.messages.readMessage', ':id') }}";
        readUrl = readUrl.replace(':id', id);
        $.ajax({
            url: readUrl,
            type: 'POST',
            datatype: 'json',
            success: function(data) {
                // console.log('qqq' + data);
                $('count_' + id).css('display', 'none');
                // $('.typing-indicator ').css('visibility', 'visible');
                // window.location.href=href;
            },
            error: function(data) {

            }
        });
    }

    function getConversations() {
        getConvo = "{{ route('web.conversation.get') }}";
        $.ajax({
            url: getConvo,
            type: 'GET',
            datatype: 'json',
            success: function(data) {
                // console.log('qqq' + data);
                $.each(data, function(index, value) {
                    listenForSession(value);
                });
                //$('count_' + id).css('display', 'none');
                // $('.typing-indicator ').css('visibility', 'visible');
                // window.location.href=href;
            },
            error: function(data) {

            }
        });
        // console.log('con data ' + con.data);
    }

    function listenForSession(conv_id) {
        Echo.private(`chat.${conv_id}`).listen('NewChatMsg', (e) => {
            data = JSON.parse(JSON.stringify(e.content));
            console.log('newwww ' + JSON.stringify(e.content));
            // count=$('.count_'+conv_id).html();
            // count=parseInt(count)+1;
            // $('.count_'+conv_id).html(count);
            // console.log('count '+count);

            $('.msg_span_' + conv_id).html(data.msg);
            $('.time_span_' + conv_id).html(data.time);

            current_url = "{{Route::currentRouteName()}}";
            current_id = "{{request()->route('conversation')}}";
            // id = conv_id;
            console.log('current_url ' + current_url);
            console.log('current_id ' + current_id);
            if (current_url == 'web.messages.chat' && current_id == conv_id) {
                // console.log('wwww');

                // readMessages(id);
            } else {

                count = $('.count_' + conv_id).html();
                if (typeof count == 'undefined') {
                    count = 0;
                    $("<b class='count_" + conv_id + "'></b>").insertAfter(".msg_span_" + conv_id);
                }
                count = parseInt(count) + 1;
                $('.count_' + conv_id).html(count);
                console.log('count ' + count);

            }
        }).listen('UserTyping', (e) => {
            data = JSON.parse(JSON.stringify(e));
            console.log('bbbbbb111 ' + data.typing + ' ' + Echo.socketId());

            if (data.typing == true) {
                $('.typing-indicator').css('visibility', 'visible');
            } else {
                $('.typing-indicator').css('visibility', 'hidden');
            }
        });
    }

    <?php if (isset($id)) { ?>

        function typing(type) {
            url = "{{ route('web.messages.typing',$id)}}";

            axios({
                method: 'post',
                url: url,
                data: {
                    'typing': type
                },
                headers: {
                    "X-Socket-Id": Echo.socketId(),
                }
            }).then((response) => {
                // this.tasks.push(response.data);
                console.log('sssss ' + response);
                console.log('socket id' + Echo.socketId());
            });

            // $.ajax({
            //     url: url,
            //     type: 'POST',
            //     datatype: 'json',
            //     headers: {
            //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            //         "X-Socket-Id": Echo.socketId(),
            //     },
            //     data: {
            //         typing: type
            //     },
            //     success: function(data) {
            //         console.log('socket id'+Echo.socketId());
            //         // $('.typing-indicator ').css('visibility', 'visible');
            //     },
            //     error: function(data) {

            //     }
            // });
        }

        $(document).on('click', '#msg-submit', function(e) {
            e.preventDefault();
            msg = $('.message-input').val();
            html = '<div class="row m-0">'+
            '<div class="chk-box col-1 <?php echo time(); ?>">'+
            '<input type="checkbox" class="edit-convo-id" data-val=""/>'+
            '</div>'+
            '<div class="message-card mc-sender col-11" data-id="2">' +
                // '<div class="dropdown">' +
                // '<a class="dropdown-toggle" data-bs-toggle="dropdown" href="#">' +
                // '<svg class="svg-inline--fa fa-ellipsis-v fa-w-6 delete-dots" aria-hidden="true" focusable="false" data-prefix="fa" data-icon="ellipsis-v" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 192 512" data-fa-i2svg="">' +
                // '<path fill="currentColor" d="M96 184c39.8 0 72 32.2 72 72s-32.2 72-72 72-72-32.2-72-72 32.2-72 72-72zM24 80c0 39.8 32.2 72 72 72s72-32.2 72-72S135.8 8 96 8 24 40.2 24 80zm0 352c0 39.8 32.2 72 72 72s72-32.2 72-72-32.2-72-72-72-72 32.2-72 72z"></path>' +
                // '</svg></a>' +
                // '<div class="dropdown-menu" role="menu" aria-labelledby="dLabel">' +
                // '<a href="#" class="delete-single-msg" data-id="2">Delete</a>' +
                // '</div>' +
                // '</div>' +
                '<p>' + msg +
                '<sub title="2025-10-20 07:00:58" class="message-time">' +
                '<svg class="svg-inline--fa fa-check fa-w-16 seen" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">' +
                '<path fill="currentColor" d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"></path>' +
                '</svg> '+
                'now</sub>';

            '</p>' +

            '</div> </div>';
            $('.messages').append(html);
            typing(false);
            form_data = $('#message-form').serialize();
            formUrl = $('#message-form').prop('action');
            $.ajax({
                url: formUrl,
                type: 'POST',
                datatype: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                    "X-Socket-Id": Echo.socketId(),
                },
                data: form_data,
                success: function(data) {
                    $('.message-input').val('');
                    $('.msg_span_{{$id}}').html(msg);
                    $('.time_span_{{$id}}').html('1 second ago');

                    bottomHeight = $('#message-{{$id}}')[0].scrollHeight;
                    //  $("#message-{{$id}}").outerHeight();
                    // alert(bottomHeight);
                    $("#message-{{$id}}").animate({
                        scrollTop: bottomHeight
                    }, 1000);
                },
                error: function(data) {

                }
            });
        });
    <?php } ?>
    $(document).on('click', '.read-convo', function(e) {
        e.preventDefault();
        href = $(this).attr('href');
        conv_id = $(this).attr('data-id');
        that = $(this);
        var readUrl = "{{ route('web.messages.readMessage', ':id') }}";
        readUrl = readUrl.replace(':id', conv_id);
        $.ajax({
            url: readUrl,
            type: 'POST',
            datatype: 'json',
            success: function(data) {
                // console.log('qqq' + data);
                that.find('b').css('display', 'none');
                // $('.typing-indicator ').css('visibility', 'visible');
                window.location.href = href;
            },
            error: function(data) {

            }
        });
    });


    Echo.join(`chat`)
        .here((users) => {
            console.log('joinnnnn ' + JSON.stringify(users));
        })
        .joining((user) => {
            console.log(user.name);
        })
        .leaving((user) => {
            console.log(user.name);
        })
        .error((error) => {
            console.error(error);
        });
    <?php if (isset($id)) {
        $user_id = auth()->guard('web')->user()->user_id;
    ?>
        Echo.private(`chat.{{$id}}`)
            .listen('NewChatMsg', (e) => {
                data = JSON.parse(JSON.stringify(e.content));
                console.log('old msg ' + JSON.stringify(e.content));

                current_url = "{{Route::currentRouteName()}}";
                current_id = "{{request()->route('conversation')}}";
                id = "{{$id}}";
                console.log('current_url ' + current_url);
                console.log('current_id ' + current_id);
                if (current_url == 'web.messages.chat' && current_id == id) {
                    console.log('wwww');
                   html = '<div class="row m-0">'+ 
                        '<div class="chk-box col-1">'+
                            '<input type="checkbox" class="edit-convo-id" data-val="8">'+
                        '</div>'+
                        '<div class="message-card col-11" data-id="1"><p>' + data.msg +
                        '<sub title="'+data.time+'">' + data.time + '</sub>' +
                        '</p></div></div>';
                    skip = skip + 1;
                    console.log('skipskip ' + skip);
                    $('#message-{{$id}}').append(html);
                    $("#message-{{$id}}").animate({
                        scrollTop: $('#message-{{$id}}')[0].scrollHeight
                    }, 1000);


                    readMessages(id);
                } else {

                }
                console.log('alert done');
            }).listen('UserTyping', (e) => {
                data = JSON.parse(JSON.stringify(e));
                console.log('bbbbbb222 ' + data.typing + ' ' + Echo.socketId());

                if (data.typing == true) {
                    $('.typing-indicator').css('visibility', 'visible');
                } else {
                    $('.typing-indicator').css('visibility', 'hidden');
                }
            });
    <?php } ?>
</script>