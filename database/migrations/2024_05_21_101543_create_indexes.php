<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIndexes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $conn = Schema::getConnection();
        $dbSchemaManager = $conn->getDoctrineSchemaManager();

        // chats
        if (Schema::hasColumn('chat_chats', 'message_id')) {
            if (!$dbSchemaManager->listTableDetails('chat_chats')->hasIndex('chat_chats_message_id_index'))
                Schema::table('chat_chats', function (Blueprint $table) {
                    $table->index('message_id');
                });
        }

        if (Schema::hasColumn('chat_chats', 'conversation_id')) {
            if (!$dbSchemaManager->listTableDetails('chat_chats')->hasIndex('chat_chats_conversation_id_index'))
                Schema::table('chat_chats', function (Blueprint $table) {
                    $table->index('conversation_id');
                });
        }

        if (Schema::hasColumn('chat_chats', 'user_id')) {
            if (!$dbSchemaManager->listTableDetails('chat_chats')->hasIndex('chat_chats_user_id_index'))
                Schema::table('chat_chats', function (Blueprint $table) {
                    $table->index('user_id');
                });
        }
        // end chats

        // chat conversations
        if (Schema::hasColumn('chat_conversations', 'user_from')) {
            if (!$dbSchemaManager->listTableDetails('chat_conversations')->hasIndex('chat_conversations_user_from_index'))
                Schema::table('chat_conversations', function (Blueprint $table) {
                    $table->index('user_from');
                });
        }

        if (Schema::hasColumn('chat_conversations', 'user_to')) {
            if (!$dbSchemaManager->listTableDetails('chat_conversations')->hasIndex('chat_conversations_user_to_index'))
                Schema::table('chat_conversations', function (Blueprint $table) {
                    $table->index('user_to');
                });
        }
        // end chat conversations

        // chat messages
        if (Schema::hasColumn('chat_messages', 'conversation_id')) {
            if (!$dbSchemaManager->listTableDetails('chat_messages')->hasIndex('chat_messages_conversation_id_index'))
                Schema::table('chat_messages', function (Blueprint $table) {
                    $table->index('conversation_id');
                });
        }

        // end chat messages

        // chat comments
        if (Schema::hasColumn('comments', 'video_id')) {
            if (!$dbSchemaManager->listTableDetails('comments')->hasIndex('comments_video_id_index'))
                Schema::table('comments', function (Blueprint $table) {
                    $table->index('video_id');
                });
        }

        if (Schema::hasColumn('comments', 'user_id')) {
            if (!$dbSchemaManager->listTableDetails('comments')->hasIndex('comments_user_id_index'))
                Schema::table('comments', function (Blueprint $table) {
                    $table->index('user_id');
                });
        }

        if (Schema::hasColumn('comments', 'stream_id')) {
            if (!$dbSchemaManager->listTableDetails('comments')->hasIndex('comments_stream_id_index'))
                Schema::table('comments', function (Blueprint $table) {
                    $table->index('stream_id');
                });
        }
        // end comments

        // chat favorites
        if (Schema::hasColumn('favorites', 'user_id')) {
            if (!$dbSchemaManager->listTableDetails('favorites')->hasIndex('favorites_user_id_index'))
                Schema::table('favorites', function (Blueprint $table) {
                    $table->index('user_id');
                });
        }

        if (Schema::hasColumn('favorites', 'favorite_id')) {
            if (!$dbSchemaManager->listTableDetails('favorites')->hasIndex('favorites_favorite_id_index'))
                Schema::table('favorites', function (Blueprint $table) {
                    $table->index('favorite_id');
                });
        }
        // end favorites

        // chat follow
        if (Schema::hasColumn('follow', 'follow_by')) {
            if (!$dbSchemaManager->listTableDetails('follow')->hasIndex('follow_follow_by_index'))
                Schema::table('follow', function (Blueprint $table) {
                    $table->index('follow_by');
                });
        }

        if (Schema::hasColumn('follow', 'follow_to')) {
            if (!$dbSchemaManager->listTableDetails('follow')->hasIndex('follow_follow_to_index'))
                Schema::table('follow', function (Blueprint $table) {
                    $table->index('follow_to');
                });
        }
        // end follow

        // chat likes
        if (Schema::hasColumn('likes', 'user_id')) {
            if (!$dbSchemaManager->listTableDetails('likes')->hasIndex('likes_user_id_index'))
                Schema::table('likes', function (Blueprint $table) {
                    $table->index('user_id');
                });
        }

        if (Schema::hasColumn('likes', 'video_id')) {
            if (!$dbSchemaManager->listTableDetails('likes')->hasIndex('likes_video_id_index'))
                Schema::table('likes', function (Blueprint $table) {
                    $table->index('video_id');
                });
        }
        // end likes

        // chat notifications
        if (Schema::hasColumn('notifications', 'notify_by')) {
            if (!$dbSchemaManager->listTableDetails('notifications')->hasIndex('notifications_notify_by_index'))
                Schema::table('notifications', function (Blueprint $table) {
                    $table->index('notify_by');
                });
        }

        if (Schema::hasColumn('notifications', 'notify_to')) {
            if (!$dbSchemaManager->listTableDetails('notifications')->hasIndex('notifications_notify_to_index'))
                Schema::table('notifications', function (Blueprint $table) {
                    $table->index('notify_to');
                });
        }

        if (Schema::hasColumn('notifications', 'video_id')) {
            if (!$dbSchemaManager->listTableDetails('notifications')->hasIndex('notifications_video_id_index'))
                Schema::table('notifications', function (Blueprint $table) {
                    $table->index('video_id');
                });
        }
        // end notifications

        // chat sounds
        if (Schema::hasColumn('sounds', 'user_id')) {
            if (!$dbSchemaManager->listTableDetails('sounds')->hasIndex('sounds_user_id_index'))
                Schema::table('sounds', function (Blueprint $table) {
                    $table->index('user_id');
                });
        }

        if (Schema::hasColumn('sounds', 'cat_id')) {
            if (!$dbSchemaManager->listTableDetails('sounds')->hasIndex('sounds_cat_id_index'))
                Schema::table('sounds', function (Blueprint $table) {
                    $table->index('cat_id');
                });
        }
        // end sounds

        // chat streams
        if (Schema::hasColumn('streams', 'user_id')) {
            if (!$dbSchemaManager->listTableDetails('streams')->hasIndex('streams_user_id_index'))
                Schema::table('streams', function (Blueprint $table) {
                    $table->index('user_id');
                });
        }
        // end streams

        // chat stream_users
        if (Schema::hasColumn('stream_users', 'stream_id')) {
            if (!$dbSchemaManager->listTableDetails('stream_users')->hasIndex('stream_users_stream_id_index'))
                Schema::table('stream_users', function (Blueprint $table) {
                    $table->index('stream_id');
                });
        }

        if (Schema::hasColumn('stream_users', 'user_id')) {
            if (!$dbSchemaManager->listTableDetails('stream_users')->hasIndex('stream_users_user_id_index'))
                Schema::table('stream_users', function (Blueprint $table) {
                    $table->index('user_id');
                });
        }
        // end stream_users

        // chat user_verify
        if (Schema::hasColumn('user_verify', 'user_id')) {
            if (!$dbSchemaManager->listTableDetails('user_verify')->hasIndex('user_verify_user_id_index'))
                Schema::table('user_verify', function (Blueprint $table) {
                    $table->index('user_id');
                });
        }
        // end user_verify

        // chat  videos
        if (Schema::hasColumn('videos', 'user_id')) {
            if (!$dbSchemaManager->listTableDetails('videos')->hasIndex('videos_user_id_index'))
                Schema::table('videos', function (Blueprint $table) {
                    $table->index('user_id');
                });
        }

        if (Schema::hasColumn('videos', 'sound_id')) {
            if (!$dbSchemaManager->listTableDetails('videos')->hasIndex('videos_sound_id_index'))
                Schema::table('videos', function (Blueprint $table) {
                    $table->index('sound_id');
                });
        }
        // end  videos

        // chat  video_views
        if (Schema::hasColumn('video_views', 'user_id')) {
            if (!$dbSchemaManager->listTableDetails('video_views')->hasIndex('video_views_user_id_index'))
                Schema::table('video_views', function (Blueprint $table) {
                    $table->index('user_id');
                });
        }

        if (Schema::hasColumn('video_views', 'video_id')) {
            if (!$dbSchemaManager->listTableDetails('video_views')->hasIndex('video_views_video_id_index'))
                Schema::table('video_views', function (Blueprint $table) {
                    $table->index('video_id');
                });
        }
        // end  video_views

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    }
}
