
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `pokemon` (
  `id` bigint(100) NOT NULL,
  `name` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `element1` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `element2` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `gender` varchar(100) CHARACTER SET latin1 DEFAULT NULL,
  `age` int(11) DEFAULT NULL
  `trainer` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `pokemon`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `pokemon`
  MODIFY `id` bigint(100) NOT NULL AUTO_INCREMENT;
COMMIT;
