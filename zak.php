<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Order</title>
  <link rel="stylesheet" href="css/zakaz.css">
</head>
<body>
  <header>
    <div id="logo" onclick="slowScroll('#top')">
      <span>MGM</span>
    </div>
    <div id="about">
      <a href="ma.php" title="about"> <!--onclick="slowScroll('#main')"-->На главную</a>
      <a href="#" title="Заказ" onclick="slowScroll('#order')">Заказ изделия</a>
      <!--<a href="#" title="Ответы на вопросы" onclick="slowScroll('#faq')">FAQ</a>-->
    </div>
  </header>

  <div id="top">
    <h1>Добро пожаловать!</h1>
    <h3>Здесь Вы можете заказать изделие!</h3>
  </div>

  <div id="order">
    <center><h5>Заполните поля данными:</h5></center>
    <form id="form_product">
      <label for="type">Вид <span>*</span></label><br>
      <input type="text" placeholder="Введите вид изделия" name="type" id="type"><br>

      <label for="material">Материал <span>*</span></label><br>
      <input type="text" placeholder="Материал изделия" name="material" id="material"><br>

      <label for="weight">Вес <span>*</span></label><br>
      <input type="text" placeholder="Вес изделия" name="weight" id="weight"><br>

      <label for="bit">Наличие камня <span>*</span></label><br>
      <input type="text" placeholder="Да(1) или нет(0)" name="bit" id="bit"><br>

      <label for="rock">Камень </label><br>
      <input type="text" placeholder="Камень изделия" name="rock" id="rock"><br>

      <label for="locker">Тип замка (для цепочек и т.д.) </label><br>
      <input type="text" placeholder="В случае другого изделия ставить '-'" name="locker" id="locker"><br>

      <label for="message">Примечания <span>*</span></label><br>
      <textarea placeholder="Опишите будущее изделие)" name="message" id="message"></textarea><br>

      <center><h5>Контактная информация:</h5></center>
      <form id="form_input">
        <label for="surname">Фамилия <span>*</span></label><br>
        <input type="text" placeholder="Введите фамилию" name="surname" id="surname"><br>

        <label for="name">Имя <span>*</span></label><br>
        <input type="text" placeholder="Введите имя" name="name" id="name"><br>

        <label for="middlename">Отчество </label><br>
        <input type="text" placeholder="Введите отчество" name="middlename" id="middlename"><br>

        <label for="phone">Телефон <span>*</span></label><br>
        <input type="text" placeholder="Введите телефон" name="phone" id="phone"><br>

        <label for="email">Ваша почта <span>*</span></label><br>
        <input type="text" placeholder="Введите email" name="email" id="email"><br>
        <input type="submit" name="fSubmit" value="Отправить">
        <?php
          if (isset($_GET['fSubmit'])) {
            /* контактные данные */
            $surnameF=$_GET['surname'];
            $nameF=$_GET['name'];
            $middlenameF=$_GET['middlename'];
            $phoneF=$_GET['phone'];
            $emailF=$_GET['email'];
            $messageF=$_GET['message'];

            /* данные об изделии */
            $typeF=$_GET['type'];
            $materialF=$_GET['material'];
            $weightF=$_GET['weight'];
            $rockF=$_GET['rock'];
            $lockerF=$_GET['locker'];
            $bitF=$_GET['bit'];

            $mysqli = new mysqli("localhost", "root", "", "Заказ");
            if ($mysqli->connect_errno) {
              echo "Извините, произошла ошибка с подключением";
              exit;
            }
            /* контактные данные */
            $surname = '"'.$mysqli->real_escape_string($surnameF).'"';
            $name = '"'.$mysqli->real_escape_string($nameF).'"';
            $middlename = '"'.$mysqli->real_escape_string($middlenameF).'"';
            $phone = '"'.$mysqli->real_escape_string($phoneF).'"';
            $email = '"'.$mysqli->real_escape_string($emailF).'"';
            $message = '"'.$mysqli->real_escape_string($messageF).'"';

            $type='"'.$mysqli->real_escape_string($typeF).'"';
            $material='"'.$mysqli->real_escape_string($materialF).'"';
            $weight='"'.$mysqli->real_escape_string($weightF).'"';
            $rock='"'.$mysqli->real_escape_string($rockF).'"';
            $locker='"'.$mysqli->real_escape_string($lockerF).'"';
            $bitr='"'.$mysqli->real_escape_string($bitF).'"';

            $query = "INSERT INTO Заказ (фамилия, имя, отчество, телефон, почта, вид, материал, вес, наличие_камня, камень, тип_замка, примечания)
            VALUES ($surname, $name, $middlename, $phone, $email, $type, $material, $weight, $bitr, $rock, $locker, $message)";
            $result = $mysqli->query($query);
            if ($result) {
              print('Спасибо!'. '<br>');
            }
            $mysqli->close();
          }
        ?>
      </form>
    </form>

  </div>



  <!--<div id="main">
    <div class="intro">
      <h2>Наши услуги помогут вам!</h2>
      <span>Большой выбор всего, что может вам пригодиться</span>
    </div>
    <div class="text">
      <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
        Praesentium, ea velit sed nulla vitae assumenda fugiat commodi explicabo culpa, quisquam
        libero modi, aliquam placeat, earum autem cum!
        Officiis minus ex totam aspernatur temporibus voluptates assumenda nemo soluta maiores ratione,
        vero, nobis voluptatibus suscipit nam nulla beatae animi. Cupiditate, nisi, rerum.</span>
    </div>
  </div>
  <p align="center"><font face = "Alexandra Script" color = "#ffffff" size  = "7">Ремонт
	<font face = "Alexandra Script" color = "#ff0000" size = "7"> изделия</font> </font></p>

	<p align="center"><font face = "Alexandra Script" color = "#ffffff" size = "7">На этой странице Вы можете отремонтировать свое <font face =
		"Alexandra Script" color = "#ff0000" size = "7"> изделие</font></font></p>
	<font size = "4"><a href = "master.html"
	style = "color: #ffffff">На главную страницу</a></font>

	<p align="justify"><font face = "Alexandra Script" color = "#ffffff" size = "7">Заполните информацию о Вашем изделии</font></p>-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script type="text/javascript">
    function slowScroll(id) {
      $('html, body').animate({
        scrollTop: $(id).offset().top
      }, 500);
    }

    $(document).on("scroll", function () {
      if($(window).scrollTop() === 0)
        $("header").removeClass("fixed");
      else
        $("header").attr("class", "fixed");
    })
  </script>

</body>
</html>
