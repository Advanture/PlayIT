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
            'img_uri' => 'default_task.png',
            'coins' => 400,
            'type' => 1,
        ]);
        \App\Models\Task::create([
            'title' => "Like",
            'description' => "Собери свою личную коллекцию промо-роликов, найдя 3 видео к Золотому Лайку. Дерзай!",
            'img_uri' => 'default_task.png',
            'coins' => 300,
            'type' => 1,
        ]);

        // TASK TYPE 2 - MODERATORS //

        \App\Models\Task::create([
            'title' => "Мощный стиль",
            'description' => "Скидывай в чат модератору фото своего лука, сделанное в университете, в котором присутствует фиолетовая одежда. Покажи всем вокруг свою любовь к самому мощному факультету университета!",
            'img_uri' => 'moshniy_style.png',
            'coins' => 90,
            'type' => 2,
        ]);
        \App\Models\Task::create([
            'title' => "Любитель Figma",
            'description' => "Продемонстрируй свой скилл работы в Figma. Создай свой компонент с логотипом IT. 200 флекскоинов не заставят тебя ждать!",
            'img_uri' => 'LUBITEL_FIGMA.png',
            'coins' => 200,
            'type' => 2,
        ]);
        \App\Models\Task::create([
            'title' => "Громче!",
            'description' => "Закричи \"ИСиТ-МОЩЬ!\" в людном месте вне стен университета, засними это на видео и получи 150 флекскоинов!",
            'img_uri' => 'gromche.png',
            'coins' => 150,
            'type' => 2,
        ]);
        \App\Models\Task::create([
            'title' => "Гордон Рамзи",
            'description' => "Будь как Гордон Джеймс Рамзи! Создай оригинальное фиолетовое блюдо и отправь в сообщения сообществу фото и рецепт. Порази всех вокруг!",
            'img_uri' => 'GORDON.png',
            'coins' => 150,
            'type' => 2,
        ]);
        \App\Models\Task::create([
            'title' => "Я у мамы шутник!",
            'description' => "Скидывай в предложку Bonch.Memes мемы про наш факультет за 100 флекскоинов. Смешные мемы будут опубликованы, а самый остроумный юморист получит уникальную футболку!",
            'img_uri' => 'shutnik.png',
            'coins' => 100,
            'type' => 2,
        ]);
        \App\Models\Task::create([
            'title' => "Баг на баге",
            'description' => "Найди ошибку в коде, написанным нашим програмистом за 80 флекскоинов (dropmefiles.com/yQoha.) Порази всех своими знаниями!",
            'img_uri' => 'bug_na_bug.png',
            'coins' => 80,
            'type' => 2,
        ]);
        \App\Models\Task::create([
            'title' => "Гордость семьи",
            'description' => "Отправь нам фотографию ведомости с только что закрытой задолженностью или пришли скриншот личного кабинета, на котором видно, что у тебя их нет, за 100 флекскоинов. Будь гордостью для каждого из нас!",
            'img_uri' => 'GORDOST_SEMYI.png',
            'coins' => 100,
            'type' => 2,
        ]);
        \App\Models\Task::create([
            'title' => "Звезда соцсетей",
            'description' => "Участвуй в конкурсе на лучшее поздравление ИСиТа в Инстаграм, получи 200 флекскоинов!",
            'img_uri' => 'start_social.png',
            'coins' => 200,
            'type' => 2,
        ]);
        \App\Models\Task::create([
            'title' => "Человек-ИСиТ",
            'description' => "ИСиТовцы нуждаются в твоей помощи! Разыскивай их в сети и получай особенные задания. Чем больше выполнишь заданий, тем больше получишь флекскоинов! Список всех доступных квестов и их кураторов можно найти на странице \"Человек-ИСиТ\"",
            'img_uri' => 'chel_isit.png',
            'coins' => 50,
            'type' => 2,
        ]);
        \App\Models\Task::create([
            'title' => "Фантазер",
            'description' => "Найди на улице предметы, похожие на букты \"И\", \"С\", \"и\", \"Т\", сделай коллаж из фото и кидай в чат модератору. Прояви воображение!",
            'img_uri' => 'FANTAZER.png',
            'coins' => 100,
            'type' => 2,
        ]);
        \App\Models\Task::create([
            'title' => "Факультет прикладного флекса",
            'description' => "Повтори и запиши на видео танец наших победителей (yadi.sk/i/18huhvJmO2nInA), и отправь его нам за 150 флекскоинов. Порви танцпол!",
            'img_uri' => 'fakultet_flexa.png',
            'coins' => 150,
            'type' => 2,
        ]);
        \App\Models\Task::create([
            'title' => "Маинкрафтер",
            'description' => "Создай логотип ИСиТа на крыше университета. Да ладно, не пугайтесь. Создай его там в Maincraft (nav.sut.ru/minecraft-map.zip) и присылай нам скриншот за 150 флекскоинов!",
            'img_uri' => 'minecraft.png',
            'coins' => 150,
            'type' => 2,
        ]);
        \App\Models\Task::create([
            'title' => "Я как Noize MC",
            'description' => "Зафристайль на видео в инстаграм немного о нашем факультете и поделись им с нами. Не забудь отметить наш профиль @isit.bonch и оставить хештег #PlayIT_sut под видео. Покори нас своим речитативом!",
            'img_uri' => 'ya_kak_noise.png',
            'coins' => 150,
            'type' => 2,
        ]);
        \App\Models\Task::create([
            'title' => "ИКД: Я-дизайнер",
            'description' => "Придумай оригинальную идею маски ИСиТа в инстаграмме и отправь ее модератору за 200 флекскоинов. Обещай, что будет красиво!",
            'img_uri' => 'ikd.png',
            'coins' => 200,
            'type' => 2,
        ]);
        \App\Models\Task::create([
            'title' => "ИУС: Вечные правки",
            'description' => "Отформатируй и пришли нам предложенный текст (dropmefiles.com/uNHGM) по ГОСТам за 150 флекскоинов. Уверены, ты справишься даже с закрытыми глазами!",
            'img_uri' => 'IUS.png',
            'coins' => 150,
            'type' => 2,
        ]);
        \App\Models\Task::create([
            'title' => "АПС: Все, что я умею",
            'description' => "Напиши страницу про наш факультет на языке гипертекстовой разметки html и отправь ее нам за 250 флекскоинов. Мы уверены, у тебя все получится! ",
            'img_uri' => 'aps.png',
            'coins' => 250,
            'type' => 2,
        ]);
        \App\Models\Task::create([
            'title' => "Dodo",
            'description' => "Выполни задание от нашего партнера DodoPizza:1. Прийди в пиццерию на Большевиков, 2\n2. Сделай супермегакреативное фото.\n3. Выложи фото в Инстаграм.\n4. Отметь на фото аккаунт dodopizza_spb.\n5. Подпишись на аккаунт dodopizza_spb.\n6. Съешь кусочек пиццы. И получи за это 250 флекскоинов!",
            'img_uri' => 'dodo.png',
            'coins' => 250,
            'type' => 2,
        ]);
        \App\Models\Task::create([
            'title' => "Мерч!",
            'description' => "Сделай кастом, связанный с нашим факультетом, на любом элементе своей одежды и получи 200 флекскоинов. Выделись из серой толпы!",
            'img_uri' => 'merch.png',
            'coins' => 250,
            'type' => 2,
        ]);
        \App\Models\Task::create([
            'title' => "Bonch.dev: Brunch.Dove",
            'description' => "Найди имена всех персонажей комикса Brunch.Dove, который выходит в группе Bonch.dev, и распредели их по профессиональной деятельности за 150 флекскоинов!",
            'img_uri' => 'brunch.dove.png',
            'coins' => 150,
            'type' => 2,
        ]);
        \App\Models\Task::create([
            'title' => "Внеш.ком: Я пришел договориться",
            'description' => "Найди в университете председателя Студенческого совета Александра Борисова и уговори его на проведение квартирника от ф-та ИСиТ. Не забудь запечатлеть момент согласия на камеру и прислать его нам. Порази его своей настойчивостью!",
            'img_uri' => 'YA_PRISHEL.png',
            'coins' => 150,
            'type' => 2,
        ]);
        \App\Models\Task::create([
            'title' => "Kadrrrcom: Исторический мерч",
            'description' => "Как давно ты был на школе актива? Сделай фото в футболке любой смены ША или МША и выложи ее в истаграм с отметкой аккаунтов @kadrrrcom и @isit.bonch. Не забудь прислать фото-подтверждение в чат модератору!",
            'img_uri' => 'kadrkom.png',
            'coins' => 150,
            'type' => 2,
        ]);
        \App\Models\Task::create([
            'title' => "BonchScience: Найди меня, если сможешь",
            'description' => "Отыщи руководителя научного комитета Крылову Марию и сделай с ней самое МОЩНОЕ селфи. Вроде, такое простое задание за целых 100 флекскоинов, но так ли просто ее найти?",
            'img_uri' => 'BonchScience.png',
            'coins' => 100,
            'type' => 2,
        ]);
        \App\Models\Task::create([
            'title' => "OR.COM",
            'description' => "Сколько же человек с факультета-именинника было в составе Организационного комитета начиная с 2016 года? Скорей переходи в их группу и постарайся отыскать всех, затем отправляй число в чат модератору и забирай свои 150 флекскоинов! Удачи!",
            'img_uri' => 'ORCOM.png',
            'coins' => 150,
            'type' => 2,
        ]);

        // TASK TYPE 3 - BOT  //

        \App\Models\Task::create([
            'id' => 300,
            'title' => "Что ты о нас знаешь?",
            'description' => "Пройди тест об информационных системах и технологиях и проверь, насколько ты эрудирован! Рискнешь? Чтобы начать, напиши боту (vk.com/isitplayit) \"старт\".",
            'img_uri' => 'chto_ti_znaesh.png',
            'coins' => 10,
            'type' => 3,
        ]);
        \App\Models\Task::create([
            'id' => 301,
            'title' => "Кто(who)?",
            'description' => "Пройди небольшой тест с помощью нашего бота и получи уникальный код на монеты!",
            'img_uri' => 'who.png',
            'coins' => 10,
            'type' => 3,
        ]);

        // TASK TYPE 4 - CODE //

        \App\Models\Task::create([
            'id' => 400,
            'title' => "Красный, синий, зеленый!",
            'description' => "Разгадай наш таинственный шифр (dropmefiles.com/2VHxL) и напиши ответ в поле ниже за 100 флекскоинов. Удачи!",
            'img_uri' => 'RGB.png',
            'coins' => 100,
            'type' => 4,
        ]);
        \App\Models\Task::create([
            'id' => 401,
            'title' => "Ищейка",
            'description' => "Найди в картинке (dropmefiles.com/096S7) код и введи его за 100 флекскоинов!", //TODO: URL
            'img_uri' => 'isheika.png',
            'coins' => 100,
            'type' => 4,
        ]);
        \App\Models\Task::create([
            'id' => 402,
            'title' => "Сундук с сокровищами",
            'description' => "Найди таинственный код, спрятанный рядом с деканатом нашего факультета, введи его и получи 70 флекскоинов!",
            'img_uri' => 'SUNDUK.png',//todo
            'coins' => 100,
            'type' => 4,
        ]);
        \App\Models\Task::create([
            'id' => 403,
            'title' => "БИС: Безопасность превыше всего",
            'description' => "Разгадай шифр, спрятанный в промо-ролике мероприятия и получи за это 200 флекскоинов!",
            'img_uri' => 'BIS.png',
            'coins' => 100,
            'type' => 4,
        ]);
        \App\Models\Task::create([
            'id' => 404,
            'title' => "Ловушка председателя",
            'description' => "Что же хочет сообщить вам наш председатель? Быть может, ответ принесет вам немало флекскоинов. Найди послание на его странице и отправь в лс сообществу.",
            'img_uri' => 'LOVUSHA_PREDSEDA.png',
            'coins' => 150,
            'type' => 4,
        ]);

        // TASK TYPE 5 - LENTO4NIKI //

        \App\Models\Task::create([
            'id' => 500,
            'title' => "Жизнь в горошек",
            'description' => "Посчитать количество точек на логотипе ИСиТа",
            'img_uri' => 'img',
            'coins' => 50,
            'type' => 5,
        ]);
        \App\Models\Task::create([
            'id' => 501,
            'title' => "Учимся",
            'description' => "Назвать все 4 кафедры",
            'img_uri' => 'img',
            'coins' => 50,
            'type' => 5,
        ]);
        \App\Models\Task::create([
            'id' => 502,
            'title' => "Наследники",
            'description' => "Назвать 4 предыдущих председателя факультета",
            'img_uri' => 'img',
            'coins' => 50,
            'type' => 5,
        ]);
        \App\Models\Task::create([
            'id' => 503,
            'title' => "Найди отличия",
            'description' => "Назвать 10 отличий ИСиТа от других факультетов",
            'img_uri' => 'img',
            'coins' => 50,
            'type' => 5,
        ]);
        \App\Models\Task::create([
            'id' => 504,
            'title' => "Вечные фанаты",
            'description' => "Спеть трек Ранеток",
            'img_uri' => 'img',
            'coins' => 50,
            'type' => 5,
        ]);
        \App\Models\Task::create([
            'id' => 505,
            'title' => "Восап, бро",
            'description' => "Зачитать парт Миши в историю В инсту",
            'img_uri' => 'img',
            'coins' => 50,
            'type' => 5,
        ]);
        \App\Models\Task::create([
            'id' => 506,
            'title' => "Минутка истории",
            'description' => "В каком году появился факультет ИСиТ?",
            'img_uri' => 'img',
            'coins' => 50,
            'type' => 5,
        ]);
        \App\Models\Task::create([
            'id' => 507,
            'title' => "Победители",
            'description' => "Сколько раз ИСиТ брал кубок Ректора?",
            'img_uri' => 'img',
            'coins' => 50,
            'type' => 5,
        ]);
        \App\Models\Task::create([
            'id' => 508,
            'title' => "Тусовка",
            'description' => "Назвать все меро ИСиТа",
            'img_uri' => 'img',
            'coins' => 50,
            'type' => 5,
        ]);
        \App\Models\Task::create([
            'id' => 509,
            'title' => "Я-картограф",
            'description' => "На карте показать места силы факультета",
            'img_uri' => 'img',
            'coins' => 50,
            'type' => 5,
        ]);
        \App\Models\Task::create([
            'id' => 510,
            'title' => "221",
            'description' => "Двоичный код",
            'img_uri' => 'img',
            'coins' => 50,
            'type' => 5,
        ]);
        \App\Models\Task::create([
            'id' => 511,
            'title' => "Ленивец",
            'description' => "Сколько лифтов в Бонче?",
            'img_uri' => 'img',
            'coins' => 50,
            'type' => 5,
        ]);
        \App\Models\Task::create([
            'id' => 512,
            'title' => "Правда/ложь",
            'description' => "Названный факт - правда или ложь?",
            'img_uri' => 'img',
            'coins' => 50,
            'type' => 5,
        ]);
        \App\Models\Task::create([
            'id' => 513,
            'title' => "Инста-блогер",
            'description' => "Запилить историю в инсту, агитируя людей учавствовать в золотом лайке",
            'img_uri' => 'img',
            'coins' => 50,
            'type' => 5,
        ]);
        \App\Models\Task::create([
            'id' => 514,
            'title' => "Сколько?",
            'description' => "Сколько суммарно лайков на 15 последних постах в группе исита",
            'img_uri' => 'img',
            'coins' => 50,
            'type' => 5,
        ]);
        \App\Models\Task::create([
            'id' => 515,
            'title' => "Боевой клич!",
            'description' => "Перечислить все факультеты и их кричалки(ИСиТ-мощь и т.д.)",
            'img_uri' => 'img',
            'coins' => 50,
            'type' => 5,
        ]);

        // TASK TYPE 6 - GAME //

        \App\Models\Task::create([
            'id' => 600,
            'title' => "Exit the Bonch, pt1",
            'description' => "Сыграй в Exit The Bonch, преодолей планку в 500 очков и получи в награду 300 флекскоинов!",
            'img_uri' => 'Exit_the_Bonch_pt1.png',
            'coins' => 300,
            'type' => 6,
        ]);
        \App\Models\Task::create([
            'id' => 601,
            'title' => "Exit the Bonch, pt2",
            'description' => "Совершенствуй свои навыки в Exit The Bonch. Достигни 1000 очков и получи в награду 400 флекскоинов!",
            'img_uri' => 'Exit_the_Bonch_pt2.png',
            'coins' => 400,
            'type' => 6,
        ]);
        \App\Models\Task::create([
            'id' => 602,
            'title' => "Exit the Bonch, pt3",
            'description' => "Продемонстрируй свой скилл в игре Exit The Bonch. Набери 2000 очков и 500 флекскоинов не заставят себя ждать!",
            'img_uri' => 'Exit_the_Bonch_pt3.png',
            'coins' => 500,
            'type' => 6,
        ]);
    }
}
