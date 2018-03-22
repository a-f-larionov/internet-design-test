DROP TABLE IF EXISTS events;
CREATE TABLE events (
  `id`         INT(11) NOT NULL AUTO_INCREMENT,
  `name`       TEXT,
  `begin_date` DATETIME,
  `end_date`   DATETIME,
  PRIMARY KEY (`id`),
  KEY `begin_date` (`begin_date`),
  KEY `end_date` (`end_date`)
)
  ENGINE = innoDB
  DEFAULT CHARSET = utf8;


/* повторить 5 раз */
INSERT INTO events (`name`, `begin_date`, `end_date`)
  SELECT
    floor(rand() * 100),
    NOW() + INTERVAL CEIL(RAND() * 1728000) - 864000 SECOND,
    NULL
  FROM (SELECT 1
        UNION SELECT 2
        UNION SELECT 3
        UNION SELECT 4) AS a CROSS JOIN (SELECT 10
                                         UNION SELECT 5
                                         UNION SELECT 6
                                         UNION SELECT 7) AS b;

UPDATE events
SET `end_date` = `begin_date` + INTERVAL CEIL(RAND() * 864000) SECOND;
/* ---- */

/* код проверки */
SET @week_start = SUBDATE(CURDATE(), WEEKDAY(CURDATE()));
SET @week_end = ADDDATE(@week_start, 7);

SELECT
  `name`,
  `begin_date`,
  `end_date`
FROM `events`
WHERE
  `end_date` >= @week_start
  AND
  `begin_date` < @week_end;

