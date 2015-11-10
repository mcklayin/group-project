/*
Navicat MySQL Data Transfer

Source Server         : my
Source Server Version : 50543
Source Host           : 107.170.88.206:3306
Source Database       : laravel

Target Server Type    : MYSQL
Target Server Version : 50543
File Encoding         : 65001

Date: 2015-10-24 15:23:46
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `articles`
-- ----------------------------
DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` int(10) unsigned NOT NULL,
  `position` int(11) DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `user_id_edited` int(10) unsigned DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `article_category_id` int(10) unsigned DEFAULT '3',
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `introduction` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `source` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `articles_language_id_foreign` (`language_id`),
  KEY `articles_user_id_foreign` (`user_id`),
  KEY `articles_user_id_edited_foreign` (`user_id_edited`),
  KEY `articles_article_category_id_foreign` (`article_category_id`),
  CONSTRAINT `articles_article_category_id_foreign` FOREIGN KEY (`article_category_id`) REFERENCES `article_categories` (`id`) ON DELETE SET NULL,
  CONSTRAINT `articles_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`),
  CONSTRAINT `articles_user_id_edited_foreign` FOREIGN KEY (`user_id_edited`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `articles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of articles
-- ----------------------------
INSERT INTO `articles` VALUES ('1', '3', null, '1', null, '3', '2', 'Sit qui dolores quisquam.', 'porro-sed-sit-et-maxime-cumque', 'Fugiat saepe ab rerum autem quae. Sed id excepturi nihil ut. Facere aut mollitia et qui. Maiores voluptas dicta non.', 'Reiciendis in quae modi velit omnis. Pariatur qui sit molestiae reprehenderit. Voluptatum delectus quo nihil. Nesciunt neque deserunt culpa voluptatem eum.', 'http://harvey.com/occaecati-quaerat-sint-ipsum-ut', '', '2015-09-13 16:56:03', '2015-09-23 11:59:45', null);
INSERT INTO `articles` VALUES ('2', '3', null, '1', null, null, '2', 'Et consequatur soluta consequatur ducimus et error.', 'vel-placeat-facilis-adipisci-nihil-praesentium-temporibus', 'Dolore esse ut facilis minus dolorem. Dolores reiciendis molestiae sit. Quis cupiditate veritatis consequuntur dolor quo earum est necessitatibus. Aliquam accusamus ab voluptatem corrupti maiores est.', 'Repellendus voluptatum qui aliquid rerum. Ut est est necessitatibus deleniti. Nisi architecto est rerum id blanditiis iure.', 'http://stracke.com/iste-voluptate-dolorum-est-et-tenetur-aut.html', '', '2015-09-13 16:56:03', '2015-09-15 12:53:05', null);
INSERT INTO `articles` VALUES ('9', '5', null, '1', null, '3', '3', 'dsadsdasdas', 'dsadsdasdas', 'Lorem ipsum dolare Lorem ipsum dolare', 'Lorem ipsum dolare Lorem ipsum dolare', 'dsadasdasdasd', null, '2015-09-23 12:11:33', '2015-09-23 12:11:33', null);
INSERT INTO `articles` VALUES ('10', '5', null, '1', null, '3', '3', 'Персоналії нашого факультету: Максим Петренко та Кирило Соколов', 'personaliji-nashogo-fakultetu-maksim-petrenko-ta-kirilo-sokolov', '<p>Студентське життя охоплює не лише навчальний процес. Наш &nbsp;університет пропонує численні можливості як для духовного, так і фізичного вдосконалення студентів. Як результат, маємо приводи для гордості в багатьох видах спорту, зокрема у волейболі.<br></p>', '<p><br></p><p><span style=\"line-height: 18.5714px;\"><br></span></p><p><img src=\"http://fitts.pntu.edu.ua/images/203_1.jpg\" style=\"width: 50%;\"><span style=\"line-height: 18.5714px;\"><br></span></p><p style=\"margin-top: 10px; margin-bottom: 15px; padding: 0px; color: rgb(100, 101, 102); font-family: Arial, Helvetica, sans-serif; line-height: normal; background-color: rgb(244, 244, 246);\"><em>Досягнення волейбольної команди нашого університету вражаючі:&nbsp; юнаки зайняли перше місце на спартакіаді полтавської області серед ВНЗ у 2013 році і не збавляючи темпу в цьому, 2014 році, вже встигли виграти&nbsp;</em>\"ХІ Універсіаду Полтавщини СК ВНЗ ІІІ-ІV рівнів акредитації з волейболу\". Також слід згадати впевнені перемоги наших волейболістів у пляжному волейболі, та неперевершену гру на різноманітних турнірах.</p><p style=\"margin-top: 10px; margin-bottom: 15px; padding: 0px; color: rgb(100, 101, 102); font-family: Arial, Helvetica, sans-serif; line-height: normal; background-color: rgb(244, 244, 246);\">Головною опорою та надією нашої команди є два студенти ФІТТС: Максим Петренко та Кирило Соколов. Гра найвищого рівня цих юнаків не раз допомагала команді нашої альма-матер здобувати перемоги. Впевненість, професіоналізм, вміння грати в колективі – це деякі з багатьох гарних рис хлопців. Список виграних турнірів цих двох спортсменів за команду ДЮСШОР та команду ПолтНТУ перевищує 20.</p><p style=\"margin-top: 10px; margin-bottom: 15px; padding: 0px; color: rgb(100, 101, 102); font-family: Arial, Helvetica, sans-serif; line-height: normal; background-color: rgb(244, 244, 246);\">&nbsp;</p><p style=\"margin-top: 10px; margin-bottom: 15px; padding: 0px; color: rgb(100, 101, 102); font-family: Arial, Helvetica, sans-serif; line-height: normal; background-color: rgb(244, 244, 246);\">Отже про титулованих хлопців, які є гарним прикладом для всіх початківців у спорті, та просто про гарних особистостей, Максима та Кирила, сьогодні піде розповідь.</p><p style=\"margin-top: 10px; margin-bottom: 15px; padding: 0px; color: rgb(100, 101, 102); font-family: Arial, Helvetica, sans-serif; line-height: normal; background-color: rgb(244, 244, 246);\">Ми провели невелике інтерв’ю, і ось що вийшло =)&nbsp;<em></em></p><p style=\"margin-top: 10px; margin-bottom: 15px; padding: 0px; color: rgb(100, 101, 102); font-family: Arial, Helvetica, sans-serif; line-height: normal; background-color: rgb(244, 244, 246);\"><em>&nbsp;</em></p><p style=\"margin-top: 10px; margin-bottom: 15px; padding: 0px; color: rgb(100, 101, 102); font-family: Arial, Helvetica, sans-serif; line-height: normal; background-color: rgb(244, 244, 246);\"><em><strong>@Інтерв\'ю</strong></em></p><p style=\"margin-top: 10px; margin-bottom: 15px; padding: 0px; color: rgb(100, 101, 102); font-family: Arial, Helvetica, sans-serif; line-height: normal; background-color: rgb(244, 244, 246);\"><strong>Ф:&nbsp;Почнемо з девізу. Який ваш життєвий девіз?</strong></p><p style=\"margin-top: 10px; margin-bottom: 15px; padding: 0px; color: rgb(100, 101, 102); font-family: Arial, Helvetica, sans-serif; line-height: normal; background-color: rgb(244, 244, 246);\">К: Never give up! (англ. - «Ніколи не здавайся!»).</p><p style=\"margin-top: 10px; margin-bottom: 15px; padding: 0px; color: rgb(100, 101, 102); font-family: Arial, Helvetica, sans-serif; line-height: normal; background-color: rgb(244, 244, 246);\">М: Ніколи не зупинятися на досягнутому.</p><p style=\"margin-top: 10px; margin-bottom: 15px; padding: 0px; color: rgb(100, 101, 102); font-family: Arial, Helvetica, sans-serif; line-height: normal; background-color: rgb(244, 244, 246);\"><strong>Ф: Що змушує вас підніматися з ліжка вранці?</strong></p><p style=\"margin-top: 10px; margin-bottom: 15px; padding: 0px; color: rgb(100, 101, 102); font-family: Arial, Helvetica, sans-serif; line-height: normal; background-color: rgb(244, 244, 246);\">К: Університет або тренування..</p><p style=\"margin-top: 10px; margin-bottom: 15px; padding: 0px; color: rgb(100, 101, 102); font-family: Arial, Helvetica, sans-serif; line-height: normal; background-color: rgb(244, 244, 246);\">М: Думка про те, що як би не проспати.</p><p style=\"margin-top: 10px; margin-bottom: 15px; padding: 0px; color: rgb(100, 101, 102); font-family: Arial, Helvetica, sans-serif; line-height: normal; background-color: rgb(244, 244, 246);\"><em>(прим. З вигляду обличчя хлопців можна зрозуміти, що поспати вранці подовше – це одна з нездійснених мрій&nbsp; ;D)</em></p><p style=\"margin-top: 10px; margin-bottom: 15px; padding: 0px; color: rgb(100, 101, 102); font-family: Arial, Helvetica, sans-serif; line-height: normal; background-color: rgb(244, 244, 246);\"><strong>Ф: Чи довго ви переживаєте з приводу невдач?</strong></p><p style=\"margin-top: 10px; margin-bottom: 15px; padding: 0px; color: rgb(100, 101, 102); font-family: Arial, Helvetica, sans-serif; line-height: normal; background-color: rgb(244, 244, 246);\">К: Майже не хвилююся з цього поводу адже невдачі роблять нас тільки сильніше.</p><p style=\"margin-top: 10px; margin-bottom: 15px; padding: 0px; color: rgb(100, 101, 102); font-family: Arial, Helvetica, sans-serif; line-height: normal; background-color: rgb(244, 244, 246);\">М: Дивлячись на те яка сама невдача, але зазвичай не довго</p><p style=\"margin-top: 10px; margin-bottom: 15px; padding: 0px; color: rgb(100, 101, 102); font-family: Arial, Helvetica, sans-serif; line-height: normal; background-color: rgb(244, 244, 246);\"><strong>Ф: Як до вас ставляться одногрупники?</strong></p><p style=\"margin-top: 10px; margin-bottom: 15px; padding: 0px; color: rgb(100, 101, 102); font-family: Arial, Helvetica, sans-serif; line-height: normal; background-color: rgb(244, 244, 246);\">К: Наскільки я розумію - добре.</p><p style=\"margin-top: 10px; margin-bottom: 15px; padding: 0px; color: rgb(100, 101, 102); font-family: Arial, Helvetica, sans-serif; line-height: normal; background-color: rgb(244, 244, 246);\">М: Я думаю що достатньо добре. Скажімо так - приводів для того щоб ставилися погано&nbsp;<em>не має.</em></p><p style=\"margin-top: 10px; margin-bottom: 15px; padding: 0px; color: rgb(100, 101, 102); font-family: Arial, Helvetica, sans-serif; line-height: normal; background-color: rgb(244, 244, 246);\"><em>(прим. Знаючи Максима та Кирила вже багато років можу запевнити що ставляться до них всі гарно, адже вони гарні друзі на яких завжди можна розраховувати в складних ситуаціях, а як говорять «Друг пізнається у біді»)</em></p><p style=\"margin-top: 10px; margin-bottom: 15px; padding: 0px; color: rgb(100, 101, 102); font-family: Arial, Helvetica, sans-serif; line-height: normal; background-color: rgb(244, 244, 246);\"><strong>Ф:&nbsp;</strong><strong>Ви успішні й студенті та маєте перший дорослий розряд по волейболу - що це для вас означає?</strong></p><p style=\"margin-top: 10px; margin-bottom: 15px; padding: 0px; color: rgb(100, 101, 102); font-family: Arial, Helvetica, sans-serif; line-height: normal; background-color: rgb(244, 244, 246);\">К: Це тільки початок і не найважливіше у житті, головне бути успішною людиною після закінчення навчання.</p><p style=\"margin-top: 10px; margin-bottom: 15px; padding: 0px; color: rgb(100, 101, 102); font-family: Arial, Helvetica, sans-serif; line-height: normal; background-color: rgb(244, 244, 246);\">М: Це означає, що й надалі я буду досягати успіху не лише у спорті, а й у навчанні і моїй подальшій професії.</p><p style=\"margin-top: 10px; margin-bottom: 15px; padding: 0px; color: rgb(100, 101, 102); font-family: Arial, Helvetica, sans-serif; line-height: normal; background-color: rgb(244, 244, 246);\"><strong>Ф: Я</strong><strong>к у вас з іноземними мовами?</strong></p><p style=\"margin-top: 10px; margin-bottom: 15px; padding: 0px; color: rgb(100, 101, 102); font-family: Arial, Helvetica, sans-serif; line-height: normal; background-color: rgb(244, 244, 246);\">К: Володію англійською мовою, але оскільки немає можливості постійно розмовляти виникають інколи проблеми з правильною постановкою слів у реченнях при розмові. Але якщо декілька днів практикувати - розмовляю нормально.</p><p style=\"margin-top: 10px; margin-bottom: 15px; padding: 0px; color: rgb(100, 101, 102); font-family: Arial, Helvetica, sans-serif; line-height: normal; background-color: rgb(244, 244, 246);\">М: Скажімо так, мого рівня англійської досить щоб зрозуміти співбесідника, в майбутньому планую удосконалювати свій рівень.&nbsp;<em>(прим. Гарні плани ;D)</em></p><p style=\"margin-top: 10px; margin-bottom: 15px; padding: 0px; color: rgb(100, 101, 102); font-family: Arial, Helvetica, sans-serif; line-height: normal; background-color: rgb(244, 244, 246);\"><strong>Ф: Як далеко ви плануєте своє життя?</strong></p><p style=\"margin-top: 10px; margin-bottom: 15px; padding: 0px; color: rgb(100, 101, 102); font-family: Arial, Helvetica, sans-serif; line-height: normal; background-color: rgb(244, 244, 246);\">К: Намагаюся планувати років на 5 вперед, оскільки навчаюся і постійно думаю про майбутнє місце працевлаштування, майбутнє життя, сім\'ю. (<em>прим. Ось такі серйозні студенти навчаються на нашому факультеті ;D</em>)</p><p style=\"margin-top: 10px; margin-bottom: 15px; padding: 0px; color: rgb(100, 101, 102); font-family: Arial, Helvetica, sans-serif; line-height: normal; background-color: rgb(244, 244, 246);\">М: В нинішній ситуації в країні&nbsp; його взагалі тяжко планувати на довгий термін, але будемо надіятися на краще.</p><p style=\"margin-top: 10px; margin-bottom: 15px; padding: 0px; color: rgb(100, 101, 102); font-family: Arial, Helvetica, sans-serif; line-height: normal; background-color: rgb(244, 244, 246);\"><strong>Ф: Який свій виступ ви вважаєте найкращим?</strong></p><p style=\"margin-top: 10px; margin-bottom: 15px; padding: 0px; color: rgb(100, 101, 102); font-family: Arial, Helvetica, sans-serif; line-height: normal; background-color: rgb(244, 244, 246);\">К: На мою думку, мій найкращий виступ ще попереду! Але я дуже пишаюсь виступом на Чемпіонаті світу.</p><p style=\"margin-top: 10px; margin-bottom: 15px; padding: 0px; color: rgb(100, 101, 102); font-family: Arial, Helvetica, sans-serif; line-height: normal; background-color: rgb(244, 244, 246);\">М: Волейбол – це командна гра, тому виділити сама мою найкращу гру досить складно, але в моїх спогадах назавжди залишаться наші виступи на міжнародних змаганнях таких як меморіал пам’яті А.Кузнецова, та, безумовно, наша вже друга поспіль перемога в спартакіаді серед вишів Полтави.</p><p style=\"margin-top: 10px; margin-bottom: 15px; padding: 0px; color: rgb(100, 101, 102); font-family: Arial, Helvetica, sans-serif; line-height: normal; background-color: rgb(244, 244, 246);\"><strong>Ф: Які відчуття приносить кожне тренування?</strong></p><p style=\"margin-top: 10px; margin-bottom: 15px; padding: 0px; color: rgb(100, 101, 102); font-family: Arial, Helvetica, sans-serif; line-height: normal; background-color: rgb(244, 244, 246);\">К: Ну по-перше це втома. По-друге це розвиток вперед, покращення техніки та фізичних здібностей тіла.</p><p style=\"margin-top: 10px; margin-bottom: 15px; padding: 0px; color: rgb(100, 101, 102); font-family: Arial, Helvetica, sans-serif; line-height: normal; background-color: rgb(244, 244, 246);\">М: Відчуття задоволення, тобто ти проходиш в зал не тому що так треба або так сказав тренер, а тому що ти відчуваєш що це твоє і розумієш що можеш грати ще краще.</p><p style=\"margin-top: 10px; margin-bottom: 15px; padding: 0px; color: rgb(100, 101, 102); font-family: Arial, Helvetica, sans-serif; line-height: normal; background-color: rgb(244, 244, 246);\"><strong>Ф:&nbsp;</strong><strong>Чи є персона, на яку ви рівняєтеся<strong>?</strong></strong></p><p style=\"margin-top: 10px; margin-bottom: 15px; padding: 0px; color: rgb(100, 101, 102); font-family: Arial, Helvetica, sans-serif; line-height: normal; background-color: rgb(244, 244, 246);\">К: У волейболі рівняюся на Леонеля Маршала - дуже відомий кубинський гравець, відомий своїм надприроднім стрибком та силою удару.</p><p style=\"margin-top: 10px; margin-bottom: 15px; padding: 0px; color: rgb(100, 101, 102); font-family: Arial, Helvetica, sans-serif; line-height: normal; background-color: rgb(244, 244, 246);\">М: Як такого думаю немає, але як що брати людей які грають на найвищих рівнях, наприклад&nbsp; та ж сама збірна Росії, то можна взяти будь якого гравця і ставити його як приклад для наслідування.</p><p style=\"margin-top: 10px; margin-bottom: 15px; padding: 0px; color: rgb(100, 101, 102); font-family: Arial, Helvetica, sans-serif; line-height: normal; background-color: rgb(244, 244, 246);\"><strong>Ф: Де зазвичай тренуєтеся?</strong></p><p style=\"margin-top: 10px; margin-bottom: 15px; padding: 0px; color: rgb(100, 101, 102); font-family: Arial, Helvetica, sans-serif; line-height: normal; background-color: rgb(244, 244, 246);\">К: Зараз в університеті.</p><p style=\"margin-top: 10px; margin-bottom: 15px; padding: 0px; color: rgb(100, 101, 102); font-family: Arial, Helvetica, sans-serif; line-height: normal; background-color: rgb(244, 244, 246);\">М: В основному&nbsp; у нашій університетський спортзалі.</p><p style=\"margin-top: 10px; margin-bottom: 15px; padding: 0px; color: rgb(100, 101, 102); font-family: Arial, Helvetica, sans-serif; line-height: normal; background-color: rgb(244, 244, 246);\"><strong>Ф:&nbsp;</strong><strong>Як ви проводите свій вільний час?</strong></p><p style=\"margin-top: 10px; margin-bottom: 15px; padding: 0px; color: rgb(100, 101, 102); font-family: Arial, Helvetica, sans-serif; line-height: normal; background-color: rgb(244, 244, 246);\">К: Люблю гуляти зі своєю коханою дівчиною (прим. Юлією Шевченко) і друзями.</p><p style=\"margin-top: 10px; margin-bottom: 15px; padding: 0px; color: rgb(100, 101, 102); font-family: Arial, Helvetica, sans-serif; line-height: normal; background-color: rgb(244, 244, 246);\">М: Як і всі типові студенти, гуляю з друзями, граю в комп’ютерні ігри тощо.</p><p style=\"margin-top: 10px; margin-bottom: 15px; padding: 0px; color: rgb(100, 101, 102); font-family: Arial, Helvetica, sans-serif; line-height: normal; background-color: rgb(244, 244, 246);\"><strong>Ф: iOS чи Android?</strong></p><p style=\"margin-top: 10px; margin-bottom: 15px; padding: 0px; color: rgb(100, 101, 102); font-family: Arial, Helvetica, sans-serif; line-height: normal; background-color: rgb(244, 244, 246);\">К: Звісно ж Android. Android значно комфортніший ніж iOS, доступніший і різноманіття техніки з Android значно більше ніж з iOS. Також я вважаю продукцію Apple просто іграшками для дітей. Зараз дуже багато компаній вже обігнали iPhone та iPad по потужності, зручності, глибині кольорів та якості зображень. Тому я обираю Android.</p><p style=\"margin-top: 10px; margin-bottom: 15px; padding: 0px; color: rgb(100, 101, 102); font-family: Arial, Helvetica, sans-serif; line-height: normal; background-color: rgb(244, 244, 246);\">М: iOS але користуюся Android:)&nbsp;<em>(прим. В цьому погляди хлопців кардинально різняться)</em></p><p style=\"margin-top: 10px; margin-bottom: 15px; padding: 0px; color: rgb(100, 101, 102); font-family: Arial, Helvetica, sans-serif; line-height: normal; background-color: rgb(244, 244, 246);\"><strong>Ф:&nbsp;</strong><strong>А як розпочався твій шлях у волейболі? Що спонукало тебе зайнятися цим видом спорту?</strong></p><p style=\"margin-top: 10px; margin-bottom: 15px; padding: 0px; color: rgb(100, 101, 102); font-family: Arial, Helvetica, sans-serif; line-height: normal; background-color: rgb(244, 244, 246);\">М: Моя доля можна сказати була вирішена с моменту мого народження, тому що мій батько тренер з волейболу<em>(прим. В ДЮСШОР №2)</em>&nbsp;і спонукав мене саме він, а шлях розпочався з формуванням спортивного класу в школі починаючи с 5-го класу.</p><p style=\"margin-top: 10px; margin-bottom: 15px; padding: 0px; color: rgb(100, 101, 102); font-family: Arial, Helvetica, sans-serif; line-height: normal; background-color: rgb(244, 244, 246);\"><strong>Ф: Які види спорту (окрім, звісно ж, волейболу) полюбляєте?</strong></p><p style=\"margin-top: 10px; margin-bottom: 15px; padding: 0px; color: rgb(100, 101, 102); font-family: Arial, Helvetica, sans-serif; line-height: normal; background-color: rgb(244, 244, 246);\">К: Дуже люблю баскетбол та граю в цю гру влітку та у вільний час з друзями.&nbsp;</p><p style=\"margin-top: 10px; margin-bottom: 15px; padding: 0px; color: rgb(100, 101, 102); font-family: Arial, Helvetica, sans-serif; line-height: normal; background-color: rgb(244, 244, 246);\">М: Люблю грати в боулінг, що як мені здається в мене не погано виходить.</p><p style=\"margin-top: 10px; margin-bottom: 15px; padding: 0px; color: rgb(100, 101, 102); font-family: Arial, Helvetica, sans-serif; line-height: normal; background-color: rgb(244, 244, 246);\">&nbsp;</p><p style=\"margin-top: 10px; margin-bottom: 15px; padding: 0px; color: rgb(100, 101, 102); font-family: Arial, Helvetica, sans-serif; line-height: normal; background-color: rgb(244, 244, 246);\">Отже, таке цікаве інтерв’ю нам вдалося взяти у головних зірок університетської команди з волейболу. Бажаємо хлопцям подальших перемог у спорті, навчанні та у житті.</p><p><br></p>', 'http://fitts.pntu.edu.ua/ru/novyny/203-personaliji-nashogo-fakultetu-maksim-petrenko-ta-kirilo-sokolov', null, '2015-10-24 11:49:30', '2015-10-24 11:57:15', null);
INSERT INTO `articles` VALUES ('11', '5', null, '1', null, '3', '3', 'Персоналії нашого факультету: Ксенія Безугла', 'personaliji-nashogo-fakultetu-ksenija-bezugla', '<p><span style=\"line-height: 18.5714px;\">Що перше спадає на думку при згадці якогось силового виду спорту? М’язисті чоловіки, біль, сила волі висока конкуренція тощо. Але аж ніяк не вродливі дівчата. Хоча, як виявилося, дарма…</span><br></p>', '<p><br></p><p><br></p><p><img src=\"http://fitts.pntu.edu.ua/images/202_1.jpg\" style=\"width: 908.964px; height: 578px;\"></p><p>На нашому факультеті навчається вродлива, тендітна дівчина. Спершу і не скажеш, що вона займається таким незвичним для дівчат видом спорту. Звати її Ксенія Безугла. Вона – армрестлер. Активна, розумна, товариська, важко зрозуміти звідки в неї стільки наснаги, щоб поєднувати трудові університетські будні з виснажливими тренуваннями. До речі, Ксенія в цьому році здобула чемпіонський титул у змаганнях з армспорту лівою рукою &nbsp;та срібну медаль правою, тож журналістський колектив нашого факультету не міг не провести коротеньке інтерв’ю з гордістю нашого факультету:</p><p><br></p><p>@Інтерв\'ю</p><p><br></p><p>Ф: Увесь факультет ФІТТС вітає тебе з чемпіонством і з нетерпінням чекає твоїх подальших сходжень щаблями слави. Тож ми хотіли б задати декілька питань нашій спортсменці. &nbsp;Почнемо з девізу. Який твій життєвий девіз?</p><p><br></p><p>O: Мрії – то дійсність. Головне дуже сильно захотіти і зробити крок вперед.</p><p><br></p><p>Ф: Що змушує тебе підніматися з ліжка вранці?</p><p><br></p><p>О: Зранку мене змушує вставати будильник та голодний кіт J</p><p><br></p><p>Ф: Чи довго ти переживаєш з приводу невдач?</p><p><br></p><p>О: Переживаю не довго, достатньо лише все обміркувати та проаналізувати.</p><p><br></p><p>Ф: Як до тебе ставляться одногрупники?</p><p><br></p><p>О: Сподіваюсь добре. У нас гарна група. Одногрупники мені завжди допомагають і дуже підтримують.</p><p><br></p><p>Ф: Як далеко ти плануєш своє життя?</p><p><br></p><p>О: Не надто далеко, бо життя швидко змінюється.</p><p><br></p><p>Ф: Який свій виступ ти вважаєш найкращим?</p><p><br></p><p>О: На мою думку, мій найкращий виступ ще попереду! Але я дуже пишаюсь виступом на Чемпіонаті світу.</p><p><br></p><p>Ф: Які відчуття приносить кожне тренування?</p><p><br></p><p>О: Особисто я передусім відчуваю глибоке моральне задоволення. Втома, зрозуміло ж, але втома приємна, що згодом трансформується в «легкість» та повну релаксацію.</p><p><br></p><p>Ф: Де зазвичай тренуєшся?</p><p><br></p><p>О: Тренуюся в тренажерному залі дідуся.</p><p><br></p><p>Ф: Назви твій улюблений куточок Полтави, де ти почасти любиш прогулятися.</p><p><br></p><p>О: Люблю прогулятися центом міста, до кінця по вулиці Жовтневій, до Білої Альтанки.</p><p><br></p><p>Ф: iOS чи Android?</p><p><br></p><p>О: iOS, бо сама користуюся.</p><p><br></p><p>Ф: Кого вважаєш найважливішими суперницями?</p><p><br></p><p>О: Всі суперниці важливі, нікого не можна недооцінювати. Та й в житті варто прагнути перевершити себе, а не інших.</p><p><br></p><p>Ф: А як розпочався твій шлях у армрестлінзі? Небагато дівчат наважаться на таке?</p><p><br></p><p>О: Мій шлях в армспорті, як то мовиться, діло сімейне J Мене тренує мій дідусь, а бабуся й сама змагається серед ветеранів. Тож, оскільки мої брати ще маленькі, вибір був невеликий.</p><p><br></p><p>На жаль, в нашому спорті дівчат дійсно дуже мало. Багато хто має неправильні уявлення стосовно нього, дехто навіть не знає, що ж це таке.</p><p><br></p><p>Ф: Які види спорту (окрім, звісно ж, армреслінгу) полюбляєш?</p><p><br></p><p>О: Мені дуже подобається грати у волейбол - я капітан нашої університетської збірної.&nbsp;</p>', 'http://fitts.pntu.edu.ua/ru/novyny/202-personaliji-nashogo-fakultetu-oksana-bezugla', null, '2015-10-24 11:51:08', '2015-10-24 11:57:06', null);
INSERT INTO `articles` VALUES ('12', '5', null, '1', null, '3', '3', 'У ПолтНТУ стартував Фестиваль спорту та здоров’я серед збірних команд науково-педагогічних працівників університету', 'u-poltntu-startuvav-festival-sportu-ta-zdorov-ja-sered-zbirnih-komand-naukovo-pedagogichnih-pracivnikiv-universitetu', '<p>У ПолтНТУ стартував Фестиваль спорту та здоров’я серед збірних команд науково-педагогічних працівників університету<br></p>', '<p><img src=\"http://pntu.edu.ua/images/k2/2014/05_May/sport_fest/001.JPG\" style=\"width: 780px;\"><span style=\"text-align: center; line-height: 1.42857;\"><br></span></p><p><span style=\"text-align: center; line-height: 1.42857;\">12 травня 2014 року в спортивній залі Полтавського національного технічного університету імені Юрія Кондратюка стартував „Фестиваль спорту та здоров’я” серед збірних команд науково-педагогічних працівників університету.&nbsp;</span></p>', 'http://fitts.pntu.edu.ua/ru/novyny/199-u-poltntu-startuvav-festival-sportu-ta-zdorov-ya-sered-zbirnikh-komand-naukovo-pedagogichnikh-pratsivnikiv-universitetu', null, '2015-10-24 11:53:46', '2015-10-24 11:53:46', null);
INSERT INTO `articles` VALUES ('13', '5', null, '1', null, '3', '3', 'У Міському будинку культури обрали «Міс ПолтНТУ – 2014»', 'u-miskomu-budinku-kulturi-obrali-mis-poltntu-2014', '<p>29-го квітня у міському Будинку культури відбувся традиційний загальноуніверситетський конкурс краси та розуму «Міс ПолтНТУ – 2014». &nbsp; Це нагадувало неймовірне шоу, у якому прийняли участь &nbsp;12 студенток ПолтНТУ та його структурних підрозділів, зокрема з Полтавського нафтового геологорозвідувального технікуму.<br></p>', '<p><br></p><p><img src=\"http://pntu.edu.ua/images/k2/2014/05_May/Miss_PoltNTU/DSC_3258.jpg\" style=\"width: 800px;\"></p><p><br></p><p>Конкурс, який вкотре організований Студентським парламентом та Центром культури і студентської творчості ПолтНТУ, направлений на пошук красивих та водночас розумних студенток університету. Щороку конкурсантки, які представляли усі факультети, були достойними корони переможниці, а самі переможниці доводили свій статус найкращих на обласних, всеукраїнських і, навіть, міжнародних конкурсах.</p><p><br></p><p>Журі конкурсу, традиційно, очолив ректор ПолтНТУ Володимир Онищенко, який разом із колегами – депутатами обласної ради Юрієм Шляховим, Геннадієм Коваленком, Андрієм Соколовим, директором телеканалу «ІРТ» Ігорем Кужиком, директором Міського будинку культури Лесею Марталішвілі, минулорічною переможницею «Міс ПолтНТУ – 2013» Юлією Карпець, спонсорами та партнерами намагалися на протязі 2-х годин обрати найдостойнішу серед дванадцяти красунь із ПолтНТУ.</p><p><br></p><p><img src=\"http://pntu.edu.ua/images/k2/2014/05_May/Miss_PoltNTU/DSC_3711.jpg\" style=\"width: 700px;\"></p><p><br></p><p>У рамках конкурсу дівчата поставали перед глядачами у різних образах: як героїні відомих кінострічок, показали себе як справжні патріотки у дефіле в українських костюмах, продемонстрували свій талант і, звісно, – вихід у вечірніх сукнях. Особливою різноманітністю вразив конкурс талантів: кожна із учасниць намагалася вразити глядачів та членів журі чимось особливим.</p><p><br></p><p>Організатори конкурсу вдячні спонсорами і партнерам, які допомогли у проведенні заходу: кінотеатр «Конкорд кіно», фотостудія «Red Lab» розважальний центр «Турбіна», ресторан-готель «Аристократ», мережа косметичних салонів «Шалена краса», флорист Ольга Кисла, салон краси «Viva Cuba», студія танцю «Манія» та стоматологічний кабінет «Еден».</p><p><br></p><p>Найголовніша інтрига вечора – хто ж саме отримає титул «Міс ПолтНТУ – 2014», трималася до кінця і все більше розпалювалася з кожним виходом дівчат на сцену.</p><p><br></p><p><img src=\"http://pntu.edu.ua/images/k2/2014/05_May/Miss_PoltNTU/IMG_0101.jpg\" style=\"width: 800px;\"></p><p><br></p><p>Кожна із учасниць отримала свою номінацію і, за рішенням журі, вони розподілились таким чином:</p><p><br></p><p>«Міс Артистичність» – Альона Терновець (Будівельний факультет);</p><p><br></p><p>«Міс Грація» – Анастасія Муканова (Електромеханічний факультет);</p><p><br></p><p>«Міс Винахідливість» – Галина Семеняка (Архітектурний факультет);</p><p><br></p><p>«Міс Елегантність» – Дарина Демченко (Факультет інформаційних та телекомунікаційних технологій і систем);</p><p><br></p><p>«Міс Фото» – Анастасія Дупак (Факультет менеджменту та бізнесу);</p><p><br></p><p>«Міс Екстравагантність» – Анастасія Ємець (ПНГрТ);</p><p><br></p><p>«Міс винахідливість» – Аліса Шевченко (Факультет менеджменту та бізнесу);</p><p><br></p><p>«Міс Талант» – Руслана Токар (Фінансово-економічний факультет);</p><p><br></p><p>«Міс Фантазія» – Катерина Яременко (Фінансово-економічний факультет);</p><p><br></p><p>«Міс Чарівність» – Дар\'я Голозубова (Фінансово-економічний факультет);</p><p><br></p><p>«Міс Ерудиція» – Маргарита Знайко (Факультет нафти і газу та природокористування);</p><p><br></p><p>«Міс Вишуканість» – &nbsp;Анастасія Кужим (Гуманітарний факультет).</p><p><br></p><p>Також, попередньо, шляхом інтерактивного голосування у одній із соціальних мереж, було визначено «Міс глядацьких симпатій». Нею стала Анастасія Дупак, з відривом понад 200 голосів від своїх суперниць.</p><p><br></p><p>Переможницями конкурсу «Міс ПолтНТУ – 2014» стали: ІІ віце-міс Дарина Демченко, І віце-міс Маргарита Знайко. &nbsp;А звання «Міс ПолтНТУ – 2014» отримала Анастасія Дупак, студентка факультету менеджменту та бізнесу.</p>', 'http://fitts.pntu.edu.ua/ru/novyny/198-u-miskomu-budinku-kulturi-obrali-mis-poltntu-2014', null, '2015-10-24 11:56:01', '2015-10-24 11:56:54', null);

-- ----------------------------
-- Table structure for `article_categories`
-- ----------------------------
DROP TABLE IF EXISTS `article_categories`;
CREATE TABLE `article_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` int(10) unsigned NOT NULL,
  `position` int(11) DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `user_id_edited` int(10) unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `article_categories_language_id_foreign` (`language_id`),
  KEY `article_categories_user_id_foreign` (`user_id`),
  KEY `article_categories_user_id_edited_foreign` (`user_id_edited`),
  CONSTRAINT `article_categories_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`),
  CONSTRAINT `article_categories_user_id_edited_foreign` FOREIGN KEY (`user_id_edited`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `article_categories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of article_categories
-- ----------------------------
INSERT INTO `article_categories` VALUES ('1', '2', null, '1', null, 'Cum dicta dolores molestiae labore minima repellendus ratione.', 'sit-id-non-enim-corporis-blanditiis-quibusdam-ea-porro', '2015-09-13 16:56:03', '2015-09-13 16:56:03', null);
INSERT INTO `article_categories` VALUES ('2', '1', null, '1', null, 'Et dolorum in sint beatae.', 'voluptatem-aut-et-mollitia-molestiae-porro-saepe', '2015-09-13 16:56:03', '2015-09-13 16:56:03', null);
INSERT INTO `article_categories` VALUES ('3', '5', null, '1', null, 'Новини групи', 'group-news', '2015-09-23 14:43:12', '2015-09-23 14:43:16', null);

-- ----------------------------
-- Table structure for `files`
-- ----------------------------
DROP TABLE IF EXISTS `files`;
CREATE TABLE `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `filename` varchar(250) NOT NULL,
  `path` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of files
-- ----------------------------
INSERT INTO `files` VALUES ('1', '3', '1', 'test.txt', 'appfiles/test.txt', '2015-09-15 18:27:19', '2015-09-15 15:59:37', null);
INSERT INTO `files` VALUES ('2', '3', '1', 'almirah_31.png', 'group-site-m/3/almirah_31.png', null, null, null);
INSERT INTO `files` VALUES ('3', '3', '1', 'about-img-min.jpg', 'group-site-m/3/about-img-min.jpg', null, null, null);
INSERT INTO `files` VALUES ('4', '3', '1', 'about-img-min.jpg', 'group-site-m/3/about-img-min.jpg', null, null, null);
INSERT INTO `files` VALUES ('5', '3', '1', '1_5.jpg', 'group-site-m/3/1_5.jpg', null, null, null);
INSERT INTO `files` VALUES ('6', '3', '1', '1.jpg', '3/1.jpg', null, null, null);
INSERT INTO `files` VALUES ('7', '3', '1', 'action-img-min.jpg', '3/action-img-min.jpg', null, null, null);
INSERT INTO `files` VALUES ('8', '3', '1', '1_5.jpg', '3/1_5.jpg', '2015-09-19 22:09:46', '2015-09-19 22:09:46', null);
INSERT INTO `files` VALUES ('9', '3', '1', '1_5 (1).jpg', '3/1_5 (1).jpg', '2015-09-21 12:12:56', '2015-09-21 12:12:56', null);
INSERT INTO `files` VALUES ('10', '3', '1', 'about-img-min.jpg', '3/about-img-min.jpg', '2015-09-21 12:25:44', '2015-09-21 12:25:44', null);
INSERT INTO `files` VALUES ('11', '3', '1', 'almirah_3.png', '3/almirah_3.png', '2015-09-21 12:28:12', '2015-09-25 14:57:41', '2015-09-25 14:57:41');
INSERT INTO `files` VALUES ('12', '3', '1', '1.txt', '3/1.txt', '2015-09-21 12:31:17', '2015-09-21 12:31:17', null);

-- ----------------------------
-- Table structure for `groups`
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `owner` int(11) NOT NULL,
  `is_active` tinyint(2) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of groups
-- ----------------------------
INSERT INTO `groups` VALUES ('1', '101TK', '1', '1', '2015-09-15 14:59:46', '2015-09-15 16:08:15', null);
INSERT INTO `groups` VALUES ('2', '402TK', '1', '1', '2015-09-15 12:47:22', '2015-09-15 13:16:38', '2015-09-15 13:16:38');
INSERT INTO `groups` VALUES ('3', '401', '1', '1', '2015-09-15 17:49:57', '2015-09-15 17:49:57', null);

-- ----------------------------
-- Table structure for `languages`
-- ----------------------------
DROP TABLE IF EXISTS `languages`;
CREATE TABLE `languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `position` int(11) DEFAULT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lang_code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `user_id_edited` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `languages_name_unique` (`name`),
  UNIQUE KEY `languages_lang_code_unique` (`lang_code`),
  KEY `languages_user_id_foreign` (`user_id`),
  KEY `languages_user_id_edited_foreign` (`user_id_edited`),
  CONSTRAINT `languages_user_id_edited_foreign` FOREIGN KEY (`user_id_edited`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `languages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of languages
-- ----------------------------
INSERT INTO `languages` VALUES ('1', null, 'English', 'gb', null, null, '2015-09-13 16:56:03', '2015-09-13 16:56:03', null);
INSERT INTO `languages` VALUES ('2', null, 'Српски', 'rs', null, null, '2015-09-13 16:56:03', '2015-09-13 16:56:03', null);
INSERT INTO `languages` VALUES ('3', null, 'Bosanski', 'ba', null, null, '2015-09-13 16:56:03', '2015-09-13 16:56:03', null);
INSERT INTO `languages` VALUES ('4', null, 'Русский', 'ru', '1', null, '2015-09-15 10:25:28', '2015-09-15 10:25:28', null);
INSERT INTO `languages` VALUES ('5', null, 'Український', 'ua', '1', null, '2015-09-15 10:25:53', '2015-09-15 10:25:53', null);

-- ----------------------------
-- Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('2014_10_18_195027_create_languages_table', '1');
INSERT INTO `migrations` VALUES ('2014_10_18_225005_create_article_categories_table', '1');
INSERT INTO `migrations` VALUES ('2014_10_18_225505_create_articles_table', '1');
INSERT INTO `migrations` VALUES ('2014_10_18_225928_create_photo_albums_table', '1');
INSERT INTO `migrations` VALUES ('2014_10_18_231619_create_photos_table', '1');

-- ----------------------------
-- Table structure for `password_resets`
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for `privileges`
-- ----------------------------
DROP TABLE IF EXISTS `privileges`;
CREATE TABLE `privileges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of privileges
-- ----------------------------
INSERT INTO `privileges` VALUES ('1', 'Заливать файлы');
INSERT INTO `privileges` VALUES ('2', 'Писать посты');
INSERT INTO `privileges` VALUES ('3', 'Править посты');
INSERT INTO `privileges` VALUES ('4', 'Писать статические блоки');
INSERT INTO `privileges` VALUES ('5', 'Править статические блоки');
INSERT INTO `privileges` VALUES ('6', 'Создавать рассылки');
INSERT INTO `privileges` VALUES ('7', 'Отправлять email участникам группы');
INSERT INTO `privileges` VALUES ('8', 'Удалять файлы');
INSERT INTO `privileges` VALUES ('9', 'Добавлять пользователей в группу');
INSERT INTO `privileges` VALUES ('10', 'Удалять пользователей из группы');

-- ----------------------------
-- Table structure for `pushers`
-- ----------------------------
DROP TABLE IF EXISTS `pushers`;
CREATE TABLE `pushers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pushers
-- ----------------------------
INSERT INTO `pushers` VALUES ('1', 'SMS');
INSERT INTO `pushers` VALUES ('2', 'Email');

-- ----------------------------
-- Table structure for `roles`
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'Администратор');
INSERT INTO `roles` VALUES ('2', 'Администратор группы');
INSERT INTO `roles` VALUES ('3', 'Пользователь');
INSERT INTO `roles` VALUES ('4', 'Редактор группы');

-- ----------------------------
-- Table structure for `static_blocks`
-- ----------------------------
DROP TABLE IF EXISTS `static_blocks`;
CREATE TABLE `static_blocks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `is_active` tinyint(2) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of static_blocks
-- ----------------------------
INSERT INTO `static_blocks` VALUES ('1', '3', '<span style=\"background-color: rgb(255, 156, 0);\">Статичний блок 1</span>', '2015-09-15 19:02:34', '2015-09-28 11:38:45', null, '1');
INSERT INTO `static_blocks` VALUES ('2', '3', '<br>Статичний блок 2', '2015-09-23 12:46:35', '2015-09-28 11:39:00', null, '1');

-- ----------------------------
-- Table structure for `statuses`
-- ----------------------------
DROP TABLE IF EXISTS `statuses`;
CREATE TABLE `statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `status` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of statuses
-- ----------------------------
INSERT INTO `statuses` VALUES ('1', 'Yes', '1');
INSERT INTO `statuses` VALUES ('2', 'No', '0');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fio` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `wait_password` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'password before confirmed',
  `password_confirmation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `confirmation_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Admin User', 'admin_user12', 'Адміністратор', '', 'admin@admin.com', '$2y$10$WUNZidg1pwRy8zdWbOFnWeJQ5oyxkiaijpiGNoOHafUO9625ER3Yu', null, null, '17bf3154264df6afad21aab269e0827c', '1', '1', 'Lld2k7uXzyoXQL6iNOFB6EH72iKqv38cq4YdBc4J6RKn5Iamqtz7LUpjORYO', '2015-09-13 16:56:03', '2015-10-24 12:19:01', null);
INSERT INTO `users` VALUES ('2', 'Test User', 'test_user', null, '+380951627975', 'iamdd@list.ru', '$2y$10$mFDwpYfJXOltAGGmYivzLe8oczJzv9SfYylXM9KeUnClQKGpVxsZ6', null, null, '5c85229c127d8f9a5ddd4b137bddbe8d', '1', '0', null, '2015-09-13 16:56:03', '2015-09-13 16:56:03', null);
INSERT INTO `users` VALUES ('3', 'test', '', 'Тест', '+380951627975', 'mcklayin@gmail.com', '$2y$10$s84QTmxGY/.ijbAWEgeNousQfgox45x4o9GQ4hyg9Zege9VzfUMbK', '', '', '', '1', '0', 'CjGE4stdheQLmXAC8WTX7QzaO60tliBkhD4RwnYEShIkUUZjPWyAeO5xTwUk', '2015-09-15 11:25:02', '2015-10-08 19:46:25', null);
INSERT INTO `users` VALUES ('4', 'Артем', '', 'Портянченко', '12345611', 'vampirkod@gmail.com', '$2y$10$n6YAz36lCO/0tV7DDnVjDO4bZmf8/ZPcXenJL.U6Hg7ljlV1rSh9K', null, null, '', '1', '0', 'Qz9uHkWoresrAQVcQQrqm48k3mhcqircRy9f6odqep4Ipu84oiivChPVlB1P', '2015-10-24 11:22:46', '2015-10-24 11:22:51', null);
INSERT INTO `users` VALUES ('5', 'Дмитро', '', 'Данилюк', '12345678', 'danulyk.d@gmail.com', '$2y$10$fmXA5.Md9FNwBuUopQXa1uBOCOo71YgjvPeQaV4JDiXv81u1U2GmW', null, null, '', '1', '0', 'IdOrCowzRGNGl7NT5L9ScXqURYjGgrOWNbnCoelMIHuXrzjSeO4yPHMnjQau', '2015-10-24 11:23:40', '2015-10-24 11:23:47', null);
INSERT INTO `users` VALUES ('6', 'Євген', '', 'Легейда', '1234567', 'leheida.e@gmail.com', '$2y$10$Tcl5zP/13oFda5qkqpqe/OnHbcrE7EMEpuutKzmhSyC7qylNYEUWW', null, null, '', '1', '0', 'FUZ1Dg2gmXtZGZSjKj2wIJsnlPY3MJB30e742hxbXSXw3tRiCFozcFQSrxZB', '2015-10-24 11:24:35', '2015-10-24 11:24:39', null);
INSERT INTO `users` VALUES ('7', 'Дмитро', '', 'Підгайко', '1234567', 'shmel@list.ru', '$2y$10$uI9.VSOnlsQp1t6NtbN7XOFS7eH9b5Jjc0yYNG/taon0J1g.k16Dy', null, null, '', '1', '0', 'zdwKNewfTAZTHlVcCV1qfkdHKpr4bGEi8jxxM1RkSCHpHgwa6VJVg6yWIG53', '2015-10-24 11:25:14', '2015-10-24 11:25:19', null);
INSERT INTO `users` VALUES ('8', 'Артем', '', 'Грузд', '1234567', 'arti3dplayer@gmail.com', '$2y$10$EWrh5Jqy29njK5FneoCCg.3oRAEs7Yq6si9IFzttDq1QwAcf5hF7S', null, null, '', '1', '0', 'EIZZyrLOWyjzobbKG9wm4krqlOsR56atQB2rEbSPzFEMVI7N2W1K5Diu70l9', '2015-10-24 11:26:25', '2015-10-24 11:26:27', null);

-- ----------------------------
-- Table structure for `user_groups`
-- ----------------------------
DROP TABLE IF EXISTS `user_groups`;
CREATE TABLE `user_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_groups
-- ----------------------------
INSERT INTO `user_groups` VALUES ('18', '2', '3');
INSERT INTO `user_groups` VALUES ('19', '1', '3');
INSERT INTO `user_groups` VALUES ('20', '4', '3');
INSERT INTO `user_groups` VALUES ('21', '5', '3');
INSERT INTO `user_groups` VALUES ('22', '6', '3');
INSERT INTO `user_groups` VALUES ('23', '7', '3');
INSERT INTO `user_groups` VALUES ('24', '8', '3');

-- ----------------------------
-- Table structure for `user_privileges`
-- ----------------------------
DROP TABLE IF EXISTS `user_privileges`;
CREATE TABLE `user_privileges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `privilege_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_privileges
-- ----------------------------
INSERT INTO `user_privileges` VALUES ('1', '1', '1');
INSERT INTO `user_privileges` VALUES ('2', '1', '2');
INSERT INTO `user_privileges` VALUES ('3', '1', '3');
INSERT INTO `user_privileges` VALUES ('4', '1', '4');
INSERT INTO `user_privileges` VALUES ('5', '1', '5');
INSERT INTO `user_privileges` VALUES ('6', '1', '6');
INSERT INTO `user_privileges` VALUES ('7', '1', '7');
INSERT INTO `user_privileges` VALUES ('8', '2', '1');
INSERT INTO `user_privileges` VALUES ('9', '2', '2');
INSERT INTO `user_privileges` VALUES ('10', '2', '3');
INSERT INTO `user_privileges` VALUES ('11', '2', '4');
INSERT INTO `user_privileges` VALUES ('12', '2', '5');
INSERT INTO `user_privileges` VALUES ('13', '2', '6');
INSERT INTO `user_privileges` VALUES ('14', '2', '7');
INSERT INTO `user_privileges` VALUES ('15', '3', '1');
INSERT INTO `user_privileges` VALUES ('16', '3', '7');
INSERT INTO `user_privileges` VALUES ('17', '1', '8');
INSERT INTO `user_privileges` VALUES ('18', '2', '8');
INSERT INTO `user_privileges` VALUES ('19', '4', '1');
INSERT INTO `user_privileges` VALUES ('20', '4', '2');
INSERT INTO `user_privileges` VALUES ('21', '4', '3');
INSERT INTO `user_privileges` VALUES ('22', '4', '4');
INSERT INTO `user_privileges` VALUES ('23', '4', '5');
INSERT INTO `user_privileges` VALUES ('24', '4', '6');
INSERT INTO `user_privileges` VALUES ('25', '4', '7');
INSERT INTO `user_privileges` VALUES ('26', '4', '8');
INSERT INTO `user_privileges` VALUES ('27', '4', '9');
INSERT INTO `user_privileges` VALUES ('28', '4', '10');

-- ----------------------------
-- Table structure for `user_roles`
-- ----------------------------
DROP TABLE IF EXISTS `user_roles`;
CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_roles
-- ----------------------------
INSERT INTO `user_roles` VALUES ('1', '1', '1');
INSERT INTO `user_roles` VALUES ('2', '3', '2');
INSERT INTO `user_roles` VALUES ('3', '2', '3');
INSERT INTO `user_roles` VALUES ('4', '4', '3');
INSERT INTO `user_roles` VALUES ('5', '5', '3');
INSERT INTO `user_roles` VALUES ('6', '6', '3');
INSERT INTO `user_roles` VALUES ('7', '7', '3');
INSERT INTO `user_roles` VALUES ('8', '8', '3');

-- ----------------------------
-- Table structure for `user_settings`
-- ----------------------------
DROP TABLE IF EXISTS `user_settings`;
CREATE TABLE `user_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `key` varchar(250) NOT NULL,
  `value` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_settings
-- ----------------------------
INSERT INTO `user_settings` VALUES ('1', '1', 'show_group_news_feed', '1');
INSERT INTO `user_settings` VALUES ('2', '1', 'show_group_files_feed', '1');
INSERT INTO `user_settings` VALUES ('3', '1', 'news_group_feed_count', '5');
INSERT INTO `user_settings` VALUES ('4', '1', 'files_group_feed_count', '5');
INSERT INTO `user_settings` VALUES ('5', '4', 'show_group_news_feed', '1');
INSERT INTO `user_settings` VALUES ('6', '4', 'show_group_files_feed', '1');
INSERT INTO `user_settings` VALUES ('7', '4', 'news_group_feed_count', '5');
INSERT INTO `user_settings` VALUES ('8', '4', 'files_group_feed_count', '5');
INSERT INTO `user_settings` VALUES ('9', '5', 'show_group_news_feed', '1');
INSERT INTO `user_settings` VALUES ('10', '5', 'show_group_files_feed', '1');
INSERT INTO `user_settings` VALUES ('11', '5', 'news_group_feed_count', '5');
INSERT INTO `user_settings` VALUES ('12', '5', 'files_group_feed_count', '5');
INSERT INTO `user_settings` VALUES ('13', '6', 'show_group_news_feed', '1');
INSERT INTO `user_settings` VALUES ('14', '6', 'show_group_files_feed', '1');
INSERT INTO `user_settings` VALUES ('15', '6', 'news_group_feed_count', '5');
INSERT INTO `user_settings` VALUES ('16', '6', 'files_group_feed_count', '5');
INSERT INTO `user_settings` VALUES ('17', '7', 'show_group_news_feed', '1');
INSERT INTO `user_settings` VALUES ('18', '7', 'show_group_files_feed', '1');
INSERT INTO `user_settings` VALUES ('19', '7', 'news_group_feed_count', '5');
INSERT INTO `user_settings` VALUES ('20', '7', 'files_group_feed_count', '5');
INSERT INTO `user_settings` VALUES ('21', '8', 'show_group_news_feed', '1');
INSERT INTO `user_settings` VALUES ('22', '8', 'show_group_files_feed', '1');
INSERT INTO `user_settings` VALUES ('23', '8', 'news_group_feed_count', '5');
INSERT INTO `user_settings` VALUES ('24', '8', 'files_group_feed_count', '5');
