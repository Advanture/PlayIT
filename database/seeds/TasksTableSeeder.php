<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // TASK TYPE 1 - AR //

        \App\Models\Task::create([
            'title' => "Кладоискатель",
            'description' => "Найди и собери все монетки, спрятанные в университете за 400 флекскоинов! Наполни свои сундуки золотом!",
            'img_uri' => env('FRONTEND_URL'),
            'coins' => 400,
            'type' => 1,
        ]);
        \App\Models\Task::create([
            'title' => "Like",
            'description' => "Собери свою личную коллекцию промо-роликов, найдя 3 видео к Золотому Лайку. Дерзай!",
            'img_uri' => env('FRONTEND_URL'),
            'coins' => 300,
            'type' => 1,
        ]);

        // TASK TYPE 2 - MODERATORS //

        \App\Models\Task::create([
            'title' => "Мощный стиль",
            'description' => "Скидывай в чат модератору фото своего лука, сделанное в университете, в котором присутствует фиолетовая одежда. Покажи всем вокруг свою любовь к самому мощному факультету университета!",
            'img_uri' => env('FRONTEND_URL'),
            'coins' => 90,
            'type' => 2,
        ]);
        \App\Models\Task::create([
            'title' => "Любитель Figma",
            'description' => "Продемонстрируй свой скилл работы в Figma. Создай свой компонент с логотипом IT. 200 флекскоинов не заставят тебя ждать!",
            'img_uri' => env('FRONTEND_URL'),
            'coins' => 200,
            'type' => 2,
            //TODO: DAY 2
        ]);
        \App\Models\Task::create([
            'title' => "Громче!",
            'description' => "Закричи \"ИСиТ-МОЩЬ!\" в людном месте вне стен университета, засними это на видео и получи 150 флекскоинов!",
            'img_uri' => env('FRONTEND_URL'),
            'coins' => 150,
            'type' => 2,
        ]);
        \App\Models\Task::create([
            'title' => "Гордон Рамзи",
            'description' => "Будь как Гордон Джеймс Рамзи! Создай оригинальное фиолетовое блюдо и отправь в сообщения сообществу фото и рецепт. Порази всех вокруг!",
            'img_uri' => env('FRONTEND_URL'),
            'coins' => 150,
            'type' => 2,
        ]);
        \App\Models\Task::create([
            'title' => "Я у мамы шутник!",
            'description' => "Будь как Гордон Джеймс Рамзи! Создай оригинальное фиолетовое блюдо и отправь в сообщения сообществу фото и рецепт. Порази всех вокруг!",
            'img_uri' => env('FRONTEND_URL'),
            'coins' => 100,
            'type' => 2,
        ]);
        \App\Models\Task::create([
            'title' => "Баг на баге",
            'description' => "Найди ошибку в коде, написанным нашим програмистом за 80 флекскоинов. Порази всех своими знаниями!",
            'img_uri' => env('FRONTEND_URL'),
            'coins' => 80,
            'type' => 2,
        ]);
        \App\Models\Task::create([
            'title' => "Гордость семьи",
            'description' => "Отправь нам фотографию ведомости с только что закрытой задолженностью или пришли скриншот личного кабинета, на котором видно, что утебя их нет, за 100 флекскоинов. Будь гордостью для каждого из нас!",
            'img_uri' => env('FRONTEND_URL'),
            'coins' => 100,
            'type' => 2,
        ]);
        \App\Models\Task::create([
            'title' => "Звезда соцсетей",
            'description' => "Участвуй в конкурсе на лучшее поздравление ИСиТа в Инстаграм, получи 200 флекскоинов!",
            'img_uri' => env('FRONTEND_URL'),
            'coins' => 200,
            'type' => 2,
        ]);
        \App\Models\Task::create([
            'title' => "Человек-ИСиТ",
            'description' => "Разыскивай людей с фиолетовыми лентами и получай от них особенные задания. Чем больше найдешь, тем больше получишь флекскоинов!",
            'img_uri' => env('FRONTEND_URL'),
            'coins' => 50,
            'type' => 2, // TODO: мб убрать, хз
        ]);
        \App\Models\Task::create([
            'title' => "Ловушка председателя",
            'description' => "Что же хочет сообщить вам наш председатель? Быть может, ответ принесет вам немало флекскоинов. Найди послание на его странице и отправь в лс сообществу.",
            'img_uri' => env('FRONTEND_URL'),
            'coins' => 150,
            'type' => 2,
        ]);
        \App\Models\Task::create([
            'title' => "Фантазер",
            'description' => "Найди на улице предметы, похожие на букты \"И\", \"С\", \"и\", \"Т\", сделай коллаж из фото и кидай в чат модератору. Прояви воображение!",
            'img_uri' => env('FRONTEND_URL'),
            'coins' => 100,
            'type' => 2,
        ]);
        \App\Models\Task::create([
            'title' => "Факультет прикладного флекса",
            'description' => "Повтори и запиши на видео танец наших победителей (ссылка), и отправь его нам за 150 флекскоинов Порви танцпол!",
            'img_uri' => env('FRONTEND_URL'),
            'coins' => 150,
            'type' => 2,
        ]);
        \App\Models\Task::create([
            'title' => "Маинкрафтер",
            'description' => "Создай логотип ИСиТа на крыше университета. Да ладно, не пугайтесь. Создай его там в Maincraft(http://nav.sut.ru/minecraft-map.zip) и присылай нам скриншот за 150 флекскоинов!",
            'img_uri' => env('FRONTEND_URL'),
            'coins' => 150,
            'type' => 2,
        ]);
        \App\Models\Task::create([
            'title' => "Я как Noize MC",
            'description' => "Зафристайль на видео в инстаграм немного о нашем факультете и поделись им с нами. Не забудь отметить наш профиль @isit.bonch и оставить хештег #PlayIT_sut под видео. Покори нас своим речитативом!",
            'img_uri' => env('FRONTEND_URL'),
            'coins' => 150,
            'type' => 2,
        ]);
        \App\Models\Task::create([
            'title' => "ИКД: Я-дизайнер",
            'description' => "Придумай оригинальную идею маски ИСиТа в инстаграмме и отправь ее модератору за 200 флекскоинов. Обещай, что будет красиво!",
            'img_uri' => env('FRONTEND_URL'),
            'coins' => 200,
            'type' => 2,
        ]);
        \App\Models\Task::create([
            'title' => "ИУС: Вечные правки",
            'description' => "Отформатируй и пришли нам предложенный текст (https://dropmefiles.com/Lt0vG) по ГОСТам за 150 флекскоинов. Уверены, ты справишься даже с закрытыми глазами!",
            'img_uri' => env('FRONTEND_URL'),
            'coins' => 150,
            'type' => 2,
        ]);
        \App\Models\Task::create([
            'title' => "АПС: Все, что я умею",
            'description' => "Напиши страницу про наш факультет на языке гипертекстовой разметки html и отправь ее нам за 250 флекскоинов. Мы уверены, у тебя все получится! ",
            'img_uri' => env('FRONTEND_URL'),
            'coins' => 250,
            'type' => 2,
        ]);
        \App\Models\Task::create([
            'title' => "Dodo",
            'description' => "Выполни задание от нашего партнера DodoPizza:1. Прийди в пиццерию на Большевиков, 2\n2. Сделай супермегакреативное фото.\n3. Выложи фото в Инстаграм.\n4. Отметь на фото аккаунт dodopizza_spb.\n5. Подпишись на аккаунт dodopizza_spb.\n6. Съешь кусочек пиццы. И получи за это 250 флекскоинов!",
            'img_uri' => env('FRONTEND_URL'),
            'coins' => 250,
            'type' => 2,
        ]);
        \App\Models\Task::create([
            'title' => "Мерч!",
            'description' => "Сделай кастом, связанный с нашим факультетом, на любом элементе своей одежды и получи 200 флекскоинов. Выделись из серой толпы!",
            'img_uri' => env('FRONTEND_URL'),
            'coins' => 250,
            'type' => 2,
        ]);
        \App\Models\Task::create([
            'title' => "Bonch.dev: Brunch.Dove",
            'description' => "Найди имена всех персонажей комикса Brunch.Dove, который выходит в группе Bonch.dev, и распредели их по профессиональной деятельности за 100 флекскоинов!",
            'img_uri' => env('FRONTEND_URL'),
            'coins' => 150,
            'type' => 2,
        ]);
        \App\Models\Task::create([
            'title' => "Внеш.ком: Я пришел договориться",
            'description' => "Найди в университете председателя Студенческого совета Александра Борисова и уговори его на проведение квартирника от ф-та ИСиТ. Не забудь запечатлеть момент согласия на камеру и прислать его нам. Порази его своей настойчивостью!",
            'img_uri' => env('FRONTEND_URL'),
            'coins' => 150,
            'type' => 2,
        ]);
        \App\Models\Task::create([
            'title' => "Kadrrrcom: Исторический мерч",
            'description' => "Как давно ты был на школе актива? Сделай фото в футболке любой смены ША или МША и выложи ее в истаграм с отметкой аккаунтов @kadrrrcom и @isit.bonch. Не забудь прислать фото-подтверждение в чат модератору!",
            'img_uri' => env('FRONTEND_URL'),
            'coins' => 150,
            'type' => 2,
        ]);
        \App\Models\Task::create([
            'title' => "BonchScience: Найди меня, если сможешь",
            'description' => "Отыщи руководителя научного комитета Крылову Марию и сделай с ней самое МОЩНОЕ селфи. Вроде, такое простое задание за целых 100 флекскоинов, но так ли просто ее найти?",
            'img_uri' => env('FRONTEND_URL'),
            'coins' => 100,
            'type' => 2,
        ]);
        \App\Models\Task::create([
            'title' => "OR.COM",
            'description' => "Сколько же человек с факультета-именинника было в составе Организационного комитета начиная с 2016 года? Скорей переходи в их группу и постарайся отыскать всех, затем отправляй число в чат модератору и забирай свои 150 флекскоинов! Удачи!",
            'img_uri' => env('FRONTEND_URL'),
            'coins' => 150,
            'type' => 2,
        ]);

        // TASK TYPE 3 - BOT  //

        \App\Models\Task::create([
            'id' => 300,
            'title' => "Что ты о нас знаешь?",
            'description' => "Пройди тест об информационных системах и технологиях и проверь, насколько ты эрудирован! Рискнешь? Чтобы начать, напиши боту (https://vk.com/isitplayit) \"старт\".",
            'img_uri' => env('FRONTEND_URL'),
            'coins' => 10,
            'type' => 3,
        ]);
        \App\Models\Task::create([
            'id' => 301,
            'title' => "Кто(who)?",
            'description' => "Пройди небольшой тест с помощью нашего бота (ссылка) и получи уникальный код на монеты!",
            'img_uri' => env('FRONTEND_URL'),
            'coins' => 10,
            'type' => 3,
        ]);

        // TASK TYPE 4 - CODE // TODO: ADD IDS

        \App\Models\Task::create([
            'title' => "Красный, синий, зеленый!",
            'description' => "Разгадай наш таинственный шифр \"что-то тут будет\" и напиши ответ в чат модератору за 100 флекскоинов. Удачи!", //TODO: ШИФР
            'img_uri' => env('FRONTEND_URL'),
            'coins' => 100,
            'type' => 4,
        ]);
        \App\Models\Task::create([
            'title' => "Ищейка",
            'description' => "Найди в картинке(ссылка) код и введи его за 100 флекскоинов!", //TODO: URL
            'img_uri' => env('FRONTEND_URL'),
            'coins' => 100,
            'type' => 4,
        ]);
        \App\Models\Task::create([
            'title' => "Сундук с сокровищами",
            'description' => "Найди таинственный код, спрятанный рядом с деканатом нашего факультета, введи его и получи 70 флекскоинов!",
            'img_uri' => env('FRONTEND_URL'),
            'coins' => 100,
            'type' => 4,
        ]);
        \App\Models\Task::create([
            'title' => "БИС: Безопасность превыше всего",
            'description' => "Разгадай шифр, спрятанный в промо-ролике мероприятия и получи за это 200 флекскоинов!",
            'img_uri' => env('FRONTEND_URL'),
            'coins' => 100,
            'type' => 4,
        ]);

        // TASK TYPE 5 - LENTO4NIKI //

        \App\Models\Task::create([
            'title' => "Жизнь в горошек",
            'description' => "Посчитать количество точек на логотипе ИСиТа",
            'img_uri' => env('FRONTEND_URL'),
            'coins' => 50,
            'type' => 5,
        ]);
        \App\Models\Task::create([
            'title' => "Учимся",
            'description' => "Назвать все 4 кафедры",
            'img_uri' => env('FRONTEND_URL'),
            'coins' => 50,
            'type' => 5,
        ]);
        \App\Models\Task::create([
            'title' => "Наследники",
            'description' => "Назвать 4 предыдущих председателя факультета",
            'img_uri' => env('FRONTEND_URL'),
            'coins' => 50,
            'type' => 5,
        ]);
        \App\Models\Task::create([
            'title' => "Найди отличия",
            'description' => "Назвать 10 отличий ИСиТа от других факультетов",
            'img_uri' => env('FRONTEND_URL'),
            'coins' => 50,
            'type' => 5,
        ]);
        \App\Models\Task::create([
            'title' => "Вечные фанаты",
            'description' => "Спеть трек Ранеток",
            'img_uri' => env('FRONTEND_URL'),
            'coins' => 50,
            'type' => 5,
        ]);
        \App\Models\Task::create([
            'title' => "Восап, бро",
            'description' => "Зачитать парт Миши в историю В инсту",
            'img_uri' => env('FRONTEND_URL'),
            'coins' => 50,
            'type' => 5,
        ]);
        \App\Models\Task::create([
            'title' => "Минутка истории",
            'description' => "В каком году появился факультет ИСиТ?",
            'img_uri' => env('FRONTEND_URL'),
            'coins' => 50,
            'type' => 5,
        ]);
        \App\Models\Task::create([
            'title' => "Победители",
            'description' => "Сколько раз ИСиТ брал кубок Ректора?",
            'img_uri' => env('FRONTEND_URL'),
            'coins' => 50,
            'type' => 5,
        ]);
        \App\Models\Task::create([
            'title' => "Тусовка",
            'description' => "Назвать все меро ИСиТа",
            'img_uri' => env('FRONTEND_URL'),
            'coins' => 50,
            'type' => 5,
        ]);
        \App\Models\Task::create([
            'title' => "Я-картограф",
            'description' => "На карте показать места силы факультета",
            'img_uri' => env('FRONTEND_URL'),
            'coins' => 50,
            'type' => 5,
        ]);
        \App\Models\Task::create([
            'title' => "221",
            'description' => "Двоичный код",
            'img_uri' => env('FRONTEND_URL'),
            'coins' => 50,
            'type' => 5,
        ]);
        \App\Models\Task::create([
            'title' => "Ленивец",
            'description' => "Сколько лифтов в Бонче?",
            'img_uri' => env('FRONTEND_URL'),
            'coins' => 50,
            'type' => 5,
        ]);

        // TASK TYPE 6 - GAME //

        \App\Models\Task::create([
            'id' => 600,
            'title' => "Exit the Bonch, pt1",
            'description' => "Сыграй в Exit The Bonch, преодолей планку в 500 очков и получи в награду 300 флекскоинов!",
            'img_uri' => env('FRONTEND_URL'),
            'coins' => 300,
            'type' => 6,
        ]);
        \App\Models\Task::create([
            'id' => 601,
            'title' => "Exit the Bonch, pt2",
            'description' => "Совершенствуй свои навыки в Exit The Bonch. Достигни 1000 очков и получи в награду 400 флекскоинов!",
            'img_uri' => env('FRONTEND_URL'),
            'coins' => 400,
            'type' => 6,
        ]);
        \App\Models\Task::create([
            'id' => 602,
            'title' => "Exit the Bonch, pt2",
            'description' => "Продемонстрируй свой скилл в игре Exit The Bonch. Набери 2000 очков и 500 флекскоинов не заставят себя ждать!",
            'img_uri' => env('FRONTEND_URL'),
            'coins' => 500,
            'type' => 6,
        ]);
    }
}
