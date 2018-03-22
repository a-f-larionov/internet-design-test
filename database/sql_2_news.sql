DROP TABLE IF EXISTS news;
CREATE TABLE news (
  `id`      INT(11)     NOT NULL AUTO_INCREMENT,
  `created` INT(11)     NOT NULL,
  `title`   VARCHAR(64) NOT NULL,
  PRIMARY KEY (id),
  KEY `created` (`created`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;

DROP TABLE IF EXISTS announces;
CREATE TABLE announces (
  `id`      INT(11)    NOT NULL AUTO_INCREMENT,
  `is_new`  TINYINT(1) NOT NULL DEFAULT 0,
  `news_id` INT(11)    NOT NULL,
  `text`    VARCHAR(512),
  PRIMARY KEY (id),
  KEY `news_id` (`news_id`)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;


INSERT INTO news
(`created`, `title`)
VALUES
  (1521504000, 'Новость 1'),
  (1521504000, 'Новость 2'),
  (1521504000, 'Новость 3'),
  (1521504000, 'Новость 4');

INSERT INTO announces
(`is_new`, `news_id`, `text`)
VALUES
  (0, 1, 'Анонс 1 новости 1'),
  (0, 1, 'Анонс 2 новости 1'),
  (0, 1, 'Анонс 3 новости 1'),
  (1, 1, 'Анонс 4 новости 1 новый 1'),
  (1, 1, 'Анонс 5 новости 1 новый 2'),

  (0, 2, 'Анонс 1 новости 2'),
  (0, 2, 'Анонс 2 новости 2'),
  (0, 2, 'Анонс 3 новости 2'),
  (1, 2, 'Анонс 4 новости 2 новый 1'),
  (1, 2, 'Анонс 5 новости 2 новый 2'),


  (0, 3, 'Анонс 1 новости 3'),
  (0, 3, 'Анонс 2 новости 3'),

  (0, 4, 'Анонс 1 новости 4'),
  (0, 4, 'Анонс 2 новости 4');

