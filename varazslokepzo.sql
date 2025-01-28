-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2025. Jan 28. 09:12
-- Kiszolgáló verziója: 10.4.27-MariaDB
-- PHP verzió: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `varazslokepzo`
--
CREATE DATABASE IF NOT EXISTS `varazslokepzo` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `varazslokepzo`;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `answers`
--

CREATE TABLE `answers` (
  `answerid` int(11) NOT NULL,
  `answer` varchar(100) NOT NULL,
  `pgryff` int(11) NOT NULL DEFAULT 0,
  `phuff` int(11) NOT NULL DEFAULT 0,
  `praven` int(11) NOT NULL DEFAULT 0,
  `pslyth` int(11) NOT NULL DEFAULT 0,
  `question_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `answers`
--

INSERT INTO `answers` (`answerid`, `answer`, `pgryff`, `phuff`, `praven`, `pslyth`, `question_id`) VALUES
(1, 'A bátorságod', 10, 0, 0, 0, 1),
(2, 'Az eltökéltséged', 0, 0, 0, 10, 1),
(3, 'Az eszed', 0, 0, 10, 0, 1),
(4, 'A szorgalmad', 0, 10, 0, 0, 1),
(5, 'Vág az eszed. ', 0, 0, 10, 0, 2),
(6, 'Ha a barátaid a kútba ugranak, utánuk ugrasz te is?', 10, 10, 0, 0, 2),
(7, 'Ha kidobnak az ajtón, bemész az ablakon ', 10, 0, 0, 10, 2),
(8, 'Tanácsot adsz ', 0, 5, 10, 0, 3),
(9, 'Figyelmen kívül hagyod ', 0, 0, 5, 10, 3),
(10, 'Segítesz megoldani a problémát', 10, 5, 0, 0, 3),
(11, 'Együttérzel vele ', 0, 10, 0, 0, 3),
(12, 'Szükséged van minőségibb oktatásra ', 0, 0, 10, 5, 4),
(13, 'Jól szórakozhatsz a barátaiddal ', 10, 10, 0, 0, 4),
(14, 'Így lázadhatsz a rendszer ellen ', 10, 0, 0, 10, 4),
(15, 'Nem csatlakoznék ', 0, 0, 5, 10, 4),
(16, 'Mindent megteszek a győzelem érdekében, és megszerzem a díjat', 0, 0, 0, 10, 5),
(17, 'Mindent megteszek a győzelem érdekében, de a díjat átengedem', 10, 0, 0, 0, 5),
(18, 'Résztveszek a versenyen, de nem hajtok rá teljesen a győzelemre', 0, 5, 10, 0, 5),
(19, 'Verseny nélkül átengedem a díjat ', 0, 10, 0, 0, 5),
(20, 'Tapintatlanság', 0, 10, 0, 0, 6),
(21, 'Intelligencia hiánya', 0, 0, 10, 5, 6),
(22, 'Határozatlanság', 5, 0, 0, 10, 6),
(23, 'Közömbösség', 10, 0, 0, 0, 6),
(24, 'Lobbanékonyság', 0, 0, 10, 5, 6),
(25, 'Türelmetlenség', 0, 10, 5, 0, 6),
(26, 'Griffendél', 10, 0, 0, 0, 7),
(27, 'Hugrabug', 0, 10, 0, 0, 7),
(28, 'Hollóhát', 0, 0, 10, 0, 7),
(29, 'Mardekár', 0, 0, 0, 10, 7);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `cards`
--

CREATE TABLE `cards` (
  `Cardid` int(11) NOT NULL,
  `cardimage` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `cards`
--

INSERT INTO `cards` (`Cardid`, `cardimage`) VALUES
(1, 'images/Cards/Avada.png'),
(2, 'images/Cards/Sortinghat.png'),
(3, 'images/Cards/Elderwand.png'),
(4, 'images/Cards/Broomstick.png'),
(5, 'images/Cards/Cauldron.png'),
(6, 'images/Cards/Magicbook.png');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `colors`
--

CREATE TABLE `colors` (
  `ID` int(11) NOT NULL,
  `spell_id` int(11) NOT NULL,
  `color_name` varchar(8) NOT NULL,
  `c_nr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `colors`
--

INSERT INTO `colors` (`ID`, `spell_id`, `color_name`, `c_nr`) VALUES
(1, 1, '#000000', 1),
(2, 1, '#ADA57F', 2),
(3, 1, '#EFE4B0', 3),
(4, 2, '#D2FBFD', 1),
(5, 2, '#86E3E3', 2),
(6, 2, '#262E2E', 3),
(7, 2, '#4A5959', 4),
(8, 3, '#D3D3E0', 1),
(9, 3, '#544636', 2),
(10, 3, '#665542', 3),
(11, 3, '#6B9E18', 4);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `finished_quest`
--

CREATE TABLE `finished_quest` (
  `quest_id` int(11) NOT NULL,
  `user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `finished_spell`
--

CREATE TABLE `finished_spell` (
  `spell_id` int(11) NOT NULL,
  `user` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `level`
--

CREATE TABLE `level` (
  `level_n` int(11) NOT NULL,
  `required_xp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `level`
--

INSERT INTO `level` (`level_n`, `required_xp`) VALUES
(1, 100),
(2, 200),
(3, 300),
(4, 400),
(5, 500),
(6, 600),
(7, 700),
(8, 800),
(9, 900),
(10, 1000);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `profil`
--

CREATE TABLE `profil` (
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `house` varchar(10) NOT NULL DEFAULT 'house',
  `level` int(11) NOT NULL DEFAULT 1,
  `xp` int(11) NOT NULL DEFAULT 0,
  `image` varchar(100) NOT NULL DEFAULT 'images/profile-placeholder.png',
  `memory` int(11) NOT NULL DEFAULT 0,
  `accuracy` int(11) NOT NULL DEFAULT 0,
  `description` varchar(1000) NOT NULL DEFAULT 'Karakterleírás ide fog kerülni.',
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `quests`
--

CREATE TABLE `quests` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `file` varchar(30) NOT NULL,
  `housereq` varchar(20) NOT NULL,
  `memoryreq` int(11) NOT NULL,
  `spellreq` int(11) DEFAULT NULL,
  `questreq` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `quests`
--

INSERT INTO `quests` (`id`, `name`, `file`, `housereq`, `memoryreq`, `spellreq`, `questreq`) VALUES
(1, 'Beosztási ceremónia', 'quest1.php', 'gryffslythravenhuff', 30, NULL, NULL),
(2, 'Első nap a Roxfortban', 'quest2.php', 'gryffslythravenhuff', 90, 1, 1);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `spells`
--

CREATE TABLE `spells` (
  `spellid` int(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `image_gray` varchar(50) NOT NULL,
  `Name` text NOT NULL,
  `Description` text NOT NULL,
  `Size` int(11) NOT NULL,
  `coloring` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `spells`
--

INSERT INTO `spells` (`spellid`, `image`, `image_gray`, `Name`, `Description`, `Size`, `coloring`) VALUES
(1, 'images/Spells/Lumos.png', 'images/Spells/Lumos_gray.png', 'Lumos', 'A pálca hegye a varázslat során fényt bocsát ki', 33, '111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111112111111111111111111111111111111123211111111111111111111111111111233321111111111111111111111111112333332111111111111111111111111123333332111111111111111111111111123333332111111111111111111111111233332333211111111111111111111111233322333211111111111111111111112333321233321111111111111111111112333211233321111111111111111111123333211123332111111111111111111123332111123332111111111111111111233332111123333211111111111111111233321111112333211111111111111112333211111112333321111111111111112333211111111233321111111111111123332111111111233321111111111111233332111111111123332111111111111233321111111111123332111111111112333321111111111112333211111111112333211111111111112333211111111123333211111111111112333321111111123332111111111111111233321111111112332111111111111111123211111111111221111111111111111112111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111\n'),
(2, 'images/Spells/VingardiumLeviosa.png', 'images/Spells/VingardiumLeviosa_gray.png', 'Vingardium Leviosa', 'A varázslat lebegésre késztet egy tárgyat', 35, '1111111111111111111111111111111111111111111111111111111111111111112221111111111111111111111111111111223331111111111111111111111111111112333313333322111111111111111111111123443133333221111111111111111111111234431333332211111111111111111111112344313443322111111111111111111111123443134433222111111111111111111112234431144333221111111111111111111123344311444332211111111111111111112233443113443322211111111111111111222334431134443322211111111111111122233344311134433322111111111111112223344443111344433222111111111111222233444431111344433222211111111122223344444311111344433222221111222222344443443111113344333322222222222334444334431111113444433333322222344444333344311111113444433333333334444433323443111111113344444444444444333332234431111111111344444444444433331122344311111111111133333333333331111223443111111111111111333333331111112234431111111111111111111111111111122344311111111111111111111111111111223443111111111111111111111111111112234431111111111111111111111111111122344311111111111111111111111111111223443111111111111111111111111111112234431111111111111111111111111111122344311111111111111111111111111111223443111111111111111111111111111112234431111111111111111111111111111122333311111111111111111111111111111122333'),
(3, 'images/Spells/Alohomora.png', 'images/Spells/Alohomora_gray.png', 'Alohomora', 'Kinyit zárakat', 35, '1111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111222211111111111111111111111111122223332111111111111111111111111122333333321122111111111111111111112333333333211432211111111111111111233334443332114433211111111111111123334441433321114433211111111111112333444114333211114432111111111111123344111143332111114332111111111112333411111433321111144321111111111123344111114333211111143321111111111233411111143332111111443211111111112334111111433321111111433211111111123341111114333211111114332111111111233441111143332111111143211111111112333411111433321111114332111111111123334411114333211111443321111111111233334111143332111144333211111111111233344411433321114433321111111111111233334414333214443332111111111111111233334443332443333321111111111111111233333433323333322111111111111111111223334333233322111111111111111111111122243332222111111111111111111111111111433321111111111111111111111111111114333211111111111111111111111111111143332111111111111111111111111111111433321111111111111111111111111111114433211111111111111111111111111111114332111111111111111111111111111111143321111111111111111111111111111111433211111111111111111111111111111111432111111111111111');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `test`
--

CREATE TABLE `test` (
  `Q_id` int(11) NOT NULL,
  `Question` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- A tábla adatainak kiíratása `test`
--

INSERT INTO `test` (`Q_id`, `Question`) VALUES
(1, 'Melyik tulajdonságodat dicsérik leginkább?'),
(2, 'Melyik mondatot hallottad magadról legtöbbször?'),
(3, 'A környezetedben valaki problémával szembesül. Mi a te reakciód?'),
(4, 'Mi okból csatlakoznál Dumbledore seregéhez?'),
(5, 'Egy verseny nyereménye egy olyan tárgy, amire az egyetlen ellenfelednek nagyobb szüksége van, mint neked. Mit teszel?'),
(6, 'Mi zavar leginkább egy emberben?'),
(7, 'Melyik házba kerülnél szívesen?');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`answerid`),
  ADD KEY `question_id` (`question_id`);

--
-- A tábla indexei `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`Cardid`);

--
-- A tábla indexei `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `spell_id` (`spell_id`);

--
-- A tábla indexei `finished_quest`
--
ALTER TABLE `finished_quest`
  ADD KEY `quest_id` (`quest_id`),
  ADD KEY `user` (`user`);

--
-- A tábla indexei `finished_spell`
--
ALTER TABLE `finished_spell`
  ADD KEY `spell_id` (`spell_id`),
  ADD KEY `user` (`user`);

--
-- A tábla indexei `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`level_n`);

--
-- A tábla indexei `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`username`),
  ADD KEY `level` (`level`);

--
-- A tábla indexei `quests`
--
ALTER TABLE `quests`
  ADD PRIMARY KEY (`id`),
  ADD KEY `spellreq` (`spellreq`);

--
-- A tábla indexei `spells`
--
ALTER TABLE `spells`
  ADD PRIMARY KEY (`spellid`);

--
-- A tábla indexei `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`Q_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `answers`
--
ALTER TABLE `answers`
  MODIFY `answerid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT a táblához `cards`
--
ALTER TABLE `cards`
  MODIFY `Cardid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT a táblához `colors`
--
ALTER TABLE `colors`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT a táblához `level`
--
ALTER TABLE `level`
  MODIFY `level_n` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT a táblához `quests`
--
ALTER TABLE `quests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT a táblához `spells`
--
ALTER TABLE `spells`
  MODIFY `spellid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT a táblához `test`
--
ALTER TABLE `test`
  MODIFY `Q_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`question_id`) REFERENCES `test` (`Q_id`);

--
-- Megkötések a táblához `colors`
--
ALTER TABLE `colors`
  ADD CONSTRAINT `colors_ibfk_1` FOREIGN KEY (`spell_id`) REFERENCES `spells` (`spellid`);

--
-- Megkötések a táblához `finished_quest`
--
ALTER TABLE `finished_quest`
  ADD CONSTRAINT `finished_quest_ibfk_1` FOREIGN KEY (`quest_id`) REFERENCES `quests` (`id`),
  ADD CONSTRAINT `finished_quest_ibfk_2` FOREIGN KEY (`user`) REFERENCES `profil` (`username`),
  ADD CONSTRAINT `finished_quest_ibfk_3` FOREIGN KEY (`user`) REFERENCES `profil` (`username`);

--
-- Megkötések a táblához `finished_spell`
--
ALTER TABLE `finished_spell`
  ADD CONSTRAINT `finished_spell_ibfk_1` FOREIGN KEY (`user`) REFERENCES `profil` (`username`),
  ADD CONSTRAINT `finished_spell_ibfk_2` FOREIGN KEY (`spell_id`) REFERENCES `spells` (`spellid`);

--
-- Megkötések a táblához `profil`
--
ALTER TABLE `profil`
  ADD CONSTRAINT `profil_ibfk_1` FOREIGN KEY (`level`) REFERENCES `level` (`level_n`);

--
-- Megkötések a táblához `quests`
--
ALTER TABLE `quests`
  ADD CONSTRAINT `quests_ibfk_1` FOREIGN KEY (`spellreq`) REFERENCES `spells` (`spellid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
