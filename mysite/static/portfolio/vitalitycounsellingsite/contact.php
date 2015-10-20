<?php
if (isset($_POST['name'])) {
foreach ($_POST as $key => $value) $message .= "Field ".htmlspecialchars($key)." is ".htmlspecialchars($value)."<br>";
mail('b.1qc3mqfbbvb7b@rts.kijiji.ca', 'Website Contact Form', $message);	
echo "Thank you for you message.  You will receive a response shortly.";
}
else echo "No information was submitted";
?>