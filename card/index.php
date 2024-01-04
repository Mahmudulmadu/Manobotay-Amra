



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" sizes="32x32" href="./images/favicon-32x32.png">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="mediaqueries.css">
  <title>Add card form</title>

</head>

<body>

  <section class="main-container">
    <div class="content-container">

      <div class="cards">
        <div class="card-front">
          <img src="images/card-logo.svg" alt="logo" width="70px">
          <p class="cardNumberP">0000 0000 0000 0000</p>
          <div>
            <span class="nameSpan">Name</span>
            <span>
              <span class="monthSpan">04</span>/
              <span class="yearSpan">23</span>
            </span>
          </div>
        </div>
        <div class="card-back">
          <p class="cvcP">123</p>
        </div>
      </div>

      <form action="save_card.php" method="post" id="save_card" novalidate>
        <label for="name">Name</label>
        <input type="text" name="name" class="name" id="name" placeholder="Ex.: Mahmudul Hasan" maxlength="28" autocomplete="off">
        <p class="empty">Empty field.</p>
        <label for="card-number">Card number</label>
        <input type="text" name="card-number" id="card-number" class="cardNumber" placeholder="Ex.: 1234 5678 9123 0000" maxlength="19"
          autocomplete="off">
        <p class="empty">Empty field.</p>
        <p class="error">Invalid field, enter only numbers.</p>
        <div class="date-cvc">
          <div class="date">
            <label for="date">Exp Date (MM/AA)</label>
            <input type="text" name="month" id="month" placeholder="MM" maxlength="2">
            <p class="empty">Empty field.</p>
            <p class="error">Invalid field, enter only numbers.</p>
            <input type="text" name="year" id="year" placeholder="YY" maxlength="2">
            <p class="empty">Empty field.</p>
            <p class="error">Invalid field, enter only numbers.</p>
          </div>
          <div class="cvc">
            <label for="date">CVC</label>
            <input type="text" name="cvc" id="cvc" placeholder="Ex.: 123" maxlength="3">
            <p class="empty">Empty field.</p>
            <p class="error">Invalid field, enter only numbers.</p>
          </div>
        </div>

        <button type="submit">Confirm</button>
      </form>

      <form class="succeed-form hide">
        <img src="images/icon-complete.svg" alt="">
        <h2>THANK YOU</h2>
        <p>Your card details have been added</p>
        
      </form>

    </div>
  </section>

  <script src="script.js"></script>

</body>

</html>