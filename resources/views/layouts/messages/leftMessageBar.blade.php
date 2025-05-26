<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
    <?php

    $conver = MyFunctions::getConversations();
// dd($conver);
    if (count($conver['data']) > 0) {
        foreach ($conver['data'] as $con) {
    ?>
            <a class="read-convo" href="{{ route('web.messages.chat',$con['id']) }}" data-id="{{$con['id']}}">
                <div class="listOfContacts" style="width: 100%;height: calc(100% - 200px);">
                    <table class="messenger-list-item " data-contact="7">
                        <tbody>
                            <tr data-action="0">

                                <td style="position: relative">
                                    <?php $dp = $con['user_dp']; ?>
                                    <div class="avatar av-m" style="background-image: url('{{ $dp }}');">
                                    </div>
                                </td>
                                <td>
                                    <p data-id="user_{{$con['id']}}">
                                        <?php echo $con['person_name']; ?>
                                        <span class="time_span_{{$con['id']}}"> <?php echo $con['time']; ?></span>
                                    </p>
                                    <span class="msg_span_{{$con['id']}} msg_span overflow-ellipsis">
                                        <!-- <span class="lastMessageIndicator">You :</span> -->
                                        <?php echo $con['message']; ?>
                                    </span>
                                    <?php if($con['count']>0){ ?>
                                    <b class="count_{{$con['id']}}"><?php echo $con['count']; ?></b>
                                    <?php } ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </a>
    <?php }
    }
    ?>
</div>

<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
    <?php $res = MyFunctions::chatUsers();
    // dd($res['data']);
    if (count($res['data']) > 0) {
        foreach ($res['data'] as $row) { ?>
            <a href="{{ route('web.conversation.store',$row->user_id) }}">
                <div class="listOfContacts" style="width: 100%;height: calc(100% - 200px);">
                    <table class="messenger-list-item " data-contact="7">
                        <tbody>
                            <tr data-action="0">

                                <td style="position: relative">
                                    <?php $dp = $row->user_dp; ?>
                                    <div class="avatar av-m" style="background-image: url('{{ $dp }}');">
                                    </div>
                                </td>
                                <td>
                                    <p data-id="user_7">
                                        <?php echo $row->fname.' '.$row->lname; ?>
                                    </p>
                                    <span>
                                    <?php echo $row->username; ?>
                                    </span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </a>
    <?php   }
    }
    ?>
</div>