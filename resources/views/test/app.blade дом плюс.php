<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>@yield('title', 'Дом Плюс')</title>

    <link rel="stylesheet" href="/css/main.css" type="text/css" media="all" />
  </head>
  <body>

    <div class="container text-right">
        <div class="phone-top">+7 (8212) 24 99 33</div>
        <a href="/"><img class="logo-wide" src="/images/logo-wide.png" alt="" /></a>
    </div>

    <div class="container-fluid wide-bg">
        <div class="container">
            <a href="/contacts">Контакты</a>
            <a href="/add" class="add-item">Подать<br />объявление</a>
        </div>
    </div>

    <div class="container">
        <div class="menu">
            <ul class="row">
                 <li class="col"><a href="http://komu.info/?id_nedv=1">Продажа</a></li>
                 <li class="col"><a href="http://komu.info/?id_nedv=4">Аренда</a></li>
                 <li class="col-4"><a href="/items">Коммерческий бизнес</a></li>
                 <li class="col"><a href="/news">Новости</a></li>
                 <li class="col"><a href="/company">Компания</a></li>
            </ul>
        </div>
    </div>

    @yield('content')


    <footer>
    <div class="container text-right">
        <br /><br /><br />
        (c) <?=date('Y')?> Дом Плюс
        <br /><br /><br />
    </div>
    </footer>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script
      src="https://code.jquery.com/jquery-3.4.1.min.js"
      integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
      crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script type="text/javascript">

    //  onkeyup="price_format(this, 1, event);"
    function price_format(target, focus, e) {
        if (typeof(focus) == 'undefined') {
        	focus = 1;
        }
        if (target.value == 'Цена дог.') {
            return ;
        }
        var code = '';
        if (typeof(e) != 'undefined') {
            var e = window.event ? window.event : e;
            code = e.keyCode ? e.keyCode : e.which;
        }

    	var deltaPos = 0;
    	var lengthBefore = target.value.length;
        var sel1 = target.selectionStart;
        var sel2 = target.selectionEnd;
        //target.value = formatValue(target.value);

    	var str = target.value.replace(/\s+/g,'').replace(/\s+$/, '');
    	target.value = format_num(str);

    	if (!deltaPos && (target.value.length - lengthBefore) > 0) {
            deltaPos = target.value.length - lengthBefore;
        }

        //ilog(lengthBefore + ' / key='+code+' / ' + sel1 +' / '+ sel2)

        if (lengthBefore != sel1) {
            var offset = 0;
            if (!code || code == 8) {
            	offset = -1;
            }
            target.selectionStart = sel1 + offset;
            target.selectionEnd = sel2 + offset;
        }

    	return true;
    }
    // Форматирование чисел и денежных значений
    function format_num(str) {
        if (str.indexOf('-') > 0) {
            return str;
        } else if (str.length == 11) {
            //str = str.replace(/(\d{3})/i, '--');
            str = str.replace(/([78])(\d{3})(\d{2,3})(\d{2})(\d{2})/i, '$1 $2 $3 $4 $5');
            return str;
        }
        str = ''+str;
    	var retstr = '';
    	var now = 0;
    	for (i = str.length - 1; i >= 0; i--) {
    		if (now < 3) {
    			now++;
    			retstr = str.charAt(i) + retstr;
    		} else {
    			now = 1;
    			retstr = str.charAt(i) + ' ' + retstr;
    		}
    	}
    	return retstr;
    }

    <?php if (isset($_COOKIE['dev'])) { ?>
        window.onerror = function (text, file, line) {
        	alert(text+' '+file+':'+line)
        }
        <?php } ?>
    </script>


@yield('js')

  </body>
</html>