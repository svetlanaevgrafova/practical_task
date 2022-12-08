<?php
require "connect-select-db.php";

// INSERT INTO

$insert = "INSERT INTO applicants (first_name, last_name, email, gender, profession, description, agreement, file) VALUES
  ('Polly', 'Wolly', 'polly@mail.ru', 'woman', 'Ведущий PHP разработчик (Senior)', 'anything', '1', 'upload/applicants1/ozero-gory-kamni-ogon-koster.jpg'),
  ('Bolly', 'Kolly', 'bolly@mail.ru', 'man', 'Ведущий PHP разработчик (Senior)', 'anything', '1', 'upload/applicants2/ozero-gory-kamni-ogon-koster.jpg'),
  ('Kolly', 'Holn', 'Kolly@mail.ru', 'man', 'Ведущий PHP разработчик (Senior)','anything','1', 'upload/applicants3/ozero-gory-kamni-ogon-koster.jpg'),
  ('Olly', 'Heinz', 'olly@mail.ru', 'woman', 'PHP разработчик (Middle)','anything','1', 'upload/applicants4/ozero-gory-kamni-ogon-koster.jpg'),
  ('Elly', 'Catly', 'elly@mail.ru', 'woman', 'PHP разработчик (Middle)','anything','1', 'upload/applicants5/ozero-gory-kamni-ogon-koster.jpg'),
  ('Tom', 'Riddle', 'tom@mail.ru', 'man', 'PHP разработчик (Middle)','anything','1', 'upload/applicants6/ozero-gory-kamni-ogon-koster.jpg'),
  ('Ron', 'Weasley', 'rom@mail.ru','man', 'PHP разработчик (Middle)','anything','1', 'upload/applicants7/ozero-gory-kamni-ogon-koster.jpg'),
  ('Maksim', 'Firse', 'maksim@mail.ru', 'man', 'Младший PHP разработчик (Junior)','anything','1', 'upload/applicants8/ozero-gory-kamni-ogon-koster.jpg'),
  ('Alex', 'Sedly','alex@mail.ru', 'man', 'Ведущий PHP разработчик (Senior)','anything','1', 'upload/applicants9/ozero-gory-kamni-ogon-koster.jpg'),
  ('Marina', 'Weasley', 'marina@mail.ru','woman', 'Ведущий PHP разработчик (Senior)','anything','1', 'upload/applicants10/ozero-gory-kamni-ogon-koster.jpg'),
  ('Olga', 'Weasley', 'olga@mail.ru','woman','Ведущий PHP разработчик (Senior)','anything','1', 'upload/applicants11/ozero-gory-kamni-ogon-koster.jpg'),
  ('Elena', 'Riddle', 'elena@mail.ru','woman','PHP разработчик (Middle)','anything','1', 'upload/applicants12/ozero-gory-kamni-ogon-koster.jpg'),
  ('Vivien', 'Ward', 'prettywoman@mail.ru','man','Младший PHP разработчик (Junior)','anything','1', 'upload/applicants13/ozero-gory-kamni-ogon-koster.jpg'),
  ('Forrest', 'Gump', 'running@mail.ru','man','Младший PHP разработчик (Junior)','anything','1', 'upload/applicants14/ozero-gory-kamni-ogon-koster.jpg'),
  ('Daenerys', 'Targaryen', 'motherofdragons@mail.ru','woman','PHP разработчик (Middle)','anything','1', 'upload/applicants15/ozero-gory-kamni-ogon-koster.jpg')
";

if (mysqli_query($link, $insert)) {
  echo "Records inserted successfully." . "<br>";
} else {
  echo "<pre>";
  echo "ERROR: Could not able to execute $insert." . mysqli_error($link);
  echo "<pre>";

  die;
}
