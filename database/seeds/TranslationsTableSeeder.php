<?php


use Illuminate\Database\Seeder;

class TranslationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        \DB::table('translations')->delete();

        \DB::table('translations')->insert(array(
            0 =>
            array(
                'id' => 1,
                'language_id' => 1,
                'label_id' => 1,
                'value' => 'Following',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 =>
            array(
                'id' => 2,
                'language_id' => 2,
                'label_id' => 1,
                'value' => 'Следующий',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 =>
            array(
                'id' => 3,
                'language_id' => 3,
                'label_id' => 1,
                'value' => 'Følger',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 =>
            array(
                'id' => 4,
                'language_id' => 1,
                'label_id' => 2,
                'value' => 'Featured',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 =>
            array(
                'id' => 5,
                'language_id' => 2,
                'label_id' => 2,
                'value' => 'Рекомендуемые',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 =>
            array(
                'id' => 6,
                'language_id' => 3,
                'label_id' => 2,
                'value' => 'Utvalgt',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 =>
            array(
                'id' => 7,
                'language_id' => 1,
                'label_id' => 3,
                'value' => 'No comment available',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 =>
            array(
                'id' => 8,
                'language_id' => 2,
                'label_id' => 3,
                'value' => 'Нет доступных комментариев',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 =>
            array(
                'id' => 9,
                'language_id' => 3,
                'label_id' => 3,
                'value' => 'Ingen tilgjengelige kommentarer',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 =>
            array(
                'id' => 10,
                'language_id' => 1,
                'label_id' => 4,
                'value' => 'My followers only',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 =>
            array(
                'id' => 11,
                'language_id' => 2,
                'label_id' => 4,
                'value' => 'Только мои подписчики',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 =>
            array(
                'id' => 12,
                'language_id' => 3,
                'label_id' => 4,
                'value' => 'Bare mine følgere',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 =>
            array(
                'id' => 13,
                'language_id' => 1,
                'label_id' => 5,
                'value' => 'Public',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 =>
            array(
                'id' => 14,
                'language_id' => 2,
                'label_id' => 5,
                'value' => 'Общедоступный',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 =>
            array(
                'id' => 15,
                'language_id' => 3,
                'label_id' => 5,
                'value' => 'Offentlig',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 =>
            array(
                'id' => 16,
                'language_id' => 1,
                'label_id' => 6,
                'value' => 'Private',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 =>
            array(
                'id' => 17,
                'language_id' => 2,
                'label_id' => 6,
                'value' => 'Частный',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 =>
            array(
                'id' => 18,
                'language_id' => 3,
                'label_id' => 6,
                'value' => 'Privat',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 =>
            array(
                'id' => 19,
                'language_id' => 1,
                'label_id' => 7,
                'value' => 'Only Followers',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 =>
            array(
                'id' => 20,
                'language_id' => 2,
                'label_id' => 7,
                'value' => 'Только подписчики',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 =>
            array(
                'id' => 21,
                'language_id' => 3,
                'label_id' => 7,
                'value' => 'Bare følgere',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 =>
            array(
                'id' => 22,
                'language_id' => 1,
                'label_id' => 8,
                'value' => 'Block',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 =>
            array(
                'id' => 23,
                'language_id' => 2,
                'label_id' => 8,
                'value' => 'Заблокировать',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 =>
            array(
                'id' => 24,
                'language_id' => 3,
                'label_id' => 8,
                'value' => 'Blokkere',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 =>
            array(
                'id' => 25,
                'language_id' => 1,
                'label_id' => 9,
                'value' => 'Unblock',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 =>
            array(
                'id' => 26,
                'language_id' => 2,
                'label_id' => 9,
                'value' => 'Разблокировать',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 =>
            array(
                'id' => 27,
                'language_id' => 3,
                'label_id' => 9,
                'value' => 'Avblokkere',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 =>
            array(
                'id' => 28,
                'language_id' => 1,
                'label_id' => 10,
                'value' => 'Conversations',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 =>
            array(
                'id' => 29,
                'language_id' => 2,
                'label_id' => 10,
                'value' => 'Беседы',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 =>
            array(
                'id' => 30,
                'language_id' => 3,
                'label_id' => 10,
                'value' => 'Samtaler',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 =>
            array(
                'id' => 31,
                'language_id' => 1,
                'label_id' => 11,
                'value' => 'No Blocked Users',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 =>
            array(
                'id' => 32,
                'language_id' => 2,
                'label_id' => 11,
                'value' => 'Нет заблокированных пользователей',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 =>
            array(
                'id' => 33,
                'language_id' => 3,
                'label_id' => 11,
                'value' => 'Ingen blokkerte brukere',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 =>
            array(
                'id' => 34,
                'language_id' => 1,
                'label_id' => 12,
                'value' => 'No User Yet',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 =>
            array(
                'id' => 35,
                'language_id' => 2,
                'label_id' => 12,
                'value' => 'Пользователь еще не зарегистрирован',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 =>
            array(
                'id' => 36,
                'language_id' => 3,
                'label_id' => 12,
                'value' => 'Ingen bruker ennå',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            36 =>
            array(
                'id' => 37,
                'language_id' => 1,
                'label_id' => 13,
                'value' => 'Blocked Users',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 =>
            array(
                'id' => 38,
                'language_id' => 2,
                'label_id' => 13,
                'value' => 'Заблокированные пользователи',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            38 =>
            array(
                'id' => 39,
                'language_id' => 3,
                'label_id' => 13,
                'value' => 'Blokkerte brukere',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            39 =>
            array(
                'id' => 40,
                'language_id' => 1,
                'label_id' => 14,
                'value' => 'Current Password field is required!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            40 =>
            array(
                'id' => 41,
                'language_id' => 2,
                'label_id' => 14,
                'value' => 'Требуется текущее поле пароля!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            41 =>
            array(
                'id' => 42,
                'language_id' => 3,
                'label_id' => 14,
                'value' => 'Nåværende passordfelt er påkrevd!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            42 =>
            array(
                'id' => 43,
                'language_id' => 1,
                'label_id' => 15,
                'value' => 'Current Password',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            43 =>
            array(
                'id' => 44,
                'language_id' => 2,
                'label_id' => 15,
                'value' => 'Текущий пароль',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            44 =>
            array(
                'id' => 45,
                'language_id' => 3,
                'label_id' => 15,
                'value' => 'Nåværende passord',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            45 =>
            array(
                'id' => 46,
                'language_id' => 1,
                'label_id' => 16,
                'value' => 'New Password field is required!!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            46 =>
            array(
                'id' => 47,
                'language_id' => 2,
                'label_id' => 16,
                'value' => 'Требуется новое поле пароля!!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            47 =>
            array(
                'id' => 48,
                'language_id' => 3,
                'label_id' => 16,
                'value' => 'Nytt passordfelt er påkrevd!!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            48 =>
            array(
                'id' => 49,
                'language_id' => 1,
                'label_id' => 17,
                'value' => 'New Password',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            49 =>
            array(
                'id' => 50,
                'language_id' => 2,
                'label_id' => 17,
                'value' => 'Новый пароль',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            50 =>
            array(
                'id' => 51,
                'language_id' => 3,
                'label_id' => 17,
                'value' => 'Nytt passord',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            51 =>
            array(
                'id' => 52,
                'language_id' => 1,
                'label_id' => 18,
                'value' => 'Confirm Password field is required!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            52 =>
            array(
                'id' => 53,
                'language_id' => 2,
                'label_id' => 18,
                'value' => 'Требуется поле подтверждения пароля!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            53 =>
            array(
                'id' => 54,
                'language_id' => 3,
                'label_id' => 18,
                'value' => 'Bekreft passordfeltet er påkrevd!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            54 =>
            array(
                'id' => 55,
                'language_id' => 1,
                'label_id' => 19,
                'value' => 'Password does not match!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            55 =>
            array(
                'id' => 56,
                'language_id' => 2,
                'label_id' => 19,
                'value' => 'Пароль не совпадает!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            56 =>
            array(
                'id' => 57,
                'language_id' => 3,
                'label_id' => 19,
                'value' => 'Passord stemmer ikke!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            57 =>
            array(
                'id' => 58,
                'language_id' => 1,
                'label_id' => 20,
                'value' => 'Confirm Password',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            58 =>
            array(
                'id' => 59,
                'language_id' => 2,
                'label_id' => 20,
                'value' => 'Подтвердите пароль',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            59 =>
            array(
                'id' => 60,
                'language_id' => 3,
                'label_id' => 20,
                'value' => 'Bekreft passord',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            60 =>
            array(
                'id' => 61,
                'language_id' => 1,
                'label_id' => 21,
                'value' => 'Change Password',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            61 =>
            array(
                'id' => 62,
                'language_id' => 2,
                'label_id' => 21,
                'value' => 'Изменить пароль',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            62 =>
            array(
                'id' => 63,
                'language_id' => 3,
                'label_id' => 21,
                'value' => 'Endre passord',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            63 =>
            array(
                'id' => 64,
                'language_id' => 1,
                'label_id' => 22,
                'value' => 'Notifications',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            64 =>
            array(
                'id' => 65,
                'language_id' => 2,
                'label_id' => 22,
                'value' => 'Уведомления',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            65 =>
            array(
                'id' => 66,
                'language_id' => 3,
                'label_id' => 22,
                'value' => 'Varsler',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            66 =>
            array(
                'id' => 67,
                'language_id' => 1,
                'label_id' => 23,
                'value' => 'Chat Setting',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            67 =>
            array(
                'id' => 68,
                'language_id' => 2,
                'label_id' => 23,
                'value' => 'Настройки чата',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            68 =>
            array(
                'id' => 69,
                'language_id' => 3,
                'label_id' => 23,
                'value' => 'Chat-innstillinger',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            69 =>
            array(
                'id' => 70,
                'language_id' => 1,
                'label_id' => 24,
                'value' => 'Update',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            70 =>
            array(
                'id' => 71,
                'language_id' => 2,
                'label_id' => 24,
                'value' => 'Обновить',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            71 =>
            array(
                'id' => 72,
                'language_id' => 3,
                'label_id' => 24,
                'value' => 'Oppdater',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            72 =>
            array(
                'id' => 73,
                'language_id' => 1,
                'label_id' => 25,
                'value' => 'My followers only',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            73 =>
            array(
                'id' => 74,
                'language_id' => 2,
                'label_id' => 25,
                'value' => 'Только мои подписчики',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            74 =>
            array(
                'id' => 75,
                'language_id' => 3,
                'label_id' => 25,
                'value' => 'Bare mine følgere',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            75 =>
            array(
                'id' => 76,
                'language_id' => 1,
                'label_id' => 26,
                'value' => 'Two way followings',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            76 =>
            array(
                'id' => 77,
                'language_id' => 2,
                'label_id' => 26,
                'value' => 'Двусторонние подписки',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            77 =>
            array(
                'id' => 78,
                'language_id' => 3,
                'label_id' => 26,
                'value' => 'To-veis følgere',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            78 =>
            array(
                'id' => 79,
                'language_id' => 1,
                'label_id' => 27,
                'value' => 'typing...',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            79 =>
            array(
                'id' => 80,
                'language_id' => 2,
                'label_id' => 27,
                'value' => 'печатает...',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            80 =>
            array(
                'id' => 81,
                'language_id' => 3,
                'label_id' => 27,
                'value' => 'skriver...',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            81 =>
            array(
                'id' => 82,
                'language_id' => 1,
                'label_id' => 28,
                'value' => 'is typing..',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            82 =>
            array(
                'id' => 83,
                'language_id' => 2,
                'label_id' => 28,
                'value' => 'печатает..',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            83 =>
            array(
                'id' => 84,
                'language_id' => 3,
                'label_id' => 28,
                'value' => 'skriver..',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            84 =>
            array(
                'id' => 85,
                'language_id' => 1,
                'label_id' => 29,
                'value' => 'Say something',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            85 =>
            array(
                'id' => 86,
                'language_id' => 2,
                'label_id' => 29,
                'value' => 'Скажи что-нибудь',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            86 =>
            array(
                'id' => 87,
                'language_id' => 3,
                'label_id' => 29,
                'value' => 'Si noe',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            87 =>
            array(
                'id' => 88,
                'language_id' => 1,
                'label_id' => 30,
                'value' => 'Registered Email Address',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            88 =>
            array(
                'id' => 89,
                'language_id' => 2,
                'label_id' => 30,
                'value' => 'Зарегистрированный адрес электронной почты',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            89 =>
            array(
                'id' => 90,
                'language_id' => 3,
                'label_id' => 30,
                'value' => 'Registrert e-postadresse',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            90 =>
            array(
                'id' => 91,
                'language_id' => 1,
                'label_id' => 31,
                'value' => 'No Recents',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            91 =>
            array(
                'id' => 92,
                'language_id' => 2,
                'label_id' => 31,
                'value' => 'Нет недавних',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            92 =>
            array(
                'id' => 93,
                'language_id' => 3,
                'label_id' => 31,
                'value' => 'Ingen nylige',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            93 =>
            array(
                'id' => 94,
                'language_id' => 1,
                'label_id' => 32,
                'value' => 'Complete Profile',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            94 =>
            array(
                'id' => 95,
                'language_id' => 2,
                'label_id' => 32,
                'value' => 'Заполните профиль',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            95 =>
            array(
                'id' => 96,
                'language_id' => 3,
                'label_id' => 32,
                'value' => 'Fullfør profil',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            96 =>
            array(
                'id' => 97,
                'language_id' => 1,
                'label_id' => 33,
                'value' => 'PROFILE PICTURE',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            97 =>
            array(
                'id' => 98,
                'language_id' => 2,
                'label_id' => 33,
                'value' => 'Аватар',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            98 =>
            array(
                'id' => 99,
                'language_id' => 3,
                'label_id' => 33,
                'value' => 'Profilbilde',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            99 =>
            array(
                'id' => 100,
                'language_id' => 1,
                'label_id' => 34,
                'value' => 'Full Name',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            100 =>
            array(
                'id' => 101,
                'language_id' => 2,
                'label_id' => 34,
                'value' => 'Полное имя',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            101 =>
            array(
                'id' => 102,
                'language_id' => 3,
                'label_id' => 34,
                'value' => 'Fullt navn',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            102 =>
            array(
                'id' => 103,
                'language_id' => 1,
                'label_id' => 35,
                'value' => 'Email Address',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            103 =>
            array(
                'id' => 104,
                'language_id' => 2,
                'label_id' => 35,
                'value' => 'Адрес электронной почты',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            104 =>
            array(
                'id' => 105,
                'language_id' => 3,
                'label_id' => 35,
                'value' => 'E-postadresse',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            105 =>
            array(
                'id' => 106,
                'language_id' => 1,
                'label_id' => 36,
                'value' => 'Username',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            106 =>
            array(
                'id' => 107,
                'language_id' => 2,
                'label_id' => 36,
                'value' => 'Имя пользователя',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            107 =>
            array(
                'id' => 108,
                'language_id' => 3,
                'label_id' => 36,
                'value' => 'Brukernavn',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            108 =>
            array(
                'id' => 109,
                'language_id' => 1,
                'label_id' => 37,
                'value' => 'Date of birth field is required!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            109 =>
            array(
                'id' => 110,
                'language_id' => 2,
                'label_id' => 37,
                'value' => 'Требуется поле даты рождения!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            110 =>
            array(
                'id' => 111,
                'language_id' => 3,
                'label_id' => 37,
                'value' => 'Fødselsdato feltet er påkrevd!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            111 =>
            array(
                'id' => 112,
                'language_id' => 1,
                'label_id' => 38,
                'value' => 'Date of Birth',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            112 =>
            array(
                'id' => 113,
                'language_id' => 2,
                'label_id' => 38,
                'value' => 'Дата рождения',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            113 =>
            array(
                'id' => 114,
                'language_id' => 3,
                'label_id' => 38,
                'value' => 'Fødselsdato',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            114 =>
            array(
                'id' => 115,
                'language_id' => 1,
                'label_id' => 39,
                'value' => 'Password',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            115 =>
            array(
                'id' => 116,
                'language_id' => 2,
                'label_id' => 39,
                'value' => 'Пароль',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            116 =>
            array(
                'id' => 117,
                'language_id' => 3,
                'label_id' => 39,
                'value' => 'Passord',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            117 =>
            array(
                'id' => 118,
                'language_id' => 1,
                'label_id' => 40,
                'value' => 'Select Gender',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            118 =>
            array(
                'id' => 119,
                'language_id' => 2,
                'label_id' => 40,
                'value' => 'Выберите пол',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            119 =>
            array(
                'id' => 120,
                'language_id' => 3,
                'label_id' => 40,
                'value' => 'Velg kjønn',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            120 =>
            array(
                'id' => 121,
                'language_id' => 1,
                'label_id' => 41,
                'value' => 'Search',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            121 =>
            array(
                'id' => 122,
                'language_id' => 2,
                'label_id' => 41,
                'value' => 'Поиск',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            122 =>
            array(
                'id' => 123,
                'language_id' => 3,
                'label_id' => 41,
                'value' => 'Søk',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            123 =>
            array(
                'id' => 124,
                'language_id' => 1,
                'label_id' => 42,
                'value' => 'Chat',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            124 =>
            array(
                'id' => 125,
                'language_id' => 2,
                'label_id' => 42,
                'value' => 'Чат',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            125 =>
            array(
                'id' => 126,
                'language_id' => 3,
                'label_id' => 42,
                'value' => 'Chat',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            126 =>
            array(
                'id' => 127,
                'language_id' => 1,
                'label_id' => 43,
                'value' => 'People',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            127 =>
            array(
                'id' => 128,
                'language_id' => 2,
                'label_id' => 43,
                'value' => 'Люди',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            128 =>
            array(
                'id' => 129,
                'language_id' => 3,
                'label_id' => 43,
                'value' => 'Folk',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            129 =>
            array(
                'id' => 130,
                'language_id' => 1,
                'label_id' => 44,
                'value' => 'No conversation yet.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            130 =>
            array(
                'id' => 131,
                'language_id' => 2,
                'label_id' => 44,
                'value' => 'Пока нет разговоров.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            131 =>
            array(
                'id' => 132,
                'language_id' => 3,
                'label_id' => 44,
                'value' => 'Ingen samtaler ennå.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            132 =>
            array(
                'id' => 133,
                'language_id' => 1,
                'label_id' => 45,
                'value' => 'REPORT SUBMITTED!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            133 =>
            array(
                'id' => 134,
                'language_id' => 2,
                'label_id' => 45,
                'value' => 'ОТЧЕТ ПРЕДСТАВЛЕН!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            134 =>
            array(
                'id' => 135,
                'language_id' => 3,
                'label_id' => 45,
                'value' => 'RAPPORT LEVERT!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            135 =>
            array(
                'id' => 136,
                'language_id' => 1,
                'label_id' => 46,
                'value' => 'REPORT',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            136 =>
            array(
                'id' => 137,
                'language_id' => 2,
                'label_id' => 46,
                'value' => 'ОТЧЕТ',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            137 =>
            array(
                'id' => 138,
                'language_id' => 3,
                'label_id' => 46,
                'value' => 'RAPPORT',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            138 =>
            array(
                'id' => 139,
                'language_id' => 1,
                'label_id' => 47,
                'value' => 'Pending',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            139 =>
            array(
                'id' => 140,
                'language_id' => 2,
                'label_id' => 47,
                'value' => 'В ожидании',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            140 =>
            array(
                'id' => 141,
                'language_id' => 3,
                'label_id' => 47,
                'value' => 'Avventer',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            141 =>
            array(
                'id' => 142,
                'language_id' => 1,
                'label_id' => 48,
                'value' => 'Verification Pending',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            142 =>
            array(
                'id' => 143,
                'language_id' => 2,
                'label_id' => 48,
                'value' => 'Проверка в ожидании',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            143 =>
            array(
                'id' => 144,
                'language_id' => 3,
                'label_id' => 48,
                'value' => 'Verifisering avventer',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            144 =>
            array(
                'id' => 145,
                'language_id' => 1,
                'label_id' => 49,
                'value' => 'Select Type',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            145 =>
            array(
                'id' => 146,
                'language_id' => 2,
                'label_id' => 49,
                'value' => 'Выберите тип',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            146 =>
            array(
                'id' => 147,
                'language_id' => 3,
                'label_id' => 49,
                'value' => 'Velg type',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            147 =>
            array(
                'id' => 148,
                'language_id' => 1,
                'label_id' => 50,
                'value' => 'This field is required!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            148 =>
            array(
                'id' => 149,
                'language_id' => 2,
                'label_id' => 50,
                'value' => 'Это поле обязательно!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            149 =>
            array(
                'id' => 150,
                'language_id' => 3,
                'label_id' => 50,
                'value' => 'Dette feltet er påkrevd!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            150 =>
            array(
                'id' => 151,
                'language_id' => 1,
                'label_id' => 51,
                'value' => 'Description',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            151 =>
            array(
                'id' => 152,
                'language_id' => 2,
                'label_id' => 51,
                'value' => 'Описание',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            152 =>
            array(
                'id' => 153,
                'language_id' => 3,
                'label_id' => 51,
                'value' => 'Beskrivelse',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            153 =>
            array(
                'id' => 154,
                'language_id' => 1,
                'label_id' => 52,
                'value' => 'Submit',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            154 =>
            array(
                'id' => 155,
                'language_id' => 2,
                'label_id' => 52,
                'value' => 'Отправить',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            155 =>
            array(
                'id' => 156,
                'language_id' => 3,
                'label_id' => 52,
                'value' => 'Send inn',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            156 =>
            array(
                'id' => 157,
                'language_id' => 1,
                'label_id' => 53,
                'value' => 'Cancel',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            157 =>
            array(
                'id' => 158,
                'language_id' => 2,
                'label_id' => 53,
                'value' => 'Отмена',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            158 =>
            array(
                'id' => 159,
                'language_id' => 3,
                'label_id' => 53,
                'value' => 'Avbryt',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            159 =>
            array(
                'id' => 160,
                'language_id' => 1,
                'label_id' => 54,
                'value' => 'Verified',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            160 =>
            array(
                'id' => 161,
                'language_id' => 2,
                'label_id' => 54,
                'value' => 'Проверенный',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            161 =>
            array(
                'id' => 162,
                'language_id' => 3,
                'label_id' => 54,
                'value' => 'Verifisert',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            162 =>
            array(
                'id' => 163,
                'language_id' => 1,
                'label_id' => 55,
                'value' => 'Rejected',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            163 =>
            array(
                'id' => 164,
                'language_id' => 2,
                'label_id' => 55,
                'value' => 'Отклоненный',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            164 =>
            array(
                'id' => 165,
                'language_id' => 3,
                'label_id' => 55,
                'value' => 'Avvist',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            165 =>
            array(
                'id' => 166,
                'language_id' => 1,
                'label_id' => 56,
                'value' => 'Email Verification',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            166 =>
            array(
                'id' => 167,
                'language_id' => 2,
                'label_id' => 56,
                'value' => 'Проверка почты',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            167 =>
            array(
                'id' => 168,
                'language_id' => 3,
                'label_id' => 56,
                'value' => 'E-post verifisering',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            168 =>
            array(
                'id' => 169,
                'language_id' => 1,
                'label_id' => 57,
                'value' => 'Re-submit',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            169 =>
            array(
                'id' => 170,
                'language_id' => 2,
                'label_id' => 57,
                'value' => 'Повторно представить',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            170 =>
            array(
                'id' => 171,
                'language_id' => 3,
                'label_id' => 57,
                'value' => 'Send inn på nytt',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            171 =>
            array(
                'id' => 172,
                'language_id' => 1,
                'label_id' => 58,
                'value' => 'Please enter full name',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            172 =>
            array(
                'id' => 173,
                'language_id' => 2,
                'label_id' => 58,
                'value' => 'Пожалуйста, введите полное имя',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            173 =>
            array(
                'id' => 174,
                'language_id' => 3,
                'label_id' => 58,
                'value' => 'Vennligst skriv inn fullt navn',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            174 =>
            array(
                'id' => 175,
                'language_id' => 1,
                'label_id' => 59,
                'value' => 'Not Applied',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            175 =>
            array(
                'id' => 176,
                'language_id' => 2,
                'label_id' => 59,
                'value' => 'Не применяется',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            176 =>
            array(
                'id' => 177,
                'language_id' => 3,
                'label_id' => 59,
                'value' => 'Ikke søkt',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            177 =>
            array(
                'id' => 178,
                'language_id' => 1,
                'label_id' => 60,
                'value' => 'Verified Already',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            178 =>
            array(
                'id' => 179,
                'language_id' => 2,
                'label_id' => 60,
                'value' => 'Уже проверено',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            179 =>
            array(
                'id' => 180,
                'language_id' => 3,
                'label_id' => 60,
                'value' => 'Allerede verifisert',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            180 =>
            array(
                'id' => 181,
                'language_id' => 1,
                'label_id' => 61,
                'value' => 'Thanks for reporting. If we find this content to be in violation of our Guidelines, we will remove it.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            181 =>
            array(
                'id' => 182,
                'language_id' => 2,
                'label_id' => 61,
                'value' => 'Спасибо за ваше сообщение. Если мы обнаружим нарушение наших правил в этом контенте, мы его удалим.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            182 =>
            array(
                'id' => 183,
                'language_id' => 3,
                'label_id' => 61,
                'value' => 'Takk for rapporteringen. Hvis vi finner at dette innholdet bryter retningslinjene våre, vil vi fjerne det.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            183 =>
            array(
                'id' => 184,
                'language_id' => 1,
                'label_id' => 62,
                'value' => 'Tap again to exit an app.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            184 =>
            array(
                'id' => 185,
                'language_id' => 2,
                'label_id' => 62,
                'value' => 'Нажмите еще раз, чтобы выйти из приложения.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            185 =>
            array(
                'id' => 186,
                'language_id' => 3,
                'label_id' => 62,
                'value' => 'Trykk igjen for å avslutte en app.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            186 =>
            array(
                'id' => 187,
                'language_id' => 1,
                'label_id' => 63,
                'value' => 'Add a comment',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            187 =>
            array(
                'id' => 188,
                'language_id' => 2,
                'label_id' => 63,
                'value' => 'Добавить комментарий',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            188 =>
            array(
                'id' => 189,
                'language_id' => 3,
                'label_id' => 63,
                'value' => 'Legg til en kommentar',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            189 =>
            array(
                'id' => 190,
                'language_id' => 1,
                'label_id' => 64,
                'value' => 'Delete Confirmation',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            190 =>
            array(
                'id' => 191,
                'language_id' => 2,
                'label_id' => 64,
                'value' => 'Подтверждение удаления',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            191 =>
            array(
                'id' => 192,
                'language_id' => 3,
                'label_id' => 64,
                'value' => 'Bekreft sletting',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            192 =>
            array(
                'id' => 193,
                'language_id' => 1,
                'label_id' => 65,
                'value' => 'Do you really want to delete this comment',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            193 =>
            array(
                'id' => 194,
                'language_id' => 2,
                'label_id' => 65,
                'value' => 'Вы действительно хотите удалить этот комментарий',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            194 =>
            array(
                'id' => 195,
                'language_id' => 3,
                'label_id' => 65,
                'value' => 'Vil du virkelig slette denne kommentaren',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            195 =>
            array(
                'id' => 196,
                'language_id' => 1,
                'label_id' => 66,
                'value' => 'Edit',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            196 =>
            array(
                'id' => 197,
                'language_id' => 2,
                'label_id' => 66,
                'value' => 'Редактировать',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            197 =>
            array(
                'id' => 198,
                'language_id' => 3,
                'label_id' => 66,
                'value' => 'Rediger',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            198 =>
            array(
                'id' => 199,
                'language_id' => 1,
                'label_id' => 67,
                'value' => 'Delete',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            199 =>
            array(
                'id' => 200,
                'language_id' => 2,
                'label_id' => 67,
                'value' => 'Удалить',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            200 =>
            array(
                'id' => 201,
                'language_id' => 3,
                'label_id' => 67,
                'value' => 'Slett',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            201 =>
            array(
                'id' => 202,
                'language_id' => 1,
                'label_id' => 68,
                'value' => 'My Videos',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            202 =>
            array(
                'id' => 203,
                'language_id' => 2,
                'label_id' => 68,
                'value' => 'Мои видео',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            203 =>
            array(
                'id' => 204,
                'language_id' => 3,
                'label_id' => 68,
                'value' => 'Mine videoer',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            204 =>
            array(
                'id' => 205,
                'language_id' => 1,
                'label_id' => 69,
                'value' => 'Videos',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            205 =>
            array(
                'id' => 206,
                'language_id' => 2,
                'label_id' => 69,
                'value' => 'Видео',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            206 =>
            array(
                'id' => 207,
                'language_id' => 3,
                'label_id' => 69,
                'value' => 'Videoer',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            207 =>
            array(
                'id' => 208,
                'language_id' => 1,
                'label_id' => 70,
                'value' => 'This is your feed of user you follow.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            208 =>
            array(
                'id' => 209,
                'language_id' => 2,
                'label_id' => 70,
                'value' => 'Это ваша лента пользователей, которых вы подписались.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            209 =>
            array(
                'id' => 210,
                'language_id' => 3,
                'label_id' => 70,
                'value' => 'Dette er strømmen din av brukere du følger.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            210 =>
            array(
                'id' => 211,
                'language_id' => 1,
                'label_id' => 71,
                'value' => 'You can follow people or subscribe to hashtags.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            211 =>
            array(
                'id' => 212,
                'language_id' => 2,
                'label_id' => 71,
                'value' => 'Вы можете подписываться на пользователей или подписываться на хэштеги.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            212 =>
            array(
                'id' => 213,
                'language_id' => 3,
                'label_id' => 71,
                'value' => 'Du kan følge personer eller abonnere på emneknagger.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            213 =>
            array(
                'id' => 214,
                'language_id' => 1,
                'label_id' => 72,
                'value' => 'Name field is required!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            214 =>
            array(
                'id' => 215,
                'language_id' => 2,
                'label_id' => 72,
                'value' => 'Поле имени обязательно для заполнения!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            215 =>
            array(
                'id' => 216,
                'language_id' => 3,
                'label_id' => 72,
                'value' => 'Navn feltet er påkrevd!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            216 =>
            array(
                'id' => 217,
                'language_id' => 1,
                'label_id' => 73,
                'value' => 'Please enter valid full name',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            217 =>
            array(
                'id' => 218,
                'language_id' => 2,
                'label_id' => 73,
                'value' => 'Пожалуйста, введите действительное полное имя',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            218 =>
            array(
                'id' => 219,
                'language_id' => 3,
                'label_id' => 73,
                'value' => 'Vennligst skriv inn gyldig fullt navn',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            219 =>
            array(
                'id' => 220,
                'language_id' => 1,
                'label_id' => 74,
                'value' => 'Address Field is required',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            220 =>
            array(
                'id' => 221,
                'language_id' => 2,
                'label_id' => 74,
                'value' => 'Требуется поле адреса',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            221 =>
            array(
                'id' => 222,
                'language_id' => 3,
                'label_id' => 74,
                'value' => 'Adressefelt er påkrevd',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            222 =>
            array(
                'id' => 223,
                'language_id' => 1,
                'label_id' => 75,
                'value' => 'Front Side of ID document is required',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            223 =>
            array(
                'id' => 224,
                'language_id' => 2,
                'label_id' => 75,
                'value' => 'Требуется передняя сторона документа ID',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            224 =>
            array(
                'id' => 225,
                'language_id' => 3,
                'label_id' => 75,
                'value' => 'Forside av ID-dokumentet er påkrevd',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            225 =>
            array(
                'id' => 226,
                'language_id' => 1,
                'label_id' => 76,
                'value' => 'Enter Your Name',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            226 =>
            array(
                'id' => 227,
                'language_id' => 2,
                'label_id' => 76,
                'value' => 'Введите ваше имя',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            227 =>
            array(
                'id' => 228,
                'language_id' => 3,
                'label_id' => 76,
                'value' => 'Skriv inn ditt navn',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            228 =>
            array(
                'id' => 229,
                'language_id' => 1,
                'label_id' => 77,
                'value' => 'Email field is required!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            229 =>
            array(
                'id' => 230,
                'language_id' => 2,
                'label_id' => 77,
                'value' => 'Поле электронной почты обязательно для заполнения!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            230 =>
            array(
                'id' => 231,
                'language_id' => 3,
                'label_id' => 77,
                'value' => 'E-postfelt er påkrevd!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            231 =>
            array(
                'id' => 232,
                'language_id' => 1,
                'label_id' => 78,
                'value' => 'Please enter valid email',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            232 =>
            array(
                'id' => 233,
                'language_id' => 2,
                'label_id' => 78,
                'value' => 'Пожалуйста, введите действительный адрес электронной почты',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            233 =>
            array(
                'id' => 234,
                'language_id' => 3,
                'label_id' => 78,
                'value' => 'Vennligst skriv inn gyldig e-postadresse',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            234 =>
            array(
                'id' => 235,
                'language_id' => 1,
                'label_id' => 79,
                'value' => 'Enter Email',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            235 =>
            array(
                'id' => 236,
                'language_id' => 2,
                'label_id' => 79,
                'value' => 'Введите адрес электронной почты',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            236 =>
            array(
                'id' => 237,
                'language_id' => 3,
                'label_id' => 79,
                'value' => 'Skriv inn e-postadresse',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            237 =>
            array(
                'id' => 238,
                'language_id' => 1,
                'label_id' => 80,
                'value' => 'Username field is required!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            238 =>
            array(
                'id' => 239,
                'language_id' => 2,
                'label_id' => 80,
                'value' => 'Поле имени пользователя обязательно для заполнения!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            239 =>
            array(
                'id' => 240,
                'language_id' => 3,
                'label_id' => 80,
                'value' => 'Brukernavnfeltet er påkrevd!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            240 =>
            array(
                'id' => 241,
                'language_id' => 1,
                'label_id' => 81,
                'value' => 'Enter Username',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            241 =>
            array(
                'id' => 242,
                'language_id' => 2,
                'label_id' => 81,
                'value' => 'Введите имя пользователя',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            242 =>
            array(
                'id' => 243,
                'language_id' => 3,
                'label_id' => 81,
                'value' => 'Skriv inn brukernavn',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            243 =>
            array(
                'id' => 244,
                'language_id' => 1,
                'label_id' => 82,
                'value' => 'Mobile field is required!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            244 =>
            array(
                'id' => 245,
                'language_id' => 2,
                'label_id' => 82,
                'value' => 'Поле мобильного телефона обязательно для заполнения!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            245 =>
            array(
                'id' => 246,
                'language_id' => 3,
                'label_id' => 82,
                'value' => 'Mobilfeltet er påkrevd!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            246 =>
            array(
                'id' => 247,
                'language_id' => 1,
                'label_id' => 83,
                'value' => 'Please enter valid mobile no',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            247 =>
            array(
                'id' => 248,
                'language_id' => 2,
                'label_id' => 83,
                'value' => 'Пожалуйста, введите действительный номер мобильного телефона',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            248 =>
            array(
                'id' => 249,
                'language_id' => 3,
                'label_id' => 83,
                'value' => 'Vennligst skriv inn gyldig mobilnummer',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            249 =>
            array(
                'id' => 250,
                'language_id' => 1,
                'label_id' => 84,
                'value' => 'Enter Mobile No.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            250 =>
            array(
                'id' => 251,
                'language_id' => 2,
                'label_id' => 84,
                'value' => 'Введите номер мобильного телефона',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            251 =>
            array(
                'id' => 252,
                'language_id' => 3,
                'label_id' => 84,
                'value' => 'Skriv inn mobilnummer',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            252 =>
            array(
                'id' => 253,
                'language_id' => 1,
                'label_id' => 85,
                'value' => 'Enter Bio (80 chars)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            253 =>
            array(
                'id' => 254,
                'language_id' => 2,
                'label_id' => 85,
                'value' => 'Введите биографию (80 символов)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            254 =>
            array(
                'id' => 255,
                'language_id' => 3,
                'label_id' => 85,
                'value' => 'Skriv inn bio (80 tegn)',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            255 =>
            array(
                'id' => 256,
                'language_id' => 1,
                'label_id' => 86,
                'value' => 'Edit Profile',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            256 =>
            array(
                'id' => 257,
                'language_id' => 2,
                'label_id' => 86,
                'value' => 'Редактировать профиль',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            257 =>
            array(
                'id' => 258,
                'language_id' => 3,
                'label_id' => 86,
                'value' => 'Rediger profil',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            258 =>
            array(
                'id' => 259,
                'language_id' => 1,
                'label_id' => 87,
                'value' => 'Camera',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            259 =>
            array(
                'id' => 260,
                'language_id' => 2,
                'label_id' => 87,
                'value' => 'Камера',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            260 =>
            array(
                'id' => 261,
                'language_id' => 3,
                'label_id' => 87,
                'value' => 'Kamera',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            261 =>
            array(
                'id' => 262,
                'language_id' => 1,
                'label_id' => 88,
                'value' => 'Gallery',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            262 =>
            array(
                'id' => 263,
                'language_id' => 2,
                'label_id' => 88,
                'value' => 'Галерея',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            263 =>
            array(
                'id' => 264,
                'language_id' => 3,
                'label_id' => 88,
                'value' => 'Galleri',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            264 =>
            array(
                'id' => 265,
                'language_id' => 1,
                'label_id' => 89,
                'value' => 'View Picture',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            265 =>
            array(
                'id' => 266,
                'language_id' => 2,
                'label_id' => 89,
                'value' => 'Просмотр фотографии',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            266 =>
            array(
                'id' => 267,
                'language_id' => 3,
                'label_id' => 89,
                'value' => 'Vis bilde',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            267 =>
            array(
                'id' => 268,
                'language_id' => 1,
                'label_id' => 90,
                'value' => 'Name',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            268 =>
            array(
                'id' => 269,
                'language_id' => 2,
                'label_id' => 90,
                'value' => 'Имя',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            269 =>
            array(
                'id' => 270,
                'language_id' => 3,
                'label_id' => 90,
                'value' => 'Navn',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            270 =>
            array(
                'id' => 271,
                'language_id' => 1,
                'label_id' => 91,
                'value' => 'Email',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            271 =>
            array(
                'id' => 272,
                'language_id' => 2,
                'label_id' => 91,
                'value' => 'Электронная почта',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            272 =>
            array(
                'id' => 273,
                'language_id' => 3,
                'label_id' => 91,
                'value' => 'E-post',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            273 =>
            array(
                'id' => 274,
                'language_id' => 1,
                'label_id' => 92,
                'value' => 'Gender',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            274 =>
            array(
                'id' => 275,
                'language_id' => 2,
                'label_id' => 92,
                'value' => 'Пол',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            275 =>
            array(
                'id' => 276,
                'language_id' => 3,
                'label_id' => 92,
                'value' => 'Kjønn',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            276 =>
            array(
                'id' => 277,
                'language_id' => 1,
                'label_id' => 93,
                'value' => 'Mobile',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            277 =>
            array(
                'id' => 278,
                'language_id' => 2,
                'label_id' => 93,
                'value' => 'Мобильный',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            278 =>
            array(
                'id' => 279,
                'language_id' => 3,
                'label_id' => 93,
                'value' => 'Mobil',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            279 =>
            array(
                'id' => 280,
                'language_id' => 1,
                'label_id' => 94,
                'value' => 'DOB',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            280 =>
            array(
                'id' => 281,
                'language_id' => 2,
                'label_id' => 94,
                'value' => 'Дата рождения',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            281 =>
            array(
                'id' => 282,
                'language_id' => 3,
                'label_id' => 94,
                'value' => 'Fødselsdato',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            282 =>
            array(
                'id' => 283,
                'language_id' => 1,
                'label_id' => 95,
                'value' => 'Bio',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            283 =>
            array(
                'id' => 284,
                'language_id' => 2,
                'label_id' => 95,
                'value' => 'Био',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            284 =>
            array(
                'id' => 285,
                'language_id' => 3,
                'label_id' => 95,
                'value' => 'Bio',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            285 =>
            array(
                'id' => 286,
                'language_id' => 1,
                'label_id' => 96,
                'value' => 'Edit Post',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            286 =>
            array(
                'id' => 287,
                'language_id' => 2,
                'label_id' => 96,
                'value' => 'Редактировать пост',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            287 =>
            array(
                'id' => 288,
                'language_id' => 3,
                'label_id' => 96,
                'value' => 'Rediger innlegg',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            288 =>
            array(
                'id' => 289,
                'language_id' => 1,
                'label_id' => 97,
                'value' => 'Description is required!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            289 =>
            array(
                'id' => 290,
                'language_id' => 2,
                'label_id' => 97,
                'value' => 'Требуется описание!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            290 =>
            array(
                'id' => 291,
                'language_id' => 3,
                'label_id' => 97,
                'value' => 'Beskrivelse er påkrevd!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            291 =>
            array(
                'id' => 292,
                'language_id' => 1,
                'label_id' => 98,
                'value' => 'Enter Video Description',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            292 =>
            array(
                'id' => 293,
                'language_id' => 2,
                'label_id' => 98,
                'value' => 'Введите описание видео',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            293 =>
            array(
                'id' => 294,
                'language_id' => 3,
                'label_id' => 98,
                'value' => 'Skriv inn videobeskrivelse',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            294 =>
            array(
                'id' => 295,
                'language_id' => 1,
                'label_id' => 99,
                'value' => 'Privacy Setting',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            295 =>
            array(
                'id' => 296,
                'language_id' => 2,
                'label_id' => 99,
                'value' => 'Настройка конфиденциальности',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            296 =>
            array(
                'id' => 297,
                'language_id' => 3,
                'label_id' => 99,
                'value' => 'Personverninnstilling',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            297 =>
            array(
                'id' => 298,
                'language_id' => 1,
                'label_id' => 100,
                'value' => 'Followers',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            298 =>
            array(
                'id' => 299,
                'language_id' => 2,
                'label_id' => 100,
                'value' => 'Подписчики',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            299 =>
            array(
                'id' => 300,
                'language_id' => 3,
                'label_id' => 100,
                'value' => 'Følgere',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            300 =>
            array(
                'id' => 301,
                'language_id' => 1,
                'label_id' => 101,
                'value' => 'You',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            301 =>
            array(
                'id' => 302,
                'language_id' => 2,
                'label_id' => 101,
                'value' => 'Вы',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            302 =>
            array(
                'id' => 303,
                'language_id' => 3,
                'label_id' => 101,
                'value' => 'Du',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            303 =>
            array(
                'id' => 304,
                'language_id' => 1,
                'label_id' => 102,
                'value' => 'Follow',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            304 =>
            array(
                'id' => 305,
                'language_id' => 2,
                'label_id' => 102,
                'value' => 'Подписаться',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            305 =>
            array(
                'id' => 306,
                'language_id' => 3,
                'label_id' => 102,
                'value' => 'Følg',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            306 =>
            array(
                'id' => 307,
                'language_id' => 1,
                'label_id' => 103,
                'value' => 'Unfollow',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            307 =>
            array(
                'id' => 308,
                'language_id' => 2,
                'label_id' => 103,
                'value' => 'Отписаться',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            308 =>
            array(
                'id' => 309,
                'language_id' => 3,
                'label_id' => 103,
                'value' => 'Slutt å følge',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            309 =>
            array(
                'id' => 310,
                'language_id' => 1,
                'label_id' => 104,
                'value' => 'Forgot Password',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            310 =>
            array(
                'id' => 311,
                'language_id' => 2,
                'label_id' => 104,
                'value' => 'Забыли пароль',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            311 =>
            array(
                'id' => 312,
                'language_id' => 3,
                'label_id' => 104,
                'value' => 'Glemt passord',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            312 =>
            array(
                'id' => 313,
                'language_id' => 1,
                'label_id' => 105,
                'value' => 'Send OTP',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            313 =>
            array(
                'id' => 314,
                'language_id' => 2,
                'label_id' => 105,
                'value' => 'Отправить OTP',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            314 =>
            array(
                'id' => 315,
                'language_id' => 3,
                'label_id' => 105,
                'value' => 'Send engangskode',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            315 =>
            array(
                'id' => 316,
                'language_id' => 1,
                'label_id' => 106,
                'value' => 'Enter OTP',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            316 =>
            array(
                'id' => 317,
                'language_id' => 2,
                'label_id' => 106,
                'value' => 'Введите OTP',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            317 =>
            array(
                'id' => 318,
                'language_id' => 3,
                'label_id' => 106,
                'value' => 'Skriv inn engangskode',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            318 =>
            array(
                'id' => 319,
                'language_id' => 1,
                'label_id' => 107,
                'value' => 'OTP',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            319 =>
            array(
                'id' => 320,
                'language_id' => 2,
                'label_id' => 107,
                'value' => 'OTP',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            320 =>
            array(
                'id' => 321,
                'language_id' => 3,
                'label_id' => 107,
                'value' => 'Engangskode',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            321 =>
            array(
                'id' => 322,
                'language_id' => 1,
                'label_id' => 108,
                'value' => 'No record found',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            322 =>
            array(
                'id' => 323,
                'language_id' => 2,
                'label_id' => 108,
                'value' => 'Записи не найдены',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            323 =>
            array(
                'id' => 324,
                'language_id' => 3,
                'label_id' => 108,
                'value' => 'Ingen poster funnet',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            324 =>
            array(
                'id' => 325,
                'language_id' => 1,
                'label_id' => 109,
                'value' => 'Start Chat',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            325 =>
            array(
                'id' => 326,
                'language_id' => 2,
                'label_id' => 109,
                'value' => 'Начать чат',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            326 =>
            array(
                'id' => 327,
                'language_id' => 3,
                'label_id' => 109,
                'value' => 'Start samtale',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            327 =>
            array(
                'id' => 328,
                'language_id' => 1,
                'label_id' => 110,
                'value' => 'No Videos Found',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            328 =>
            array(
                'id' => 329,
                'language_id' => 2,
                'label_id' => 110,
                'value' => 'Видео не найдены',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            329 =>
            array(
                'id' => 330,
                'language_id' => 3,
                'label_id' => 110,
                'value' => 'Ingen videoer funnet',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            330 =>
            array(
                'id' => 331,
                'language_id' => 1,
                'label_id' => 111,
                'value' => 'Logout',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            331 =>
            array(
                'id' => 332,
                'language_id' => 2,
                'label_id' => 111,
                'value' => 'Выйти',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            332 =>
            array(
                'id' => 333,
                'language_id' => 3,
                'label_id' => 111,
                'value' => 'Logg ut',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            333 =>
            array(
                'id' => 334,
                'language_id' => 1,
                'label_id' => 112,
                'value' => 'Challenges',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            334 =>
            array(
                'id' => 335,
                'language_id' => 2,
                'label_id' => 112,
                'value' => 'Задания',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            335 =>
            array(
                'id' => 336,
                'language_id' => 3,
                'label_id' => 112,
                'value' => 'Utfordringer',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            336 =>
            array(
                'id' => 337,
                'language_id' => 1,
                'label_id' => 113,
                'value' => 'Top Videos',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            337 =>
            array(
                'id' => 338,
                'language_id' => 2,
                'label_id' => 113,
                'value' => 'Лучшие видео',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            338 =>
            array(
                'id' => 339,
                'language_id' => 3,
                'label_id' => 113,
                'value' => 'Topp videoer',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            339 =>
            array(
                'id' => 340,
                'language_id' => 1,
                'label_id' => 114,
                'value' => 'Recommended',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            340 =>
            array(
                'id' => 341,
                'language_id' => 2,
                'label_id' => 114,
                'value' => 'Рекомендуемые',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            341 =>
            array(
                'id' => 342,
                'language_id' => 3,
                'label_id' => 114,
                'value' => 'Anbefalte',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            342 =>
            array(
                'id' => 343,
                'language_id' => 1,
                'label_id' => 115,
                'value' => 'There is some error updating profile',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            343 =>
            array(
                'id' => 344,
                'language_id' => 2,
                'label_id' => 115,
                'value' => 'Произошла ошибка при обновлении профиля',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            344 =>
            array(
                'id' => 345,
                'language_id' => 3,
                'label_id' => 115,
                'value' => 'Det oppstod en feil under oppdatering av profil',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            345 =>
            array(
                'id' => 346,
                'language_id' => 1,
                'label_id' => 116,
                'value' => 'Tags',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            346 =>
            array(
                'id' => 347,
                'language_id' => 2,
                'label_id' => 116,
                'value' => 'Теги',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            347 =>
            array(
                'id' => 348,
                'language_id' => 3,
                'label_id' => 116,
                'value' => 'Tags',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            348 =>
            array(
                'id' => 349,
                'language_id' => 1,
                'label_id' => 117,
                'value' => 'Start:',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            349 =>
            array(
                'id' => 350,
                'language_id' => 2,
                'label_id' => 117,
                'value' => 'Начало:',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            350 =>
            array(
                'id' => 351,
                'language_id' => 3,
                'label_id' => 117,
                'value' => 'Start:',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            351 =>
            array(
                'id' => 352,
                'language_id' => 1,
                'label_id' => 118,
                'value' => 'End:',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            352 =>
            array(
                'id' => 353,
                'language_id' => 2,
                'label_id' => 118,
                'value' => 'Конец:',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            353 =>
            array(
                'id' => 354,
                'language_id' => 3,
                'label_id' => 118,
                'value' => 'Slutt:',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            354 =>
            array(
                'id' => 355,
                'language_id' => 1,
                'label_id' => 119,
                'value' => 'Yay!!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            355 =>
            array(
                'id' => 356,
                'language_id' => 2,
                'label_id' => 119,
                'value' => 'Ура!!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            356 =>
            array(
                'id' => 357,
                'language_id' => 3,
                'label_id' => 119,
                'value' => 'Jippi!!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            357 =>
            array(
                'id' => 358,
                'language_id' => 1,
                'label_id' => 120,
                'value' => 'No Users Found',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            358 =>
            array(
                'id' => 359,
                'language_id' => 2,
                'label_id' => 120,
                'value' => 'Пользователи не найдены',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            359 =>
            array(
                'id' => 360,
                'language_id' => 3,
                'label_id' => 120,
                'value' => 'Ingen brukere funnet',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            360 =>
            array(
                'id' => 361,
                'language_id' => 1,
                'label_id' => 121,
                'value' => 'Delete Profile',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            361 =>
            array(
                'id' => 362,
                'language_id' => 2,
                'label_id' => 121,
                'value' => 'Удалить профиль',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            362 =>
            array(
                'id' => 363,
                'language_id' => 3,
                'label_id' => 121,
                'value' => 'Slett profil',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            363 =>
            array(
                'id' => 364,
                'language_id' => 1,
                'label_id' => 122,
                'value' => 'OK',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            364 =>
            array(
                'id' => 365,
                'language_id' => 2,
                'label_id' => 122,
                'value' => 'OK',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            365 =>
            array(
                'id' => 366,
                'language_id' => 3,
                'label_id' => 122,
                'value' => 'OK',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            366 =>
            array(
                'id' => 367,
                'language_id' => 1,
                'label_id' => 123,
                'value' => 'Exit',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            367 =>
            array(
                'id' => 368,
                'language_id' => 2,
                'label_id' => 123,
                'value' => 'Выход',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            368 =>
            array(
                'id' => 369,
                'language_id' => 3,
                'label_id' => 123,
                'value' => 'Avslutt',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            369 =>
            array(
                'id' => 370,
                'language_id' => 1,
                'label_id' => 124,
                'value' => 'Close',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            370 =>
            array(
                'id' => 371,
                'language_id' => 2,
                'label_id' => 124,
                'value' => 'Закрыть',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            371 =>
            array(
                'id' => 372,
                'language_id' => 3,
                'label_id' => 124,
                'value' => 'Lukk',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            372 =>
            array(
                'id' => 373,
                'language_id' => 1,
                'label_id' => 125,
                'value' => 'Unsupported Video Stream',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            373 =>
            array(
                'id' => 374,
                'language_id' => 2,
                'label_id' => 125,
                'value' => 'Неподдерживаемый поток видео',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            374 =>
            array(
                'id' => 375,
                'language_id' => 3,
                'label_id' => 125,
                'value' => 'Ikke støttet videostream',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            375 =>
            array(
                'id' => 376,
                'language_id' => 1,
                'label_id' => 126,
                'value' => 'Video must contain at least one audio stream. You must turn on Microphone or select an music file form the music listing.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            376 =>
            array(
                'id' => 377,
                'language_id' => 2,
                'label_id' => 126,
                'value' => 'Видео должно содержать как минимум один аудиопоток. Вы должны включить микрофон или выбрать файл музыки из списка музыки.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            377 =>
            array(
                'id' => 378,
                'language_id' => 3,
                'label_id' => 126,
                'value' => 'Videoen må inneholde minst én lydstrøm. Du må slå på mikrofonen eller velge en musikkfil fra musikklisten.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            378 =>
            array(
                'id' => 379,
                'language_id' => 1,
                'label_id' => 127,
                'value' => 'Do you really want to discard the video?',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            379 =>
            array(
                'id' => 380,
                'language_id' => 2,
                'label_id' => 127,
                'value' => 'Вы действительно хотите отбросить видео?',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            380 =>
            array(
                'id' => 381,
                'language_id' => 3,
                'label_id' => 127,
                'value' => 'Vil du virkelig kaste videoen?',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            381 =>
            array(
                'id' => 382,
                'language_id' => 1,
                'label_id' => 128,
                'value' => 'Camera Error',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            382 =>
            array(
                'id' => 383,
                'language_id' => 2,
                'label_id' => 128,
                'value' => 'Ошибка камеры',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            383 =>
            array(
                'id' => 384,
                'language_id' => 3,
                'label_id' => 128,
                'value' => 'Kamerafeil',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            384 =>
            array(
                'id' => 385,
                'language_id' => 1,
                'label_id' => 129,
                'value' => 'Camera Stopped Working !!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            385 =>
            array(
                'id' => 386,
                'language_id' => 2,
                'label_id' => 129,
                'value' => 'Камера перестала работать !!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            386 =>
            array(
                'id' => 387,
                'language_id' => 3,
                'label_id' => 129,
                'value' => 'Kameraet sluttet å fungere !!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            387 =>
            array(
                'id' => 388,
                'language_id' => 1,
                'label_id' => 130,
                'value' => 'Enable wifi or mobile data',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            388 =>
            array(
                'id' => 389,
                'language_id' => 2,
                'label_id' => 130,
                'value' => 'Включите Wi-Fi или мобильные данные',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            389 =>
            array(
                'id' => 390,
                'language_id' => 3,
                'label_id' => 130,
                'value' => 'Aktiver Wi-Fi eller mobildata',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            390 =>
            array(
                'id' => 391,
                'language_id' => 1,
                'label_id' => 131,
                'value' => 'Description is required!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            391 =>
            array(
                'id' => 392,
                'language_id' => 2,
                'label_id' => 131,
                'value' => 'Требуется описание!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            392 =>
            array(
                'id' => 393,
                'language_id' => 3,
                'label_id' => 131,
                'value' => 'Beskrivelse er påkrevd!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            393 =>
            array(
                'id' => 394,
                'language_id' => 1,
                'label_id' => 132,
                'value' => 'Posts',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            394 =>
            array(
                'id' => 395,
                'language_id' => 2,
                'label_id' => 132,
                'value' => 'Посты',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            395 =>
            array(
                'id' => 396,
                'language_id' => 3,
                'label_id' => 132,
                'value' => 'Innlegg',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            396 =>
            array(
                'id' => 397,
                'language_id' => 1,
                'label_id' => 133,
                'value' => 'Likes',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            397 =>
            array(
                'id' => 398,
                'language_id' => 2,
                'label_id' => 133,
                'value' => 'Лайки',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            398 =>
            array(
                'id' => 399,
                'language_id' => 3,
                'label_id' => 133,
                'value' => 'Likes',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            399 =>
            array(
                'id' => 400,
                'language_id' => 1,
                'label_id' => 134,
                'value' => 'Generating cover image',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            400 =>
            array(
                'id' => 401,
                'language_id' => 2,
                'label_id' => 134,
                'value' => 'Генерация обложки изображения',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            401 =>
            array(
                'id' => 402,
                'language_id' => 3,
                'label_id' => 134,
                'value' => 'Genererer coverbilde',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            402 =>
            array(
                'id' => 403,
                'language_id' => 1,
                'label_id' => 135,
                'value' => 'Adding text filter and watermark...',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            403 =>
            array(
                'id' => 404,
                'language_id' => 2,
                'label_id' => 135,
                'value' => 'Добавление текстового фильтра и водяного знака...',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            404 =>
            array(
                'id' => 405,
                'language_id' => 3,
                'label_id' => 135,
                'value' => 'Legger til tekstfilter og vannmerke...',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            405 =>
            array(
                'id' => 406,
                'language_id' => 1,
                'label_id' => 136,
                'value' => 'Adding watermark...',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            406 =>
            array(
                'id' => 407,
                'language_id' => 2,
                'label_id' => 136,
                'value' => 'Добавление водяного знака...',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            407 =>
            array(
                'id' => 408,
                'language_id' => 3,
                'label_id' => 136,
                'value' => 'Legger til vannmerke...',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            408 =>
            array(
                'id' => 409,
                'language_id' => 1,
                'label_id' => 137,
                'value' => 'Adding Text Filter',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            409 =>
            array(
                'id' => 410,
                'language_id' => 2,
                'label_id' => 137,
                'value' => 'Добавление текстового фильтра',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            410 =>
            array(
                'id' => 411,
                'language_id' => 3,
                'label_id' => 137,
                'value' => 'Legger til tekstfilter',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            411 =>
            array(
                'id' => 412,
                'language_id' => 1,
                'label_id' => 138,
                'value' => 'Processing Video',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            412 =>
            array(
                'id' => 413,
                'language_id' => 2,
                'label_id' => 138,
                'value' => 'Обработка видео',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            413 =>
            array(
                'id' => 414,
                'language_id' => 3,
                'label_id' => 138,
                'value' => 'Behandler video',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            414 =>
            array(
                'id' => 415,
                'language_id' => 1,
                'label_id' => 139,
                'value' => 'Followings',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            415 =>
            array(
                'id' => 416,
                'language_id' => 2,
                'label_id' => 139,
                'value' => 'Подписки',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            416 =>
            array(
                'id' => 417,
                'language_id' => 3,
                'label_id' => 139,
                'value' => 'Følgere',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            417 =>
            array(
                'id' => 418,
                'language_id' => 1,
                'label_id' => 140,
                'value' => 'There are some error to upload file',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            418 =>
            array(
                'id' => 419,
                'language_id' => 2,
                'label_id' => 140,
                'value' => 'Произошла ошибка при загрузке файла',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            419 =>
            array(
                'id' => 420,
                'language_id' => 3,
                'label_id' => 140,
                'value' => 'Det oppsto en feil under opplasting av fil',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            420 =>
            array(
                'id' => 421,
                'language_id' => 1,
                'label_id' => 141,
                'value' => 'Do you really want to delete the video',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            421 =>
            array(
                'id' => 422,
                'language_id' => 2,
                'label_id' => 141,
                'value' => 'Вы действительно хотите удалить видео',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            422 =>
            array(
                'id' => 423,
                'language_id' => 3,
                'label_id' => 141,
                'value' => 'Ønsker du virkelig å slette videoen',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            423 =>
            array(
                'id' => 424,
                'language_id' => 1,
                'label_id' => 142,
                'value' => 'Verification',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            424 =>
            array(
                'id' => 425,
                'language_id' => 2,
                'label_id' => 142,
                'value' => 'Верификация',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            425 =>
            array(
                'id' => 426,
                'language_id' => 3,
                'label_id' => 142,
                'value' => 'Verifisering',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            426 =>
            array(
                'id' => 427,
                'language_id' => 1,
                'label_id' => 143,
                'value' => 'Blocked User',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            427 =>
            array(
                'id' => 428,
                'language_id' => 2,
                'label_id' => 143,
                'value' => 'Пользователь заблокирован',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            428 =>
            array(
                'id' => 429,
                'language_id' => 3,
                'label_id' => 143,
                'value' => 'Blokkert bruker',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            429 =>
            array(
                'id' => 430,
                'language_id' => 1,
                'label_id' => 144,
                'value' => 'App Version',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            430 =>
            array(
                'id' => 431,
                'language_id' => 2,
                'label_id' => 144,
                'value' => 'Версия приложения',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            431 =>
            array(
                'id' => 432,
                'language_id' => 3,
                'label_id' => 144,
                'value' => 'App-versjon',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            432 =>
            array(
                'id' => 433,
                'language_id' => 1,
                'label_id' => 145,
                'value' => 'Notifications Setting',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            433 =>
            array(
                'id' => 434,
                'language_id' => 2,
                'label_id' => 145,
                'value' => 'Настройки уведомлений',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            434 =>
            array(
                'id' => 435,
                'language_id' => 3,
                'label_id' => 145,
                'value' => 'Innstillinger for varsler',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            435 =>
            array(
                'id' => 436,
                'language_id' => 1,
                'label_id' => 146,
                'value' => 'Push Notification',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            436 =>
            array(
                'id' => 437,
                'language_id' => 2,
                'label_id' => 146,
                'value' => 'Уведомление push',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            437 =>
            array(
                'id' => 438,
                'language_id' => 3,
                'label_id' => 146,
                'value' => 'Push-varsling',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            438 =>
            array(
                'id' => 439,
                'language_id' => 1,
                'label_id' => 147,
                'value' => 'User follow you',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            439 =>
            array(
                'id' => 440,
                'language_id' => 2,
                'label_id' => 147,
                'value' => 'Пользователь подписался на вас',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            440 =>
            array(
                'id' => 441,
                'language_id' => 3,
                'label_id' => 147,
                'value' => 'Brukeren følger deg',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            441 =>
            array(
                'id' => 442,
                'language_id' => 1,
                'label_id' => 148,
                'value' => 'Comment on your video.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            442 =>
            array(
                'id' => 443,
                'language_id' => 2,
                'label_id' => 148,
                'value' => 'Комментарий к вашему видео.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            443 =>
            array(
                'id' => 444,
                'language_id' => 3,
                'label_id' => 148,
                'value' => 'Kommentar til videoen din.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            444 =>
            array(
                'id' => 445,
                'language_id' => 1,
                'label_id' => 149,
                'value' => 'Like on your video',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            445 =>
            array(
                'id' => 446,
                'language_id' => 2,
                'label_id' => 149,
                'value' => 'Лайк на вашем видео',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            446 =>
            array(
                'id' => 447,
                'language_id' => 3,
                'label_id' => 149,
                'value' => 'Lik på videoen din',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            447 =>
            array(
                'id' => 448,
                'language_id' => 1,
                'label_id' => 150,
                'value' => 'There is no notification yet!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            448 =>
            array(
                'id' => 449,
                'language_id' => 2,
                'label_id' => 150,
                'value' => 'Пока нет уведомлений!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            449 =>
            array(
                'id' => 450,
                'language_id' => 3,
                'label_id' => 150,
                'value' => 'Ingen varsler ennå',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            450 =>
            array(
                'id' => 451,
                'language_id' => 1,
                'label_id' => 151,
                'value' => 'Sign In',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            451 =>
            array(
                'id' => 452,
                'language_id' => 2,
                'label_id' => 151,
                'value' => 'Войти',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            452 =>
            array(
                'id' => 453,
                'language_id' => 3,
                'label_id' => 151,
                'value' => 'Logg inn',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            453 =>
            array(
                'id' => 454,
                'language_id' => 1,
                'label_id' => 152,
                'value' => 'OR',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            454 =>
            array(
                'id' => 455,
                'language_id' => 2,
                'label_id' => 152,
                'value' => 'ИЛИ',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            455 =>
            array(
                'id' => 456,
                'language_id' => 3,
                'label_id' => 152,
                'value' => 'ELLER',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            456 =>
            array(
                'id' => 457,
                'language_id' => 1,
                'label_id' => 153,
                'value' => 'Reset Password',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            457 =>
            array(
                'id' => 458,
                'language_id' => 2,
                'label_id' => 153,
                'value' => 'Сбросить пароль',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            458 =>
            array(
                'id' => 459,
                'language_id' => 3,
                'label_id' => 153,
                'value' => 'Tilbakestill passord',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            459 =>
            array(
                'id' => 460,
                'language_id' => 1,
                'label_id' => 154,
                'value' => 'Save',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            460 =>
            array(
                'id' => 461,
                'language_id' => 2,
                'label_id' => 154,
                'value' => 'Сохранить',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            461 =>
            array(
                'id' => 462,
                'language_id' => 3,
                'label_id' => 154,
                'value' => 'Lagre',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            462 =>
            array(
                'id' => 463,
                'language_id' => 1,
                'label_id' => 155,
                'value' => 'Sign Up',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            463 =>
            array(
                'id' => 464,
                'language_id' => 2,
                'label_id' => 155,
                'value' => 'Зарегистрироваться',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            464 =>
            array(
                'id' => 465,
                'language_id' => 3,
                'label_id' => 155,
                'value' => 'Registrer deg',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            465 =>
            array(
                'id' => 466,
                'language_id' => 1,
                'label_id' => 156,
                'value' => 'Full Name',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            466 =>
            array(
                'id' => 467,
                'language_id' => 2,
                'label_id' => 156,
                'value' => 'Полное имя',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            467 =>
            array(
                'id' => 468,
                'language_id' => 3,
                'label_id' => 156,
                'value' => 'Fullt navn',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            468 =>
            array(
                'id' => 469,
                'language_id' => 1,
                'label_id' => 157,
                'value' => 'Your Name',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            469 =>
            array(
                'id' => 470,
                'language_id' => 2,
                'label_id' => 157,
                'value' => 'Ваше имя',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            470 =>
            array(
                'id' => 471,
                'language_id' => 3,
                'label_id' => 157,
                'value' => 'Ditt navn',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            471 =>
            array(
                'id' => 472,
                'language_id' => 1,
                'label_id' => 158,
                'value' => 'Continue',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            472 =>
            array(
                'id' => 473,
                'language_id' => 2,
                'label_id' => 158,
                'value' => 'Продолжить',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            473 =>
            array(
                'id' => 474,
                'language_id' => 3,
                'label_id' => 158,
                'value' => 'Fortsett',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            474 =>
            array(
                'id' => 475,
                'language_id' => 1,
                'label_id' => 159,
                'value' => 'Terms of use',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            475 =>
            array(
                'id' => 476,
                'language_id' => 2,
                'label_id' => 159,
                'value' => 'Условия использования',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            476 =>
            array(
                'id' => 477,
                'language_id' => 3,
                'label_id' => 159,
                'value' => 'Bruksvilkår',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            477 =>
            array(
                'id' => 478,
                'language_id' => 1,
                'label_id' => 160,
                'value' => 'Privacy Policy',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            478 =>
            array(
                'id' => 479,
                'language_id' => 2,
                'label_id' => 160,
                'value' => 'Политика конфиденциальности',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            479 =>
            array(
                'id' => 480,
                'language_id' => 3,
                'label_id' => 160,
                'value' => 'Retningslinjer for personvern',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            480 =>
            array(
                'id' => 481,
                'language_id' => 1,
                'label_id' => 161,
                'value' => 'Discover',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            481 =>
            array(
                'id' => 482,
                'language_id' => 2,
                'label_id' => 161,
                'value' => 'Обнаружить',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            482 =>
            array(
                'id' => 483,
                'language_id' => 3,
                'label_id' => 161,
                'value' => 'Oppdag',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            483 =>
            array(
                'id' => 484,
                'language_id' => 1,
                'label_id' => 162,
                'value' => 'Favorites',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            484 =>
            array(
                'id' => 485,
                'language_id' => 2,
                'label_id' => 162,
                'value' => 'Избранное',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            485 =>
            array(
                'id' => 486,
                'language_id' => 3,
                'label_id' => 162,
                'value' => 'Favoritter',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            486 =>
            array(
                'id' => 487,
                'language_id' => 1,
                'label_id' => 163,
                'value' => 'View More',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            487 =>
            array(
                'id' => 488,
                'language_id' => 2,
                'label_id' => 163,
                'value' => 'Посмотреть больше',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            488 =>
            array(
                'id' => 489,
                'language_id' => 3,
                'label_id' => 163,
                'value' => 'Se mer',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            489 =>
            array(
                'id' => 490,
                'language_id' => 1,
                'label_id' => 164,
                'value' => 'No Sounds found',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            490 =>
            array(
                'id' => 491,
                'language_id' => 2,
                'label_id' => 164,
                'value' => 'Звуки не найдены',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            491 =>
            array(
                'id' => 492,
                'language_id' => 3,
                'label_id' => 164,
                'value' => 'Ingen lyder funnet',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            492 =>
            array(
                'id' => 493,
                'language_id' => 1,
                'label_id' => 165,
                'value' => 'Used',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            493 =>
            array(
                'id' => 494,
                'language_id' => 2,
                'label_id' => 165,
                'value' => 'Использовано',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            494 =>
            array(
                'id' => 495,
                'language_id' => 3,
                'label_id' => 165,
                'value' => 'Brukt',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            495 =>
            array(
                'id' => 496,
                'language_id' => 1,
                'label_id' => 166,
                'value' => 'yes',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            496 =>
            array(
                'id' => 497,
                'language_id' => 2,
                'label_id' => 166,
                'value' => 'да',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            497 =>
            array(
                'id' => 498,
                'language_id' => 3,
                'label_id' => 166,
                'value' => 'ja',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            498 =>
            array(
                'id' => 499,
                'language_id' => 1,
                'label_id' => 167,
                'value' => 'Report & Block',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            499 =>
            array(
                'id' => 500,
                'language_id' => 2,
                'label_id' => 167,
                'value' => 'Сообщить и заблокировать',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
        \DB::table('translations')->insert(array(
            0 =>
            array(
                'id' => 501,
                'language_id' => 3,
                'label_id' => 167,
                'value' => 'Rapportere og blokkere',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            1 =>
            array(
                'id' => 502,
                'language_id' => 1,
                'label_id' => 168,
                'value' => 'Email field is not valid!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            2 =>
            array(
                'id' => 503,
                'language_id' => 2,
                'label_id' => 168,
                'value' => 'Неверное поле электронной почты!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            3 =>
            array(
                'id' => 504,
                'language_id' => 3,
                'label_id' => 168,
                'value' => 'E-postfeltet er ikke gyldig!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            4 =>
            array(
                'id' => 505,
                'language_id' => 1,
                'label_id' => 169,
                'value' => 'Error Registering User',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            5 =>
            array(
                'id' => 506,
                'language_id' => 2,
                'label_id' => 169,
                'value' => 'Ошибка при регистрации пользователя',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            6 =>
            array(
                'id' => 507,
                'language_id' => 3,
                'label_id' => 169,
                'value' => 'Feil ved registrering av bruker',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            7 =>
            array(
                'id' => 508,
                'language_id' => 1,
                'label_id' => 170,
                'value' => 'Confirm Password doesn\'t match!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            8 =>
            array(
                'id' => 509,
                'language_id' => 2,
                'label_id' => 170,
                'value' => 'Подтверждение пароля не совпадает!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            9 =>
            array(
                'id' => 510,
                'language_id' => 3,
                'label_id' => 170,
                'value' => 'Bekreft passord stemmer ikke!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            10 =>
            array(
                'id' => 511,
                'language_id' => 1,
                'label_id' => 171,
                'value' => 'Sign In with Apple failed!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            11 =>
            array(
                'id' => 512,
                'language_id' => 2,
                'label_id' => 171,
                'value' => 'Вход через Apple не удался!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            12 =>
            array(
                'id' => 513,
                'language_id' => 3,
                'label_id' => 171,
                'value' => 'Pålogging med Apple mislyktes!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            13 =>
            array(
                'id' => 514,
                'language_id' => 1,
                'label_id' => 172,
                'value' => 'Tap again to exit an app.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            14 =>
            array(
                'id' => 515,
                'language_id' => 2,
                'label_id' => 172,
                'value' => 'Нажмите еще раз, чтобы выйти из приложения.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            15 =>
            array(
                'id' => 516,
                'language_id' => 3,
                'label_id' => 172,
                'value' => 'Trykk igjen for å avslutte en app.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            16 =>
            array(
                'id' => 517,
                'language_id' => 1,
                'label_id' => 173,
                'value' => 'Please try Again with some other method.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            17 =>
            array(
                'id' => 518,
                'language_id' => 2,
                'label_id' => 173,
                'value' => 'Пожалуйста, попробуйте снова с другим методом.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            18 =>
            array(
                'id' => 519,
                'language_id' => 3,
                'label_id' => 173,
                'value' => 'Vennligst prøv igjen med en annen metode.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            19 =>
            array(
                'id' => 520,
                'language_id' => 1,
                'label_id' => 174,
                'value' => 'Downloading.. Please wait...',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            20 =>
            array(
                'id' => 521,
                'language_id' => 2,
                'label_id' => 174,
                'value' => 'Загрузка.. Пожалуйста, подождите...',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            21 =>
            array(
                'id' => 522,
                'language_id' => 3,
                'label_id' => 174,
                'value' => 'Laster ned.. Vennligst vent...',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            22 =>
            array(
                'id' => 523,
                'language_id' => 1,
                'label_id' => 175,
                'value' => 'Unsupported platform iOS version. Please try some other login method.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            23 =>
            array(
                'id' => 524,
                'language_id' => 2,
                'label_id' => 175,
                'value' => 'Неподдерживаемая версия iOS. Пожалуйста, попробуйте другой метод входа.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            24 =>
            array(
                'id' => 525,
                'language_id' => 3,
                'label_id' => 175,
                'value' => 'Ikke støttet iOS-versjon. Vennligst prøv en annen påloggingsmetode.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            25 =>
            array(
                'id' => 526,
                'language_id' => 1,
                'label_id' => 176,
                'value' => 'Loading...',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            26 =>
            array(
                'id' => 527,
                'language_id' => 2,
                'label_id' => 176,
                'value' => 'Загрузка...',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            27 =>
            array(
                'id' => 528,
                'language_id' => 3,
                'label_id' => 176,
                'value' => 'Laster...',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            28 =>
            array(
                'id' => 529,
                'language_id' => 1,
                'label_id' => 177,
                'value' => 'No favourite sounds found',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            29 =>
            array(
                'id' => 530,
                'language_id' => 2,
                'label_id' => 177,
                'value' => 'Избранные звуки не найдены',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            30 =>
            array(
                'id' => 531,
                'language_id' => 3,
                'label_id' => 177,
                'value' => 'Ingen favorittlyder funnet',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            31 =>
            array(
                'id' => 532,
                'language_id' => 1,
                'label_id' => 178,
                'value' => 'Search favorite sound',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            32 =>
            array(
                'id' => 533,
                'language_id' => 2,
                'label_id' => 178,
                'value' => 'Поиск любимого звука',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            33 =>
            array(
                'id' => 534,
                'language_id' => 3,
                'label_id' => 178,
                'value' => 'Søk etter favorittlyd',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            34 =>
            array(
                'id' => 535,
                'language_id' => 1,
                'label_id' => 179,
                'value' => 'Already have an account. Sign in',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            35 =>
            array(
                'id' => 536,
                'language_id' => 2,
                'label_id' => 179,
                'value' => 'У вас уже есть учетная запись. Войти',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            36 =>
            array(
                'id' => 537,
                'language_id' => 3,
                'label_id' => 179,
                'value' => 'Har allerede en konto. Logg inn',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            37 =>
            array(
                'id' => 538,
                'language_id' => 1,
                'label_id' => 180,
                'value' => 'terms of use and confirm that you have read our privacy policy.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            38 =>
            array(
                'id' => 539,
                'language_id' => 2,
                'label_id' => 180,
                'value' => 'условия использования и подтвердить, что вы прочитали нашу политику конфиденциальности.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            39 =>
            array(
                'id' => 540,
                'language_id' => 3,
                'label_id' => 180,
                'value' => 'bruksvilkår og bekreft at du har lest vår personvernpolicy.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            40 =>
            array(
                'id' => 541,
                'language_id' => 1,
                'label_id' => 181,
                'value' => 'By continuing you agree to',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            41 =>
            array(
                'id' => 542,
                'language_id' => 2,
                'label_id' => 181,
                'value' => 'Продолжая, вы соглашаетесь с',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            42 =>
            array(
                'id' => 543,
                'language_id' => 3,
                'label_id' => 181,
                'value' => 'Ved å fortsette godtar du',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            43 =>
            array(
                'id' => 544,
                'language_id' => 1,
                'label_id' => 182,
                'value' => 'Don\'t have an account? Create an account',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            44 =>
            array(
                'id' => 545,
                'language_id' => 2,
                'label_id' => 182,
                'value' => 'Нет аккаунта? Создать аккаунт',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            45 =>
            array(
                'id' => 546,
                'language_id' => 3,
                'label_id' => 182,
                'value' => 'Har ikke en konto? Opprett en konto',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            46 =>
            array(
                'id' => 547,
                'language_id' => 1,
                'label_id' => 183,
                'value' => 'Please enter your password!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            47 =>
            array(
                'id' => 548,
                'language_id' => 2,
                'label_id' => 183,
                'value' => 'Пожалуйста, введите свой пароль!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            48 =>
            array(
                'id' => 549,
                'language_id' => 3,
                'label_id' => 183,
                'value' => 'Vennligst skriv inn passordet ditt!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            49 =>
            array(
                'id' => 550,
                'language_id' => 1,
                'label_id' => 184,
                'value' => 'Did not get OTP?',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            50 =>
            array(
                'id' => 551,
                'language_id' => 2,
                'label_id' => 184,
                'value' => 'Не получили OTP?',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            51 =>
            array(
                'id' => 552,
                'language_id' => 3,
                'label_id' => 184,
                'value' => 'Fikk ikke OTP?',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            52 =>
            array(
                'id' => 553,
                'language_id' => 1,
                'label_id' => 185,
                'value' => 'Resend OTP',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            53 =>
            array(
                'id' => 554,
                'language_id' => 2,
                'label_id' => 185,
                'value' => 'Отправить OTP повторно',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            54 =>
            array(
                'id' => 555,
                'language_id' => 3,
                'label_id' => 185,
                'value' => 'Send OTP på nytt',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            55 =>
            array(
                'id' => 556,
                'language_id' => 1,
                'label_id' => 186,
                'value' => 'Resend OTP in',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            56 =>
            array(
                'id' => 557,
                'language_id' => 2,
                'label_id' => 186,
                'value' => 'Отправить OTP через',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            57 =>
            array(
                'id' => 558,
                'language_id' => 3,
                'label_id' => 186,
                'value' => 'Send OTP om',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            58 =>
            array(
                'id' => 559,
                'language_id' => 1,
                'label_id' => 187,
                'value' => 'seconds',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            59 =>
            array(
                'id' => 560,
                'language_id' => 2,
                'label_id' => 187,
                'value' => 'секунды',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            60 =>
            array(
                'id' => 561,
                'language_id' => 3,
                'label_id' => 187,
                'value' => 'sekunder',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            61 =>
            array(
                'id' => 562,
                'language_id' => 1,
                'label_id' => 188,
                'value' => 'Caution!!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            62 =>
            array(
                'id' => 563,
                'language_id' => 2,
                'label_id' => 188,
                'value' => 'Осторожно!!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            63 =>
            array(
                'id' => 564,
                'language_id' => 3,
                'label_id' => 188,
                'value' => 'Forsiktighet!!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            64 =>
            array(
                'id' => 565,
                'language_id' => 1,
                'label_id' => 189,
                'value' => 'Verify OTP',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            65 =>
            array(
                'id' => 566,
                'language_id' => 2,
                'label_id' => 189,
                'value' => 'Подтвердить OTP',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            66 =>
            array(
                'id' => 567,
                'language_id' => 3,
                'label_id' => 189,
                'value' => 'Bekreft OTP',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            67 =>
            array(
                'id' => 568,
                'language_id' => 1,
                'label_id' => 190,
                'value' => 'Profile Verification',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            68 =>
            array(
                'id' => 569,
                'language_id' => 2,
                'label_id' => 190,
                'value' => 'Проверка профиля',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            69 =>
            array(
                'id' => 570,
                'language_id' => 3,
                'label_id' => 190,
                'value' => 'Profilverifisering',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            70 =>
            array(
                'id' => 571,
                'language_id' => 1,
                'label_id' => 191,
                'value' => 'Enter Your Name',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            71 =>
            array(
                'id' => 572,
                'language_id' => 2,
                'label_id' => 191,
                'value' => 'Введите ваше имя',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            72 =>
            array(
                'id' => 573,
                'language_id' => 3,
                'label_id' => 191,
                'value' => 'Skriv inn ditt navn',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            73 =>
            array(
                'id' => 574,
                'language_id' => 1,
                'label_id' => 192,
                'value' => 'Enter Your Address',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            74 =>
            array(
                'id' => 575,
                'language_id' => 2,
                'label_id' => 192,
                'value' => 'Введите ваш адрес',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            75 =>
            array(
                'id' => 576,
                'language_id' => 3,
                'label_id' => 192,
                'value' => 'Skriv inn din adresse',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            76 =>
            array(
                'id' => 577,
                'language_id' => 1,
                'label_id' => 193,
                'value' => 'Verify and Delete',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            77 =>
            array(
                'id' => 578,
                'language_id' => 2,
                'label_id' => 193,
                'value' => 'Подтвердить и удалить',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            78 =>
            array(
                'id' => 579,
                'language_id' => 3,
                'label_id' => 193,
                'value' => 'Bekreft og slett',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            79 =>
            array(
                'id' => 580,
                'language_id' => 1,
                'label_id' => 194,
                'value' => 'Error Verifying OTP',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            80 =>
            array(
                'id' => 581,
                'language_id' => 2,
                'label_id' => 194,
                'value' => 'Ошибка при проверке OTP',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            81 =>
            array(
                'id' => 582,
                'language_id' => 3,
                'label_id' => 194,
                'value' => 'Feil ved verifisering av OTP',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            82 =>
            array(
                'id' => 583,
                'language_id' => 1,
                'label_id' => 195,
                'value' => 'Profile deletion will permanently delete user\'s profile and all its data, it can not be recovered in future. For confirmation we\'ll send an OTP to your registered email Id.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            83 =>
            array(
                'id' => 584,
                'language_id' => 2,
                'label_id' => 195,
                'value' => 'Удаление профиля навсегда удалит профиль пользователя и все его данные, их нельзя будет восстановить в будущем. Для подтверждения мы отправим OTP на ваш зарегистрированный email.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            84 =>
            array(
                'id' => 585,
                'language_id' => 3,
                'label_id' => 195,
                'value' => 'Sletting av profil vil permanent slette brukerens profil og all dens data, det kan ikke gjenopprettes i fremtiden. For bekreftelse sender vi en OTP til din registrerte e-postadresse.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            85 =>
            array(
                'id' => 586,
                'language_id' => 1,
                'label_id' => 196,
                'value' => 'Email Already Exists',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            86 =>
            array(
                'id' => 587,
                'language_id' => 2,
                'label_id' => 196,
                'value' => 'Этот адрес электронной почты уже существует',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            87 =>
            array(
                'id' => 588,
                'language_id' => 3,
                'label_id' => 196,
                'value' => 'Denne e-postadressen finnes allerede',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            88 =>
            array(
                'id' => 589,
                'language_id' => 1,
                'label_id' => 197,
                'value' => 'Password updated Successfully',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            89 =>
            array(
                'id' => 590,
                'language_id' => 2,
                'label_id' => 197,
                'value' => 'Пароль успешно обновлен',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            90 =>
            array(
                'id' => 591,
                'language_id' => 3,
                'label_id' => 197,
                'value' => 'Passord oppdatert vellykket',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            91 =>
            array(
                'id' => 592,
                'language_id' => 1,
                'label_id' => 198,
                'value' => 'Video deleted Successfully',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            92 =>
            array(
                'id' => 593,
                'language_id' => 2,
                'label_id' => 198,
                'value' => 'Видео успешно удалено',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            93 =>
            array(
                'id' => 594,
                'language_id' => 3,
                'label_id' => 198,
                'value' => 'Video slettet vellykket',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            94 =>
            array(
                'id' => 595,
                'language_id' => 1,
                'label_id' => 199,
                'value' => 'There\'s some error deleting video',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            95 =>
            array(
                'id' => 596,
                'language_id' => 2,
                'label_id' => 199,
                'value' => 'При удалении видео произошла ошибка',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            96 =>
            array(
                'id' => 597,
                'language_id' => 3,
                'label_id' => 199,
                'value' => 'Det oppstod en feil ved sletting av video',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            97 =>
            array(
                'id' => 598,
                'language_id' => 1,
                'label_id' => 200,
                'value' => 'Some error to reset your password.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            98 =>
            array(
                'id' => 599,
                'language_id' => 2,
                'label_id' => 200,
                'value' => 'Ошибка сброса пароля.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            99 =>
            array(
                'id' => 600,
                'language_id' => 3,
                'label_id' => 200,
                'value' => 'Noen feil ved tilbakestilling av passordet.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            100 =>
            array(
                'id' => 601,
                'language_id' => 1,
                'label_id' => 201,
                'value' => 'An OTP is sent to your email please check your email.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            101 =>
            array(
                'id' => 602,
                'language_id' => 2,
                'label_id' => 201,
                'value' => 'OTP отправлен на вашу электронную почту, пожалуйста, проверьте вашу почту.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            102 =>
            array(
                'id' => 603,
                'language_id' => 3,
                'label_id' => 201,
                'value' => 'En OTP er sendt til e-posten din, vennligst sjekk e-posten din.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            103 =>
            array(
                'id' => 604,
                'language_id' => 1,
                'label_id' => 202,
                'value' => 'Sorry this email account does not exists.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            104 =>
            array(
                'id' => 605,
                'language_id' => 2,
                'label_id' => 202,
                'value' => 'Извините, этот аккаунт электронной почты не существует.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            105 =>
            array(
                'id' => 606,
                'language_id' => 3,
                'label_id' => 202,
                'value' => 'Beklager, denne e-postkontoen eksisterer ikke.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            106 =>
            array(
                'id' => 607,
                'language_id' => 1,
                'label_id' => 203,
                'value' => 'Use another email to register or login using existing email.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            107 =>
            array(
                'id' => 608,
                'language_id' => 2,
                'label_id' => 203,
                'value' => 'Используйте другой адрес электронной почты для регистрации или войдите с помощью существующего адреса электронной почты.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            108 =>
            array(
                'id' => 609,
                'language_id' => 3,
                'label_id' => 203,
                'value' => 'Bruk en annen e-postadresse for å registrere deg eller logg inn med eksisterende e-postadresse.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            109 =>
            array(
                'id' => 610,
                'language_id' => 1,
                'label_id' => 204,
                'value' => 'STATUS',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            110 =>
            array(
                'id' => 611,
                'language_id' => 2,
                'label_id' => 204,
                'value' => 'СТАТУС',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            111 =>
            array(
                'id' => 612,
                'language_id' => 3,
                'label_id' => 204,
                'value' => 'STATUS',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            112 =>
            array(
                'id' => 613,
                'language_id' => 1,
                'label_id' => 205,
                'value' => 'Address',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            113 =>
            array(
                'id' => 614,
                'language_id' => 2,
                'label_id' => 205,
                'value' => 'Адрес',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            114 =>
            array(
                'id' => 615,
                'language_id' => 3,
                'label_id' => 205,
                'value' => 'Adresse',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            115 =>
            array(
                'id' => 616,
                'language_id' => 1,
                'label_id' => 206,
                'value' => 'Done',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            116 =>
            array(
                'id' => 617,
                'language_id' => 2,
                'label_id' => 206,
                'value' => 'Готово',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            117 =>
            array(
                'id' => 618,
                'language_id' => 3,
                'label_id' => 206,
                'value' => 'Ferdig',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            118 =>
            array(
                'id' => 619,
                'language_id' => 1,
                'label_id' => 207,
                'value' => 'First make few changes to save',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            119 =>
            array(
                'id' => 620,
                'language_id' => 2,
                'label_id' => 207,
                'value' => 'Сначала внесите несколько изменений для сохранения',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            120 =>
            array(
                'id' => 621,
                'language_id' => 3,
                'label_id' => 207,
                'value' => 'Først gjør noen endringer for å lagre',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            121 =>
            array(
                'id' => 622,
                'language_id' => 1,
                'label_id' => 208,
                'value' => 'Exporting video',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            122 =>
            array(
                'id' => 623,
                'language_id' => 2,
                'label_id' => 208,
                'value' => 'Экспорт видео',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            123 =>
            array(
                'id' => 624,
                'language_id' => 3,
                'label_id' => 208,
                'value' => 'Eksporterer video',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            124 =>
            array(
                'id' => 625,
                'language_id' => 1,
                'label_id' => 209,
                'value' => 'Trimming Video',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            125 =>
            array(
                'id' => 626,
                'language_id' => 2,
                'label_id' => 209,
                'value' => 'Обрезка видео',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            126 =>
            array(
                'id' => 627,
                'language_id' => 3,
                'label_id' => 209,
                'value' => 'Beskjære video',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            127 =>
            array(
                'id' => 628,
                'language_id' => 1,
                'label_id' => 210,
                'value' => 'Choose File',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            128 =>
            array(
                'id' => 629,
                'language_id' => 2,
                'label_id' => 210,
                'value' => 'Выберите файл',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            129 =>
            array(
                'id' => 630,
                'language_id' => 3,
                'label_id' => 210,
                'value' => 'Velg fil',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            130 =>
            array(
                'id' => 631,
                'language_id' => 1,
                'label_id' => 211,
                'value' => 'Upload Front Side of Id Proof',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            131 =>
            array(
                'id' => 632,
                'language_id' => 2,
                'label_id' => 211,
                'value' => 'Загрузите переднюю сторону удостоверения личности',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            132 =>
            array(
                'id' => 633,
                'language_id' => 3,
                'label_id' => 211,
                'value' => 'Last opp forsiden av ID-beviset',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            133 =>
            array(
                'id' => 634,
                'language_id' => 1,
                'label_id' => 212,
                'value' => 'Supporting Document',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            134 =>
            array(
                'id' => 635,
                'language_id' => 2,
                'label_id' => 212,
                'value' => 'Вспомогательный документ',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            135 =>
            array(
                'id' => 636,
                'language_id' => 3,
                'label_id' => 212,
                'value' => 'Støttedokument',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            136 =>
            array(
                'id' => 637,
                'language_id' => 1,
                'label_id' => 213,
                'value' => 'Upload Back Side of Id Proof',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            137 =>
            array(
                'id' => 638,
                'language_id' => 2,
                'label_id' => 213,
                'value' => 'Загрузите заднюю сторону удостоверения личности',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            138 =>
            array(
                'id' => 639,
                'language_id' => 3,
                'label_id' => 213,
                'value' => 'Last opp baksiden av ID-beviset',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            139 =>
            array(
                'id' => 640,
                'language_id' => 1,
                'label_id' => 214,
                'value' => 'Video success export!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            140 =>
            array(
                'id' => 641,
                'language_id' => 2,
                'label_id' => 214,
                'value' => 'Видео успешно экспортировано!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            141 =>
            array(
                'id' => 642,
                'language_id' => 3,
                'label_id' => 214,
                'value' => 'Video eksport vellykket!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            142 =>
            array(
                'id' => 643,
                'language_id' => 1,
                'label_id' => 215,
                'value' => '...Show more',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            143 =>
            array(
                'id' => 644,
                'language_id' => 2,
                'label_id' => 215,
                'value' => '...Показать больше',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            144 =>
            array(
                'id' => 645,
                'language_id' => 3,
                'label_id' => 215,
                'value' => '...Vis mer',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            145 =>
            array(
                'id' => 646,
                'language_id' => 1,
                'label_id' => 216,
                'value' => ' show less',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            146 =>
            array(
                'id' => 647,
                'language_id' => 2,
                'label_id' => 216,
                'value' => ' показать меньше',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            147 =>
            array(
                'id' => 648,
                'language_id' => 3,
                'label_id' => 216,
                'value' => ' vis mindre',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            148 =>
            array(
                'id' => 649,
                'language_id' => 1,
                'label_id' => 217,
                'value' => 'PM',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            149 =>
            array(
                'id' => 650,
                'language_id' => 2,
                'label_id' => 217,
                'value' => 'PM',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            150 =>
            array(
                'id' => 651,
                'language_id' => 3,
                'label_id' => 217,
                'value' => 'PM',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            151 =>
            array(
                'id' => 652,
                'language_id' => 1,
                'label_id' => 218,
                'value' => 'AM',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            152 =>
            array(
                'id' => 653,
                'language_id' => 2,
                'label_id' => 218,
                'value' => 'AM',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            153 =>
            array(
                'id' => 654,
                'language_id' => 3,
                'label_id' => 218,
                'value' => 'AM',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            154 =>
            array(
                'id' => 655,
                'language_id' => 1,
                'label_id' => 219,
                'value' => 'Skip',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            155 =>
            array(
                'id' => 656,
                'language_id' => 2,
                'label_id' => 219,
                'value' => 'Пропустить',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            156 =>
            array(
                'id' => 657,
                'language_id' => 3,
                'label_id' => 219,
                'value' => 'Hopp over',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            157 =>
            array(
                'id' => 658,
                'language_id' => 1,
                'label_id' => 220,
                'value' => 'just now',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            158 =>
            array(
                'id' => 659,
                'language_id' => 2,
                'label_id' => 220,
                'value' => 'только что',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            159 =>
            array(
                'id' => 660,
                'language_id' => 3,
                'label_id' => 220,
                'value' => 'akkurat nå',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            160 =>
            array(
                'id' => 661,
                'language_id' => 1,
                'label_id' => 221,
                'value' => 'It\'s spam',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            161 =>
            array(
                'id' => 662,
                'language_id' => 2,
                'label_id' => 221,
                'value' => 'Это спам',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            162 =>
            array(
                'id' => 663,
                'language_id' => 3,
                'label_id' => 221,
                'value' => 'Det er spam',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            163 =>
            array(
                'id' => 664,
                'language_id' => 1,
                'label_id' => 222,
                'value' => 'It\'s inappropriate',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            164 =>
            array(
                'id' => 665,
                'language_id' => 2,
                'label_id' => 222,
                'value' => 'Это неприемлемо',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            165 =>
            array(
                'id' => 666,
                'language_id' => 3,
                'label_id' => 222,
                'value' => 'Det er upassende',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            166 =>
            array(
                'id' => 667,
                'language_id' => 1,
                'label_id' => 223,
                'value' => 'I don\'t like it',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            167 =>
            array(
                'id' => 668,
                'language_id' => 2,
                'label_id' => 223,
                'value' => 'Мне это не нравится',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            168 =>
            array(
                'id' => 669,
                'language_id' => 3,
                'label_id' => 223,
                'value' => 'Jeg liker det ikke',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            169 =>
            array(
                'id' => 670,
                'language_id' => 1,
                'label_id' => 224,
                'value' => 'There is some error',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            170 =>
            array(
                'id' => 671,
                'language_id' => 2,
                'label_id' => 224,
                'value' => 'Произошла ошибка',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            171 =>
            array(
                'id' => 672,
                'language_id' => 3,
                'label_id' => 224,
                'value' => 'Det er en feil',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            172 =>
            array(
                'id' => 673,
                'language_id' => 1,
                'label_id' => 225,
                'value' => 'Comment deleted Successfully',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            173 =>
            array(
                'id' => 674,
                'language_id' => 2,
                'label_id' => 225,
                'value' => 'Комментарий успешно удален',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            174 =>
            array(
                'id' => 675,
                'language_id' => 3,
                'label_id' => 225,
                'value' => 'Kommentar slettet med suksess',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            175 =>
            array(
                'id' => 676,
                'language_id' => 1,
                'label_id' => 226,
                'value' => 'There\'s some issue with the server',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            176 =>
            array(
                'id' => 677,
                'language_id' => 2,
                'label_id' => 226,
                'value' => 'Есть какая-то проблема с сервером',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            177 =>
            array(
                'id' => 678,
                'language_id' => 3,
                'label_id' => 226,
                'value' => 'Det er et problem med serveren',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            178 =>
            array(
                'id' => 679,
                'language_id' => 1,
                'label_id' => 227,
                'value' => 'Error on export video :(',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            179 =>
            array(
                'id' => 680,
                'language_id' => 2,
                'label_id' => 227,
                'value' => 'Ошибка при экспорте видео :(',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            180 =>
            array(
                'id' => 681,
                'language_id' => 3,
                'label_id' => 227,
                'value' => 'Feil ved eksport av video :(',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            181 =>
            array(
                'id' => 682,
                'language_id' => 1,
                'label_id' => 228,
                'value' => 'Apply For Profile Verification now',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            182 =>
            array(
                'id' => 683,
                'language_id' => 2,
                'label_id' => 228,
                'value' => 'Подать заявку на верификацию профиля сейчас',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            183 =>
            array(
                'id' => 684,
                'language_id' => 3,
                'label_id' => 228,
                'value' => 'Søk om profilverifisering nå',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            184 =>
            array(
                'id' => 685,
                'language_id' => 1,
                'label_id' => 229,
                'value' => 'Enter 6 digits verification code has sent in your registered email account.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            185 =>
            array(
                'id' => 686,
                'language_id' => 2,
                'label_id' => 229,
                'value' => 'Введите 6-значный код подтверждения, отправленный на вашу зарегистрированную электронную почту.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            186 =>
            array(
                'id' => 687,
                'language_id' => 3,
                'label_id' => 229,
                'value' => 'Skriv inn 6-sifret verifikasjonskode sendt til din registrerte e-postkonto.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            187 =>
            array(
                'id' => 688,
                'language_id' => 1,
                'label_id' => 230,
                'value' => 'Turn on all mobile notifications or select which to receive',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            188 =>
            array(
                'id' => 689,
                'language_id' => 2,
                'label_id' => 230,
                'value' => 'Включите все мобильные уведомления или выберите, какие получать',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            189 =>
            array(
                'id' => 690,
                'language_id' => 3,
                'label_id' => 230,
                'value' => 'Slå på alle mobilvarsler eller velg hvilke du vil motta',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            190 =>
            array(
                'id' => 691,
                'language_id' => 1,
                'label_id' => 231,
                'value' => 'There is no network connection right now. check your internet connection',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            191 =>
            array(
                'id' => 692,
                'language_id' => 2,
                'label_id' => 231,
                'value' => 'Сейчас нет подключения к сети. Проверьте подключение к интернету',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            192 =>
            array(
                'id' => 693,
                'language_id' => 3,
                'label_id' => 231,
                'value' => 'Det er ingen nettverkstilkobling akkurat nå. Sjekk internettforbindelsen',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            193 =>
            array(
                'id' => 694,
                'language_id' => 1,
                'label_id' => 232,
                'value' => 'Please enter an email address which associated with your account and, we will email you a link to reset your password.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            194 =>
            array(
                'id' => 695,
                'language_id' => 2,
                'label_id' => 232,
                'value' => 'Пожалуйста, введите адрес электронной почты, связанный с вашей учетной записью, и мы отправим вам ссылку для сброса пароля на ваш электронный адрес.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            195 =>
            array(
                'id' => 696,
                'language_id' => 3,
                'label_id' => 232,
                'value' => 'Vennligst skriv inn en e-postadresse som er tilknyttet kontoen din, og vi sender deg en lenke for tilbakestilling av passordet til e-posten din.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            196 =>
            array(
                'id' => 697,
                'language_id' => 1,
                'label_id' => 233,
                'value' => 'Select Sound',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            197 =>
            array(
                'id' => 698,
                'language_id' => 2,
                'label_id' => 233,
                'value' => 'Выберите звук',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            198 =>
            array(
                'id' => 699,
                'language_id' => 3,
                'label_id' => 233,
                'value' => 'Velg Lyd',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            199 =>
            array(
                'id' => 700,
                'language_id' => 1,
                'label_id' => 234,
                'value' => 'Your video is posted',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            200 =>
            array(
                'id' => 701,
                'language_id' => 2,
                'label_id' => 234,
                'value' => 'Ваше видео опубликовано',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            201 =>
            array(
                'id' => 702,
                'language_id' => 3,
                'label_id' => 234,
                'value' => 'Videoen din er postet',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            202 =>
            array(
                'id' => 703,
                'language_id' => 1,
                'label_id' => 235,
                'value' => 'Agree',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            203 =>
            array(
                'id' => 704,
                'language_id' => 2,
                'label_id' => 235,
                'value' => 'Согласен',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            204 =>
            array(
                'id' => 705,
                'language_id' => 3,
                'label_id' => 235,
                'value' => 'Enig',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            205 =>
            array(
                'id' => 706,
                'language_id' => 1,
                'label_id' => 236,
                'value' => 'Open',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            206 =>
            array(
                'id' => 707,
                'language_id' => 2,
                'label_id' => 236,
                'value' => 'Открыть',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            207 =>
            array(
                'id' => 708,
                'language_id' => 3,
                'label_id' => 236,
                'value' => 'Åpne',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            208 =>
            array(
                'id' => 709,
                'language_id' => 1,
                'label_id' => 237,
                'value' => 'Failed to get the timezone.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            209 =>
            array(
                'id' => 710,
                'language_id' => 2,
                'label_id' => 237,
                'value' => 'Не удалось получить часовой пояс.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            210 =>
            array(
                'id' => 711,
                'language_id' => 3,
                'label_id' => 237,
                'value' => 'Kunne ikke hente tidssonen.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            211 =>
            array(
                'id' => 712,
                'language_id' => 1,
                'label_id' => 238,
                'value' => 'Facebook login failed!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            212 =>
            array(
                'id' => 713,
                'language_id' => 2,
                'label_id' => 238,
                'value' => 'Не удалось войти в Facebook!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            213 =>
            array(
                'id' => 714,
                'language_id' => 3,
                'label_id' => 238,
                'value' => 'Facebook pålogging mislyktes!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            214 =>
            array(
                'id' => 715,
                'language_id' => 1,
                'label_id' => 239,
                'value' => 'is required!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            215 =>
            array(
                'id' => 716,
                'language_id' => 2,
                'label_id' => 239,
                'value' => 'требуется!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            216 =>
            array(
                'id' => 717,
                'language_id' => 3,
                'label_id' => 239,
                'value' => 'er påkrevd!',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            217 =>
            array(
                'id' => 718,
                'language_id' => 1,
                'label_id' => 240,
                'value' => 'It must contain only _ . and alphanumeric',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            218 =>
            array(
                'id' => 719,
                'language_id' => 2,
                'label_id' => 240,
                'value' => 'Должно содержать только _ . и alphanumeric',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            219 =>
            array(
                'id' => 720,
                'language_id' => 3,
                'label_id' => 240,
                'value' => 'Det må kun inneholde _ . og alfanumerisk',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            220 =>
            array(
                'id' => 721,
                'language_id' => 1,
                'label_id' => 241,
                'value' => 'Video Updated Successfully',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            221 =>
            array(
                'id' => 722,
                'language_id' => 2,
                'label_id' => 241,
                'value' => 'Видео успешно обновлено',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            222 =>
            array(
                'id' => 723,
                'language_id' => 3,
                'label_id' => 241,
                'value' => 'Video oppdatert med suksess',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            223 =>
            array(
                'id' => 724,
                'language_id' => 1,
                'label_id' => 242,
                'value' => 'Verify OTP and delete profile. Profile deletion will permanently delete user\'s profile and all its data, it can not be recovered in future.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            224 =>
            array(
                'id' => 725,
                'language_id' => 2,
                'label_id' => 242,
                'value' => 'Проверьте OTP и удалите профиль. Удаление профиля навсегда удалит профиль пользователя и все его данные, их нельзя будет восстановить в будущем.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            225 =>
            array(
                'id' => 726,
                'language_id' => 3,
                'label_id' => 242,
                'value' => 'Verifiser OTP og slett profil. Profil sletting vil permanent slette brukerens profil og all dens data, det kan ikke gjenopprettes i fremtiden.',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            226 =>
            array(
                'id' => 727,
                'language_id' => 1,
                'label_id' => 243,
                'value' => 'Male',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            227 =>
            array(
                'id' => 728,
                'language_id' => 2,
                'label_id' => 243,
                'value' => 'Мужской',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            228 =>
            array(
                'id' => 729,
                'language_id' => 3,
                'label_id' => 243,
                'value' => 'Mann',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            229 =>
            array(
                'id' => 730,
                'language_id' => 1,
                'label_id' => 244,
                'value' => 'Female',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            230 =>
            array(
                'id' => 731,
                'language_id' => 2,
                'label_id' => 244,
                'value' => 'Женский',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            231 =>
            array(
                'id' => 732,
                'language_id' => 3,
                'label_id' => 244,
                'value' => 'Kvinne',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            232 =>
            array(
                'id' => 733,
                'language_id' => 1,
                'label_id' => 245,
                'value' => 'Other',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            233 =>
            array(
                'id' => 734,
                'language_id' => 2,
                'label_id' => 245,
                'value' => 'Другой',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            234 =>
            array(
                'id' => 735,
                'language_id' => 3,
                'label_id' => 245,
                'value' => 'Annen',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            235 =>
            array(
                'id' => 736,
                'language_id' => 1,
                'label_id' => 246,
                'value' => 'Error',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            236 =>
            array(
                'id' => 737,
                'language_id' => 2,
                'label_id' => 246,
                'value' => 'Ошибка',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            237 =>
            array(
                'id' => 738,
                'language_id' => 3,
                'label_id' => 246,
                'value' => 'Feil',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            238 =>
            array(
                'id' => 739,
                'language_id' => 1,
                'label_id' => 247,
                'value' => 'There\'s some error loading video',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            239 =>
            array(
                'id' => 740,
                'language_id' => 2,
                'label_id' => 247,
                'value' => 'При загрузке видео произошла ошибка',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            240 =>
            array(
                'id' => 741,
                'language_id' => 3,
                'label_id' => 247,
                'value' => 'Det oppstod en feil ved lasting av video',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            241 =>
            array(
                'id' => 742,
                'language_id' => 1,
                'label_id' => 248,
                'value' => 'Video Flagged',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            242 =>
            array(
                'id' => 743,
                'language_id' => 2,
                'label_id' => 248,
                'value' => 'Видео отмечено',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            243 =>
            array(
                'id' => 744,
                'language_id' => 3,
                'label_id' => 248,
                'value' => 'Video merket',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            244 =>
            array(
                'id' => 745,
                'language_id' => 1,
                'label_id' => 249,
                'value' => 'Languages',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            245 =>
            array(
                'id' => 746,
                'language_id' => 2,
                'label_id' => 249,
                'value' => 'Языки',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            246 =>
            array(
                'id' => 747,
                'language_id' => 3,
                'label_id' => 249,
                'value' => 'Språk',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            247 =>
            array(
                'id' => 748,
                'language_id' => 1,
                'label_id' => 250,
                'value' => 'English',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            248 =>
            array(
                'id' => 749,
                'language_id' => 2,
                'label_id' => 250,
                'value' => 'Английский',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            249 =>
            array(
                'id' => 750,
                'language_id' => 3,
                'label_id' => 250,
                'value' => 'Engelsk',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            250 =>
            array(
                'id' => 751,
                'language_id' => 1,
                'label_id' => 251,
                'value' => 'Spanish',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            251 =>
            array(
                'id' => 752,
                'language_id' => 2,
                'label_id' => 251,
                'value' => 'Испанский',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            252 =>
            array(
                'id' => 753,
                'language_id' => 3,
                'label_id' => 251,
                'value' => 'Spansk',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            253 =>
            array(
                'id' => 754,
                'language_id' => 1,
                'label_id' => 252,
                'value' => 'Catalan',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            254 =>
            array(
                'id' => 755,
                'language_id' => 2,
                'label_id' => 252,
                'value' => 'Каталонский',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            255 =>
            array(
                'id' => 756,
                'language_id' => 3,
                'label_id' => 252,
                'value' => 'Katalansk',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            256 =>
            array(
                'id' => 757,
                'language_id' => 1,
                'label_id' => 253,
                'value' => 'Language Updated Successfully',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            257 =>
            array(
                'id' => 758,
                'language_id' => 2,
                'label_id' => 253,
                'value' => 'Язык успешно обновлен',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            258 =>
            array(
                'id' => 759,
                'language_id' => 3,
                'label_id' => 253,
                'value' => 'Språk oppdatert',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            259 =>
            array(
                'id' => 760,
                'language_id' => 1,
                'label_id' => 254,
                'value' => 'Original Sound',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            260 =>
            array(
                'id' => 761,
                'language_id' => 2,
                'label_id' => 254,
                'value' => 'Оригинальный звук',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            261 =>
            array(
                'id' => 762,
                'language_id' => 3,
                'label_id' => 254,
                'value' => 'Original Lyd',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            262 =>
            array(
                'id' => 763,
                'language_id' => 1,
                'label_id' => 255,
                'value' => 'People',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            263 =>
            array(
                'id' => 764,
                'language_id' => 2,
                'label_id' => 255,
                'value' => 'Люди',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            264 =>
            array(
                'id' => 765,
                'language_id' => 3,
                'label_id' => 255,
                'value' => 'Folk',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            265 =>
            array(
                'id' => 766,
                'language_id' => 1,
                'label_id' => 256,
                'value' => 'All right reserved',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            266 =>
            array(
                'id' => 767,
                'language_id' => 2,
                'label_id' => 256,
                'value' => 'Все права защищены',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            267 =>
            array(
                'id' => 768,
                'language_id' => 3,
                'label_id' => 256,
                'value' => 'Alle rettigheter reservert',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            268 =>
            array(
                'id' => 769,
                'language_id' => 1,
                'label_id' => 257,
                'value' => 'Upload Image',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            269 =>
            array(
                'id' => 770,
                'language_id' => 2,
                'label_id' => 257,
                'value' => 'Загрузить изображение',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            270 =>
            array(
                'id' => 771,
                'language_id' => 3,
                'label_id' => 257,
                'value' => 'Last opp bilde',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            271 =>
            array(
                'id' => 772,
                'language_id' => 1,
                'label_id' => 258,
                'value' => 'You can choose option to upload image',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            272 =>
            array(
                'id' => 773,
                'language_id' => 2,
                'label_id' => 258,
                'value' => 'Вы можете выбрать вариант загрузки изображения',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            273 =>
            array(
                'id' => 774,
                'language_id' => 3,
                'label_id' => 258,
                'value' => 'Du kan velge alternativet for å laste opp bilde',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            274 =>
            array(
                'id' => 775,
                'language_id' => 1,
                'label_id' => 259,
                'value' => 'Data Deletion',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            275 =>
            array(
                'id' => 776,
                'language_id' => 2,
                'label_id' => 259,
                'value' => 'Удаление данных',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            276 =>
            array(
                'id' => 777,
                'language_id' => 3,
                'label_id' => 259,
                'value' => 'Data Sletting',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            277 =>
            array(
                'id' => 778,
                'language_id' => 1,
                'label_id' => 260,
                'value' => 'Review Our App',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            278 =>
            array(
                'id' => 779,
                'language_id' => 2,
                'label_id' => 260,
                'value' => 'Оцените наше приложение',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            279 =>
            array(
                'id' => 780,
                'language_id' => 3,
                'label_id' => 260,
                'value' => 'Gjennomgå vår app',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            280 =>
            array(
                'id' => 781,
                'language_id' => 1,
                'label_id' => 261,
                'value' => 'Hey, enjoy me on Moooby...open this link and download the app',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            281 =>
            array(
                'id' => 782,
                'language_id' => 2,
                'label_id' => 261,
                'value' => 'Привет, наслаждайтесь мной на Moooby... откройте эту ссылку и загрузите приложение',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            282 =>
            array(
                'id' => 783,
                'language_id' => 3,
                'label_id' => 261,
                'value' => 'Hei, nyt meg på Moooby... åpne denne lenken og last ned appen',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            283 =>
            array(
                'id' => 784,
                'language_id' => 1,
                'label_id' => 262,
                'value' => 'Invite Your Friends',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            284 =>
            array(
                'id' => 785,
                'language_id' => 2,
                'label_id' => 262,
                'value' => 'Пригласите своих друзей',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            285 =>
            array(
                'id' => 786,
                'language_id' => 3,
                'label_id' => 262,
                'value' => 'Inviter vennene dine',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            286 =>
            array(
                'id' => 787,
                'language_id' => 1,
                'label_id' => 263,
                'value' => 'Informations',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            287 =>
            array(
                'id' => 788,
                'language_id' => 2,
                'label_id' => 263,
                'value' => 'Информация',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            288 =>
            array(
                'id' => 789,
                'language_id' => 3,
                'label_id' => 263,
                'value' => 'Informasjon',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            289 =>
            array(
                'id' => 790,
                'language_id' => 1,
                'label_id' => 264,
                'value' => 'Update Application',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            290 =>
            array(
                'id' => 791,
                'language_id' => 2,
                'label_id' => 264,
                'value' => 'Обновить приложение',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            291 =>
            array(
                'id' => 792,
                'language_id' => 3,
                'label_id' => 264,
                'value' => 'Oppdater appen',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            292 =>
            array(
                'id' => 793,
                'language_id' => 1,
                'label_id' => 265,
                'value' => 'App Language',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            293 =>
            array(
                'id' => 794,
                'language_id' => 2,
                'label_id' => 265,
                'value' => 'Язык приложения',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            294 =>
            array(
                'id' => 795,
                'language_id' => 3,
                'label_id' => 265,
                'value' => 'App Språk',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            295 =>
            array(
                'id' => 796,
                'language_id' => 1,
                'label_id' => 266,
                'value' => 'Chat Settings',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            296 =>
            array(
                'id' => 797,
                'language_id' => 2,
                'label_id' => 266,
                'value' => 'Настройки чата',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            297 =>
            array(
                'id' => 798,
                'language_id' => 3,
                'label_id' => 266,
                'value' => 'Chatinnstillinger',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            298 =>
            array(
                'id' => 799,
                'language_id' => 1,
                'label_id' => 267,
                'value' => 'Application Settings',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            299 =>
            array(
                'id' => 800,
                'language_id' => 2,
                'label_id' => 267,
                'value' => 'Настройки приложения',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            300 =>
            array(
                'id' => 801,
                'language_id' => 3,
                'label_id' => 267,
                'value' => 'Appinnstillinger',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            301 =>
            array(
                'id' => 802,
                'language_id' => 1,
                'label_id' => 268,
                'value' => 'Discover People',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            302 =>
            array(
                'id' => 803,
                'language_id' => 2,
                'label_id' => 268,
                'value' => 'Найти людей',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            303 =>
            array(
                'id' => 804,
                'language_id' => 3,
                'label_id' => 268,
                'value' => 'Oppdag folk',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            304 =>
            array(
                'id' => 805,
                'language_id' => 1,
                'label_id' => 269,
                'value' => 'My QR Code',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            305 =>
            array(
                'id' => 806,
                'language_id' => 2,
                'label_id' => 269,
                'value' => 'Мой QR-код',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            306 =>
            array(
                'id' => 807,
                'language_id' => 3,
                'label_id' => 269,
                'value' => 'Min QR-kode',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            307 =>
            array(
                'id' => 808,
                'language_id' => 1,
                'label_id' => 270,
                'value' => 'Application Tools',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            308 =>
            array(
                'id' => 809,
                'language_id' => 2,
                'label_id' => 270,
                'value' => 'Инструменты приложения',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            309 =>
            array(
                'id' => 810,
                'language_id' => 3,
                'label_id' => 270,
                'value' => 'Appverktøy',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            310 =>
            array(
                'id' => 811,
                'language_id' => 1,
                'label_id' => 271,
                'value' => 'Account Settings',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            311 =>
            array(
                'id' => 812,
                'language_id' => 2,
                'label_id' => 271,
                'value' => 'Настройки аккаунта',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            312 =>
            array(
                'id' => 813,
                'language_id' => 3,
                'label_id' => 271,
                'value' => 'Konto Innstillinger',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            313 =>
            array(
                'id' => 814,
                'language_id' => 1,
                'label_id' => 272,
                'value' => 'Settings',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            314 =>
            array(
                'id' => 815,
                'language_id' => 2,
                'label_id' => 272,
                'value' => 'Настройки',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            315 =>
            array(
                'id' => 816,
                'language_id' => 3,
                'label_id' => 272,
                'value' => 'Innstillinger',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            316 =>
            array(
                'id' => 817,
                'language_id' => 1,
                'label_id' => 273,
                'value' => 'Frame the QR code',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            317 =>
            array(
                'id' => 818,
                'language_id' => 2,
                'label_id' => 273,
                'value' => 'Сканировать QR-код',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            318 =>
            array(
                'id' => 819,
                'language_id' => 3,
                'label_id' => 273,
                'value' => 'Ramme QR-koden',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            319 =>
            array(
                'id' => 820,
                'language_id' => 1,
                'label_id' => 274,
                'value' => 'Ok !Tap here and go to profile',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            320 =>
            array(
                'id' => 821,
                'language_id' => 2,
                'label_id' => 274,
                'value' => 'Ок! Нажмите здесь и перейдите в профиль',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            321 =>
            array(
                'id' => 822,
                'language_id' => 3,
                'label_id' => 274,
                'value' => 'Ok! Trykk her og gå til profil',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            322 =>
            array(
                'id' => 823,
                'language_id' => 1,
                'label_id' => 275,
                'value' => 'Scan QR Code',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            323 =>
            array(
                'id' => 824,
                'language_id' => 2,
                'label_id' => 275,
                'value' => 'Сканировать QR-код',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            324 =>
            array(
                'id' => 825,
                'language_id' => 3,
                'label_id' => 275,
                'value' => 'Skann QR-kode',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            325 =>
            array(
                'id' => 826,
                'language_id' => 1,
                'label_id' => 276,
                'value' => 'Pause Cam',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            326 =>
            array(
                'id' => 827,
                'language_id' => 2,
                'label_id' => 276,
                'value' => 'Приостановить камеру',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            327 =>
            array(
                'id' => 828,
                'language_id' => 3,
                'label_id' => 276,
                'value' => 'Pause Kamera',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            328 =>
            array(
                'id' => 829,
                'language_id' => 1,
                'label_id' => 277,
                'value' => 'Open Cam',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            329 =>
            array(
                'id' => 830,
                'language_id' => 2,
                'label_id' => 277,
                'value' => 'Открыть камеру',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            330 =>
            array(
                'id' => 831,
                'language_id' => 3,
                'label_id' => 277,
                'value' => 'Åpne kamera',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            331 =>
            array(
                'id' => 832,
                'language_id' => 1,
                'label_id' => 278,
                'value' => 'no Permission',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            332 =>
            array(
                'id' => 833,
                'language_id' => 2,
                'label_id' => 278,
                'value' => 'Нет разрешения',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            333 =>
            array(
                'id' => 834,
                'language_id' => 3,
                'label_id' => 278,
                'value' => 'Ingen tillatelse',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            334 =>
            array(
                'id' => 835,
                'language_id' => 1,
                'label_id' => 279,
                'value' => 'Update Now',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            335 =>
            array(
                'id' => 836,
                'language_id' => 2,
                'label_id' => 279,
                'value' => 'Обновить сейчас',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            336 =>
            array(
                'id' => 837,
                'language_id' => 3,
                'label_id' => 279,
                'value' => 'Oppdater nå',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            337 =>
            array(
                'id' => 838,
                'language_id' => 1,
                'label_id' => 280,
                'value' => 'Back',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            338 =>
            array(
                'id' => 839,
                'language_id' => 2,
                'label_id' => 280,
                'value' => 'Назад',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            339 =>
            array(
                'id' => 840,
                'language_id' => 3,
                'label_id' => 280,
                'value' => 'Tilbake',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            340 =>
            array(
                'id' => 841,
                'language_id' => 1,
                'label_id' => 281,
                'value' => 'Current application version',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            341 =>
            array(
                'id' => 842,
                'language_id' => 2,
                'label_id' => 281,
                'value' => 'Текущая версия приложения',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            342 =>
            array(
                'id' => 843,
                'language_id' => 3,
                'label_id' => 281,
                'value' => 'Gjeldende applikasjonsversjon',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            343 =>
            array(
                'id' => 844,
                'language_id' => 1,
                'label_id' => 282,
                'value' => 'New update available',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            344 =>
            array(
                'id' => 845,
                'language_id' => 2,
                'label_id' => 282,
                'value' => 'Доступно новое обновление',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            345 =>
            array(
                'id' => 846,
                'language_id' => 3,
                'label_id' => 282,
                'value' => 'Nytt oppdatering tilgjengelig',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            346 =>
            array(
                'id' => 847,
                'language_id' => 1,
                'label_id' => 283,
                'value' => 'Update Application',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            347 =>
            array(
                'id' => 848,
                'language_id' => 2,
                'label_id' => 283,
                'value' => 'Обновить приложение',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
            348 =>
            array(
                'id' => 849,
                'language_id' => 3,
                'label_id' => 283,
                'value' => 'Oppdater applikasjon',
                'created_at' => NULL,
                'updated_at' => NULL,
            ),
        ));
    }
}
