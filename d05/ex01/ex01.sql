CREATE TABLE ft_table(
  id INT PRIMARY KEY NOT NULL,
  login VARCHAR() NOT NULL DEFAULT "toto",
  group ENUM('staff', 'student', 'other') NOT NULL,
  date_de_creation DATE NOT NULL
);
