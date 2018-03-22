DROP TABLE IF EXISTS comments;
CREATE TABLE comments (
  `id`        INT(11)     NOT NULL AUTO_INCREMENT,
  `text`      VARCHAR(128),
  `created`   DATETIME,
  `parent_id` INT(11)     NOT NULL,
  `level`     INT(11)     NOT NULL,
  `rank`      VARCHAR(80) NOT NULL,
  PRIMARY KEY (id),
  KEY `rank` (`rank`)
)
  ENGINE = innoDB
  DEFAULT CHARSET = utf8;
