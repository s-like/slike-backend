{{-- -------------------- Saved Messages -------------------- --}}
@if($get == 'saved')
    <table class="messenger-list-item m-li-divider @if('user_'.Auth::user()->user_id == $id && $id != "0") m-list-active @endif">
        <tr data-action="0">
            {{-- Avatar side --}}
            <td>
            <div class="avatar av-m" style="background-color: #d9efff; text-align: center;">
                <span class="far fa-bookmark" style="font-size: 22px; color: #68a5ff; margin-top: calc(50% - 10px);"></span>
            </div>
            </td>
            {{-- center side --}}
            <td>
                <p data-id="{{ 'user_'.Auth::user()->user_id }}">Saved Messages <span>You</span></p>
                <span>Save messages secretly</span>
            </td>
        </tr>
    </table>
@endif

{{-- -------------------- All users/group list -------------------- --}}
@if($get == 'users')
<table class="messenger-list-item @if($user->user_id == $id && $id != "0") m-list-active @endif" data-contact="{{ $user->user_id }}">
    <tr data-action="0">
        {{-- Avatar side --}}
        <td style="position: relative">
            @if($user->active_status)
                <span class="activeStatus"></span>
            @endif
          
        <div class="avatar av-m" 
        style="background-image: url('{{ MyFunctions::getProfilepic($user->user_id,$user->user_dp) }}');">
        </div>
        </td>
        {{-- center side --}}
        <td>
        <p data-id="{{ $type.'_'.$user->user_id }}">
            {{ strlen($user->fname) > 12 ? trim(substr($user->fname,0,12)).'..' : $user->fname }} 
            <span>{{ $lastMessage->sent_on->diffForHumans() }}</span></p>
        <span>
            {{-- Last Message user indicator --}}
            {!!
                $lastMessage->from_id == Auth::user()->user_id 
                ? '<span class="lastMessageIndicator">You :</span>'
                : ''
            !!}
            {{-- Last message body --}}
            {{
                strlen($lastMessage->msg) > 30 
                ? trim(substr($lastMessage->msg, 0, 30)).'..'
                : $lastMessage->msg
            }}
           
        </span>
        {{-- New messages counter --}}
            {!! $unseenCounter > 0 ? "<b>".$unseenCounter."</b>" : '' !!}
        </td>
        
    </tr>
</table>
@endif

{{-- -------------------- Search Item -------------------- --}}
@if($get == 'search_item')
<table class="messenger-list-item" data-contact="{{ $user->user_id }}">
    <tr data-action="0">
        {{-- Avatar side --}}
        <td>
      
        <div class="avatar av-m"
        style="background-image: url('{{ MyFunctions::getProfilepic($user->user_id,$user->user_dp) }}');">
        </div>
        </td>
        {{-- center side --}}
        <td>
        <p data-id="{{ $type.'_'.$user->user_id }}">
            {{ strlen($user->fname) > 12 ? trim(substr($user->fname,0,12)).'..' : $user->fname }} 
        </td>
        
    </tr>
</table>
@endif

{{-- -------------------- Shared photos Item -------------------- --}}
@if($get == 'sharedPhoto')
<div class="shared-photo chat-image" style="background-image: url('{{ $image }}')"></div>
@endif


