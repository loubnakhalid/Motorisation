<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class='wrapper'>
        <span class='incrementer'>-</span>
        <span class='num' onchange="document.location.href='controller.php?nbre='+this.value" >6</span>
        <span class='decrementer'>+</span>
    </div>
    <script>
        const max = document.querySelector('.incrementer'),
    min = document.querySelector('.decrementer'),
    num = document.querySelector('.num');
let a = 1;
max.addEventListener('click', () => {
    a++;
    a = (a < 10) ? "0" + a : a;
    num.innerText = a
});
min.addEventListener('click', () => {
    if (a > 1) {
        a--;
        a = (a < 10) ? "0" + a : a;
        num.innerText = a;
    }
});
    </script>
</body>
</html>
