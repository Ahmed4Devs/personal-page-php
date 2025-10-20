<?php 
$messages = getMessages(connectDb());
// throw new RuntimeException('Whoops!');
// echo $hey;
renderView(
  template: 'guestbook_get', 
  data: ['messages' => $messages] // compact($message)
);