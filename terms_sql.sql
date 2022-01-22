CREATE TABLE ` terms ` (
  ` id ` int unsigned NOT NULL AUTO_INCREMENT,
  ` term ` varchar(255) NOT NULL,
  ` definition ` varchar(255) NOT NULL,
  PRIMARY KEY (` id `)
) ENGINE = InnoDB AUTO_INCREMENT = 19 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci


insert into `terms` (`definition`, `id`, `term`) values ('cascade style sheet', 1, 'css');
insert into `terms` (`definition`, `id`, `term`) values ('javaScript', 2, 'jss');
insert into `terms` (`definition`, `id`, `term`) values ('javascript object notation', 6, 'json');
insert into `terms` (`definition`, `id`, `term`) values ('ecamscript', 18, 'es');
;
