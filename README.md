# Тестовое задание на PHP, фреймворк Laravel.

Здесь я покажу на примере тестового задания, как я пишу код:


1) Возможно ли такое в PHP и как это реализуется, если возможно:<br/>

```php
    $obj = new Building();
    $obj['name'] = 'Main tower';
    $obj['flats'] = 100;
    $obj->save();
```

Решение:
Возможно при использовании [ArrayAccess](http://php.net/manual/ru/class.arrayaccess.php)

Код:
[ArrayAccessController.php](https://github.com/games-z/internet-design-test/blob/master/app/Http/Controllers/ArrayAccessController.php),
[array-access.blade.php](https://github.com/games-z/internet-design-test/blob/master/resources/views/array-access.blade.php)

Результат работы кода: 
http://internet-design.rqr.moscow/array-access/


2) Реализовать метод, который будет проверять, соответствует ли дата, хранимая в переменной $str, определенному формату $format? Используем описание формата такое же, как в стандартных функциях php (date, …). Пример описания формата:<br/>
```php
$format = 'd.m.Y';<br/>
$format = 'H.i';<br/>
$format = 'd/m/Y H:i';<br/>
$format = 'H:i Y-m-d';<br/>
```

Решение: использовать метод DateTime::createFromFormat<br/>

Код:
[DateFormatValidatationController.php](https://github.com/games-z/internet-design-test/blob/master/app/Http/Controllers/DateFormatValidatationController.php)

Результат работы кода: 
http://internet-design.rqr.moscow/date-format-validation/


3) Есть две сущности: сотрудник компании, соискатель. Обе сущности хранятся в одной таблице «специалисты» с полями: имя, резюме, должность, дата отправки резюме, дата приема на работу, должность.
Соискатель до момента приема на работу имеет: имя, резюме, дату отправки резюме. После приема на работу у него появляются: должность, дата приема на работу.

Используя ООП, написать реализацию этих двух сущностей. В классе «Соискатель» должна быть возможность принять сотрудника на работу.
Решение: Создадим два класса Employee extend Candidate, реализуем метод Candidate::recruit();

Код:
[SpecialistsController.php](https://github.com/games-z/internet-design-test/blob/master/app/Http/Controllers/SpecialistsController.php),
[Candidate.php](https://github.com/games-z/internet-design-test/blob/master/app/Candidate.php),
[Employee.php](https://github.com/games-z/internet-design-test/blob/master/app/Employee.php),
[sql_4_specialists.sql](https://github.com/games-z/internet-design-test/blob/master/database/sql_4_specialists.sql).


Результат работы кода: 
http://internet-design.rqr.moscow/specialists/


4) Ниже приведён пример плохого кода. Представьте, что вы вернулись в 2010 год и решили отрефакторить его с учетом текущей ветки языка.
Опишите проблемы этого кода и приведите пример хорошей реализации:

```php
// получить дату вставки новостей
	$insert = $_REQUEST['insert'];
	$insertTs = strtotime($insert);


	$sql = "SELECT * FROM news WHERE insert = '" . $insert . "'";
	$res = mysql_query($sql);
	while ($item = mysql_fetch_assoc($res)) {
		// перебираем новости и для каждой новости отображаем ее анонс
		echo 'News ' . $item['title'] . ': ' . "\n";
		$sql = 'SELECT * FROM announce WHERE item_id = ' . $item['id'];
		$res2 = mysql_query($sql);
		while ($item = mysql_fetch_assoc($res2)) {
			echo $announce['text'] . "\n";
			if ($item['is_new']) {
			$mainItem = $item;
		}
	}
	echo 'Main news item: ' . $mainItem['id'] . "\n";
}

echo date('Y-m-d H:i:s', $insertTs);
```


Решение: С использованием Laravel фреймворка реализуем современное решение, с использованием MVC

Код:
[NewsController.php](https://github.com/games-z/internet-design-test/blob/master/app/Http/Controllers/NewsController.php),
[News.php](https://github.com/games-z/internet-design-test/blob/master/app/News.php)
[Announce.php](https://github.com/games-z/internet-design-test/blob/master/app/Announce.php)
[sql_2_news.sql](https://github.com/games-z/internet-design-test/blob/master/database/sql_2_news.sql)


Результат работы кода: 
http://internet-design.rqr.moscow/news/show/1521504000



5) Расскажите, какой результат выведет следующий код и почему:

```php
abstract class BaseCalculator {
    public function calculate($val1, $val2) { return ($val1 + $val2) * 2; }
}

trait CalculatorTrait {
    public function calculate($val1, $val2) { return $val1 + $val2; }
}

class Calculator1 extends BaseCalculator {
    use CalculatorTrait;

    public function calculate($val1, $val2) { return ($val1 + $val2) / 2; }
}

class Calculator2 extends BaseCalculator {
    use CalculatorTrait;
}

class Calculator3 extends BaseCalculator { }


$val1 = 3;
$val2 = 7;

$calc1 = new Calculator1();
$calc2 = new Calculator2();
$calc3 = new Calculator3();

echo $calc1->calculate($val1, $val2) * ($calc2->calculate($val1, $val2) + $calc3->calculate($val1, $val2));

```

Решение:

Приоритет методов:
- сам класс;<br/>
- трейт класса;<br/>
- базовый класс<br/>

Результат:<br/>
calc1 – собственный метод класса — (3+7)/2 = 5;<br/>
calc2 – метод трейта — (3+7) = 10;<br/>
calc3 – метод базового класса — (3+7)*2 = 20;<br/>
<br/>
далее: 5*(10+20)=150<br/>

6) Файл /tmp/large_file.txt содержит около 5 000 000 строк, в каждой строке - не более 7 символов. Нижеприведенный код использует более 40 Мб оперативной памяти для чтения, обработки и вывода данных из файла в буфер. Измените функцию readMyFile таким образом, чтобы потребление памяти сократилось в 2 и более раз (можно использовать версию PHP 5.5 и выше):

```php
function readMyFile(&$memoryUsage)
{
    $begin = memory_get_usage(true);
    $filePath = '/tmp/large_file.txt';
    $result = [];
    foreach (file($filePath) as $x => $line) {
        $result[] = 'Line ' . $x . ': ' . $line;
    }
    $end = memory_get_usage(true);
    $memoryUsage = $end - $begin;
    return $result;
}

$memoryUsage = 0;
foreach (readMyFile($memoryUsage) as $line) {
    fwrite(STDOUT, $line);
}

echo "Memory usage is: $memoryUsage\n";
```

Решение:
использовать fgets считывая по одной строке, использовать генераторы
для простоты использован файл - 100 000 строк.

Код:
[LargeFileController](https://github.com/games-z/internet-design-test/blob/master/app/Http/Controllers/LargeFileController.php)


Результат работы кода: 
http://internet-design.rqr.moscow/large-file/



MYSQL
1) Существует таблица, в которой хранятся записи о неких событиях (например, выставки или фестивали). Необходимо написать код, который выводил бы на экран события, которые проходят на этой неделе.
Данные в таблице описаны следующими полями:
id int not null primary key
name text
begin_date datetime // дата начала события
end_date datetime // дата окончания события
Решение: Берем все события 
- дата завершение которых входит в текущую неделю или в произойдет будущем;
и 
- дата начала которых входит в текущую неделю или было до начало недели;

```sql

SET @week_start = SUBDATE(CURDATE(), WEEKDAY(CURDATE()))
SET @week_end = ADDDATE(@week_start, 7);
SELECT id
  FROM events
  WHERE 
  end_date >= @week_start
  AND
  begin_date < @week_end
```

Можно увидеть результат графически: 
http://internet-design.rqr.moscow/events



2)  Каждый семинар характеризуется следующими атрибутами: название, дата начала, дата окончания, город, участники события. Необходимо спроектировать структуру таблиц БД для хранения записей о таких семинарах.

Структура БД:
[sql_7_seminar.sql](https://github.com/games-z/internet-design-test/blob/master/database/sql_7_seminar.sql)



3) Предложить структуру для хранения древовидных комментариев.

Решение:
Можно использовать Materialization path
Код:

[TreeCommentsController.php](https://github.com/games-z/internet-design-test/blob/master/app/Http/Controllers/TreeCommentsController.php)
[Comment.php](https://github.com/games-z/internet-design-test/blob/master/app/Comment.php)
[sql_6_tree_comments.sql](https://github.com/games-z/internet-design-test/blob/master/database/sql_6_tree_comments.sql)


Результат работы кода: 
http://internet-design.rqr.moscow/tree-comments/










If you want to collaborate or something else, please send me message via:
skype: a.f.larionov ;
email: a.f.larionov@gmail.com ;
facebook: https://www.facebook.com/a.f.larionov ;
vkontakte: https://vk.com/a.f.larionov .

