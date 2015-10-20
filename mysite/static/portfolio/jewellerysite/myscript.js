function updateInfo(which) {
slider = "<div id='leftdiv' style='width:48%;float:left;padding-top:30px;'></div><div style='width:50%;float:right;'><ul id='image-gallery' class='gallery list-unstyled cS-hidden'><li data-thumb='img/thumb/cS-1.jpg'><span class='aatitle'><h2>Title goes here</h2><p>This would be the description part in a P element.  This information will all be imported with AJAX either from an XML document or better yet from an SQL server.</p></span><img src='img/cS-1.jpg'/></li><li data-thumb='img/thumb/cS-2.jpg'><span class='aatitle'>cS-3</span><img src='img/cS-2.jpg'/></li><li data-thumb='img/thumb/cS-3.jpg'><span class='aatitle'>cS-4</span><img src='img/cS-3.jpg'/></li><li data-thumb='img/thumb/cS-4.jpg'><img src='img/cS-4.jpg'/></li> <li data-thumb='img/thumb/cS-5.jpg'> <span class='aatitle'>cS-5</span><img src='img/cS-5.jpg' /> </li> <li data-thumb='img/thumb/cS-6.jpg'><span class='aatitle'>cS-6</span><img src='img/cS-6.jpg' /> </li> <li data-thumb='img/thumb/cS-7.jpg'><span class='aatitle'>cS-7</span><img src='img/cS-7.jpg'/></li><li data-thumb='img/thumb/cS-8.jpg'><span class='aatitle'>cS-8</span><img src='img/cS-8.jpg'/></li><li data-thumb='img/thumb/cS-9.jpg'><span class='aatitle'>cS-9</span><img src='img/cS-9.jpg' /></li><li data-thumb='img/thumb/cS-10.jpg'><span class='aatitle'>cS-10</span><img src='img/cS-10.jpg' /></li><li data-thumb='img/thumb/cS-11.jpg'><img src='img/cS-11.jpg' /></li><li data-thumb='img/thumb/cS-12.jpg'><img src='img/cS-12.jpg' /></li><li data-thumb='img/thumb/cS-13.jpg'><img src='img/cS-13.jpg' /> </li> <li data-thumb='img/thumb/cS-14.jpg'> <img src='img/cS-14.jpg' /></li><li data-thumb='img/thumb/cS-15.jpg'> <img src='img/cS-15.jpg' /> </li> </ul></div>";
switch (which) {

case 0: title = "ABOUT US"; myhtml = ""; break;

case 1: title = "WEDDING RINGS"; myhtml = slider; break;
case 2: title = "SIGNATURE PIECES"; myhtml = slider; break;

case 3: title = "CUSTOM SERVICES"; myhtml = "Placeholder Text"; break;

case 4: title = "JEWELLERY FAQS"; myhtml = "Placeholder Text"; break;

case 5: title = "CONTACT ME"; myhtml = "<form id='aaform' method='post' action='contact.php'><label for='name'>Name: </label><input name='name' type='text' id='name'><br><label for='email'>Email: </label><input name='email' type='email' id='email'><br><label for='telephone'>Phone: </label><input name='telephone' type='tel' id='telephone'><br><label for='message'>Message: </label><textarea></textarea><br><br><label></label><input value='Send' name='send' type='submit' id='send'><br><br></form>"; break;

case 6: title = "COMMUNITY INVOLVEMENT";
 myhtml = "Placeholder text"; break;
case 7: title = "ENGAGEMENT RINGS"; myhtml = slider; break;
case 8: title = "WOMEN'S WEDDING BANDS"; myhtml = slider; break;
case 9: title = "MEN'S WEDDING BANDS"; myhtml = slider; break;
case 10: title = "RINGS"; myhtml = slider; break;
case 11: title = "EARRINGS"; myhtml = slider; break;
case 12: title = "PENDANTS"; myhtml = slider; break;
case 13: title = "NECKLACES"; myhtml = slider; break;
}
document.getElementById("Stage_textmain").innerHTML = myhtml;
if (which == 1 || which == 2 || which > 6) openit();
document.getElementById("Stage_Title").innerHTML = title;
}