CREATE TABLE IF NOT EXISTS `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;