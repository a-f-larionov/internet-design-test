DROP TABLE IF EXISTS specialists;
CREATE TABLE `specialists` (
  `id`                 INT(11)   NOT NULL                   AUTO_INCREMENT,
  `name`               VARCHAR(64)                          DEFAULT NULL,
  `resume_url`         VARCHAR(256)                         DEFAULT NULL,
  `resume_received_at` TIMESTAMP NULL                       DEFAULT NULL,
  `recruit_at`         TIMESTAMP NULL                       DEFAULT NULL,
  `position`           ENUM ('ceo', 'developer', 'manager') DEFAULT NULL,
  `created_at`         TIMESTAMP NULL                       DEFAULT NULL,
  `updated_at`         TIMESTAMP NULL                       DEFAULT NULL,
  PRIMARY KEY (`id`)
)
  ENGINE = InnoDB
  AUTO_INCREMENT = 39
  DEFAULT CHARSET = utf8;

INSERT INTO `specialists`
(`name`, `resume_url`, `resume_received_at`, `recruit_at`, `position`
)
VALUES
  ('Имя 1', 'https://hh.ru/resume/7f70bbfbff01c0d5d10039ed1f397354505779', NOW(
  ), NOW(
   ), 'developer'
  );
