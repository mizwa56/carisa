-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 22, 2025 at 08:07 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(30) NOT NULL,
  `survey_id` int(30) NOT NULL,
  `user_id` int(30) NOT NULL,
  `answer` text NOT NULL,
  `question_id` int(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `survey_id`, `user_id`, `answer`, `question_id`, `date_created`) VALUES
(143, 6, 37, 'FCxtm', 5, '2025-01-20 15:05:20'),
(144, 6, 37, 'YNabM', 6, '2025-01-20 15:05:20'),
(145, 6, 37, 'pMdcL', 7, '2025-01-20 15:05:20'),
(146, 6, 37, 'VUapc', 9, '2025-01-20 15:05:20'),
(147, 6, 37, 'vsCqN', 11, '2025-01-20 15:05:20'),
(148, 6, 37, 'alXGy', 12, '2025-01-20 15:05:20'),
(149, 6, 37, 'zMQeF', 13, '2025-01-20 15:05:20'),
(150, 6, 37, 'UbrzD', 14, '2025-01-20 15:05:20'),
(151, 6, 37, 'OYFAR', 15, '2025-01-20 15:05:20'),
(152, 6, 37, 'TDrNQ', 16, '2025-01-20 15:05:20'),
(153, 6, 37, 'wGrHj', 17, '2025-01-20 15:05:20'),
(154, 6, 37, 'LuVOn', 18, '2025-01-20 15:05:20'),
(155, 6, 37, 'uOXhP', 19, '2025-01-20 15:05:20'),
(156, 6, 37, 'IAoBF', 20, '2025-01-20 15:05:20'),
(157, 6, 37, 'jdkbU', 21, '2025-01-20 15:05:20'),
(158, 6, 37, 'sxDRm', 22, '2025-01-20 15:05:20'),
(199, 6, 39, 'nQEHa', 25, '2025-01-20 23:48:14'),
(200, 6, 39, 'AEJze', 27, '2025-01-20 23:48:14'),
(201, 6, 39, 'nCEOP', 28, '2025-01-20 23:48:14'),
(202, 7, 39, 'onTWl', 29, '2025-01-21 00:09:55'),
(203, 7, 39, 'VvxaK', 30, '2025-01-21 00:09:55'),
(204, 7, 39, 'nKQke', 31, '2025-01-21 00:09:55'),
(205, 7, 39, 'sdIqz', 32, '2025-01-21 00:09:55'),
(206, 7, 39, 'INDWm', 33, '2025-01-21 00:09:55');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(30) NOT NULL,
  `question` text NOT NULL,
  `more_info` text NOT NULL,
  `frm_option` text NOT NULL,
  `type` varchar(50) NOT NULL,
  `order_by` int(11) NOT NULL,
  `lang` varchar(10) NOT NULL,
  `survey_id` int(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `more_info`, `frm_option`, `type`, `order_by`, `lang`, `survey_id`, `date_created`) VALUES
(5, 'What is your age?', 'Most breast cancers are found in women of 50 years old or older.', '{\"FCxtm\":{\"label\":\"1 - 20 years old\",\"points\":\"0\"},\"JRlVe\":{\"label\":\"20 - 49 years old\",\"points\":\"1\"},\"IoaYO\":{\"label\":\"50 - 59 years old\",\"points\":\"2\"},\"jmHpK\":{\"label\":\"60 - 64 years old\",\"points\":\"3\"},\"lefcO\":{\"label\":\"65 - 69 years old\",\"points\":\"4\"},\"AhwEy\":{\"label\":\"70 years and older\",\"points\":\"5\"}}', 'radio_opt', 5, 'eng', 6, '2025-01-11 21:23:04'),
(6, 'What is your ethnicity (race)?', 'Chinese have the highest lifetime risk for breast cancer compared to other women ethnicities in Malaysia.', '{\"YNabM\":{\"label\":\"Malay\",\"points\":\"2\"},\"fULKx\":{\"label\":\"Chinese\",\"points\":\"3\"},\"sHYfu\":{\"label\":\"Indian\",\"points\":\"2\"},\"XZeWI\":{\"label\":\"Iban (Sarawak)\",\"points\":\"1\"},\"KSDhu\":{\"label\":\"Bidayuh (Sarawak)\",\"points\":\"1\"},\"Yiqjo\":{\"label\":\"Melanau (Sarawak)\",\"points\":\"1\"},\"MkWIF\":{\"label\":\"Lun Dayeh/Orang Ulu\",\"points\":\"1\"},\"UsQyT\":{\"label\":\"Kadazan-Dusun\",\"points\":\"1\"},\"ZUryM\":{\"label\":\"Bajau (Sabah)\",\"points\":\"1\"},\"vxLyl\":{\"label\":\"Orang Asli (Peninsular Malaysia)\",\"points\":\"1\"},\"xRYCI\":{\"label\":\"Others\",\"points\":\"1\"}}', 'radio_opt', 6, 'eng', 6, '2025-01-11 21:34:41'),
(7, 'What is your weight status based on body mass index (BMI)?', 'Being overweight or obese increases the risk of breast cancer as having more fat tissue can increase your chance of getting breast cancer by raising the body oestogen level.', '{\"DcmlM\":{\"label\":\"Underweight (BMI: < 18.5)\",\"points\":\"0\"},\"pMdcL\":{\"label\":\"Normal weight (BMI: 18.5 and 24.9)\",\"points\":\"0\"},\"Kcusg\":{\"label\":\"Overweight (BMI: 25 and 29.9)\",\"points\":\"2\"},\"AwEPQ\":{\"label\":\"Obese (BMI: > 29.9)\",\"points\":\"3\"}}', 'radio_opt', 7, 'eng', 6, '2025-01-11 22:33:00'),
(9, 'Do you smoke cigarette/cigar/pipe/e-cigarette?', 'Women who are current smokers and have been smoking for more than 10 years appear to have about a 10 percent higher risk of breast cancer than women who have never smoked.', '{\"dvOeB\":{\"label\":\"Yes, 10 years and above\",\"points\":\"2\"},\"GqegU\":{\"label\":\"Yes, less than 10 years\",\"points\":\"1\"},\"VUapc\":{\"label\":\"No\",\"points\":\"0\"}}', 'radio_opt', 8, 'eng', 6, '2025-01-14 17:07:57'),
(11, 'Do you drink alcohol (Beer, wine, whiskey, champagne, tuak, etc.)?', 'Women who have three alcoholic drinks per week have a 15% higher risk of breast cancer. Alcohol can increase levels of oestrogen and other hormones associated with hormone-receptor-positive breast cancer. Alcohol also may increase breast cancer risk by damaging DNA in cells.', '{\"vsCqN\":{\"label\":\"Yes, 3 drinks or more per week\",\"points\":\"4\"},\"TOuAD\":{\"label\":\"Yes, less than 3 drinks per week\",\"points\":\"2\"},\"kRQzJ\":{\"label\":\"No, I donu2019t drink alcohol\",\"points\":\"0\"}}', 'radio_opt', 9, 'eng', 6, '2025-01-19 00:11:16'),
(12, 'How old were you when you first having period or menstruating?', 'Women who begin their periods before age 11 have about a 15% to 20% higher risk of breast cancer than women who begin their periods at age 15 or older.', '{\"FBfYj\":{\"label\":\"Before 11 years old\",\"points\":\"5\"},\"cTnXt\":{\"label\":\"Between 11 and 14 years old\",\"points\":\"3\"},\"alXGy\":{\"label\":\"15 years old or older\",\"points\":\"1\"}}', 'radio_opt', 10, 'eng', 6, '2025-01-19 00:12:29'),
(13, 'How many times have you given birth?', 'Women who have given birth to five or more children have half the breast cancer risk of women who have not given birth.', '{\"zMQeF\":{\"label\":\"I have never given birth\",\"points\":\"5\"},\"wWHBh\":{\"label\":\"Less than 5 times\",\"points\":\"3\"},\"fQwiH\":{\"label\":\"5 times or more\",\"points\":\"1\"}}', 'radio_opt', 11, 'eng', 6, '2025-01-19 00:13:14'),
(14, 'What was your age when you first gave birth?', 'Women who are older than 30 when they give birth to their first child have a higher risk of breast cancer than women who have never given birth.', '{\"aAKcF\":{\"label\":\"More than 30 years old\",\"points\":\"5\"},\"GaiKe\":{\"label\":\"30 years old or younger\",\"points\":\"1\"},\"UbrzD\":{\"label\":\"I have never given birth\",\"points\":\"3\"}}', 'radio_opt', 12, 'eng', 6, '2025-01-19 00:14:00'),
(15, 'How long does it take for you to stop breastfeeding after giving birth?', 'The risk of breast cancer is reduced by 4.3% for every 12 months of breastfeeding, and breastfeeding reduces the risk of triple-negative breast cancer (20%) and in carriers of BRCA1 mutations (22 - 55%).', '{\"FMsPA\":{\"label\":\"Immediately after giving birth\",\"points\":\"3\"},\"DbdRH\":{\"label\":\"Less than 12 months after giving birth\",\"points\":\"2\"},\"GnpXr\":{\"label\":\"12 months or more after giving birth\",\"points\":\"1\"},\"OYFAR\":{\"label\":\"Not applicable as I have never given birth\",\"points\":\"0\"}}', 'radio_opt', 13, 'eng', 6, '2025-01-19 00:15:03'),
(16, 'Have you ever been diagnosed with benign breast disease?', 'A benign breast condition refers to a lump, cyst, or nipple discharge (fluid) of the breast that is not cancerous. The risk of breast cancer was 1.77 times higher among women with benign breast disease than among those without.', '{\"TDrNQ\":{\"label\":\"Yes\",\"points\":\"3\"},\"QFZjy\":{\"label\":\"No\",\"points\":\"0\"}}', 'radio_opt', 14, 'eng', 6, '2025-01-19 00:17:20'),
(17, 'At what age did you start menopause?', 'Common symptoms of menopause include anxiety, changes in mood - such as low mood or irritability, changes in skin conditions, including dryness or increase in oiliness and onset of adult acne, difficulty sleeping, discomfort during sex, hair loss or thinning, headaches or migraines, hot flushes, etc. Starting menopause after age 55 increases a woman\'s risk of breast cancer.', '{\"ujhUF\":{\"label\":\"More than 55 years old\",\"points\":\"3\"},\"edFkb\":{\"label\":\"55 years old or younger\",\"points\":\"1\"},\"wGrHj\":{\"label\":\"Not applicable as I have not experienced menopause yet\",\"points\":\"0\"}}', 'radio_opt', 15, 'eng', 6, '2025-01-19 00:20:43'),
(18, 'Have you ever received hormone replacement therapy (HRT) after menopause?', 'Hormone replacement therapy (HRT) is a treatment to relieve post-menopausal symptoms such as hot flashes, poor sleep, genitourinary symptoms/sexual dysfunction, and mood changes. HRT use was associated with a 41% higher risk of developing breast cancer than never HRT use.', '{\"LuVOn\":{\"label\":\"Yes\",\"points\":\"3\"},\"EgVlu\":{\"label\":\"No\",\"points\":\"1\"},\"hMwLg\":{\"label\":\"Not applicable as I have not experienced menopause yet\",\"points\":\"0\"}}', 'radio_opt', 16, 'eng', 6, '2025-01-19 00:22:12'),
(19, 'Have your mother, sister(s), or daughter(s) been diagnosed with breast and/or ovarian cancer(s)?\r\n', 'Both breast and ovarian cancers share the same genetic mutations which are BRCA1 and BRCA2 gene mutations. Individuals with a first-degree relative (mother, sister, or daughter) with breast and/or ovarian cancer(s) approximately doubles the risk of breast cancer.', '{\"cBZKf\":{\"label\":\"Yes\",\"points\":\"5\"},\"uOXhP\":{\"label\":\"No\",\"points\":\"0\"}}', 'radio_opt', 17, 'eng', 6, '2025-01-19 00:22:53'),
(20, 'Do you have any biological grandmother, half-sister(s), aunt(s), cousin(s), niece(s), or granddaughter(s) suffering from breast and/or ovarian cancer(s)?', 'In an absence of first-degree relative family history, increased risk for breast cancer was significant for increasing numbers of affected second-degree relatives.', '{\"IAoBF\":{\"label\":\"Yes\",\"points\":\"3\"},\"hiLjm\":{\"label\":\"No\",\"points\":\"0\"}}', 'radio_opt', 18, 'eng', 6, '2025-01-19 00:23:51'),
(21, 'Have you been diagnosed with Breast Cancer?', 'This question is for additional information.', '{\"ANCQb\":{\"label\":\"Yes\",\"points\":\"0\"},\"jdkbU\":{\"label\":\"No\",\"points\":\"0\"}}', 'radio_opt', 19, 'eng', 6, '2025-01-19 00:24:42'),
(22, 'If yes, which treatment are you getting/did you get?', 'This question is for additional information.', '{\"sxDRm\":{\"label\":\"No treatment\",\"points\":\"0\"},\"tsnIY\":{\"label\":\"Chemotheraphy\",\"points\":\"0\"},\"whSZI\":{\"label\":\"Radiotheraphy\",\"points\":\"0\"},\"NRVzd\":{\"label\":\"Surgery\",\"points\":\"0\"},\"rRFms\":{\"label\":\"Alternative medicine\",\"points\":\"0\"}}', 'radio_opt', 20, 'eng', 6, '2025-01-19 00:25:43'),
(25, 'Berapakah umur anda?', 'Didapati kebanyakan kanser payudara dihidapi oleh wanita berusia 50 tahun atau lebih.', '{\"TdDkY\":{\"label\":\"1 hingga 19 tahun\",\"points\":\"0\"},\"IJuoT\":{\"label\":\"20 hingga 49 tahun\",\"points\":\"1\"},\"lXPpM\":{\"label\":\"50 hingga 59 tahun\",\"points\":\"2\"},\"wMktI\":{\"label\":\"60 hingga 64 tahun\",\"points\":\"3\"},\"KbYrJ\":{\"label\":\"65 hingga 69 tahun\",\"points\":\"4\"},\"nQEHa\":{\"label\":\"70 tahun dan ke atas\",\"points\":\"5\"}}', 'radio_opt', 1, 'malay', 6, '2025-01-20 14:43:28'),
(27, 'Apakah etnik atau bangsa anda?', 'Kaum Cina mempunyai risiko menghidap kanser payudara paling tinggi dalam hidup mereka berbanding dengan etnik lain di Malaysia.', '{\"jdJYb\":{\"label\":\"Melayu\",\"points\":\"2\"},\"dcejV\":{\"label\":\"Cina\",\"points\":\"3\"},\"OSRqs\":{\"label\":\"India\",\"points\":\"2\"},\"NjbAw\":{\"label\":\"Iban (Sarawak)\",\"points\":\"1\"},\"vrGmn\":{\"label\":\"Bidayuh (Sarawak)\",\"points\":\"1\"},\"ZERuD\":{\"label\":\"Melanau (Sarawak)\",\"points\":\"1\"},\"TPAxd\":{\"label\":\"Lun Dayeh/Orang Ulu (Sarawak)\",\"points\":\"1\"},\"DvLMI\":{\"label\":\"Kadazan-Dusun (Sabah)\",\"points\":\"1\"},\"ICkrU\":{\"label\":\"Bajau (Sabah)\",\"points\":\"1\"},\"nQXbm\":{\"label\":\"Orang Asli (Semenanjung Malaysia)\",\"points\":\"1\"},\"AEJze\":{\"label\":\"Lain-lain\",\"points\":\"1\"}}', 'radio_opt', 2, 'malay', 6, '2025-01-20 14:46:39'),
(28, 'Apakah status berat badan anda berdasarkan Indeks Jisim Badan atau Body Mass Index (BMI)?', 'Berat badan berlebihan atau obese boleh meningkatkan risiko kanser payudara kerana mempunyai lebih banyak tisu lemak boleh meningkatkan peluang mendapat kanser payudara dengan meningkatkan tahap estrogen badan.', '{\"tTsYG\":{\"label\":\"Kurang berat badan (BMI: < 18.5)\",\"points\":\"0\"},\"XSBLc\":{\"label\":\"Berat badan normal (BMI: 18.5 hingga 24.9)\",\"points\":\"0\"},\"dMaEz\":{\"label\":\"Berat badan berlebihan (BMI: 25 hingga 29.9)\",\"points\":\"2\"},\"nCEOP\":{\"label\":\"Obese (BMI: > 29.9)\",\"points\":\"3\"}}', 'radio_opt', 3, 'malay', 6, '2025-01-20 14:49:33'),
(29, 'What is your gender/sex?', 'Nasopharyngeal cancer is more common in men than it is in women.', '{\"onTWl\":{\"label\":\"Male\",\"points\":\"2\"},\"bVkFQ\":{\"label\":\"Female\",\"points\":\"1\"}}', 'radio_opt', 1, 'eng', 7, '2025-01-21 00:00:07'),
(30, 'What is your age?', 'Nasopharyngeal cancer incidence rises with age, particularly between the ages of 41 and 70.', '{\"VvxaK\":{\"label\":\"1 - 20 years old\",\"points\":\"1\"},\"ditgc\":{\"label\":\"21 - 40 years old\",\"points\":\"2\"},\"JvLAR\":{\"label\":\"41 - 50 years old\",\"points\":\"5\"},\"SZpDy\":{\"label\":\"51 - 70 years old\",\"points\":\"4\"},\"GrbLA\":{\"label\":\"71 years old and older\",\"points\":\"3\"}}', 'radio_opt', 2, 'eng', 7, '2025-01-21 00:02:01'),
(31, 'What is your ethnicity (race)?', 'Nasopharyngeal cancer is a common cancer among Malaysian Chinese and highly affects the natives in Sarawak especially the Bidayuh population.', '{\"yZocx\":{\"label\":\"Malay\",\"points\":\"6\"},\"nkMNa\":{\"label\":\"Chinese\",\"points\":\"7\"},\"BczCj\":{\"label\":\"Indian\",\"points\":\"1\"},\"TZkzU\":{\"label\":\"Iban\",\"points\":\"5\"},\"SfYiE\":{\"label\":\"Bidayuh\",\"points\":\"8\"},\"bsGqe\":{\"label\":\"Lun Dayeh (Orang Ulu)\",\"points\":\"3\"},\"mFRwQ\":{\"label\":\"Kadazan-Dusun\",\"points\":\"4\"},\"nKQke\":{\"label\":\"Others\",\"points\":\"2\"}}', 'radio_opt', 3, 'eng', 7, '2025-01-21 00:04:17'),
(32, 'Do you smoke cigarette/cigar/pipe/e-cigarette?', 'Cigarette smoking increases the risk of nasopharyngeal cancer through the elevated level of antibody against Epstein-Barr virus capsid antigen. Epstein-Barr virus (EBV) is a common virus that causes glandular fever and EBV is consistently detected in nasopharyngeal cancer.', '{\"lWfHn\":{\"label\":\"Yes, more than 5 sticks/times per day\",\"points\":\"6\"},\"ZhsNW\":{\"label\":\"Yes, between 1 - 5 sticks/times per day\",\"points\":\"5\"},\"vrTOi\":{\"label\":\"Yes, less than 4 sticks/times per week\",\"points\":\"4\"},\"aqdYV\":{\"label\":\"Yes, occasionally (1 - 3 sticks/times per month)\",\"points\":\"3\"},\"CMsul\":{\"label\":\"Yes, but rarely (once or twice per year)\",\"points\":\"2\"},\"pECPv\":{\"label\":\"No, not at all\",\"points\":\"1\"}}', 'radio_opt', 4, 'eng', 7, '2025-01-21 00:07:45'),
(33, 'How often do you consume salted preserved food (salted fish and vegetables)?', 'Consumption of salted fish, salted vegetables and preserved/cured meat were all risk factors for nasopharyngeal cancer.', '{\"INDWm\":{\"label\":\"At least once per week\",\"points\":\"4\"},\"DFUaC\":{\"label\":\"Once or twice per month\",\"points\":\"2\"},\"gAoRD\":{\"label\":\"Once or twice per year\",\"points\":\"1\"},\"WgNml\":{\"label\":\"Never\",\"points\":\"0\"}}', 'radio_opt', 5, 'eng', 7, '2025-01-21 00:08:55'),
(35, 'Adakah anda menghisap rokok/cerut/paip/rokok elektronik?', 'Wanita yang sedang merokok dan telah merokok selama lebih 10 tahun dikesan mempunyai sekitar 10% risiko kanser payudara lebih tinggi berbanding dengan wanita yang tidak pernah merokok.', '{\"xDSGM\":{\"label\":\"Ya, 10 tahun dan ke atas\",\"points\":\"2\"},\"oBLvz\":{\"label\":\"Ya, kurang daripada 10 tahun\",\"points\":\"1\"},\"qgjsk\":{\"label\":\"Tidak\",\"points\":\"0\"}}', 'radio_opt', 4, 'malay', 6, '2025-01-21 15:31:41');

-- --------------------------------------------------------

--
-- Table structure for table `survey_set`
--

CREATE TABLE `survey_set` (
  `id` int(30) NOT NULL,
  `title` varchar(200) NOT NULL,
  `acronym` varchar(30) NOT NULL,
  `description` text NOT NULL,
  `user_id` int(30) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `survey_set`
--

INSERT INTO `survey_set` (`id`, `title`, `acronym`, `description`, `user_id`, `start_date`, `end_date`, `date_created`) VALUES
(6, 'Breast Cancer', 'BreCRA', 'Breast cancer happens when cells in your breast grow and divide in an uncontrolled way, creating a mass of tissue called a tumor.', 0, '2025-01-01', '2025-01-31', '2025-01-11 21:12:32'),
(7, 'Nasopharyngeal Cancer', 'NasoCRA', 'Nasopharyngeal cancer is a rare type of cancer that affects the part of the throat connecting the back of the nose to the back of the mouth (the pharynx).', 0, '2025-01-01', '2025-01-31', '2025-01-14 11:47:26'),
(8, 'Lung Cancer', 'LunCRA', 'Lung cancer is caused by harmful cells in your lungs growing unchecked. Treatments include surgery, chemotherapy, immunotherapy, radiation and targeted drugs.', 0, '2025-01-01', '2027-12-31', '2025-01-19 00:49:02'),
(9, 'Colon Cancer', 'ColoCRA', 'Colorectal cancer is a disease in which cells in the colon or rectum grow out of control. Sometimes it is called colon cancer, for short. The colon is the large intestine or large bowel.', 0, '2025-01-01', '2027-12-31', '2025-01-19 00:51:47'),
(10, 'Cervical Cancer', 'CerviCRA', 'Cervical cancer is cancer that starts in the cells of the cervix. The cervix is the lower, narrow end of the uterus (womb). The cervix connects the uterus to the vagina (birth canal).', 0, '2025-01-01', '2027-12-31', '2025-01-19 00:52:20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` text NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 3 COMMENT '1=Admin,2 = Staff, 3= Subscriber',
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `contact`, `email`, `password`, `type`, `date_created`) VALUES
(1, 'Admin', 'Admin', '+123456789', 'admin@admin.com', '0192023a7bbd73250516f069df18b500', 1, '2020-11-10 08:43:06'),
(37, 'Mohamad', 'Adli', '0293847283', 'mizwa@sample.com', '06be973fc0656d1e0625a178aa4f1728', 3, '2025-01-19 01:02:54'),
(38, 'Yu', 'Narukami', '4444444444', 'narukami@sample.com', 'f53a2cf7ceaa4bee4e1498554889165a', 3, '2025-01-20 20:40:04'),
(39, 'Makoto', 'Yuuki', '3333333333', 'makoto@sample.com', 'd918d827f22181e3a187ee5da2cb7b4c', 3, '2025-01-20 20:53:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `survey_set`
--
ALTER TABLE `survey_set`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `survey_set`
--
ALTER TABLE `survey_set`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
