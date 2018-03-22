DROP TABLE IF EXISTS some_array_access_classes;
CREATE TABLE some_array_access_classes (
  `id`         INT(11)   NOT NULL AUTO_INCREMENT,
  `name`       VARCHAR(64),
  `flats`      INT(11),
  `created_at` TIMESTAMP NULL     DEFAULT NULL,
  `updated_at` TIMESTAMP NULL     DEFAULT NULL,
  PRIMARY KEY (id)
)
  ENGINE = InnoDB
  DEFAULT CHARSET = utf8;