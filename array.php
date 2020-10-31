<?php

  $nums = [10, 20, 50, 60, 100];

  // $users = ['a' => 'Sahil', 'b' => 'Rahul', 'c' => 'Salman'];

  // foreach ($nums as $key => $value) {
  //   echo $value . PHP_EOL;
  // }

  $emp['sahil'] = 'Sahil Kumar';

  // echo $emp['sahil'];

  $users = [
    [
      100,
      'Sahil',
      25
    ],
    [
      101,
      'Rahul',
      26
    ],
    [
      102,
      'Salman',
      28
    ]
  ];

  // echo $users[1][1];
  // foreach ($users as $key => $value) {
  //   foreach ($value as $sub_key => $sub_value) {
  //     echo $sub_value . PHP_EOL;
  //   }
  // }

  $employees = [
    [
      'id' => 100,
      'name' => 'Sahil Kumar',
      'email' => 'sahil@gmail.com',
      'salary' => 55000
    ],
    [
      'id' => 101,
      'name' => 'Rahul Kumar',
      'email' => 'rahul@gmail.com',
      'salary' => 75000
    ],
    [
      'id' => 102,
      'name' => 'Salman Khan',
      'email' => 'salman@gmail.com',
      'salary' => 65000
    ]
  ];

  // foreach ($employees as $value) {
  //   echo '<table border="1">
  //     <tr>
  //       <td>' . $value['id'] . '</td>
  //       <td>' . $value['name'] . '</td>
  //       <td>' . $value['email'] . '</td>
  //       <td>' . $value['salary'] . '</td>
  //     </tr>
  //   </table>';
  // }

  // is_array()

  // if (is_array($colors)) {
    //   foreach ($colors as $key => $value) {
      //     echo $value . PHP_EOL;
  //   }
  // } else {
  //   echo $colors;
  // }

  // in_array()

  // echo in_array('green', $colors);

  $ext = ['jpg', 'png', 'gif', 'jpg', 'png'];

  // $allowed_ext = in_array('jpg', $ext);

  // if ($allowed_ext) {
  //   echo 'Allowed';
  // } else {
    //   echo 'Not Allowed';
  // }

  // array_unique()

  // $unique = array_unique($ext);
  // print_r($unique);

  // array_reverse()

  // print_r(array_reverse($colors, true));

  $names = ['sahil', 'rahul', 'salman', 'vishal', 'John'];
  // array_map()

  function favColor($name, $color) {
    return "$name's favorite color is $color";
  }

  // $mapping = array_map('favColor', $names, $colors);
  // print_r($mapping);

  $number = [2, 3, 4, 5, 6, 10];
  $numbers = [2, 3, 4, 5, 6, 10, 20, 33, 50];

  function mul($num) {
    return $num + 100;
  }

  $multiplies = array_map('mul', $number);
  // print_r($multiplies);

  // array_diff()
  // print_r(array_diff($numbers, $number));

  // count()

  // echo count($numbers);

  // for ($i = 0; $i < count($numbers); $i++) {
  //   echo $numbers[$i] . PHP_EOL;
  // }

  // max()

  // echo max($numbers);
  // echo min($numbers);

  // array_rand()
  // echo array_rand($colors);

  // array_count_values

  // print_r(array_count_values($ext));

  // implode()

  // echo implode('-', $colors);

  // explode()

  $str = 'India is our country';

  $s = explode(' ', $str);

  // echo $s[0];

  // array_key_exists()
  // echo array_key_exists('id', $employees);

  // if (array_key_exists('id', $employees)) {
    //   echo 'yes';
  // } else {
    //   echo 'no';
    // }

    // array_keys()
  $usr = [
    'id' => 100,
    'name' => 'Harry',
    'age' => 28
  ];

  // print_r(array_keys($usr));
  // print_r(array_values($usr));

  $colors = ['red', 'green', 'blue', 'orange', 'purple'];
  // array_push()
  // print_r($colors);
  // array_push($colors, 'Yellow');
  // array_push($colors, 'Pink');

  // array_pop()
  // array_pop($colors);
  // print_r($colors);

  // $merged_array = array_merge($colors, $numbers);
  print_r($merged_array);

  ?>
