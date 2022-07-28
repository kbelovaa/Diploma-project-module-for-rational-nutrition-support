SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_foodie`
--
CREATE DATABASE IF NOT EXISTS `db_foodie`;
USE `db_foodie`;

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `sl` int NOT NULL auto_increment primary key,
  `fullname` varchar(250) NOT NULL,
  `username` varchar(180) NOT NULL unique key,
  `password` varchar(180) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`fullname`, `username`, `password`) VALUES
('Лазарева Екатерина Сергеевна', 'admin', 'admin'),
('Есенин Александр Игоревич', 'director', 'boss');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `sl` int NOT NULL auto_increment primary key,
  `fname` varchar(256) NOT NULL,
  `lname` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL unique key,
  `phone` varchar(256) NOT NULL,
  `username` varchar(200) NOT NULL unique key,
  `password` varchar(256) NOT NULL,
  `image` longblob NOT NULL,
  `imagename` varchar(180) NOT NULL,
  `gender` varchar(256) NOT NULL,
  `age` int NOT NULL,
  `weight` int NOT NULL,
  `height` int NOT NULL,
  `activity` decimal(6,4) NOT NULL,
  `goal` int NOT NULL,
  `calories` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `sl` int NOT NULL auto_increment primary key,
  `name` varchar(256) NOT NULL,
  `location` varchar(256) NOT NULL,
  `sell` decimal(10,2) NOT NULL,
  `image` longblob NOT NULL,
  `imagename` varchar(160) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`name`, `location`, `sell`, `image`, `imagename`) VALUES
('Хинкальня', 'Заводской', 0, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/hinkalnya.jpg'), 'hinkalnya.jpg'),
('Grill House', 'Заводской', 0, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/grill_house.jpg'), 'grill_house.jpg'),
('Штолле', 'Заводской', 0, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/stolle.jpg'), 'stolle.jpg'),
('Let it be', 'Ленинский', 0, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/let_it_be.jpg'), 'let_it_be.jpg'),
('Чайхана', 'Ленинский', 0, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/chaihana.jpg'), 'chaihana.jpg'),
('ШашлычОК', 'Ленинский', 0, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/shashlychok.png'), 'shashlychok.png'),
('Иди ешь!', 'Московский', 0, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/idiesh.png'), 'idiesh.png'),
('Сам себе ресторан', 'Московский', 0, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/sam_sebe.png'), 'sam_sebe.png'),
('ButterBro', 'Партизанский', 0, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/bbro.png'), 'bbro.png'),
('Salateira', 'Партизанский', 0, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/salateira.png'), 'salateira.png'),
('Rib Raw', 'Советский', 0, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/rib_raw.jpg'), 'rib_raw.jpg'),
('ЧёпеЧём', 'Советский', 0, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/chepechem.jpg'), 'chepechem.jpg'),
('Noodles', 'Центральный', 0, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/noodles.jpg'), 'noodles.jpg'),
('WOK', 'Центральный', 0, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/wok.jpg'), 'wok.jpg'),
('Pho bo', 'Первомайский', 0, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/pho_bo.jpg'), 'pho_bo.jpg'),
('Green+Go', 'Первомайский', 0, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/greengo.jpg'), 'greengo.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `sl` int NOT NULL auto_increment primary key,
  `restaurant` varchar(256) NOT NULL,
  `item` varchar(256) NOT NULL unique key,
  `details` varchar(256) DEFAULT NULL,
  `calories` int(128) NOT NULL,
  `proteins` int(128) NOT NULL,
  `fats` int(128) NOT NULL,
  `carbohydrates` int(128) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `image` longblob NOT NULL,
  `imagename` varchar(180) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`restaurant`, `item`, `details`, `calories`, `proteins`, `fats`, `carbohydrates`, `price`, `image`, `imagename`) VALUES
('Хинкальня', 'Классические хинкали с мясом', '5шт', 540, 20, 40, 32, 6.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/hinkali.jpeg'), 'hinkali.jpeg'),
('Хинкальня', 'Хинкали с сыром', '5шт', 350, 8, 35, 32, 6.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/hinkali.jpeg'), 'hinkali.jpeg'),
('Хинкальня', 'Классические хинкали из баранины', '5шт', 570, 18, 42, 30, 11.50, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/hinkali.jpeg'), 'hinkali.jpeg'),
('Хинкальня', 'Суп Харчо', '300г', 270, 5, 20, 5, 7.50, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/sup.jpeg'), 'sup.jpeg'),
('Хинкальня', 'Шашлык из куриного филе', '300/75г', 408, 25, 15, 5, 13.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/shashlyk.jpeg'), 'shashlyk.jpeg'),
('Хинкальня', 'Картофель на мангале', '150г', 210, 5, 4, 15, 5.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/kartofel.jpeg'), 'kartofel.jpeg'),
('Хинкальня', 'Катмикс салат', '250г', 150, 2, 10, 6, 7.90, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/katmix.jpeg'), 'katmix.jpeg'),
('Хинкальня', 'Хачапури по-аджарски', '350г', 490, 10, 30, 32, 8.90, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/hachapuri.jpeg'), 'hachapuri.jpeg'),
('Хинкальня', 'Хачапури по-мегрельски', '350г', 510, 11, 40, 30, 8.90, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/hachapurim.jpeg'), 'hachapurim.jpeg');

INSERT INTO `menu` (`restaurant`, `item`, `details`, `calories`, `proteins`, `fats`, `carbohydrates`, `price`, `image`, `imagename`) VALUES
('Grill House', 'Стейк из лосося с овощами гриль', '120/150/30г', 390, 25, 40, 15, 23.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/steik_iz_lososia.jpeg'), 'steik_iz_lososia.jpeg'),
('Grill House', 'Стейк из говядины с картофельным пюре', '180/150/100г', 410, 30, 42, 40, 25.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/steik_iz_gov.jpeg'), 'steik_iz_gov.jpeg'),
('Grill House', 'Бефстрогонов из говядины с грибным', '350г', 350, 20, 40, 32, 21.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/befstrogonov.jpeg'), 'befstrogonov.jpeg'),
('Grill House', 'Утиная ножка с клюквенным соусом', '350г', 390, 30, 21, 20, 17.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/utinaya_nozhka.jpeg'), 'utinaya_nozhka.jpeg'),
('Grill House', 'Фиш энд Чипс', '200/150/100г', 540, 10, 50, 30, 16.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/fish_and_chips.jpeg'), 'fish_and_chips.jpeg'),
('Grill House', 'Рулька запечёная', '800/400г', 680, 40, 60, 30, 26.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/rulka.jpeg'), 'rulka.jpeg'),
('Grill House', 'Теплый салат с говядиной и печеными овощами', '300г', 400, 18, 29, 15, 16.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/warm_salad.jpeg'), 'warm_salad.jpeg'),
('Grill House', 'Салат Chiken-гриль с кунжутным соусом', '250г', 410, 20, 32, 20, 12.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/chiken_grill_salad.jpeg'), 'chiken_grill_salad.jpeg');

INSERT INTO `menu` (`restaurant`, `item`, `details`, `calories`, `proteins`, `fats`, `carbohydrates`, `price`, `image`, `imagename`) VALUES
('Штолле', 'Пирог с вишней и крыжовником', '1000г', 1020, 30, 40, 110, 28.80, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/pirogi_vishnia_kruzhovvnik.jpg'), 'pirogi_vishnia_kruzhovvnik.jpg'),
('Штолле', 'Пирог ягодный микс с малиной и смородиной', '1000г', 1028, 30, 40, 112, 32.60, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/pirog_malina_smorodina2.jfif'), 'pirog_malina_smorodina2.jfif'),
('Штолле', 'Пирог с творогом', '1000г', 1002, 60, 40, 42, 24.80, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/pirog_tvorog.jpg'), 'pirog_tvorog.jpg'),
('Штолле', 'Пирог с малиной и сыром Креметто', '1000г', 1200, 40, 80, 40, 28.80, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/pirog_maalina_kremetto.jpg'), 'pirog_maalina_kremetto.jpg'),
('Штолле', 'Мини-пирог с бараниной по-узбекски', '250г', 540, 50, 55, 25, 12.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/mini-pirog-s-baraninoj-new.jpg'), 'mini-pirog-s-baraninoj-new.jpg'),
('Штолле', 'Пирог с лососем и шпинатом', '1000г', 1100, 40, 60, 55, 38.60, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/pirog_losos_so_shpinaatom.jpg'), 'pirog_losos_so_shpinaatom.jpg'),
('Штолле', 'Пирог с капустой, беконом и грибами', '1000г', 1250, 50, 80, 42, 26.80, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/pirog_beekon_gribu.jpg'), 'pirog_beekon_gribu.jpg'),
('Штолле', 'Пирог сырный с томатами и шпинатом', '1000г', 990, 20, 40, 45, 28.80, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/pirog_sur_tomaatu.jpg'), 'pirog_sur_tomaatu.jpg'),
('Штолле', 'Пирог с картофелем и грибами', '1000г', 1200, 25, 40, 60, 26.80, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/pirog-s-kartofelem-i-gribami.jpg'), 'pirog-s-kartofelem-i-gribami.jpg');

INSERT INTO `menu` (`restaurant`, `item`, `details`, `calories`, `proteins`, `fats`, `carbohydrates`, `price`, `image`, `imagename`) VALUES
('Let it be', 'Тост с креветками и яйцом пашот', '245г', 350, 20, 30, 20, 15.50, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/tost_s_krev.jpg'), 'tost_s_krev.jpg'),
('Let it be', 'Шпинатный тост с прошутто и скрэмблом', '220г', 300, 30, 20, 21, 14.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/shpin_tost.jpg'), 'shpin_tost.jpg'),
('Let it be', 'Луковый тост с форелью и апельсином', '265г', 290, 20, 28, 10, 14.50, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/lukov_tost.jpg'), 'lukov_tost.jpg'),
('Let it be', 'Яйцо Бенедикт с гуакамоле и вялеными томатами', '215г', 310, 25, 22, 30, 14.50, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/jajco_benedict.jpg'), 'jajco_benedict.jpg'),
('Let it be', 'Большой октябрьский завтрак', '400г', 540, 40, 50, 35, 21.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/big_zavtrak.jpg'), 'big_zavtrak.jpg'),
('Let it be', 'Зеленый омлет с грибной пастой и моцареллой', '240г', 350, 31, 35, 25, 12.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/green_omlet.jpg'), 'green_omlet.jpg'),
('Let it be', 'Баноффи пай с попкорном', '160г', 310, 10, 43, 34, 10.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/banoffi.jpg'), 'banoffi.jpg'),
('Let it be', 'Даниш с моцареллой и голубым сыром', '85г', 190, 15, 40, 13, 4.50, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/danish.jpg'), 'danish.jpg'),
('Let it be', 'Даниш вишня-фисташка', '100г', 230, 18, 43, 30, 4.50, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/danish_vishnia.jpg'), 'danish_vishnia.jpg');

INSERT INTO `menu` (`restaurant`, `item`, `details`, `calories`, `proteins`, `fats`, `carbohydrates`, `price`, `image`, `imagename`) VALUES
('Чайхана', 'Суп Лагман Уйгурский', '350г', 390, 24, 40, 29, 12.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/lagman.jpeg'), 'lagman.jpeg'),
('Чайхана', 'Плов ташкентский', '350г', 460, 20, 45, 40, 15.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/plov.jpeg'), 'plov.jpeg'),
('Чайхана', 'Плов праздничный', '350г', 430, 23, 44, 36, 17.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/plov_prazdn.jpeg'), 'plov_prazdn.jpeg'),
('Чайхана', 'Курица Гунбао', '250г', 380, 40, 32, 28, 13.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/chiken_ganbao.jpeg'), 'chiken_ganbao.jpeg'),
('Чайхана', 'Манты', '1шт', 103, 10, 8, 15, 3.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/manti.jpeg'), 'manti.jpeg'),
('Чайхана', 'Курица по-чайхански', '350г', 390, 35, 33, 20, 18.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/chiken_chaihana.jpeg'), 'chiken_chaihana.jpeg'),
('Чайхана', 'Каурма Лагман', '350г', 400, 20, 34, 38, 16.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/kaurma.jpeg'), 'kaurma.jpeg'),
('Чайхана', 'Люля кебаб из телятины', '130г', 350, 30, 25, 24, 13.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/kebab.jpeg'), 'kebab.jpeg'),
('Чайхана', 'Картофельные дольки', '150г', 330, 10, 40, 30, 6.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/kart_dolki.jpeg'), 'kart_dolki.jpeg');

INSERT INTO `menu` (`restaurant`, `item`, `details`, `calories`, `proteins`, `fats`, `carbohydrates`, `price`, `image`, `imagename`) VALUES
('ШашлычОК', 'Шашлык из баранины с ребром', '200г', 540, 30, 40, 10, 22.80, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/shashlyk_baranina.jpeg'), 'shashlyk_baranina.jpeg'),
('ШашлычОК', 'Шашлык из куриых бёдрышек', '200г', 490, 40, 40, 10, 8.60, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/shashlyk_kurin_bedr.jpeg'), 'shashlyk_kurin_bedr.jpeg'),
('ШашлычОК', 'Шашлык из говядины', '200г', 520, 35, 31, 8, 15.50, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/shashlyk_gov.jpeg'), 'shashlyk_gov.jpeg'),
('ШашлычОК', 'Люля-кебаб из свинины и говядины', '200г', 490, 32, 40, 32, 10.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/lulia_kebab.jpeg'), 'lulia_kebab.jpeg'),
('ШашлычОК', 'Шашлык из лосося', '200г', 460, 20, 30, 10, 21.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/shashlyk_salmon.jpeg'), 'shashlyk_salmon.jpeg'),
('ШашлычОК', 'Шашлык из свиной шеи', '200г', 472, 30, 40, 9, 11.50, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/shashlyk_svin.jpeg'), 'shashlyk_svin.jpeg'),
('ШашлычОК', 'Сулугуни', '200г', 390, 10, 40, 39, 7.90, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/suluguni.jpeg'), 'suluguni.jpeg'),
('ШашлычОК', 'Шампиньоны', '200г', 260, 20, 40, 32, 8.90, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/shamp.jpeg'), 'shamp.jpeg');

INSERT INTO `menu` (`restaurant`, `item`, `details`, `calories`, `proteins`, `fats`, `carbohydrates`, `price`, `image`, `imagename`) VALUES
('Иди ешь!', 'Хот-Дог классический', '210г', 540, 20, 40, 32, 4.50, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/hot_dog_klass.jpeg'), 'hot_dog_klass.jpeg'),
('Иди ешь!', 'Хот-Дог польский', '290г', 540, 20, 40, 32, 6.50, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/hot_dog_pol.jpeg'), 'hot_dog_pol.jpeg'),
('Иди ешь!', 'Хот-Дог американский', '270г', 540, 20, 40, 32, 6.50, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/hot_dog_amer.jpeg'), 'hot_dog_amer.jpeg'),
('Иди ешь!', 'Хот-Дог датский', '280г', 540, 20, 40, 32, 6.50, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/hot_dog_dat.jpeg'), 'hot_dog_dat.jpeg'),
('Иди ешь!', 'Блин французский', '280г', 540, 20, 40, 32, 5.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/blin_franc.jpeg'), 'blin_franc.jpeg'),
('Иди ешь!', 'Блин чешский', '330г', 540, 20, 40, 32, 5.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/blin_cheh.jpeg'), 'blin_cheh.jpeg'),
('Иди ешь!', 'Блин итальянский', '250г', 540, 20, 40, 32, 4.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/blin_it.jpeg'), 'blin_it.jpeg'),
('Иди ешь!', 'Кесадилья французская', '250г', 540, 20, 40, 32, 6.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/kesadilia_franc.jpeg'), 'kesadilia_franc.jpeg'),
('Иди ешь!', 'Кесадилья итальянская', '235г', 540, 20, 40, 32, 6.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/kesadilia_it.jpeg'), 'kesadilia_it.jpeg');

INSERT INTO `menu` (`restaurant`, `item`, `details`, `calories`, `proteins`, `fats`, `carbohydrates`, `price`, `image`, `imagename`) VALUES
('Сам себе ресторан', 'Булгур с мясными тефтельками под ярким соусом', '180/250г/10', 410, 20, 15, 20, 6.60, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/bulgur.jpg'), 'bulgur.jpg'),
('Сам себе ресторан', 'Белая рыба с гарниром из горошка', '200/150г', 380, 15, 10, 9, 7.70, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/fish.jpg'), 'fish.jpg'),
('Сам себе ресторан', 'Сердечки по-китайски со сладким перцем и спаржевой фасолью', '250/110/130г', 350, 20, 16, 12, 7.50, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/serdechki.jpg'), 'serdechki.jpg'),
('Сам себе ресторан', 'Спагетти болоньезе', '360г', 395, 15, 32, 25, 8.80, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/bolonese.jpg'), 'bolonese.jpg'),
('Сам себе ресторан', 'Стеклянная лапша с курицей и овощами', '200/120/90г', 370, 20, 34, 26, 6.60, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/stekl_lapsha.jpg'), 'stekl_lapsha.jpg'),
('Сам себе ресторан', 'Мясные тефтельки с домашнем пюре на топленом масле', '250/170г', 330, 20, 35, 24, 8.80, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/teftelki.jpg'), 'teftelki.jpg'),
('Сам себе ресторан', 'Банановые роллы', '250г', 290, 18, 20, 20, 6.60, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/banana_rolls.jpg'), 'banana_rolls.jpg'),
('Сам себе ресторан', 'Биточки из птицы с гречневой крупой', '180/150г', 315, 15, 20, 23, 6.60, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/bitochki.jpg'), 'bitochki.jpg'),
('Сам себе ресторан', 'Картофельные дольки с курочкой в сливочном соусе', '150/190/10г', 365, 20, 20, 15, 6.60, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/kartof_dolki.jpg'), 'kartof_dolki.jpg');

INSERT INTO `menu` (`restaurant`, `item`, `details`, `calories`, `proteins`, `fats`, `carbohydrates`, `price`, `image`, `imagename`) VALUES
('ButterBro', 'Разноцветный салат с фермерским сыром и арбузом', '500г', 540, 20, 40, 32, 24.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/raznocvetn.jpg'), 'raznocvetn.jpg'),
('ButterBro', 'Салат с копчёной уткой, голубым сыром и глазированным грецким орехом', '350г', 540, 20, 40, 32, 29.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/salad_utka.jpg'), 'salad_utka.jpg'),
('ButterBro', 'Цезарь «По-нашему» из фермерской птицы', '365г', 540, 20, 40, 32, 18.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/cesar_po_nashemu.jpg'), 'cesar_po_nashemu.jpg'),
('ButterBro', 'Стейк в соусе из крови с трюфельным пюре с золой из лука порей', '490г', 540, 20, 40, 32, 59.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/blood_steak.jpg'), 'blood_steak.jpg'),
('ButterBro', '«Нежный» ростбиф с полбой из печи и белыми грибами', '430г', 540, 20, 40, 32, 45.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/roastbeef.jpg'), 'roastbeef.jpg'),
('ButterBro', '«Сибирские» пельмени с боровиком и клюквой', '400г', 540, 20, 40, 32, 25.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/pelmeni.jpg'), 'pelmeni.jpg'),
('ButterBro', '«Лесное» ризотто', '500г', 540, 20, 40, 32, 43.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/risotto.jpg'), 'risotto.jpg'),
('ButterBro', 'Ризотто с грудинкой, тыквой и сицилийским шафраном', '350г', 540, 20, 40, 32, 24.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/risotto_shafr.jpg'), 'risotto_shafr.jpg');

INSERT INTO `menu` (`restaurant`, `item`, `details`, `calories`, `proteins`, `fats`, `carbohydrates`, `price`, `image`, `imagename`) VALUES
('Salateira', 'Салат «Прома»', '340г', 323, 20, 35, 10, 11.90, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/proma.jpg'), 'proma.jpg'),
('Salateira', 'Салат «Ницца»', '350г', 293, 18, 32, 10, 12.90, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/niza.png'), 'niza.png'),
('Salateira', 'Салат «Цезарь»', '400г', 389, 20, 35, 15, 13.50, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/cesar.png'), 'cesar.png'),
('Salateira', 'Салат «Цезарь Delux»', '490г', 585, 20, 40, 32, 17.90, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/cesar_delux.png'), 'cesar_delux.png'),
('Salateira', 'Салат «Симпл»', '410г', 440, 20, 40, 32, 13.90, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/simpl.png'), 'simpl.png'),
('Salateira', 'Салат «Фалафель»', '480г', 250, 20, 15, 32, 15.90, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/falafel.png'), 'falafel.png'),
('Salateira', 'Салат «Марино»', '400г', 548, 25, 35, 30, 17.90, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/marino.jpg'), 'marino.jpg'),
('Salateira', 'Салат «Очеяна»', '440г', 393, 25, 20, 32, 17.90, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/ochejana.png'), 'ochejana.png');

INSERT INTO `menu` (`restaurant`, `item`, `details`, `calories`, `proteins`, `fats`, `carbohydrates`, `price`, `image`, `imagename`) VALUES
('Rib Raw', 'Картофель Айдахо с рваной свининой', '250г', 540, 20, 40, 32, 15.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/idaho.jpeg'), 'idaho.jpeg'),
('Rib Raw', 'Тар-тар из сердца', '230г', 540, 20, 40, 32, 12.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/tartar.jpeg'), 'tartar.jpeg'),
('Rib Raw', 'Тако с Брискетом', '530г', 540, 20, 40, 32, 17.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/taco.jpeg'), 'taco.jpeg'),
('Rib Raw', 'Грибной суп', '250г', 540, 20, 40, 32, 15.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/grib_soup.jpeg'), 'grib_soup.jpeg'),
('Rib Raw', 'Порк Бургер', '400г', 540, 20, 40, 32, 16.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/puld_pork.jpeg'), 'puld_pork.jpeg'),
('Rib Raw', 'Копчёеные рёбра в глазури', '430г', 540, 20, 40, 32, 16.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/kopch_rebra.jpeg'), 'kopch_rebra.jpeg'),
('Rib Raw', 'Рёбрышки BBQ', '430г', 540, 20, 40, 32, 22.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/rebra_bbq.jpeg'), 'rebra_bbq.jpeg'),
('Rib Raw', 'Филе лосося', '280г', 540, 20, 40, 32, 28.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/salmon_file.jpeg'), 'salmon_file.jpeg');

INSERT INTO `menu` (`restaurant`, `item`, `details`, `calories`, `proteins`, `fats`, `carbohydrates`, `price`, `image`, `imagename`) VALUES
('ЧёпеЧём', 'Пирог с капустой', '350г', 540, 20, 40, 32, 7.90, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/pirog_kapusta.jpeg'), 'pirog_kapusta.jpeg'),
('ЧёпеЧём', 'Пирог картофель с грибами', '350г', 540, 20, 40, 32, 7.90, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/pirog_kart_grib.jpeg'), 'pirog_kart_grib.jpeg'),
('ЧёпеЧём', 'Матросский пирог', '350г', 540, 20, 40, 32, 10.90, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/matrosskiy_pirog.jpeg'), 'matrosskiy_pirog.jpeg'),
('ЧёпеЧём', 'Французский пирог', '350г', 540, 20, 40, 32, 10.90, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/french_pirog.jpeg'), 'french_pirog.jpeg'),
('ЧёпеЧём', 'Мексиканский пирог', '350г', 540, 20, 40, 32, 10.90, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/mexican_pirog.jpeg'), 'mexican_pirog.jpeg'),
('ЧёпеЧём', 'Пирог пиратов Карибского моря', '350г', 540, 20, 40, 32, 12.90, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/pirog_piratov.jpeg'), 'pirog_piratov.jpeg'),
('ЧёпеЧём', 'Американский пирог', '350г', 540, 20, 40, 32, 10.90, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/american_pie.jpeg'), 'american_pie.jpeg'),
('ЧёпеЧём', 'Творожный Ом-ном-ном', '350г', 540, 20, 40, 32, 10.90, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/tvorozhniy.jpeg'), 'tvorozhniy.jpeg'),
('ЧёпеЧём', 'Пирог Не тормози, сникерсни!', '350г', 540, 20, 40, 32, 12.90, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/snikers.jpeg'), 'snikers.jpeg');

INSERT INTO `menu` (`restaurant`, `item`, `details`, `calories`, `proteins`, `fats`, `carbohydrates`, `price`, `image`, `imagename`) VALUES
('Noodles', 'Соба с овощами', '400г', 540, 20, 40, 32, 9.50, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/soba_ov.jpg'), 'soba_ov.jpg'),
('Noodles', 'Соба с говядиной', '420г', 540, 20, 40, 32, 13.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/soba_gov.jpg'), 'soba_gov.jpg'),
('Noodles', 'Пад Тай с курицей', '400г', 540, 20, 40, 32, 12.50, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/pad_tai_chiken.jpg'), 'pad_tai_chiken.jpg'),
('Noodles', 'Удон с курицей', '420г', 540, 20, 40, 32, 12.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/udon_chicken.jpg'), 'udon_chicken.jpg'),
('Noodles', 'Удон с креветками и овощами', '350г', 540, 20, 40, 32, 14.50, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/udon_krev_ov.jpg'), 'udon_krev_ov.jpg'),
('Noodles', 'Фунчоза с курицей и овощами', '400г', 540, 20, 40, 32, 10.50, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/funchosa_chicken_ov.jpg'), 'funchosa_chicken_ov.jpg'),
('Noodles', 'Фунчоза с говядиной и овощами', '400г', 540, 20, 40, 32, 12.50, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/funchosa_gov_ov.jpg'), 'funchosa_gov_ov.jpg'),
('Noodles', 'Рис Карри с куриным филе', '450г', 540, 20, 40, 32, 11.50, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/rise_karri.jpg'), 'rise_karri.jpg'),
('Noodles', 'пибимпап с курицей', '500г', 540, 20, 40, 32, 12.50, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/pibimpap.jpg'), 'pibimpap.jpg');

INSERT INTO `menu` (`restaurant`, `item`, `details`, `calories`, `proteins`, `fats`, `carbohydrates`, `price`, `image`, `imagename`) VALUES
('WOK', 'Утка в соусе по-пекински со стеклянной лапшой', '300г', 540, 20, 40, 32, 11.50, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/wok_utka.png'), 'wok_utka.png'),
('WOK', 'Говядина в перечном соусе с яичной лапшой', '300г', 540, 20, 40, 32, 10.50, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/wok_gov.png'), 'wok_gov.png'),
('WOK', 'Креветки в перечном соусе с рисовой лапшой', '300г', 540, 20, 40, 32, 13.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/wok_krev.png'), 'wok_krev.png'),
('WOK', 'Курица в соусе карри с рисом басмати', '300г', 540, 20, 40, 32, 9.50, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/wok_chicken.png'), 'wok_chicken.png'),
('WOK', 'Свинина в кисло-сладком соусе с лапшой удон', '300г', 540, 20, 40, 32, 10.50, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/wok_pork.png'), 'wok_pork.png'),
('WOK', 'Поке с лососем', '330г', 540, 20, 40, 32, 13.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/poke_salmon.jpg'), 'poke_salmon.jpg'),
('WOK', 'Тунец и манго', '330г', 540, 20, 40, 32, 13.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/poke_tuna_mango.jpg'), 'poke_tuna_mango.jpg'),
('WOK', 'Поке с креветками', '330г', 540, 20, 40, 32, 13.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/poke_krev.jpg'), 'poke_krev.jpg'),
('WOK', 'Салат-боул с лососем', '270г', 540, 20, 40, 32, 15.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/salad_boul.jpg'), 'salad_boul.jpg');

INSERT INTO `menu` (`restaurant`, `item`, `details`, `calories`, `proteins`, `fats`, `carbohydrates`, `price`, `image`, `imagename`) VALUES
('Pho bo', 'Суп Фо Бо', '600/40/28мл', 540, 20, 40, 32, 10.90, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/fobo.jpeg'), 'fobo.jpeg'),
('Pho bo', 'Суп Фо Тай Лан', '600/40/28мл', 540, 20, 40, 32, 13.20, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/folaitai.jpeg'), 'folaitai.jpeg'),
('Pho bo', 'Суп Том Ям', '420г', 540, 20, 40, 32, 14.90, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/tomjam.jpeg'), 'tomjam.jpeg'),
('Pho bo', 'Суп Фо Га с курицей и рисовой лапшой', '668г', 540, 20, 40, 32, 10.90, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/foga.jpeg'), 'foga.jpeg'),
('Pho bo', 'Ком Дуой Бо', '420г', 540, 20, 40, 32, 12.90, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/komduoy.jpeg'), 'komduoy.jpeg'),
('Pho bo', 'Бун Бо Нам Бо', '380/100г', 540, 20, 40, 32, 13.90, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/bunbonambo.jpeg'), 'bunbonambo.jpeg'),
('Pho bo', 'Мьен Сао Га', '280г', 540, 20, 40, 32, 13.50, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/myencaoga.jpeg'), 'myencaoga.jpeg'),
('Pho bo', 'Салат Ном Соай', '260г', 540, 20, 40, 32, 10.50, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/nomsoay.jpeg'), 'nomsoay.jpeg'),
('Pho bo', 'Нэм Га', '2шт', 540, 20, 40, 32, 6.50, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/nemga.jpeg'), 'nemga.jpeg');

INSERT INTO `menu` (`restaurant`, `item`, `details`, `calories`, `proteins`, `fats`, `carbohydrates`, `price`, `image`, `imagename`) VALUES
('Green+Go', 'Боул тофу кайсо', '410г', 410, 20, 40, 32, 12.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/tofu_kaiso.jpg'), 'tofu_kaiso.jpg'),
('Green+Go', 'Вафли тэмпе терияки', '310г', 350, 20, 20, 29, 12.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/wafli.jpg'), 'wafli.jpg'),
('Green+Go', 'Боул итальяно', '420г', 400, 20, 24, 30, 13.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/boul_it.jpg'), 'boul_it.jpg'),
('Green+Go', 'Брускетта вег бекон', '180г', 310, 15, 25, 10, 8.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/brusk.jpg'), 'brusk.jpg'),
('Green+Go', 'Салат свекла орехи', '350г', 380, 15, 20, 24, 5.50, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/svekla.jpg'), 'svekla.jpg'),
('Green+Go', 'Бульба боул', '420г', 410, 20, 25, 26, 10.00, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/bulba.jpg'), 'bulba.jpg'),
('Green+Go', 'Гранола', '300г', 290, 10, 20, 19, 10.50, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/granola.jpg'), 'granola.jpg'),
('Green+Go', 'Овощной боул', '390г', 350, 20, 18, 32, 11.50, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/ovosh_boul.jpg'), 'ovosh_boul.jpg'),
('Green+Go', 'Сэндвич сейтан чатни', '180г', 250, 20, 10, 19, 7.50, LOAD_FILE('c:/xampp/htdocs/Foodie_healthy/images/sandwich.jpg'), 'sandwich.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `sl` int NOT NULL auto_increment primary key,
  `username` varchar(256) NOT NULL,
  `restaurant` varchar(256) NOT NULL,
  `item` varchar(256) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `calories` int(128) NOT NULL,
  `proteins` int(128) NOT NULL,
  `fats` int(128) NOT NULL,
  `carbohydrates` int(128) NOT NULL,
  `quantity` int(128) NOT NULL,
  `delivery` int(128) NOT NULL DEFAULT '0',
  `imagename` varchar(180) NOT NULL,
  `address` varchar(256) NOT NULL,
  `payment` varchar(256) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sells`
--

CREATE TABLE `sells` (
  `sl` int NOT NULL auto_increment primary key,
  `restaurant` varchar(256) NOT NULL,
  `sell` decimal(10,2) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
