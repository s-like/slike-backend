<div class="card customers-profile-menu">
    <!-- <h4>Company Name</h4> -->
    <ul class="tab-setting">
        <li><a href="{{ route('admin.settings') }}"><i class="bi bi-gear-fill"></i> Global Settings</a></li>
        <li><a href="{{ route('admin.ad_settings') }}"><i class="bi bi-badge-ad-fill"></i> Ads Settings</a></li>
        <li><a href="{{ route('admin.mail_settings') }}"><i class="bi bi-envelope-fill"></i> Mail Settings</a></li>
        <li><a href="{{ route('admin.nsfw_settings') }}"><i class="fa fa-user-secret"></i> Video Moderation Settings</a></li>
        <li><a href="{{ route('admin.change_password.index') }}"><i class="bi bi-lock"></i> Change Password</a></li>
        <li><a href="{{ route('admin.home_settings') }}"><i class="bi bi-house-fill"></i> Home Screen</a></li>
        <li><a href="{{ route('admin.social_settings') }}"><i class="bi bi-globe2"></i> Social Login</a></li>
        <li><a href="{{ route('admin.pusher_settings') }}"><i class="bi bi-bell-fill"></i> Notification Settings</a></li>
        <li><a href="{{ route('admin.social_media_links') }}"><i class="bi bi-link"></i> Social Media Links</a></li>
        <li><a href="{{ route('admin.app_settings') }}"><i class="bi bi-gear-wide-connected"></i> App Settings</a></li>
        <li><a href="{{ route('admin.storage_settings') }}"><i class="bi bi-server"></i> Storage Settings</a></li>
        <li><a href="{{ route('admin.google_captcha') }}"><i class="bi bi-shuffle"></i> Google Captcha Settings</a></li>
        <li><a href="{{ route('admin.chat-migration') }}"><i class="bi bi-chat"></i> Chat Migration</a></li>
        <li><a href="{{ route('admin.stream_settings') }}"><i class="bi bi-camera-reels"></i> Stream</a></li>
        <li><a href="{{ route('admin.inapp_purchase_products') }}"><i class="bi bi-shuffle"></i> In App Purchase Products</a></li>
        {{-- <li><a href="{{ route('admin.gift') }}"><i class="bi bi-gift"></i> Gift</a></li> --}}
    </ul>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        var current = location.pathname;
        $('.tab-setting a').each(function() {
            var $this = $(this);
            // if the current path is like this link, make it active
            if ($this.attr('href').indexOf(current) !== -1) {
                $this.addClass('green');
            }
        })
    });
</script>
<style type="text/css">
    /* .btn-tab-setting {
        background-color: white !important;
        color: black !important;
        padding: 13px 20px;
        border-bottom: 1px solid #ccc;
        line-height: 20px;
        text-align: left;

    } */

    /* .btn-tab-setting.active {
        background-color: black !important;
        border: 2px solid black !important;
        color: white !important;
    } */

    /* .tab-setting {
        box-shadow: 0 2px 10px -1px rgba(69, 90, 100, 0.3);
        border: none !important;
        padding: 10px 10px;
        border-radius: 8px;
        background: white;
        height: 100%;
    } */
</style>