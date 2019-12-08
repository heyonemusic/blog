-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 08 2019 г., 14:46
-- Версия сервера: 10.3.13-MariaDB
-- Версия PHP: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `blog`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `title`) VALUES
(1, 'IT'),
(2, 'Кулинария'),
(8, 'Саморазвитие');

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `post_id` int(11) NOT NULL,
  `datetime` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`id`, `name`, `text`, `post_id`, `datetime`) VALUES
(255, 'Валерий', 'Интересная статья!', 89, '2019-12-08 11:25:13'),
(256, 'Александр', 'Полностью согласен с Вами, Валерий.', 89, '2019-12-08 12:05:31'),
(271, 'Ангелина', 'В целом, заметка интересная...', 89, '2019-12-08 14:13:24'),
(275, 'Оксана', 'Всё верно!', 88, '2019-12-08 16:35:10');

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `text` text NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  `image` varchar(300) NOT NULL,
  `category_id` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `title`, `text`, `datetime`, `image`, `category_id`) VALUES
(78, '10 перспективных IT-стартапов', 'Не только Кремниевая долина является клондайком всех самых крутых IT-стартапов. В статье мы расскажем про 10 стартапов 2019 года вне Силиконовой долины.\r\n\r\n<b>1. Divvy</b>\r\nЭто аналог сервиса совместных платежей Venmo. Но только в данном случае пользователи делят не счет в кафе, а бизнес-расходы. Приложение оперативно ведет бюджет, принимая в расчет траты каждого зарегистрированного сотрудника и подводя итоги в конце месяца. Разработчики утверждают, что выручка от Divvy растет гораздо быстрее, чем от всех прежних инвестиций команды. \r\n\r\n<img src=\"https://itproger.com/img/news/1566395277.jpg\" class=\"card-img-top\">\r\n\r\n<b>2. Root Insurance</b>\r\nОни обещают изменить рынок автострахования с помощью уникального приложения для смартфонов. Программа может давать оценку стилю вождения, делает скоринг, выбирает наиболее выгодные предложения страховиков и помогает в заключении договора. \r\n\r\n<img src=\"https://itproger.com/img/news/1566395283.jpg\" class=\"card-img-top\">\r\n\r\nПо словам создателей, аккуратным водителям удастся сэкономить около 50%. В 2020 году компания планирует закрепиться на рынке всех штатов. ', '2019-09-05 13:57:10', 'images/post/maxresdefault.jpg', 1),
(79, 'Почему расширения Google Chrome никому не нужны?', 'Плюсы Google Chrome? Все их назвать сложно, но однозначно плюсом можно назвать расширения. С их помощью Chrome можно обогатить дополнительными функциями, что придают ему иной вид.\r\n\r\n<b>Популярные расширения интернет-магазина Chrome</b>\r\nДействительно полезных и интересных расширений в Web Store не так уж и много. По большому счету это антивирусы, антибаннеры, менеджеры и переводчики. Судя по миллионному числу загрузок, именно в подобных онлайн-помощниках нуждается большинство пользователей. Но в чем причина, почему так вышло?\r\n\r\nНам кажется очевидным тот факт, что Google наплевал на магазин Chrome. Корпорация абсолютно не стремится делать его комфортным для клиентов и разработчиков. Один только жалкий интерфейс настойчиво наталкивает на соответствующий вывод.\r\n\r\n<img src=\"https://itproger.com/img/news/1566394531.jpg\" class=\"card-img-top\">\r\n\r\nВполне можно было реализовать Web Store по примеру Google Play. Но видимо компания решила, что лишние усилия будут ни к чему, ведь с помощью расширений многие захотят только заблокировать назойливую рекламу – не более.\r\n\r\nВ итоге каталог состоит сплошь из пассивных программ. А ведь как было бы здорово, если б удалось привлечь разработчиков различных известных сервисов, и они внедрили бы в Chrome мини-версии своих ресурсов, открывающие доступ к их главным услугам без надобности посещать сайт. Например, почему не реализовали расширение для того же Google Play Музыка? Оставим этот вопрос без комментариев.', '2019-09-05 13:59:59', 'images/post/googlechrome.png', 1),
(80, 'Какие вопросы задают на собеседованиях: Tesla, Apple, Google?', 'Компании-участницы рейтинга Fortune 500 даже в подборе новых сотрудников отличаются оригинальным подходом. Изюминкой их собеседований часто становятся заковыристые вопросы.\r\n\r\n<b>1. Tesla</b>\r\nВот одна из любимых задачек Илона Маска для проверки специалистов на сообразительность:\r\n<footer class=\"blockquote-footer\">«Вы стоите в определенной точке на земле. Сначала вы идете на юг, преодолевая 1 км, после чего проходите 1 км на запад и 1 км на север. В итоге вы оказываетесь в той самой точке, откуда начинали идти. Где вы?».</footer>\r\nПомимо этого, соискателей в Тесла просят рассказать, как они могут изменить культуру организации. Таким образом пытаются выяснить, хватает ли человеку личного опыта и эрудиции, чтобы спровоцировать перемены внутри фирмы. Отвечая на данный вопрос, кандидат также покажет свою способность использовать социальные качества и профессиональные навыки для решения сложных проблем. \r\n\r\n<img src=\"https://itproger.com/img/news/1565882647.jpg\" class=\"card-img-top\">\r\n\r\nВывод один: чтобы не провалиться на собеседовании в компании Tesla, нужно быть находчивым и готовым к подобным необычным дилеммам. ', '2019-09-05 14:30:13', 'images/post/1565882374.jpg', 1),
(81, 'Какие языки программирования для чего нужны?', 'Среди множества языков программирования очень легко запутаться и понять какой для чего нужен. В статье мы рассмотрим популярные ЯП и узнаем какие для чего нужны и где используются.\r\n\r\n<b>JavaScript</b>\r\nСвое название JS получил на волне актуальности Java, и поэтому их часто путают. К тому же теперь JavaScript вынужден бороться за статус равноправного ЯП. Стоит отметить, у него это очень хорошо получается, ведь именно он стал самым популярным среди разработчиков всего мира. \r\n\r\nВостребованностью JS обязан прежде всего развитию Web. На нем пишется пользовательский интерфейс всех интерактивных веб-приложений, благодаря которым браузер превратился в полезный и удобный рабочий инструмент, став в один ряд с пакетом Microsoft Office и сотнями других стандартных приложений для ОС Windows. Кроме того JavaScript нашел свое место в серверном программировании.\r\n\r\n<img src=\"https://itproger.com/paid_courses/img/javascript_anim.gif\" class=\"card-img-top\">\r\n\r\nЭтот язык в последнее время активно покоряет новые сферы. Причем стартовать с ним в профессии гораздо легче, чем с Java, а зарплаты часто бывают одинаковыми. Вывод таков: JavaScript сейчас является одним из самых удачных вариантов для начинающих разработчиков.', '2019-09-05 14:37:23', 'images/post/1565269567.jpg', 1),
(82, 'Сможет ли искусственный интеллект захватить мир?', 'Уже не один десяток лет известно, что ИИ может заполонить весь мир отодвинув человека на второй план. Сможет ли это произойти и каковы на это шансы?\r\n\r\nЧеловекоподобные роботы смогут забирать рабочие места и лишать людей не только заработка, но и смысла жизни. Однако и человечество не стоит на месте. Новые знания и умения мы тоже осваиваем легко, было бы желание.\r\n\r\n<b>Что мы знаем?</b>\r\nДвадцатый век познакомил нас с первыми компьютерами и автоматизированным производством, что вызвало бурю негодований. Но уже в 21 веке развитие технологий сделало еще больший рывок. При этом предприимчивые бизнесмены не побоявшиеся рискнуть наполнили свои карманы прибылью.\r\n\r\nРежиссеры и писатели считают, что ИИ погубит нашу планету, описывая это в своих книгах и экранизируя в фильмах. Он, конечно, окажет свое влияние, но не думаю, что Апокалипсис наступит скоро. Даже наоборот качество жизни может стать лучше при разумном использовании.\r\n\r\nПредоставляя хороший уровень образования специалистам, их здоровое самосознания для чего они это делают и уважительное отношение к земле и всему живому. С этим всем человек и ИИ смогут жить в гармонии.\r\n\r\n<img src=\"https://itproger.com/img/news/1556014761.png\" class=\"card-img-top\">\r\n\r\nНачиная со школьной скамьи, необходимо говорить детям о научных достижениях и ИИ, не забывая отмечать, что научные достижения должны быть во благо.\r\n\r\n<b>ИИ и человеческие качества</b>\r\nЧто еще хочется отметить, так это то, что ИИ никогда не сможет творить, создавая шедевры, писать музыку, сочинять стихи, придумывать шутки, и т.п. Это всегда останется прерогативой человека. Ни один человек не захочет изливать душу роботу, даже если он будет очень похож на человека, поскольку мы никогда не дождемся от него сочувствия или дружеского совета.\r\n\r\nДа, в медицине ИИ может творить чудеса, излечивая людей от страшных болезней, но он не сможет чутко посочувствовать или с вниманием отнестись к больным детям.\r\n\r\nИИ не сможет достичь тех фантастических возможностей (бесконтрольное самообучение, саморазвитие, и принятие самостоятельных решений,…), если только человек ему это не позволит. Я думаю, что ни один разумный человек не захочет, чтобы его подвинул по карьерной лестнице робот. Может ли ИИ сам решить, что нужно захватить планету и истребить человечество? Конечно нет! Он принимает те решения, которые человек залаживает ему в программу. Главное понимать чего мы хотим достичь этими технологиями и куда движемся.\r\n\r\nИИ создавался для того, что бы гармонично существовать с людьми и помогать в их деятельности, а не руководить людьми. ИИ не поглотит человечество, но повлияет на качество его жизни и создаст конкуренцию среди некоторых рабочих кадров.', '2019-09-05 14:51:04', 'images/post/1556014855.jpg', 1),
(83, 'Как выбрать мультиварку?', 'Пожалуй, трудно представить себе любую современную кухню без такого чуда бытовой техники, как устройство для приготовления шедевров кулинарии – мультиварка, или скороварка. Этой кухонной помощнице под силу сотворить практически любое вкусное и питательное блюдо посредством какого угодно способа тепловой обработки. Обычно мультиварки от известных фирм оснащены несколькими режимами функционирования, за счет чего процесс приготовления еды становится экономичнее в плане времени и затраченных сил, что очень облегчает работу любой хозяйки, а потому качественную мультиварку можно смело приобретать в подарок. Главное – не растеряться перед широчайшим ассортиментом этих бытовых приборов, предлагаемых различными производителями, и выбрать тот, который нужен именно вам.\r\n\r\n<b>Как выбрать мультиварку?</b>\r\nДля правильного выбора мультиварки необходимо обратить внимание на следующие критерии: объем и качество покрытия чаши, мощность, функционал и режимы работы, а также материал корпуса (металлические гораздо долговечнее пластиковых, причем предпочтение следует отдать алюминиевому сплаву) и безопасность (у прибора должны быть длинный шнур, надежно крепящийся к корпусу, система плавного выхода пара и непроницаемый клапан).', '2019-09-05 14:55:19', 'images/post/nkPqjXgZ.jpg', 2),
(84, 'Типичные ошибки при приготовлении пищи, которые занятые люди делают на кухне', 'Людям вечно не хватает времени: надо все успеть и в офисе, и дома. Приготовление пищи занимает немалую часть этого времени. Потому занятые люди всячески стараются ускорить процесс, мечтая проводить вечера не у плиты, а за другим занятием. При этом, стараясь ускориться, они совершают ошибки, приводящие к обратному результату.\r\n\r\n<b>1. Использование слишком высокой температуры</b>\r\n\r\n<img src=\"https://novate.ru/files/u39567/395672641.jpg\" class=\"card-img-top\">\r\n\r\nПриготовление пищи при высокой температуре позволяет ускорить процесс. Так думают многие, потому пользуются этим способом, и, увы, в большинстве случаев ошибаются. Высокая температура порой просто заставляет нас верить, что еда готова, когда на самом деле это не так. Нельзя пожарить цыпленка за пару минут, даже если на нем появилась прекрасная золотистая корочка. Если же варить курицу на сильном огне, она станет похожа на резину и потеряет сочность. Блюд, которые стоит готовить при высокой температуре, не так уж и много. Это бифштекс, стейк на косточке, цуккини и бургеры.\r\n\r\n<b>2. Хаос на рабочем месте</b>\r\n\r\n<img src=\"https://novate.ru/files/u39567/395670049.jpg\" class=\"card-img-top\">\r\n\r\nЕсли по несколько раз бегать к холодильнику и кухонному шкафу, то говорить о быстроте приготовления еды смешно. Все, что нужно для определенного блюда, должно быть приготовлено заранее, начиная от порезанных овощей и заканчивая всеми необходимыми приборами. Обязательно проверьте список ингредиентов и убедитесь, что все в порядке, прежде чем вы начнете готовить. А можно пойти еще дальше и расположить ингредиенты в том порядке, в котором они вам понадобятся.', '2019-09-05 15:04:55', 'images/post/395672844.jpg', 2),
(85, 'Котлеты по-цыгански: Как улучшить вкус мясного блюда, добавив всего один ингредиент', 'Котлеты - популярное мясное блюдо, которое подойдет практически к любому гарниру. У каждой хозяйки есть свои секреты его приготовления, хитрости, благодаря которым котлетки получаются нежными и сочными. Одна из самых интересных и в то же простых вариаций традиционного рецепта - цыганские котлеты. Стоит добавить всего один ингредиент, и вкус уже совсем другой!\r\n\r\nПочему этот рецепт называется цыганским, точно неизвестно, но именно под таким наименованием он и прижился, вошел в кулинарные книги. Котлеты таким способом готовили еще наши бабушки, идея не нова, но зато проверена временем. На Novate.ru часто публикуются хитрости, которые применяло в хозяйстве старшее поколение, и этот рецепт один из тех, что до сих пор не утратил актуальность.\r\n\r\nДля таких котлет готовится обыкновенный говяжий фарш. Далее к нему добавляется мякиш половины батона, размоченный в молоке, а также лук и чеснок. Чтобы перемешать все это до однородной массы, можно измельчить ингредиенты в блендере.', '2019-09-05 15:13:10', 'images/post/kotlety-po-cyganski-1.jpg', 2),
(86, '5 вещей, с которых начинаются перемены к лучшему', '<b>1. Будьте честны с самим собой</b>\r\nНе лгите себе — как насчёт того, что правильно, так и о том, что нужно изменить. Будьте честны с собой относительно своих достижений и того, кем вы хотите стать. Исключите ложь самому себе из всех аспектов своей жизни. Потому что вы единственный человек, на которого вы всегда можете рассчитывать.\r\n\r\nИсследуйте себя, чтобы понять, кем вы являетесь на самом деле, без иллюзий и самообмана. Сделайте это один раз, и дальше вам будет проще понять, как вы живёте, как хотите жить и как этого добиться.\r\n\r\n<b>2. Не бойтесь проблем</b>\r\nВаши проблемы не характеризуют вас. Вашу личность определяет то, как вы реагируете на них и как вы привыкли их решать.\r\n\r\nВ большинстве случаев проблемы не решаются, пока вы не начнёте что-то с ними делать. Не обязательно посвящать этому всё своё время — начните делать хоть что-нибудь.\r\n\r\n<b>3. Проводите время с правильными людьми</b>\r\nПравильные люди — это те, общением с которыми вы наслаждаетесь. Это люди, которые ценят вас и поддерживают на правильном пути. Они заставляют вас чувствовать себя живым и не только принимают вас таким, какой вы есть в настоящий момент, но и готовы безоговорочно принять того, кем вы хотите стать.\r\n\r\n<b>4. Сделайте своё счастье приоритетом</b>\r\nВаши потребности очень важны. Если вы не цените себя, не ухаживаете за собой и не считаете, что ваши потребности важны, вы только усложняете себе жизнь.\r\n\r\nПомните: можно заботиться о себе, не пренебрегая потребностями окружающих. И когда ваши личные потребности будут удовлетворены, вы гораздо лучше сможете помочь тем, кто нуждается в вашей помощи.\r\n\r\n<b>5. Будьте собой, искренне и с гордостью</b>\r\nЕсли вы пытаетесь быть кем-то другим, вы теряете себя. Прекратите это, не стесняйтесь быть собой. Примите свою индивидуальность, наполненную идеями, силой и красотой. Будьте тем, кем вы себя чувствуете, будьте лучшей версией себя.', '2019-09-05 15:25:21', 'images/post/cover10_1441811657-630x315.png', 8),
(87, 'Почему дисциплина лучше мотивации', 'Если вас вдохновляют мотивационные ролики, тренинги и книги, но это ничего не меняет в вашей жизни или меняет очень медленно и мало, то сегодня я предлагаю вам мотивационную статью, в которой я буду мотивировать вас спрыгнуть с мотивационной иглы.\r\n\r\nСегодня интернет и полки книжных магазинов переполнены мотивационным продуктом, призванным вдохновить нас на новую жизнь и великие свершения. Почему же ситуация, которая должна, по идее, принести благо, стала для многих проклятием, породив массу неудовлетворённых людей, постоянно мечтающих о поездке, планирующих маршрут, но так и не сдвинувшихся с места?\r\n\r\nДля многих людей поглощение очередной порции мотивации стало сродни принятию наркоманом дозы, после которой проходит абстинентный синдром, а в жизни всё остаётся по-прежнему, кроме чувства собственной беспомощности и никчёмности, которое неуклонно растёт. И чтобы прорваться, чтобы хоть как-то сдвинуться с места, мы вводим очередную дозу мотивации, замыкая порочный круг.', '2019-09-05 15:28:04', 'images/post/23bbe1bf99b74defe98c00c15c3052ad.png', 8),
(88, 'Очевидные и неочевидные преимущества физического труда', '«Учись, а то будешь коровам хвосты крутить», — говорила мама, намекая, что мне придётся зарабатывать на жизнь физическим трудом, если плохо окончу школу и не поступлю в университет. Подобным образом мотивировали к учёбе своих детей, наверное, 90% всех мам и пап. В итоге мы получили массовую культуру, в лучшем случае пренебрежительно, в худшем — с презрением относящуюся к физическому труду. И именно такое отношение является одной из главных причин большого количества неуспешных и посредственных людей.\r\n\r\nЗадавались ли вы когда-нибудь вопросом, почему физический труд часто противопоставляется образованности, счастливой и полноценной жизни, не пользуется уважением и почётом? Для меня такое положение вещей долгое время было само собой разумеющимся. Но, как часто происходит в моей жизни, настал черёд и этого вопроса, чтобы быть подвергнутым сомнению и анализу.\r\n\r\nНачиная с последних классов школы, меня перестали удовлетворять ответы типа «Все так живут», «Все так думают», «Все так делают». Вот и сегодня я постараюсь показать вам, что в вопросах физического труда большинство не право, что без него мы не сможем гармонично развиваться, добиваться успеха, жить счастливо и полноценно.', '2019-09-05 15:30:33', 'images/post/cover-12_1434562581-630x315.png', 8),
(89, 'Метод Фейнмана: как по-настоящему выучить что угодно и никогда не забыть', 'Чтобы запомнить что-то действительно хорошо, надо по-настоящему глубоко проникнуть в тему. Метод Фейнмана поможет выявить пробелы в знаниях и заполнить их.\r\n\r\nЧасто бывает так, что вы вроде бы ухватили суть темы, но теряетесь в деталях. Вам кажется, что вы выучили и хорошо знаете предмет, но, начав объяснять, понимаете, что это не так, и ваши знания более чем поверхностны.\r\n\r\nЧтобы не попасть в такую ситуацию, проверяйте свои знания по методу Фейнмана.\r\n\r\nВ чём заключается метод\r\nИтак, вы выучили что-либо и хотите проверить свои знания. Суть техники заключается в том, чтобы объяснить выученную тему другому человеку, далекому от этого предмета. При этом вовсе не обязательно, чтобы такой человек присутствовал рядом с вами.\r\n\r\nВозьмите лист бумаги, напишите свою тему и начинайте объяснять её. Представьте, что вы пишете человеку, который ничего не понимает в вашем предмете, а ещё лучше — ребёнку лет восьми.\r\n\r\nУ детей в этом возрасте достаточно знаний, чтобы понять простые объяснения, но их словарный запас довольно мал, так что специальные термины придётся описывать простыми словами.', '2019-09-05 15:33:28', 'images/post/Metod-Fejnmana-kak-po-nastoyashhemu-vyuchit-chto-ugodno-i-nikogda-ne-zabyt_1486415773-630x315.jpg', 8);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `login` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `login`, `password`) VALUES
(1, 'Пётр', 'admin', 'qwertyweb');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=278;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;