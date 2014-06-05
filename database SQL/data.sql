-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 05, 2014 at 12:38 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test3`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE IF NOT EXISTS `data` (
  `account` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `id` int(32) NOT NULL,
  `content` varchar(1024) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `startTime` datetime NOT NULL,
  `stopTime` int(32) NOT NULL,
  `count` int(32) NOT NULL,
  `readCount` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`account`, `id`, `content`, `startTime`, `stopTime`, `count`, `readCount`) VALUES
('test1', 1, 'MY FIRST SECRET.', '2014-05-28 05:27:30', 1401830850, 50, 4),
('', 4, 'BOOYAH!', '2014-05-28 05:32:52', 1401485572, 10, 5),
('', 5, '我有一個秘密。\n哈哈哈', '2014-05-28 05:33:13', 1401485593, 10, 3),
('', 0, 'test 999', '2014-05-28 05:33:41', 1401485621, 10, 4),
('', 7, 'TEST 13123123', '2014-05-28 05:33:49', 1401485629, 10, 8),
('', 9, 'SHOOOOSHHHH!!', '2014-05-28 05:34:25', 1401485665, 10, 5),
('', 10, 'MOREA!', '2014-05-28 05:34:32', 1401485672, 10, 5),
('', 11, 'YEAP!!!!!SSSSS', '2014-05-28 05:34:45', 1401485685, 10, 7),
('', 12, 'HOLY FUCK!!!!', '2014-05-28 05:34:52', 1401485692, 10, 6),
('', 13, 'NONONONONONONO', '2014-05-28 05:35:12', 1401485712, 10, 8),
('', 14, 'I LOVE THIS SECRET', '2014-05-28 11:20:08', 1401506408, 10, 8),
('', 15, 'I REALLY HAVE A SECRET', '2014-05-28 11:21:22', 1401506482, 10, 7),
('', 16, 'THIS IS YOOOOOO!', '2014-05-28 19:01:01', 1401879661, 250, 6),
('', 19, 'We live and we learn to take\nOne step at a time\nThere''s no need to rush\nIt''s like learning to fly\nOr falling in love\nIt''s gonna happen when it''s\nSupposed to happen and we\nFind the reasons why\nOne step at a time', '2014-05-28 20:18:49', 1401884329, 250, 3),
('', 20, 'It''s raining men\nHallejulah\nIt''s raining men\nAmen\n\nIt''s raining men\nHallejulah\nIt''s raining men\nAmen', '2014-05-28 20:19:18', 1401884358, 250, 5),
('', 21, 'I grew up in New Mexico and was always very into the outdoors, hiking, camping, rock climbing, etc. One summer when I was 19 I went on a 4 day/3 night camping trip near my parents'' house on my own. Might sound weird but I had been to this area many times and it was quite safe. Anyway I brought my camera and took lots of pictures. When I came back and developed my film, there were 3 extra pictures that I didn''t take... of me... sleeping. One each night.\n\nNone of my stuff was missing or stolen and nothing happened, but it freaked the hell out of me.', '2014-05-29 01:51:19', 1403891479, 500, 4),
('', 22, 'Telepathy is not how they show it in movies, really.\nThoughts aren’t neat and coherent. Without any context, it’s just a collage of memories, sounds, images, and so on.\nThe customer ordering an iced latte from me, for instance, is thinking something like this:\nfucking [image of boss] [smell of too much cologne] telling me to [memory of scrubbing the toilet in a gas station] I just [sound of automatic gun firing].\nA couple of years ago I would’ve called the cops about this, but I know better now. Not a single tip I’ve ever reported has panned out. Turns out, picturing yourself killing someone who annoys you is not a reliable indicator of your intention to actually kill someone. Go figure. In fact, by the time I take his money, he’s already on something else.\nenough [$100 bills] [sound of a foghorn] today [memory of elementary school] [smell of cafeteria food]\nDon’t worry, I can’t make heads or tails of that either. Could be random thoughts, imagination, or a memory. I actually have no way of knowing what''s a m', '2014-05-29 17:59:57', 1401962397, 250, 5),
('auszon3@gmail.com', 23, 'I caught my first one when I was in grade school. My father took me to the woods camping. I didn''t realize until after the trip that it came back with me, like I was destined to have it. Since then, I knew I had to be the best. I had to catch them all.\nIt was very easy catching them at first. They were pretty much everywhere: in the swimming pool, at the playground, in the alleyways between the buildings. I never told my parents that I had them with me because they would''ve definitely tried to get rid of them.\nWhen I moved out of the house for college years, I found that there were more of them to be discovered and caught. It was much easier to collect them than ever before. I even caught several in one weekend after attending a lot of different house parties, I met several people each night who shared theirs with me.\nAfter graduating from college, I had a sizable collection. However, I still wanted to catch the rare ones. I spent the next few years abroad, travelling to different regions and islands. I think', '2014-05-29 18:01:22', 1401962482, 250, 5),
('auszon3@gmail.com', 24, 'The Cancer destroyed my vocal chords.\nI was lucky to have survived it with my voice the only casualty. After I was cleared of the disease, I tried to look on the bright side of my situation. I was exempt from jury duty for life and arguments with my husband, Roy, were at an all time low. In fact, he was placed in charge of making all of my phone calls for me, yet another chore off of my list.\nUp until now, everything has been manageable. But the shattering window pane and heavy footsteps darting about downstairs can only mean one thing.\nWith Roy away on a business trip, the cold telephone nestled atop my nightstand can only mock my silent pleas.', '2014-05-29 19:22:12', 1401967332, 1000, 6),
('auszon3@gmail.com', 25, 'The dental hygienist led me to the usual chair.\n“So, you’re in for a cleaning and two fillings, right?”\n“That’s right”\n“Okay, sit back. We’ll start cleaning, then you’ll need anesthesia for the rest.”\nI nodded.\n“Straightforward, my favorite patient,” she teased.\nI reclined, mouth open, for the usual scraping and polishing. The sound of the dental pick stung my ears.\n“Still working in advertising? ”\n“NNGGHUH.”\nShe suctioned out spittle.\n“Now, we’ll use a general anesthetic for this next part. I’ll put this mask on you and fetch Dr. Horner, then we’ll start those fillings.”\nI nodded and donned the mask.\nDr. Horner came over and complimented her cleaning, then tut-tutted about the fillings.\n“Lots of soda, eh?” he chided. I was in a haze and couldn’t respond.\nHe produced a loud machine to fill in my cavities. The process finished quickly, then he started polishing the new fillings with a high-speed circular tool while I fought unconsciousness.\n“This’ll look nice, tip-top. I’m a man who likes things clean,” Horner', '2014-05-29 19:22:47', 1401967367, 1000, 5),
('', 26, 'AJSDJAJSDJASJDAJD', '2014-05-29 21:55:06', 1403963706, 1000, 5),
('auszon3@gmail.com', 27, 'THIS IS A TEST SECRET', '2014-05-29 21:57:41', 1401631061, 250, 6),
('', 28, '................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................................', '2014-05-30 01:11:01', 1401387061, 1000, 2),
('', 29, '\n1、醫院鬼話 \n一位醫生在做完急診後已是午夜，正準備回家。走到電梯門口，見一女護士，便一同乘電梯下樓，可電梯到了一樓還不停，一直向下。到了B3時，門開了，電梯門開了，一個小女孩出現在他們眼前，低著頭說要搭電梯。醫生見狀急忙關上電梯門，護士奇怪地問：「為什麼不讓她上來。」醫生說：「B3是我們醫院的停屍房，醫院給每個屍體的右手都綁了一根紅絲帶，她的右手，他的右手有一根紅絲帶……」護士聽了，漸漸伸出右手，陰笑一聲說：「是不是……這樣的一根紅繩啊？ ', '2014-05-30 01:19:27', 1401988767, 500, 5),
('', 30, '朋友是從菲律賓到加拿大留學,在加拿大唸書的時候,和母親共住一間小房子. 朋友的書桌擺放在房間的角落,旁邊有一扇窗.朋友是個十分用功的人,但搬進房子後不久,每當他坐在書桌前專心唸書時,便感覺到一直有東西輕輕的敲著他的頸子.起初他以為是自己神經過敏,便不太在意,但久而久之,這種感覺便一直存在,只要他一坐在書桌前,就不停的感覺到有東西輕觸他的頸子,然而只要一離開書桌,這種感覺便消失無蹤.於是他便將這個情形告訴他母親,他母親就找了個算命師詢問算命師告訴他,有許多肉眼看不到的東西可以被照像機所捕捉,於是就叫他下次再有這種感覺時馬上拍張照片,說不定可以解開謎底.朋友半信半疑,回到家後便坐回桌前唸書,不一會又感覺到有東西輕輕敲著他的脖子,他的母親馬上替他拍了張照 片, 趕緊送去照相館沖洗.拿到照片時,兩人皆嚇得臉色發白,照片上在朋友身旁的,是一雙懸在空中的腳,原來朋友一直感覺到的,便是上吊自殺的那個人懸在空中的腳,因在空中擺盪而不停的輕觸他的頸...', '2014-05-30 01:19:43', 1401988783, 500, 3),
('', 31, '這個故事是貓撲鬼話裡的一個朋友貢獻的，講述自己學校宿舍的故事：\n我們學校是個外語學校,有一些時間夜裡經常有一個穿紅衣服的女子深夜上門推銷,也不知道她是怎麼逃過樓下檢查的.天天夜裡都來,一間間房間的敲,如果有人開門就問;''要不要紅衣服/''由於女生被吵後非常生氣,都大叫著不要,一連幾個晚上都這樣.有一個晚上,那個女子又來了.咚!咚!這時門開了,從裡面衝出一個女生對她大吼;.;什麼紅色的衣服?我全要了.多少錢?.; \n那女子笑了笑,轉身走了,也沒給她紅色的衣服,那晚上大家都睡得很好,沒有人再來敲門了.第二天,宿舍裡的人全都起來了,只有那個沖紅衣女子大吼的女生還沒有起床,她的同學把她的被子掀開,她,她渾身都是紅色的,她上身的皮已經被剝開了.血流得潢身,看起來就像是穿了一件紅衣服. ', '2014-05-30 01:19:51', 1401988791, 500, 2),
('', 32, '這個也是女生宿舍的故事,\n一個女生晚上去上廁所.因為夜太深了,她一個人去上廁所,心裡非常的害怕.可是因為晚上吃了什麼東西,肚子十分不好受,又不能硬撐,只好心驚膽戰地去. \n廁所是在剛有學校就有了的舊廁所,女生剛蹲下沒多久,在她身後有一雙蒼白的手伸了過來.她嚇了一大跳,只見那隻手上有兩張紙,一張白一張黃.一個可怕的聲音說到:.;選一張,白的還是黃的.;女生很害怕,問到.;你是誰?.;.;白的還是黃的.;.;為什麼要選.;.;選一張吧..;女生沒辦法,只好來了一張白的.聲音笑到:.;白的三天黃的七天.便消失了..;女生打開門,可是門外什麼也沒有啊.她嚇壞了/忙回到宿舍,告訴朋友們這件事,朋友笑她太緊張了,神經出了毛病了.她堅持說自己當時很清醒的.大家討論了一回,結果是不會有事的. \n可是過了三天,這個女生莫名地就死了.沒有人知道她是怎麼死的,她的死因上寫著死因不明 \n只有她的同學們知道是怎麼回事,從此以後沒有敢晚上一個人上廁所了. ', '2014-05-30 01:20:00', 1401988800, 500, 2),
('', 33, '！！！！', '2014-05-30 01:29:57', 1401386397, 10, 0),
('', 34, '我很帥!!!', '2014-05-31 00:43:53', 1401727433, 250, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
