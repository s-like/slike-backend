<div class="favorite-list-item">
    <div data-id="{{ $user->user_id }}" data-action="0" class="avatar av-m" 
        style="background-image: url('{{ MyFunctions::getProfilepic($user->user_id,$user->user_dp) }}');">
    </div>
    <p>{{ strlen($user->fname) > 5 ? substr($user->fname,0,6).'..' : $user->fname }}</p>
</div>