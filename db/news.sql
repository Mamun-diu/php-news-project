-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2021 at 03:59 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news`
--

-- --------------------------------------------------------

--
-- Table structure for table `news_category`
--

CREATE TABLE `news_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `post` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_category`
--

INSERT INTO `news_category` (`category_id`, `category_name`, `post`) VALUES
(30, 'Sport', 4),
(31, 'Entertainment', 6),
(32, 'Politics', 2),
(33, 'Health', 2);

-- --------------------------------------------------------

--
-- Table structure for table `news_post`
--

CREATE TABLE `news_post` (
  `post_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `post_date` varchar(50) NOT NULL,
  `author` int(11) NOT NULL,
  `post_img` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_post`
--

INSERT INTO `news_post` (`post_id`, `title`, `description`, `category`, `post_date`, `author`, `post_img`) VALUES
(51, 'Wide denies Vince shot at Big Bash hundred', 'England batsman James Vince missed out on a Big Bash century by two runs as an Andrew Tye wide sealed Sydney Sixers\' thumping nine-wicket win over Perth Scorchers in the Big Bash Qualifier.\r\n\r\nVince (98no off 53 balls) stroked 14 fours and a six in a superb innings and began the 18th over of Sixers\' run chase with two needed for his hundred and one for his side to seal victory and reach the final.\r\n\r\nHowever, Scorchers seamer Tye then sent a bouncer down the leg-side as Vince\'s hopes of a second career T20 hundred, and his first in the Big Bash, were dashed at Manuka Oval in Canberra.', '30', '30 Jan, 2021', 28, '55231602taylor-smith-selWWrPDkoc-unsplash.jpg'),
(50, 'Rodgers\' psychology explained', 'Brendan Rodgers is always looking for those triggers. Anything that he can use to motivate. This is a man fascinated by psychology. He studied neuro-linguistic programming for many years and sees it as his job to get inside the minds of his players.\r\n\r\n\"I used it as much at the time from a personal point of view because I wanted to be the best father that I could be for my children,\" he tells Sky Sports. \"How could I learn techniques that would help them? But it was to cover me in both - my professional and my social life.\r\n\r\n\"It really opens your mind up to your communication with people, which is so important. I have always leant on it. I studied it for quite a long time and I still feel the benefits of that.', '30', '30 Jan, 2021', 28, '609847591ruben-leija-jY_knL-TVvA-unsplash.jpg'),
(52, 'Her Indoors lifts Listed honours at Doncaster', 'Her Indoors was a tough winner of the Listed Sky Bet Fillies\' Juvenile Hurdle at Doncaster for Alan King and Adrian Heskin.\r\n\r\nThe four-year-old got the better of three-time winner Talking About You to prevail by five and a half lengths at a price of 11-2 on her third hurdles start.\r\n\r\nThe two horses had met previously in a similar Listed event at Aintree, where the latter triumphed by a comfortable seven and a half lengths.\r\n\r\nAfter another second-placed run from King\'s filly at Kempton, that prior Aintree form was then overturned on Town Moor as Her Indoors gave her trainer a second victory from only three renewals of the race.', '30', '30 Jan, 2021', 28, '1549863185markus-spiske-WUehAgqO5hE-unsplash.jpg'),
(53, 'Waterlogging claims Cheltenham card', 'Cheltenham\'s prestigious Trials Day meeting on Saturday has been abandoned due to waterlogging.\r\n\r\nOfficials had made people aware the meeting was in the balance due to midweek rainfall which exceeded expectations and an inspection had been called for 2pm on Friday.\r\n\r\nAn early update on Friday suggested it was touch-and-go following another wet night in the Cotswolds.\r\n\r\nHowever, with standing water in places, some fences already set to be omitted and not enough space to redirect the runners around the waterlogged patches, the meeting has been called off.', '30', '30 Jan, 2021', 28, '536859374braden-collum-9HI8UJMSdZA-unsplash.jpg'),
(54, 'All the Times Modern Luxuries Accidentally Found Their Way Into Period Pieces', 'Listen, making TV is hard! Long hours, tight schedules, sometimes less than ideal filming conditions...it\'s a lot to handle, which is why mistakes that feel super how-did-they-miss-that do happen. Sure, they don\'t happen a lot, but when they do, you can rest assured that the Internet will take notice and promptly have a field day with it. \r\n\r\nBridgerton is just the latest period drama to come under scrutiny for an slip-up when it comes to an era-inappropriate object accidentally making its way into an episode, but it\'s far from the first. Who can forget the infamous coffee cup that seemed to prove Westeros did in fact have a Starbucks on Game of Thrones? And that was just one of several gaffes the HBO fantasy hit made during its eight-season run. Forget winter, memes were always coming when it came to their mistakes. ', '31', '30 Jan, 2021', 28, '1485071729matthew-kalapuch-sqJ4tLBiurw-unsplash.jpg'),
(55, 'Inside Joe Biden\'s Unbreakable Bond With Late Son Beau Biden', 'Inside Joe Biden\'s Unbreakable Bond With Late Son Beau Biden', '31', '30 Jan, 2021', 28, '714005498nicholas-green-rAsESO5Puqw-unsplash.jpg'),
(56, 'Kourtney Kardashian and Kendall Jenner Turn Up the Heat With Cheeky Bikini Photos', 'Kourtney Kardashian and Kendall Jenner are enjoying some fun in the sun.\r\n\r\nOn Jan. 28, the Poosh founder posted a cheeky snapshot of the sisters sitting poolside in their bikinis. Kourtney sported a cool blue swimsuit while Kendall donned a sizzling red number. In another picture, the famous family members nibbled on a fruit bowl consisting of strawberries, blueberries, grapes and pineapple.\r\n\r\nThe photos were posted on the same day a trailer for the 20th and final season of Keeping Up With the Kardashians was released. And while the sneak peek gave viewers a trip down memory lane by showing iconic moments from the show, it also left followers wondering about the future. ', '31', '30 Jan, 2021', 28, '970027466eberhard-grossgasteiger-7fL7YEQMltg-unsplash.jpg'),
(57, 'Elon Musk and Grimes\' Baby Boy Now Has a Haircut as Unique as His Name', 'Grimes is showing off the one-of-a-kind hairstyle she gave her 8-month-old son on Thursday, Jan. 28.\r\n\r\nShe shared images of herself giving X Æ A-Xii a \"Viking\" haircut as he played with colorful (and no doubt top of the line) toys in the bathtub.\r\n\r\nThe \"Oblivion\" singer reached over the tub and used scissors to transform his blonde hair with a Mohawk-style cut that\'s sure to be all the rage at Zoom daycare someday. Grimes captioned the standout look, \"not sure this haircut went well but he\'s Viking now.\" ', '31', '30 Jan, 2021', 28, '1733832446vincent-van-zalinge-vUNQaTtZeOo-unsplash.jpg'),
(58, 'Brian Sicknick, police officer killed in insurrection, to lie in honor at Capitol', 'Capitol Police Officer Brian Sicknick, who died after the Jan. 6 Capitol insurrection, will lie in honor in the Rotunda, House Speaker Nancy Pelosi and Senate Majority Leader Chuck Schumer announced Friday.\r\n\r\nSicknick\'s body will arrive at the Capitol on Tuesday with a viewing ceremony for members of the Capitol Police. Members of Congress will have a viewing period Wednesday morning, followed by a congressional tribute.\r\n\r\nSicknick\'s ceremonies will be closed to the general public due to the coronavirus pandemic. His ceremony is designated a lying in honor as lying in state is usually reserved for elected officials.', '31', '30 Jan, 2021', 28, '1596929458history-in-hd-DhwKbmdlJa0-unsplash.jpg'),
(59, 'Brian Sicknick, police officer killed in insurrection, to lie in honor at Capitol', 'Capitol Police Officer Brian Sicknick, who died after the Jan. 6 Capitol insurrection, will lie in honor in the Rotunda, House Speaker Nancy Pelosi and Senate Majority Leader Chuck Schumer announced Friday.\r\n\r\nSicknick\'s body will arrive at the Capitol on Tuesday with a viewing ceremony for members of the Capitol Police. Members of Congress will have a viewing period Wednesday morning, followed by a congressional tribute.\r\n\r\nSicknick\'s ceremonies will be closed to the general public due to the coronavirus pandemic. His ceremony is designated a lying in honor as lying in state is usually reserved for elected officials.', '32', '30 Jan, 2021', 28, '270736227history-in-hd-DhwKbmdlJa0-unsplash.jpg'),
(60, '‘For Christ’s sake, watch yourself’: Biden warns family over business dealings', 'In the midst of his campaign for president, Joe Biden took his younger brother, Frank, aside to issue a warning.\r\n\r\n“For Christ’s sake, watch yourself,” Biden said of his brother’s potential business dealings, according to a person with knowledge of the conversation. “Don’t get sucked into something that would, first of all, hurt you.”\r\n\r\nBiden, whose tone was both “jocular and serious,” according to the person, seemed to know then what is becoming plainly obvious now: His family’s business ties threatened to undermine an administration whose messaging is centered on restoring integrity in the White House.', '32', '30 Jan, 2021', 28, '2024216036kyle-glenn-TELAb4duebI-unsplash.jpg'),
(61, 'Stimulus payments being cut for some with government debts', 'Millions of people who owe taxes and other money to the government are seeing their economic stimulus payments cut or wiped out to cover the debts because Congress peeled back a protection that had been in place for months.\r\n\r\nThe cuts may be particularly hitting those most in need of relief money because of the coronavirus pandemic, including veterans, Social Security recipients and students.\r\n\r\nThe problem has arisen because the IRS is redirecting stimulus payments for some people to settle unpaid federal and state taxes, Social Security and Veterans Affairs debts, student loan debt and child support obligations, according to the Taxpayer Advocate Service, an in-house IRS watchdog.', '31', '30 Jan, 2021', 28, '367369685kin-li-Yv37JuBjihI-unsplash.jpg'),
(62, 'COVID-19 vaccine trials: Live updates', '\r\nA worker prepares boxes containing the Moderna COVID-19 vaccine in Olive Branch, MS.\r\nPool/Getty Images\r\nCOVID-19 is a respiratory disease caused by the SARS-CoV-2 virus.\r\nResearchers across the globe are working to develop a vaccine.\r\nCurrently, there are 78 candidate vaccines.\r\nToday, there are 20 candidate vaccines in stage 3 clinical trials.\r\nSo far, 11 vaccines have been authorized across several countries.\r\nFor general COVID-19 updates visit our live blog.\r\n01/29/2021 14:50 GMT — Addressing COVID-19 vaccine myths\r\n\r\n\r\n\r\nRead the full feature here.\r\n\r\n01/29/2021 09:08 GMT — Novavax vaccine shows 89.3% efficacy\r\n\r\nNovavax have announced that, according to an interim analysis of Phase 3 clinical trials, their vaccine candidate demonstrates 89.3% efficacy. The analysis included 62 cases of COVID-19, 56 of which occurred in the placebo group, and six in the vaccine group.\r\n\r\nThe study involved more than 15,000 participants, 27% of whom were 65 or older. The United Kingdom, where the trials took place, has already purchased 60 million doses.', '33', '30 Jan, 2021', 28, '572264989hush-naidoo-pA0uoltkwao-unsplash.jpg'),
(63, 'Moderna vaccine effective against emerging variants', 'The researchers used sera from individuals who had received the Moderna vaccine, and they found no significant impact on antibody response to the B.1.1.7 variant. Although there was a six-fold reduction in antibody response to the B.1.351 variant, the press release explains that the antibodies “remain above levels that we expect to be protective.”\r\n\r\nModerna are already testing a booster vaccine candidate that specifically targets the spike proteins of the B.1.351 variant.', '33', '30 Jan, 2021', 28, '1646880512luke-chesser-rCOWMC8qf8A-unsplash.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `news_setting`
--

CREATE TABLE `news_setting` (
  `page_name` varchar(55) NOT NULL,
  `page_img` varchar(55) NOT NULL,
  `footer_description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `news_setting`
--

INSERT INTO `news_setting` (`page_name`, `page_img`, `footer_description`) VALUES
('News Site', '1726253253news.jpg', '© Copyright 2021 News | Powered by Developer Mamun                                                                                            ');

-- --------------------------------------------------------

--
-- Table structure for table `news_user`
--

CREATE TABLE `news_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `role` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news_user`
--

INSERT INTO `news_user` (`user_id`, `first_name`, `last_name`, `username`, `password`, `role`) VALUES
(28, 'Al', 'Mamun', 'almamun', '21232f297a57a5a743894a0e4a801fc3', 1),
(29, 'Rasel', 'Sarkar', 'rasel', '827ccb0eea8a706c4c34a16891f84e7b', 0),
(30, 'Emon', 'Chowdhury', 'emon', '42dae262b8531b3df48cde9cc018c512', 0),
(31, 'Tuhin', 'Sarkar', 'tuhin', '827ccb0eea8a706c4c34a16891f84e7b', 0),
(32, 'Kajol', 'Ray', 'kajol', '827ccb0eea8a706c4c34a16891f84e7b', 0),
(33, 'Durjoy', 'Sohani', 'durjoy', '827ccb0eea8a706c4c34a16891f84e7b', 0),
(34, 'Bishal', 'Khan', 'bishal', '827ccb0eea8a706c4c34a16891f84e7b', 0),
(35, 'Joy', 'BIjoy', 'joy', '827ccb0eea8a706c4c34a16891f84e7b', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news_category`
--
ALTER TABLE `news_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `news_post`
--
ALTER TABLE `news_post`
  ADD PRIMARY KEY (`post_id`),
  ADD UNIQUE KEY `post_id` (`post_id`);

--
-- Indexes for table `news_user`
--
ALTER TABLE `news_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news_category`
--
ALTER TABLE `news_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `news_post`
--
ALTER TABLE `news_post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `news_user`
--
ALTER TABLE `news_user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
