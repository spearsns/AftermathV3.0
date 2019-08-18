-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Aug 18, 2019 at 11:18 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aftermath`
--

-- --------------------------------------------------------

--
-- Table structure for table `characters`
--

CREATE TABLE `characters` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `CharacterName` varchar(30) NOT NULL,
  `Picture` varchar(60) DEFAULT NULL,
  `Deceased` tinyint(1) NOT NULL,
  `ActiveGame` int(11) NOT NULL,
  `Background` varchar(30) NOT NULL,
  `Habitat` varchar(30) NOT NULL,
  `Age` tinyint(4) NOT NULL,
  `Sex` varchar(6) NOT NULL,
  `Ethnicity` varchar(20) NOT NULL,
  `HairColor` varchar(30) NOT NULL,
  `HairStyle` varchar(30) NOT NULL,
  `FacialHair` varchar(30) DEFAULT NULL,
  `EyeColor` varchar(20) NOT NULL,
  `SecondLanguage` varchar(20) DEFAULT NULL,
  `ThirdLanguage` varchar(20) DEFAULT NULL,
  `FourthLanguage` varchar(20) DEFAULT NULL,
  `FifthLanguage` varchar(20) DEFAULT NULL,
  `TotalExp` int(11) NOT NULL,
  `RemainingExp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `char_abilities`
--

CREATE TABLE `char_abilities` (
  `ID` int(11) NOT NULL,
  `CharacterID` int(11) NOT NULL,
  `AbilityNumber` tinyint(4) NOT NULL,
  `Name` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `char_id_marks`
--

CREATE TABLE `char_id_marks` (
  `ID` int(11) NOT NULL,
  `CharacterID` int(11) NOT NULL,
  `Face` varchar(50) DEFAULT NULL,
  `Head` varchar(50) DEFAULT NULL,
  `Neck` varchar(50) DEFAULT NULL,
  `Groin` varchar(50) DEFAULT NULL,
  `Rear` varchar(50) DEFAULT NULL,
  `Stomach` varchar(50) DEFAULT NULL,
  `LowerBack` varchar(50) DEFAULT NULL,
  `LRibs` varchar(50) DEFAULT NULL,
  `RRibs` varchar(50) DEFAULT NULL,
  `LShoulder` varchar(50) DEFAULT NULL,
  `RShoulder` varchar(50) DEFAULT NULL,
  `LBicep` varchar(50) DEFAULT NULL,
  `RBicep` varchar(50) DEFAULT NULL,
  `LThigh` varchar(50) DEFAULT NULL,
  `RThigh` varchar(50) DEFAULT NULL,
  `LForearm` varchar(50) DEFAULT NULL,
  `RForearm` varchar(50) DEFAULT NULL,
  `LCalf` varchar(50) DEFAULT NULL,
  `RCalf` varchar(50) DEFAULT NULL,
  `LHand` varchar(50) DEFAULT NULL,
  `RHand` varchar(50) DEFAULT NULL,
  `LFoot` varchar(50) DEFAULT NULL,
  `RFoot` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `char_skills`
--

CREATE TABLE `char_skills` (
  `ID` int(11) NOT NULL,
  `CharacterID` int(11) NOT NULL,
  `MasterID` int(11) NOT NULL,
  `Value` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `char_traits`
--

CREATE TABLE `char_traits` (
  `ID` int(11) NOT NULL,
  `CharacterID` int(11) NOT NULL,
  `Memory` tinyint(4) NOT NULL,
  `Logic` tinyint(4) NOT NULL,
  `Perception` tinyint(4) NOT NULL,
  `Willpower` tinyint(4) NOT NULL,
  `Charisma` tinyint(4) NOT NULL,
  `Strength` tinyint(4) NOT NULL,
  `Endurance` tinyint(4) NOT NULL,
  `Agility` tinyint(4) NOT NULL,
  `Speed` tinyint(4) NOT NULL,
  `Beauty` tinyint(4) NOT NULL,
  `Sequence` tinyint(4) NOT NULL,
  `Actions` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `ID` int(11) NOT NULL,
  `GameName` varchar(30) NOT NULL,
  `Description` text NOT NULL,
  `TxtFile` varchar(30) NOT NULL,
  `Picture` varchar(120) DEFAULT NULL,
  `StorytellerPassword` varchar(30) NOT NULL,
  `PlayerPassword` varchar(30) NOT NULL,
  `Locked` bit(1) NOT NULL,
  `StorytellerActive` bit(1) NOT NULL,
  `StorytellerID` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `game_participants`
--

CREATE TABLE `game_participants` (
  `ID` int(11) NOT NULL,
  `GameID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `CharacterID` int(11) NOT NULL,
  `PlayerActive` bit(1) NOT NULL,
  `Banned` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `master_skills`
--

CREATE TABLE `master_skills` (
  `ID` int(11) NOT NULL,
  `TypeID` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `master_skills`
--

INSERT INTO `master_skills` (`ID`, `TypeID`, `Name`) VALUES
(1, 1, 'OffHand'),
(2, 6, 'Gambling'),
(3, 1, 'Unarmed'),
(4, 1, 'Grapple'),
(5, 1, 'ShortWeapons'),
(6, 1, 'LongWeapons'),
(7, 1, 'TwoHandWeapons'),
(8, 1, 'ChainWeapons'),
(9, 1, 'Shield'),
(10, 1, 'Thrown'),
(11, 1, 'Archery'),
(12, 1, 'Pistols'),
(13, 1, 'Rifles'),
(14, 1, 'Burst'),
(15, 1, 'SpecialWeapons'),
(16, 1, 'WeaponSystems'),
(17, 1, 'Block'),
(18, 1, 'Dodge'),
(19, 2, 'Stealth'),
(20, 2, 'Concealment'),
(21, 2, 'Sleight'),
(22, 2, 'Lockpick'),
(23, 2, 'Forgery'),
(24, 2, 'Cryptography'),
(25, 2, 'Disguise'),
(26, 2, 'Restraints'),
(27, 3, 'EnvAware'),
(28, 3, 'Surveillance'),
(29, 3, 'Navigation'),
(30, 3, 'Preservation'),
(31, 3, 'Tracking'),
(32, 3, 'Trapping'),
(33, 3, 'Fishing'),
(34, 3, 'FirstAid'),
(35, 4, 'Skateboard'),
(36, 4, 'Bicycle'),
(37, 4, 'Horsemanship'),
(38, 4, 'Automobile'),
(39, 4, 'Motorcycle'),
(40, 4, 'Jet Ski'),
(41, 4, 'Sailing'),
(42, 4, 'Boating'),
(43, 4, 'Multi Gear'),
(44, 4, 'Heavy Equip'),
(45, 4, 'Helicopters'),
(46, 4, 'Airplanes'),
(47, 5, 'Crafting'),
(48, 5, 'Computers'),
(49, 5, 'Programming'),
(50, 5, 'Radios'),
(51, 5, 'Networks'),
(52, 5, 'Mechanics'),
(53, 5, 'Electrical'),
(54, 5, 'Circuitry'),
(55, 5, 'Explosives'),
(56, 5, 'Construction'),
(57, 5, 'Architecture'),
(58, 6, 'Negotiation'),
(59, 6, 'Guile'),
(60, 6, 'Etiquette'),
(61, 6, 'Animal Handling'),
(62, 6, 'Appraisal'),
(63, 6, 'Legal'),
(64, 7, 'History'),
(65, 7, 'Forensics'),
(66, 7, 'Biology'),
(67, 7, 'Chemistry'),
(68, 7, 'Botany'),
(69, 7, 'Mycology'),
(70, 7, 'Toxicology'),
(71, 7, 'Pharmacology'),
(72, 7, 'Surgery'),
(73, 7, 'Medicine'),
(74, 6, 'SecondLang'),
(75, 6, 'ThirdLang'),
(76, 6, 'FourthLang'),
(77, 6, 'FifthLang');

-- --------------------------------------------------------

--
-- Table structure for table `skill_types`
--

CREATE TABLE `skill_types` (
  `ID` int(11) NOT NULL,
  `Type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skill_types`
--

INSERT INTO `skill_types` (`ID`, `Type`) VALUES
(1, 'Combat'),
(2, 'Covert'),
(7, 'Science'),
(6, 'Soft'),
(3, 'Survival'),
(5, 'Technology'),
(4, 'Transportation');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Email` varchar(20) DEFAULT NULL,
  `Active` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `characters`
--
ALTER TABLE `characters`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `char_abilities`
--
ALTER TABLE `char_abilities`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `char_id_marks`
--
ALTER TABLE `char_id_marks`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `char_skills`
--
ALTER TABLE `char_skills`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `char_traits`
--
ALTER TABLE `char_traits`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `game_participants`
--
ALTER TABLE `game_participants`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `master_skills`
--
ALTER TABLE `master_skills`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `skill_types`
--
ALTER TABLE `skill_types`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `Type` (`Type`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `characters`
--
ALTER TABLE `characters`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `char_abilities`
--
ALTER TABLE `char_abilities`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `char_id_marks`
--
ALTER TABLE `char_id_marks`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `char_skills`
--
ALTER TABLE `char_skills`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `char_traits`
--
ALTER TABLE `char_traits`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `game_participants`
--
ALTER TABLE `game_participants`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `master_skills`
--
ALTER TABLE `master_skills`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `skill_types`
--
ALTER TABLE `skill_types`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
