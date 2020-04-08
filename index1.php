<?php

	function funcDayWeek($dayWeek)//Функция для выведения расписания на день.
	{
		$DayWeek = json_decode(json_encode($dayWeek), True);// Ассоциативный массив пары.
			
		//echo ' <br/>';
		//print_r($DayWeek);
		//echo ' <br/>';
			
		$lenFri=count($DayWeek);
			
			//echo $lenFri;
			//echo ' <br/>';
			
		if(!$lenFri)
		{
			echo "Расписание на данную пару отсутствует.";
		}
		else
		{
			for($sa=0; $sa < $lenFri; $sa++)
			{
				$output = array_slice($DayWeek, $sa, 1, true);//Array0 ( [dfdfdfd] => 3 )
				// получение  ключа массива
				$keys = array_keys($output);
		
				$key=$keys[0];
				//echo $key;
			
				switch($key)
				{
					case "name":
						echo "Название: ";
						break;
					case "type":
						echo "Тип: ";
						break;
					case "teacher":
						echo "Преподователь: ";
						break;
					case "room":
						echo "Кабинет №: ";
						break;
					case "week":
						echo "Неделя: ";
						break;
				}
			
				echo " ";
		
				$znach = $output["$key"];
				echo $znach;
				
				echo ' <br/>';
			
				//func2($key, $znach);
			
			}
		}
	}

	function funcDay($znach, $Day)//+
	{
		//print_r($Friday);//+
	
		echo ' <br/>';
		//echo "hello world5!";//+
		//echo ' <br/>';
		//echo $znach;//+
		//echo ' <br/>';
				
		//print(count($Friday));//6
		//echo ' <br/>';
						
		/*
		$Day[0] // I пара
		$Day[1]	// II пара
		$Day[2]	// III пара
		$Day[3]	// IV пара
		$Day[4]	// V пара
		$Day[5]	// VI пара
		*/
		
		switch($znach)
		{
			case 1: //номер пары.
				//$Day[0];
				
				$Par1 =$Day[0];
				
				funcDayWeek($Par1);
			
				break;
			case 2:
				
				//$Day[1];
				
				$Par2 =$Day[1];
				funcDayWeek($Par2);
				
				break;
			case 3:
				//$Day[2];
				
				$Par3 =$Day[2];
				funcDayWeek($Par3);
				
				break;
			case 4:
				//$Day[3];
				
				$Par4 =$Day[3];
				funcDayWeek($Par4);
				
				break;
			case 5:
				//$Friday[4];
				
				$Par5 =$Day[4];
				funcDayWeek($Par5);
				
				break;
			case 6:
				//$Day[5];
				
				$Par6 =$Day[5];
				funcDayWeek($Par6);
				
				break;
		}
		
		echo ' <br/>';
	}

	function func2($key, $znach)//+
	{
		$data=JSON();//Запись в массив содержимое JSON файла.
		
		//Сшитие запроса и JSON файла.
		
			/*
			$data[0] = "Понедельник"
			$data[1] = "Вторник"
			$data[2] = "Среда"
			$data[3] = "Четверг"
			$data[4] = "Пятница"
			$data[5] = "СУббота"
			$data[6] = "Воскресенье"
			*/
		
		switch ($key)
		{
			case "Понедельник"://+
			{
				$Monday = $data[0];
				funcDay($znach, $Monday);//+
				break;
			}
			case "Вторник"://+ 
			{
				$Tuesday = $data[1];
				funcDay($znach, $Tuesday);//+
				break;//+
			}
			case "Среда"://+ 
			{
				$Wednesday = $data[2];
				funcDay($znach, $Wednesday);//+
				break;//+
			}
			case "Четверг"://+ 
			{
				$Thursday = $data[3];
				funcDay($znach, $Thursday);//+
				break;//+
			}
			case "Пятница"://+ 
			{
				//echo "Hello world <> !";
				
				$Friday = $data[4];//+
				funcDay($znach, $Friday);//+
				break;//+
			}
			case "Сyббота"://+ 
			{
				$Saturday = $data[5];
				funcDay($znach, $Saturday);//+
				break;
			}
			case "Воскресенье"://+ 
			{
				$Sunday = $data[6];
				funcDay($znach, $Sunday);//+
				break;
			}
		}
	}

	function funcZall($Param)//+
	{
		$countLessons = 6;
		for($re=1;$re <= $countLessons; $re++ )
		{
			echo "Пара №";
			echo "  ";
			echo $re;
			
			//Передача параметра и значения в функцию.
			func2($Param, $re);//+
		}
	}

	function funcParser($Param,$Znach)
	{
		if($Znach == "all")
		{
			echo "<br/>";
			echo $Param;
			echo "<br/>";
			echo "<br/>";
			funcZall($Param);
		}
		else
		{
			//Передача параметра и значения в функцию.
			func2($Param, $Znach);//+
		}
	}

	function func1()//Функция распоковки массива полученного из формы и отправки значений в func2().
	{
		$arrF = $_GET['data'];
		$arrD = json_decode($arrF);
		
		for($index = 0; $index < count($arrD); $index=$index + 2)
		{
			$Param = $arrD[$index];
			$Znach = $arrD[$index + 1];
			
			funcParser($Param,$Znach);
		}
	}
	
	function Error($array)//Функция для проверки наличия ошибок. JSON массива.
	{
		switch (json_last_error()) // Проверка наличия ошибок в JSON файле.
		{
			case JSON_ERROR_NONE:
				echo 'Ошибок нет';
				break;
			case JSON_ERROR_DEPTH:
				echo 'Достигнута максимальная глубина стека';
				break;
			case JSON_ERROR_STATE_MISMATCH:
				echo 'Некорректные разряды или несоответствие режимов';
				break;
			case JSON_ERROR_CTRL_CHAR:
				echo 'Некорректный управляющий символ';
				break;
			case JSON_ERROR_SYNTAX:
				echo 'Синтаксическая ошибка, некорректный JSON';
				break;
			case JSON_ERROR_UTF8:
				echo 'Некорректные символы UTF-8, возможно неверно закодирован';
				break;
			default:
				echo 'Неизвестная ошибка';
				break;
		}
		
		echo ' <br/>';
		
	}
	
	function JSON()//Функция подключения JSON файла и проверки ошибок.
	{
		$f_json = '../6. JSON/data.json';
		$json = file_get_contents("$f_json");
		$mas = json_decode($json); //массив

		//Error($mas);// Проверка наличия ошибок при чтениии JSON файла.
		
		return $mas;
	}
	
	function funcURL()//
	{
		function getUrlParams($elemP) //Функция отделения входящих параметров от их значений и между собой.
		{ 	
			//$querystring = parse_url($url, PHP_URL_QUERY); 
			$a = explode("&", $elemP); 
		
			if (!(count($a) == 1 && $a[0] == "")) 
			{ 
				foreach ($a as $key => $value) 
				{ 
					$b = explode("=", $value); 
					$a[$b[0]] = $b[1]; 
					unset ($a[$key]); 
				
				} return $a;
			} 
			else { return false; } 
		}
		
		$elemP=$_SERVER['QUERY_STRING'];

		$ves = getUrlParams($elemP);
	
		echo ' <br/>';
	
		print_r($ves);
	
		echo ' <br/>';

		$len1=count($ves);
		
		for($sa=0; $sa < $len1; $sa++)
		{
			$output = array_slice($ves, $sa, 1, true);//Array0 ( [dfdfdfd] => 3 )
			// получение  ключа массива
			$keys = array_keys($output);
		
			$key=$keys[0];
			echo $key;
	
			echo "  ";
		
			$znach = $output["$key"];
			echo $znach;
		
			echo ' <br/>';	
			
			//$key $znach -> fun_($key, $znach);
			//Подключение функции для работы с полученными параметрами.
			func2($key, $znach);//...
		}
	}
	
	function Start()// Функция непосредственного запуска.
	{
		if($_SERVER['QUERY_STRING'])
		{
			if($_GET['ID'])
			{
				//===/Режим обращения через форму.
				func1();
			}
		}
		
		if($_SERVER['QUERY_STRING'])
		{
			//===/Режим непосредственного обращения к "*.php" если указаны параметры.
		
			if(!$_GET['ID'])
			{
				//Подключения функции для отделения от URL переданных параметров.
				funcURL();//+
			}
		}
		else if(!$_SERVER['QUERY_STRING'])
		{
			//===/Режим непосредственного обращения к "*.php" если не указаны параметры.
			echo "NOT PARAMS!";
		}
	}

	Start();

?>