window.onload = show_home

var page="";

function val_email () {
  email = document.getElementById('email').value
  if (email != '') {
    var re = /\S+@\S+\.\S+/
    var a = re.test(email)
    if (a == true) {return false;}
    else if (isNaN(email)) {
      alert('Invalid Email/Phone No')
      document.getElementById('email').value = ''
    }
  }
}

function reset () {
  document.getElementById('name').value = ''
  document.getElementById('email').value = ''
  document.getElementById('subject').value = ''
  document.getElementById('detail').value = ''
}

function remove_tab_color () {
  document.getElementById('tab_home').style.color = 'brown'
  document.getElementById('tab_diocese').style.color = 'brown'
  document.getElementById('tab_wards').style.color = 'brown'
  document.getElementById('tab_associations').style.color = 'brown'
  document.getElementById('tab_links').style.color = 'brown'
  document.getElementById('tab_gallery').style.color = 'brown'
  document.getElementById('tab_catechism').style.color = 'brown'
  document.getElementById('tab_contact').style.color = 'brown'
}
function home_top_wrapper () {
  document.getElementById('home_top_wrapper').style.visibility = 'visible'
  document.getElementById('home_top_wrapper').style.position = 'relative'
  document.getElementById('page_top_wrapper').style.visibility = 'hidden'
  document.getElementById('page_top_wrapper').style.position = 'absolute'
  remove_tab_color()
}
function page_top_wrapper () {
  document.getElementById('home_top_wrapper').style.visibility = 'hidden'
  document.getElementById('home_top_wrapper').style.position = 'absolute'
  document.getElementById('page_top_wrapper').style.visibility = 'hidden'
  document.getElementById('page_top_wrapper').style.position = 'absolute'
  remove_tab_color();}
function show_home () {
  home_top_wrapper()
  document.getElementById('tab_home').classList.add("currentTab");
  document.getElementById('tab_home').style.color = "black";
  var xmlhttp
  if (window.XMLHttpRequest) { xmlhttp = new XMLHttpRequest();}else { xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');}
  xmlhttp.onreadystatechange = function () {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById('content').innerHTML = xmlhttp.responseText
    }
  }
  xmlhttp.open('GET', 'index_default.php', true)
  xmlhttp.send()
}
function show_detail () {
  var xmlhttp
  if (window.XMLHttpRequest) { xmlhttp = new XMLHttpRequest();}else { xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');}
  xmlhttp.onreadystatechange = function () {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
      document.getElementById('content').innerHTML = xmlhttp.responseText
    }
  }
  xmlhttp.open('GET', 'include/show_detail_history.php', true)
  xmlhttp.send()
}

function show_parishes (t) {
  page_top_wrapper()
  document.getElementById('tab_diocese').style.color = 'black'
  var xmlhttp
  if (window.XMLHttpRequest) {xmlhttp = new XMLHttpRequest();}else {xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');}
  xmlhttp.onreadystatechange = function () {if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {document.getElementById('content').innerHTML = xmlhttp.responseText;}}
  xmlhttp.open('GET', 'parishes.php?tab=' + t, true);xmlhttp.send()
}

function show_convents (t) {
  page_top_wrapper()
  document.getElementById('tab_diocese').style.color = 'black'
  var xmlhttp
  if (window.XMLHttpRequest) { xmlhttp = new XMLHttpRequest();}else { xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');}
  xmlhttp.onreadystatechange = function () {if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {document.getElementById('content').innerHTML = xmlhttp.responseText;}}
  xmlhttp.open('GET', 'convents.php?tab=' + t, true);xmlhttp.send()
}
function show_institutions (t) {
  page_top_wrapper()
  document.getElementById('tab_diocese').style.color = 'black'
  var xmlhttp
  if (window.XMLHttpRequest) { xmlhttp = new XMLHttpRequest();}else { xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');}
  xmlhttp.onreadystatechange = function () {if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {document.getElementById('content').innerHTML = xmlhttp.responseText;}}
  xmlhttp.open('GET', 'institutions.php?tab=' + t, true);xmlhttp.send()
}
function show_tab (tab) {
  page_top_wrapper()
  if ((tab == 'history') || (tab == 'bishop'))
    document.getElementById('tab_diocese').style.color = 'black'
  else if (tab == 'gallery')
    document.getElementById('tab_gallery').style.color = 'black'
  else if (tab == 'contact')
    document.getElementById('tab_contact').style.color = 'black'

  var xmlhttp
  if (window.XMLHttpRequest) { xmlhttp = new XMLHttpRequest();}else { xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');}
  xmlhttp.onreadystatechange = function () {if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {document.getElementById('content').innerHTML = xmlhttp.responseText;}}
  xmlhttp.open('GET', tab + '.php', true);xmlhttp.send()
}

function show_album (page, sub_page, page_name) {
  var xmlhttp
  if (window.XMLHttpRequest) { xmlhttp = new XMLHttpRequest();}else { xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');}
  xmlhttp.onreadystatechange = function () {if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {document.getElementById('content').innerHTML = xmlhttp.responseText;}}
  xmlhttp.open('GET', 'show_album.php?page=' + page + '&sub_page=' + sub_page + '&page_name=' + page_name, true);xmlhttp.send()
}

function show_album_image (src) {
  var xmlhttp
  if (window.XMLHttpRequest) { xmlhttp = new XMLHttpRequest();}else { xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');}
  xmlhttp.onreadystatechange = function () {if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {document.getElementById('show_album_image').innerHTML = xmlhttp.responseText;}}
  xmlhttp.open('GET', 'show_album_image.php?src=' + src, true);xmlhttp.send()
}

function show_catechism (t) {
  page_top_wrapper()
  document.getElementById('tab_catechism').style.color = 'black'
  var xmlhttp
  if (window.XMLHttpRequest) { xmlhttp = new XMLHttpRequest();}else { xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');}
  xmlhttp.onreadystatechange = function () {if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {document.getElementById('content').innerHTML = xmlhttp.responseText;}}
  xmlhttp.open('GET', 'catechism.php?tab=' + t, true);xmlhttp.send()
}

function show_wards (sub_page, s_sub_page) {
  page = 'wards'
  if (sub_page == 0) {page_top_wrapper();}
  else if (sub_page != 0) {
    document.getElementById('page_top_wrapper').style.position = 'relative'
    document.getElementById('page_top_wrapper').style.visibility = 'visible'
    document.getElementById('home_top_wrapper').style.position = 'absolute'
    document.getElementById('home_top_wrapper').style.visibility = 'hidden'
    show_page_top_wrapper(sub_page, s_sub_page, page)
    remove_tab_color()
  }
  document.getElementById('tab_wards').style.color = 'black'
  var xmlhttp
  if (window.XMLHttpRequest) { xmlhttp = new XMLHttpRequest();}else { xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');}
  xmlhttp.onreadystatechange = function () {if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {document.getElementById('content').innerHTML = xmlhttp.responseText;}}
  xmlhttp.open('GET', page + '.php?sub_page=' + sub_page + '&s_sub_page=' + s_sub_page, true);xmlhttp.send()
}
function show_associations (sub_page, s_sub_page) {
  page = 'associations'
  if (sub_page == 0) {
    page_top_wrapper()
  }
  else if (sub_page != 0) {
    document.getElementById('page_top_wrapper').style.position = 'relative'
    document.getElementById('page_top_wrapper').style.visibility = 'visible'
    document.getElementById('home_top_wrapper').style.position = 'absolute'
    document.getElementById('home_top_wrapper').style.visibility = 'hidden'
    show_page_top_wrapper(sub_page, s_sub_page, page)
    remove_tab_color()
  }
  document.getElementById('tab_associations').style.color = 'black'
  var xmlhttp
  if (window.XMLHttpRequest) { xmlhttp = new XMLHttpRequest();}else { xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');}
  xmlhttp.onreadystatechange = function () {if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {document.getElementById('content').innerHTML = xmlhttp.responseText;}}
  xmlhttp.open('GET', page + '.php?sub_page=' + sub_page + '&s_sub_page=' + s_sub_page, true);xmlhttp.send()
}
function show_page_top_wrapper (sub_page, s_sub_page, page) {
  var xmlhttp
  if (window.XMLHttpRequest) { xmlhttp = new XMLHttpRequest();}else { xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');}
  xmlhttp.onreadystatechange = function () {if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {document.getElementById('page_top_wrapper').innerHTML = xmlhttp.responseText
    }}
  xmlhttp.open('GET', 'iframe.php?page=' + page + '&sub_page=' + sub_page + '&s_sub_page=' + s_sub_page, true);xmlhttp.send()
}

function show_links (tab) {
  page_top_wrapper()
  document.getElementById('tab_links').style.color = 'black'
  var xmlhttp
  if (window.XMLHttpRequest) { xmlhttp = new XMLHttpRequest();}else { xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');}
  xmlhttp.onreadystatechange = function () {if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {document.getElementById('content').innerHTML = xmlhttp.responseText;}}
  xmlhttp.open('GET', 'links.php?tab=' + tab, true);xmlhttp.send()
}
function forgot_pass () {
  document.getElementById('forgot').style.visibility = 'visible'
  var xmlhttp
  if (window.XMLHttpRequest) { xmlhttp = new XMLHttpRequest();}else { xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');}
  xmlhttp.onreadystatechange = function () {if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {document.getElementById('forgot').innerHTML = xmlhttp.responseText;}}
  xmlhttp.open('GET', 'include/forgot_pass.php', true);xmlhttp.send();}
function show_question () {
  var get_username = document.getElementById('get_username').value
  var get_mobile = document.getElementById('get_mobile').value
  var xmlhttp
  if (window.XMLHttpRequest) { xmlhttp = new XMLHttpRequest();}else { xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');}
  xmlhttp.onreadystatechange = function () {if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {document.getElementById('forgot').innerHTML = xmlhttp.responseText;}}
  xmlhttp.open('GET', 'include/forgot_pass.php?username=' + get_username + '&mobile=' + get_mobile, true);xmlhttp.send();}
function validate_pass () {
  var username = document.getElementById('db_user').value
  var aa = document.getElementById('get_answer').value
  var bb = document.getElementById('db_answer').value
  if (aa == bb) {var c = Math.floor(Math.random() * 9999)
    alert('Your password have been changed to :' + c + '\nPlease change your password as soon as you Log In')
    var xmlhttp
    if (window.XMLHttpRequest) { xmlhttp = new XMLHttpRequest();}else { xmlhttp = new ActiveXObject('Microsoft.XMLHTTP');}
    xmlhttp.onreadystatechange = function () {if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {document.getElementById('forgot').innerHTML = xmlhttp.responseText;}}
    xmlhttp.open('GET', 'include/forgot_pass.php?user=' + username + '&c=' + c, true)
    xmlhttp.send();}else {alert('Invalid Answer');}}

function moveout () {
    document.getElementById('admin_input').style.visibility = 'visible';
}
function movein () {
  document.getElementById('admin_input').style.visibility = 'hidden';
}
function check_user () {var user = document.getElementById('username').value
  var pass = document.getElementById('password').value
  if ((user == '') || (pass == '')) {alert('Enter Username and Password');}}
