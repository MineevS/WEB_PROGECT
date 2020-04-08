
//func1() - [index.html:26]
var i=0;
var PSD = "divConteiner";
var elem1 = document.getElementById(PSD);

var CBX="checkbox";
var IdText="text1";

var top1= 0;
var left1 = 5;
var HRT ="CoretHr";
var elemHr = document.getElementById(HRT);

var buf=0;

function func1()
{
	function funcQ()
	{
		//divConteiner - указывает на элемент: divConteiner;
		var divConteiner=document.getElementById(PSD);
		//div2Cont - указывает на элемент: div2;//Указываем куда создавать новый контейнет.
		var div2Cont=document.getElementById("div2");//ФИКСИРОВАННО.
		//ClonDivConteiner - клон divConteiner;
		var ClonDivConteiner=divConteiner.cloneNode();
		//Функция добавления в конец div2Cont - divConteiner и ClonDivConteiner;
		div2Cont.insertBefore(ClonDivConteiner, divConteiner);
		var elem = document.getElementById(PSD);
		++buf;

		elem.id =PSD+i;
		elem.style.display="block";
	
		var divCheckbox=document.getElementById(CBX);
		var divCon2 = document.getElementById(elem.id);
		var ClonCheckbox=divCheckbox.cloneNode();
		divCon2.appendChild(ClonCheckbox, divCheckbox);
		var elem2 = document.getElementById(CBX);
		elem2.id = CBX + i;
	
		$('#' + elem2.id).removeClass("checkboxCLass0");
		$('#' + elem2.id).addClass("checkboxCLass");

		var divText=document.getElementById(IdText);
		var divCon2 = document.getElementById(elem.id);
		var ClonText=divText.cloneNode();
		divCon2.appendChild(ClonText, divText);
		var elem3 = document.getElementById(IdText);
		elem3.id=IdText + i;

		elem3.style.left="1%";

		var IdText2="text2";
		var divText2=document.getElementById(IdText2);
		var divCon2 = document.getElementById(elem.id);
		var ClonText2=divText2.cloneNode();
		divCon2.appendChild(ClonText2, divText2);
		var elem4 = document.getElementById(IdText2);
		elem4.id=IdText2 + i;
		++i;
	}
	
	if(buf == 0)
	{
		//alert(i);
		i=++i;
		//alert(i);
		funcQ();
	}
	else if(buf != 0)
	{
		//alert(i);//2//3//4
		//i= i ;//+ (buf)
		//alert(i);
		funcQ();
	}
	
};

function func2()
{
	var arr1=document.getElementsByClassName("checkboxCLass");
	var arr2=document.getElementsByClassName("textA");
	var arr3=document.getElementsByClassName("divC");
	
	for(var z=0; z < arr1.length; z++)
	{
		for(var j=0; j < arr1.length; j++)
		{	
			var parent = document.getElementById("div2");
			
			if(arr1[j].checked == true)
			{	
				var child=document.getElementById(arr3[j].id);
				parent.removeChild(child);
			}
		}
	}
}