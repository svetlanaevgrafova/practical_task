<?php

// Connect_with_select_db
$link = mysqli_connect("127.0.0.1", "minada", "fktrctqr", "practical_task_evgrafova");

if ($link === false) {
    die("Ошибка: Не можем подключиться. " . mysqli_connect_error());
}

// INSERT INTO

$insert = "INSERT INTO applicants (first_name, last_name, email, gender, profession, description, agreement) VALUES
  ('Polly', 'Wolly', 'polly@mail.ru', 'woman', 'Ведущий PHP разработчик (Senior)', 'anything', '1'),
  ('Bolly', 'Kolly', 'bolly@mail.ru', 'man', 'Ведущий PHP разработчик (Senior)', 'anything', '1'),
  ('Kolly', 'Holn', 'Kolly@mail.ru', 'man', 'Ведущий PHP разработчик (Senior)','anything','1'),
  ('Olly', 'Heinz', 'olly@mail.ru', 'woman', 'PHP разработчик (Middle)','anything','1'),
  ('Elly', 'Catly', 'elly@mail.ru', 'woman', 'PHP разработчик (Middle)','anything','1'),
  ('Tom', 'Riddle', 'tom@mail.ru', 'man', 'PHP разработчик (Middle)','anything','1'),
  ('Ron', 'Weasley', 'rom@mail.ru','man', 'PHP разработчик (Middle)','anything','1'),
  ('Maksim', 'Firse', 'maksim@mail.ru', 'man', 'Младший PHP разработчик (Junior)','anything','1'),
  ('Alex', 'Sedly','alex@mail.ru', 'man', 'Ведущий PHP разработчик (Senior)','anything','1'),
  ('Marina', 'Weasley', 'marina@mail.ru','woman', 'Ведущий PHP разработчик (Senior)','anything','1'),
  ('Olga', 'Weasley', 'olga@mail.ru','woman','Ведущий PHP разработчик (Senior)','anything','1'),
  ('Elena', 'Riddle', 'elena@mail.ru','woman','PHP разработчик (Middle)','anything','1'),
  ('Vivien', 'Ward', 'prettywoman@mail.ru','man','Младший PHP разработчик (Junior)','anything','1'),
  ('Forrest', 'Gump', 'running@mail.ru','man','Младший PHP разработчик (Junior)','anything','1'),
  ('Daenerys', 'Targaryen', 'motherofdragons@mail.ru','woman','PHP разработчик (Middle)','anything','1')
";

if (mysqli_query($link, $insert)) {
  echo "Records inserted successfully." . "<br>";
} else {
  echo "<pre>";
  echo "ERROR: Could not able to execute $insert." . mysqli_error($link);
  echo "<pre>";

  die;
}
