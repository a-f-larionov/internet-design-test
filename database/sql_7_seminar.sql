DROP TABLE IF EXISTS seminars;
CREATE TABLE seminars (
  `id`         INT(11)  NOT NULL AUTO_INCREMENT,
  `name`       VARCHAR(32),
  `begin_date` DATETIME NOT NULL,
  `end_date`   DATETIME NOT NULL,
  `city_id`    INT(11)  NOT NULL,
  PRIMARY KEY (`id`),
)
  ENGINE = innoDB
  DEFAULT CHARSET = utf8;


CREATE TABLE `cities` (
  `city_id` INT(11)     NOT NULL AUTO_INCREMENT,
  `name`    VARCHAR(32) NOT NULL
)
  ENGINE = innoDB
  DEFAULT CHARSET = utf8;


CREATE TABLE `participants` (
  `id`   INT(11)     NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(32) NOT NULL
)
  ENGINE = innoDB
  DEFAULT CHARSET = utf8;


CREATE TABLE seminar_participants (
  `seminar_id`     INT(11) NOT NULL,
  `participant_id` INT(11) NOT NULL,
  KEY `seminar_id` (`seminar_id`),
  KEY `participant_id` (`participant_id`)
)
  ENGINE = innoDB
  DEFAULT CHARSET = utf8;
